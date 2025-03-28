<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

echo "Welcome to Student Panel";
?>
<a href="logout.php">Logout</a>