<?php
session_start();
require_once 'config.php';

// Cek login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Ambil data tamu terbaru
$query_tamu = "SELECT nama, email, pesan, organisasi, alamat FROM tamu ORDER BY id_tamu DESC LIMIT 5";
$result_tamu = mysqli_query($connect, $query_tamu);

// Ambil pesan terbaru (pesan tidak kosong)
$query_pesan = "SELECT nama, pesan, email, organisasi FROM tamu WHERE pesan != '' ORDER BY id_tamu DESC LIMIT 5";
$result_pesan = mysqli_query($connect, $query_pesan);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Kecamatan Tinanggea</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kecamatan Tinanggea</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Addons</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Management:</h6>
                        <a class="collapse-item" href="tables.php">Daftar Tamu</a>
                        <a class="collapse-item" href="pesan.php">Daftar Pesan</a>
                    </div>
                </div>
            </li>
            <!-- Admin Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin Menu:</h6>
                        <a class="collapse-item" href="uraian.php">Uraian</a>
                        <a class="collapse-item" href="admin.php">Admin</a>
                        <a class="collapse-item" href="tamu.php">Tamu</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['admin_username']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="login.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400 mr-2"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Kecamatan Tinanggea</h1>
                        <a href="login.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                            <i class="fas fa-sign-out-alt fa-sm text-white-50"></i> Logout
                        </a>
                    </div>

                    <!-- Welcome -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Selamat Datang, <?php echo $_SESSION['admin_username']; ?>!
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Dashboard Admin Kecamatan Tinanggea
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aktivitas Terakhir -->
                    <div class="row">
                        <!-- Tamu Baru -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tamu Terbaru</h6>
                                    <i class="fas fa-users fa-sm fa-fw text-gray-400"></i>
                                </div>
                                <div class="card-body">
                                    <?php if (mysqli_num_rows($result_tamu) > 0): ?>
                                        <div class="list-group">
                                            <?php while ($tamu = mysqli_fetch_assoc($result_tamu)): ?>
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h6 class="mb-1"><?php echo htmlspecialchars($tamu['nama']); ?></h6>
                                                        <small><?php echo htmlspecialchars($tamu['email']); ?></small>
                                                    </div>
                                                    <p class="mb-1 text-muted">
                                                        <?php echo htmlspecialchars($tamu['organisasi']); ?> — 
                                                        <?php echo htmlspecialchars($tamu['alamat']); ?>
                                                    </p>
                                                    <?php if (!empty($tamu['pesan'])): ?>
                                                        <p class="mb-1 text-secondary">
                                                            Pesan: <?php echo htmlspecialchars(substr($tamu['pesan'], 0, 100)) . '...'; ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">Belum ada tamu yang mendaftar.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Pesan Baru -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Pesan Terbaru</h6>
                                    <i class="fas fa-envelope fa-sm fa-fw text-gray-400"></i>
                                </div>
                                <div class="card-body">
                                    <?php if (mysqli_num_rows($result_pesan) > 0): ?>
                                        <div class="list-group">
                                            <?php while ($pesan = mysqli_fetch_assoc($result_pesan)): ?>
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h6 class="mb-1"><?php echo htmlspecialchars($pesan['nama']); ?></h6>
                                                        <small><?php echo htmlspecialchars($pesan['email']); ?></small>
                                                    </div>
                                                    <p class="mb-1 text-muted">Dari: <?php echo htmlspecialchars($pesan['organisasi']); ?></p>
                                                    <p class="mb-1"><?php echo htmlspecialchars(substr($pesan['pesan'], 0, 150)) . '...'; ?></p>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">Belum ada pesan yang masuk.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Kecamatan Tinanggea 2025</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
