<?php
	require_once("../koneksi.php");
	$id_perawatan = $_REQUEST['id_perawatan'];
	$status_prw = $_REQUEST['status_prw'];

if($status_prw == 'Sedang Dalam Perawatan'){
        echo "<script>alert('Selesaikan Perawatan Terlebih Dahulu Untuk Menghapus!'); window.location = 'perawatan.php';</script>"; }
    else {
        mysqli_query($koneksi, "DELETE FROM perawatan WHERE id_perawatan='$id_perawatan'"); 
        echo "<script>alert('Berhasil Dihapus!'); window.location = 'perawatan.php';</script>";
   } 
?>