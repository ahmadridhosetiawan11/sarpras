<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_peminjaman  = $_GET['id_peminjaman'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE id_peminjaman = '$id_peminjaman'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar uppd toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Edit Peminjaman Sarpras</h4>
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
                      <label for="exampleInputEmail1">Nama Peminjam (<i>Berdasarkan Pengajuan yang sudah di ACC</i> )</label>
                          <select name="id_pengajuan" class="form-control select2"  onchange='changeValue(this.value)'>
                            <option value="<?=$row['id_pengajuan']?>"><?=$row['nama_lengkap']?> Tanggal Meminjam <?=tgl_indo($row['tgl_mnjm']) ?></option>
                            <?php 
                              $datapegawai = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN sarpras ON pengajuan.id_sarpras = sarpras.id_sarpras INNER JOIN pegawai ON pengajuan.id_pegawai = pegawai.id_pegawai WHERE status_p = '1' ORDER BY tgl_mnjm DESC");
                                      $z  = "var nama_s = new Array();\n;";
                                      $a  = "var jml_mnjm = new Array();\n;";
                                      $h  = "var keperluan = new Array();\n;";
                                  while($data = mysqli_fetch_array($datapegawai)) {?>
                                  <option name="id_pengajuan" value="<?= $data['id_pengajuan'] ?>"><?= $data['nama_lengkap'] ?> | Tanggal Meminjam <?=tgl_indo($data['tgl_mnjm']) ?></option>
                                  <?php 
                                  $z .= "nama_s['" .$data['id_pengajuan']. "'] = {nama_s:'" . addslashes($data['nama_s'])."'};\n";
                                  $a .= "jml_p['" .$data['id_pengajuan']. "'] = {jml_p:'" . addslashes($data['jml_p'])."'};\n";
                                  $h .= "keperluan['" .$data['id_pengajuan']. "'] = {keperluan:'" . addslashes($data['keperluan'])."'};\n";
                                   ?>
                                <?php 
                                }
                                 ?>
                        </select>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label>Sarpras yang Dipinjam</label>
                          <input type="text" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="nama_s" id="nama_s" placeholder="Sarpras yang Dipinjam">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>Jumlah meminjam</label>
                          <input type="hidden" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="nama_sb">
                          <input type="hidden" readonly="" class="form-control" value="<?=$row['tgl_mnjm']?>" name="tgl_mnjmb">

                          <input type="hidden" readonly="" class="form-control" value="<?=$row['jml_p']?>" name="jml_pb">

                          <input type="number" readonly="" class="form-control" id="jml_p" name="jml_pjm" value="<?=$row['jml_pjm']?>" required="">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>Keperluan</label>
                          <input type="text" readonly="" class="form-control" id="keperluan" placeholder="Keperluan">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Pembuatan Surat ini</label>
                          <input type="date" name="tgl_pmj" class="form-control" value="<?=$row['tgl_pmj']?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputFile">File/Foto Surat Pengajuan yg Sudah Disetujui</label>
                            <div class="input-group">
                              <div class="custom-file">
                              <input type="hidden" name="fl" value="<?=$row['file_pnjm']?>">
                              <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                              </div>
                            </div>
                          </div>
                        <p style="color: red">(<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                      </div>
                    </div> <input type="hidden" name="id_peminjaman" value="<?=$row['id_peminjaman']?>">
                  <?php } ?>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                    <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                    <button type="submit" name="edit" class="btn btn-warning float-sm-right" title="Ubah Data"><i class="fas fa-save"></i></button>
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
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_pengajuan = $_POST['id_pengajuan'];
    $nama_s = $_POST['nama_s'];
    $jml_pjm = $_POST['jml_pjm'];
    $tgl_pmj = $_POST['tgl_pmj'];

    $nama_sb = $_POST['nama_sb'];
    $tgl_mnjmb = $_POST['tgl_mnjmb'];
    $jml_pb = $_POST['jml_pb'];

    $ekstensi_diperbolehkan = array('jpg','jpeg','png','pdf','docx');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $filee = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

  if($filee){
    $tambahhe = mysqli_query($koneksi,"UPDATE peminjaman SET id_pengajuan='$id_pengajuan',nama_s='$nama_s',jml_pjm='$jml_pjm',tgl_pmj='$tgl_pmj',file_pnjm='$fl'  WHERE `peminjaman`.`id_peminjaman`='$id_peminjaman'");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_sb'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_pb;

  if($tambahhe){
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_sb'");
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_pjm;
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");}

    }if($tambahhe){
      ?> <script>alert('Berhasil Diubah Tanpa Mengubah File/Foto!'); window.location = 'peminjaman.php';</script><?php
    }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $file);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    if($tambahhe){
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_sb'");
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_pjm;
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");}

    $tambah = mysqli_query($koneksi,"UPDATE peminjaman SET id_pengajuan='$id_pengajuan',nama_s='$nama_s',jml_pjm='$jml_pjm',tgl_pmj='$tgl_pmj',file_pnjm='$namabaru'  WHERE `peminjaman`.`id_peminjaman`='$id_peminjaman'");

  if($tambah){
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_sb'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_pb;
  }

  if($tambah){
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_sb'");
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_pjm;
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");}

if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'peminjaman.php';</script><?php
        }else{
          $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_sb'");
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_pjm;
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'peminjaman.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'peminjaman.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus JPG, PNG atau JPEG!'); window.location = 'peminjaman.php';</script><?php
      }

    }
  }
  
 ?>
<script type="text/javascript">
    <?php echo $z;echo $a;echo $h;?>
     function changeValue(id){
      document.getElementById('nama_s').value = nama_s[id].nama_s;
       document.getElementById('jml_p').value = jml_p[id].jml_p;
        document.getElementById('keperluan').value = keperluan[id].keperluan;}
</script>