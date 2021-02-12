<?php
$servername = "orcl";
$username = "c##ecommerce";
$password = "ecommerce";
$conn = oci_connect($username, $password, $servername);

  $date = date('Y-m-d H:i:s');
  date_default_timezone_set("Asia/Jakarta");
  echo date("l")." ";
  echo $date;
?>
