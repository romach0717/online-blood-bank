<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Blood Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="donor_register.php">Register as Donor</a>
    <a href="donor_list.php">Donors</a>
    <a href="request_blood.php">Request Blood</a>
    <a href="request_list.php">Requests</a>
    <a href="admin_login.php">Admin Login</a>
</nav>
<div class="container">
    <h1>Online Blood Bank</h1>
    <p>Welcome to the online blood bank system. Register as a donor, request blood, and manage approvals.</p>
    <h2>Search Donors</h2>
    <form action="donor_list.php" method="get" style="margin-bottom:20px;">
        <label>Blood Group</label>
        <select name="blood_group"><option value="">All</option><option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="O+">O+</option><option value="O-">O-</option><option value="AB+">AB+</option><option value="AB-">AB-</option></select>
        <label>City</label>
        <input type="text" name="city" placeholder="Enter city" />
        <button type="submit">Search</button>
    </form>
    <h2>Quick Start</h2>
    <ul>
      <li>Register donor and wait admin approval.</li>
      <li>Request blood and manage your requests.</li>
      <li>Admin can approve/reject donors and requests.</li>
    </ul>
</div>
<footer>© Online Blood Bank | Made for college project</footer>
</body>
</html>