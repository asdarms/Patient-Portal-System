

<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-prescription me-2"></i>Prescriptions</h1>
            </div>
            <div class="card-body">
                <?php if (empty($prescriptions)): ?>
                    <div class="alert alert-dark">
                        <i class="fas fa-info-circle me-2"></i>No prescriptions at this time.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-id-badge me-1"></i>Prescription ID</th>
                                    <th><i class="fas fa-prescription-bottle me-1"></i>Name</th>
                                    <th><i class="fas fa-calendar-alt me-1"></i></i>Date Prescribed</th>
                                    <th><i class="fas fa-pills me-1"></i></i>Dose</th>
                                    <th><i class="fas fa-sticky-note me-1"></i>Dosage</th>
                                    <th><i class="fas fa-clock me-1"></i>Refill Time</i>
                                    <th><i class="fas fa-user-injured me-1"></i>Patient ID</th>
                                    <th><i class="fas fa-user-md me-1"></i>Staff ID</th>
                                    <th><i class="fas fa-id-badge me-1"></i>Bill ID</th>
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
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>