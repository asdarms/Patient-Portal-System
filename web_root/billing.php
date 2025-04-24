<?php
require 'generic.php';
$bills = null;
if ($mode == 'Patient') {
    $patient_id = $patient['patient_id'];
    $query = 'SELECT * FROM bill JOIN staff ON bill.staff_id = staff.staff_id JOIN user ON user.user_id = staff.user_id WHERE bill.patient_id = ' . $patient_id;
    $bills = queryAsArray($conn, $query);
} else if ($mode == 'Staff') {
    $staff_id = $staff['staff_id'];
    $query = 'SELECT * FROM bill JOIN patient ON bill.patient_id = patient.patient_id JOIN user ON user.user_id = patient.user_id WHERE bill.staff_id = ' . $staff_id;
    $bills = queryAsArray($conn, $query);
} else if ($mode == 'Admin') {
    $bills = getDatafromTable($conn, "bill", ["*"]);
}
$content_url = 'billing-content.php';

$query = -1;
if (isset($_POST['delete-bill'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'bill', $id);
    switch ($query) {
        case 0:
            $query = 'Bill successfully deleted.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-bill'])) {
    $bill_id = $_POST['edit-id'];
    $bill_date = $_POST['edit-date'];
    $bill_amount = $_POST['edit-amount'];
    $bill_description = $_POST['edit-description'];
    $bill_notes = $_POST['edit-notes'];

    $query = "UPDATE bill SET date = \"$bill_date\", amount = \"$bill_amount\", description = \"$bill_description\", notes = \"$bill_notes\" WHERE bill_id = $bill_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Bill successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}

if (isset($_POST['create-bill'])) {
    $new_date = $_POST['create-date'];
    $new_amount = $_POST['create-amount'];
    $new_description = $_POST['create-description'];
    $new_notes = $_POST['create-notes'];
    $new_patient = $_POST['create-patient'];
    $new_staff = $_POST['create-staff'];

    $query = "INSERT INTO bill (date, amount, description, notes, patient_id, staff_id) VALUES (\"$new_date\", \"$new_amount\", \"$new_description\", \"$new_notes\", \"$new_patient\", \"$new_staff\");";
    try {
        mysqli_query($conn, $query);
        $query = 'Bill successfully created.';
    } catch (mysqli_sql_exception $e) {
        if (str_contains($e, "a foreign key constraint fails")) {
            $query = "Failed! Improper patient or staff ID.";
        } else {
            $query = "Failed! An unkown error occurred.";
        }
    }
}
?>

<title>Billing</title>

<?php
require 'landing-content.php';
?>