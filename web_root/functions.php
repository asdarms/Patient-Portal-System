<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $filename = 'dbpass.pass';
        if (file_exists($filename)) {
            $dbpass = file_get_contents($filename);
        } else {
            $dbpass = '';
        }
        $db = "hospital";
        if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db)) {
            return ('' . mysqli_connect_error());
        } else {
            return $conn;
        }
    }

    function CloseCon($conn)
    {
        $conn->close();
    }

    function getDatafromTable(mysqli $conn, string $table, array $searchConditions, $booleanOperations = "AND", $query = "select * from "): int|array
    {
        $type = gettype($booleanOperations);
        #check for data type
        if ($type == "array") {
            if (sizeof($booleanOperations) > sizeof($searchConditions)) {
                printf("There should be more search conditions than boolean operations");
                return 100;
            }
            #check for valid boolean operations
            for ($i = 0; $i < sizeof($booleanOperations); $i++) {
                if (!in_array(strtoupper($booleanOperations[$i]), ["OR", "AND", "XOR"])) {
                    printf("Error getting data: incorrect boolean operator in '$booleanOperations'");
                    return 101;
                }
            }

            #apply default AND
            for ($i = 0; $i < sizeof($searchConditions); $i++) {
                if ($i < sizeof($booleanOperations)) {
                    $operations[$i] = strtoupper($booleanOperations[$i]);
                } else {
                    $operations[$i] = "AND";
                }
            }
        } else if (!($type == "string")) {
            printf("Error incorrect data type for '$booleanOperations'");
            return 103;
        } else {
            if (in_array(strtoupper($booleanOperations), ["OR", "AND", "XOR"])) {
                for ($i = 0; $i < sizeof($searchConditions); $i++) {
                    $operations[$i] = strtoupper($booleanOperations);
                }
            }
        }

        $query .= $table;

        if (sizeof($searchConditions) > 0) {
            $query .= " WHERE ";
        }

        $i = 0;
        foreach ($searchConditions as $key => $value) {
            $query .= $key . " = " . '\'' . $value . '\'';
            $query .= ' ' . $operations[$i] . ' ';
            $i++;
        }
        $query = substr($query, 0, strlen($query) - (strlen($operations[sizeof($operations) - 1]) + 2)) . ';';
        $result = mysqli_query($conn, $query);
        if ($result === false) {
            printf("Error message: %s\n", mysqli_error($conn));
            printf($query);
            return 201;
        } else if ($result === true) {
            return 1;
        }
        $results = mysqli_fetch_all($result, MYSQLI_BOTH);
        // printf($query);
        // die();
        return $results;
    }

    function registerUser($conn): int
    {
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $username = $_POST['userName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $access_level = 0;
        $rand_level = rand(1, 10);
        $rand_level = $rand_level / 100;


        if (strlen($password) > 7) {
            if (validatePhoneNumber($phoneNumber) !== false) {
                $phoneNumber = validatePhoneNumber($phoneNumber);
                $userData = getDatafromTable($conn, "user", ["phone_number" => $phoneNumber, "email" => $email, "username" => $username], "OR");
                if (sizeof($userData) == 0) {
                    $hash = password_hash($password, `PASSWORD_BCRYPT`);
                    //do {
                    //    $userID = random_int(0, PHP_INT_MAX);
                    //} while (sizeof(getDatafromTable($conn, "user", ["user_id" => $userID])) > 0);
                    //$query = "insert into user (user_id, first_name, last_name, username, email, phone_number, password_hash) values ('$userID', '$first_name', '$last_name', '$username', '$email', '$phoneNumber', '$hash')";
                    $query = "insert into user (first_name, last_name, username, email, phone_number, password_hash) values ('$first_name', '$last_name', '$username', '$email', '$phoneNumber', '$hash')";
                    if (mysqli_query($conn, $query)) {
                        sleep($rand_level);
                        return 0;
                    }
                    sleep($rand_level);
                    return 1;
                }
                sleep($rand_level);
                return 2;
            }
            return 4;
        }
        sleep(seconds: $rand_level);
        return 3;
    }

    function validatePhoneNumber($phoneNumber)
    {
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

    function loginUser($conn): int
    {
        $email = filter_var(
            $_POST['email'],
            FILTER_SANITIZE_EMAIL
        );
        $password = $_POST['password'];
        $rand_level = rand(1, 10);
        $rand_level = $rand_level / 100;
        $rememberMe = $_POST['rememberMe'];

        $userData = getDatafromTable($conn, "user", ["email" => $email]);

        //check if email exists
        if (sizeof($userData) > 0) {
            //if it does exist
            //check if password for it is correct

            $userData = $userData[0];
            // printf($userData['password_hash']);
            // die();
            if (password_verify($password, $userData['password_hash'])) {
                //if it is correct
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                // Set user data in session
                if ($rememberMe == "checked") {
                    rememberMe($conn, $userData['user_id'], 60);
                }
                setUser($userData);
                sleep($rand_level);
                return 0;
            }
            sleep($rand_level);
            return 1;
        }
        sleep($rand_level);
        return 2;
    }

    function isUserLoggedIn($conn): bool
    {
        if (isset($_SESSION['username'])) {
            return true;
        }
        // check the remember_me in cookie
        $token = filter_input(INPUT_COOKIE, 'rememberMe', FILTER_SANITIZE_STRING);

        if ($token && tokenIsValid($conn, $token)) {

            $user = findUserByToken($conn, $token);

            if ($user) {
                return setUser($user);
            }
        }
        return false;
    }

    /**
     * Removes session data to log a user out. 
     * 
     * @param mixed $conn
     * @return int 0 if successful,
     * 1 if the session_unset() or session_regenerate_id() are false,
     * and 2 if the user isnt logged in
     */
    function logoutUser($conn): int
    {

        if (isUserLoggedIn($conn)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (session_unset() && session_regenerate_id(true)) {
                return 0;
            }
            return 1;
        }
        return 2;

    }

    function generateTokens(): array
    {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));

        return [$selector, $validator, $selector . ':' . $validator];
    }

    function parseToken(string $token): ?array
    {
        $parts = explode(':', $token);

        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }

    function insertUserToken($conn, int $userID, string $selector, string $hashed_validator, string $expiry): bool
    {
        do {
            $tokenID = random_int(0, 10000000);
        } while (sizeof(getDatafromTable($conn, "user_token", ["token_id" => $tokenID])) > 0);

        $sql = "INSERT INTO user_token(token_id, user_id, selector, hashed_validator, expiry)
                VALUES('$tokenID', '$userID', '$selector', '$hashed_validator', '$expiry')";

        if (mysqli_query($conn, $sql)) {
            return true;
        }
        return false;
    }

    function findUserTokenBySelector($conn, string $selector)
    {

        $sql = "SELECT token_id, selector, hashed_validator, user_id, expiry
                    FROM user_token
                    WHERE selector = '$selector' AND
                        expiry >= now()
                    LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }

        return false;
    }                   

    function deleteUserToken($conn, int $user_id): bool
    {
        $sql = "DELETE FROM user_token WHERE user_id = '$user_id'";

        if (mysqli_query($conn, $sql)) {
            return true;
        }
        return false;

    }

    function findUserByToken($conn, string $token)
    {
        $tokens = parseToken($token);

        if (!$tokens) {
            return null;
        }

        $sql = "SELECT user.user_id, username
                FROM user
                INNER JOIN user_token ON user_token.user_id = user.user_id
                WHERE selector = '$tokens[0]' AND
                    expiry > now()
                LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }

        return false;
    }

    function tokenIsValid($conn, string $token): bool
    {
        // parse the token to get the selector and validator 

        [$selector, $validator] = parseToken($token);
        $tokens = findUserTokenBySelector($conn, $selector);
        if (!$tokens) {
            return false;
        }

        return password_verify($validator, $tokens['hashed_validator']);
    }

    function setUser(array $user): bool
    {
        // prevent session fixation attack
        if (session_regenerate_id()) {
            // set username & id in the session
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['user_id'];
            return true;
        }

        return false;
    }

    function rememberMe($conn, int $user_id, int $day = 30)
    {
        [$selector, $validator, $token] = generateTokens();

        // remove all existing token associated with the user id
        deleteUserToken($conn, $user_id);

        // set expiration date
        $expired_seconds = time() + 60 * 60 * 24 * $day;

        // insert a token to the database
        $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s', $expired_seconds);

        if (insertUserToken($conn, $user_id, $selector, $hash_validator, $expiry)) {
            setcookie('rememberMe', $token, $expired_seconds);
        }
    }

    function logout($conn): void
    {
        if (isUserLoggedIn($conn)) {

            // delete the user token
            deleteUserToken($conn, $_SESSION['user_id']);

            // delete session
            unset($_SESSION['username'], $_SESSION['user_id`']);

            // remove the remember_me cookie
            if (isset($_COOKIE['rememberMe'])) {
                unset($_COOKIE['rememberMe']);
                setcookie('rememberMe', null, -1);
            }

            // remove all session data
            session_destroy();

            // redirect to the login page
            Header('Location: login.php');
        }
    }

    function queryAsArray($conn, $query): array
    {
        return $conn->query($query)->fetch_all(MYSQLI_BOTH);
    }

    function deleteRecord($conn, $table, $id): array
    {
        $col = $table . '_id';
        return $conn->query("DELETE FROM $table WHERE $col = $id");
    }
?>