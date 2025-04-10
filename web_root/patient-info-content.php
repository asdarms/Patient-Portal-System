<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-user-injured me-2"></i>Patient Information</h1>
            </div>
            <div class="card-body">
                <?php if (empty($patient_info)): ?>
                    <div class="alert alert-dark">
                        <i class="fas fa-info-circle me-2"></i>No patient records found.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-id-badge me-1"></i>Patient ID</th>
                                    <th><i class="fas fa-birthday-cake me-1"></i>DOB</th>
                                    <th><i class="fas fa-venus-mars me-1"></i>Sex</th>
                                    <th><i class="fas fa-home me-1"></i>Address</th>
                                    <th><i class="fas fa-phone-alt me-1"></i>Emergency Contact</th>
                                    <th><i class="fas fa-file-medical me-1"></i>Medical Data</th>
                                    <th><i class="fas fa-file-invoice-dollar me-1"></i>Billing Info</th>
                                    <th><i class="fas fa-shield-alt me-1"></i>Insurance Info</th>
                                    <th><i class="fas fa-id-card me-1"></i>SSN</th>
                                    <th><i class="fas fa-user me-1"></i>User ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($patient_info as $patient): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($patient['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($patient['date_of_birth']) ?></td>
                                        <td><?= htmlspecialchars($patient['sex']) ?></td>
                                        <td><?= htmlspecialchars($patient['address']) ?></td>
                                        <td><?= htmlspecialchars($patient['emergency_contact']) ?></td>
                                        <td><?= htmlspecialchars($patient['medical_data']) ?></td>
                                        <td><?= htmlspecialchars($patient['billing_info']) ?></td>
                                        <td><?= htmlspecialchars($patient['insurance_info']) ?></td>
                                        <td><?= htmlspecialchars($patient['ssn']) ?></td>
                                        <td><?= htmlspecialchars($patient['user_id']) ?></td>
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