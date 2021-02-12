<?php
session_start();
include "koneksi.php";

$sel = "SELECT * FROM MENU";
$stid = oci_parse($conn, $sel);
oci_execute($stid);
echo '<br>';
   $row=oci_fetch_row($stid);
   $totalEspresso = $row[2] * $_POST['espresso'];

   $row=oci_fetch_row($stid);
   $totalMocha = $row[2] * $_POST['mocha'];

   $row=oci_fetch_row($stid);
   $totalCappucino = $row[2] * $_POST['cappucino'];

   $row=oci_fetch_row($stid);
   $totalLatte = $row[2] * $_POST['latte'];

   $row=oci_fetch_row($stid);
   $totalCookies = $row[2] * $_POST['cookies'];

   $row=oci_fetch_row($stid);
   $totalCupcake = $row[2] * $_POST['cupcake'];

   $row=oci_fetch_row($stid);
   $totalCheesecake = $row[2] * $_POST['cheesecake'];

   $row=oci_fetch_row($stid);
   $totalRollcake = $row[2] * $_POST['rollcake'];

   $total = $totalEspresso + $totalMocha + $totalCappucino + $totalLatte + $totalCookies + $totalCupcake + $totalCheesecake + $totalRollcake ;

$transDate = date('d-m-Y h:i:s');   
$ins = "INSERT INTO TRANSAKSI (ID_TRANSAKSI, ESPRESSO, MOCHA, CAPPUCINO, LATTE, COOKIES, CUPCAKE, CHEESECAKE, ROLLCAKE, STATUS, TOTAL, WAKTU_TRANSAKSI) 
VALUES (TRANSAKSI_SEQ.NEXTVAL, '$_POST[espresso]', '$_POST[mocha]', '$_POST[cappucino]', '$_POST[latte]', '$_POST[cookies]', '$_POST[cupcake]', '$_POST[cheesecake]', '$_POST[rollcake]', 'Waiting', '$total', to_date('".$transDate."','dd-mm-yy hh24:mi:ss'))";
  $stid = oci_parse($conn, $ins);
  oci_execute($stid);



$sql = "SELECT * FROM STOK";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

$row=oci_fetch_row($stid);
$newEspresso = $row[2] - $_POST['espresso'];

$row=oci_fetch_row($stid);
$newMocha = $row[2] - $_POST['mocha'];

$row=oci_fetch_row($stid);
$newCappucino = $row[2] - $_POST['cappucino'];

$row=oci_fetch_row($stid);
$newLatte = $row[2] - $_POST['latte'];

$row=oci_fetch_row($stid);
$newCookies = $row[2] - $_POST['cookies'];

$row=oci_fetch_row($stid);
$newCupcake = $row[2] - $_POST['cupcake'];

$row=oci_fetch_row($stid);
$newCheesecake = $row[2] - $_POST['cheesecake'];

$row=oci_fetch_row($stid);
$newRollcake = $row[2] - $_POST['rollcake'];

$sql="UPDATE STOK set 
        JML_STOK='$newEspresso'";
$stid = oci_parse($conn, $sql);
oci_execute($stid);


  oci_free_statement($stid);
  oci_close($conn);

 header("location: pesan.php");
?>