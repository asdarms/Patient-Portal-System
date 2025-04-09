<?php
require 'generic.php';
$user_id = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0]['user_id'];
//$staff_id = getDatafromTable($conn, "staff", ["staff_id"]);
$patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
$bills = null;
if ($patient != null) {
    $patient_id = $patient['patient_id'];
    $bills = getDatafromTable($conn, "bill", ["patient_id" => $patient_id]);
}
$content_url = 'billing-content.php';
?>
<title>Billing</title>
<?php
require 'landing-content.php';
?>