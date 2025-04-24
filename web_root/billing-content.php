<body class="bg-light">
    <div class="container py-4">
        <?php if ($query != -1): ?>
            <div class="alert alert-dark">
                <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
            </div>
        <?php endif; ?>
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
                                    <?php if ($mode == 'Admin'): ?>
                                        <th><i class="fas fa-clipboard-list me-1"></i>Bill ID</th>
                                    <?php endif; ?>
                                    <th><i class="fas fa-calendar-check me-1"></i>Date</th>
                                    <th class="text-end"><i class="fas fa-dollar-sign me-1"></i>Amount</th>
                                    <th><i class="fas fa-receipt me-1"></i>Description</th>
                                    <th><i class="fas fa-sticky-note me-1"></i>Notes</th>
                                    <?php if ($mode == 'Patient'): ?>
                                        <th><i class="fas fa-user-md me-1"></i>Staff Member</th>
                                    <?php elseif ($mode == 'Staff'): ?>
                                        <th><i class="fas fa-user-injured me-1"></i>Patient</th>
                                    <?php elseif ($mode == 'Admin'): ?>
                                        <th><i class="fas fa-user-injured me-1"></i>Patient ID</th>
                                        <th><i class="fas fa-user-md me-1"></i>Staff ID</th>
                                    <?php endif; ?>
                                    <?php if ($mode != 'Patient'): ?>
                                        <th><i class="fas fa-terminal me-1"></i>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bills as $bill): ?>
                                    <tr>
                                        <?php if ($mode == 'Admin'): ?>
                                            <td><?= htmlspecialchars($bill['bill_id']) ?></td>
                                        <?php endif; ?>
                                        <td><?= htmlspecialchars($bill['date']) ?></td>
                                        <td class="text-end">$<?= number_format($bill['amount'], 2) ?></td>
                                        <td><?= htmlspecialchars($bill['description']) ?></td>
                                        <td><?= htmlspecialchars($bill['notes']) ?></td>
                                        <?php if ($mode == 'Admin'): ?>
                                            <td><?= htmlspecialchars($bill['patient_id']) ?></td>
                                            <td><?= htmlspecialchars($bill['staff_id']) ?></td>
                                        <?php else: ?>
                                            <td><?= htmlspecialchars($bill['first_name'] . ' ' . $bill['last_name']) ?>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($mode != 'Patient'): ?>
                                            <td>
                                                <form method="POST">
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal" name="edit-button"
                                                        bill-id=<?= htmlspecialchars($bill['bill_id']) ?>
                                                        edit-date="<?= htmlspecialchars($bill['date']) ?>"
                                                        edit-amount="<?= htmlspecialchars($bill['amount']) ?>"
                                                        edit-description="<?= htmlspecialchars($bill['description']) ?>"
                                                        edit-notes="<?= htmlspecialchars($bill['notes']) ?>">Edit</button>
                                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal" name='delete-button'
                                                        bill-id=<?= htmlspecialchars($bill['bill_id']) ?>>Delete</button>
                                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                        bill
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" id="modal-text">
                                                                    Are you sure you want to delete this bill?
                                                                </div>
                                                                <input hidden name="delete-id" id="delete-id">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">No</button>
                                                                    <button type="submit" name="delete-bill"
                                                                        class="btn btn-primary">Yes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="editModal" tabindex="-1"
                                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">Edit bill
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Date</span>
                                                                        <input type="text" aria-label="Date" class="form-control"
                                                                            id="edit-date" name="edit-date">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Amount</span>
                                                                        <input type="text" aria-label="Amount" class="form-control"
                                                                            id="edit-amount" name="edit-amount">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Description</span>
                                                                        <input type="text" aria-label="Description"
                                                                            id="edit-description" class="form-control"
                                                                            name="edit-description">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Notes</span>
                                                                        <input type="text" aria-label="Notes" class="form-control"
                                                                            id="edit-notes" name="edit-notes">
                                                                    </div>
                                                                </div>
                                                                <input hidden name="edit-id" id="edit-id">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="edit-bill"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var editModal = document.getElementById('editModal')
                                                        editModal.addEventListener('show.bs.modal', function (event) {
                                                            var button = event.relatedTarget
                                                            var idField = document.getElementById('edit-id')
                                                            var id = button.getAttribute('bill-id')
                                                            idField.value = id
                                                            document.getElementById('edit-date').value = button.getAttribute('edit-date')
                                                            document.getElementById('edit-amount').value = button.getAttribute('edit-amount')
                                                            document.getElementById('edit-description').value = button.getAttribute('edit-description')
                                                            document.getElementById('edit-notes').value = button.getAttribute('edit-notes')
                                                        })
                                                        var deleteModal = document.getElementById('deleteModal')
                                                        deleteModal.addEventListener('show.bs.modal', function (event) {
                                                            var button = event.relatedTarget
                                                            var idField = document.getElementById('delete-id')
                                                            var id = button.getAttribute('bill-id')
                                                            idField.value = id
                                                        })
                                                    </script>
                                                </form>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if ($mode != 'Patient'): ?>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <?php if ($mode == 'Admin'): ?>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#createModal" name='create-button'>Create New</button>
                                                <div class="modal fade" id="createModal" tabindex="-1"
                                                    aria-labelledby="createModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="createModalLabel">Create
                                                                    bill
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Date</span>
                                                                    <input type="text" aria-label="Date" class="form-control"
                                                                        id="create-date" name="create-date"
                                                                        value="2025-04-01 0:00:00">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Amount</span>
                                                                    <input type="text" aria-label="Amount" class="form-control"
                                                                        id="create-amount" name="create-amount">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Description</span>
                                                                    <input type="text" aria-label="Description"
                                                                        id="create-description" class="form-control"
                                                                        name="create-description">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Notes</span>
                                                                    <input type="text" aria-label="Notes" class="form-control"
                                                                        id="create-notes" name="create-notes">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Patient ID</span>
                                                                    <input type="text" aria-label="Patient ID"
                                                                        class="form-control" id="create-patient"
                                                                        name="create-patient">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Staff ID</span>
                                                                    <input type="text" aria-label="Staff ID"
                                                                        class="form-control" id="create-staff"
                                                                        name="create-staff">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="create-bill"
                                                                    class="btn btn-primary">Create</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>