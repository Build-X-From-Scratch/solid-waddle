<?php
require_once 'config.php';

// Default values
$judul = "Halaman Tidak Ditemukan";
$photo = "default.jpg";
$uraian = "Maaf, konten yang Anda cari tidak tersedia.";

// Get and validate ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Fetch data from database
$stmt = mysqli_prepare($connect, "SELECT judul, photo, uraian_lengkap FROM uraian WHERE id_uraian = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    
    if ($data = mysqli_fetch_assoc($hasil)) {
        $judul = $data['judul'];
        $photo = !empty($data['photo']) ? $data['photo'] : $photo;
        $uraian = $data['uraian_lengkap'];
    }
    mysqli_stmt_close($stmt);
}

// Clean Word attributes (background colors) from content
$uraian_clean = preg_replace(
    [
        '/background(-color)?:\s*[^;"]+;?/i',
        '/bgcolor="[^"]*"/i',
        '/style="[^"]*background[^"]*"/i'
    ],
    '',
    $uraian
);  

// Add Bootstrap classes to all tables
$uraian_clean = preg_replace(
    '/<table([^>]*)>/i',
    '<table class="table table-bordered table-striped table-hover"$1>',
    $uraian_clean
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= htmlspecialchars(strip_tags($judul)); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title><?= htmlspecialchars($judul); ?> - Kecamatan Tinanggea</title>

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
        /* Custom styles for content */
        .uraian-content table {
            margin-bottom: 1rem;
            background-color: #fff;
        }
        .uraian-content img {
            max-width: 100%;
            height: auto;
        }
        .uraian-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        /* Fix navigation menu visibility */
        .main-nav ul.nav li a {
            color: #fff !important;
            font-weight: 500;
            opacity: 1 !important;
        }
        
        .main-nav ul.nav li a:hover {
            color: #f5a425 !important;
        }
        
        .main-nav ul.nav li a.active {
            color: #f5a425 !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.php" class="logo">Kecamatan Tinanggea</a>
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="page_id.php?id=4">Topografi</a></li>
                            <li><a href="page_id.php?id=5">Batas Wilayah</a></li>
                            <li><a href="page_id.php?id=6">Pertumbuhan Penduduk</a></li>
                            <li><a href="reservation.php">Contact</a></li>
                            <li><a href="dashboard/register.php">Admin</a></li>
                        </ul>
                        <a class='menu-trigger'><span>Menu</span></a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Heading -->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?= htmlspecialchars($judul); ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="about-us" style="margin-top: 60px; margin-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <img src="assets/images/img/<?= htmlspecialchars($photo); ?>"
                         alt="<?= htmlspecialchars($judul); ?>"
                         class="img-fluid rounded shadow-sm" 
                         style="width: 100%; height: 400px; object-fit: cover;"
                         onerror="this.src='assets/images/img/default.jpg'">
                </div>

                <div class="col-lg-6">
                    <h4 class="mb-4"><?= htmlspecialchars($judul); ?></h4>
                    <div class="uraian-content">
                        <?= $uraian_clean; ?>
                    </div>

                    <div class="mt-4">
                        <a href="index.php" class="btn btn-primary rounded-pill px-4">
                            <i class="fa fa-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <!-- end -->
  <div class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2>Kenali Lebih Dekat Kecamatan Tinanggea</h2>
        <h4>Temukan potensi, budaya, dan keindahan alamnya!</h4>
      </div>
      <div class="col-lg-4">
        <div class="border-button">
          <a href="index.php">Pelajari Lebih Lanjut</a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p>© 2025 Kecamatan Tinanggea. Dikembangkan oleh Tim Web Tinanggea.
        <br>Template by <a href="https://templatemo.com" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </div>
</footer>
    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>