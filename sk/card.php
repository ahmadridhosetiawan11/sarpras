<?php 
  require_once("../koneksi.php");
  require_once("../fungsi_indotgl.php"); 
?>
<!DOCTYPE html>
<html class="full-height" lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website PMD</title>
    <meta name="description" content="Material design landing page template built by TemplateFlip.com"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href='../dist/img/kalsel.png' rel='icon' type='image/x-icon'/>
  </head>
  <body class="hold-transition login-page bg-dark">

<?php
$id_c = $_GET['id_c'];
$query = mysqli_query($koneksi,"SELECT * FROM card INNER JOIN pendamping ON card.id_pd=pendamping.id_pd INNER JOIN daerah ON card.id_d=daerah.id_d WHERE id_c = '$id_c'");
while ($data = mysqli_fetch_array($query)) {
 ?>


<div class="row">
  <div class="col">
    <div class="login-box">
  <!-- /.card-logo -->
    <div class="card" style="border-width: 10px; border-color: #17a2b8;">
      <div class="card-body login-card-body text-center ">
        <div class="row text-center">
          <div class="col">
            <img id="awekkk" src="../dist/img/logo-removebg.png" class="float-sm-left" width="110px" alt="">
          </div>
        <div class="col">
          <img id="awekkk" src="../dist/img/kalsel.png" class="float-sm-right" width="60px" style="margin-top: 18px; margin-right: 19px;">
        </div>
        </div>

        <img width="155px" src="../fileweb/<?php echo  $data['foto']; ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3 mb-3"
           style="opacity: .9">

        <h3><b><?=$data['nama_pd']?></b></h3>
        <h5><?=$data['jabatan_c']?> Desa <?=$data['desa']?></h5>
        <h5>Tahun <?=tgl_indo($data['tgl_jadi'])?></h5>

        <div class="social-auth-links text-center mb-3">
      </div>
      <!-- /.card-body -->
    </div>
  </div>
<!-- /.login-box -->
</div>
  </div>

  <div class="col">
    <div class="login-box">
      <!-- /.card-logo -->
        <div class="card" style="border-width: 10px; border-color: #17a2b8;">
          <div class="card-body login-card-body text-center ">
            <img id="awekkk" class="mb-2" src="../dist/img/logo-removebg.png" width="260px">

            <h3><b>Pendamping Desa <?=$data['desa']?></b></h3>
            <h3><b><?=$data['nama_pd']?></b></h3>
        <h6>Tahun <?=tgl_indo($data['tgl_jadi'])?></h6>

            <div class="social-auth-links text-center mb-3">
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    <!-- /.login-box -->
    </div>
  </div>
</div>

    <script type="text/javascript" src="../dist/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../dist/js/popper.min.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/mdb.min.js"></script>
    <script>new WOW().init();</script>
<?php } ?>
  <script type="text/javascript">
    window.print();
  </script>
  </div> <!-- akhir container -->

  </body>
</html>


