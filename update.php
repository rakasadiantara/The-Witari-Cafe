<?php
session_start();
include "koneksi.php";

$upd = "UPDATE TRANSAKSI SET STATUS='Selesai' WHERE ID_TRANSAKSI=$_GET[no]";
$stid = oci_parse($conn,$upd);
oci_execute($stid);
oci_close($conn);
header("location: tampil.php");
?>