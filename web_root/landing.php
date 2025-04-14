<?php
require 'generic.php';

$content_url = 'calendar.php';

$appointments = null;

if (isset($staff)) {
    $staffData = getDatafromTable($conn, "staff", ["user_id" => $user_id])[0];
    $staff_id = $staffData['staff_id'];
    $shifts = getDatafromTable($conn, "shift", ["staff_id" => $staff_id]);
    if ($staff['employee_type'] == 'administrator') {
        $appointments = getDatafromTable($conn, "appointment", ["*"]);
    } else {
        $appointments = getDatafromTable($conn, "appointment", ["staff_id" => $staff_id]);
    }
} else {
    $patient_id = $patient['patient_id'];
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
    $shifts = [];
}

$formattedAppointments = [];
$formattedShifts = [];
if (gettype($appointments) == "array") {
    $i = 0;
    foreach ($appointments as $appointment) {
        $formattedAppointment = [];
        if ($appointment['appointment_name'] !== null) {
            $formattedAppointment['title'] = $appointment['appointment_name'];
        } else {
            $formattedAppointment['title'] = 'appointment ' . strval($i + 1);
        }
        $date = new DateTime($appointment['datetime']);
        $formattedAppointment['start'] = $date->format('Y-m-d H:i:s');
        $formattedAppointment['groupId'] = $appointment['appointment_id'];
        $formattedAppointments[$i] = $formattedAppointment;
        $i += 1;
    }
}
if (gettype($shifts) == "array") {
    $i = 0;
    foreach ($shifts as $shift) {
        $formattedShift = [];

        $date = new DateTime($shift['start_time']);
        $formattedShift['title'] = 'Shift ' . $date->format('h:i A');

        $formattedShift['start'] = $date->format('Y-m-d\TH:i:sP');

        $formattedShift['groupId'] = $shift['shift_id'];
        $formattedShift['end'] = $shift['end_time'];
        $formattedShifts[$i] = $formattedShift;
        $i += 1;
    }
}
?>
<title>Landing Page - <?php echo $mode ?> </title>
<?php
array_push($formattedAppointments, ...$formattedShifts);
require 'landing-content.php';
?>