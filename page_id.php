<?php
require_once 'config.php';

$judul = "Halaman Tidak Ditemukan";
$photo = "default.jpg";
$uraian = "Maaf, konten yang Anda cari tidak tersedia.";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$stmt = mysqli_prepare($connect, "SELECT judul, photo, uraian_lengkap FROM uraian WHERE id_uraian = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    if ($data = mysqli_fetch_assoc($hasil)) {
        $judul = $data['judul'];
        $photo = $data['photo'] ?: $photo;
        $uraian = $data['uraian_lengkap'];
    }
    mysqli_stmt_close($stmt);
}

// 💡 Bersihkan background dan atribut bawaan Word/Excel
$uraian_clean = preg_replace(
  [
    '/background(-color)?:\s*[^;"]+;?/i',
    '/bgcolor="[^"]*"/i',
    '/style="[^"]*background[^"]*"/i',
    '/color:\s*#[0-9a-fA-F]{3,6};?/i',
    '/font-family:[^;"]+;?/i',
    '/border[^:]*:[^;"]*;?/i'
  ],
  '',
  $uraian
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Kecamatan Tinanggea</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <style>
    /* ✅ Styling tabel agar rapi dan putih bersih */
    .uraian-content table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      margin: 20px 0;
      font-size: 16px;
      border: 1px solid #dee2e6;
    }

    .uraian-content th, .uraian-content td {
      border: 1px solid #dee2e6;
      padding: 10px 12px;
      text-align: center;
      vertical-align: middle;
      color: #333;
    }

    .uraian-content th {
      background-color: #f8f9fa;
      font-weight: 600;
    }

    .uraian-content tr:nth-child(even) {
      background-color: #fdfdfd;
    }

    .uraian-content tr:hover {
      background-color: #f1f1f1;
      transition: 0.2s ease;
    }
  </style>
</head>

<body>
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <a href="index.php" class="logo">Kecamatan Tinanggea</a>
              <!-- ***** Menu Start ***** -->
            <ul class="nav">
                  <li><a id="1" href="index.php" class="active">Home</a></li>
                  <li><a id="4" href="page_id.php?id=4">Topografi</a></li>
                  <li><a id="5" href="page_id.php?id=5">Batas Wilayah</a></li>
                  <li><a id="6" href="page_id.php?id=6">Pertumbuhan penduduk</a></li>
                  <li><a href="reservation.php">Contact</a></li>
                  <li><a href="dashboard/register.php">admin</a></li>
              </ul>   
              <a class='menu-trigger'>
                  <span>Menu</span>
              </a>
                    <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2><?= htmlspecialchars($judul); ?></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="about-us" style="margin-top: 60px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="assets/images/img/<?= htmlspecialchars($photo); ?>" 
                 alt="<?= htmlspecialchars($judul); ?>" 
                 style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="right-content" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <h4 style="color: #333; font-weight: 600; margin-bottom: 20px;"><?= htmlspecialchars($judul); ?></h4>

            <!-- ✅ Hasil konten bersih dari DB -->
            <div class="uraian-content">
              <?= $uraian_clean; ?>
            </div>

            <div class="main-button" style="margin-top: 30px;">
              <a href="index.php" style="background: #007bff; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; display: inline-block;">Kembali ke Beranda</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer style="background: #333; color: white; padding: 30px 0; margin-top: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p style="margin: 0; text-align: center;">© 2025 Kecamatan Tinanggea. Dikembangkan oleh Tim Web Tinanggea.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
