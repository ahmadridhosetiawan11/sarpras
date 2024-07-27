<?php
	require_once("../koneksi.php");
	$id_sarpras = $_REQUEST['id_sarpras'];

	mysqli_query($koneksi, "DELETE FROM sarpras WHERE id_sarpras='$id_sarpras'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'sarpras.php';</script>";
?>