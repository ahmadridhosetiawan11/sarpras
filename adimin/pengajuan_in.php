<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>

     <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Form Input Data Pengajuan Peminjaman</h4>
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
                                <option readonly="">-PILIH-</option>
                                <?php 
                                    $datasapras = mysqli_query($koneksi, "SELECT * FROM pegawai");

                                                while($data = mysqli_fetch_array($datasapras)) {
                                                  ?>
                                                <option name="id_pegawai" value="<?= $data['id_pegawai'] ?>"><?= $data['nama_lengkap'] ?></option>

                                    <?php 
                                    }
                                     ?>
                              </select>
                          </div>

                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                            <label>Pilih Sarpras</label>
                            <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)' required="">
                              <option readonly="">-PILIH-</option>
                                  <?php 
                                    $sss = mysqli_query($koneksi, "SELECT * FROM sarpras");
                                            $z  = "var jml = new Array();\n;";
                                        while($datar = mysqli_fetch_array($sss)) {?>
                                        <option name="id_sarpras" value="<?= $datar['id_sarpras'] ?>"><?= $datar['nama_s'] ?></option>
                                        <?php 
                                            $z .= "jml['" .$datar['id_sarpras']. "'] = {jml:'" . addslashes($datar['jml'])."'};\n";
                                         ?>
                                      <?php 
                                      }
                                       ?>
                              </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                            <label>Jumlah Sedia</label>
                            <input type="number" readonly="" class="form-control" id="jml" placeholder="Jumlah Sedia" required="">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Pinjam</label>
                            <input type="number" name="jml_p" class="form-control" placeholder="Jumlah Pinjam" required="">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pinjam</label>
                            <input type="date" name="tgl_mnjm" class="form-control" value="<?=date('Y-m-d')?>">
                          </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                            <label>Tangggal Kembali</label>
                            <input type="date" class="form-control" name="tgl_kbl" value="<?=date('Y-m-d')?>">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                            <label>Keperluan</label>
                            <input type="text" class="form-control" name="keperluan" placeholder="Keperluan" required="">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                            <label>Total Hari Meminjam</label>
                            <input type="number" class="form-control" name="lama" placeholder="Total Hari Meminjam" required="">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleInputFile">File Surat Pengantar</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                  </div>
                                </div>
                              </div>
                              <p style="color: red">EKSTENSI YANG DIPERBOLEHKAN HANYA DALAM BENTUK .pdf | .docx (<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                            </div>
                          </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                          <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                          <button type="submit" name="input" class="btn btn-primary float-sm-right" title="Simpan"><i class="fas fa-save"></i></button>
                        </div>
                      </form>
                    </div>
                <!-- /.card -->
             </div>
         </div>
     </div>
  </section>
</div>

  <?php require_once("foot.php"); ?>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['input'])) {

    $id_pegawai = $_REQUEST['id_pegawai'];
    $id_sarpras = $_REQUEST['id_sarpras'];
    $jml_p = $_REQUEST['jml_p'];
    $tgl_mnjm = $_REQUEST['tgl_mnjm'];
    $tgl_kbl = $_REQUEST['tgl_kbl'];
    $keperluan = $_REQUEST['keperluan'];
    $lama = $_REQUEST['lama'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $namafile = $_FILES['file']['name'];
    $x = explode('.', $namafile);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafile);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_p > $jumlahada['jml']){
        echo "<script>alert('Jumlah Pinjam Anda Melebihi dari Jumlah yang ada!'); window.location = 'pengajuan_in.php';</script>"; return false; } 

    $tambah = mysqli_query($koneksi,"INSERT INTO pengajuan (id_pegawai,id_sarpras,jml_p,tgl_mnjm,tgl_kbl,keperluan,lama,file,ket,status_p) VALUES(
          '$id_pegawai',
          '$id_sarpras',
          '$jml_p',
          '$tgl_mnjm',
          '$tgl_kbl',
          '$keperluan',
          '$lama',
          '$namabaru',
          'Sedang Di Proses Atasan',
          '0')");
if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pengajuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pengajuan_in.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'pengajuan_in.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PDF, DOCX!'); window.location = 'pengajuan_in.php';</script><?php
      }

    }
 ?>

   <script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;}</script>