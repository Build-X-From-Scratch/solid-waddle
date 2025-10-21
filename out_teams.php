<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Kecamatan Tinanggea</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!-- Custom CSS for Team Section -->
    <style>
        .team-section .card {
            background-color: #fff; /* Polos putih */
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .team-section .card:hover {
            transform: translateY(-5px);
        }
        .team-section .card-img-top {
            border-radius: 10px 10px 0 0;
            height: 150px;
            object-fit: cover;
        }
        .team-section .card-body {
            padding: 15px;
        }
        .team-leader {
            margin-bottom: 30px;
        }
        .kelompok-kami {
            color: #fff; /* Font putih untuk kontras dengan background hitam */
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5); /* Tambah shadow untuk readability */
        }
    </style>

  </head>

<body>
  <?php require_once 'config.php'; ?>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        Kecamatan Tinanggea
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="1" href="index.php" class="active">Home</a></li>
                        <li><a id="4" href="page_id.php?id=4">Topografi</a></li>
                        <li><a id="5" href="page_id.php?id=5">Batas Wilayah</a></li>
                        <li><a id="6" href="page_id.php?id=6">Pertumbuhan penduduk</a></li>
                        <li><a href="reservation.php">Contact</a></li>
                        <li><a href="dashboard/register.php">Admin</a></li>
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
  <!-- ***** Header Area End ***** -->

  <!-- ============================ -->
  <!--     AREA KONTEN KOSONG      -->
  <!-- ============================ -->

  <main class="container my-5">
      <!-- Tempatkan konten dinamis di sini -->
      <section class="team-section">
          <div class="row">
              <div class="col-12 text-center mb-4">
                  <h3 class="kelompok-kami">Kelompok Kami</h3>
              </div>
          </div>
          <!-- Ketua Kelompok di Atas -->
          <div class="row justify-content-center team-leader">
              <div class="col-md-3 col-sm-6">
                  <div class="card text-center">
                      <img src="https://via.placeholder.com/150" class="card-img-top" alt="Ketua Kelompok">
                      <div class="card-body">
                          <h5 class="card-title">Muh Yusuf</h5>
                          <p class="card-text">Ketua Kelompok</p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Baris Pertama: 3 Anggota Tim -->
          <div class="row">
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card text-center">
                      <img src="our_teams/ander.png" class="card-img-top" alt="Anggota 1">
                      <div class="card-body">
                          <h5 class="card-title">Ander Gibran Siregar</h5>
                          <p class="card-text">Anggota </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card text-center">
                      <img src="our_teams/arya.png" class="card-img-top" alt="Anggota 2">
                      <div class="card-body">
                          <h5 class="card-title">Arriya Rahaldi Al Kandari</h5>
                          <p class="card-text">Anggota </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card text-center">
                      <img src="our_teams/abil.png" class="card-img-top" alt="Anggota 3">
                      <div class="card-body">
                          <h5 class="card-title">Muhammad Rabildzan</h5>
                          <p class="card-text">Anggota </p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Baris Kedua: 3 Anggota Tim -->
          <div class="row">
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card text-center">
                      <img src="our_teams/nopal.png" class="card-img-top" alt="Anggota 4">
                      <div class="card-body">
                          <h5 class="card-title">La Ode Nauval Aqiilah Tsaqif</h5>
                          <p class="card-text">Anggota </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card text-center">
                      <img src="https://via.placeholder.com/150" class="card-img-top" alt="Anggota 5">
                      <div class="card-body">
                          <h5 class="card-title">Alvin</h5>
                          <p class="card-text">Anggota </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card text-center">
                      <img src="https://via.placeholder.com/150" class="card-img-top" alt="Anggota 6">
                      <div class="card-body">
                          <h5 class="card-title">Dzaky</h5>
                          <p class="card-text">Anggota </p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </main>

  <!-- ============================ -->
  <!--        FOOTER AREA          -->
  <!-- ============================ -->
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
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>

</html>