<div class="container py-4">
    <?php if ($query != -1): ?>
        <div class="alert alert-dark">
            <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
        </div>
    <?php endif; ?>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0"><i class="fas fa-user-md me-2"></i>Staff Information</h1>
        </div>
        <div class="card-body">
            <?php if (empty($employees)): ?>
                <div class="alert alert-dark">
                    <i class="fas fa-info-circle me-2"></i>No staff records found.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <?php if ($mode == 'Admin'): ?>
                                    <th><i class="fas fa-id-badge me-1"></i>Staff ID</th>
                                <?php endif; ?>
                                <th><i class="fas fa-user me-1"></i>Name</th>
                                <th><i class="fas fa-user-md me-1"></i>Employee Type</th>
                                <?php if ($mode != 'Patient'): ?>
                                    <th><i class="fas fa-calendar-day me-1"></i>Date Employed</th>
                                <?php endif; ?>
                                <th><i class="fas fa-phone me-1"></i>Phone Number</th>
                                <th><i class="fas fa-at me-1"></i>Email</th>
                                <?php if ($mode == 'Admin'): ?>
                                    <th><i class="fas fa-terminal me-1"></i>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($employee['staff_id']) ?></td>
                                    <?php endif; ?>
                                    <td><?= htmlspecialchars($employee['first_name'] . ' ' . $employee['last_name']) ?></td>
                                    <td><?= htmlspecialchars($employee['employee_type']) ?></td>
                                    <?php if ($mode != 'Patient'): ?>
                                        <td><?= htmlspecialchars($employee['date_employed']) ?></td>
                                    <?php endif; ?>
                                    <td><?= htmlspecialchars($employee['phone_number']) ?></td>
                                    <td><?= htmlspecialchars($employee['email']) ?></td>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal" name="edit-button"
                                                    staff-id=<?= htmlspecialchars($employee['staff_id']) ?>
                                                    first="<?= htmlspecialchars($employee['first_name']) ?>"
                                                    last="<?= htmlspecialchars($employee['last_name']) ?>"
                                                    employee-type="<?= htmlspecialchars($employee['employee_type']) ?>"
                                                    date="<?= htmlspecialchars($employee['date_employed']) ?>"
                                                    phone="<?= htmlspecialchars($employee['phone_number']) ?>"
                                                    email="<?= htmlspecialchars($employee['email']) ?>">Edit</button>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" name='delete-button'
                                                    staff-id=<?= htmlspecialchars($employee['staff_id']) ?>>Delete</button>
                                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete employee
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" id="modal-text">
                                                                Are you sure you want to delete this employee?
                                                            </div>
                                                            <input hidden name="delete-id" id="delete-id">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No</button>
                                                                <button type="submit" name="delete-staff"
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
                                                                <h5 class="modal-title" id="editModalLabel">Edit employee
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">First Name</span>
                                                                    <input type="text" aria-label="First Name" class="form-control"
                                                                        id="edit-first" name="edit-first">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Last Name</span>
                                                                    <input type="text" aria-label="Last Name" class="form-control"
                                                                        id="edit-last" name="edit-last">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Employee Type</span>
                                                                    <input type="text" aria-label="Employee Type" class="form-control"
                                                                        id="edit-type" name="edit-type">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Date Employed</span>
                                                                    <input type="text" aria-label="Date Employed"
                                                                        class="form-control" id="edit-date" name="edit-date">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Phone Number</span>
                                                                    <input type="text" aria-label="Phone Number"
                                                                        class="form-control" id="edit-phone" name="edit-phone">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Email</span>
                                                                    <input type="text" aria-label="Email" id="edit-email"
                                                                        class="form-control" name="edit-email">
                                                                </div>
                                                            </div>
                                                            <input hidden name="edit-id" id="edit-id">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="edit-staff"
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
                                                        var id = button.getAttribute('staff-id')
                                                        idField.value = id
                                                        document.getElementById('edit-first').value = button.getAttribute('first')
                                                        document.getElementById('edit-last').value = button.getAttribute('last')
                                                        document.getElementById('edit-type').value = button.getAttribute('employee-type')
                                                        document.getElementById('edit-date').value = button.getAttribute('date')
                                                        document.getElementById('edit-phone').value = button.getAttribute('phone')
                                                        document.getElementById('edit-email').value = button.getAttribute('email')
                                                    })
                                                    var deleteModal = document.getElementById('deleteModal')
                                                    deleteModal.addEventListener('show.bs.modal', function (event) {
                                                        var button = event.relatedTarget
                                                        var idField = document.getElementById('delete-id')
                                                        var id = button.getAttribute('staff-id')
                                                        idField.value = id
                                                    })
                                                </script>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($mode == 'Admin'): ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                                                employee
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <span class="input-group-text">User ID</span>
                                                                <input type="text" aria-label="User ID" class="form-control"
                                                                    id="create-id" name="create-id">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Employee Type</span>
                                                                <input type="text" aria-label="Employee Type"
                                                                    class="form-control" id="create-type" name="create-type" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Date Employed</span>
                                                                <input type="text" aria-label="Date Employed" class="form-control"
                                                                    id="create-date" name="create-date" value="2025-01-01">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="create-staff"
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