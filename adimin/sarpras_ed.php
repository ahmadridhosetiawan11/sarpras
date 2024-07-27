<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_sarpras  = $_GET['id_sarpras'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM sarpras WHERE id_sarpras = '$id_sarpras'");
  
  $data = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
     <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Edit Data Sarpras</h4>
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sarpras</label>
                    <input type="text" class="form-control" value="<?=$data['nama_s']?>" name="nama_s" placeholder="Nama Sarpras">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control"  onchange='changeValue(this.value)' required="">
                          <option value="<?=$data['kategori']?>"><?=$data['kategori']?></option>
                          <?php 
                            $sss = mysqli_query($koneksi, "SELECT * FROM denda");
                                while($www = mysqli_fetch_array($sss)) {?>
                                <option name="kategori" value="<?= $www['kategori'] ?>"><?= $www['kategori'] ?></option>

                              <?php 
                              }
                               ?>
                          }
                      </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Jumlah Sarpras</label>
                    <input type="number" class="form-control" name="jml" value="<?=$data['jml']?>" placeholder="Jumlah Sarpras">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Kode Sarpras</label>
                    <input type="text" class="form-control" name="kode_sarpras" id="kode_sarpras" value="<?=$data['kode_sarpras']?>">
                      </div>
                    </div>
                  </div>

                <!-- /.card-body -->
                <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
              
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                  <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                  <button type="submit" name="edit" class="btn btn-warning float-sm-right" title="Ubah"><i class="fas fa-pencil-alt"></i></button>
                </div>
              </form>
            </div>
          </div>
          <!-- CARD 2 -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Foto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <a target="_blank" href="../fileweb/<?php echo  $data['foto']; ?>"><?php echo  $data['foto']; ?></a>
                        <input type="file" name="fotobaru" class="form-control" required="">
                        <input type="hidden" name="fotosebelum" value="<?=$data['foto']?>">
                      </div>
                    </div>
                    <p style="color: red">(<u>MAKSIMAL UKURAN FILE 700KB</u>)</p>
                  </div>
                <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                  <button type="submit" name="simpanfoto" class="btn btn-warning float-sm-right" title="Ubah"><i class="fas fa-pencil-alt"></i></button>
                </div>
              </form>
            </div>
            <!-- CARD 2 -->
            <?php } ?>
        </div>
      </div>
  <?php require_once("foot.php"); ?>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['edit'])) {

    $id_sarpras = $_POST['id_sarpras'];
    $nama_s = $_POST['nama_s'];
    $kategori = $_POST['kategori'];
    $jml = $_POST['jml'];
    $kode_sarpras = $_POST['kode_sarpras'];

  $ubahmasuk = mysqli_query($koneksi,"UPDATE sarpras SET nama_s='$nama_s',kategori='$kategori',jml='$jml',kode_sarpras='$kode_sarpras' WHERE `sarpras`.`id_sarpras`='$id_sarpras'");

if($ubahmasuk){
?> <script>alert('Data Berhasil Diubah!'); window.location = 'sarpras.php';</script><?php
}else{
?> <script>alert('Gagal, cek kembali!.'); window.location = 'sarpras.php';</script><?php
}
}
if (isset($_POST['simpanfoto'])) {
  $id_sarpras    = $_REQUEST['id_sarpras'];
$nama1 = $_FILES['fotobaru']['name'];
$file_tmp1 = $_FILES['fotobaru']['tmp_name'];
$fotosebelum = $_REQUEST['fotosebelum'];
$new1 = rand(6000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $nama1);   
move_uploaded_file($file_tmp1, '../fileweb/'.$new1);
unlink('../fileweb/'.$fotosebelum);

$ubah = mysqli_query($koneksi,"UPDATE sarpras SET foto ='$new1' WHERE id_sarpras = '$id_sarpras'");
if($ubah){
  ?> <script>alert('Berhasil Diperbaharui');window.location='sarpras.php';</script> <?php
}else{
  ?> <script>alert('Gagal Diperbaharui');window.location='sarpras.php';</script> <?php
}
}
 ?>