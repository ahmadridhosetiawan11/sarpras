<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php 
  $id_peminjaman  = $_GET['id_peminjaman'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE id_peminjaman = '$id_peminjaman'");
  
  $row = mysqli_fetch_array($tb_dt);{
?>
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Data Surat Peminjaman</h4>
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
                    <label for="exampleInputEmail1">Nama</label>
                      <input type="text" readonly="" class="form-control" value="<?=$row['nama_lengkap']?>" name="id_pegawai">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Sarpras yang Diajukan</label>
                          <input type="text" readonly="" class="form-control" value="<?=$row['nama_s']?>" name="id_pegawai">
                        </div>
                      </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Pinjam</label>
                        <input type="number" readonly="" name="jml_pnjm" value="<?=$row['jml_pnjm']?>" class="form-control" placeholder="Jumlah Pinjam">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pinjam</label>
                        <input type="text" readonly="" name="tgl_mnjm" class="form-control" value="<?=tgl_indo($row['tgl_mnjm']);?>">
                      </div>
                    </div>
                   <div class="col-6">
                      <div class="form-group">
                        <label>Tangggal Kembali</label>
                        <input type="text" readonly="" class="form-control" name="tgl_kbl" value="<?=tgl_indo($row['tgl_kbl']);?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Keperluan</label>
                        <input type="text" readonly="" class="form-control" name="keperluan" value="<?=$row['keperluan']?>" placeholder="Keperluan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Status & Keterangan Surat</label>
                        <input type="text" readonly="" class="form-control" name="keperluan" value="<?php 
                          if($row['status_p']== 0){
                            echo "Proses /";
                          }else if($row['status_p']== 1){
                            echo "Disetujui /";
                          }else if($row['status_p']== 2){
                            echo "Ditolak /";
                          }
                          
                          ?> <?=$row['ket']?>" placeholder="Keterangan Surat">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File/Foto Surat Pengajuan</label>
                        <div class="input-group">
                          <a target="_blank" href="../fileweb/<?php echo  $row['file_pnjm']; ?>"><?= $row['file_pnjm'];?></a>
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
