<h1>Appointments</h1>
<?php if (empty($appointments)): ?>
    <p>No appointments!</p>
<?php else: ?>
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
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= htmlspecialchars($appointment['appointment_id']) ?></td>
                    <td><?= htmlspecialchars($appointment['datetime']) ?></td>
                    <td><?= htmlspecialchars($appointment['appointment_type']) ?></td>
                    <td><?= htmlspecialchars($appointment['room_number']) ?></td>
                    <td><?= htmlspecialchars($appointment['notes']) ?></td>
                    <td><?= htmlspecialchars($appointment['patient_id']) ?></td>
                    <td><?= htmlspecialchars($appointment['staff_id']) ?></td>
                    <td><?= htmlspecialchars($appointment['bill_id']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>