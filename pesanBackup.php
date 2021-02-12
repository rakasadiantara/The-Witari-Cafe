<?php
	include "koneksi.php";
	$sel = "SELECT * FROM MENU";
	$stid = oci_parse($conn, $sel);
	oci_execute($stid);

?>
<!DOCTYPE html>
<html ng-app>
	<head>
		<title>Pemesanan Makanan</title>
		<link href="css/style.css" rel="stylesheet"/>
		<link href="css/bootstrap.css" rel="stylesheet"/>
		<script src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="col-md-1">
				<img src="img/logo.png"/>
			</div>
			<div class="col-md-9">
				<h1>Sistem Pemesanan Makanan The Witari Cafe</h1>
			</div>
			<div class="col-md-2">
				<button class="btn btn-danger glyphicon glyphicon-log-out">
					<a href="logout.php">LOGOUT</a>
				</button>
			</div>
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
							<table class="table table-striped">
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
	</body>
</html>
