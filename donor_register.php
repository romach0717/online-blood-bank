<?php
require_once 'db.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $city = trim($_POST['city']);
    $last_donation = $_POST['last_donation'] ?: null;

    if ($name && $age && $phone && $email && $city) {
        $stmt = $pdo->prepare('INSERT INTO donors (name, age, gender, blood_group, phone, email, city, last_donation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$name, $age, $gender, $blood_group, $phone, $email, $city, $last_donation]);
        $message = 'Registration submitted and pending admin approval.';
    } else {
        $message = 'All required fields are mandatory.';
    }
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Donor Registration</title><link rel="stylesheet" href="style.css"><script src="main.js"></script></head><body>
<nav>
    <a href="index.php">Home</a><a href="donor_register.php">Register Donor</a><a href="donor_list.php">Donors</a><a href="request_blood.php">Request Blood</a><a href="request_list.php">Requests</a><a href="admin_login.php">Admin Login</a>
</nav>
<div class="container">
    <h1>Donor Registration</h1>
    <?php if ($message): ?>
        <div class="alert <?= strpos($message, 'pending') !== false ? 'success' : 'error' ?>"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form id="donorForm" onsubmit="return validateDonorForm();" method="post">
        <label>Name *</label><input type="text" name="name" required>
        <label>Age *</label><input type="number" name="age" min="18" max="65" required>
        <label>Gender *</label><select name="gender" required><option value="Male">Male</option><option value="Female">Female</option><option value="Other">Other</option></select>
        <label>Blood Group *</label><select name="blood_group" required><option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="O+">O+</option><option value="O-">O-</option><option value="AB+">AB+</option><option value="AB-">AB-</option></select>
        <label>Phone *</label><input type="text" name="phone" required>
        <label>Email *</label><input type="email" name="email" required>
        <label>City *</label><input type="text" name="city" required>
        <label>Last Donation Date</label><input type="date" name="last_donation">
        <button type="submit">Submit</button>
    </form>
</div>
<footer>© Online Blood Bank</footer>
</body></html>