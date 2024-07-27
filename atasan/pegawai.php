<?php require_once("head.php");
      require_once("koneksi.php"); ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Pegawai</h4>
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
                  <!-- <a href="pegawai_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Nip</th>
                          <th>Nama Lengkap</th>
                          <th>Golongan</th>
                          <th>Jabatan</th>
                         <!--  <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 
                          $no = 1;
                          $sql = mysqli_query($koneksi,"SELECT * FROM pegawai");
                          while ($data = mysqli_fetch_array($sql)) {
                          ?>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $data['nip'] ?></td>
                          <td><?php echo $data['nama_lengkap'] ?></td>
                          <td><?php echo $data['gol'] ?></td>
                          <td><?php echo $data['jabatan'] ?></td>
                         <!--  <td id="ikonbtn2">
                            <a title="Edit Data?" name="id_pegawai" href="pegawai_ed.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                            <a href="pegawai_hp.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-danger btn-sm" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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