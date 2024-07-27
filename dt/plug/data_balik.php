<?php 
  // memanggil library FPDF
  require('fpdf.php'); require_once("../fungsi_indotgl.php");require_once("../koneksi.php");
   ?>

<?php 
  if (isset($_POST['cetak'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $ttd = $_REQUEST['ttd'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai WHERE pengembalian.tgl_balik LIKE '%$bulan%' AND pengembalian.tgl_balik LIKE '%$tahun%'");
          $result1 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE pegawai.id_pegawai = '$ttd'"); 
      }else if (isset($_POST['cetak2'])) {
        $ttd = $_REQUEST['ttd'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai");

        $result1 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE pegawai.id_pegawai = '$ttd'"); 
      }else{
        $result = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.id_peminjaman=peminjaman.id_peminjaman INNER JOIN pegawai ON pengembalian.id_pegawai=pegawai.id_pegawai");
      }
      if(mysqli_num_rows($result)==0) {
        echo '<script>alert("Data Tidak Ada !"); window.location.href="../adimin/cbalikphp";</script>';
        
      }
  $nomor = 1;


  // intance object dan memberikan pengaturan halaman PDF
  $pdf = new FPDF('l','mm','A4');
  // membuat halaman baru
  $pdf->addPage();
  // setting jenis font yang akan digunakan
  $pdf->SetFont('Times','B',16);
  $pdf->Image('../dist/img/kalsel.png',8,7,20);
  $pdf->Cell(0,4,'PEMERINTAH KALIMANTAN SELATAN',0,1,'C');
  $pdf->SetFont('Times','B',14);
  $pdf->Cell(0,6,'UPPD SAMSAT RANTAU',0,1,'C');
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(0,4,'Alamat Kantor : JL.Brigjend H.Hasan Basry KM.3 Bitahan Rantau,',0,1,'C');
  $pdf->Cell(0,4,'Kabupaten Tapin, Kalimantan Selatan Tlp.(0511)4772551 Fax. (0511)4774274  71114',0,1,'C');
  $pdf->Cell(0,4,'Website : www.samsatrantau.kalselprov.go.id Email : samsatrantau@kalselprov.go.id',0,1,'C');
  $pdf->SetLineWidth(0);
  $pdf->Line(0,36, 300, 36);
  $pdf->Cell(10,21,'',0,1);

  $pdf->SetFont('Times','B',14);
  $pdf->Cell(0,4,'DAFTAR DATA PENGEMBALIAN PEMINJAMAN SARPRAS',0,1,'C');
  $pdf->Cell(0,11,'Dinas Unit Pelayanan Pajak Daerah Prov-Kalsel',0,1,'C');
  // gasan kolomnya
  $pdf->SetFont('Times','B',10,'C');
  $pdf->Cell(10,10,'No',1,0,'C');
  $pdf->Cell(68,10,'Yang Mengembalikan',1,0,'C');
  $pdf->Cell(43,10,'Sarpras yang Dipinjam',1,0,'C');
  $pdf->Cell(50,10,'Jumlah Mengembalikan',1,0,'C');
  $pdf->Cell(52,10,'Tgl Meminjam & Kembali',1,0,'C');
  $pdf->Cell(55,10,'Status',1,0,'C');
  $pdf->Cell(0,10,'',0,1);
  ?>
  <?php
  while($lihat = mysqli_fetch_array($result)){ 
  ?>

  <?php
    $pdf->Cell(10,10,$nomor,1,0,'C');
    $pdf->Cell(68,10,$lihat['nama_lengkap'],1,0,'C');
    $pdf->Cell(43,10,$lihat['nama_s'],1,0,'C');
    $pdf->Cell(50,10,$lihat['jml_blk'],1,0,'C');
    $pdf->Cell(52,10,tgl_indo($lihat['tgl_balik']),1,0,'C');
    $pdf->Cell(55,10,$lihat['status_kbl'],1,0,'C');
    $pdf->Cell(5,10,'',0,1);
    $nomor++;
  }
  ?>

  <?php $asw = mysqli_fetch_array($result1);
  $pdf->Cell(10,11,'',0,1);
  $pdf->SetFont('Times','B',14);
  $pdf->Cell(433,6,$asw['jabatan'],0,1,'C');
  $pdf->Cell(433,6,$asw['nama_lengkap'],0,1,'C');
  $pdf->Cell(10,22,'',0,1);
  $pdf->Cell(433,4,'NIP : '.$asw['nip'].' ',0,1,'C');
  $pdf->Output("Data Pengembalian.pdf","I"); 
?>