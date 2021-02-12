<?php
	session_start();
	session_destroy();
	echo '<script language="javascript">alert("Anda berhasil Logout! \nSilahkan berkunjung kembali..."); document.location="index.php";</script>';
?>
