<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_pengajuan  = $_GET['id_pengajuan'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN sarpras ON pengajuan.id_sarpras = sarpras.id_sarpras INNER JOIN pegawai ON pengajuan.id_pegawai = pegawai.id_pegawai WHERE id_pengajuan = '$id_pengajuan'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Data Pengajuan Peminjaman</h4>
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
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                      <input type="text" readonly="" class="form-control" value="<?=$row['nama_lengkap']?>" name="id_pegawai">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Sarpras yang Diajukan</label>
                          <input type="text" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="id_pegawai">
                        </div>
                      </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Pinjam</label>
                        <input type="number" readonly="" name="jml_p" value="<?=$row['jml_p']?>" class="form-control" placeholder="Jumlah Pinjam">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pinjam</label>
                        <input type="text" readonly="" name="tgl_mnjm" class="form-control" value="<?=tgl_indo($row['tgl_mnjm']);?>">
                      </div>
                    </div>
                   <div class="col-6">
                      <div class="form-group">
                        <label>Tangggal Kembali</label>
                        <input type="text" readonly="" class="form-control" name="tgl_kbl" value="<?=tgl_indo($row['tgl_kbl']);?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Keperluan</label>
                        <input type="text" readonly="" class="form-control" name="keperluan" value="<?=$row['keperluan']?>" placeholder="Keperluan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Status & Keterangan Surat</label>
                        <input type="text" readonly="" class="form-control" name="keperluan" value="<?php 
                          if($row['status_p']== 0){
                            echo "Proses /";
                          }else if($row['status_p']== 1){
                            echo "Disetujui /";
                          }else if($row['status_p']== 2){
                            echo "Ditolak /";
                          }
                          
                          ?> <?=$row['ket']?>" placeholder="Keterangan Surat">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File Surat Pengantar</label>
                        <div class="input-group">
                          <a target="_blank" href="../fileweb/<?php echo  $row['file']; ?>"><?= $row['file'];?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <input type="hidden" name="id_pengajuan" value="<?=$row['id_pengajuan']?>">

                <!-- /.card-body -->
              <?php } ?>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                </div>
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

    $id_pengajuan = $_POST['id_pengajuan'];
    $id_pegawai = $_POST['id_pegawai'];
    $id_sarpras = $_POST['id_sarpras'];
    $jml_p = $_POST['jml_p'];
    $tgl_mnjm = $_POST['tgl_mnjm'];
    $tgl_kbl = $_POST['tgl_kbl'];
    $keperluan = $_POST['keperluan'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $filee = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

  if($filee){
    $tambahh = mysqli_query($koneksi,"UPDATE pengajuan SET id_pegawai='$id_pegawai',id_sarpras='$id_sarpras',jml_p='$jml_p',tgl_mnjm='$tgl_mnjm',tgl_kbl='$tgl_kbl',keperluan='$keperluan',file='$fl' WHERE `pengajuan`.`id_pengajuan`='$id_pengajuan'");
    }if($tambahh){
      ?> <script>alert('Berhasil Diubah Tanpa Mengubah File!'); window.location = 'pengajuan.php';</script><?php
    }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $file);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"UPDATE pengajuan SET id_pegawai='$id_pegawai',id_sarpras='$id_sarpras',jml_p='$jml_p',tgl_mnjm='$tgl_mnjm',tgl_kbl='$tgl_kbl',keperluan='$keperluan',file='$namabaru' WHERE `pengajuan`.`id_pengajuan`='$id_pengajuan'");
    if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pengajuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pengajuan_ed.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'pengajuan.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PDF, DOCX !'); window.location = 'pengajuan.php';</script><?php
      }
    }
  }
 ?>
   <script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;}</script>