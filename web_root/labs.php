<?php
require 'generic.php';
$user_id = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0]['user_id'];
//$staff_id = getDatafromTable($conn, "staff", ["staff_id"]);
$patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
$lab_orders = null;
if ($patient != null) {
    $patient_id = $patient['patient_id'];
    $lab_orders = getDatafromTable($conn, "lab_order", ["patient_id" => $patient_id]);
}
$content_url = 'labs-content.php';
?>
<title>Lab Orders and Results</title>
<?php
require 'landing-content.php';
?>