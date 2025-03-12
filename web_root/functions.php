<?php
function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "rootPassword!";
        $db = "patient";
        if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db))
        {
            return (''. mysqli_connect_error());
        }else{
            return $conn;
        }
    }

function CloseCon($conn)
    {
        $conn->close();
    }

function registerUser($conn): int{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $access_level = 0;
    $rand_level = rand(1,10);
    $rand_level = $rand_level/100;

    //convert password to int then string, if converted successfully then if the first char contains a digit they will be equal and thus not be allowed 
    if(!(((string) (int) $password) === $password) && strlen($password) > 7){
        if(validatePhoneNumber($phoneNumber) !== false){
            $phoneNumber = validatePhoneNumber($phoneNumber);
            if(mysqli_num_rows(mysqli_query($conn, "select * from User WHERE phoneNumber='$phoneNumber'")) == 0){
                $hash = password_hash($password, `PASSWORD_BCRYPT`);
                do{
                    $userID = random_int(0, PHP_INT_MAX);
                }while(mysqli_num_rows(mysqli_query($conn, "select * from User WHERE userID = '$userID'"))>0);
                $query = "insert into User (userID, firstname, lastName, userName, email, phoneNumber, passwordHash) values ('$userID', '$firstName', '$lastName', '$userName', '$email', '$phoneNumber', '$hash')";
                    if (mysqli_query($conn, $query)){
                        sleep($rand_level);
                        return 0;
                    }
                    sleep($rand_level);
                    return 1;
            }
            sleep($rand_level);
            return 2;
        }
    }
    sleep($rand_level);
    return 3;
}

function validatePhoneNumber($phoneNumber) {
    // Remove all non-numeric characters
    $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);
    
    // Handle case where phone number might start with country code (e.g. +1)
    if (strlen($cleaned) == 11 && $cleaned[0] == '1') {
        $cleaned = substr($cleaned, 1);
    }
    
    // Check if it's exactly 10 digits
    if (strlen($cleaned) !== 10) {
        return false;
    }
    
    // Check that it's not all zeros or a known invalid pattern
    if ($cleaned == '0000000000' || $cleaned == '1111111111') {
        return false;
    }
    
    // Ensure the first digit isn't 0 or 1 (US area codes don't start with 0 or 1)
    if ($cleaned[0] == '0' || $cleaned[0] == '1') {
        return false;
    }
    
    // Return as a BIGINT (as string to avoid integer overflow in PHP)
    return intval($cleaned);
}

function loginUser($conn): int{
    $email = filter_var($_POST['email'], 
    FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $rand_level = rand(1,10);
    $rand_level = $rand_level/100;
    
    //check if email exists
    if(mysqli_num_rows($userData = mysqli_query($conn, "select * from user WHERE email='$email'"))>0){
        //if it does exist
        //check if password for it is correct
        $userData = mysqli_fetch_array($userData);
        if(password_verify($password, $userData['passwordHash'])){
            //if it is correct
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            // Set user data in session
            $_SESSION['userID'] = $userData['userID'];
            $_SESSION['userName'] = $userData['userName'];
            $_SESSION['loggedIn'] = true;
            sleep($rand_level);
            return 0;
        }
        sleep($rand_level);
        return 1;
    }
    sleep($rand_level);
    return 2;
}

