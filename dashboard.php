<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . ($_SESSION['role'] === 'admin' ? 'Admin' : 'Student') . "!";

if ($_SESSION['role'] === 'admin') {
    echo "<br> <a href='admin.php'>Go to Admin Panel</a>";
} else {
    echo "<br> <a href='student.php'>Go to Student Panel</a>";
}

echo "<br><a href='logout.php'>Logout</a>";
?>
