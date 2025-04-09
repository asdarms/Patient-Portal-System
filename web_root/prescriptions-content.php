<h1>Prescriptions</h1>
<?php if (empty($prescriptions)): ?>
    <p>No prescriptions!</p>
<?php else: ?>
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
            <?php foreach ($prescriptions as $prescription): ?>
                <tr>
                    <td><?= htmlspecialchars($prescription['prescription_id']) ?></td>
                    <td><?= htmlspecialchars($prescription['name']) ?></td>
                    <td><?= htmlspecialchars($prescription['date_prescribed']) ?></td>
                    <td><?= htmlspecialchars($prescription['dose']) ?></td>
                    <td><?= htmlspecialchars($prescription['dosage']) ?></td>
                    <td><?= htmlspecialchars($prescription['refill_time']) ?></td>
                    <td><?= htmlspecialchars($prescription['patient_id']) ?></td>
                    <td><?= htmlspecialchars($prescription['staff_id']) ?></td>
                    <td><?= htmlspecialchars($prescription['bill_id']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>