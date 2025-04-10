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
if (sizeOf(getDatafromTable($conn, "staff", ["user_id" => $_SESSION["user_id"]])) > 0) {
    $adminMode = True;
    $staff = getDatafromTable($conn, "staff", ["user_id" => $user_id])[0];

} else {
    $adminMode = False;
    $patient = getDatafromTable($conn, "patient", ["user_id" => $user_id])[0];
}
?>
