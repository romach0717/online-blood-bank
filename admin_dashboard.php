<?php
require_once 'db.php';
session_start();
if (!isset($_SESSION['admin_id'])) { header('Location: admin_login.php'); exit; }
$action_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_type'], $_POST['item_id'], $_POST['status'])) {
    $item_type = $_POST['item_type'];
    $item_id = intval($_POST['item_id']);
    $status = $_POST['status'];
    if ($item_type === 'donor') {
        $stmt = $pdo->prepare('UPDATE donors SET status = ? WHERE id = ?');
        $stmt->execute([$status, $item_id]);
        $action_msg = 'Donor status updated.';
    } elseif ($item_type === 'request') {
        $stmt = $pdo->prepare('UPDATE requests SET status = ? WHERE id = ?');
        $stmt->execute([$status, $item_id]);
        $action_msg = 'Request status updated.';
    }
}
$donors = $pdo->query('SELECT * FROM donors ORDER BY created_at DESC')->fetchAll();
$requests = $pdo->query('SELECT * FROM requests ORDER BY created_at DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Admin Dashboard</title><link rel="stylesheet" href="style.css"></head><body>
<nav><a href="index.php">Home</a><a href="admin_logout.php">Logout</a></nav>
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['admin_name']) ?></p>
    <?php if ($action_msg): ?><div class="alert success"><?= htmlspecialchars($action_msg) ?></div><?php endif; ?>
    <h2>Donor Approvals</h2>
    <div class="table-wrap"><table><thead><tr><th>Name</th><th>Blood Group</th><th>City</th><th>Status</th><th>Action</th></tr></thead><tbody>
    <?php if (count($donors) === 0): ?><tr><td colspan="5">No donors found.</td></tr><?php else: ?>
        <?php foreach ($donors as $d): ?>
            <tr><td><?= htmlspecialchars($d['name']) ?></td><td><?= htmlspecialchars($d['blood_group']) ?></td><td><?= htmlspecialchars($d['city']) ?></td><td><?= htmlspecialchars($d['status']) ?></td><td>
                <form style="display:inline-block;" method="post">
                    <input type="hidden" name="item_type" value="donor">
                    <input type="hidden" name="item_id" value="<?= $d['id'] ?>">
                    <select name="status"><option <?= $d['status']=='Pending'?'selected':'' ?>>Pending</option><option <?= $d['status']=='Approved'?'selected':'' ?>>Approved</option><option <?= $d['status']=='Rejected'?'selected':'' ?>>Rejected</option></select>
                    <button type="submit">Update</button>
                </form>
            </td></tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody></table></div>
    <h2>Request Approvals</h2>
    <div class="table-wrap"><table><thead><tr><th>Patient</th><th>Blood Group</th><th>Units</th><th>City</th><th>Status</th><th>Action</th></tr></thead><tbody>
    <?php if (count($requests) === 0): ?><tr><td colspan="6">No requests found.</td></tr><?php else: ?>
        <?php foreach ($requests as $r): ?>
            <tr><td><?= htmlspecialchars($r['patient_name']) ?></td><td><?= htmlspecialchars($r['blood_group']) ?></td><td><?= htmlspecialchars($r['units']) ?></td><td><?= htmlspecialchars($r['city']) ?></td><td><?= htmlspecialchars($r['status']) ?></td><td>
                <form style="display:inline-block;" method="post">
                    <input type="hidden" name="item_type" value="request">
                    <input type="hidden" name="item_id" value="<?= $r['id'] ?>">
                    <select name="status"><option <?= $r['status']=='Pending'?'selected':'' ?>>Pending</option><option <?= $r['status']=='Fulfilled'?'selected':'' ?>>Fulfilled</option><option <?= $r['status']=='Rejected'?'selected':'' ?>>Rejected</option></select>
                    <button type="submit">Update</button>
                </form>
            </td></tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody></table></div>
</div>
<footer>© Online Blood Bank</footer>
</body></html>