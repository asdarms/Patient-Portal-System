<?php
require 'generic.php';
if (!is_null($patient)) {
    $patient_id = $patient['patient_id'];
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
} else if (!is_null($staff)) {
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
?>