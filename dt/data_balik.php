<?php 
  
  require_once("../fungsi_indotgl.php"); 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
  require_once("../tgl_indo.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Pengembalian Peminjaman</title>
  <link rel="stylesheet" href="../cssCetak/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../cssCetak/dist/css/bootstrap.min.css.map">
  <link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-grid.min.css.map">
  <link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-reboot.min.css.map">
  <style>
    .text-content{
      text-indent: 50px;
    }
    .ttd{
      margin-left: 75%;
    }
    #isi{
      line-height: 1.7;
    }
    .kiri{
      margin-top: -4%;
      position: absolute;
      width: 120px;
    }
    .tengah{
      margin-left: -18%;
      margin-top: -2%;
      position: absolute;
      width: 380px;
    }
    .kanan{
      margin-top: -7%;
      margin-left: 82%;
      width: 115px;
      position: absolute;
    }
    img{
      
      width: 220px;
    }
    hr{
      border: solid;
      color: #333;
    }
    .wew{
      
    }
    .tujuan{
      margin-left: 70%;
      margin-top: -16%;
    }
    td{
      color: black;
    }
  </style>
</head>

<div class="container" style="font-family: Times;"><br>
  <div style="color: blue">
  <h3 class="text-center"><b>PROVINSI KALIMANTAN SELATAN</b></h3>
  <img src="../img/logonya.png" class="float-left kiri">
    <h5 class="text-center wew"><b>SATPOL PP DAN DAMKAR  </b></h5>
  <h3 class="text-center wew"><b></b></h3>
  <h6 class="text-center">Jl. Dharma Praja No. 1 Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan, Banjarbaru.<p>TELEPON (0511) 4772249 FAKSIMILI(0511) 4773249</p></h6>
  <h6 class="text-center">E-mail : https://satpolppdamkar.kalselprov.go.id/ Website : https://satpolppdamkar.kalselprov.go.id/</h6>
  </div>
  <hr>
  <br>

  <table class="">
  <tbody>
    <tr>
      <td><h5>Nomor</h5></td>
      <td>:</td>
      <td><h5>511.2/ 598.A-PEG / BVet / 2023</h5></td>
    </tr>
    <tr>
      <td><h5>Sifat</h5></td>
      <td>:</td>
      <td><h5>Penting</h5></td>
    </tr>
    <tr>
      <td><h5>Lampiran</h5></td>
      <td>:</td>
      <td><h5>- 1 Lembar</h5></td>
    </tr>
    <tr>
      <td><h5>Perihal</h5></td>
      <td>:</td>
      <td><h5>Seluruh Data Pengembalian Peminjaman Sarpras</h5></td>
    </tr>
  </tbody>
</table>

 
  <div class="tujuan">
    <h5><p>Banjarbaru <?php echo tgl_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Kepala Balai BVet Banjarbaru
      <p>
      Di&ensp;-
      <p>
        &ensp;&ensp;&ensp;Tempat
      </p>  
      </p>
    </p>
    </p>
  </h5>
  </div>
  <br>


  <div class="container">
  <h2 class="text-center">DAFTAR DATA PENGEMBALIAN PEMINJAMAN SARPRAS</h2>
  <h3 class="text-center">satpolppdamkar.kalselprov</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th style="vertical-align: middle;">Yang Mengembalikan</th>
          <th style="vertical-align: middle;">Sarpras yang Dipinjam</th>
          <th style="vertical-align: middle;">Tgl Pengembalian</th>
          <th style="vertical-align: middle;">Status Pengembalian</th>
        </tr>
        <tbody> 
      </thead>  

        <?php session_start(); 

      if (isset($_POST['cetak'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $ttd = $_REQUEST['ttd'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai WHERE pengembalian.tgl_balik LIKE '%$bulan%' AND pengembalian.tgl_balik LIKE '%$tahun%'");
          $result1 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE pegawai.id_pegawai = '$ttd'"); 
      }else if (isset($_POST['cetak2'])) {
        $ttd = $_REQUEST['ttd'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai");

        $result1 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE pegawai.id_pegawai = '$ttd'"); 
      }else{
        $result = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai");
      }

$no = 1;
      while($data = mysqli_fetch_array($result)) {?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td style="vertical-align: middle;"><?php echo $data['nama_lengkap'] ?></td>
            <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
            <td style="vertical-align: middle;"><?php echo tgl_indo($data['tgl_balik']) ?></td>
            <td style="vertical-align: middle;"><?php echo $data['status_kbl'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </thead>
  </table>
</div>
</div>

<br>
<br>
<table class="text-center ttd">
  <tbody>
    <?php $asw = mysqli_fetch_array($result1) ?>
    <tr>
      <td><h5><b><?= $asw['jabatan'] ?></b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b><u><?=$asw['nama_lengkap'] ?></u><p>NIP. <?=$asw['nip'] ?></p></b></h5></td>
    </tr>

    <tr>
      <td><h5><b></b></h5></td>
    </tr>
  </tbody>
</table>



  <script>
    window.print();
  </script>
