<?php require_once("head.php"); ?>
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle Site Analysis src -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
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
        <!-- End Bread crumb and right sidebar toggle All Rights Reserv.-->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-4 col-xlg-3">
              <a href="pegawai.php">
                <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-user-secret mb-2"></i>
                  </h1>
                  <h6 class="text-white">Data Pegawai</h6>
                </div>
              </div>
              </a>
            </div> -->
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <a href="sarpras.php">
                <div class="card card-hover">
                  <div class="box bg-dark text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-bank"></i>
                    </h1>
                    <h6 class="text-white">Sarpras</h6>
                  </div>
                </div>
              </a>
            </div>
            <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="pengajuan.php">
              <div class="card card-hover">
                <div class="box bg-dark text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-human-greeting"></i>
                  </h1>
                  <h6 class="text-white">Pengajuan Peminjaman</h6>
                </div>
              </div>
            </a>            
          </div>
            <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="peminjaman.php">
              <div class="card card-hover">
                <div class="box bg-dark text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi mdi-book"></i>
                  </h1>
                  <h6 class="text-white">Daftar Peminjaman</h6>
                </div>
              </div>
            </a>
          </div>
            <!-- Column -->
            <!-- Column -->
          <!-- <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="denda.php">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-treasure-chest"></i>
                  </h1>
                  <h6 class="text-white">Denda Peminjaman</h6>
                </div>
              </div>
            </a>
          </div> -->
            <!-- Column -->
          <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="posbindu.php">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-backup-restore"></i>
                  </h1>
                  <h6 class="text-white">Pengembalian Sarpras</h6>
                </div>
              </div>
            </a>
          </div> -->
            <!-- Column -->
         <!--  <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="paud.php">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-chair-school"></i>
                  </h1>
                  <h6 class="text-white">Paud</h6>
                </div>
              </div>
            </a>
          </div> -->
            <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="balik.php">
              <div class="card card-hover">
                <div class="box bg-dark text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-backup-restore"></i>
                  </h1>
                  <h6 class="text-white">Pengembalian Sarpras</h6>
                </div>
              </div>
            </a>
          </div>
            <!-- Column -->
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Bar Diagram</h4>
                      <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="col-6">
                      <figure class="highcharts-figure">
                          <div id="container"></div>
                          <p class="highcharts-description">
                              Bar chart
                          </p>
                      </figure>
                    </div>
                    <?php $now = date('Y-m-d'); ?>
                    <?php 
                    $nip=$user_row['nip'];
                    $sarpras = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM sarpras"));
                    $pengajuan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengajuan"));
                    $peminjaman = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman"));
                    $denda = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN denda ON sarpras.kategori=denda.kategori INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE nip='$nip' AND tgl_kbl < '$now'"));
                    $balik = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengembalian"));
                    ?>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-bank"></i>
                            <h5 class="mb-0 mt-1"><?= $sarpras ?></h5>
                            <small class="font-light">Total sarpras</small>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-human-greeting"></i>
                            <h5 class="mb-0 mt-1"><?= $pengajuan ?></h5>
                            <small class="font-light">Pengajuan</small>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-book"></i>
                            <h5 class="mb-0 mt-1"><?= $peminjaman ?></h5>
                            <small class="font-light">Peminjaman</small>
                          </div>
                        </div>
                        <!-- <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-treasure-chest"></i>
                            <h5 class="mb-0 mt-1"><?= $denda ?></h5>
                            <small class="font-light">Denda Peminjaman</small>
                          </div>
                        </div> -->
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-backup-restore"></i>
                            <h5 class="mb-0 mt-1"><?= $balik ?></h5>
                            <small class="font-light">Pengembalian</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
      <?php require_once("foot.php"); ?>
      <?php $now = date('Y-m-d'); ?>
       <?php 
       $nip=$user_row['nip'];
                  $sarpras = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM sarpras"));
                  $pengajuan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengajuan"));
                  $peminjaman = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman"));
                  $denda = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN denda ON sarpras.kategori=denda.kategori INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE nip='$nip' AND tgl_kbl < '$now'"));
                  $balik = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengembalian"));
                  ?>
      <script src="../dist/js/highcharts.js"></script>
      <script src="../dist/js/exporting.js"></script>
      <script src="../dist/js/export-data.js"></script>
      <script src="../dist/js/accessibility.js"></script>

<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Grafik Seluruh Data'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['sarpras', 
          'Pengajuan',
          'Peminjaman',
          'Denda Peminjaman',
          'Pengembalian',],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Data',
        data: [<?= $sarpras ?>,<?= $pengajuan ?>,<?= $peminjaman ?>,<?= $denda ?>,<?= $balik ?>],
        backgroundColor : ['#343a40', '#dc3545','#342321','#6f42c1','#20c997'],
    }]
});
</script>