<?php require_once("head.php");require_once("../fungsi_indotgl.php"); require_once("../fungsi_rupiah.php");?>
   <!-- Content Wrapper. Contains page content -->
      <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Denda Peminjaman</h4>
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
                  <!-- <a href="peminjaman_in.php" title="Tambah Data" class="btn btn-success btn-sm mb-3"><i class="mdi mdi-library-plus font-22"></i></a> -->
                      <div class="table-responsive">
                        <table
                          id="zero_config"
                          class="table table-striped table-bordered"
                        >
                      <thead>
                      <tr>
                        <th>NO</th>
                        <th>Detail</th>
                        <th>Nama Peminjam</th>
                        <th>Sarpras yang Dipinjam</th>
                        <th>Tanggal Pembuatan Surat ini</th>
                        <th>Telat Hari</th>
                        <th>Denda</th>
                        <th>Status Peminjaman</th>
                        <!-- <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                      </tr>
                      </thead>
                      <tbody class="text-center">
                      <tr >
                        <?php $now = date('Y-m-d'); ?>
                        <?php 
                        $no = 1;
                        $nip=$user_row['nip'];
                        $sql = mysqli_query($koneksi,"SELECT * FROM peminjaman INNER JOIN pengajuan ON peminjaman.id_pengajuan=pengajuan.id_pengajuan INNER JOIN sarpras ON peminjaman.nama_s=sarpras.nama_s INNER JOIN denda ON sarpras.kategori=denda.kategori INNER JOIN pegawai ON pengajuan.id_pegawai=pegawai.id_pegawai WHERE nip='$nip' AND tgl_kbl < '$now'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <?php $t = date_create($data['tgl_kbl']);
                          $n = date_create(date('Y-m-d'));
                          $terlambat = date_diff($t, $n);
                          $hari = $terlambat->format("%a");

                          // menghitung denda
                          $denda = $hari * $data['denda'];?>

                        <td style="vertical-align: middle;"><?php echo $no++ ?></td>
                         <td style="vertical-align: middle;"><a title="Detail Data" href="detail_peminjaman.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-account-card-details"></i><input type="hidden" value="<?=$data['id_peminjaman'];?>"></a></td>
                        <td style="vertical-align: middle;"><?php echo $data['nama_lengkap'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $data['nama_s'] ?></td>
                        <td style="vertical-align: middle;"><?php echo tgl_indo($data['tgl_pmj']) ?></td>
                        <td><?=$hari ?> Hari</td> 
                        <td><?=rupiah($denda); ?></td>
                        <td style="vertical-align: middle;"><?php 
                              if($data['tgl_kbl'] < $now){
                                echo "<p class='text-danger'><b>Barang Harus Dikembalikan</b></p>";
                              }else if($data['tgl_kbl'] > $now){
                                echo "<p class='text-danger'><b>Sudah Dikembalikan</b></p>";
                              }?></td>

                        <!-- <td id="ikonbtn2" style="vertical-align: middle;">
                          <a title="Mengembalikan Sarana/Prasarana" href="peminjaman_hp.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info btn-circle"><i class="mdi mdi-cloud-print"></i></a>
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