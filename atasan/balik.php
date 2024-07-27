<?php require_once("head.php");require_once("../koneksi.php");require_once("../fungsi_indotgl.php"); ?>
   <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Data Pengembalian Sarpras</h4>
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
                        <!-- <a href="balik_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
                            <div class="table-responsive">
                              <table
                                id="zero_config"
                                class="table table-striped table-bordered"
                              >
                            <thead>
                        <tr>
                          <th>NO</th>
                          <th>Detail</th>
                          <th>Yang Mengembalikan</th>
                          <th>Tanggal Pengembalian</th>
                          <th>Status Peminjaman</th>
                          <!-- <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr >
                          <?php 
                          $no = 1;
                          $sql = mysqli_query($koneksi,"SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai");
                          while ($data = mysqli_fetch_array($sql)) {
                          ?>
                          <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                          <td style="vertical-align: middle;"><a title="Detail Data" href="detail_pengajuan.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-account-card-details"></i><input type="hidden" value="<?=$data['id_pengajuan'];?>"></a></td>
                          <td style="vertical-align: middle;"><?php echo $data['nama_lengkap'] ?></td>
                          <td style="vertical-align: middle;"><?php echo tgl_indo($data['tgl_balik']) ?></td>
                          <td style="vertical-align: middle;"><?php echo $data['status_kbl'] ?></td>

                          <!-- <td id="ikonbtn2" style="vertical-align: middle;">
                             <a title="Edit Data?" name="id_pengembalian" href="balik_ed.php?id_pengembalian=<?php echo $data['id_pengembalian']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                              <a href="balik_hp.php?id_pengembalian=<?php echo $data['id_pengembalian']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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