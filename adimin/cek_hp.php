<?php
	require_once("../koneksi.php");
	$id_pengecekan = $_REQUEST['id_pengecekan'];

	mysqli_query($koneksi, "DELETE FROM pengecekan WHERE id_pengecekan='$id_pengecekan'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'cek.php';</script>";
?>