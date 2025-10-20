<?php
session_start();
require_once 'config.php';

$id = intval($_GET['id_uraian']);
$row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM uraian WHERE id_uraian=$id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = trim($_POST['judul']);
  $uraian_singkat = trim($_POST['uraian_singkat']);
  $uraian_lengkap = trim($_POST['uraian_lengkap']);
  $photo = $row['photo'];

  if (!empty($_FILES['photo']['name'])) {
    $target_dir = "../assets/images/img/";
    $photo = basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $photo);
  }

  mysqli_query($connect, "UPDATE uraian SET 
    judul='$judul', uraian_singkat='$uraian_singkat', 
    uraian_lengkap='$uraian_lengkap', photo='$photo'
    WHERE id_uraian=$id");

  header("Location: uraian.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Uraian</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="uraian.php">
      <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-building"></i></div>
      <div class="sidebar-brand-text mx-3">Kecamatan Tinanggea</div>
    </a>
  </ul>

  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Uraian</h1>
        <div class="card shadow mb-4">
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" value="<?= htmlspecialchars($row['judul']); ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Uraian Singkat</label>
                <textarea name="uraian_singkat" rows="3" class="form-control" required><?= htmlspecialchars($row['uraian_singkat']); ?></textarea>
              </div>
              <div class="form-group">
                <label>Uraian Lengkap</label>
                <textarea name="uraian_lengkap" rows="5" class="form-control" required><?= htmlspecialchars($row['uraian_lengkap']); ?></textarea>
              </div>
              <div class="form-group">
                <label>Foto Saat Ini</label><br>
                <?php if (!empty($row['photo'])): ?>
                  <img src="../assets/images/img/<?= htmlspecialchars($row['photo']); ?>" width="100" class="mb-2 rounded"><br>
                <?php else: ?>
                  <span class="text-muted">Tidak ada foto</span><br>
                <?php endif; ?>
                <input type="file" name="photo" class="form-control-file">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
              <a href="uraian.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/sb-admin-2.min.js"></script>
</body>
</html>
