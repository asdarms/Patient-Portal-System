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

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">User Settings</h3></div>
                    <div class="card-body">
                        <?php if (isset($_GET['success'])): ?>
                            <div class="alert alert-dark">Changes saved successfully!</div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="bio" name="bio" placeholder="Your bio here..." style="height: 100px"><?php echo htmlspecialchars($userData['bio'] ?? ''); ?></textarea>
                                <label for="bio">Bio</label>
                            </div>

                            <div class="mb-3">
                                <label for="profile-pic" class="form-label">Profile Picture</label>
                                <input class="form-control" type="file" id="profile-pic" name="profile-pic">
                                <?php if (!empty($userData['profile_picture'])): ?>
                                    <div class="mt-2">
                                        <img src="<?php echo $userData['profile_picture']; ?>" width="100" height="100" style="border-radius:50%;\">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Enter a new password">
                                <label for="password">New Password:</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <input class="btn btn-primary" type="submit" value="Save Changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>