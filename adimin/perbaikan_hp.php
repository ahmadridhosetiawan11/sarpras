<?php
	require_once("../koneksi.php");                                                          
	$id_perbaikan = $_REQUEST['id_perbaikan'];
	$status_pbk = $_REQUEST['status_pbk'];

if($status_pbk == 'Sedang Dalam Perbaikan'){
        echo "<script>alert('Selesaikan Perbaikan Terlebih Dahulu Untuk Menghapus!'); window.location = 'perbaikan.php';</script>"; }
        else {
        mysqli_query($koneksi, "DELETE FROM perbaikan WHERE id_perbaikan='$id_perbaikan'") or die(mysqli_error()); echo "<script>alert('Berhasil Dihapus!'); window.location = 'perbaikan.php';</script>";} 
	
	
?>