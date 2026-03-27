<?php
require_once 'db.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_name = trim($_POST['patient_name']);
    $blood_group = $_POST['blood_group'];
    $units = intval($_POST['units']);
    $hospital = trim($_POST['hospital']);
    $city = trim($_POST['city']);
    $contact = trim($_POST['contact']);

    if ($patient_name && $units && $hospital && $city && $contact) {
        $stmt = $pdo->prepare('INSERT INTO requests (patient_name, blood_group, units, hospital, city, contact) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$patient_name, $blood_group, $units, $hospital, $city, $contact]);
        $message = 'Blood request submitted and pending admin approval.';
    } else {
        $message = 'All required fields are mandatory.';
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Request Blood</title><link rel="stylesheet" href="style.css"><script src="main.js"></script></head><body>
<nav><a href="index.php">Home</a><a href="donor_register.php">Register Donor</a><a href="donor_list.php">Donors</a><a href="request_blood.php">Request Blood</a><a href="request_list.php">Requests</a><a href="admin_login.php">Admin Login</a></nav>
<div class="container">
    <h1>Blood Request</h1>
    <?php if ($message): ?>
      <div class="alert <?= strpos($message, 'pending') !== false ? 'success' : 'error' ?>"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form id="requestForm" onsubmit="return validateRequestForm();" method="post">
      <label>Patient Name *</label><input type="text" name="patient_name" required>
      <label>Blood Group *</label><select name="blood_group" required><option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="O+">O+</option><option value="O-">O-</option><option value="AB+">AB+</option><option value="AB-">AB-</option></select>
      <label>Units Needed *</label><input type="number" name="units" min="1" max="10" required>
      <label>Hospital *</label><input type="text" name="hospital" required>
      <label>City *</label><input type="text" name="city" required>
      <label>Contact *</label><input type="text" name="contact" required>
      <button type="submit">Submit Request</button>
    </form>
</div>
<footer>© Online Blood Bank</footer>
</body></html>