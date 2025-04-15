<?php
require 'functions.php';

$conn = OpenCon();

if (isset($_POST['delete-appointment'])) {
    $appointment_id = $_POST['appointment-id'];
    $query = deleteRecord($conn, 'appointment', $appointment_id);
    echo implode($query);
    //Header('Location: appointments.php');
} 
if (isset($_POST['edit-appointment'])) {
    Header('Location: appointments.php');
} 

?>