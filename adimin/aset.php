  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php');  error_reporting(0);

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM aset INNER JOIN sarpras ON aset.id_sarpras=sarpras.id_sarpras");

$id_aset = $_GET['id_aset'];
$anggota = mysqli_query($koneksi, "SELECT * FROM aset INNER JOIN sarpras ON aset.id_sarpras=sarpras.id_sarpras WHERE id_aset = '$id_aset' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM aset INNER JOIN sarpras ON aset.id_sarpras=sarpras.id_sarpras WHERE id_aset = '$id_aset'");
$jul = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Aset Tidak Layak / Layak</h4>
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
                    <th>Tanggal Data</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan Kelayakan</th>
                    <th>Status Kelayakan</th>
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
                    <!-- <td><a href="?action=detail&id_aset=<?php echo $data['id_aset']; ?>" class="btn btn-secondary btn-circle"><i class="mdi mdi-account-card-details"></i></a></td> -->
                    <td><?php echo tgl_indo($data['tgl_aset']) ?></td>
                    <td><?php echo $data['nama_s'] ?></td>
                    <td><?php echo $data['jml_aset']?></td>
                    <td><?php echo $data['ket_aset'] ?></td>
                    <td><?php echo $data['layak_aset'] ?></td>
                    <td id="ikonbtn2">
                      <?php 
                      if($data['status_aset']=="Layak"){ ?>
                        <a title="Edit Data?" name="id_aset" href="?action=ubah&id_aset=<?php echo $data['id_aset']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                      <?php }?>
                      <form action="aset_hp.php" method="post">
                        <input type="hidden" name="id_aset" value="<?=$data['id_aset']?>">
                        <input type="hidden" name="jml_aset" value="<?=$data['jml_aset']?>">
                        <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                        <input type="hidden" name="layak_aset" value="<?=$data['layak_aset']?>">
                        <input type="hidden" name="status_aset" value="<?=$data['status_aset']?>">
                        <button name="asem" href="" type="submit" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></button>
                      </form>
                      <?php 
                      if($data['status_aset']=="Tidak Layak"){ ?>
                        <form action="" method="POST">
                          <input type="hidden" name="id_aset" value="<?=$data['id_aset']?>">
                          <input type="hidden" name="jml_aset" value="<?=$data['jml_aset']?>">
                          <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                          <input type="hidden" name="layak_aset" value="<?=$data['layak_aset']?>">
                          <input type="hidden" name="status_aset" value="<?=$data['status_aset']?>">
                          <button type="submit" name="tombole" class="btn btn-secondary btn-info" data-placement="right" title="Setujui">Musnahkan Aset
                          </button>
                        </form>
                      <?php }?>
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
            <h4 class="page-title">Form Input Data Aset Tidak Layak / Layak</h4>
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
                        <label for="exampleInputEmail1">Tanggal Input Data</label>
                          <input type="date" class="form-control" name="tgl_aset" value="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana / Prasarana</label>
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
                        <label>Jumlah Ada</label>
                        <input type="text" readonly="" class="form-control" id="jml" name="jml" placeholder="Jumlah Ada">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah yang di inputkan</label>
                        <input type="number" class="form-control" id="jml_aset" name="jml_aset" placeholder="Jumlah yang di inputkan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Keterangan Aset</label>
                        <input type="text" class="form-control" id="ket_aset" name="ket_aset" placeholder="Keterangan Aset">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Status Kelayakan Aset</label>
                        <select name="layak_aset" id="" class="form-control">
                          <option value="Layak">Layak</option>
                          <option value="Tidak Layak">Tidak Layak</option>
                        </select>
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
 $id_aset  = $_GET['id_aset'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM aset INNER JOIN sarpras ON aset.id_sarpras=sarpras.id_sarpras WHERE id_aset = '$id_aset'");
  $row = mysqli_fetch_array($tb_dt);?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Edit Data Aset Tidak Layak / Layak</h4>
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
                        <label for="exampleInputEmail1">Tanggal Input Data</label>
                          <input type="date" class="form-control" name="tgl_aset" value="<?=$row['tgl_aset']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana / Prasarana</label>
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
                        <label>Jumlah Ada</label>
                        <input type="text" readonly="" class="form-control" id="jml" name="jml" value="<?=$row['jml']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah yang di inputkan</label>
                        <input type="number" class="form-control" id="jml_aset" name="jml_aset" value="<?=$row['jml_aset']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Keterangan Aset</label>
                        <input type="text" class="form-control" id="ket_aset" name="ket_aset" value="<?=$row['ket_aset']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Status Kelayakan Aset</label>
                        <select name="layak_aset" id="" class="form-control">
                          <option value="<?=$row['layak_aset']?>"><?=$row['layak_aset']?></option>
                          <option value="Layak">Layak</option>
                          <option value="Tidak Layak">Tidak Layak</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                  <input type="hidden" name="id_aset" value="<?=$row['id_aset']?>">
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
    $tgl_aset = $_REQUEST['tgl_aset'];
    $jml_aset = $_REQUEST['jml_aset'];
    $ket_aset = $_REQUEST['ket_aset'];
    $layak_aset = $_REQUEST['layak_aset'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");

      $jumlahada = mysqli_fetch_array($result);
      if($jml_aset > $jumlahada['jml']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'aset.php';</script>"; return false; } 

    $tambah = mysqli_query($koneksi,"INSERT INTO `aset` VALUES (null,'$id_sarpras','$jml', '$tgl_aset', '$jml_aset','$ket_aset','$layak_aset','$layak_aset');");

    // $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    // $jumlahada = mysqli_fetch_array($datajumlah);
    // $totaljumlah = $jumlahada['jml'] - $jml_aset = $_REQUEST['jml_aset'];

    if($tambah){
        // $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");

}if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'aset.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'aset.php';</script><?php
        }
      }



if (isset($_POST['edit'])) {
    $id_aset = $_REQUEST['id_aset'];
    $id_sarpras = $_REQUEST['id_sarpras'];
    $jml = $_REQUEST['jml'];
    $tgl_aset = $_REQUEST['tgl_aset'];
    $jml_aset = $_REQUEST['jml_aset'];
    $ket_aset = $_REQUEST['ket_aset'];
    $layak_aset = $_REQUEST['layak_aset'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_aset > $jumlahada['jml']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'aset.php';</script>"; return false; } 

    $ubah = mysqli_query($koneksi,"UPDATE aset SET id_sarpras='$id_sarpras',jml='$jml',tgl_aset='$tgl_aset',jml_aset='$jml_aset',ket_aset='$ket_aset',layak_aset='$layak_aset',status_aset='$layak_aset' WHERE `aset`.`id_aset`='$id_aset'");

if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'aset.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'aset.php';</script><?php
        }

    }
 ?>
<script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;}
</script>

<?php 
if (isset($_POST['tombole'])) {
    $id_aset = $_POST['id_aset'];
    $id_sarpras = $_POST['id_sarpras'];
    $jml_aset = $_POST['jml_aset'];
    $layak_aset = $_POST['layak_aset'];
    $status_aset = $_POST['status_aset'];

    $update = mysqli_query($koneksi, "UPDATE `aset` SET `layak_aset` = 'Tidak Layak (Aset Telah Dimusnahkan)',`status_aset` = 'Tidak Layak (Aset Telah Dimusnahkan)' WHERE `aset`.`id_aset` = '$id_aset';");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumsu = mysqli_fetch_array($datajumlah);
    $asuu = $jumsu['jml'] - $jml_aset = $_REQUEST['jml_aset'];

    if($update){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$asuu' WHERE id_sarpras = '$id_sarpras'");
}if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'aset.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'aset.php';</script><?php
        }
      }
?>
  <?php require_once('foot.php'); ?>