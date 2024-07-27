<?php
$koneksi = mysqli_connect("localhost","root","","pkl_samsat") or die ("koneksi gagal"); // Load file koneksi.php

$tipe = $_POST['tipe']; // Ambil data NIS yang dikirim lewat AJAX

$query = mysqli_query($koneksi, "SELECT * FROM ranmor WHERE tipe= '".$tipe."' "); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query

if($row > 0){ // Jika data lebih dari 0
	$data = mysqli_fetch_array($query); // ambil data siswa tersebut
	
	// BUat sebuah array
	$callback = array(
		'status' => 'success', // Set array status dengan success
		'merk' => $data['merk'], // Set array nama dengan isi kolom nama pada tabel siswa
		'jenis_model' => $data['jenis_model'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
		'tahun_p' => $data['tahun_p'], // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
	);
}else{
	$callback = array('status' => 'failed'); // set array status dengan failed
}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>