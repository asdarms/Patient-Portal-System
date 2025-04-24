<?php
require 'generic.php';
$prescriptions = null;

if ($mode == 'Patient') {
    $patient_id = $patient['patient_id'];
    $query = 'SELECT * FROM prescription JOIN staff ON prescription.staff_id = staff.staff_id JOIN user ON user.user_id = staff.user_id WHERE prescription.patient_id = ' . $patient_id;
    $prescriptions = queryAsArray($conn, $query);
} else if ($mode == 'Staff') {
    $staff_id = $staff['staff_id'];
    $query = 'SELECT * FROM prescription JOIN patient ON prescription.patient_id = patient.patient_id JOIN user ON user.user_id = patient.user_id WHERE prescription.staff_id = ' . $staff_id;
    $prescriptions = queryAsArray($conn, $query);
} else if ($mode == 'Admin') {
    $prescriptions = getDatafromTable($conn, "prescription", ["*"]);
}

$content_url = 'prescriptions-content.php';

$query = -1;
if (isset($_POST['delete-prescription'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'prescription', $id);
    switch ($query) {
        case 0:
            $query = 'Prescription successfully deleted.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-prescription'])) {
    $prescription_id = $_POST['edit-id'];
    $prescription_name = $_POST['edit-name'];
    $prescription_date = $_POST['edit-date'];
    $prescription_dose = $_POST['edit-dose'];
    $prescription_dosage = $_POST['edit-dosage'];
    $prescription_refill = $_POST['edit-refill'];

    $query = "UPDATE prescription SET name = \"$prescription_name\", date_prescribed = \"$prescription_date\", dose = \"$prescription_dose\", dosage = \"$prescription_dosage\", refill_time = \"$prescription_refill\" WHERE prescription_id = $prescription_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Prescription successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}

if (isset($_POST['create-prescription'])) {
    $new_name = $_POST['create-name'];
    $new_date = $_POST['create-date'];
    $new_dose = $_POST['create-dose'];
    $new_dosage = $_POST['create-dosage'];
    $new_refill = $_POST['create-refill'];
    $new_patient = $_POST['create-patient'];
    $new_staff = $_POST['create-staff'];

    $query = "INSERT INTO prescription (name, date_prescribed, dose, dosage, refill_time, patient_id, staff_id) VALUES (\"$new_name\", \"$new_date\", \"$new_dose\", \"$new_dosage\", \"$new_refill\", \"$new_patient\", \"$new_staff\");";
    try {
        mysqli_query($conn, $query);
        $query = 'Prescription successfully updated.';
    } catch (mysqli_sql_exception $e) {
        if (str_contains($e, "a foreign key constraint fails")) {
            $query = "Failed! Improper patient or staff ID.";
        } else {
            $query = "Failed! An unkown error occurred.";
        }
    }
}
?>

<title>Prescriptions</title>

<?php
require 'landing-content.php';
?>