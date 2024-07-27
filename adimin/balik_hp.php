<?php
	require_once("../koneksi.php");
	$id_pengembalian = $_REQUEST['id_pengembalian'];

	mysqli_query($koneksi, "DELETE FROM pengembalian WHERE id_pengembalian='$id_pengembalian'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'balik.php';</script>";
?>