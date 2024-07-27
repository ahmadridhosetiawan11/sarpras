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
  <title>Data Pembelian Barang / Sarana</title>
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
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>

    <div class="container" style="font-family: Times;"><br>
    
  <h3 class="text-center"><b>PEMERINTAH KALIMANTAN SELATAN</b></h3>
  <img src="../dist/img/kalsel.png" class="float-left kiri"><h3 class="text-center wew"><b>UPPD SAMSAT RANTAU</b></h3>
  <h5 class="text-center">Alamat Kantor : JL.Brigjend H.Hasan Basry KM.3 Bitahan Rantau, <p>Kabupaten Tapin, Kalimantan Selatan Tlp.(0511)4772551 Fax. (0511)4774274  71114</p></h5>
  <h5 class="text-center">Website : www.samsatrantau.kalselprov.go.id Email : <u>samsatrantau@kalselprov.go.id</u></h5>
  <hr>
  <br>

  <div class="container">
  <h2 class="text-center">DATA TABEL</h2>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th>Yang Mengajukan</th>
          <th>Sarpras yang Diajukan</th>
          <th>Keperluan</th>
          <th>Status Surat</th>
        </tr>
        <tbody> 
      </thead>  

      <?php 
      $no = 1;
      $sql = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN sarpras ON pengajuan.id_sarpras = sarpras.id_sarpras INNER JOIN pegawai ON pengajuan.id_pegawai = pegawai.id_pegawai");
      while ($data = mysqli_fetch_array($sql)) {
      ?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td style="vertical-align: middle;"><?php echo $data['nama_lengkap'] ?></td>
            <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
            <td style="vertical-align: middle;"><?php echo $data['keperluan'] ?></td>
            <td style="vertical-align: middle;"><?php echo $data['keperluan'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </thead>
  </table>
</div>
</div>

<br>
<br>




  <script>
    window.print();
  </script>
