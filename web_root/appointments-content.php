<h1>Appointments</h1>
<?php
if ($appointments == null) {
    echo ("No appointments!");
} else {
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <td>Appointment ID</td>
                <td>Datetime</td>
                <td>Appointment Type</td>
                <td>Room Number</td>
                <td>Notes</td>
                <td>Patient ID</td>
                <td>Staff ID</td>
                <td>Bill ID</td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($appointments); $i++) {
                ?>
                <tr>
                    <td><?php echo $appointments[$i]['appointment_id'] ?></td>
                    <td><?php echo $appointments[$i]['datetime'] ?></td>
                    <td><?php echo $appointments[$i]['appointment_type'] ?></td>
                    <td><?php echo $appointments[$i]['room_number'] ?></td>
                    <td><?php echo $appointments[$i]['notes'] ?></td>
                    <td><?php echo $appointments[$i]['patient_id'] ?></td>
                    <td><?php echo $appointments[$i]['staff_id'] ?></td>
                    <td><?php echo $appointments[$i]['bill_id'] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>