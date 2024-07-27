<?php require_once("head.php"); require_once("../fungsi_indotgl.php"); require_once("../fungsi_rupiah.php"); ?>
<!-- Content Wrapper. Contains page content -->
  <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
         <div class="page-wrapper">
          <div class="page-breadcrumb">
            <div class="row">
              <div class="col-12 d-flex no-block align-items-center">
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
      <?php 
      $bebek = mysqli_query($koneksi, "SELECT * FROM user WHERE NOT level = 'admin' AND NOT level = 'karyawan' GROUP BY level");
      $pengajuan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengajuan"));
      ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
      <div class="row">
        <div class="col-md-6 col-lg-2 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-danger text-center">
              <h1 class="font-light text-white">
                <i class="mdi mdi-human-greeting"></i>
              </h1>
              <h4 class="text-white">Jumlah Semua Data : <?= $pengajuan ?></h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <?php $qrytahun = mysqli_query($koneksi, "SELECT * FROM pengajuan GROUP BY YEAR(tgl_pd) ASC"); ?>
                  <form action="../dt/data_pengajuan.php" method="post" target="_blank"> 
                    <table>
                      <label class="form-label" >Berdasarkan Bulan</label>
                        <div class="" style="margin-bottom: 10px;">
                          <select style="color: black;" name="bulan-cetak" class="form-control">
                            <option readonly="">-PILIH BULAN-</option>
                            <option value="-01-">Januari</option>
                            <option value="-02-">Februari</option>
                            <option value="-03-">Maret</option>
                            <option value="-04-">April</option>
                            <option value="-05-">Mei</option>
                            <option value="-06-">Juni</option>
                            <option value="-07-">Juli</option>
                            <option value="-08-">Agustus</option>
                            <option value="-09-">September</option>
                            <option value="-10-">Oktober</option>
                            <option value="-11-">November</option>
                            <option value="-12-">Desember</option>
                          </select>
                        </div>
                        <label class="form-label">Berdasarkan Tahun</label>
                          <div class="" style="margin-bottom: 10px;">
                            <select style="color: black;" name="tahun-cetak" class="form-control">
                              <option readonly="">-PILIH TAHUN-</option>
                              <?php if(mysqli_num_rows($qrytahun)) { ?>
                              <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                              <option><?php $formatwaktu = $row["tgl_pd"];echo date('Y',strtotime($formatwaktu)); ?></option>
                              <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                      <div class="" style="margin-bottom: 10px;">
                      <button type="submit" title="Cetak Data" name="cetak" class="btn btn-primary"><i class="mdi mdi-check font-22"></i></button>
                      <a title="Cetak Semua Data" href="../dt/data_pengajuan.php?id_pd=<?php echo $row['id_pd']; ?>" class="btn btn-dark" target="_blank"><i class="mdi mdi-check-all font-22"></i></a>
                    </div>
                  </form>
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