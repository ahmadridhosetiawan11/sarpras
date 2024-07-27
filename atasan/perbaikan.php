<?php require_once("head.php");require_once("../koneksi.php");require_once("../fungsi_indotgl.php");require_once("../fungsi_rupiah.php"); ?>
   <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Data Perbaikan Sarpras</h4>
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
                        <!-- <a href="perbaikan_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
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
                          <th>Tgl Perbaikan</th>
                          <th>Keterangan</th>
                          <th>Biaya Perbaikan</th>
                          <th>Status Perbaikan</th>
                          <!-- <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr >
                          <?php 
                          $no = 1;
                          $sql = mysqli_query($koneksi,"SELECT * FROM perbaikan INNER JOIN sarpras ON perbaikan.id_sarpras=sarpras.id_sarpras");
                          while ($data = mysqli_fetch_array($sql)) {
                          ?>
                          <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                          <td style="vertical-align: middle;"><a title="Detail Data" href="detail_perbaikan.php?id_perbaikan=<?php echo $data['id_perbaikan']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-account-card-details"></i><input type="hidden" value="<?=$data['id_perbaikan'];?>"></a></td>
                          <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
                          <td style="vertical-align: middle;"><?php echo tgl_indo($data['tgl_pbk']) ?></td>
                          <td style="vertical-align: middle;"><?php echo $data['ket_pbk'] ?></td>
                          <td style="vertical-align: middle;"><?php echo rupiah($data['biaya_pbk']) ?></td>
                          <td style="vertical-align: middle;"><?php echo $data['status_pbk'] ?></td>

                          <!-- <td id="ikonbtn2" style="vertical-align: middle;">
                            <?php
                              if($data['status_pbk']=='Sedang Dalam Perawatan'){?>
                              <form action="" method="post">
                                <input type="hidden" name="id_perbaikan" value="<?=$data['id_perbaikan']?>">
                                <input type="hidden" name="id_sarpras" value="<?=$data['id_sarpras']?>">
                                <input type="hidden" name="ket_pbk" value="<?=$data['ket_pbk']?>">
                                <input type="hidden" name="jml_pbk" value="<?=$data['jml_pbk']?>">
                                <input type="hidden" name="status_pbk" value="<?=$data['status_pbk']?>">
                                <button title="Selesai perbaikan" type="submit" name="sub" class="btn btn-info btn-circle"><i class="mdi mdi-auto-fix"></i></button>
                              </form>
                            <?php }?>
                            <a title="Edit Data?" name="id_perbaikan" href="perbaikan_ed.php?id_perbaikan=<?php echo $data['id_perbaikan']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                            <a href="perbaikan_hp.php?id_perbaikan=<?php echo $data['id_perbaikan']; ?>&status_pbk=<?php echo $data['status_pbk']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i> <input type="hidden" name="status_pbk" value="<?=$data['status_pbk']?>"></a>
                          </td> -->
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
    $id_perbaikan = $_POST['id_perbaikan'];
    $id_sarpras = $_POST['id_sarpras'];
    $jml_pbk = $_POST['jml_pbk'];
    $status_pbk = $_POST['status_pbk'];

    $update = mysqli_query($koneksi, "UPDATE `perbaikan` SET `status_pbk` = 'Perbaikan Telah Selesai' WHERE `perbaikan`.`id_perbaikan` = '$id_perbaikan;'");

    $datajumlah = mysqli_query($koneksi, "SELECT jml FROM sarpras WHERE id_sarpras = '$id_sarpras'");
    $jumlahada = mysqli_fetch_array($datajumlah);
    $totaljumlah = $jumlahada['jml'] + $jml_pbk;

      if($update){
        $asee = mysqli_query($koneksi, "UPDATE sarpras SET jml = '$totaljumlah' WHERE id_sarpras = '$id_sarpras'");}

if($update){
          ?> <script>alert('Perbaikan Telah Diselesaikan!'); window.location = 'perbaikan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'perbaikan.php';</script><?php
        }
    
  } ?>