<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$pekerjaan=$_POST['pekerjaan'];
$telp=$_POST['telp'];
$id=$_POST['id'];
 
// update data ke database
$sql="UPDATE KARYAWAN set 
        ID_KARYAWAN='$id',
        NAMA_KARYAWAN='$nama', 
        ALAMAT_KARYAWAN='$alamat',
        PEKERJAAN_KARYAWAN='$pekerjaan',
        TELP_KARYAWAN='$telp'
        where ID_KARYAWAN='$id'";
$stid = oci_parse($conn,$sql);
oci_execute($stid);

//mysqli_query($koneksi,"update mahasiswa set nama='$nama', nim='$nim', alamat='$alamat' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
$dbh = null;

header("location:karyawan.php");

?>