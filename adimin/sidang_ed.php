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
            <h4 class="page-title">Form Edit</h4>
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
                    <label>Jumlah Sarpras</label>
                    <input type="number" class="form-control" name="jml" value="<?=$data['jml']?>" placeholder="Jumlah Sarpras">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Jumlah Sarpras</label>
                    <input type="number" class="form-control" name="jml" value="<?=$data['jml']?>" placeholder="Jumlah Sarpras">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <!-- <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Anda</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="hidden" name="fl" value="<?=$data['foto']?>">
                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                      </div>
                      <p style="color: red">EKSTENSI YANG DIPERBOLEHKAN HANYA DALAM BENTUK .PNG | .JPG | .JPEG (<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                      <p style="color: red">ABAIKAN APABILA TIDAK INGIN MENGUBAH FILE</p>
                    </div> -->
                  </div>

                <!-- /.card-body -->
                <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
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

    $id_pegawai = $_REQUEST['id_pegawai'];
    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $gol = $_REQUEST['gol'];
    $jabatan = $_REQUEST['jabatan'];
    $tlp = $_REQUEST['tlp'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $ubah = mysqli_query($koneksi,"UPDATE pegawai SET nip='$nip',nama_lengkap='$nama_lengkap',gol='$gol',jabatan='$jabatan',tlp='$tlp',username='$username',password='$password' WHERE `pegawai`.`id_pegawai`='$id_pegawai'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'sidang.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'sidang.php';</script><?php
        }

    }
 ?>
<!-- <?php 
if (isset($_POST['edit'])) {

    $id_sarpras = $_POST['id_sarpras'];
    $nama_s = $_POST['nama_s'];
    $kategori = $_POST['kategori'];
    $jml = $_POST['jml'];

    $ekstensi_diperbolehkan = array('jpg','jpeg','png');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $filee = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

  if($filee){
    $tambahh = mysqli_query($koneksi,"UPDATE sarpras SET nama_s='$nama_s',kategori='$kategori',jml='$jml',foto='$fl' WHERE `sarpras`.`id_sarpras`='$id_sarpras'");
    }if($tambahh){
      ?> <script>alert('Berhasil Diubah Tanpa Mengubah File!'); window.location = 'sarpras.php';</script><?php
    }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $file);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"UPDATE sarpras SET nama_s='$nama_s',kategori='$kategori',jml='$jml',foto='$namabaru' WHERE `sarpras`.`id_sarpras`='$id_sarpras'");
    if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'sarpras.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'sarpras_ed.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'sarpras.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PNG, JPG , JPEG!'); window.location = 'sarpras.php';</script><?php
      }
    }
  }
 ?> -->