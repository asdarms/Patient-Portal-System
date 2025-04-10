<body class="bg-light">
    <div class="container py-3">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-user-md me-2"></i>Staff Information</h1>
            </div>
            <div class="card-body">
                <?php if (empty($staff_info)): ?>
                    <div class="alert alert-dark">
                        <i class="fas fa-info-circle me-2"></i>No staff records found.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-id-badge me-1"></i>Staff ID</th>
                                    <th><i class="fas fa-question me-1"></i>Employee Type</th>
                                    <th><i class="fas fa-calendar-day me-1"></i>Date Employed</th>
                                    <th><i class="fas fa-user me-1"></i>User ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($staff_info as $employee): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($employee['staff_id']) ?></td>
                                        <td><?= htmlspecialchars($employee['employee_type']) ?></td>
                                        <td><?= htmlspecialchars($employee['date_employed']) ?></td>
                                        <td><?= htmlspecialchars($employee['user_id']) ?></td>
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