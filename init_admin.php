<?php
// STEP 1: connect to database
require 'config.php';

// STEP 2: admin details
$username = "admin";
$email    = "admin@bbuc.ac.ug";
$password = password_hash("password", PASSWORD_DEFAULT);
$role     = "admin";
$status   = "active";

// STEP 3: check if admin already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE role = ?");
$stmt->execute([$role]);

if ($stmt->rowCount() == 0) {

    // STEP 4: insert admin
    $stmt = $pdo->prepare(
        "INSERT INTO users (username, email, password, role, status)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $username,
        $email,
        $password,
        $role,
        $status
    ]);

    echo "<h2>✅ Admin account created</h2>";
    echo "Username: <b>admin</b><br>";
    echo "Password: <b>password</b>";

} else {
    echo "<h2>ℹ️ Admin already exists</h2>";
}
