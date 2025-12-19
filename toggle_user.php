<?php
require 'config.php';

$id = $_GET['id'];
$pdo->query(
    "UPDATE users 
     SET status = IF(status='active','blocked','active')
     WHERE id=$id"
);

header("Location: dashboard.php");
