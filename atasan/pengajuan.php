<?php require_once("head.php");require_once("../koneksi.php");require_once("../fungsi_indotgl.php"); ?>
   <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Data Pengajuan Peminjaman</h4>
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
                        <!-- <a href="pengajuan_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
                            <div class="table-responsive">
                              <table
                                id="zero_config"
                                class="table table-striped table-bordered"
                              >
                            <thead>
                        <tr>
                          <th>NO</th>
                          <th>Detail</th>
                          <th>Yang Mengajukan</th>
                          <th>Sarpras yang Diajukan</th>
                          <th>Keperluan</th>
                          <th>Status Surat</th>
                          <th>Keterangan</th>
                          <th id="ikonbtn"><i class="fas fa-cogs"></i></th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr >
                          <?php 
                          $no = 1;
                          $sql = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN sarpras ON pengajuan.id_sarpras = sarpras.id_sarpras INNER JOIN pegawai ON pengajuan.id_pegawai = pegawai.id_pegawai");
                          while ($data = mysqli_fetch_array($sql)) {
                          ?>
                          <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                          <td style="vertical-align: middle;"><a title="Detail Data" href="detail_pengajuan.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-account-card-details"></i><input type="hidden" value="<?=$data['id_pengajuan'];?>"></a></td>
                          <td style="vertical-align: middle;"><?php echo $data['nama_lengkap'] ?></td>
                          <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
                          <td style="vertical-align: middle;"><?php echo $data['keperluan'] ?></td>
                          <td style="vertical-align: middle;" class="text-center"><?php 
                              if($data['status_p']==0){
                                echo "<p class='text-warning'><b>Proses</b></p>";
                              }else if($data['status_p']==1){
                                echo "<p class='text-success'><b>Disetujui</b></p>";
                              }else if($data['status_p']==2){
                                echo "<p class='text-danger'><b>Ditolak</b></p>";
                              }?>
                          </td>
                          <td style="vertical-align: middle;"><?php echo $data['ket'] ?></td>

                          <td style="vertical-align: middle;" id="ikonbtn2">
                            <form action="" method="POST">
                            <div class="text-center">
                                <input type="text" class="form-control" name="ket" id="inputName"> 

                                <input type="hidden" class="form-control" name="id_pengajuan" id="inputName" value="<?=$data['id_pengajuan'];?>">      
                                <button type="submit" name="sub" class="btn btn-secondary btn-danger" data-placement="right" title="Tolak">
                                <a id="log"><i class="mdi mdi-account-remove"></i></a>
                                </button>
                                <button type="submit" name="tombole" class="btn btn-secondary btn-success" data-placement="right" title="Setujui">
                                <a id="log"><i class="mdi mdi-account-check"></i></a>
                                </button>
                              </div>
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
    $id_pengajuan = $_POST['id_pengajuan'];
    $ket = $_POST['ket'];
    $status_p = $_POST['status_p'];

    $update = mysqli_query($koneksi, "UPDATE `pengajuan` SET `ket` = '$ket',`status_p` = '2' WHERE `pengajuan`.`id_pengajuan` = $id_pengajuan;");

if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pengajuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pengajuan.php';</script><?php
        }
    
  }

else if (isset($_POST['tombole'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $ket = $_POST['ket'];
    $status_p = $_POST['status_p'];

    $update = mysqli_query($koneksi, "UPDATE `pengajuan` SET `ket` = '$ket',`status_p` = '1' WHERE `pengajuan`.`id_pengajuan` = $id_pengajuan;");

if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pengajuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pengajuan.php';</script><?php
        }
    
  }
?>