<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-flask me-2"></i>Billing</h1>
            </div>
            <div class="card-body">
                <?php if (empty($bills)): ?>
                    <div class="alert alert-dark">
                        <i class="fas fa-info-circle me-2"></i>No bills found.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-clipboard-list me-1"></i>Bill ID</th>
                                    <th><i class="fas fa-calendar-check me-1"></i>Date</th>
                                    <th class="text-end"><i class="fas fa-dollar-sign me-1"></i>Amount</th>
                                    <th><i class="fas fa-receipt me-1"></i>Description</th>
                                    <th><i class="fas fa-sticky-note me-1"></i>Notes</th>
                                    <th><i class="fas fa-user-injured me-1"></i>Patient ID</th>
                                    <th><i class="fas fa-user-md me-1"></i>Staff ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bills as $bill): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($bill['bill_id']) ?></td>
                                        <td><?= htmlspecialchars($bill['date']) ?></td>
                                        <td class="text-end">$<?= number_format($bill['amount'], 2) ?></td>
                                        <td><?= htmlspecialchars($bill['description']) ?></td>
                                        <td><?= htmlspecialchars($bill['notes']) ?></td>
                                        <td><?= htmlspecialchars($bill['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($bill['staff_id']) ?></td>
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