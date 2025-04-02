<h1>Lab Orders and Results</h1>
<?php
if ($lab_orders == null) {
    echo ("No lab orders!");
} else {
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <td>Order ID</td>
                <td>Location</td>
                <td>Type</td>
                <td>Estimated Cost</td>
                <td>Notes</td>
                <td>Appointment ID</td>
                <td>Patient ID</td>
                <td>Staff ID</td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($lab_orders); $i++) {
                ?>
                <tr>
                    <td><?php echo $lab_orders[$i]['order_id'] ?></td>
                    <td><?php echo $lab_orders[$i]['location'] ?></td>
                    <td><?php echo $lab_orders[$i]['type'] ?></td>
                    <td><?php echo $lab_orders[$i]['estimated_cost'] ?></td>
                    <td><?php echo $lab_orders[$i]['notes'] ?></td>
                    <td><?php echo $lab_orders[$i]['appointment_id'] ?></td>
                    <td><?php echo $lab_orders[$i]['patient_id'] ?></td>
                    <td><?php echo $lab_orders[$i]['staff_id'] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>