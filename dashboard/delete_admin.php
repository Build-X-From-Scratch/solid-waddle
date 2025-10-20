<?php
session_start();
require_once 'config.php';

// Pastikan ada ID
if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id = intval($_GET['id']);

// Eksekusi penghapusan
mysqli_query($connect, "DELETE FROM admin WHERE id = $id");

// Kembali ke halaman admin
header("Location: admin.php");
exit;
?>
