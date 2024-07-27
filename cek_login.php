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
      ?><script>alert('Gagal Login');window.location="index.html"; </script><?php
    }
  }
?>