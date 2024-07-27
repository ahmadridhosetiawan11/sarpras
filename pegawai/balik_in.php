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
                    <label for="exampleInputEmail1">Sarpras yang Anda Pinjam (<i>Berdasarkan Surat Peminjaman Anda</i> )</label>
                        <select name="id_peminjaman" class="form-control"  onchange='changeValue(this.value)'>
                          <option readonly="">-PILIH-</option>
                          <?php $now = date('Y-m-d'); ?>
                          <?php 
                          $nip=$user_row['nip'];
                            $datapegawai = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN denda ON sarpras.kategori=denda.kategori INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE nip='$nip' AND status_pjm = 'Sedang Dipinjam'");
                                    $z  = "var tgl_mnjm = new Array();\n;";
                                    $a  = "var tgl_kbl = new Array();\n;";
                                    $h  = "var jml_p = new Array();\n;";
                                    $hz  = "var nama_s = new Array();\n;";
                                    $hx  = "var id_pegawai = new Array();\n;";
                                while($data = mysqli_fetch_array($datapegawai)) {?>
                                <option name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>"><?= $data['nama_s'] ?> | <?= $data['status_pjm'] ?></option>
                                <?php 
                                $z .= "tgl_mnjm['" .$data['id_peminjaman']. "'] = {tgl_mnjm:'" . addslashes($data['tgl_mnjm'])."'};\n";
                                $a .= "tgl_kbl['" .$data['id_peminjaman']. "'] = {tgl_kbl:'" . addslashes($data['tgl_kbl'])."'};\n";
                                $h .= "jml_p['" .$data['id_peminjaman']. "'] = {jml_p:'" . addslashes($data['jml_p'])."'};\n";
                                $hz .= "nama_s['" .$data['id_peminjaman']. "'] = {nama_s:'" . addslashes($data['nama_s'])."'};\n";
                                $hx .= "id_pegawai['" .$data['id_peminjaman']. "'] = {id_pegawai:'" . addslashes($data['id_pegawai'])."'};\n";
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
                        <input type="text" readonly="" class="form-control" name="jml_blk" id="jml_p" placeholder="Jumlah meminjam">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pembuatan Surat ini</label>
                        <input type="date" name="tgl_balik" class="form-control" value="<?=date('Y-m-d')?>">
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
    <?php echo $z;echo $a;echo $h;echo $hz;echo $hx;?>
     function changeValue(id){
      document.getElementById('tgl_mnjm').value = tgl_mnjm[id].tgl_mnjm;
       document.getElementById('tgl_kbl').value = tgl_kbl[id].tgl_kbl;
        document.getElementById('jml_p').value = jml_p[id].jml_p;
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


    $tambah = mysqli_query($koneksi,"INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_pegawai`, `jml_blk`,`tgl_balik`, `status_kbl`) VALUES (NULL, '$id_peminjaman', '$id_pegawai', '$jml_blk','$tgl_balik', 'Sudah Dikembalikan');");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE nama_s = '$nama_s'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_blk;

    $databalik = mysqli_query($koneksi, "SELECT jml_pjm FROM peminjaman WHERE nama_s = '$nama_s'");
    $jimlihidi = mysqli_fetch_array($databalik);
    $titiljimlih = $jimlihidi['jml_pjm'] - $jml_blk;

      if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE nama_s = '$nama_s'");
        $aseek = mysqli_query($koneksi, "UPDATE peminjaman SET jml_pjm = '$titiljimlih' WHERE id_peminjaman = '$id_peminjaman'");
        $asuu = mysqli_query($koneksi, "UPDATE pengajuan SET status_p = '1' WHERE id_pegawai = '$id_pegawai'");
      }

      if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE pengajuan SET tgl_kbl = '$tgl_balik' WHERE id_pegawai = '$id_pegawai'");}

      if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE peminjaman SET status_pjm = 'Sudah Dikembalikan' WHERE id_peminjaman = '$id_peminjaman'");}

if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'balik.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'balik_in.php';</script><?php
        }
      }

 ?>