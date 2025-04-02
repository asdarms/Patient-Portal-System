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
require 'landing-content.php';
?>