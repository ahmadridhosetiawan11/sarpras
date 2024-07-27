<?php 
  session_start();
  require "koneksi.php";
  error_reporting(0);
  $username  = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $admin = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));
  $cek = mysqli_fetch_array($admin);
  $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));
  $cek2  = mysqli_fetch_array($pegawai);
  if(isset($_POST['login'])){
    if($cek['level'] == 'admin'){
      $_SESSION['id_user'] =$cek['id_user'];
      $_SESSION['level']   =$cek['level'];
      ?> <script>window.location='adimin/index.php'</script> <?php
    }else if($cek['level'] == 'user'){
      $_SESSION['id_user'] =$cek['id_user'];
      $_SESSION['level']   =$cek['level'];
      $_SESSION['nama']    =$cek['nama'];
      ?> <script>window.location='user/index.php'</script> <?php
    }else if($cek['level'] == 'atasan'){
      $_SESSION['id_user'] =$cek['id_user'];
      $_SESSION['level']   =$cek['level'];
      ?> <script>window.location='atasan/index.php'</script> <?php
    }else if(mysqli_num_rows($pegawai) > 0 AND $cek2['jabatan'] != 'Atasan'){
      $_SESSION['id_pegawai'] = $cek2['id_pegawai'];
      $_SESSION['nama']       =$cek2['nama'];
      ?> <script>window.location='pegawai/index.php'</script> <?php
    }else{
      ?><script>alert('Gagal Login');window.location="index.php"; </script><?php
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Website DPMD</title>
        <link rel="icon" type="image/x-icon" href="dist/img/kalsel.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="dist/css/styles.css" rel="stylesheet" />
    </head>
    <style>
        body {
  background-image: linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url("bgbg1.png");
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
}
    </style>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Website Online</span>
                <span class="site-heading-lower">UPPD SAMSAT RANTAU PROVINSI KAL-SEL</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.php">DPMD KALSEL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">About</a></li>
                        <!-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.php">Products</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.php">Store</a></li> -->
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="loginn.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                        <div class="col-xl-9 mx-auto">
                            <div class="cta-inner bg-faded text-center rounded"><br>
                                <h2 class="section-heading mb-5">
                                    <img src="dist/img/kalsel.png" class="mb-3" width="85" alt="">
                                    <span class="section-heading-upper">Silahkan Masukan Username dan Password</span>
                                    <!-- <span class="section-heading-lower">Silahkan Masukan Username dan Password</span> -->
                                </h2>
                                <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                                    <li class="list-unstyled-item list-hours-item d-flex">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required="">
                                    </li>
                                    <li class="list-unstyled-item list-hours-item d-flex">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                    </li>

                                </ul>
                                <p class="address mb-5">
                                    <div class="intro-button mx-auto">
                                        <button type="submit" name="login" class="btn btn-primary btn-xl">Login Now !</button></div>
                                </p>
                                <p class="mb-0">
                                    <small><em>Call Anytime</em></small>
                                    <br />
                                    Tlp.(0511)4772551 Fax. (0511)4774274 71114; Website : www.samsatrantau.kalselprov.go.id;e-mail:samsatrantau@kalselprov.go.id
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="dist/js/scripts.js"></script>
    </body>
</html>
