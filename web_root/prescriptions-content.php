<h1>Prescriptions</h1>
<?php
if ($prescriptions == null) {
    echo ("No prescriptions!");
} else {
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <td>Prescription ID</td>
                <td>Name</td>
                <td>Date Prescribed</td>
                <td>Dose</td>
                <td>Dosage</td>
                <td>Refill Time</td>
                <td>Patient ID</td>
                <td>Staff ID</td>
                <td>Bill ID</td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($prescriptions); $i++) {
                ?>
                <tr>
                    <td><?php echo $prescriptions[$i]['prescription_id'] ?></td>
                    <td><?php echo $prescriptions[$i]['name'] ?></td>
                    <td><?php echo $prescriptions[$i]['date_prescribed'] ?></td>
                    <td><?php echo $prescriptions[$i]['dose'] ?></td>
                    <td><?php echo $prescriptions[$i]['dosage'] ?></td>
                    <td><?php echo $prescriptions[$i]['refill_time'] ?></td>
                    <td><?php echo $prescriptions[$i]['patient_id'] ?></td>
                    <td><?php echo $prescriptions[$i]['staff_id'] ?></td>
                    <td><?php echo $prescriptions[$i]['bill_id'] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>