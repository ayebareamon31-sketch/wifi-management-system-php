<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #eef2f7;
        }
        .topbar {
            background: #004aad;
            color: white;
            padding: 15px;
        }
        .container {
            padding: 30px;
        }
        a {
            color: #004aad;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="topbar">
    Welcome, <?= $_SESSION['admin_name'] ?>
    | <a href="logout.php" style="color:white;">Logout</a>
</div>

<div class="container">
    <h2>WiFi Management Dashboard</h2>
    <ul>
        <li>Manage Users</li>
        <li>Manage Zones (Library, Hostel, Admin Block)</li>
        <li>WiFi Access Points</li>
        <li>Bandwidth Monitoring</li>
        <li>Google Maps View</li>
    </ul>
</div>

</body>
</html>


