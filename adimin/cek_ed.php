<?php require_once("head.php"); require_once("../koneksi.php"); ?>
<?php 
  $id_pengecekan  = $_GET['id_pengecekan'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM pengecekan INNER JOIN sarpras ON pengecekan.id_sarpras=sarpras.id_sarpras INNER JOIN pegawai ON pengecekan.id_pegawai=pegawai.id_pegawai WHERE id_pengecekan = '$id_pengecekan'");
  
  $data = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
     <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Edit Data Pengecekan Sarpras</h4>
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sarpras</label>
                      <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)' required="">
                          <option value="<?=$data['id_sarpras']?>"><?=$data['nama_s']?></option>
                          <?php 
                            $sss = mysqli_query($koneksi, "SELECT * FROM sarpras");
                                    $z  = "var jml = new Array();\n;";
                                    $a  = "var kategori = new Array();\n;";
                                while($wew = mysqli_fetch_array($sss)) {?>
                                <option name="id_sarpras" value="<?= $wew['id_sarpras'] ?>"><?= $wew['nama_s'] ?></option>
                                <?php 
                                    $z .= "jml['" .$wew['id_sarpras']. "'] = {jml:'" . addslashes($wew['jml'])."'};\n";
                                    $a .= "kategori['" .$wew['id_sarpras']. "'] = {kategori:'" . addslashes($wew['kategori'])."'};\n";
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
                        <label for="exampleInputEmail1">Pegawai yang Melakukan Pengecekan</label>
                          <select name="id_pegawai" class="form-control"  onchange='changeValue(this.value)' required="">
                            <option value="<?=$data['id_pegawai']?>"><?=$data['nama_lengkap']?></option>
                            <?php 
                              $sss = mysqli_query($koneksi, "SELECT * FROM pegawai");
                                  while($datag = mysqli_fetch_array($sss)) {?>
                                  <option name="id_pegawai" value="<?= $datag['id_pegawai'] ?>"><?= $datag['nama_lengkap'] ?></option>
                                <?php 
                                }
                                 ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Melakukan Pengecekan</label>
                        <input type="date" name="tgl_cek" class="form-control" value="<?=$data['tgl_cek']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Status Pengecekan Sarpras</label>
                         <input type="text" name="status_cek" class="form-control" value="<?=$data['status_cek']?>">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_pengecekan" value="<?=$data['id_pengecekan']?>">

                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> -->

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

    $id_pengecekan = $_REQUEST['id_pengecekan'];
    $id_sarpras = $_REQUEST['id_sarpras'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $tgl_cek = $_REQUEST['tgl_cek'];
    $status_cek = $_REQUEST['status_cek'];

    $ubah = mysqli_query($koneksi,"UPDATE pengecekan SET id_sarpras='$id_sarpras',id_pegawai='$id_pegawai',tgl_cek='$tgl_cek',status_cek='$status_cek' WHERE `pengecekan`.`id_pengecekan`='$id_pengecekan'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'cek.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cek.php';</script><?php
        }

    }
 ?>
<script type="text/javascript">
    <?php echo $z;echo $a;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;
       document.getElementById('kategori').value = kategori[id].kategori;}
</script>