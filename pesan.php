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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">TheWitari</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#pesan">Pesan</a></li>
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
          <h1>"Dari kopi aku belajar" </h1>
          <h2>~Kalau yang pahit masih bisa dinikmati~</h2>
          <div class="d-lg-flex">
            <a href="#pesan" class="btn-get-started scrollto">Pesan</a>
            <a href="https://www.youtube.com/watch?v=-n1lfVn-ww4" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img1.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <section id="pesan" class="">
  <h3>"SILAHKAN PESAN"</h3>

	<div>
		<br>
	</div>
    <?php
    include "koneksi.php";
    $sel = "SELECT * FROM MENU";
    $stid = oci_parse($conn, $sel);
	oci_execute($stid);

	?>
	<div>
		<br>
	</div>
      <div class="container">
        <form action="insert.php" method="post">
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <?php
                while($row = oci_fetch_array($stid)){?>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <img src="img/<?php echo $row['FOTO_MENU'];?>.png" alt="...">
                      <div class="caption">
                        <h3><?php echo $row['NAMA_MENU'];?></h3>
                        <p>Rp. <?php echo $row['HARGA_MENU'];?></p>
                        <input min="0" type="number" name="<?php echo $row['FOTO_MENU'];?>" class="qty" data-qty="<?=$row['FOTO_MENU']?>" ng-model="<?php echo $row['ID_MENU'];?>" ng-init="<?php echo $row['ID_MENU'];?>=0"/>
                      </div>
                    </div>
                  </div>
                  <?php } 
                  ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="col-md-12">
                <table class="table1">
                  <?php
                  $stid = oci_parse($conn, $sel);
                  oci_execute($stid);
                  while($row = oci_fetch_array($stid)){ ?>
                  <tr ng-show="<?=$row['ID_MENU']?> > 0">
                    <td><?=$row['NAMA_MENU']?></td>
                    <td>{{ <?=$row['ID_MENU']?>}}</td>
                    <td>{{ <?=$row['HARGA_MENU']?>*<?=$row['ID_MENU']?>}}</td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Total</td>
                    <td colspan="2" align="center" >
                      {{(9000*D01)+(9000*D02)+(9000*D03)+(12000*D04)+(18000*F01)+(15000*F02)+(10000*F03)+(16000*F04)}}
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" align="right">
                      <button type="submit" class="btn btn-primary">Pesan</button>
                    </td>
  
                  </tr>
  
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
	  </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Tuliskan kesan pengalaman Anda selama berada di The Witari Cafe</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jalan kerta Jaya</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>TheWitari@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+0362-567545</p>
              </div>

              <<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6568880463215!2d112.7568409141487!3d-7.279824773561402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbcc4fcf7c15%3A0x4127997213472d3d!2sJl.%20Gubeng%20Kertajaya%20X%2C%20Kertajaya%2C%20Kec.%20Gubeng%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060282!5e0!3m2!1sid!2sid!4v1606094042668!5m2!1sid!2sid" width="600" height="450"  frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>The Witari</h3>
            <p>
              Jalan KetaJaya<br>
              Gubeng,81253<br>
              Indonesia <br><br>
              <strong>Phone:</strong> + 0362- 897037<br>
              <strong>Email:</strong> TheWitari@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kopi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dessert</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Chatering</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Delivery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home Made</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Yuk jangan sampai ketinggalan informasi dengan memfollow akun social media kami</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Raka Sadiantara</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">Raka Sadiantara</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

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