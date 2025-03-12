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
    sleep($rand_level);
    return 3;
}

function loginUser($conn): int{
    $email = $_POST['email'];
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

