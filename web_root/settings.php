<?php
    require 'generic.php';
    $user_id = getDatafromTable($conn, "user", ["username" => $_SESSION['username']])[0]['user_id'];
    $content_url = 'settings-content.php';
?>

<title>User Settings</title>

<?php
    require 'landing-content.php';
?>