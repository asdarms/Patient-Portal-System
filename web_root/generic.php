<?php
require 'header.php';
require 'functions.php';
$conn = OpenCon();
if (!isUserLoggedIn($conn)) {
    Header("Location: login.php");
}
$userData = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0];
$firstName = $userData['first_name'];
if (sizeOf(getDatafromTable($conn, "staff", ["user_id" => $_SESSION["user_id"]])) > 0) {
    $staff = True;
} else {
    $staff = False;
}
?>
