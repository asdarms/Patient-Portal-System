<div class="container py-4">
    <?php if ($query != -1): ?>
        <div class="alert alert-dark">
            <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
        </div>
    <?php endif; ?>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0"><i class="fas fa-flask me-2"></i>Lab Orders</h1>
        </div>
        <div class="card-body">
            <?php if (empty($lab_orders) && $mode == 'Patient'): ?>
                <div class="alert alert-dark">
                    <i class="fas fa-info-circle me-2"></i>No lab orders found.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <?php if ($mode == 'Admin'): ?>
                                    <th><i class="fas fa-id-badge me-1"></i>Order ID</th>
                                <?php endif; ?>
                                <th><i class="fas fa-map-marker-alt me-1"></i>Location</th>
                                <th><i class="fas fa-vial me-1"></i>Type</th>
                                <th class="text-end"><i class="fas fa-dollar-sign me-1"></i>Estimated Cost</th>
                                <th><i class="fas fa-vials me-1"></i>Tests</th>
                                <th><i class="fas fa-clipboard-check me-1"></i>Results</th>
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
                            <?php foreach ($lab_orders as $lab): ?>
                                <tr>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($lab['order_id']) ?></td>
                                    <?php endif; ?>
                                    <td><?= htmlspecialchars($lab['location']) ?></td>
                                    <td><?= htmlspecialchars($lab['type']) ?></td>
                                    <td class="text-end">$<?= number_format($lab['estimated_cost'], 2) ?></td>
                                    <td><?= htmlspecialchars($lab['tests']) ?></td>
                                    <td><?= htmlspecialchars($lab['results']) ?></td>
                                    <td><?= htmlspecialchars($lab['notes']) ?></td>
                                    <?php if ($mode == 'Admin'): ?>
                                        <td><?= htmlspecialchars($lab['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($lab['staff_id']) ?></td>
                                    <?php else: ?>
                                        <td><?= htmlspecialchars($lab['first_name'] . ' ' . $lab['last_name']) ?>
                                        </td>
                                    <?php endif; ?>
                                    <?php if ($mode != 'Patient'): ?>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal" name="edit-button"
                                                    lab-id=<?= htmlspecialchars($lab['order_id']) ?>
                                                    location="<?= htmlspecialchars($lab['location']) ?>"
                                                    edit-type="<?= htmlspecialchars($lab['type']) ?>"
                                                    cost="<?= htmlspecialchars($lab['estimated_cost']) ?>"
                                                    tests="<?= htmlspecialchars($lab['tests']) ?>"
                                                    results="<?= htmlspecialchars($lab['results']) ?>"
                                                    notes="<?= htmlspecialchars($lab['notes']) ?>">Edit</button>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" name='delete-button'
                                                    lab-id=<?= htmlspecialchars($lab['order_id']) ?>>Delete</button>
                                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                    lab order
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" id="modal-text">
                                                                Are you sure you want to delete this lab order?
                                                            </div>
                                                            <input hidden name="delete-id" id="delete-id">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No</button>
                                                                <button type="submit" name="delete-lab"
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
                                                                <h5 class="modal-title" id="editModalLabel">Edit lab order
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Location</span>
                                                                    <input type="text" aria-label="Location" class="form-control"
                                                                        id="edit-location" name="edit-location">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Type</span>
                                                                    <input type="text" aria-label="Type" class="form-control"
                                                                        id="edit-type" name="edit-type">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Estimated Cost</span>
                                                                    <input type="text" aria-label="Cost" id="edit-cost"
                                                                        class="form-control" name="edit-cost">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Tests</span>
                                                                    <input type="text" aria-label="Tests" class="form-control"
                                                                        id="edit-tests" name="edit-tests">
                                                                </div>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Results</span>
                                                                    <input type="text" aria-label="Results" class="form-control"
                                                                        id="edit-results" name="edit-results">
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
                                                                <button type="submit" name="edit-lab"
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
                                                        var id = button.getAttribute('lab-id')
                                                        idField.value = id
                                                        document.getElementById('edit-location').value = button.getAttribute('location')
                                                        document.getElementById('edit-type').value = button.getAttribute('edit-type')
                                                        document.getElementById('edit-cost').value = button.getAttribute('cost')
                                                        document.getElementById('edit-tests').value = button.getAttribute('tests')
                                                        document.getElementById('edit-results').value = button.getAttribute('results')
                                                        document.getElementById('edit-notes').value = button.getAttribute('notes')
                                                    })
                                                    var deleteModal = document.getElementById('deleteModal')
                                                    deleteModal.addEventListener('show.bs.modal', function (event) {
                                                        var button = event.relatedTarget
                                                        var idField = document.getElementById('delete-id')
                                                        var id = button.getAttribute('lab-id')
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
                                                                lab order
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <span class="input-group-text">Location</span>
                                                                <input type="text" aria-label="Location" class="form-control"
                                                                    id="create-location" name="create-location">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Type</span>
                                                                <input type="text" aria-label="Type" class="form-control"
                                                                    id="create-type" name="create-type">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Estimated Cost</span>
                                                                <input type="text" aria-label="Cost" id="create-cost"
                                                                    class="form-control" name="create-cost">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Tests</span>
                                                                <input type="text" aria-label="Tests" class="form-control"
                                                                    id="create-tests" name="create-tests">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Results</span>
                                                                <input type="text" aria-label="Results" class="form-control"
                                                                    id="create-results" name="create-results">
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
                                                            <button type="submit" name="create-lab"
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