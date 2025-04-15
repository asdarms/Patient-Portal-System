<?php
    require 'generic.php';

    if ($mode == 'Patient') {
        $patient_id = $patient['patient_id'];
        $query = 'SELECT * FROM appointment JOIN staff ON appointment.staff_id = staff.staff_id JOIN user ON user.user_id = staff.user_id WHERE appointment.patient_id = ' . $patient_id;
        $appointments = queryAsArray($conn, $query);
    } else if ($mode == 'Staff') {
        $staff_id = $staff['staff_id'];
        $query = 'SELECT * FROM appointment JOIN patient ON appointment.patient_id = patient.patient_id JOIN user ON user.user_id = patient.user_id WHERE appointment.staff_id = ' . $staff_id;
        $appointments = queryAsArray($conn, $query);
    } else if ($mode == 'Admin') {
        $appointments = getDatafromTable($conn, "appointment", ["*"]);
    }
    
    $content_url = 'appointments-content.php';
?>

<title>Appointments</title>

<?php
    require 'landing-content.php';
?>