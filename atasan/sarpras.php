<?php require_once("head.php"); require_once("fungsi_indotgl.php"); require_once("fungsi_rupiah.php"); ?>
  <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Sarpras</h4>
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
                  <!-- <a href="sarpras_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Sarpras</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <!-- <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr >
                    <?php $now = date('2020-01-01'); ?>
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM sarpras");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_s'] ?></td>
                    <td><?php echo $data['kategori'] ?></td>
                    <td><?php echo $data['jml'] ?></td>
                    <td style="vertical-align: middle;" style="vertical-align: middle;" class="text-center"><a target="_blank" href="../fileweb/<?php echo  $data['foto']; ?>"><img src="<?php echo '../fileweb/'.$data['foto'] ?>" width="85px;"></a>
                    </td>
                   <!--  <td><?php 
                        if($data['jml']==0){?>
                          <p style="vertical-align: middle;" class="text-center text-warning"><b>Tidak Tersedia Tidak Tersedia</b></p><?php
                        }else if($data['jml']){
                          echo '<p style="vertical-align: middle;" class="text-center text-success"><b>Tersedia</b></p>';
                        } ?>
                    </td> -->
                    <td id="ikonbtn2">
                      <a title="Edit Data?" name="id_d" href="sarpras_ed.php?id_d=<?php echo $data['id_d']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                      <a href="sarpras_hp.php?id_d=<?php echo $data['id_d']; ?>" class="btn btn-danger btn-sm" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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