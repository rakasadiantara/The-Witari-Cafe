<?php
session_start();
include "koneksi.php";
$user = $_POST['USERNAME'];
  $pass = $_POST['PASSWORD'];
  $add = "INSERT INTO TBL_USER (USERNAME, PASS) VALUES ('$user', '$pass')";
  $stid = oci_parse($conn, $add);
  oci_execute($stid);
  oci_close($conn);
  header("location: admin.php");
?>