<?php
require 'generic.php';
$query = 'SELECT * FROM user';
$users = queryAsArray($conn, $query);

$content_url = 'user-info-content.php';

$query = -1;
if (isset($_POST['delete-user'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'user', $id);
    switch ($query) {
        case 0:
            $query = 'User successfully deleted.';
            break;
        case 1:
            $query = 'Fail! Please delete all other references to user.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-user'])) {
    $user_id = $_POST['edit-id'];
    $first = $_POST['edit-first'];
    $last = $_POST['edit-last'];
    $phone = $_POST['edit-phone'];
    $email = $_POST['edit-email'];
    $username = $_POST['edit-username'];
    $bio = $_POST['edit-bio'];

    $query = "UPDATE user SET first_name = \"$first\", last_name = \"$last\", phone_number = \"$phone\", email = \"$email\", username = \"$username\", bio = \"$bio\" WHERE user_id = $user_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'User successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}

if (isset($_POST['create-user'])) {
    $query = registerUser($conn);
    switch ($query) {
        case 0:
            $query = 'User successfully created.';
            break;
        case 3:
            $query = 'Fail! Password must be at least 8 characters.';
            break;
        case 4:
            $query = 'Fail! Invalid phone number.';
            break;
        default:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}
?>

<title>User Info</title>

<?php
require 'landing-content.php';
?>