<?php
	require_once("../koneksi.php");
	$id_peminjaman = $_REQUEST['id_peminjaman'];

	mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman='$id_peminjaman'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'peminjaman.php';</script>";
?>