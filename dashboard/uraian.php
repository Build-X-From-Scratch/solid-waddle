<?php
session_start();
require_once 'config.php';

// Ambil semua data dari tabel uraian
$query = "SELECT * FROM uraian ORDER BY id_uraian DESC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar Uraian - Kecamatan Tinanggea</title>

  <!-- SB Admin 2 -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
      <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>
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
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin">
          <i class="fas fa-fw fa-cogs"></i><span>Admin</span>
        </a>
        <div id="collapseAdmin" class="collapse show" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin Menu:</h6>
            <a class="collapse-item" href="admin.php">Admin</a>
            <a class="collapse-item active" href="uraian.php">Uraian</a>
            <a class="collapse-item" href="tamu.php">Tamu</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?= $_SESSION['admin_username'] ?? 'Admin'; ?>
                </span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
            </li>
          </ul>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Daftar Uraian</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
              <h6 class="m-0 font-weight-bold text-primary">Data Uraian</h6>
              <a href="tambah_uraian.php" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> Tambah
              </a>
            </div>

            <div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="text-center bg-primary text-white">
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Uraian Singkat</th>
          <th>Uraian Lengkap</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td class="text-center align-middle"><?= $row['id_uraian']; ?></td>
              <td class="align-middle"><?= htmlspecialchars($row['judul']); ?></td>
              <td class="align-middle">
                <?= htmlspecialchars(substr($row['uraian_singkat'], 0, 100)) . (strlen($row['uraian_singkat']) > 100 ? '...' : ''); ?>
              </td>
              <td class="align-middle">
                <?= htmlspecialchars(substr(strip_tags($row['uraian_lengkap']), 0, 100)) . (strlen($row['uraian_lengkap']) > 100 ? '...' : ''); ?>
              </td>
              <td class="text-center align-middle">
                <?php if (!empty($row['photo'])): ?>
                  <img src="../assets/images/img/<?= htmlspecialchars($row['photo']); ?>" 
                  alt="<?= htmlspecialchars($row['judul']); ?>" 
                  width="80" class="rounded shadow-sm">
                <?php else: ?>
                  <span class="text-muted">Tidak ada foto</span>
                <?php endif; ?>
              </td>
              <td class="text-center align-middle">
                <a href="update_uraian.php?id_uraian=<?= $row['id_uraian']; ?>" 
                   class="btn btn-sm btn-primary mb-1">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="delete_uraian.php?id_uraian=<?= $row['id_uraian']; ?>" 
                   onclick="return confirm('Yakin ingin menghapus uraian ini?')" 
                   class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted">Belum ada data uraian.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
</body>
</html>
