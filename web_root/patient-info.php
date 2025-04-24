<?php
require 'generic.php';
$query = 'SELECT * FROM patient JOIN user ON user.user_id = patient.user_id';
$patients = queryAsArray($conn, $query);

$content_url = 'patient-info-content.php';

$query = -1;
if (isset($_POST['delete-patient'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'patient', $id);
    switch ($query) {
        case 0:
            $query = 'Patient successfully deleted.';
            break;
        case 1:
            $query = 'Fail! Please delete all other references to patient.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-patient'])) {
    $patient_id = $_POST['edit-id'];
    $dob = $_POST['edit-dob'];
    $sex = $_POST['edit-sex'];
    $address = $_POST['edit-address'];
    $emergency = $_POST['edit-emergency'];
    $medical = $_POST['edit-medical'];
    $billing = $_POST['edit-billing'];
    $insurance = $_POST['edit-insurance'];
    $ssn = $_POST['edit-ssn'];
    $first = $_POST['edit-first'];
    $last = $_POST['edit-last'];

    $query = "UPDATE patient, user SET date_of_birth = \"$dob\", sex = \"$sex\", address = \"$address\", emergency_contact = \"$emergency\", medical_data = \"$medical\", billing_info = \"$billing\"
    , insurance_info = \"$insurance\", ssn = \"$ssn\", first_name = \"$first\", last_name = \"$last\" WHERE patient.user_id = user.user_id AND patient_id = $patient_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Patient successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}

if (isset($_POST['create-patient'])) {
    $new_id = $_POST['create-id'];
    $new_dob = $_POST['create-dob'];
    $new_sex = $_POST['create-sex'];
    $new_address = $_POST['create-address'];
    $new_emergency = $_POST['create-emergency'];
    $new_medical = $_POST['create-medical'];
    $new_billing = $_POST['create-billing'];
    $new_insurance = $_POST['create-insurance'];
    $new_ssn = $_POST['create-ssn'];

    $query = "INSERT INTO patient (user_id, date_of_birth, sex, address, emergency_contact, medical_data, billing_info, insurance_info, ssn) VALUES (\"$new_id\", \"$new_dob\", \"$new_sex\", \"$new_address\", \"$new_emergency\", \"$new_medical\", \"$new_billing\", \"$new_insurance\", \"$new_ssn\");";
    if (sizeOf(getDatafromTable($conn, "staff", ["user_id" => $new_id])) == 0) {
        try {
            mysqli_query($conn, $query);
            $query = 'Patient successfully created.';
        } catch (mysqli_sql_exception $e) {
            if (str_contains($e, "a foreign key constraint fails")) {
                $query = "Failed! Improper user ID.";
            } else if (str_contains($e, "Duplicate entry")) {
                $query = "Failed! That patient already exists.";
            } else {
                $query = "Failed! An unkown error occurred.";
            }
        }
    } else {
        $query = "Failed! That user is already an employee.";
    }
}
?>

<title>Patient Info</title>

<?php
require 'landing-content.php';
?>