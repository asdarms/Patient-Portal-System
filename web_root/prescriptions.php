<?php
    require 'generic.php';
    $patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
    $prescriptions = null;

    if ($patient != null) {
        $patient_id = $patient['patient_id'];
        $prescriptions = getDatafromTable($conn, "prescription", ["patient_id" => $patient_id]);
    }

    $content_url = 'prescriptions-content.php';
?>

<title>Prescriptions</title>

<?php
    require 'landing-content.php';
?>