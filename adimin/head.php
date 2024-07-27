<?php require_once ('koneksi.php');
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not error 500
if (!isset($_SESSION['id_user']) || (trim($_SESSION['id_user']) == '')) { ?>
<script>
window.location = "../";
</script>
<?php 
}
$session_id=$_SESSION['id_user'];

$user_query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$session_id'")or die(mysqli_error($koneksi));
$user_row = mysqli_fetch_array($user_query);

$_SESSION['message'] = "Hallo";
$_SESSION['msg_type'] = "berhasil";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Website Maintenence Sarana dan Prasarana</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../img/kalsel.png"
    />
    <link
      href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/quill/dist/quill.snow.css"
    />

    <!-- Custom CSS -->
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>ll
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select2').select2();
});</script>
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.php">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="../img/logonya.png"
                  alt="homepage"
                  class="light-logo"
                  width="25"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <h4>POLPP PROV KALSEL</h4>
              </span>
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- create new -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="d-none d-md-block"
                    >Create Master Data<Data></Data>                                                    <i class="fa fa-angle-down"></i
                  ></span>
                  <span class="d-block d-md-none"
                    ><i class="fa fa-plus"></i
                  ></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="pegawai_in.php">Pegawai</a></li>
                  <li><a class="dropdown-item" href="sarpras_in.php">Sarpras</a></li>
                </ul>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a 
                  title="Log Out" 
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                ><i class="mdi mdi-power-settings font-22"></i>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php" onClick="javascript: return confirm('Anda Yakin Ingin Logout ?');"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                  >
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="index.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <!-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="sidang.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">sidang</span></a
                >
              </li> -->
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Master Data </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="pegawai.php" class="sidebar-link"
                      ><i class="fas fa-user-secret"></i
                      ><span class="hide-menu"> Data Pegawai </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="sarpras.php" class="sidebar-link"
                      ><i class="mdi mdi-bank"></i
                      ><span class="hide-menu"> Data Sarpras </span></a
                    >
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-pencil"></i
                  ><span class="hide-menu">Input Data</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="pengajuan.php" class="sidebar-link"
                      ><i class="mdi mdi-human-greeting"></i
                      ><span class="hide-menu"> Pengajuan Peminjaman</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="peminjaman.php" class="sidebar-link"
                      ><i class="mdi mdi-account-card-details"></i
                      ><span class="hide-menu"> Peminjaman Sarpras</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="balik.php" class="sidebar-link"
                      ><i class="mdi mdi-backup-restore"></i
                      ><span class="hide-menu"> Pengembalian Sarpras </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="perawatan.php" class="sidebar-link"
                      ><i class="mdi mdi-alert-octagram"></i
                      ><span class="hide-menu"> Perawatan Sarpras</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="perbaikan.php" class="sidebar-link"
                      ><i class="mdi mdi-auto-fix"></i
                      ><span class="hide-menu"> Perbaikan Sarpras </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cek.php" class="sidebar-link"
                      ><i class="mdi mdi-playlist-check"></i
                      ><span class="hide-menu"> Pengecekan Sarpras </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="jual.php" class="sidebar-link"
                      ><i class="mdi mdi-book-open-variant"></i
                      ><span class="hide-menu"> Daftar Barang Jual </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="beli.php" class="sidebar-link"
                      ><i class="mdi mdi-baby-buggy"></i
                      ><span class="hide-menu"> Pembelian </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="rusak.php" class="sidebar-link"
                      ><i class="mdi mdi-basket-fill"></i
                      ><span class="hide-menu"> Barang Rusak </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="aset.php" class="sidebar-link"
                      ><i class="fas fa-building"></i
                      ><span class="hide-menu"> Aset Tidak Layak/Layak </span></a
                    >
                  </li>
                </ul>
              </li>
              
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-file-check"></i
                  ><span class="hide-menu">Cetak Laporan </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="csapras.php" class="sidebar-link"
                      ><i class="mdi mdi-bank"></i
                      ><span class="hide-menu"> Sarana Dan Prasarana </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cpengajuan.php" class="sidebar-link"
                      ><i class="mdi mdi-human-greeting"></i
                      ><span class="hide-menu"> Pengajuan Peminjaman </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cpeminjaman.php" class="sidebar-link"
                      ><i class="mdi mdi-account-card-details"></i
                      ><span class="hide-menu"> Peminjaman Sarpras</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cbalik.php" class="sidebar-link"
                      ><i class="mdi mdi-backup-restore"></i
                      ><span class="hide-menu"> Pengembalian Sarpras </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cperawatan.php" class="sidebar-link"
                      ><i class="mdi mdi-alert-octagram"></i
                      ><span class="hide-menu"> Perawatan Sarpras</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cperbaikan.php" class="sidebar-link"
                      ><i class="mdi mdi-auto-fix"></i
                      ><span class="hide-menu"> Perbaikan Sarpras </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="ccek.php" class="sidebar-link"
                      ><i class="mdi mdi-playlist-check"></i
                      ><span class="hide-menu"> Pengecekan Sarpras </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cjual.php" class="sidebar-link"
                      ><i class="mdi mdi-book-open-variant"></i
                      ><span class="hide-menu"> Daftar Barang Jual </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="cbeli.php" class="sidebar-link"
                      ><i class="mdi mdi-baby-buggy"></i
                      ><span class="hide-menu"> Pembelian </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="crusak.php" class="sidebar-link"
                      ><i class="mdi mdi-basket-fill"></i
                      ><span class="hide-menu"> Barang Rusak </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="caset.php" class="sidebar-link"
                      ><i class="fas fa-building"></i
                      ><span class="hide-menu"> Aset Tidak Layak/Layak </span></a
                    >
                  </li><br><br>
                </ul>
              </li>
              
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
