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
            <div class="box bg-dark text-center">
              <h1 class="font-light text-white">
                <i class="mdi mdi-bank"></i>
              </h1>
              <h4 class="text-white">Jumlah Semua Data : <?= $pengajuan ?></h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
              <div class="card-body">
                <form action="../dt/data_sapras.php" method="post" target="_blank">
                  <label class="form-label">Cetak Semua Data</label>
                    <div class="" style="margin-bottom: 10px;">
                      <select style="color: black;" name="ttd" class="form-control select2" required="">
                        <?php $asw = mysqli_query($koneksi, "SELECT * FROM pegawai GROUP BY nama_lengkap ASC"); ?>
                        <?php while ($rowe = mysqli_fetch_array($asw)) { ?>
                        <option value="<?= $rowe["id_pegawai"]; ?>"><?php echo $rowe["nama_lengkap"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="" style="margin-bottom: 10px;">
                <button type="submit" title="Cetak Data" name="cetak2" class="btn btn-dark"><i class="mdi mdi-check-all font-22"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
              <div class="card-body">
                <form action="../dt/data_sarpraspnjm.php" method="post" target="_blank">
                  <label class="form-label">Berdasarkan Paling Banyak Di Pinjam</label>
                    <div class="" style="margin-bottom: 10px;">
                      <select style="color: black;" name="ttd" class="form-control select2" required="">
                        <?php $asw = mysqli_query($koneksi, "SELECT * FROM pegawai GROUP BY nama_lengkap ASC"); ?>
                        <?php while ($rowe = mysqli_fetch_array($asw)) { ?>
                        <option value="<?= $rowe["id_pegawai"]; ?>"><?php echo $rowe["nama_lengkap"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="" style="margin-bottom: 10px;">
                <button type="submit" title="Cetak Data" name="cetak4" class="btn btn-dark"><i class="mdi mdi-check-all font-22"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
              <div class="card-body">
                <form action="../dt/data_sarprasbeli.php" method="post" target="_blank">
                  <label class="form-label">Berdasarkan Paling Banyak Dibeli</label>
                    <div class="" style="margin-bottom: 10px;">
                      <select style="color: black;" name="ttd" class="form-control select2" required="">
                        <?php $asw = mysqli_query($koneksi, "SELECT * FROM pegawai GROUP BY nama_lengkap ASC"); ?>
                        <?php while ($rowe = mysqli_fetch_array($asw)) { ?>
                        <option value="<?= $rowe["id_pegawai"]; ?>"><?php echo $rowe["nama_lengkap"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="" style="margin-bottom: 10px;">
                <button type="submit" title="Cetak Data" name="cetak5" class="btn btn-dark"><i class="mdi mdi-check-all font-22"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
              <div class="card-body">
                <form action="../dt/data_sapras.php" method="post" target="_blank">
                  <label class="form-label">Cetak Semua Data</label>
                    <div class="" style="margin-bottom: 10px;">
                      <select style="color: black;" name="kategori" class="form-control select2" required="">
                        <?php $asek = mysqli_query($koneksi, "SELECT * FROM sarpras GROUP BY kategori ASC"); ?>
                        <?php while ($asu = mysqli_fetch_array($asek)) { ?>
                        <option value="<?= $asu["kategori"]; ?>"><?php echo $asu["kategori"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <label class="form-label">Pilih TTD</label>
                    <div class="" style="margin-bottom: 10px;">
                      <select style="color: black;" name="ttd" class="form-control select2">
                        <?php $asw = mysqli_query($koneksi, "SELECT * FROM pegawai GROUP BY nama_lengkap ASC"); ?>
                        <?php while ($rowe = mysqli_fetch_array($asw)) { ?>
                        <option value="<?= $rowe["id_pegawai"]; ?>"><?php echo $rowe["nama_lengkap"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <div class="" style="margin-bottom: 10px;">
                <button type="submit" title="Cetak Data" name="cetak3" class="btn btn-dark"><i class="mdi mdi-check-all font-22"></i></button>
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