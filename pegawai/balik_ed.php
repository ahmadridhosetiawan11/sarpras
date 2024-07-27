<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_pengembalian  = $_GET['id_pengembalian'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai WHERE id_pengembalian = '$id_pengembalian'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Edit Data Pengembalian</h4>
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
                    <label for="exampleInputEmail1">Sarpras yang Dipinjam (<i>Berdasarkan Surat Peminjaman</i> )</label>
                        <select name="id_peminjaman" class="form-control"  onchange='changeValue(this.value)'>
                          <option value="<?=$row['id_pengembalian']?>"><?=$row['nama_lengkap']?> | <?= $row['nama_s'] ?> | <?= $row['status_pjm'] ?></option>
                          <?php $now = date('Y-m-d'); ?>
                          <?php 
                          $nip=$user_row['nip'];
                            $datapegawai = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN denda ON sarpras.kategori=denda.kategori INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE nip='$nip' AND status_pjm = 'Sedang Dipinjam'");
                                    $z  = "var tgl_mnjm = new Array();\n;";
                                    $a  = "var tgl_kbl = new Array();\n;";
                                    $h  = "var jml_p = new Array();\n;";
                                while($data = mysqli_fetch_array($datapegawai)) {?>
                                <option name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>"><?= $data['nama_lengkap'] ?> | <?= $data['nama_s'] ?> | <?= $data['status_pjm'] ?></option>
                                <?php 
                                $z .= "tgl_mnjm['" .$data['id_peminjaman']. "'] = {tgl_mnjm:'" . addslashes($data['tgl_mnjm'])."'};\n";
                                $a .= "tgl_kbl['" .$data['id_peminjaman']. "'] = {tgl_kbl:'" . addslashes($data['tgl_kbl'])."'};\n";
                                $h .= "jml_p['" .$data['id_peminjaman']. "'] = {jml_p:'" . addslashes($data['jml_p'])."'};\n";
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
                        
                        <input type="text" readonly="" class="form-control" name="id_pegawai" id="id_pegawai" value="<?=$row['id_pegawai']?>">
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
                        <input type="text" readonly="" class="form-control" name="jml_blk" id="jml_p" name="jml_pnjm" placeholder="Jumlah meminjam">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Status Pengembalian</label>
                        <input readonly="" type="text" name="status_kbl" class="form-control" value="<?=$row['status_kbl']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pembuatan Surat ini</label>
                        <input type="date" name="tgl_balik" class="form-control" value="<?=$row['tgl_balik']?>">
                      </div>
                    </div>
                  </div>

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

    $id_peminjaman = $_REQUEST['id_peminjaman'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $jml_blk = $_REQUEST['jml_blk'];
    $tgl_balik = $_REQUEST['tgl_balik'];
    $status_kbl = $_REQUEST['status_kbl'];

    $tambah = mysqli_query($koneksi,"UPDATE pengembalian SET id_peminjaman='$id_peminjaman',id_pegawai='$id_pegawai',jml_blk='$jml_blk',tgl_balik='$tgl_balik',status_kbl='$status_kbl' WHERE `pengembalian`.`id_pengembalian`='$id_pengembalian'");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'balik.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'balik_en.php';</script><?php
        }
      }

 ?>
<script type="text/javascript">
    <?php echo $z;echo $a;echo $h;?>
     function changeValue(id){
      document.getElementById('tgl_mnjm').value = tgl_mnjm[id].tgl_mnjm;
       document.getElementById('tgl_kbl').value = tgl_kbl[id].tgl_kbl;
        document.getElementById('jml_p').value = jml_p[id].jml_p;;}
</script>