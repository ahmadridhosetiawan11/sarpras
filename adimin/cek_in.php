<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Form Input Data Pengecekan Sarpras</h4>
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
                            <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)' required="">
                                <option readonly="">-PILIH-</option>
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
                              <label for="exampleInputEmail1">Pegawai yang Melakukan Pengecekan</label>
                                <select name="id_pegawai" class="form-control select2"  onchange='changeValue(this.value)' required="">
                                  <option readonly="">-PILIH-</option>
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
                              <input type="date" name="tgl_cek" class="form-control" value="<?=date('Y-m-d')?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Status Pengecekan Sarpras</label>
                               <input type="text" name="status_cek" class="form-control" placeholder="Status Pengecekan Sarpras">
                            </div>
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
<script type="text/javascript">
    <?php echo $z;echo $a;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;
       document.getElementById('kategori').value = kategori[id].kategori;}
</script>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['input'])) {

    $id_sarpras = $_REQUEST['id_sarpras'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $tgl_cek = $_REQUEST['tgl_cek'];
    $status_cek = $_REQUEST['status_cek'];

    $tambah = mysqli_query($koneksi,"INSERT INTO `pengecekan` (`id_pengecekan`, `id_sarpras`, `id_pegawai`, `tgl_cek`, `status_cek`) VALUES (NULL, '$id_sarpras', '$id_pegawai', '$tgl_cek', '$status_cek');");

if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'cek.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cek_in.php';</script><?php
        }
      }

    
 ?>