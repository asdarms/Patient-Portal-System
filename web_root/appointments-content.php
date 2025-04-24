<div class="container py-4">
    <?php if ($query != -1): ?>
        <div class="alert alert-dark">
            <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
        </div>
    <?php endif; ?>
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
                                <?php if ($mode == 'Admin'): ?>
                                    <th><i class="fas fa-id-badge me-1"></i>ID</th>
                                <?php endif; ?>
                                <th><i class="fas fa-tag me-1"></i>Appointment Name</th>
                                <th><i class="fas fa-calendar me-1"></i>Date Time</th>
                                <th><i class="fas fa-stethoscope me-1"></i>Appointment Type</th>
                                <th><i class="fas fa-person-booth me-1"></i>Room Number</th>
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
                            <?php foreach ($appointments as $appointment): ?>
                                <tr>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($appointment['appointment_id']) ?></td>
                                    <?php endif; ?>
                                    <td><?= htmlspecialchars($appointment['appointment_name']) ?></td>
                                    <td><?= htmlspecialchars($appointment['datetime']) ?></td>
                                    <td><?= htmlspecialchars($appointment['appointment_type']) ?></td>
                                    <td><?= htmlspecialchars($appointment['room_number']) ?></td>
                                    <td><?= htmlspecialchars($appointment['notes']) ?></td>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($appointment['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($appointment['staff_id']) ?></td>
                                    <?php else: ?>
                                        <td><?= htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']) ?>
                                        </td>
                                    <?php endif; ?>
                                    <?php if ($mode != 'Patient'): ?>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal" name="edit-button"
                                                    appointment-id=<?= htmlspecialchars($appointment['appointment_id']) ?>
                                                    edit-name="<?= htmlspecialchars($appointment['appointment_name']) ?>"
                                                    edit-time="<?= htmlspecialchars($appointment['datetime']) ?>"
                                                    edit-type="<?= htmlspecialchars($appointment['appointment_type']) ?>"
                                                    edit-room="<?= htmlspecialchars($appointment['room_number']) ?>"
                                                    edit-notes="<?= htmlspecialchars($appointment['notes']) ?>">Edit</button>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" name='delete-button'
                                                    appointment-id=<?= htmlspecialchars($appointment['appointment_id']) ?>>Delete</button>
                                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete appointment
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" id="modal-text">
                                                                Are you sure you want to delete this appointment?
                                                            </div>
                                                            <input hidden name="delete-id" id="delete-id">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No</button>
                                                                <button type="submit" name="delete-appointment"
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
                                                                <h5 class="modal-title" id="editModalLabel">Edit appointment</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Appointment Name</span>
                                                                    <input type="text" aria-label="Appointment Name"
                                                                        class="form-control" id="edit-name" name="edit-name">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Date Time</span>
                                                                    <input type="text" aria-label="Date Time" class="form-control"
                                                                        id="edit-time" name="edit-time">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Appointment Type</span>
                                                                    <input type="text" aria-label="Appointment Type" id="edit-type"
                                                                        class="form-control" name="edit-type">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Room Number</span>
                                                                    <input type="text" aria-label="Room Number" class="form-control"
                                                                        id="edit-room" name="edit-room">
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
                                                                <button type="submit" name="edit-appointment"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    var editModal = document.getElementById('editModal')
                                                    editModal.addEventListener('show.bs.modal', function (event) {
                                                        var button = event.relatedTarget
                                                        var appointmentID = document.getElementById('edit-id')
                                                        var id = button.getAttribute('appointment-id')
                                                        appointmentID.value = id
                                                        document.getElementById('edit-name').value = button.getAttribute('edit-name')
                                                        document.getElementById('edit-time').value = button.getAttribute('edit-time')
                                                        document.getElementById('edit-type').value = button.getAttribute('edit-type')
                                                        document.getElementById('edit-room').value = button.getAttribute('edit-room')
                                                        document.getElementById('edit-notes').value = button.getAttribute('edit-notes')
                                                    })
                                                    var deleteModal = document.getElementById('deleteModal')
                                                    deleteModal.addEventListener('show.bs.modal', function (event) {
                                                        var button = event.relatedTarget
                                                        var appointmentID = document.getElementById('delete-id')
                                                        var id = button.getAttribute('appointment-id')
                                                        appointmentID.value = id
                                                    })
                                                </script>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
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
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <form method="POST">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#createModal" name='create-button'>Create New</button>
                                        <div class="modal fade" id="createModal" tabindex="-1"
                                            aria-labelledby="createModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createModalLabel">Create appointment
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Appointment Name</span>
                                                            <input type="text" aria-label="Appointment Name"
                                                                class="form-control" id="create-name" name="create-name">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Date Time</span>
                                                            <input type="text" aria-label="Date Time" class="form-control"
                                                                id="create-time" name="create-time" value="2025-01-01 00:00:00">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Appointment Type</span>
                                                            <input type="text" aria-label="Appointment Type"
                                                                id="create-type" class="form-control" name="create-type">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Room Number</span>
                                                            <input type="text" aria-label="Room Number" class="form-control"
                                                                id="create-room" name="create-room">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Notes</span>
                                                            <input type="text" aria-label="Notes" class="form-control"
                                                                id="create-notes" name="create-notes">
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
                                                        <button type="submit" name="create-appointment"
                                                            class="btn btn-primary">Create</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>