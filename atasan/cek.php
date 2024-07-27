<?php require_once("head.php");require_once("../koneksi.php");require_once("../fungsi_indotgl.php"); ?>
    <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
             <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Data Pengecekan Sarpras</h4>
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
                       <!--  <a href="cek_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
                            <div class="table-responsive">
                              <table
                                id="zero_config"
                                class="table table-striped table-bordered"
                              >
                            <thead>
                        <tr>
                          <th>NO</th>
                          <th>Nama Sapras</th>
                          <th>Pegawai yang Melakukan Pengecekan</th>
                          <th>Tanggal Pengecekan</th>
                          <th>Status Pengecekan</th><!-- 
                          <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr >
                          <?php 
                          $no = 1;
                          $sql = mysqli_query($koneksi,"SELECT * FROM pengecekan INNER JOIN sarpras ON pengecekan.id_sarpras=sarpras.id_sarpras INNER JOIN pegawai ON pengecekan.id_pegawai=pegawai.id_pegawai");
                          while ($data = mysqli_fetch_array($sql)) {
                          ?>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $data['nama_s'] ?></td>
                          <td><?php echo $data['nama_lengkap'] ?></td>
                          <td><?php echo tgl_indo($data['tgl_cek']) ?></td>
                          <td><?php echo $data['status_cek'] ?></td>
                          <!-- <td id="ikonbtn2">
                            <a title="Edit Data?" name="id_pengecekan" href="cek_ed.php?id_pengecekan=<?php echo $data['id_pengecekan']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-exclamation-triangle"></i></a>
                            <a href="cek_hp.php?id_pengecekan=<?php echo $data['id_pengecekan']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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