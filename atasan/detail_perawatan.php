<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php");require_once("../fungsi_rupiah.php"); ?>
<?php 
  $id_perawatan  = $_GET['id_perawatan'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM perawatan INNER JOIN sarpras ON perawatan.id_sarpras=sarpras.id_sarpras WHERE id_perawatan = '$id_perawatan'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Data Perawatan Sarpras</h4>
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
          <div class="col-md-8">
            <div class="card">
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sarpras</label>
                      <input type="text" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="id_pegawai">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Tanggal Melakukan Perawatan</label>
                          <input type="text" readonly="" class="form-control" value="<?=tgl_indo($row['tgl_prw'])?>" name="id_pegawai">
                        </div>
                      </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Tanggal  Selesai Perawatan</label>
                          <input type="text" readonly="" class="form-control" value="<?=tgl_indo($row['tgl_sl'])?>" name="id_pegawai">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Perawatan</label>
                        <input type="text" readonly="" name="tgl_mnjm" class="form-control" value="<?=$row['jml_prw'];?>">
                      </div>
                    </div>
                   <div class="col-6">
                      <div class="form-group">
                        <label>Keterangan Perawatan</label>
                        <input type="text" readonly="" class="form-control" name="tgl_kbl" value="<?=$row['ket_prw'];?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Biaya Perawatan</label>
                        <input type="text" readonly="" class="form-control" name="keperluan" value="<?=rupiah($row['biaya_prw'])?>" placeholder="Keperluan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Status Perawatan Sarpras</label>
                        <input type="text" readonly="" class="form-control" name="keperluan" value="<?=$row['status_prw']?>" placeholder="Keperluan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Sarana/Prasarana</label>
                        <div class="input-group">
                          <a target="_blank" href="../fileweb/<?php echo  $row['foto']; ?>"><img src="<?php echo '../fileweb/'.$row['foto'] ?>" width="185"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <input type="hidden" name="id_pengajuan" value="<?=$row['id_pengajuan']?>">

                <!-- /.card-body -->
              <?php } ?>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php require_once("foot.php"); ?>
<?php $now = date('Y-m-d'); ?>
