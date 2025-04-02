<?php
require 'generic.php';
$user_id = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0]['user_id'];
$patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
$appointments = null;
if ($patient != null) {
    $patient_id = $patient['patient_id'];
    $appointments = getDatafromTable($conn, "appointment", ["patient_id" => $patient_id]);
}
$content_url = 'appointments-content.php';
?>
<title>Appointments</title>
<?php
require 'landing-content.php';
?>