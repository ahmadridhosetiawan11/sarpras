  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php');  
  error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM beli INNER JOIN jual ON beli.id_j=jual.id_j INNER JOIN pegawai ON beli.id_pegawai=pegawai.id_pegawai INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras");

$id_beli = $_GET['id_beli'];
$anggota = mysqli_query($koneksi, "SELECT * FROM beli INNER JOIN jual ON beli.id_j=jual.id_j INNER JOIN pegawai ON beli.id_pegawai=pegawai.id_pegawai INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras WHERE id_beli = '$id_beli' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM beli INNER JOIN jual ON beli.id_j=jual.id_j INNER JOIN pegawai ON beli.id_pegawai=pegawai.id_pegawai INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras WHERE id_beli = '$id_beli'");
$jul = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Data Pembelian</h4>
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
                  <th>Tanggal Beli</th>
                  <th>Nama Pembeli</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Dibeli</th>
                  <th>Total</th>
                  <th>Bukti Pembayaran</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($ju = mysqli_fetch_array($anggota)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= tgl_indo($ju['tgl_b']) ?></td>
                    <td><?= $ju['nama_lengkap'] ?></td>
                    <td><?= $ju['nama_s'] ?></td>
                    <td><?= $ju['jml_j'] ?></td>           
                    <td><?= rupiah($ju['harga_b']) ?></td>
                    <td style="vertical-align: middle;" style="vertical-align: middle;" class="text-center"><a target="_blank" href="../fileweb/<?php echo  $ju['bukti']; ?>"><img src="<?php echo '../fileweb/'.$ju['bukti'] ?>" width="85px;"></a>
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
                    <th>Tanggal Beli</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
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
                    <td><a href="?action=detail&id_beli=<?php echo $data['id_beli']; ?>" class="btn btn-secondary btn-circle"><i class="mdi mdi-account-card-details"></i></a></td>
                    <td><?php echo tgl_indo($data['tgl_b']) ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <td><?php echo $data['nama_s'] ?></td>
                    <td><?php echo $data['jml_j'] ?></td>
                    <td id="ikonbtn2">
                      <a title="Edit Data?" name="id_beli" href="?action=ubah&id_beli=<?php echo $data['id_beli']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                      <form action="beli_hp.php" method="post">
                        <input type="hidden" name="id_beli" value="<?=$data['id_beli']?>">
                        <input type="hidden" name="jml_j" value="<?=$data['jml_j']?>">
                        <input type="hidden" name="id_j" value="<?=$data['id_j']?>">
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
            <h4 class="page-title">Form Input Data Pembelian</h4>
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
                        <label for="exampleInputEmail1">Tanggal Beli</label>
                          <input type="date" class="form-control" name="tgl_b" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana yg ingin Dibeli</label>
                          <select name="id_j" class="form-control select2"  onchange='changeValue(this.value)'>
                              <?php 
                                $datapegawai = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras");
                                        $z  = "var harga_j = new Array();\n;";
                                        $s  = "var id_sarpras = new Array();\n;";
                                    while($data = mysqli_fetch_array($datapegawai)) {?>
                                    <option name="id_j" value="<?= $data['id_j'] ?>"><?= $data['nama_s'] ?></option>
                                    <?php 
                                    $z .= "harga_j['" .$data['id_j']. "'] = {harga_j:'" . addslashes($data['harga_j'])."'};\n";
                                    $s .= "id_sarpras['" .$data['id_j']. "'] = {id_sarpras:'" . addslashes($data['id_sarpras'])."'};\n";                                     ?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Harga Barang / Unit</label>
                        <input type="text" readonly="" class="form-control" id="harga_j" name="harga_j" placeholder="Harga Barang / Unit">
                        <input type="hidden" name="id_sarpras" id="id_sarpras">
                      </div>
                    </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pembeli</label>
                        <select name="id_pegawai" class="form-control select2">
                            <?php 
                              $asq = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama_lengkap");
                                  while($ase = mysqli_fetch_array($asq)) {?>
                                  <option name="id_pegawai" value="<?= $ase['id_pegawai'] ?>"><?= $ase['nama_lengkap'] ?></option>
                                <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input type="number" maxlength="3" required="" class="form-control" id="jml_j" name="jml_j" placeholder="Jumlah Beli">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Bukti Pembayaran</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="bukti" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                      </div>
                      <p style="color: red">EKSTENSI YANG DIPERBOLEHKAN HANYA DALAM BENTUK .PNG | .JPG | .JPEG (<u>MAKSIMAL UKURAN FILE 700KB</u>)</p>
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
<script type="text/javascript">
    <?php echo $z; echo $s;
    ?>
     function changeValue(id){
      document.getElementById('harga_j').value = harga_j[id].harga_j;
      document.getElementById('id_sarpras').value = id_sarpras[id].id_sarpras;
    }
</script>
<?php break;
case "ubah": 
 $id_beli  = $_GET['id_beli'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM beli INNER JOIN jual ON beli.id_j=jual.id_j INNER JOIN pegawai ON beli.id_pegawai=pegawai.id_pegawai INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras WHERE id_beli = '$id_beli'");
  $row = mysqli_fetch_array($tb_dt);?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form Edit Data Pembelian</h4>
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
                        <label for="exampleInputEmail1">Tanggal Beli</label>
                          <input type="date" class="form-control" name="tgl_b" value="<?=$row['tgl_b']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sarana yg ingin Dibeli</label>
                          <select name="id_j" class="form-control select2"  onchange='changeValue(this.value)'>
                              <option value="<?=$row['id_j']?>"><?=$row['nama_s']?></option>
                              <?php 
                                $datapegawai = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN sarpras ON jual.id_sarpras=sarpras.id_sarpras");
                                        $z  = "var harga_j = new Array();\n;";
                                    while($data = mysqli_fetch_array($datapegawai)) {?>
                                    <option name="id_j" value="<?= $data['id_j'] ?>"><?= $data['nama_s'] ?></option>
                                    <?php 
                                    $z .= "harga_j['" .$data['id_j']. "'] = {harga_j:'" . addslashes($data['harga_j'])."'};\n";
                                     ?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Harga Barang / Unit</label>
                        <input type="text" readonly="" class="form-control" id="harga_j" name="harga_j" value="<?=$row['harga_j']?>">
                      </div>
                    </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pembeli</label>
                        <select name="id_pegawai" class="form-control select2">
                            <option value="<?=$row['id_pegawai']?>"><?=$row['nama_lengkap']?></option>
                            <?php 
                              $asq = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama_lengkap");
                                  while($ase = mysqli_fetch_array($asq)) {?>
                                  <option name="id_pegawai" value="<?= $ase['id_pegawai'] ?>"><?= $ase['nama_lengkap'] ?></option>
                                <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input type="hidden" readonly="" class="form-control" value="<?=$row['id_j']?>" name="id_jn">
                        <input type="hidden" readonly="" class="form-control" value="<?=$row['jml_j']?>" name="jml_jn">

                        <input type="number" maxlength="3" required="" class="form-control" id="jml_j" name="jml_j" value="<?=$row['jml_j']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Anda</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="hidden" name="fl" value="<?=$row['bukti']?>">
                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                          </div>
                        </div>
                      </div>
                      <p style="color: red">EKSTENSI YANG DIPERBOLEHKAN HANYA DALAM BENTUK .PNG | .JPG | .JPEG (<u>MAKSIMAL UKURAN FILE 800KB</u>)</p>
                      <p style="color: red">ABAIKAN APABILA TIDAK INGIN MENGUBAH FILE</p>
                    </div>
                  </div>
                </div>
                  <input type="hidden" name="id_beli" value="<?=$row['id_beli']?>">
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

$id_j = $_POST['id_j'];
$id_pegawai = $_POST['id_pegawai'];
$jml_j = $_POST['jml_j'];
$jml_j = $_POST['jml_j'];
$harga_j = $_POST['harga_j'];
$tgl_b = $_POST['tgl_b'];
$id_sarpras = $_POST['id_sarpras'];

$totalb = $harga_j = $_POST['harga_j'] * $jml_j = $_POST['jml_j'];

$ekstensi_diperbolehkan = array('jpg','jpeg','png');
$namafoto = $_FILES['bukti']['name'];
$x = explode('.', $namafoto);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['bukti']['size'];
$file_tmp = $_FILES['bukti']['tmp_name'];

$result = mysqli_query($koneksi,"SELECT jml_j FROM jual WHERE id_j = '$id_j'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_j > $jumlahada['jml_j']){
        echo "<script>alert('Jumlah Jual Melebihi dari Jumlah yang ada!'); window.location = 'beli.php';</script>"; return false; } 

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 2048000){  
      $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
      move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

$tambah = mysqli_query($koneksi,"INSERT INTO beli (id_j,id_pegawai, jml_j,jml_j,harga_b,tgl_b,bukti) VALUES(
'$id_j',
'$id_pegawai',
'$jml_j',
'$jml_j',
'$totalb',
'$tgl_b',
'$namabaru')");

$datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_j'");
    $jmlada = mysqli_fetch_array($datajumlah);
    $totalj = $jmlada['jml_j'] + $jml_j = $_REQUEST['jml_j'];

    if($tambah){
        $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totalj' WHERE id_j = '$id_j'");
        $aswww = mysqli_query($koneksi, "UPDATE sarpras SET total_beli = '$jml_j' WHERE id_sarpras = '$id_sarpras'");}

if($tambah){
?> <script>alert('Berhasil Disimpan!'); window.location = 'beli.php';</script><?php
}else{
?> <script>alert('Gagal, cek kembali!.'); window.location = 'beli_in.php';</script><?php
}
}else{
?> <script>alert('Gagal, Ukuran File Maksimal 700kb!'); window.location = 'beli_in.php';</script><?php
}
}else{
?> <script>alert('Gagal, File yang diupload format Harus JPG, PNG atau JPEG!'); window.location = 'beli_in.php';</script><?php
}
}

if (isset($_POST['edit'])) {
    $id_beli = $_REQUEST['id_beli'];
    
    $id_j = $_POST['id_j'];
    $id_pegawai = $_POST['id_pegawai'];
    $jml_j = $_POST['jml_j'];
    $jml_j = $_POST['jml_j'];
    $harga_j = $_POST['harga_j'];
    $tgl_b = $_POST['tgl_b'];

    $id_jn = $_POST['id_jn'];
    $jml_jn = $_POST['jml_jn'];

    $totalb = $harga_j = $_POST['harga_j'] * $jml_j = $_POST['jml_j'];

    $ekstensi_diperbolehkan = array('jpg','jpeg','png');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $filee = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

    $result = mysqli_query($koneksi,"SELECT jml_j FROM jual WHERE id_j = '$id_j'");
      $jumlahada = mysqli_fetch_array($result);
      if($jml_j > $jumlahada['jml_j']){
        echo "<script>alert('Jumlah Jual Melebihi batas bero'); window.location = 'beli.php';</script>"; return false; } 

  if($filee){
    $tambahh = mysqli_query($koneksi,"UPDATE beli SET id_j='$id_j',id_pegawai='$id_pegawai',jml_j='$jml_j',jml_j='$jml_j',harga_b='$totalb',tgl_b='$tgl_b',bukti='$fl' WHERE `beli`.`id_beli`='$id_beli'");
    
    $datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_jn'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml_j'] + $jml_jn;

  if($tambahh){
    $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_jn'");

    $datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_j'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml_j'] - $jml_j = $_POST['jml_j'];
    $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_j'");}

    }if($tambahh){
      ?> <script>alert('Berhasil Diubah Tanpa Mengubah File!'); window.location = 'beli.php';</script><?php
    }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $file);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    if($tambahh){
    $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_jn'");
    $datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_j'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml_j'] - $jml_j = $_POST['jml_j'];
    $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_j'");}

    $ubah = mysqli_query($koneksi,"UPDATE beli SET id_j='$id_j',id_pegawai='$id_pegawai',jml_j='$jml_j',jml_j='$jml_j',harga_b='$totalb',tgl_b='$tgl_b',bukti='$namabaru' WHERE `beli`.`id_beli`='$id_beli'");

      if($ubah){
      $datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_jn'");
      $jumlahada = mysqli_fetch_array($datajumlah);
      $totaljumlah = $jumlahada['jml_j'] + $jml_j = $_POST['jml_j'];
      }

      if($ubah){
        $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_jn'");
        $datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_j'");
        $jumlahada = mysqli_fetch_array($datajumlah);
        $totaljumlah = $jumlahada['jml_j'] - $jml_j = $_POST['jml_j'];
        $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_j'");}

    if($ubah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'beli.php';</script><?php
        }else{

        $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_jn'");
        $datajumlah = mysqli_query($koneksi, "SELECT jml_j FROM jual WHERE id_j = '$id_j'");
        $jumlahada = mysqli_fetch_array($datajumlah);
        $totaljumlah = $jumlahada['jml_j'] - $jml_j = $_POST['jml_j'];
        $asee = mysqli_query($koneksi, "UPDATE jual SET jml_j = '$totaljumlah' WHERE id_j = '$id_j'");

          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'beli.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kb!'); window.location = 'beli.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PNG, JPG , JPEG!'); window.location = 'beli.php';</script><?php
      }
    }
  }
 ?>

  <?php require_once('foot.php'); ?>