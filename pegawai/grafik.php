<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); 
  
  $ranmor = mysqli_query($koneksi, "SELECT * FROM ranmor");
  $pemilik = mysqli_query($koneksi, "SELECT * FROM pemilik");
  $non_stnk = mysqli_query($koneksi, "SELECT * FROM non_stnk");
  $bayar = mysqli_query($koneksi, "SELECT * FROM bayar");
  $balik = mysqli_query($koneksi, "SELECT * FROM balik");
  $plat = mysqli_query($koneksi, "SELECT * FROM plat");?>


<?php require_once("foot.php"); ?>