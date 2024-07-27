<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_perbaikan  = $_GET['id_perbaikan'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM perbaikan INNER JOIN sarpras ON perbaikan.id_sarpras=sarpras.id_sarpras WHERE id_perbaikan = '$id_perbaikan'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Edit Perbaikan Sarpras</h4>
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
              <form role="form" action="" method="post" enctype="multipart/from-data">
                <div class="card-body">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Sarpras</label>
                        <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)' required="">
                            <option value="<?=$row['id_sarpras']?>"><?=$row['nama_s']?></option>
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
                          <label for="exampleInputEmail1">Tanggal Melakukan Perbaikan</label>
                          <input type="date" name="tgl_pbk" class="form-control" value="<?=$row['tgl_pbk']?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Selesai Perbaikan</label>
                           <input type="date" name="tgl_sel" class="form-control" value="<?=$row['tgl_sel']?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Jumlah Perbaikan</label>

                          <input type="text" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="nama_sb">
                          <input type="text" readonly="" class="form-control" value="<?=$row['tgl_pbk']?>" name="tgl_pbkk">
                          <input type="text" readonly="" class="form-control" value="<?=$row['jml_pbk']?>" name="jml_pbkk">

                          <input type="number" class="form-control" name="jml_pbk" value="<?=$row['jml_pbk']?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Jumlah Perbaikan</label>
                          <select name="kondisi_pbk" class="form-control"  onchange='changeValue(this.value)' required="">
                            <option value="<?=$row['kondisi_pbk']?>"><?=$row['kondisi_pbk']?></option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Sedang">Rusak Sedang</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Biaya Perbaikan</label>
                          <input type="number" class="form-control" name="biaya_pbk" value="<?=$row['biaya_pbk']?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Keterangan Perbaikan</label>
                          <input type="text" class="form-control" name="ket_pbk" value="<?=$row['ket_pbk']?>">
                        </div>
                      </div>
                    </div>
                  </div>
                <input type="hidden" name="id_perbaikan" value="<?=$row['id_perbaikan']?>">

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

    $id_perbaikan = $_REQUEST['id_perbaikan'];
    $id_sarpras = $_REQUEST['id_sarpras'];
    $tgl_pbk = $_REQUEST['tgl_pbk'];
    $tgl_sel = $_REQUEST['tgl_sel'];
    $jml_pbk = $_REQUEST['jml_pbk'];
    $kondisi_pbk = $_REQUEST['kondisi_pbk'];
    $ket_pbk = $_REQUEST['ket_pbk'];
    $biaya_pbk = $_REQUEST['biaya_pbk'];

    $nama_sb = $_POST['nama_sb'];
    $tgl_pbkk = $_POST['tgl_pbkk'];
    $jml_pbkk = $_POST['jml_pbkk'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada1 = mysqli_fetch_array($result);
      if($jml_prw > $jumlahada1['jml']){
        echo "<script>alert('Jumlah Perbaikan Anda Melebihi dari Jumlah yang ada!'); window.location = 'perbaikan.php';</script>"; return false; }

    $ubah = mysqli_query($koneksi,"UPDATE perbaikan SET id_sarpras='$id_sarpras',tgl_pbk='$tgl_pbk',tgl_sel='$tgl_sel',jml_pbk='$jml_pbk',kondisi_pbk='$kondisi_pbk',ket_pbk='$ket_pbk' ,biaya_pbk='$biaya_pbk'  WHERE `perbaikan`.`id_perbaikan`='$id_perbaikan'");

      $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_sb'");
      $jumlahada = mysqli_fetch_array($datajumlah);
      $totaljumlah = $jumlahada['jml'] + $jml_pbkk;

    if($ubah){
      $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_sb'");
      $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($datajumlah);
      $totaljumlah2 = $jumlahada['jml'] - $jml_pbk;
      $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah2' WHERE id_sarpras = '$id_sarpras'");}

if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'perbaikan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'perbaikan.php';</script><?php
        }

    }
 ?>
<script type="text/javascript">
    <?php echo $z;echo $a;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;
       document.getElementById('kategori').value = kategori[id].kategori;}
</script>