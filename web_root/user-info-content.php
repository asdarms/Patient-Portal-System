<div class="container py-4">
    <?php if ($query != -1): ?>
        <div class="alert alert-dark">
            <i class="fas fa-info-circle me-2"></i><?= htmlspecialchars($query) ?>
        </div>
    <?php endif; ?>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0"><i class="fas fa-user-injured me-2"></i>User Information</h1>
        </div>
        <div class="card-body">
            <?php if (empty($users)): ?>
                <div class="alert alert-dark">
                    <i class="fas fa-info-circle me-2"></i>No users at this time.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-id-badge me-1"></i>User ID</th>
                                <th><i class="fas fa-user me-1"></i>Name</th>
                                <th><i class="fas fa-phone me-1"></i>Phone Number</th>
                                <th><i class="fas fa-at me-1"></i>Email</th>
                                <th><i class="fas fa-home me-1"></i>Username</th>
                                <th><i class="fas fa-phone-alt me-1"></i>Bio</th>
                                <th><i class="fas fa-terminal me-1"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['user_id']) ?></td>
                                    <td><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></td>
                                    <td><?= htmlspecialchars($user['phone_number']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['bio']) ?></td>
                                    <td>
                                        <form method="POST">
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#editModal" name="edit-button"
                                                user-id="<?= htmlspecialchars($user['user_id'])?>"
                                                first="<?= htmlspecialchars($user['first_name'])?>"
                                                last="<?= htmlspecialchars($user['last_name'])?>"
                                                phone="<?= htmlspecialchars($user['phone_number'])?>"
                                                email="<?= htmlspecialchars($user['email'])?>"
                                                username="<?= htmlspecialchars($user['username'])?>"
                                                bio="<?= htmlspecialchars($user['bio'])?>">Edit</button>
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" name='delete-button'
                                                user-id=<?= htmlspecialchars($user['user_id']) ?>>Delete</button>
                                            <div class="modal fade" id="deleteModal" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete user
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="modal-text">
                                                            Are you sure you want to delete this user?
                                                        </div>
                                                        <input hidden name="delete-id" id="delete-id">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <button type="submit" name="delete-user"
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
                                                            <h5 class="modal-title" id="editModalLabel">Edit user
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
                                                                <span class="input-group-text">Phone Number</span>
                                                                <input type="phone" aria-label="Phone Number"
                                                                    class="form-control" id="edit-phone" name="edit-phone" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Email</span>
                                                                <input type="email" aria-label="Email" class="form-control"
                                                                    id="edit-email" name="edit-email" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Username</span>
                                                                <input type="text" aria-label="Username" class="form-control"
                                                                    id="edit-username" name="edit-username" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Bio</span>
                                                                <input type="text" aria-label="Bio" class="form-control"
                                                                    id="edit-bio" name="edit-bio" >
                                                            </div>
                                                        </div>
                                                        <input hidden name="edit-id" id="edit-id">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit-user"
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
                                                    var id = button.getAttribute('user-id')
                                                    idField.value = id
                                                    document.getElementById('edit-first').value = button.getAttribute('first')
                                                    document.getElementById('edit-last').value = button.getAttribute('last')
                                                    document.getElementById('edit-phone').value = button.getAttribute('phone')
                                                    document.getElementById('edit-email').value = button.getAttribute('email')
                                                    document.getElementById('edit-username').value = button.getAttribute('username')
                                                    document.getElementById('edit-bio').value = button.getAttribute('bio')
                                                })
                                                var deleteModal = document.getElementById('deleteModal')
                                                deleteModal.addEventListener('show.bs.modal', function (event) {
                                                    var button = event.relatedTarget
                                                    var idField = document.getElementById('delete-id')
                                                    var id = button.getAttribute('user-id')
                                                    idField.value = id
                                                })
                                            </script>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($mode != 'Patient'): ?>
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
                                                                user
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <span class="input-group-text">First Name</span>
                                                                <input type="text" aria-label="First Name" class="form-control"
                                                                    id="create-first" name="firstName">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Last Name</span>
                                                                <input type="text" aria-label="Last Name" class="form-control"
                                                                    id="create-last" name="lastName">
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Phone Number</span>
                                                                <input type="phone" aria-label="Phone Number"
                                                                    class="form-control" id="create-phone" name="phoneNumber" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Email</span>
                                                                <input type="email" aria-label="Email" class="form-control"
                                                                    id="create-email" name="email" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Username</span>
                                                                <input type="text" aria-label="Username" class="form-control"
                                                                    id="create-username" name="userName" >
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Password</span>
                                                                <input type="password" aria-label="Password" class="form-control"
                                                                    id="create-pass" name="password" >
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="create-user"
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>