<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Input Pengembalian Sarpras</h4>
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
                    <label for="exampleInputEmail1">Sarpras yang Dipinjam (<i>Berdasarkan Surat Peminjaman</i> )</label>
                        <select name="id_peminjaman" class="form-control select2"  onchange='changeValue(this.value)' required="">
                          <option readonly="">-PILIH-</option>
                          <?php $now = date('Y-m-d'); ?>
                          <?php 
                            $datapegawai = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE id_peminjaman > 0");
                                    $z  = "var tgl_mnjm = new Array();\n;";
                                    $a  = "var tgl_kbl = new Array();\n;";
                                    $h  = "var jml_pnjm = new Array();\n;";
                                    $he  = "var nama_s = new Array();\n;";
                                    $ha  = "var id_pegawai = new Array();\n;";
                                while($data = mysqli_fetch_array($datapegawai)) {?>
                                <option name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>"><?= $data['nama_lengkap'] ?> | <?= $data['nama_s'] ?> | <?= $data['status_pjm'] ?></option>
                                <?php 
                                $z .= "tgl_mnjm['" .$data['id_peminjaman']. "'] = {tgl_mnjm:'" . addslashes($data['tgl_mnjm'])."'};\n";
                                $a .= "tgl_kbl['" .$data['id_peminjaman']. "'] = {tgl_kbl:'" . addslashes($data['tgl_kbl'])."'};\n";
                                $h .= "jml_pnjm['" .$data['id_peminjaman']. "'] = {jml_pnjm:'" . addslashes($data['jml_pnjm'])."'};\n";
                                $he .= "nama_s['" .$data['id_peminjaman']. "'] = {nama_s:'" . addslashes($data['nama_s'])."'};\n";
                                $ha .= "id_pegawai['" .$data['id_peminjaman']. "'] = {id_pegawai:'" . addslashes($data['id_pegawai'])."'};\n";
                                 ?>
                              <?php 
                              }
                               ?>
                      </select>
                  </div>

                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label>Tanggal Meminjam</label>
                        <input type="date" readonly="" class="form-control" name="tgl_mnjm" id="tgl_mnjm" placeholder="Tanggal Meminjam">
                        <input type="hidden" readonly="" class="form-control" name="nama_s" id="nama_s" placeholder="Tanggal Meminjam">
                        <input type="hidden" readonly="" class="form-control" name="id_pegawai" id="id_pegawai" placeholder="Tanggal Meminjam">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>Tanggal Mengembalikan</label>
                        <input type="date" readonly="" class="form-control" id="tgl_kbl" placeholder="Tanggal Mengembalikan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>Jumlah meminjam</label>
                        <input type="text" readonly="" class="form-control" id="jml_pnjm" name="jml_pnjm" placeholder="Jumlah meminjam">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pembuatan Surat ini</label>
                        <input type="date" name="tgl_balik" class="form-control" value="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>Jumlah Mengembalikan</label>
                        <input type="number" class="form-control" name="jml_blk" placeholder="Jumlah Mengembalikan">
                      </div>
                    </div>
                    <!-- <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File/Foto Surat Pengajuan yg Sudah Disetujui</label>
                          <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name="file_pnjm" class="custom-file-input" id="exampleInputFile">
                            </div>
                          </div>
                        </div>
                      <p style="color: red">(<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                    </div> -->
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
    <?php echo $z;echo $a;echo $h;echo $he;echo $ha;?>
     function changeValue(id){
      document.getElementById('tgl_mnjm').value = tgl_mnjm[id].tgl_mnjm;
       document.getElementById('tgl_kbl').value = tgl_kbl[id].tgl_kbl;
        document.getElementById('jml_pnjm').value = jml_pnjm[id].jml_pnjm;
      document.getElementById('nama_s').value = nama_s[id].nama_s;
      document.getElementById('id_pegawai').value = id_pegawai[id].id_pegawai;}
</script>
<?php $now = date('Y-m-d'); ?>
<?php 
if (isset($_POST['input'])) {

    $id_peminjaman = $_REQUEST['id_peminjaman'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $jml_blk = $_REQUEST['jml_blk'];
    $tgl_balik = $_REQUEST['tgl_balik'];
    $nama_s = $_REQUEST['nama_s'];
    $jml_pnjm = $_REQUEST['jml_pnjm'];

    $result = mysqli_query($koneksi,"SELECT jml_pnjm FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'");
      $asoy = mysqli_fetch_array($result);
      if($jml_blk == $asoy['jml_pnjm']){
        echo "<script>alert('Jumlah Pengembalian Anda Melebihi dari Jumlah yang ada!'); window.location = 'balik_in.php';</script>"; return false; }

    $tambah = mysqli_query($koneksi,"INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_pegawai`, `jml_blk`,`tgl_balik`, `status_kbl`) VALUES (NULL, '$id_peminjaman', '$id_pegawai', '$jml_blk','$tgl_balik', 'Sudah Dikembalikan');");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_blk;

    $df = mysqli_query($koneksi, "SELECT jml_pnjm FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'");
    $asu = mysqli_fetch_array($df);
    $tj = $asu['jml_pnjm'] - $jml_blk;

    $tew = $jml_blk == $jml_pnjm;

if($tambah){
          $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");

          $asee = mysqli_query($koneksi, "UPDATE pengajuan SET tgl_kbl = '$tgl_balik' WHERE id_pegawai = '$id_pegawai'");

          $aswe = mysqli_query($koneksi, "UPDATE peminjaman SET status_pjm = 'Sudah Dikembalikan' WHERE jml_pnjm = '$tew'");

          $jml_blk < $jml_pnjm = $asw = mysqli_query($koneksi, "UPDATE peminjaman SET status_pjm = 'Sedang Dipinjam', jml_pnjm = '$tj' WHERE id_peminjaman = '$id_peminjaman'");
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'balik.php';</script><?php
        }else{
          
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'balik_in.php';</script><?php
        }
      }

 ?>