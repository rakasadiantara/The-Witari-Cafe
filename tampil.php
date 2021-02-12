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
<?php
	include "koneksi.php";
	$sel = "SELECT * FROM transaksi WHERE status='Waiting'";
	$data = oci_parse($conn,$sel);
	oci_execute($data);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The Witari</title>
		<link href="img/coffeelogo.png" rel="icon">
 		<link href="img/coffeelogo.png" rel="apple-touch-icon">
		<link href="css/style.css" rel="stylesheet"/>
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet"/>
		<script src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript">
		    var auto_refresh = setInterval(
		    function () {
					window.location = './tampil.php';
		      //  $('#load_content').load('tampil.php').fadeIn("slow");
		    }, 5000); // refresh setiap 10000 milliseconds

		</script>
	</head>
	<body>
		<div id="load_content">
			<div class="header">

				<div class="col-md-9">
					<h1>Sistem Pemesanan Makanan The Witari Cafe</h1>
				</div>
				<div class="col-md-2">
					<button class="btn btn-danger glyphicon glyphicon-log-out">
						<a href="logout.php">LOGOUT</a>
					</button>
				</div>
			</div>
			<div id="wrapper">
				<div class="row">
					<?php
					$no=1;
					while($row = oci_fetch_array($data)){?>
					<form action="aksi.php?aksi=update" method="post">
					  <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="caption">
					        <h3><?php echo $no;?></h3>
					        	<table class="table1">
											<tr>
												<td><b>Menu</b></td>
												<td><b>Qty</b></td>
											</tr>
											<tr>
												<?php if($row['ESPRESSO']){?>
													<td>Espresso</td>
													<td><?php echo $row['ESPRESSO'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['MOCHA']){?>
													<td>Mocha</td>
													<td><?php echo $row['MOCHA'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['CAPPUCINO']){?>
													<td>Cappucino</td>
													<td><?php echo $row['CAPPUCINO'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['LATTE']){?>
													<td>Latte</td>
													<td><?php echo $row['LATTE'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['COOKIES']){?>
													<td>Cookies</td>
													<td><?php echo $row['COOKIES'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['CUPCAKE']){?>
													<td>Cupcake</td>
													<td><?php echo $row['CUPCAKE'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['CHEESECAKE']){?>
													<td>Cheese Cake</td>
													<td><?php echo $row['CHEESECAKE'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<?php if($row['ROLLCAKE']){?>
													<td>Rollcake</td>
													<td><?php echo $row['ROLLCAKE'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<td>Waiting</td>
												<td>
													<a href="update.php?update&no=<?php echo $row['ID_TRANSAKSI']; ?>">Selesai</a>
												</td>
											</tr>
										</table>
					      </div>
					    </div>
					  </div>
						<?php $no++; } 
						oci_free_statement($data);
						oci_close($conn);
						?>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
