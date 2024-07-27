<?php
	require_once("../koneksi.php");
	$id_pengajuan = $_REQUEST['id_pengajuan'];

	mysqli_query($koneksi, "DELETE FROM pengajuan WHERE id_pengajuan='$id_pengajuan'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'pengajuan.php';</script>";
?>