<link rel="stylesheet" href="assets/css/style.css">

<div class="wrapper">

<div class="sidebar">
    <h3>WiFi Admin</h3>
    <a href="dashboard.php">Dashboard</a>
    <a href="map.php">WiFi Map</a>
    <a href="reports.php">Reports</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">
    <h2>Dashboard</h2>

    <div class="cards">
        <div class="card">
            <h3>Total Users</h3>
            <p><?= count($users) ?></p>
        </div>
        <div class="card">
            <h3>Active Zones</h3>
            <p>3</p>
        </div>
        <div class="card">
            <h3>Access Points</h3>
            <p>3</p>
        </div>
    </div>

    <h3>Users</h3>
    <table>
        <tr>
            <th>Username</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['username'] ?></td>
            <td class="status-<?= $u['status'] ?>">
                <?= $u['status'] ?>
            </td>
            <td>
                <a href="toggle_user.php?id=<?= $u['id'] ?>">Toggle</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>

