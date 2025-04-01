<?php
require_once 'functions.php';
session_start();
$conn = OpenCon();
logout($conn);
die();
?>