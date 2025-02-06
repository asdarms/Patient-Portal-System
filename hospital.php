<html>

<head>
    <title>Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Date of Birth</td>
                <td>Social Security Number</td>
            </tr>
        </thead>
        <tbody>
            <?php
            function OpenCon()
            {
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $db = "hospital";
                $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

                return $conn;
            }
            function CloseCon($conn)
            {
                $conn->close();
            }
            $conn = OpenCon();
            if ($result = $conn->query("SELECT * FROM patient")) {
            }
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['dob'] ?></td>
                    <td><?php echo $row['ssn'] ?></td>
                </tr>

                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>