<?php require_once("head.php");require_once("../fungsi_indotgl.php"); ?>
   <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Peminjaman Sarpras</h4>
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
                  <a href="peminjaman_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a>
                      <div class="table-responsive">
                        <table
                          id="zero_config"
                          class="table table-striped table-bordered"
                        >
                      <thead>
                      <tr>
                        <th>NO</th>
                        <th>Detail</th>
                        <th>Nama Peminjam</th>
                        <th>Sarpras yang Dipinjam</th>
                        <th>Tanggal Pembuatan Surat ini</th>
                        <th>Status Peminjaman</th>
                        <th>Total Hari Peminjaman</th>
                        <th>Tambah Hari Meminjam <b>(jumlah yg di input akan menambah durasi hari pada tgl kembali)</b></th>
                        <th id="ikonbtn"><i class="fas fa-cogs"></i></th>
                      </tr>
                      </thead>
                      <tbody class="text-center">
                      <tr >
                        <?php 
                        $no = 1;
                        $sql = mysqli_query($koneksi,"SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai ORDER BY tgl_pmj ASC");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                         <td style="vertical-align: middle;"><a title="Detail Data" href="detail_peminjaman.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-account-card-details"></i><input type="hidden" value="<?=$data['id_peminjaman'];?>"></a></td>
                        <td style="vertical-align: middle;"><?php echo $data['nama_lengkap'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
                        <td style="vertical-align: middle;"><?php echo tgl_indo($data['tgl_pmj']) ?></td>
                        <td style="vertical-align: middle;">
                            <?php 
                              if($data['jml_pnjm'] > 0){
                                echo "Sedang Dipinjam";
                              }else if($data['jml_pnjm']==0){
                                echo "Sudah Dikembalikan";
                              }?>
                          </td>
                          <td style="vertical-align: middle;"><?php echo tgl_indo($data['lama']) ?> Hari</td>
                        <td style="vertical-align: middle;">
                          <?php 
                              if($data['jml_pnjm']==0){
                                echo "Sudah Dikembalikan";
                              }?>
                              <?php 
                              if($data['jml_pnjm'] > 0){ ?>
                                <form action="" method="POST">
                                <div class="text-center">
                                <input type="number" class="form-control" name="jml_tmbh" id="inputName"> 
                                <input type="hidden" name="lama" value="<?=$data['lama']?>">
                                <input type="hidden" class="form-control" name="id_pengajuan" id="inputName" value="<?=$data['id_pengajuan'];?>">
                                <input type="hidden" class="form-control" name="tgl_kbl" id="inputName" value="<?=$data['tgl_kbl'];?>">
                                <button type="submit" name="tombole" class="btn btn-secondary btn-success" data-placement="right" title="Setujui">
                                <a id="log"><i class="mdi mdi-check"></i></a>
                                </button>
                              </div>
                            </form>
                              <?php }?>
                          </td>

                        <td id="ikonbtn2" style="vertical-align: middle;">
                        <?php 
                        if($data['jml_pnjm'] > 0){?>
                          <a title="Edit Data?" name="id_peminjaman" href="peminjaman_ed.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                        <?php }else if($data['jml_pnjm']==0){?>
                          <a href="peminjaman_hp.php?id_peminjaman=<?=$data['id_peminjaman']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i><input type="hidden" name="status_pjm" value="<?= $data['status_pjm'] ?>"></a>
                        <?php }?>
                        <?php 
                        if($data['jml_pnjm'] > 0){?>
                          <a href="peminjaman_hp.php?id_peminjaman=<?=$data['id_peminjaman']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i><input type="hidden" name="status_pjm" value="<?= $data['status_pjm'] ?>"></a>
                        <?php } ?>
                          <!-- <a href="peminjaman_hp.php?id_peminjaman=<?=$data['id_peminjaman']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i><input type="hidden" name="status_pjm" value="<?= $data['status_pjm'] ?>"></a> -->
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
if (isset($_POST['tombole'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $jml_tmbh = $_POST['jml_tmbh'];
    $lama = $_POST['lama'];
    $new = $lama + $jml_tmbh;
    $tgl_kbl = $_POST['tgl_kbl'];
    $tgl1    = $_POST['tgl_kbl']; // menentukan tanggal awal
    $tgl2    = date('Y-m-d', strtotime('+' .$jml_tmbh. 'days', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari

    $update = mysqli_query($koneksi, "UPDATE `pengajuan` SET `tgl_kbl` = '$tgl2',`jml_tmbh` = '$jml_tmbh',`lama` = '$new' WHERE `pengajuan`.`id_pengajuan` = '$id_pengajuan';");

if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'peminjaman.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'peminjaman.php';</script><?php
        }
    
  }
?>