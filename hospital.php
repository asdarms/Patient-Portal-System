<html>

<head>
    <title>Patients</title>
    <link href="css/styles.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require_once 'functions.php'?>
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