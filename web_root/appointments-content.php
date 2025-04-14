<script>
    var editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = editModal.querySelector('.modal-title')
        var modalBodyInput = editModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = deleteModal.querySelector('.modal-title')
        var modalBodyInput = deleteModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })


</script>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this appointment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-tertiary">Yes</button>
            </div>
        </div>
    </div>
</div>

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
                                <?php if ($mode == 'Admin'): ?>
                                    <th><i class="fas fa-id-badge me-1"></i>Appointment ID</th>
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-bs-whatever="Edit">Edit</button>
                                            <button type="button" class="btn btn-tertiary" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-bs-whatever="Delete">Delete</button>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>