<?php require_once("head.php"); require_once("koneksi.php"); ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Input Data Pegawai</h4>
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
            <div class="col-md-6">
              <div class="card">
                <form class="form-horizontal" method="post">
                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-4 text-end control-label col-form-label"
                        >NIP</label
                      >
                      <div class="col-sm-8">
                        <input name="nip" 
                          type="text"
                          class="form-control"
                          id="fname"
                          placeholder="NIP"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-4 text-end control-label col-form-label"
                        >Nama Lengkap</label
                      >
                      <div class="col-sm-8">
                        <input name="nama_lengkap" 
                          type="text"
                          class="form-control"
                          id="lname"
                          placeholder="Nama Lengkap"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-4 text-end control-label col-form-label"
                        >Golongan</label
                      >
                      <div class="col-sm-8">
                        <input name="gol" 
                          type="text"
                          class="form-control"
                          id="lname"
                          placeholder="Golongan"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email1"
                        class="col-sm-4 text-end control-label col-form-label"
                        >Jabatan</label
                      >
                      <div class="col-sm-8">
                        <input name="jabatan" 
                          type="text"
                          class="form-control"
                          id="email1"
                          placeholder="Jabatan"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email1"
                        class="col-sm-4 text-end control-label col-form-label"
                        >No Telepon</label
                      >
                      <div class="col-sm-8">
                        <input name="tlp" 
                          type="text"
                          class="form-control"
                          id="email1"
                          placeholder="No Telepon"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email1"
                        class="col-sm-4 text-end control-label col-form-label"
                        >Username</label
                      >
                      <div class="col-sm-8">
                        <input name="username" 
                          type="text"
                          class="form-control"
                          id="email1"
                          placeholder="Username"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email1"
                        class="col-sm-4 text-end control-label col-form-label"
                        >Password</label
                      >
                      <div class="col-sm-8">
                        <input name="password" 
                          type="text"
                          class="form-control"
                          id="email1"
                          placeholder="Password"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i><i class="fas fa-fast-backward"></i></a></button>
                      <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-window-restore"></i></button>
                      <button type="submit" name="input" class="btn btn-primary float-sm-right" title="Simpan"><i class="fas fa-save"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

  <?php require_once("foot.php"); ?>

<?php 
if (isset($_POST['input'])) {

    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $gol = $_REQUEST['gol'];
    $jabatan = $_REQUEST['jabatan'];
    $tlp = $_REQUEST['tlp'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];


    $tambah = mysqli_query($koneksi,"INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `gol`, `jabatan`,`tlp`,`username`,`password`) VALUES (NULL, '$nip', '$nama_lengkap', '$gol', '$jabatan','$tlp','$username','$password');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pegawai_in.php';</script><?php
        }
      }

    
 ?> 