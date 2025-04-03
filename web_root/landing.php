<?php
require 'generic.php';
$content_url = 'calendar.php';
if ($staff == True) {
    ?>
    <title>Landing Page - Staff</title>
    <?php
    $staffData = getDatafromTable($conn, "staff", ["user_id" => $userData['user_id']])[0];
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
}
$user_id = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0]['user_id'];
$patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
$appointments = null;
if ($patient != null) {
    $patient_id = $patient['patient_id'];
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
}
require 'landing-content.php';
?>