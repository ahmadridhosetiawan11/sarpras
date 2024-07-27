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
              <h4 class="page-title">Form Edit Pengajuan Peminjaman</h4>
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
                    <label for="exampleInputEmail1">Nama Anda</label>
                      <select name="id_pegawai" class="form-control select2">
                        <?php 
                            $datasapras = mysqli_query($koneksi, "SELECT * FROM pegawai");
                                while($data = mysqli_fetch_array($datasapras)) {
                                  ?>
                                <option name="id_pegawai" value="<?= $data['id_pegawai'] ?>"><?= $data['nama_lengkap'] ?></option>
                            <?php }?>
                      </select>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label>Pilih Sarpras</label>
                    <select name="id_sarpras" class="form-control"  onchange='changeValue(this.value)' required="">
                          <option value="<?=$row['id_sarpras']?>"><?=$row['nama_s']?></option>
                          <?php 
                            $sss = mysqli_query($koneksi, "SELECT * FROM sarpras");
                              $z  = "var jml = new Array();\n;";
                                while($datar = mysqli_fetch_array($sss)) {?>
                                  <option name="id_sarpras" value="<?= $datar['id_sarpras'] ?>"><?= $datar['nama_s'] ?></option>
                                      <?php 
                                        $z .= "jml['" .$datar['id_sarpras']. "'] = {jml:'" . addslashes($datar['jml'])."'};\n";?>
                              <?php }?>
                      </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Jumlah Sedia</label>
                    <input type="number" readonly="" class="form-control" id="jml" placeholder="Jumlah Sedia">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Pinjam</label>
                    <input type="number" name="jml_p" value="<?=$row['jml_p']?>" class="form-control" placeholder="Jumlah Pinjam">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Pinjam</label>
                    <input type="date" name="tgl_mnjm" class="form-control" value="<?=$row['tgl_mnjm']?>">
                  </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label>Tangggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kbl" value="<?=$row['tgl_kbl']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Keperluan</label>
                    <input type="text" class="form-control" name="keperluan" value="<?=$row['keperluan']?>" placeholder="Keperluan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Total Hari Meminjam</label>
                    <input type="number" class="form-control" name="lama" value="<?=$row['lama']?>" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File Surat Pengantar</label>
                        <div class="input-group">
                          <div class="custom-file">
                        <input type="hidden" name="fl" value="<?=$row['file']?>">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                      </div>
                        </div>
                      </div>
                      <p style="color: red">EKSTENSI YANG DIPERBOLEHKAN HANYA DALAM BENTUK .pdf | .docx (<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                      <p style="color: red">ABAIKAN APABILA TIDAK INGIN MENGUBAH FILE</p>
                    </div>
                  </div>
                <input type="hidden" name="id_pengajuan" value="<?=$row['id_pengajuan']?>">

                <!-- /.card-body -->
              <?php } ?>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                  <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                  <button type="submit" name="edit" class="btn btn-warning float-sm-right" title="Ubah"><i class="fas fa-pencil-alt"></i></button>
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
    $lama = $_POST['lama'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $filee = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

  if($filee){
    $tambahh = mysqli_query($koneksi,"UPDATE pengajuan SET id_pegawai='$id_pegawai',id_sarpras='$id_sarpras',jml_p='$jml_p',tgl_mnjm='$tgl_mnjm',tgl_kbl='$tgl_kbl',keperluan='$keperluan',lama='$lama',file='$fl' WHERE `pengajuan`.`id_pengajuan`='$id_pengajuan'");
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