<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-flask me-2"></i>Lab Orders and Results</h1>
            </div>
            <div class="card-body">
                <?php if (empty($lab_orders)): ?>
                    <div class="alert alert-dark">
                        <i class="fas fa-info-circle me-2"></i>No lab orders found.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-id-badge me-1"></i>Order ID</th>
                                    <th><i class="fas fa-map-marker-alt me-1"></i>Location</th>
                                    <th><i class="fas fa-vial me-1"></i>Type</th>
                                    <th class="text-end"><i class="fas fa-dollar-sign me-1"></i>Estimated Cost</th>
                                    <th><i class="fas fa-sticky-note me-1"></i>Notes</th>
                                    <th><i class="fas fa-calendar-check me-1"></i>Appointment ID</th>
                                    <th><i class="fas fa-user-injured me-1"></i>Patient ID</th>
                                    <th><i class="fas fa-user-md me-1"></i>Staff ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lab_orders as $order): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($order['order_id']) ?></td>
                                        <td><?= htmlspecialchars($order['location']) ?></td>
                                        <td><?= htmlspecialchars($order['type']) ?></td>
                                        <td class="text-end">$<?= number_format($order['estimated_cost'], 2) ?></td>
                                        <td><?= htmlspecialchars($order['notes']) ?></td>
                                        <td><?= htmlspecialchars($order['appointment_id']) ?></td>
                                        <td><?= htmlspecialchars($order['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($order['staff_id']) ?></td>
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