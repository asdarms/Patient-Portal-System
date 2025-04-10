<?php
require 'generic.php';

$content_url = 'calendar.php';

$appointments = null;

if (isset($staff)) {
    ?>
    <title>Landing Page - Staff</title>
    <?php
    $staffData = getDatafromTable($conn, "staff", ["user_id" => $user_id])[0];
    $staff_id = $staffData['staff_id'];
    $shifts = getDatafromTable($conn, "shift", ["staff_id" => $staff_id]);
    $appointments = getDatafromTable($conn, "appointment", ["staff_id" => $staff_id]);
} else {
    ?>
    <title>Landing Page - Patient</title>
    <?php
    $patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
    if (is_null($patient)) {
        do {
            $generated_patient_id = random_int(0, 999999999);
        } while (sizeof(getDatafromTable($conn, "patient", ["patient_id" => $generated_patient_id])) > 0);
        $query = "INSERT INTO `patient` (`patient_id`, `user_id`) VALUES ($generated_patient_id, $user_id)";
        $result = mysqli_query($conn, $query);
        $patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];    
    }
    $patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
    $patient_id = $patient['patient_id'];
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
    $shifts = [];
}

$formattedAppointments = [];
$formattedShifts = [];
if(gettype($appointments) == "array"){
    $i = 0;
    foreach($appointments as $appointment){
        $formattedAppointment = [];
        if($appointment['appointment_name'] !== null){
            $formattedAppointment['title'] = $appointment['appointment_name'];
        } else {
            $formattedAppointment['title'] = 'appointment ' . strval($i+1);
        }
        $date = new DateTime($appointment['datetime']);
        $formattedAppointment['start'] = $date->format('Y-m-d\TH:i:sP');
        $formattedAppointment['groupId'] = $appointment['appointment_id'];
        $formattedAppointments[$i] = $formattedAppointment;
        $i += 1;
    }
}
if(gettype($shifts) == "array"){
    $i = 0;
    foreach($shifts as $shift){
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

array_push($formattedAppointments, ...$formattedShifts);
require 'landing-content.php';
?>