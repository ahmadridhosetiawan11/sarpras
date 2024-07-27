<?php
	require_once("../koneksi.php");
	error_reporting(0);
	if (isset($_POST['asem'])) {

	$id_rusak = $_REQUEST['id_rusak'];
	$id_sarpras = $_REQUEST['id_sarpras'];
	$jml_rk = $_REQUEST['jml_rk'];

	$hapus = mysqli_query($koneksi, "DELETE FROM rusak WHERE id_rusak='$id_rusak'") or die(mysqli_error());
	
	$datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_rk = $_REQUEST['jml_rk'];

    if($hapus){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");}
	
	if($hapus){
          ?> <script>alert('Berhasil Dihapus!'); window.location = 'rusak.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'rusak.php';</script><?php
        }
    }

    if (isset($_POST['sue'])) {

	$id_rusak = $_REQUEST['id_rusak'];
	
	$datajumlah = mysqli_query($koneksi, "DELETE FROM rusak WHERE id_rusak='$id_rusak'") or die(mysqli_error());
	if($hapus){
          ?> <script>alert('Berhasil Dihapus!'); window.location = 'rusak.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'rusak.php';</script><?php
        }
    }
?>