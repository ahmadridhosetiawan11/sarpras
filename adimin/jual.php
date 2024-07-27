  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php');  error_reporting(0);

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras");

$id_j = $_GET['id_j'];
$anggota = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras WHERE id_j = '$id_j' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras WHERE id_j = '$id_j'");
$jul = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Barang Jual</h4>
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
                    <th>Detail Data</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Harga/unit</th>
                    <th>Jumlah</th>
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
                    <td><a href="?action=detail&id_j=<?php echo $data['id_j']; ?>" class="btn btn-secondary btn-circle"><i class="mdi mdi-account-card-details"></i></a></td>
                    <td><?php echo tgl_indo($data['tgl_j']) ?></td>
                    <td><?php echo $data['nama_s'] ?></td>
                    <td><?php echo rupiah($data['harga_j']) ?></td>
                    <td><?php echo $data['jml_j'] ?></td>
                    <td id="ikonbtn2">
                      <a title="Edit Data?" name="id_j" href="?action=ubah&id_j=<?php echo $data['id_j']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                      <form action="jual_hp.php" method="post">
                        <input type="hidden" name="id_j" value="<?=$data['id_j']?>">
                        <input type="hidden" name="jml_j" value="<?=$data['jml_j']?>">
                        <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                        <button name="asem" href="" type="submit" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></button>
                      </form>
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
            <h4 class="page-title">Form Input Data Barang Jual</h4>
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
                        <label for="exampleInputEmail1">Tanggal Jual</label>
                          <input type="date" class="form-control" name="tgl_j" required="" value="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana yg ingin dijual</label>
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
                        <label>Harga Jual / Unit</label>
                        <input type="number" class="form-control" id="harga_j" name="harga_j" placeholder="Harga Jual / Unit">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Menjual</label>
                        <input type="number" class="form-control" id="jml_j" name="jml_j" placeholder="Jumlah Menjual">
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
 $id_j  = $_GET['id_j'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM jual INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras WHERE id_j = '$id_j'");
  $row = mysqli_fetch_array($tb_dt);?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Edit Data Barang Jual</h4>
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
                        <label for="exampleInputEmail1">Tanggal Jual</label>
                          <input required="" type="date" class="form-control" name="tgl_j" value="<?=$row['tgl_j']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana yg ingin dijual</label>
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
                        <label>Harga Jual / Unit</label>
                        <input type="number" class="form-control" id="harga_j" name="harga_j" value="<?=$row['harga_j']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Menjual</label>
                        <input type="hidden" readonly="" class="form-control" value="<?=$row['jml_j']?>" name="jml_jl"><input type="hidden" readonly="" class="form-control" value="<?=$row['id_sarpras']?>" name="id_sarprasl">
                        <input type="hidden" readonly="" class="form-control" value="<?=$row['tgl_j']?>" name="tgl_jl">

                        <input type="number" class="form-control" id="jml_j" name="jml_j" value="<?=$row['jml_j']?>">
                      </div>
                    </div>
                  </div>
                </div>
                  <input type="hidden" name="id_j" value="<?=$row['id_j']?>">
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
    $tgl_j = $_REQUEST['tgl_j'];
    $jml_j = $_REQUEST['jml_j'];
    $harga_j = $_REQUEST['harga_j'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_j > $jumlahada['jml']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'jual.php';</script>"; return false; } 

    $tambah = mysqli_query($koneksi,"INSERT INTO `jual` VALUES (null,'$id_sarpras','$jml', '$tgl_j', '$harga_j','$jml_j');");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_j = $_REQUEST['jml_j'];

    if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");}

if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'jual.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jual.php';</script><?php
        }
      }



if (isset($_POST['edit'])) {
    $id_j = $_REQUEST['id_j'];
    
    $id_sarpras = $_REQUEST['id_sarpras'];
    $jml = $_REQUEST['jml'];
    $tgl_j = $_REQUEST['tgl_j'];
    $jml_j = $_REQUEST['jml_j'];
    $harga_j = $_REQUEST['harga_j'];

    $id_sarprasl = $_POST['id_sarprasl'];
    $tgl_jl = $_POST['tgl_jl'];
    $jml_jl = $_POST['jml_jl'];

    $result = mysqli_query($koneksi,"SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_j > $jumlahada['jml']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'jual.php';</script>"; return false; } 

    $ubah = mysqli_query($koneksi,"UPDATE jual SET id_sarpras='$id_sarpras',jml='$jml',tgl_j='$tgl_j',harga_j='$harga_j',jml_j='$jml_j' WHERE `jual`.`id_j`='$id_j'");

  if($ubah){
      $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarprasl'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_jl = $_POST['jml_jl'];
  }
  if($ubah){
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarprasl'");
    
    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] - $jml_j = $_REQUEST['jml_j'];
    $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");}

if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'jual.php';</script><?php
        }else{
          $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarprasl'");
          $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
          $jumlahada = mysqli_fetch_array($datajumlah);
          $totaljumlah = $jumlahada['jml'] - $jml_j = $_REQUEST['jml_j'];
          $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jual.php';</script><?php
        }

    }
 ?>
<script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jml').value = jml[id].jml;}
</script>
  <?php require_once('foot.php'); ?>