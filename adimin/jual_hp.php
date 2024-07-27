<?php
	require_once("../koneksi.php");
	if (isset($_POST['asem'])) {

	$id_j = $_REQUEST['id_j'];
	$id_sarpras = $_REQUEST['id_sarpras'];
	$jml_j = $_REQUEST['jml_j'];

	$hapus = mysqli_query($koneksi, "DELETE FROM jual WHERE id_j='$id_j'") or die(mysqli_error());
	
	$datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_j = $_REQUEST['jml_j'];

    if($hapus){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");}
	
	if($hapus){
          ?> <script>alert('Berhasil Dihapus!'); window.location = 'jual.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jual.php';</script><?php
        }
    }
?>