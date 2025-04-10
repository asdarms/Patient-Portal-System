<body class="bg-light">
    <div class="container  py-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-calendar-alt me-1 me-2"></i>Appointments</h1>
            </div>
            <div class="card-body">
                <?php if (empty($appointments)): ?>
                    <div class="alert alert-dark">
                        <i class="fas fa-info-circle me-2"></i>No Appointment at this time.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-id-badge me-1"></i>Appointment ID</th>
                                    <th><i class="fas fa-calendar me-1"></i>Date Time</th>
                                    <th><i class="fas fa-stethoscope me-1"></i>Appointment Type</th>
                                    <th><i class="fas fa-person-booth me-1"></i>Room Number</th>
                                    <th><i class="fas fa-sticky-note me-1"></i>Notes</th>
                                    <th><i class="fas fa-user-injured me-1"></i>Patient ID</th>
                                    <th><i class="fas fa-user-md me-1"></i>Staff ID</th>
                                    <th><i class="fas fa-id-badge me-1"></i>Bill ID</th>
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
                                        <td><?= htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']) ?></td>
                                        <td><?= htmlspecialchars($appointment['staff_id']) ?></td>
                                        <td><?= htmlspecialchars($appointment['bill_id']) ?></td>
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