<?php require_once("head.php");require_once("../koneksi.php");require_once("../fungsi_indotgl.php");require_once("../fungsi_rupiah.php"); ?>
    <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Perawatan Sarpras</h4>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <a href="perawatan_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a>
                      <div class="table-responsive">
                        <table
                          id="zero_config"
                          class="table table-striped table-bordered"
                        >
                      <thead>
                  <tr>
                    <th>NO</th>
                    <th>Detail</th>
                    <th>Nama Sarpras</th>
                    <th>Tgl Perawatan</th>
                    <th>Keterangan</th>
                    <th>Biaya Perawatan</th>
                    <th>Status Perawatan</th>
                    <th id="ikonbtn"><i class="fas fa-cogs"></i></th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr >
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM perawatan INNER JOIN sarpras ON perawatan.id_sarpras=sarpras.id_sarpras");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;"><a title="Detail Data" href="detail_perawatan.php?id_perawatan=<?php echo $data['id_perawatan']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-account-card-details"></i><input type="hidden" value="<?=$data['id_perawatan'];?>"></a></td>
                    <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
                    <td style="vertical-align: middle;"><?php echo tgl_indo($data['tgl_prw']) ?></td>
                    <td style="vertical-align: middle;"><?php echo $data['ket_prw'] ?></td>
                    <td style="vertical-align: middle;"><?php echo rupiah($data['biaya_prw']) ?></td>
                    <td style="vertical-align: middle;"><?php echo $data['status_prw'] ?></td>

                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <?php 
                        if($data['status_prw']=='Sedang Dalam Perawatan'){?>
                          <form action="" method="post">
                            <input type="hidden" name="id_perawatan" value="<?=$data['id_perawatan']?>">
                            <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                            <input type="hidden" name="ket_prw" value="<?=$data['ket_prw']?>">
                            <input type="hidden" name="jml_prw" value="<?=$data['jml_prw']?>">
                            <input type="hidden" name="status_prw" value="<?=$data['status_prw']?>">
                            <button title="Selesai Perawatan" type="submit" name="sub" class="btn btn-info btn-circle"><i class="mdi mdi-alert-octagram"></i></button>
                          </form>
                      <?php }?>
                      
                      <?php 
                        if($data['status_prw']=='Sedang Dalam Perawatan'){?>
                          <a title="Edit Data?" name="id_perawatan" href="perawatan_ed.php?id_perawatan=<?php echo $data['id_perawatan']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                      <?php }?>
                      <a href="perawatan_hp.php?id_perawatan=<?php echo $data['id_perawatan']; ?>&status_prw=<?php echo $data['status_prw']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
      <!-- ============================================================== -->
      <!-- End PAge Content -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right sidebar -->
      <!-- ============================================================== -->
      <!-- .right-sidebar -->
      <!-- ============================================================== -->
      <!-- End Right sidebar -->
      <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
  <?php require_once("foot.php"); ?>

  <?php
  if (isset($_POST['sub'])) {
    $id_perawatan = $_POST['id_perawatan'];
    $id_sarpras = $_POST['id_sarpras'];
    $jml_prw = $_POST['jml_prw'];
    $status_prw = $_POST['status_prw'];

    $asu = mysqli_query($koneksi, "SELECT jml_prw FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $asoy = mysqli_fetch_array($asu);
    $new = $asoy['jml_prw']-$jml_prw;

    $update = mysqli_query($koneksi, "UPDATE `perawatan` SET `status_prw` = 'Perawatan Telah Selesai' WHERE `perawatan`.`id_perawatan` = '$id_perawatan;'");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_prw;

      if($update){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");
      $asoe = mysqli_query($koneksi, "UPDATE sarpras SET jml_prw = '$new' WHERE id_sarpras = '$id_sarpras'");}

if($update){
          ?> <script>alert('Perawatan Telah Diselesaikan!'); window.location = 'perawatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'perawatan.php';</script><?php
        }
    
  } ?>