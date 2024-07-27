<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Input</h4>
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
                    <label for="exampleInputEmail1">Nama Sarpras</label>
                    <input type="text" class="form-control" id="nama_s" name="nama_s" placeholder="Nama Sarpras">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label>Jumlah Sarpras</label>
                    <input type="number" class="form-control" name="jml" id="jml" placeholder="Jumlah Sarpras">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label>Jumlah Sarpras</label>
                    <input type="number" class="form-control" name="jml" id="jml" placeholder="Jumlah Sarpras">
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Anda</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                      </div>
                      <p style="color: red">EKSTENSI YANG DIPERBOLEHKAN HANYA DALAM BENTUK .PNG | .JPG | .JPEG (<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                    </div>
                  </div> -->

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                  <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                  <button type="submit" name="input" class="btn btn-primary float-sm-right" title="Simpan"><i class="fas fa-save"></i></button>
                </div>
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
  <?php 
if (isset($_POST['input'])) {

    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $gol = $_REQUEST['gol'];
    $jabatan = $_REQUEST['jabatan'];
    $tlp = $_REQUEST['tlp'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];


    $tambah = mysqli_query($koneksi,"INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `gol`, `jabatan`,`tlp`,`username`,`password`) VALUES (NULL, '$nip', '$nama_lengkap', '$gol', '$jabatan','$tlp','$username','$password');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'sidang.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'sidang_in.php';</script><?php
        }
      }

    
 ?> 

<!-- <?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['input'])) {

    $nama_s = $_POST['nama_s'];
    $kategori = $_POST['kategori'];
    $jml = $_POST['jml'];

    $ekstensi_diperbolehkan = array('jpg','jpeg','png');
    $namafoto = $_FILES['foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"INSERT INTO sarpras (nama_s,kategori, jml,foto) VALUES(
          '$nama_s',
          '$kategori',
          '$jml',
          '$namabaru')");
if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'sarpras.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'sarpras_in.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kb!'); window.location = 'sarpras_in.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus JPG, PNG atau JPEG!'); window.location = 'sarpras_in.php';</script><?php
      }

    }
 ?> -->