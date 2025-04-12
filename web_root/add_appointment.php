<?php
header('Content-Type: application/json');

// Include your database connection
require_once 'header.php';
require_once 'functions.php';
$conn = OpenCon();


// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$userData = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0];
$user_id = $userData['user_id'];
$staffData = getDatafromTable($conn, "staff", ["user_id" => $user_id])[0];
$staff_id = $staffData['staff_id'];
// Debugging - log received data
error_log(print_r($data, true));

// Validate input
if (empty($data['title']) || empty($data['start'])) {
    echo json_encode([
        'success' => false, 
        'message' => 'Title and start time are required',
        'received_data' => $data // For debugging
    ]);
    exit;
}

do {
    $generated_appointment_id = random_int(0, 999999999);
} while (sizeof(getDatafromTable($conn, "appointment", ["appointment_id" => $generated_appointment_id])) > 0);
// Insert into database
$query = "INSERT INTO appointment (appointment_name, `datetime`, staff_id, appointment_id, patient_id) 
          VALUES ('".mysqli_real_escape_string($conn, $data['title'])."', 
                  '".mysqli_real_escape_string($conn, $data['start'])."', 
                  ".(int)$staff_id.",
                  ".(int)$generated_appointment_id.",
                  ".(int)$data['patient_id'].")";


if (mysqli_query($conn, $query)) {
    $id = mysqli_insert_id($conn);
    echo json_encode(['success' => true, 'id' => $id]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: '.mysqli_error($conn)]);
}

?>