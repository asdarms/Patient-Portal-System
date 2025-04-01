<?php

require 'header.php';
require 'functions.php';
$conn = OpenCon();
if (!isUserLoggedIn($conn)) {
    Header("Location: login.php");
}
if (sizeof(getDatafromTable($conn, "staff", ["user_id" => $_SESSION["user_id"]])) > 0) {
    header("Location: staff-landing.php");
    die();
}
header("Location: patient-landing.php");
die();



?>