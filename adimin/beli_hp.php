<?php
	require_once("../koneksi.php");
	if (isset($_POST['asem'])) {

	$id_beli = $_REQUEST['id_beli'];
	$id_j = $_REQUEST['id_j'];
	$jml_b = $_REQUEST['jml_b'];

	$hapus = mysqli_query($koneksi, "DELETE FROM beli WHERE id_beli='$id_beli'") or die(mysqli_error());
	
	$datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_j'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml_j'] + $jml_b = $_REQUEST['jml_b'];

    if($hapus){
        $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_j'");}
	
	if($hapus){
          ?> <script>alert('Berhasil Dihapus!'); window.location = 'beli.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'beli.php';</script><?php
        }
    }
?>