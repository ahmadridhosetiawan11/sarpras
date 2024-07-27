-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 06:23 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balai`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `jml` varchar(12) NOT NULL,
  `tgl_aset` date NOT NULL,
  `jml_aset` varchar(12) NOT NULL,
  `ket_aset` varchar(199) NOT NULL,
  `layak_aset` varchar(55) NOT NULL,
  `status_aset` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id_beli` int(9) NOT NULL,
  `id_j` int(9) NOT NULL,
  `id_pegawai` int(9) NOT NULL,
  `jml_j` varchar(12) NOT NULL,
  `jml_b` varchar(12) NOT NULL,
  `harga_b` varchar(12) NOT NULL,
  `tgl_b` date NOT NULL,
  `bukti` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_beli`, `id_j`, `id_pegawai`, `jml_j`, `jml_b`, `harga_b`, `tgl_b`, `bukti`) VALUES
(23, 13, 3, '', '2', '1000000', '2023-08-05', '2549WhatsApp.Image.2023.07.26.at.13.22.16.jpg'),
(24, 12, 2, '', '1', '5000000', '2023-08-05', '9397WhatsApp.Image.2023.07.26.at.13.22.16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(9) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `denda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `kategori`, `denda`) VALUES
(1, 'Sarana', '2000'),
(2, 'Prasarana', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_j` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `jml` varchar(12) NOT NULL,
  `tgl_j` date NOT NULL,
  `harga_j` varchar(120) NOT NULL,
  `jml_j` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_j`, `id_sarpras`, `jml`, `tgl_j`, `harga_j`, `jml_j`) VALUES
(9, 3, '7', '2023-06-10', '3400000', '1'),
(12, 6, '13', '2023-07-17', '5000000', '2'),
(13, 9, '2', '2023-08-04', '500000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(9) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `nama_lengkap` varchar(180) NOT NULL,
  `gol` varchar(85) NOT NULL,
  `jabatan` varchar(80) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `gol`, `jabatan`, `tlp`, `username`, `password`) VALUES
(2, '1974080620011210001', 'drh. Putut Eko Wibowo', 'C/III', 'Kepala Balai', '025114772249', 'eko', 'eko'),
(3, '167100751212', 'SUNARYO', 'B/IIIc', 'Administrasi dan Perlengkapan', '089724856233', 'sunaryo', 'sunaryo'),
(4, '16320713200604 1 007', 'UMI KULSUM', 'C/III', 'Paramedik Veteriner Pelaksana Pemula', '088164578763', 'kulsum', 'kulsum');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(9) NOT NULL,
  `id_pengajuan` int(9) NOT NULL,
  `nama_s` varchar(55) NOT NULL,
  `jml_pjm` varchar(13) NOT NULL,
  `tgl_pmj` date NOT NULL,
  `file_pnjm` varchar(200) NOT NULL,
  `status_pjm` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_pengajuan`, `nama_s`, `jml_pjm`, `tgl_pmj`, `file_pnjm`, `status_pjm`) VALUES
(11, 9, 'Alat nekropsi', '5', '2023-08-06', '5455WhatsApp.Image.2023.07.26.at.13.22.16.jpg', 'Sedang Dipinjam'),
(12, 10, 'Mikroskop', '1', '2023-08-07', '64047296pengantarsptcontoh.pdf', 'Sedang Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(9) NOT NULL,
  `id_pegawai` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `jml_p` varchar(10) NOT NULL,
  `tgl_mnjm` date NOT NULL,
  `tgl_kbl` date NOT NULL,
  `keperluan` varchar(55) NOT NULL,
  `file` varchar(200) NOT NULL,
  `ket` varchar(77) NOT NULL,
  `lama` int(10) NOT NULL,
  `status_p` int(3) NOT NULL,
  `jml_tmbh` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_pegawai`, `id_sarpras`, `jml_p`, `tgl_mnjm`, `tgl_kbl`, `keperluan`, `file`, `ket`, `lama`, `status_p`, `jml_tmbh`) VALUES
(9, 4, 11, '5', '2023-08-06', '2023-08-09', 'Untuk Praktek', '1351Revisi.ke.3.docx', 'Sudah Sesuai', 3, 4, 0),
(10, 2, 3, '1', '2023-08-07', '2023-08-10', 'Untuk Praktek', '19297296pengantarsptcontoh.pdf', 'Sudah Sesuai', 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan`
--

CREATE TABLE `pengecekan` (
  `id_pengecekan` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `id_pegawai` int(9) NOT NULL,
  `tgl_cek` date NOT NULL,
  `status_cek` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(9) NOT NULL,
  `id_peminjaman` int(9) NOT NULL,
  `id_pegawai` int(9) NOT NULL,
  `jml_blk` varchar(12) NOT NULL,
  `tgl_balik` date NOT NULL,
  `status_kbl` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_pegawai`, `jml_blk`, `tgl_balik`, `status_kbl`) VALUES
(4, 5, 3, '1', '2023-07-17', 'Sudah Dikembalikan'),
(5, 6, 4, '1', '2023-07-28', 'Sudah Dikembalikan'),
(6, 7, 4, '1', '2023-08-05', 'Sudah Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `tgl_prw` date NOT NULL,
  `tgl_sl` date NOT NULL,
  `jml_prw` varchar(12) NOT NULL,
  `ket_prw` varchar(100) NOT NULL,
  `biaya_prw` varchar(12) NOT NULL,
  `status_prw` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `id_sarpras`, `tgl_prw`, `tgl_sl`, `jml_prw`, `ket_prw`, `biaya_prw`, `status_prw`) VALUES
(3, 8, '2023-08-06', '2023-08-08', '2', 'tes ulang', '340000', 'Perawatan Telah Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `tgl_pbk` date NOT NULL,
  `tgl_sel` date NOT NULL,
  `jml_pbk` varchar(12) NOT NULL,
  `kondisi_pbk` varchar(85) NOT NULL,
  `ket_pbk` varchar(150) NOT NULL,
  `biaya_pbk` varchar(12) NOT NULL,
  `status_pbk` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_sarpras`, `tgl_pbk`, `tgl_sel`, `jml_pbk`, `kondisi_pbk`, `ket_pbk`, `biaya_pbk`, `status_pbk`) VALUES
(1, 11, '2023-08-12', '2023-08-12', '5', 'Rusak Sedang', 'tes ulang', '458787', 'Perbaikan Telah Selesai'),
(2, 0, '0000-00-00', '0000-00-00', '$jml_pbk', '$kondisi_pbk', '$ket_pbk', '$biaya_pbk', 'Sedang Dalam Perbaikan'),
(5, 4, '2023-08-12', '2023-08-12', '3', 'Rusak Ringan', 'tes ulang', '324243', 'Perbaikan Telah Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `rusak`
--

CREATE TABLE `rusak` (
  `id_rusak` int(9) NOT NULL,
  `id_sarpras` int(9) NOT NULL,
  `jml` varchar(12) NOT NULL,
  `tgl_rusak` date NOT NULL,
  `jml_rk` varchar(12) NOT NULL,
  `ket_rusak` varchar(199) NOT NULL,
  `kategori_rusak` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rusak`
--

INSERT INTO `rusak` (`id_rusak`, `id_sarpras`, `jml`, `tgl_rusak`, `jml_rk`, `ket_rusak`, `kategori_rusak`) VALUES
(14, 11, '15', '2023-08-12', 'udeh', 'tidak bisa dipakai', 'Rusak Ringan'),
(16, 8, '5', '2023-08-12', '1', 'tidak bisa dipakai', 'Rusak Sedang'),
(17, 4, '8', '2023-08-12', 'udeh', 'tidak bisa dipakai', 'Rusak Ringan');

-- --------------------------------------------------------

--
-- Table structure for table `sarpras`
--

CREATE TABLE `sarpras` (
  `id_sarpras` int(9) NOT NULL,
  `nama_s` varchar(55) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `jml` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `total_pnjm` int(10) NOT NULL,
  `total_beli` int(10) NOT NULL,
  `jml_rusak` int(10) NOT NULL,
  `jml_pnjm` int(10) NOT NULL,
  `jml_aset` int(10) NOT NULL,
  `jml_perbaikan` int(10) NOT NULL,
  `kode_sarpras` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarpras`
--

INSERT INTO `sarpras` (`id_sarpras`, `nama_s`, `kategori`, `jml`, `foto`, `total_pnjm`, `total_beli`, `jml_rusak`, `jml_pnjm`, `jml_aset`, `jml_perbaikan`, `kode_sarpras`) VALUES
(3, 'Mikroskop', 'Sarana', '3', '66171.jpg', 1, 0, 0, 0, 0, 0, 'SPADA'),
(4, 'Petridis', 'Sarana', '8', '96292.jpeg', 0, 0, 0, 0, 0, 0, 'SPADA'),
(5, 'Mikropepet', 'Sarana', '14', '56993.jpg', 4, 0, 0, 0, 0, 0, 'SPADA'),
(6, 'Sentrifuse', 'Sarana', '10', '64544.jpg', 0, 1, 0, 0, 0, 0, 'SPADA'),
(7, 'Inkubator', 'Sarana', '7', '30685.jpg', 2, 0, 0, 0, 0, 0, 'SPADA'),
(8, 'Stainning jar', 'Sarana', '4', '41376.png', 0, 0, 1, 0, 0, 0, 'SPRSK'),
(9, 'Tisue prosesor ', 'Sarana', '2', '17437.jpg', 0, 2, 0, 0, 0, 0, 'SPADA'),
(10, 'Mikrotom hematolizer', 'Sarana', '3', '61498.jpg', 0, 0, 0, 0, 0, 0, 'SPADA'),
(11, 'Alat nekropsi', 'Sarana', '15', '88999.jpeg', 5, 0, 0, 5, 0, 0, 'SPADA'),
(12, 'Waterbath', 'Sarana', '6', '549810.jpeg', 0, 0, 0, 0, 0, 0, 'SPADA'),
(13, 'Aula', 'Prasarana', '1', '8749login.jpg', 0, 0, 0, 0, 0, 0, 'SPADA'),
(14, 'Lapangan Basket/Futsal', 'Prasarana', '1', '2837login.jpg', 0, 0, 0, 0, 0, 0, 'SPADA'),
(15, 'Ruang Rapat', 'Prasarana', '1', '6268ruang.rapat.scaled.jpg', 0, 0, 0, 0, 0, 0, 'SPADA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(9) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'atasan', 'atasan', 'atasan', 'atasan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_j`),
  ADD KEY `id_pd` (`id_sarpras`),
  ADD KEY `id_d` (`id_sarpras`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_sarpras`);

--
-- Indexes for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_d` (`id_peminjaman`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_pd` (`id_sarpras`,`tgl_prw`),
  ADD KEY `id_d` (`tgl_prw`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_d` (`id_sarpras`,`tgl_pbk`),
  ADD KEY `id_pegawai` (`tgl_pbk`),
  ADD KEY `tgl_pbk` (`tgl_pbk`);

--
-- Indexes for table `rusak`
--
ALTER TABLE `rusak`
  ADD PRIMARY KEY (`id_rusak`);

--
-- Indexes for table `sarpras`
--
ALTER TABLE `sarpras`
  ADD PRIMARY KEY (`id_sarpras`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_j` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pengecekan`
--
ALTER TABLE `pengecekan`
  MODIFY `id_pengecekan` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rusak`
--
ALTER TABLE `rusak`
  MODIFY `id_rusak` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sarpras`
--
ALTER TABLE `sarpras`
  MODIFY `id_sarpras` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
