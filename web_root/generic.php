<?php
require 'header.php';
require 'functions.php';
$conn = OpenCon();
if (!isUserLoggedIn($conn)) {
    Header("Location: login.php");
}
$userData = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0];
$user_id = $userData['user_id'];
$firstName = $userData['first_name'];
if (sizeOf(getDatafromTable($conn, "staff", ["user_id" => $user_id])) > 0) {
    $staff = getDatafromTable($conn, "staff", ["user_id" => $user_id])[0];
    $patient = null;
} else {
    $patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
    $staff = null;
}
?>
