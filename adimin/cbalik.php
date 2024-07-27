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
      $paud = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai"));
      ?>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
      <div class="row">
        <div class="col-md-6 col-lg-2 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-cyan text-center">
              <h1 class="font-light text-white">
                <i class="mdi mdi-backup-restore"></i>
              </h1>
              <h4 class="text-white">Jumlah Semua Data : <?= $paud ?></h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
              <div class="card-body">
                <form action="../dt/data_balik.php" method="post" target="_blank">
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
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <?php $qrytahun = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai GROUP BY YEAR(tgl_balik) ASC"); ?>
                  <form action="../dt/data_balik.php" method="post" target="_blank"> 
                    <table>
                      <label class="form-label" >Berdasarkan Bulan</label>
                        <div class="" style="margin-bottom: 10px;">
                          <select name="bulan-cetak" class="form-control select2">
                            <?php
                              $ahay = mysqli_query($koneksi, "SELECT DISTINCT MONTH(tgl_balik) as bulan FROM pengembalian ORDER BY bulan ASC");
                              while($baris = mysqli_fetch_array($ahay)) {
                              $bulan = $baris['bulan']; 
                                if($bulan == 1){ $namabulan = "Januari";
                                  }else if($bulan == 2){ $namabulan = "Februari";
                                  }else if($bulan == 3){ $namabulan = "Maret";
                                  }else if($bulan == 4){ $namabulan = "April";
                                  }else if($bulan == 5){ $namabulan = "Mei";
                                  }else if($bulan == 6){ $namabulan = "Juni";
                                  }else if($bulan == 7){ $namabulan = "Juli";
                                  }else if($bulan == 8){ $namabulan = "Agustus";
                                  }else if($bulan == 9){ $namabulan = "September";
                                  }else if($bulan == 10){ $namabulan = "Oktober";
                                  }else if($bulan == 11){ $namabulan = "November";
                                  }else if($bulan == 12){ $namabulan = "Desember";
                                  } ?><option value="<?= $baris['bulan'] ?>"><?= $namabulan; ?></option> 
                                }
                              <?php } ?>
                          </select>
                        </div>
                        <label class="form-label">Berdasarkan Tahun</label>
                          <div class="" style="margin-bottom: 10px;">
                            <select style="color: black;" name="tahun-cetak" class="form-control select2" required="">
                              <?php if(mysqli_num_rows($qrytahun)) { ?>
                              <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                              <option><?php $formatwaktu = $row["tgl_balik"];echo date('Y',strtotime($formatwaktu)); ?></option>
                              <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        <label class="form-label">Pilih TTD</label>
                          <div class="" style="margin-bottom: 10px;">
                            <select style="color: black;" name="ttd" class="form-control select2" required="">
                              <?php $asw = mysqli_query($koneksi, "SELECT * FROM pegawai GROUP BY nama_lengkap ASC"); ?>
                              <?php while ($rowe = mysqli_fetch_array($asw)) { ?>
                              <option value="<?= $rowe["id_pegawai"]; ?>"><?php echo $rowe["nama_lengkap"]; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                      <div class="" style="margin-bottom: 10px;">
                      <button type="submit" title="Cetak Data" name="cetak" class="btn btn-primary"><i class="mdi mdi-check font-22"></i></button>
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