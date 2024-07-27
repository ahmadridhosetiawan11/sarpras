  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php');  error_reporting(0);

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM rusak INNER JOIN sarpras ON rusak.id_sarpras=sarpras.id_sarpras");

$id_rusak = $_GET['id_rusak'];
$anggota = mysqli_query($koneksi, "SELECT * FROM rusak INNER JOIN sarpras ON rusak.id_sarpras=sarpras.id_sarpras WHERE id_rusak = '$id_rusak' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM rusak INNER JOIN sarpras ON rusak.id_sarpras=sarpras.id_sarpras WHERE id_rusak = '$id_rusak'");
$jul = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Barang Rusak</h4>
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
    <!-- Main content -->
<div class="container-fluid">
    <?php 
if(mysqli_num_rows($anggota)> 0){ ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Detail Barang Jual</h3>
          </div>
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="bg-black">
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Tanggal Jual</th>
                  <th>Jumlah Jual</th>
                  <th>Harga Jual / Unit</th>
                  <th>Status Barang Jual</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($ju = mysqli_fetch_array($anggota)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $ju['nama_s'] ?></td>
                    <td><?= $ju['kategori'] ?></td>
                    <td><?= tgl_indo($ju['tgl_j']) ?></td>
                    <td><?= $ju['jml_j'] ?></td>           
                    <td><?= rupiah($ju['harga_j']) ?></td>
                    <td><?php 
                        if($ju['jml_j']==0){
                          echo '<p style="vertical-align: middle;" class="text-center text-danger"><b>Tidak Tersedia</b></p>';
                        }else if($ju['jml_j']){
                          echo '<p style="vertical-align: middle;" class="text-center text-success"><b>Tersedia</b></p>';
                        } ?>
                    </td>
                <?php } ?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <a href="?action=tambah" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a>
                      <div class="table-responsive">
                        <table id="zero_config"class="table table-striped table-bordered">
                      <thead>
                  <tr>
                    <th>NO</th>
                    <!-- <th>Detail Data</th> -->
                    <th>Tanggal Rusak</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan Rusak</th>
                    <th>Kategori Rusak</th>
                    <th id="ikonbtn"><i class="fas fa-cogs"></i></th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr >
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo tgl_indo($data['tgl_rusak']) ?></td>
                    <td><?php echo $data['nama_s'] ?></td>
                    <td>
                      <?php
                      if ($data['jml_rk']=='udeh'){
                          echo "Telah Selesai / Sudah Di  Perbaiki";
                      }else if($data['jml_rk']==0){
                        echo "Sedang Dalam Perbaikan";
                      }else{
                        echo $data['jml_rk'];
                      }?>
                      
                    </td>
                    <td><?php echo $data['ket_rusak'] ?></td>
                    <td><?php echo $data['kategori_rusak'] ?></td>
                    <td id="ikonbtn2">
                      <?php 
                        if ($data['jml_rk']==00){ ?>
                          <form action="rusak_hp.php" method="post">
                        <input type="hidden" name="id_rusak" value="<?=$data['id_rusak']?>">
                        <button name="sue" href="" type="submit" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></button>
                      </form>

                      <?php }else{?>
                      <a title="Edit Data?" name="id_rusak" href="?action=ubah&id_rusak=<?php echo $data['id_rusak']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                      <form action="rusak_hp.php" method="post">
                        <input type="hidden" name="id_rusak" value="<?=$data['id_rusak']?>">
                        <input type="hidden" name="jml_rk" value="<?=$data['jml_rk']?>">
                        <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                        <button name="asem" href="" type="submit" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></button>
                      </form>
                    <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php break;
case "tambah": ?>
<div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Input Data Barang Rusak</h4>
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
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Rusak</label>
                          <input type="date" class="form-control" name="tgl_rusak" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana / Barang yg Rusak</label>
                          <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)'>
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $datapegawai = mysqli_query($koneksi, "SELECT * FROM sarpras WHERE kategori ='Sarana'");
                                        $z  = "var jml = new Array();\n;";
                                    while($data = mysqli_fetch_array($datapegawai)) {?>
                                    <option name="id_sarpras" value="<?= $data['id_sarpras'] ?>"><?= $data['nama_s'] ?></option>
                                    <?php 
                                    $z .= "jml['" .$data['id_sarpras']. "'] = {jml:'" . addslashes($data['jml'])."'};\n";
                                     ?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Tersedia</label>
                        <input type="text" readonly="" class="form-control" id="jml" name="jml" placeholder="Jumlah Tersedia">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Rusak</label>
                        <input type="number" class="form-control" id="jml_rk" name="jml_rk" placeholder="Jumlah Rusak">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Kategori Rusak</label>
                        <select name="kategori_rusak" id="" class="form-control">
                          <option value="Rusak Ringan">Rusak Ringan</option>
                          <option value="Rusak Sedang">Rusak Sedang</option>
                          <option value="Rusak Berat">Rusak Berat</option>
                          <option value="Rusak Total">Rusak Total</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" id="ket_rusak" name="ket_rusak" placeholder="Keterangan">
                      </div>
                    </div>
                  </div>
                </div>
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
    <!-- /.content -->

<?php break;
case "ubah": 
 $id_rusak  = $_GET['id_rusak'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM rusak INNER JOIN sarpras ON rusak.id_sarpras=sarpras.id_sarpras WHERE id_rusak = '$id_rusak'");
  $row = mysqli_fetch_array($tb_dt);?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Edit Data Barang Rusak</h4>
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
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Rusak</label>
                          <input type="date" class="form-control" name="tgl_rusak" required="" value="<?=$row['tgl_rusak']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana / Barang yg Rusak</label>
                          <select name="id_sarpras" class="form-control select2"  onchange='changeValue(this.value)'>
                              <option value="<?=$row['id_sarpras']?>"><?=$row['nama_s']?></option>
                              <?php 
                                $datapegawai = mysqli_query($koneksi, "SELECT * FROM sarpras WHERE kategori ='Sarana'");
                                        $z  = "var jml = new Array();\n;";
                                    while($data = mysqli_fetch_array($datapegawai)) {?>
                                    <option name="id_sarpras" value="<?= $data['id_sarpras'] ?>"><?= $data['nama_s'] ?></option>
                                    <?php 
                                    $z .= "jml['" .$data['id_sarpras']. "'] = {jml:'" . addslashes($data['jml'])."'};\n";
                                     ?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Tersedia</label>
                        <input type="text" readonly="" class="form-control" id="jml" name="jml" value="<?=$row['jml']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Rusak</label>
                        <input type="number" class="form-control" id="jml_rk" name="jml_rk" value="<?=$row['jml_rk']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Kategori Rusak</label>
                        <select name="kategori_rusak" id="" class="form-control">
                          <option value="<?=$row['kategori_rusak']?>"><?=$row['kategori_rusak']?></option>
                          <option value="Rusak Ringan">Rusak Ringan</option>
                          <option value="Rusak Sedang">Rusak Sedang</option>
                          <option value="Rusak Berat">Rusak Berat</option>
                          <option value="Rusak Total">Rusak Total</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <!-- <input type="hidden" readonly="" class="form-control" value="<?=$row['id_sarpras']?>" name="id_sarprasn">
                        <input type="hidden" readonly="" class="form-control" value="<?=$row['jml_rk']?>" name="jml_rkn"> -->

                        <input type="text" class="form-control" id="ket_rusak" name="ket_rusak" value="<?=$row['ket_rusak']?>">
                      </div>
                    </div>
                  </div>
                </div>
                  <input type="hidden" name="id_rusak" value="<?=$row['id_rusak']?>">
                    <div class="card-footer">
                      <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                      <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                      <button type="submit" name="edit" class="btn btn-warning float-sm-right" title="Ubah"><i class="fas fa-pencil-alt"></i></button>
                    </div>
                  </form>
                </div>
              <!-- /.card -->
             </div>
         </div>
     </div>
  </section>
</div>
<?php break; } ?>

<?php 
if (isset($_POST['input'])) {

    $id_sarpras = $_REQUEST['id_sarpras'];
    $jml = $_REQUEST['jml'];
    $tgl_rusak = $_REQUEST['tgl_rusak'];
    $jml_rk = $_REQUEST['jml_rk'];
    $ket_rusak = $_REQUEST['ket_rusak'];
    $kategori_rusak = $_REQUEST['kategori_rusak'];

    $asu = mysqli_query($koneksi, "SELECT jml_rusak FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $asoy = mysqli_fetch_array($asu);
    $new = $asoy['jml_rusak']+$jml_rk;

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_rk > $jumlahada['jml']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'rusak.php';</script>"; return false; } 

    $tambah = mysqli_query($koneksi,"INSERT INTO `rusak` VALUES (null,'$id_sarpras','$jml', '$tgl_rusak', '$jml_rk','$ket_rusak','$kategori_rusak');");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_rk = $_REQUEST['jml_rk'];

    if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");
      $asoe = mysqli_query($koneksi, "UPDATE sarpras SET jml_rusak = '$new' WHERE id_sarpras = '$id_sarpras'");
       $xx = mysqli_query($koneksi, "UPDATE sarpras SET kode_sarpras = 'SPRSK' WHERE id_sarpras = '$id_sarpras'");
    }

if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'rusak.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'rusak.php';</script><?php
        }
      }



if (isset($_POST['edit'])) {
    $id_rusak = $_REQUEST['id_rusak'];
    
    $id_sarpras = $_REQUEST['id_sarpras'];
    $jml = $_REQUEST['jml'];
    $tgl_rusak = $_REQUEST['tgl_rusak'];
    $jml_rk = $_REQUEST['jml_rk'];
    $ket_rusak = $_REQUEST['ket_rusak'];
    $kategori_rusak = $_REQUEST['kategori_rusak'];

    $id_sarprasn = $_POST['id_sarprasn'];
    $jml_rkn = $_POST['jml_rkn'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_rk > $jumlahada['jml']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'rusak.php';</script>"; return false; } 

    $ubah = mysqli_query($koneksi,"UPDATE rusak SET id_sarpras='$id_sarpras',jml='$jml',tgl_rusak='$tgl_rusak',jml_rk='$jml_rk',ket_rusak='$ket_rusak',kategori_rusak='$kategori_rusak' WHERE `rusak`.`id_rusak`='$id_rusak'");

  if($ubah){
      $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarprasn'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_rkn = $_POST['jml_rkn'];
  }
  if($ubah){
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarprasn'");
    
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_rk = $_REQUEST['jml_rk'];
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");}

if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'rusak.php';</script><?php
        }else{
          $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarprasn'");
          $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
          $jumlahada = mysqli_fetch_array($datajumlah);
          $totaljumlah = $jumlahada['jml'] - $jml_rk = $_REQUEST['jml_rk'];
          $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'rusak.php';</script><?php
        }

    }
 ?>
<script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;}
</script>
  <?php require_once('foot.php'); ?>