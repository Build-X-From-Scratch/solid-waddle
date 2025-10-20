\<?php
// 1. SERTAKAN FILE KONEKSI DATABASE ANDA
// Pastikan file 'config.php' berisi variabel $connect
require_once 'config.php';

// 2. SIAPKAN VARIABEL DEFAULT
// Ini untuk mencegah error jika halaman diakses tanpa ID atau ID tidak ditemukan
$judul = "Halaman Tidak Ditemukan";
$photo = "default.jpg"; // Sediakan gambar 'default.jpg' di folder 'assets/images/img/'
$uraian = "Maaf, konten yang Anda cari tidak tersedia. Silakan kembali ke beranda.";

// 3. Ambil id dari URL atau gunakan default 1
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// 4. PREPARED STATEMENT untuk ambil konten berdasarkan id
$stmt = mysqli_prepare($connect, "SELECT judul, photo, uraian_lengkap FROM uraian WHERE id_uraian = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    if ($data = mysqli_fetch_assoc($hasil)) {
        $judul = $data['judul'];
        $photo = $data['photo'] ?: $photo; // fallback ke default jika kosong
        $uraian = $data['uraian_lengkap'];
    }
    mysqli_stmt_close($stmt);
}
// Kita tidak perlu menutup koneksi ($connect) di sini
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
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body>

  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.php" class="logo">
                        Kecamatan Tinanggea
                    </a>
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="page_id.php?id=4">Topografi</a></li>
                        <li><a href="page_id.php?id=5">Batas Wilayah</a></li>
                        <li><a href="page_id.php?id=6">Pertumbuhan penduduk</a></li>
                        <li><a href="reservation.php">Contact</a></li>
                    </ul>  
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    </nav>
            </div>
        </div>
    </div>  
  </header>
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo htmlspecialchars($judul); ?></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="about-us" style="margin-top: 60px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="assets/images/img/<?php echo htmlspecialchars($photo); ?>" alt="<?php echo htmlspecialchars($judul); ?>">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-content">
            <h4><?php echo htmlspecialchars($judul); ?></h4>
            <p><?php echo $uraian; ?></p>
            <div class="main-button">
              <a href="index.php">Kembali ke Beranda</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Hubungi Kami</h2>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Kontak</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Â© 2025 Kecamatan Tinanggea