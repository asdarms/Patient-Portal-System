<!DOCTYPE html>
<html>
<head>
    <title>User Settings</title>
    <link href="../css/settings.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h2>User Settings</h2>
        <form>
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" rows="4" placeholder="Enter your bio..."></textarea>
            </div>
            <div class="form-group">
                <label for="profile-pic">Profile Picture:</label>
                <input type="file" id="profile-pic" name="profile-pic">
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>