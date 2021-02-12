<?php
session_start();
include ("koneksi.php");
  $user = $_POST['USERNAME'];
  $pass = $_POST['PASSWORD'];

  $cek = "SELECT * FROM TBL_USER WHERE USERNAME='$user' AND PASS='$pass'";
  $stid = oci_parse($conn, $cek);
  oci_execute($stid);

  $jml = oci_num_rows($stid);
  $i = 0;
  while ($row = oci_fetch_array($stid)) {    
    $username = $row['USERNAME'];
    $tingkat = $row['LEVEL_USER'];
    $i++;
}
oci_free_statement($stid);
oci_close($conn);

if ($i > 0) {
    $_SESSION['username'] = $username;
   // $_SESSION['id'] = $id;
    $_SESSION['status'] = $tingkat;
    
    if($tingkat == 1){
     echo '<script language="javascript">alert("Anda login sebagai user."); document.location="pesan.php";</script>';
    }
    elseif($tingkat == 2){
      echo '<script language="javascript">alert("Anda berhasil Login Sebagai Barista!"); document.location="tampil.php";</script>';
    }
    else{
      echo '<script language="javascript">alert("Anda berhasil Login Sebagai Bos"); document.location="bos.php";</script>';
    }
}else{
    echo "<script>alert('Wrong Password and Username!!!');
        document.location='index.php'</script>";
}
?>
