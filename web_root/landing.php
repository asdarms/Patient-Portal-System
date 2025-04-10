<?php
require 'generic.php';

$user_id = $userData['user_id'];

$content_url = 'calendar.php';

$appointments = null;

if ($staff == True) {
    ?>
    <title>Landing Page - Staff</title>
    <?php
    $staffData = getDatafromTable($conn, "staff", ["user_id" => $user_id])[0];
    $shiftData = getDatafromTable($conn, "shift", ["staff_id" => $staffData['staff_id']]);
    $shifts = [];
    for ($i = 0; $i < sizeof($shiftData); $i++) {
        for ($j = 0; $j < 5; $j++) {
            array_push($shifts, $shiftData[$i][$j]);
        }
    }
} else {
    ?>
    <title>Landing Page - Patient</title>
    <?php
    $patient = getDatafromTable($conn, "patient", ["user_id" => $userData['user_id']])[0];    
    if(gettype($patient) != "integer"){
        do {
            $generated_patient_id = random_int(0, 9999999999);
        } while (sizeof(getDatafromTable($conn, "patient", ["patient_id" => $generated_patient_id])) > 0);
        $query = "INSERT INTO `patient` (`patient_id`, `user_id`) VALUES ($generated_patient_id, $user_id)";
        $result = mysqli_query($conn, $query);
    }
    $patient = getDatafromTable($conn, "patient", ["user_id" => $userData['user_id']])[0];    
    $patient_id = $patient['patient_id'];
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
}
require 'landing-content.php';
?>