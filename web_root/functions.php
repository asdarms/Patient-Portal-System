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
        $query = "insert into User (firstname, lastName, userName, email, phoneNumber, passwordHash) values ('$firstName', '$lastName', '$userName', '$email', '$phoneNumber', '$hash')";
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

