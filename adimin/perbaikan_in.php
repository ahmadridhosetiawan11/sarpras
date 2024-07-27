<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Form Input Data Perbaikan Sarpras</h4>
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
                          <label for="exampleInputEmail1">Nama Sarpras (Berdasarkan Tabel Sarpras Rusak)</label>
                            <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)' required="">
                                <option readonly="">-PILIH-</option>
                                <?php 
                                  $sss = mysqli_query($koneksi, "SELECT * FROM rusak INNER JOIN sarpras ON rusak.id_sarpras=sarpras.id_sarpras WHERE jml_rk > 0");
                                          $a  = "var kategori = new Array();\n;";
                                          $xx  = "var jml_rk = new Array();\n;";
                                      while($data = mysqli_fetch_array($sss)) {?>
                                      <option name="id_sarpras" value="<?= $data['id_sarpras'] ?>"><?= $data['nama_s'] ?></option>
                                      <?php 
                                          $a .= "kategori['" .$data['id_sarpras']. "'] = {kategori:'" . addslashes($data['kategori'])."'};\n";
                                          $xx .= "jml_rk['" .$data['id_sarpras']. "'] = {jml_rk:'" . addslashes($data['jml_rk'])."'};\n";
                                       ?>
                                    <?php 
                                    }
                                     ?>
                            </select>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                          <label>Jumlah Ada Pada Tabel Sarpras Rusak</label>
                          <input type="text" readonly="" class="form-control" id="jml_rk" placeholder="Jumlah Ada">
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
                              <label for="exampleInputEmail1">Tanggal Melakukan Perbaikan</label>
                              <input type="date" name="tgl_pbk" class="form-control" value="<?=date('Y-m-d')?>">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Selesai Perbaikan</label>
                               <input type="date" name="tgl_sel" class="form-control" value="<?=date('Y-m-d')?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Jumlah Perbaikan</label>
                              <input type="number" class="form-control" name="jml_pbk" placeholder="Jumlah Perbaikan">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Kategori Perbaikan</label>
                              <select name="kondisi_pbk" class="form-control"  onchange='changeValue(this.value)' required="">
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Sedang">Rusak Sedang</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Biaya Perbaikan</label>
                              <input type="number" class="form-control" name="biaya_pbk" placeholder="Biaya Perbaikan">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Keterangan Perbaikan</label>
                              <input type="text" class="form-control" name="ket_pbk" placeholder="Keterangan Perbaikan">
                            </div>
                          </div>
                        </div>
                      </div>

                        <!-- <div class="form-group">
                          <label for="exampleInputEmail1">Pegawai yang Membuat Laporan</label>
                            <select name="id_pegawai" class="form-control"  onchange='changeValue(this.value)' required="">
                                <option readonly="">-PILIH-</option>
                                <?php 
                                  $sss = mysqli_query($koneksi, "SELECT * FROM pegawai");
                                      while($data = mysqli_fetch_array($sss)) {?>
                                      <option name="id_pegawai" value="<?= $data['id_pegawai'] ?>"><?= $data['nama_lengkap'] ?></option>
                                    <?php 
                                    }
                                     ?>
                            </select>
                        </div> -->

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
    <?php echo $a;echo $xx;?>
     function changeValue(id){
       document.getElementById('kategori').value = kategori[id].kategori;
       document.getElementById('jml_rk').value = jml_rk[id].jml_rk;}
</script>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['input'])) {

    $id_sarpras = $_REQUEST['id_sarpras'];
    $tgl_pbk = $_REQUEST['tgl_pbk'];
    $tgl_sel = $_REQUEST['tgl_sel'];
    $jml_pbk = $_REQUEST['jml_pbk'];
    $kondisi_pbk = $_REQUEST['kondisi_pbk'];
    $ket_pbk = $_REQUEST['ket_pbk'];
    $biaya_pbk = $_REQUEST['biaya_pbk'];

    $asu = mysqli_query($koneksi, "SELECT jml_perbaikan FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $asoy = mysqli_fetch_array($asu);
    $new = $asoy['jml_perbaikan']+$jml_pbk;

    $result = mysqli_query($koneksi,"SELECT jml_rk FROM rusak WHERE id_sarpras = '$id_sarpras'");
      $asem = mysqli_fetch_array($result);
      if($jml_pbk > $asem['jml_rk']){
        echo "<script>alert('Jumlah Melebihi dari Jumlah yang ada!'); window.location = 'perbaikan_in.php';</script>"; return false; }
    $datajumlah = mysqli_query($koneksi, "SELECT jml_rk FROM rusak WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml_rk'] - $jml_pbk;

    $update = mysqli_query($koneksi,"INSERT INTO perbaikan (id_sarpras, tgl_pbk,  tgl_sel, jml_pbk,kondisi_pbk,ket_pbk,biaya_pbk, status_pbk) VALUES(
          '$id_sarpras',
          '$tgl_pbk',
          '$tgl_sel',
          '$jml_pbk',
          '$kondisi_pbk',
          '$ket_pbk',
          '$biaya_pbk',
          'Sedang Dalam Perbaikan');");
    if($update){
        $asee = mysqli_query($koneksi, "UPDATE rusak SET jml_rk = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");
        $xx = mysqli_query($koneksi, "UPDATE sarpras SET kode_sarpras = 'SPPRB' WHERE id_sarpras = '$id_sarpras'");
        $asoe = mysqli_query($koneksi, "UPDATE sarpras SET jml_perbaikan = '$new' WHERE id_sarpras = '$id_sarpras'");
}if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'perbaikan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'perbaikan.php';</script><?php
        }
      }
    
 ?>