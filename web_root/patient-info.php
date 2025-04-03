<?php 
require 'header.php';
require 'functions.php';

$conn = OpenCon();
if (!$conn) {
    die();
}

$patient_info = getDatafromTable($conn, "patient", ["*"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0"><i class="fas fa-user-injured me-2"></i>Patient Information</h1>
            </div>
            <div class="card-body">
                <?php if (empty($patient_info)): ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>No patient records found.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th><i class="fas fa-id-badge me-1"></i>Patient ID</th>
                                    <th><i class="fas fa-birthday-cake me-1"></i>DOB</th>
                                    <th><i class="fas fa-venus-mars me-1"></i>Sex</th>
                                    <th><i class="fas fa-home me-1"></i>Address</th>
                                    <th><i class="fas fa-phone-alt me-1"></i>Emergency Contact</th>
                                    <th><i class="fas fa-file-medical me-1"></i>Medical Data</th>
                                    <th><i class="fas fa-file-invoice-dollar me-1"></i>Billing Info</th>
                                    <th><i class="fas fa-shield-alt me-1"></i>Insurance Info</th>
                                    <th><i class="fas fa-id-card me-1"></i>SSN</th>
                                    <th><i class="fas fa-user me-1"></i>User ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($patient_info as $patient): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($patient['patient_id']) ?></td>
                                        <td><?= htmlspecialchars($patient['date_of_birth']) ?></td>
                                        <td><?= htmlspecialchars($patient['sex']) ?></td>
                                        <td><?= htmlspecialchars($patient['address']) ?></td>
                                        <td><?= htmlspecialchars($patient['emergency_contact']) ?></td>
                                        <td><?= htmlspecialchars($patient['medical_data']) ?></td>
                                        <td><?= htmlspecialchars($patient['billing_info']) ?></td>
                                        <td><?= htmlspecialchars($patient['insurance_info']) ?></td>
                                        <td><?= htmlspecialchars($patient['ssn']) ?></td>
                                        <td><?= htmlspecialchars($patient['user_id']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
<?php CloseCon($conn); ?>
