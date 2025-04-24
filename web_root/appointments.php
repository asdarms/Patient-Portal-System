<?php
require 'generic.php';

if ($mode == 'Patient') {
    $patient_id = $patient['patient_id'];
    $query = 'SELECT * FROM appointment JOIN staff ON appointment.staff_id = staff.staff_id JOIN user ON user.user_id = staff.user_id WHERE appointment.patient_id = ' . $patient_id;
    $appointments = queryAsArray($conn, $query);
} else if ($mode == 'Staff') {
    $staff_id = $staff['staff_id'];
    $query = 'SELECT * FROM appointment JOIN patient ON appointment.patient_id = patient.patient_id JOIN user ON user.user_id = patient.user_id WHERE appointment.staff_id = ' . $staff_id;
    $appointments = queryAsArray($conn, $query);
} else if ($mode == 'Admin') {
    $appointments = getDatafromTable($conn, "appointment", ["*"]);
}

$content_url = 'appointments-content.php';

$query = -1;
if (isset($_POST['delete-appointment'])) {
    $appointment_id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'appointment', $appointment_id);
    switch ($query) {
        case 0:
            $query = 'Appointment successfully deleted.';
            break;
        case 1:
            $query = 'Fail! The associated bill must be deleted first.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-appointment'])) {
    $appointment_id = $_POST['edit-id'];
    $appointment_name = $_POST['edit-name'];
    $appointment_time = $_POST['edit-time'];
    $appointment_type = $_POST['edit-type'];
    $appointment_room = $_POST['edit-room'];
    $appointment_notes = $_POST['edit-notes'];

    $query = "UPDATE appointment SET appointment_name = \"$appointment_name\", datetime = \"$appointment_time\", appointment_type = \"$appointment_type\", room_number = \"$appointment_room\", notes = \"$appointment_notes\" WHERE appointment_id = $appointment_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Appointment successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    } 
}

if (isset($_POST['create-appointment'])) {
    $new_name = $_POST['create-name'];
    $new_time = $_POST['create-time'];
    $new_type = $_POST['create-type'];
    $new_room = $_POST['create-room'];
    $new_notes = $_POST['create-notes'];
    $new_patient = $_POST['create-patient'];
    $new_staff = $_POST['create-staff'];

    $query = "INSERT INTO appointment (appointment_name, datetime, appointment_type, room_number, notes, patient_id, staff_id) VALUES (\"$new_name\", \"$new_time\", \"$new_type\", \"$new_room\", \"$new_notes\", \"$new_patient\", \"$new_staff\");";
    try {
        mysqli_query($conn, $query);
        $query = 'Appointment successfully updated.';
    } catch (mysqli_sql_exception $e) {
        if (str_contains($e, "a foreign key constraint fails")) {
            $query = "Failed! Improper patient or staff ID.";
        } else {
            $query = "Failed! An unkown error occurred.";
        }
    } 
}
?>

<title>Appointments</title>

<?php
require 'landing-content.php';
?>