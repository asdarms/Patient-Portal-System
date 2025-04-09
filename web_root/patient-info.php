<?php
require 'generic.php';
$patient_info = getDatafromTable($conn, "patient", ["*"]);
$content_url = 'patient-info-content.php';
?>
<title>Patient Info</title>
<?php
require 'landing-content.php';
?>