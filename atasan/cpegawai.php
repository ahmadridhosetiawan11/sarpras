<?php require_once("head.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cetak Data Pemilik</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Cetak Data Pemilik</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <a href="../dt/data_pemilik.php" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-print fa-3x"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Detail Data</th>
                    <th>Tipe</th>
                    <th>Merk</th>
                    <th>Pemilik</th>
                    <th>Nomor Plat</th>
                    <th>Alamat</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr >
                    <?php 
	                $koneksi = mysqli_connect("localhost","root","","pkl_samsat");
	                $no = 1;
	                $sql = mysqli_query($koneksi,"SELECT * FROM pemilik LEFT JOIN ranmor ON pemilik.tipe=ranmor.tipe");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <td><?php echo $no++ ?></td>

                    <td><a title="Detail Data" href="pemilik_dl.php?id_pemilik=<?php echo $data['id_pemilik']; ?>" class="btn btn-info btn-circle"><i class="fab fa-sistrix"></i><input type="hidden" value="<?=$data['id_pemilik'];?>"></a></td>

                    <td><?php echo $data['tipe'] ?></td>
                    <td><?php echo $data['merk'] ?></td>
                    <td><?php echo $data['nama_p'] ?></td>
                    <td><?php echo $data['no_plat'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                  </tr>
                  <?php } ?>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once("foot.php"); ?>