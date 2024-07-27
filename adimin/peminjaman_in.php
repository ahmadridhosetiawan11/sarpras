<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Input Data Peminjaman Sarpras</h4>
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
                    <label for="exampleInputEmail1">Nama Peminjam (<i>Berdasarkan Pengajuan yang sudah di ACC</i> )</label>
                        <select name="id_pengajuan" class="form-control select2"  onchange='changeValue(this.value)'>
                          <option readonly="">-PILIH-</option>
                          <?php 
                            $datapegawai = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN sarpras ON pengajuan.id_sarpras = sarpras.id_sarpras INNER JOIN pegawai ON pengajuan.id_pegawai = pegawai.id_pegawai WHERE status_p = '1'");
                                    $z  = "var nama_s = new Array();\n;";
                                    $a  = "var jml_pnjm = new Array();\n;";
                                    $h  = "var keperluan = new Array();\n;";
                                    $eh  = "var id_sarpras = new Array();\n;";
                                while($data = mysqli_fetch_array($datapegawai)) {?>
                                <option name="id_pengajuan" value="<?= $data['id_pengajuan'] ?>"><?= $data['nama_lengkap'] ?> | Tanggal Meminjam (<?= tgl_indo($data['tgl_mnjm']) ?>)</option>
                                <?php 
                                $z .= "nama_s['" .$data['id_pengajuan']. "'] = {nama_s:'" . addslashes($data['nama_s'])."'};\n";
                                $a .= "jml_pnjm['" .$data['id_pengajuan']. "'] = {jml_pnjm:'" . addslashes($data['jml_pnjm'])."'};\n";
                                $h .= "keperluan['" .$data['id_pengajuan']. "'] = {keperluan:'" . addslashes($data['keperluan'])."'};\n";
                                $eh .= "id_sarpras['" .$data['id_pengajuan']. "'] = {id_sarpras:'" . addslashes($data['id_sarpras'])."'};\n";
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
                        <input type="text" readonly="" class="form-control" name="nama_s" id="nama_s" placeholder="Sarpras yang Dipinjam">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>Jumlah meminjam</label>
                        <input type="text" readonly="" class="form-control" id="jml_pnjm" name="jml_pnjm" placeholder="Jumlah meminjam">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>Keperluan</label>
                        <input type="text" readonly="" class="form-control" id="keperluan" placeholder="Keperluan">
                        <input type="hidden" name="id_sarpras" id="id_sarpras">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pembuatan Surat ini</label>
                        <input type="date" name="tgl_pmj" class="form-control" value="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File/Foto Surat Pengajuan yg Sudah Disetujui</label>
                          <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name="file_pnjm" class="custom-file-input" id="exampleInputFile">
                            </div>
                          </div>
                        </div>
                      <p style="color: red">(<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                    </div>
                  </div>

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
<script type="text/javascript">
    <?php echo $z;echo $a;echo $h;echo $eh;?>
     function changeValue(id){
      document.getElementById('nama_s').value = nama_s[id].nama_s;
       document.getElementById('jml_pnjm').value = jml_pnjm[id].jml_pnjm;
        document.getElementById('keperluan').value = keperluan[id].keperluan;
        document.getElementById('id_sarpras').value = id_sarpras[id].id_sarpras;}
</script>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['input'])) {

    $id_pengajuan = $_POST['id_pengajuan'];
    $nama_s = $_POST['nama_s'];
    $jml_pnjm = $_POST['jml_pnjm'];
    $tgl_pmj = $_POST['tgl_pmj'];
    $id_sarpras = $_POST['id_sarpras'];

    $ekstensi_diperbolehkan = array('jpg','jpeg','png','pdf','docx');
    $namafoto = $_FILES['file_pnjm']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file_pnjm']['size'];
    $file_tmp = $_FILES['file_pnjm']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"INSERT INTO peminjaman (id_pengajuan,  nama_s, jml_pnjm,tgl_pmj,  file_pnjm, status_pjm) VALUES(
          '$id_pengajuan',
          '$nama_s',
          '$jml_pnjm',
          '$tgl_pmj',
          '$namabaru',
          'Sedang Dipinjam')");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_pnjm;

    $asu = mysqli_query($koneksi, "SELECT jml_pnjm FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $asoy = mysqli_fetch_array($asu);
    $new = $asoy['jml_pnjm']+$jml_pjm;

      if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");
        $sue = mysqli_query($koneksi, "UPDATE sarpras SET total_pnjm = '$jml_pjm' WHERE id_sarpras = '$id_sarpras'");
        $asuu = mysqli_query($koneksi, "UPDATE pengajuan SET status_p = '4' WHERE id_pengajuan = '$id_pengajuan'");
        $asoe = mysqli_query($koneksi, "UPDATE sarpras SET jml_pnjm = '$new' WHERE id_sarpras = '$id_sarpras'");
        $xx = mysqli_query($koneksi, "UPDATE sarpras SET kode_sarpras = 'SPPJM' WHERE id_sarpras = '$id_sarpras'");

      }

if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'peminjaman.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'peminjaman_in.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'peminjaman_in.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus JPG, PNG atau JPEG, PDF, DOCX!'); window.location = 'peminjaman_in.php';</script><?php
      }

    }
 ?>