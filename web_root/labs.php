<?php
require 'generic.php';

$lab_orders = null;

if ($mode == 'Patient') {
    $patient_id = $patient['patient_id'];
    $query = 'SELECT * FROM lab_order JOIN staff ON lab_order.staff_id = staff.staff_id JOIN user ON user.user_id = staff.user_id WHERE lab_order.patient_id = ' . $patient_id;
    $lab_orders = queryAsArray($conn, $query);
} else if ($mode == 'Staff') {
    $staff_id = $staff['staff_id'];
    $query = 'SELECT * FROM lab_order JOIN patient ON lab_order.patient_id = patient.patient_id JOIN user ON user.user_id = patient.user_id WHERE lab_order.staff_id = ' . $staff_id;
    $lab_orders = queryAsArray($conn, $query);
} else if ($mode == 'Admin') {
    $lab_orders = getDatafromTable($conn, "lab_order", ["*"]);
}

$content_url = 'labs-content.php';

$query = -1;
if (isset($_POST['delete-lab'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'lab_order', $id);
    switch ($query) {
        case 0:
            $query = 'Lab order successfully deleted.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-lab'])) {
    $lab_id = $_POST['edit-id'];
    $location = $_POST['edit-location'];
    $type = $_POST['edit-type'];
    $cost = $_POST['edit-cost'];
    $tests = $_POST['edit-tests'];
    $results = $_POST['edit-results'];
    $notes = $_POST['edit-notes'];

    $query = "UPDATE lab_order SET location = \"$location\", type = \"$type\", estimated_cost = \"$cost\", tests = \"$tests\", results = \"$results\", notes = \"$notes\" WHERE order_id = $lab_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Lab order successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}

if (isset($_POST['create-lab'])) {
    $new_location = $_POST['create-location'];
    $new_type = $_POST['create-type'];
    $new_cost = $_POST['create-cost'];
    $new_tests = $_POST['create-tests'];
    $new_results = $_POST['create-results'];
    $new_notes = $_POST['create-notes'];
    $new_patient = $_POST['create-patient'];
    $new_staff = $_POST['create-staff'];

    $query = "INSERT INTO lab_order (location, type, estimated_cost, tests, results, notes, patient_id, staff_id) VALUES (\"$new_location\", \"$new_type\", \"$new_cost\", \"$new_tests\", \"$new_results\", \"$new_notes\", \"$new_patient\", \"$new_staff\");";
    try {
        mysqli_query($conn, $query);
        $query = 'Lab order successfully created.';
    } catch (mysqli_sql_exception $e) {
        if (str_contains($e, "a foreign key constraint fails")) {
            $query = "Failed! Improper patient or staff ID.";
        } else {
            $query = "Failed! An unkown error occurred.";
        }
    }
}
?>

<title>Lab Orders and Results</title>

<?php
require 'landing-content.php';
?>