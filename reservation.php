<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Hubungi Kami</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>
  <?php
  if (! isset($_GET['submit'])) $_GET['submit']="";
  ?>
<body>
  <?php require_once 'config.php'; ?>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End  ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                        Kecamatan Tinanggea
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="1" href="index.php" class="active">Home</a></li>
                        <li><a id="2" href="about.html">Topografi</a></li>
                        <li><a id="3" href="deals.html">Batas Wilayah</a></li>
                        <li><a id="4" href="reservation.html">Pertumbuhan penduduk</a></li>
                        <li><a href="reservation.html">Contact</a></li>
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

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Hubungi Kami</h2>
          <p>Sampaikan pertanyaan, saran, atau informasi Anda melalui formulir di bawah ini</p>
          <div class="main-button"><a href="about.html">Lihat Detail</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=tinaggea&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe><a href="https://embed-googlemap.com">embed google map</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:450px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:450px;}.gmap_iframe {height:450px!important;}</style></div>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="POST" role="search" action="">
            <div class="row">
              <div class="col-lg-12">
                <h4>Hubungi Kami <em>Melalui</em> Formulir <em>ini</em></h4>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Nama Lengkap</label>
                      <input type="text" name="Name" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">alamat</label>
                    <input type="text" name="alamat" class="Number" placeholder="Ex. jl xxxx no xx" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                    <label for="Number" class="form-label">alamat email</label>
                    <input type="email" name="email" class="Number" placeholder="Ex. xxxx@gmail.com" autocomplete="on" required>
                    </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">organisasi</label>
                    <input type="text" name="organisasi" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                  <fieldset>
                    <label for="Number" class="form-label">pesan</label>
                    <input type="text" name="pesan" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button type="submit" name="submit" class="main-button">Kirim Pesan</button>
                  </fieldset>
                  <?php
                      if (isset($_POST['submit'])) {
                          $nama = mysqli_real_escape_string($connect, $_POST['Name']);
                          $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
                          $email = mysqli_real_escape_string($connect, $_POST['email']);
                          $organisasi = mysqli_real_escape_string($connect, $_POST['organisasi']);
                          $pesan = mysqli_real_escape_string($connect, $_POST['pesan']);
                          
                          $sql = "INSERT INTO tamu (alamat, nama, email, organisasi, pesan) VALUES ('$alamat', '$nama', '$email', '$organisasi', '$pesan')";
                          
                          if (mysqli_query($connect, $sql)) {
                              echo "<div class='alert alert-success'>Data berhasil disimpan!</div>";
                          } else {
                              echo "<div class='alert alert-danger'>Error: " . mysqli_error($connect) . "</div>";
                          }
                      }
                    ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
