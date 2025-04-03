<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bio = trim($_POST['bio']);
    $password = trim($_POST['password']);
    $profilePic = $_FILES['profile-pic'];

    // Handle Profile Picture Upload
    if ($profilePic['size'] > 0) {
        $targetDir = "uploads/";
        $fileName = basename($profilePic["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($profilePic["tmp_name"], $targetFilePath)) {
                $updatePic = $conn->prepare("UPDATE user SET profile_picture = ? WHERE username = ?");
                $updatePic->bind_param("ss", $targetFilePath, $username);
                $updatePic->execute();
            }
        }
    }

    // Update Bio
    $updateBio = $conn->prepare("UPDATE user SET bio = ? WHERE username = ?");
    $updateBio->bind_param("ss", $bio, $username);
    $updateBio->execute();

    // Update Password if provided
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updatePassword = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
        $updatePassword->bind_param("ss", $hashedPassword, $username);
        $updatePassword->execute();
    }

    header("Location: settings.php?success=1");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Settings</title>
    <link href="../css/settings.css" rel="stylesheet">
    <link href="../css/buttons.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h2>User Settings</h2>
        <?php if (isset($_GET['success']))
            echo "<p style='color:green;'>Changes saved successfully!</p>"; ?>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio"
                    rows="4"><?php echo htmlspecialchars($userData['bio'] ?? ''); ?></textarea>
            </div>
            <div class="form-group">
                <label for="profile-pic">Profile Picture:</label>
                <input type="file" id="profile-pic" name="profile-pic">
                <?php if (!empty($userData['profile_picture'])): ?>
                    <br><img src="<?php echo $userData['profile_picture']; ?>" width="100" height="100"
                        style="border-radius:50%;">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">
            </div>
            <button class="btn btn-primary" type="submit">Save Changes</button>
        </form>
    </div>

</body>

</html>