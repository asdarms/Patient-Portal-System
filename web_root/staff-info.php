<?php
require 'generic.php';
$employees = null;
$query = 'SELECT * FROM staff JOIN user ON user.user_id = staff.user_id';
$employees = queryAsArray($conn, $query);

$content_url = 'staff-info-content.php';

$query = -1;
if (isset($_POST['delete-staff'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'staff', $id);
    switch ($query) {
        case 0:
            $query = 'Employee successfully deleted.';
            break;
        case 1:
            $query = 'Fail! Please delete all other references to employee.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-staff'])) {
    $staff_id = $_POST['edit-id'];
    $first = $_POST['edit-first'];
    $last = $_POST['edit-last'];
    $date = $_POST['edit-date'];
    $phone = $_POST['edit-phone'];
    $email = $_POST['edit-email'];

    $query = "UPDATE staff, user SET first_name = \"$first\", last_name = \"$last\", date_employed = \"$date\", phone_number = \"$phone\", email = \"$email\" WHERE staff.user_id = user.user_id AND staff_id = $staff_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Employee successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}
?>

<title>Staff Info</title>

<?php
require 'landing-content.php';
?>