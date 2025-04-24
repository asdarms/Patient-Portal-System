<div class="container py-4 mw-100">
    <?php if ($query != -1): ?>
        <div class="alert alert-dark">
            <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
        </div>
    <?php endif; ?>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0"><i class="fas fa-user-injured me-2"></i>Patient Information</h1>
        </div>
        <div class="card-body">
            <?php if (empty($patients)): ?>
                <div class="alert alert-dark">
                    <i class="fas fa-info-circle me-2"></i>No patients at this time.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-id-badge me-1"></i>Patient ID</th>
                                <th><i class="fas fa-user me-1"></i>Name</th>
                                <th><i class="fas fa-birthday-cake me-1"></i>DOB</th>
                                <th><i class="fas fa-venus-mars me-1"></i>Sex</th>
                                <th><i class="fas fa-home me-1"></i>Address</th>
                                <th><i class="fas fa-phone-alt me-1"></i>Emergency Contact</th>
                                <th><i class="fas fa-file-medical me-1"></i>Medical Data</th>
                                <th><i class="fas fa-file-invoice-dollar me-1"></i>Billing Info</th>
                                <th><i class="fas fa-shield-alt me-1"></i>Insurance Info</th>
                                <th><i class="fas fa-id-card me-1"></i>SSN</th>
                                <th><i class="fas fa-phone me-1"></i>Phone Number</th>
                                <th><i class="fas fa-at me-1"></i>Email</th>
                                <th><i class="fas fa-terminal me-1"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient): ?>
                                <tr>
                                    <td><?= htmlspecialchars($patient['patient_id']) ?></td>
                                    <td><?= htmlspecialchars($patient['first_name'] . ' ' . $patient['last_name']) ?></td>
                                    <td><?= htmlspecialchars($patient['date_of_birth']) ?></td>
                                    <td><?= htmlspecialchars($patient['sex']) ?></td>
                                    <td><?= htmlspecialchars($patient['address']) ?></td>
                                    <td><?= htmlspecialchars($patient['emergency_contact']) ?></td>
                                    <td><?= htmlspecialchars($patient['medical_data']) ?></td>
                                    <td><?= htmlspecialchars($patient['billing_info']) ?></td>
                                    <td><?= htmlspecialchars($patient['insurance_info']) ?></td>
                                    <td><?= htmlspecialchars($patient['ssn']) ?></td>
                                    <td><?= htmlspecialchars($patient['phone_number']) ?></td>
                                    <td><?= htmlspecialchars($patient['email']) ?></td>
                                    <td>
                                        <form method="POST">
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#editModal" name="edit-button"
                                                patient-id=<?= htmlspecialchars($patient['patient_id']) ?>
                                                dob="<?= htmlspecialchars($patient['date_of_birth']) ?>"
                                                sex="<?= htmlspecialchars($patient['sex']) ?>"
                                                address="<?= htmlspecialchars($patient['address']) ?>"
                                                emergency="<?= htmlspecialchars($patient['emergency_contact']) ?>"
                                                medical="<?= htmlspecialchars($patient['medical_data']) ?>"
                                                billing="<?= htmlspecialchars($patient['billing_info']) ?>"
                                                insurance="<?= htmlspecialchars($patient['insurance_info']) ?>"
                                                ssn="<?= htmlspecialchars($patient['ssn']) ?>"
                                                first="<?= htmlspecialchars($patient['first_name']) ?>"
                                                last="<?= htmlspecialchars($patient['last_name']) ?>"
                                                phone="<?= htmlspecialchars($patient['phone_number']) ?>"
                                                email="<?= htmlspecialchars($patient['email']) ?>">Edit</button>
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" name='delete-button'
                                                patient-id=<?= htmlspecialchars($patient['patient_id']) ?>>Delete</button>
                                            <div class="modal fade" id="deleteModal" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete patient
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="modal-text">
                                                            Are you sure you want to delete this patient?
                                                        </div>
                                                        <input hidden name="delete-id" id="delete-id">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <button type="submit" name="delete-patient"
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
                                                            <h5 class="modal-title" id="editModalLabel">Edit patient
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
                                                                <span class="input-group-text">Date of Birth</span>
                                                                <input type="text" aria-label="Date of Birth"
                                                                    class="form-control" id="edit-dob" name="edit-dob">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Sex</span>
                                                                <input type="text" aria-label="Sex" class="form-control"
                                                                    id="edit-sex" name="edit-sex">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Address</span>
                                                                <input type="text" aria-label="Address" id="edit-address"
                                                                    class="form-control" name="edit-address">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Emergency Contact</span>
                                                                <input type="text" aria-label="Emergency Contact"
                                                                    class="form-control" id="edit-emergency"
                                                                    name="edit-emergency">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Medical Data</span>
                                                                <input type="text" aria-label="Medical Data"
                                                                    class="form-control" id="edit-medical" name="edit-medical">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Billing Info</span>
                                                                <input type="text" aria-label="Billing Info"
                                                                    class="form-control" id="edit-billing" name="edit-billing">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Insurance Info</span>
                                                                <input type="text" aria-label="Insurance Info"
                                                                    class="form-control" id="edit-insurance"
                                                                    name="edit-insurance">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">SSN</span>
                                                                <input type="text" aria-label="SSN" class="form-control"
                                                                    id="edit-ssn" name="edit-ssn">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Phone Number</span>
                                                                <input type="text" aria-label="Phone Number"
                                                                    class="form-control" id="edit-phone" name="edit-phone">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Email</span>
                                                                <input type="text" aria-label="Email" class="form-control"
                                                                    id="edit-email" name="edit-email">
                                                            </div>
                                                        </div>
                                                        <input hidden name="edit-id" id="edit-id">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit-patient"
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
                                                    var id = button.getAttribute('patient-id')
                                                    idField.value = id
                                                    document.getElementById('edit-dob').value = button.getAttribute('dob')
                                                    document.getElementById('edit-sex').value = button.getAttribute('sex')
                                                    document.getElementById('edit-address').value = button.getAttribute('address')
                                                    document.getElementById('edit-emergency').value = button.getAttribute('emergency')
                                                    document.getElementById('edit-medical').value = button.getAttribute('medical')
                                                    document.getElementById('edit-billing').value = button.getAttribute('billing')
                                                    document.getElementById('edit-insurance').value = button.getAttribute('insurance')
                                                    document.getElementById('edit-ssn').value = button.getAttribute('ssn')
                                                    document.getElementById('edit-first').value = button.getAttribute('first')
                                                    document.getElementById('edit-last').value = button.getAttribute('last')
                                                    document.getElementById('edit-phone').value = button.getAttribute('phone')
                                                    document.getElementById('edit-email').value = button.getAttribute('email')

                                                })
                                                var deleteModal = document.getElementById('deleteModal')
                                                deleteModal.addEventListener('show.bs.modal', function (event) {
                                                    var button = event.relatedTarget
                                                    var idField = document.getElementById('delete-id')
                                                    var id = button.getAttribute('patient-id')
                                                    idField.value = id
                                                })
                                            </script>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>