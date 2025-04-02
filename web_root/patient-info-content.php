<h1>Patient Info</h1>
<?php
if ($patient_info == null) {
    echo ("No patients!");
} else {
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <td>Patient ID</td>
                <td>DOB</td>
                <td>Sex</td>
                <td>Address</td>
                <td>Emergency Contact</td>
                <td>Medical Data</td>
                <td>Billing Info</td>
                <td>Insurance Info</td>
                <td>SSN</td>
                <td>User ID</td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($patient_info); $i++) {
                ?>
                <tr>
                    <td><?php echo $patient_info[$i]['patient_id'] ?></td>
                    <td><?php echo $patient_info[$i]['date_of_birth'] ?></td>
                    <td><?php echo $patient_info[$i]['sex'] ?></td>
                    <td><?php echo $patient_info[$i]['address'] ?></td>
                    <td><?php echo $patient_info[$i]['emergency_contact'] ?></td>
                    <td><?php echo $patient_info[$i]['medical_data'] ?></td>
                    <td><?php echo $patient_info[$i]['billing_info'] ?></td>
                    <td><?php echo $patient_info[$i]['insurance_info'] ?></td>
                    <td><?php echo $patient_info[$i]['ssn'] ?></td>
                    <td><?php echo $patient_info[$i]['user_id'] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>