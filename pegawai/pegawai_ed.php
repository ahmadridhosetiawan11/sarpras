<?php require_once("head.php"); require_once("../koneksi.php"); ?>
<?php 
  $id_pegawai  = $_GET['id_pegawai'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
  
  $data = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Edit Data Pegawai</h4>
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
            <div class="col-md-6">
              <div class="card">
              <form role="form" action="" method="post" enctype="multipart/from-data">
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" name="nip" value="<?=$data['nip']?>" class="form-control" id="exampleInputEmail1" placeholder="NIP" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?=$data['nama_lengkap']?>" name="nama_lengkap" id="exampleInputPassword1" placeholder="Nama Lengkap">
                  </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Golongan</label>
                    <input type="text" name="gol" class="form-control" value="<?=$data['gol']?>" placeholder="Golongan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?=$data['jabatan']?>" placeholder="Jabatan">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_pegawai" value="<?=$data['id_pegawai']?>">

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

<?php 
if (isset($_POST['edit'])) {

    $id_pegawai = $_REQUEST['id_pegawai'];
    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $gol = $_REQUEST['gol'];
    $jabatan = $_REQUEST['jabatan'];
    $ubah = mysqli_query($koneksi,"UPDATE pegawai SET nip='$nip',nama_lengkap='$nama_lengkap',gol='$gol',jabatan='$jabatan' WHERE `pegawai`.`id_pegawai`='$id_pegawai'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pegawai.php';</script><?php
        }

    }
 ?>