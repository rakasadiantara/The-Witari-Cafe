<!DOCTYPE html>
<html ng-app>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TheWitari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/coffeelogo.png" rel="icon">
  <link href="img/coffeelogo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet"/>

  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/angular.min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top " color='#7f461b'>
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">TheWitari</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li ><a href="bos.php">Home</a></li>
          <li><a href="bos.php">Pembelian</a></li>
          <li ><a href="karyawan.php">Karyawan</a></li>
          <li class="active"  ><a href="#team">Stok</a></li>
          <li class="drop-down"><a href="">Menu</a>
            <ul>
              <li><a href="#">Makanan</a></li>
              <li><a href="#">Minuman</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="logout.php" class="get-started-btn scrollto">Log Out</a>

    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      <h1>"Selamat Datang Bos" </h1>
      <h2>~Manajemen The Witari Cafe~</h2>
      <div class="d-lg-flex">
        <a href="#pesan" class="btn-get-started scrollto">Data Stok Barang</a>
        <a href="https://www.youtube.com/watch?v=-n1lfVn-ww4" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
      <img src="assets/img/hero-img1.png" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->


<section id ='pesan'>
<div >

<h3>Data  Stok Menu</h3>
<h6></h6>
<table border="1" class="table1">
<tr>
<th>ID</th>
<th>Nama_Menu</th>
<th>Stok</th>

</tr>
<?php
include 'koneksi.php';
$sql = "SELECT * FROM STOK order by ID";
$stid = oci_parse($conn,$sql);
 oci_execute($stid);
 
 while ($s=oci_fetch($stid)){
?>
     <tr>
     <td><?php echo oci_result($stid, 'ID');?></td>
     <td><?php echo oci_result($stid, 'NAMA_MENU') ;?></td>
     <td><?php echo oci_result($stid, 'JML_STOK');?></td>

     </tr>
<?php
 }
 $dbh = null;
?>

</table> 
</div>
</section>



   <!-- Vendor JS Files -->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>