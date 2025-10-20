<?php
require_once 'config.php';
$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM tamu WHERE id_tamu=$id");
header("Location: tables.php");
exit;
?>
