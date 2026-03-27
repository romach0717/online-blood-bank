<?php
require_once 'db.php';
$blood_group = $_GET['blood_group'] ?? '';
$city = trim($_GET['city'] ?? '');
$where = [];
$params = [];
if ($blood_group) { $where[] = 'blood_group = ?'; $params[] = $blood_group; }
if ($city) { $where[] = 'city LIKE ?'; $params[] = '%'.$city.'%'; }
$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';
$stmt = $pdo->prepare("SELECT * FROM donors $whereSql ORDER BY created_at DESC");
$stmt->execute($params);
$donors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Donor List</title><link rel="stylesheet" href="style.css"></head><body>
<nav><a href="index.php">Home</a><a href="donor_register.php">Register Donor</a><a href="donor_list.php">Donors</a><a href="request_blood.php">Request Blood</a><a href="request_list.php">Requests</a><a href="admin_login.php">Admin Login</a></nav>
<div class="container">
    <h1>Donor List</h1>
    <form method="get" style="margin-bottom:20px;">
        <label>Blood Group</label><select name="blood_group"><option value="">All</option><option value="A+" <?= $blood_group=='A+' ? 'selected':'' ?>>A+</option><option value="A-" <?= $blood_group=='A-' ? 'selected':'' ?>>A-</option><option value="B+" <?= $blood_group=='B+' ? 'selected':'' ?>>B+</option><option value="B-" <?= $blood_group=='B-' ? 'selected':'' ?>>B-</option><option value="O+" <?= $blood_group=='O+' ? 'selected':'' ?>>O+</option><option value="O-" <?= $blood_group=='O-' ? 'selected':'' ?>>O-</option><option value="AB+" <?= $blood_group=='AB+' ? 'selected':'' ?>>AB+</option><option value="AB-" <?= $blood_group=='AB-' ? 'selected':'' ?>>AB-</option></select>
        <label>City</label><input type="text" name="city" value="<?= htmlspecialchars($city) ?>">
        <button type="submit">Search</button>
    </form>
    <div class="table-wrap"><table><thead><tr><th>Name</th><th>Age</th><th>Gender</th><th>Blood Group</th><th>City</th><th>Last Donation</th><th>Status</th></tr></thead><tbody>
    <?php if (count($donors) === 0): ?>
        <tr><td colspan="7">No donor records found.</td></tr>
    <?php else: ?>
        <?php foreach ($donors as $donor): ?>
            <tr>
                <td><?= htmlspecialchars($donor['name']) ?></td>
                <td><?= htmlspecialchars($donor['age']) ?></td>
                <td><?= htmlspecialchars($donor['gender']) ?></td>
                <td><?= htmlspecialchars($donor['blood_group']) ?></td>
                <td><?= htmlspecialchars($donor['city']) ?></td>
                <td><?= htmlspecialchars($donor['last_donation'] ?: '-'); ?></td>
                <td><?= htmlspecialchars($donor['status']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody></table></div>
</div>
<footer>© Online Blood Bank</footer>
</body></html>