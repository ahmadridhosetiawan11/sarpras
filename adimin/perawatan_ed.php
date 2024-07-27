<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_perawatan  = $_GET['id_perawatan'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM perawatan INNER JOIN sarpras ON perawatan.id_sarpras=sarpras.id_sarpras WHERE id_perawatan = '$id_perawatan'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Edit Data Perawatan Sarpras</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-8">
              <div class="card">
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Sarpras</label>
                            <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)' required="">
                                <option value="id_sarpras"><?=$row['nama_s']?></option>
                                <?php 
                                  $sss = mysqli_query($koneksi, "SELECT * FROM sarpras");
                                          $z  = "var jml = new Array();\n;";
                                          $a  = "var kategori = new Array();\n;";
                                      while($data = mysqli_fetch_array($sss)) {?>
                                      <option name="id_sarpras" value="<?= $data['id_sarpras'] ?>"><?= $data['nama_s'] ?></option>
                                      <?php 
                                          $z .= "jml['" .$data['id_sarpras']. "'] = {jml:'" . addslashes($data['jml'])."'};\n";
                                          $a .= "kategori['" .$data['id_sarpras']. "'] = {kategori:'" . addslashes($data['kategori'])."'};\n";
                                       ?>
                                    <?php 
                                    }
                                     ?>
                            </select>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                          <label>Jumlah Ada</label>

                          <input type="hidden" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="nama_sb">
                          <input type="hidden" readonly="" class="form-control" value="<?=$row['tgl_prw']?>" name="tgl_prwb">

                          <input type="hidden" readonly="" class="form-control" value="<?=$row['jml_prw']?>" name="jml_prwb">

                          <input type="text" readonly="" class="form-control" id="jml" placeholder="Jumlah Ada">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                          <label>Kategori</label>
                          <input type="text" readonly="" class="form-control" id="kategori" placeholder="Kategori">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal Melakukan Perawatan</label>
                              <input type="date" name="tgl_prw" class="form-control" value="<?=$row['tgl_prw']?>">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Selesai Perawatan</label>
                               <input type="date" name="tgl_sl" class="form-control" value="<?=$row['tgl_sl']?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-4">
                            <div class="form-group">
                              <label>Jumlah Perawatan</label>
                              <input type="number" class="form-control" name="jml_prw" value="<?=$row['jml_prw']?>">
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label>Keterangan Perawatan</label>
                              <input type="text" class="form-control" name="ket_prw" value="<?=$row['ket_prw']?>">
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label>Biaya Perawatan</label>
                              <input type="number" class="form-control" name="biaya_prw" value="<?=$row['biaya_prw']?>">
                            </div>
                          </div>
                        </div>

                    <input type="hidden" name="id_perawatan" value="<?=$row['id_perawatan']?>">

                <!-- /.card-body -->
              <?php } ?>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                  <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                  <button type="submit" name="edit" class="btn btn-warning float-sm-right" title="Ubah"><i class="fas fa-pencil-alt"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  <?php require_once("foot.php"); ?>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['edit'])) {

    $id_sarpras = $_POST['id_sarpras'];
    $tgl_prw = $_POST['tgl_prw'];
    $tgl_sl = $_POST['tgl_sl'];
    $jml_prw = $_POST['jml_prw'];
    $ket_prw = $_POST['ket_prw'];
    $biaya_prw = $_POST['biaya_prw'];

    $nama_sb = $_POST['nama_sb'];
    $tgl_prwb = $_POST['tgl_prwb'];
    $jml_prwb = $_POST['jml_prwb'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada1 = mysqli_fetch_array($result);
      if($jml_prw > $jumlahada1['jml']){
        echo "<script>alert('Jumlah Perawatan Anda Melebihi dari Jumlah yang ada!'); window.location = 'perawatan.php';</script>"; return false; }

    $ubah = mysqli_query($koneksi,"UPDATE perawatan SET id_sarpras='$id_sarpras',tgl_prw='$tgl_prw',tgl_sl='$tgl_sl',jml_prw='$jml_prw',ket_prw='$ket_prw',biaya_prw='$biaya_prw'  WHERE `perawatan`.`id_perawatan`='$id_perawatan'");

      $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_sb'");
      $jumlahada = mysqli_fetch_array($datajumlah);
      $totaljumlah = $jumlahada['jml'] + $jml_prwb;

    if($ubah){
      $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_sb'");
      $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($datajumlah);
      $totaljumlah2 = $jumlahada['jml'] - $jml_prw;
      $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah2' WHERE id_sarpras = '$id_sarpras'");}

if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'perawatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'perawatan.php';</script><?php
        }

    }
 ?>
<script type="text/javascript">
    <?php echo $z;echo $a;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;
       document.getElementById('kategori').value = kategori[id].kategori;}
</script>