<?php
	require_once("../koneksi.php");
	if (isset($_POST['asem'])) {

	$id_aset = $_REQUEST['id_aset'];

	$hapus = mysqli_query($koneksi, "DELETE FROM aset WHERE id_aset='$id_aset'") or die(mysqli_error());

    if($hapus){
          ?> <script>alert('Berhasil Dihapus!'); window.location = 'aset.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'aset.php';</script><?php
        }
    }
?>