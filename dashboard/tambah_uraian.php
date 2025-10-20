<?php
session_start();
require_once 'config.php';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul           = trim($_POST['judul']);
    $uraian_singkat  = trim($_POST['uraian_singkat']);
    $uraian_lengkap  = trim($_POST['uraian_lengkap']);
    $photo           = '';

    // Upload foto (jika ada)
    if (!empty($_FILES['photo']['name'])) {
        $target_dir  = "../assets/images/img/";
        $photo       = basename($_FILES['photo']['name']);
        $target_file = $target_dir . $photo;

        // Pindahkan file
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // sukses upload
        } else {
            $error = "Gagal mengunggah foto!";
        }
    }

    if ($judul !== '' && $uraian_singkat !== '') {
        $query = "INSERT INTO uraian (judul, uraian_singkat, uraian_lengkap, photo)
                  VALUES ('$judul', '$uraian_singkat', '$uraian_lengkap', '$photo')";
        $result = mysqli_query($connect, $query);

        if ($result) {
            header("Location: uraian.php");
            exit;
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($connect);
        }
    } else {
        $error = "Judul dan Uraian Singkat wajib diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Uraian - Kecamatan Tinanggea</title>

    <!-- SB Admin 2 -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-building"></i></div>
                <div class="sidebar-brand-text mx-3">Kecamatan Tinanggea</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Addons</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages">
                    <i class="fas fa-fw fa-folder"></i><span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Management:</h6>
                        <a class="collapse-item" href="tables.php">Daftar Tamu</a>
                        <a class="collapse-item" href="pesan.php">Daftar Pesan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin">
                    <i class="fas fa-fw fa-cogs"></i><span>Admin</span>
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
        <!-- End Sidebar -->

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
                                    <?= $_SESSION['admin_username'] ?? 'Admin'; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400 mr-2"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data Uraian</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Uraian</h6>
                        </div>
                        <div class="card-body">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?= $error; ?></div>
                            <?php endif; ?>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Uraian Singkat</label>
                                    <textarea name="uraian_singkat" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Uraian Lengkap</label>
                                    <textarea name="uraian_lengkap" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input type="file" name="photo" class="form-control-file">
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                                <a href="uraian.php" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kecamatan Tinanggea 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
