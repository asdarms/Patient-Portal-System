<?php
require 'generic.php';
if (isset($patient)) {
    $patient_id = $patient['patient_id'];
    //$appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
    $appointments = $conn->query('SELECT * FROM appointment JOIN patient ON appointment.patient_id = patient.patient_id JOIN user ON user.user_id = patient.user_id WHERE appointment.patient_id = ' . $patient_id)->fetch_all(MYSQLI_BOTH);
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
} else if (isset($staff)) {
    if ($staff['employee_type'] == 'administrator') {
        $appointments = getDatafromTable($conn, "appointment", ["*"]);
    } else {
        $staff_id = $staff['staff_id'];
        $appointments = getDatafromTable($conn, "appointment", ["staff_id" => $staff_id]);
    }
}
$content_url = 'appointments-content.php';
?>
<title>Appointments</title>
<?php
require 'landing-content.php';
?>s