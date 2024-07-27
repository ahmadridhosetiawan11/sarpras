<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_rupiah.php"); ?>
<?php
      $data_m = mysqli_query($koneksi,"SELECT * FROM pajak ");
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Harga Pajak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Harga Pajak</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
  while($row = mysqli_fetch_array($data_m)){ 
?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Harga Pajak Berdasarkan CC (<i>Cylinder Capacity</i>) = <?=$row['cc'];?></b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
      <div class="col-3">
        <h6>Harga Berdasarkan Tahun</h6>
        <h6>Total Harga Pajak Per 1 Tahun</h6>
      </div>
      <div class="col-0">
        <h6>:</h6>
        <h6>:</h6>
      </div>
      <div class="col-8">
        <h6><?=$row['tahun'];?></h6>
        <h6><?=rupiah($row['harga']);?></h6>
      </div>
    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            
        </div>

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    <?php } ?>
    <button type="button" class="btn btn-secondary"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i></a></button>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once("foot.php"); ?>