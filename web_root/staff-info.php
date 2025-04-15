<?php
    require 'generic.php';
    $staff_info = getDatafromTable($conn, "staff", ["*"]);
    $content_url = 'staff-info-content.php';
?>

<title>Staff Info</title>

<?php
    require 'landing-content.php';
?>