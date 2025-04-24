<div class="container py-4">
    <?php if ($query != -1): ?>
        <div class="alert alert-dark">
            <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
        </div>
    <?php endif; ?>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0"><i class="fas fa-prescription me-2"></i>Prescriptions</h1>
        </div>
        <div class="card-body">
            <?php if (empty($prescriptions) && $mode == 'Patient'): ?>
                <div class="alert alert-dark">
                    <i class="fas fa-info-circle me-2"></i>No prescriptions at this time.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <?php if ($mode == 'Admin'): ?>
                                    <th><i class="fas fa-id-badge me-1"></i>Prescription ID</th>
                                <?php endif; ?>
                                <th><i class="fas fa-prescription-bottle me-1"></i>Name</th>
                                <th><i class="fas fa-calendar-alt me-1"></i></i>Date Prescribed</th>
                                <th><i class="fas fa-pills me-1"></i></i>Dose</th>
                                <th><i class="fas fa-sticky-note me-1"></i>Dosage</th>
                                <th><i class="fas fa-clock me-1"></i>Refill Time</th>
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
                            <?php foreach ($prescriptions as $prescription): ?>
                                <tr>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($prescription['prescription_id']) ?></td>
                                    <?php endif; ?>
                                    <td><?= htmlspecialchars($prescription['name']) ?></td>
                                    <td><?= htmlspecialchars($prescription['date_prescribed']) ?></td>
                                    <td><?= htmlspecialchars($prescription['dose']) ?></td>
                                    <td><?= htmlspecialchars($prescription['dosage']) ?></td>
                                    <td><?= htmlspecialchars($prescription['refill_time']) ?></td>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($prescription['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($prescription['staff_id']) ?></td>
                                    <?php else: ?>
                                        <td><?= htmlspecialchars($prescription['first_name'] . ' ' . $prescription['last_name']) ?>
                                        </td>
                                    <?php endif; ?>
                                    <?php if ($mode != 'Patient'): ?>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal" name="edit-button"
                                                    prescription-id=<?= htmlspecialchars($prescription['prescription_id']) ?>
                                                    edit-name="<?= htmlspecialchars($prescription['name']) ?>"
                                                    edit-date="<?= htmlspecialchars($prescription['date_prescribed']) ?>"
                                                    edit-dose="<?= htmlspecialchars($prescription['dose']) ?>"
                                                    edit-dosage="<?= htmlspecialchars($prescription['dosage']) ?>"
                                                    edit-refill="<?= htmlspecialchars($prescription['refill_time']) ?>">Edit</button>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" name='delete-button'
                                                    prescription-id=<?= htmlspecialchars($prescription['prescription_id']) ?>>Delete</button>
                                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                    prescription
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" id="modal-text">
                                                                Are you sure you want to delete this prescription?
                                                            </div>
                                                            <input hidden name="delete-id" id="delete-id">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No</button>
                                                                <button type="submit" name="delete-prescription"
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
                                                                <h5 class="modal-title" id="editModalLabel">Edit prescription
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Prescription Name</span>
                                                                    <input type="text" aria-label="Prescription Name"
                                                                        class="form-control" id="edit-name" name="edit-name">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Date Prescribed</span>
                                                                    <input type="text" aria-label="Date Prescribed"
                                                                        class="form-control" id="edit-date" name="edit-date">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Dose</span>
                                                                    <input type="text" aria-label="Dose" id="edit-dose"
                                                                        class="form-control" name="edit-dose">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Dosage</span>
                                                                    <input type="text" aria-label="Dosage" class="form-control"
                                                                        id="edit-dosage" name="edit-dosage">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Refill Time</span>
                                                                    <input type="text" aria-label="Refill Time" class="form-control"
                                                                        id="edit-refill" name="edit-refill">
                                                                </div>
                                                            </div>
                                                            <input hidden name="edit-id" id="edit-id">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="edit-prescription"
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
                                                        var id = button.getAttribute('prescription-id')
                                                        idField.value = id
                                                        document.getElementById('edit-name').value = button.getAttribute('edit-name')
                                                        document.getElementById('edit-date').value = button.getAttribute('edit-date')
                                                        document.getElementById('edit-dose').value = button.getAttribute('edit-dose')
                                                        document.getElementById('edit-dosage').value = button.getAttribute('edit-dosage')
                                                        document.getElementById('edit-refill').value = button.getAttribute('edit-refill')
                                                    })
                                                    var deleteModal = document.getElementById('deleteModal')
                                                    deleteModal.addEventListener('show.bs.modal', function (event) {
                                                        var button = event.relatedTarget
                                                        var idField = document.getElementById('delete-id')
                                                        var id = button.getAttribute('prescription-id')
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
                                                                prescription
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <span class="input-group-text">Prescription Name</span>
                                                                <input type="text" aria-label="Prescription Name"
                                                                    class="form-control" id="create-name" name="create-name">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Date Prescribed</span>
                                                                <input type="text" aria-label="Date Prescribed"
                                                                    class="form-control" id="create-date" name="create-date"
                                                                    value="2025-04-01">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Dose</span>
                                                                <input type="text" aria-label="Dose" id="create-dose"
                                                                    class="form-control" name="create-dose">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Dosage</span>
                                                                <input type="text" aria-label="Dosage" class="form-control"
                                                                    id="create-dosage" name="create-dosage">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Refill Time</span>
                                                                <input type="text" aria-label="Refill Time" class="form-control"
                                                                    id="create-refill" name="create-refill" value="2025-04-01">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Patient ID</span>
                                                                <input type="text" aria-label="Patient ID" class="form-control"
                                                                    id="create-patient" name="create-patient">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Staff ID</span>
                                                                <input type="text" aria-label="Staff ID" class="form-control"
                                                                    id="create-staff" name="create-staff">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="create-prescription"
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