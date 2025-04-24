<?php
require 'generic.php';
$query = 'SELECT * FROM patient JOIN user ON user.user_id = patient.user_id';
$patients = queryAsArray($conn, $query);

$content_url = 'patient-info-content.php';

$query = -1;
if (isset($_POST['delete-patient'])) {
    $id = $_POST['delete-id'];
    $query = deleteRecord($conn, 'patient', $id);
    switch ($query) {
        case 0:
            $query = 'Patient successfully deleted.';
            break;
        case 1:
            $query = 'Fail! Please delete all other references to patient.';
            break;
        case 2:
            $query = 'Fail! An unknown error occurred.';
            break;
    }
}

if (isset($_POST['edit-patient'])) {
    $patient_id = $_POST['edit-id'];
    $dob = $_POST['edit-dob'];
    $sex = $_POST['edit-sex'];
    $address = $_POST['edit-address'];
    $emergency = $_POST['edit-emergency'];
    $medical = $_POST['edit-medical'];
    $billing = $_POST['edit-billing'];
    $insurance = $_POST['edit-insurance'];
    $ssn = $_POST['edit-ssn'];
    $first = $_POST['edit-first'];
    $last = $_POST['edit-last'];
    $phone = $_POST['edit-phone'];
    $email = $_POST['edit-email'];


    $query = "UPDATE patient, user SET date_of_birth = \"$dob\", sex = \"$sex\", address = \"$address\", emergency_contact = \"$emergency\", medical_data = \"$medical\", billing_info = \"$billing\"
    , insurance_info = \"$insurance\", ssn = \"$ssn\", first_name = \"$first\", last_name = \"$last\", phone_number = \"$phone\", email = \"$email\" WHERE patient.user_id = user.user_id AND patient_id = $patient_id;";
    try {
        mysqli_query($conn, $query);
        $query = 'Patient successfully updated.';
    } catch (mysqli_sql_exception $e) {
        $query = 'Failed! An unknown error occurred.';
    }
}
?>

<title>Patient Info</title>

<?php
require 'landing-content.php';
?>