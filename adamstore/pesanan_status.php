<?php
include 'config.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin.php');
    exit;
}
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $conn->query("UPDATE pesanan SET status='$status' WHERE id=$id");
}
header('Location: dashboard.php#pesanan');
exit;
