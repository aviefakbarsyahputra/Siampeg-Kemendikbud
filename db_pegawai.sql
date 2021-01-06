-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 04:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` enum('admin','pimpinan','pegawai','') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `nama`, `no_hp`, `level`, `foto`) VALUES
(1, '123', '21232f297a57a5a743894a0e4a801fc3', 'admin', '089639823858', 'admin', 'admin.png'),
(2, '1411500299', '90973652b88fe07d05a4304f0a945de8', 'Denny Aris Setiawan', '089639823858', 'pimpinan', 'denny.jpg'),
(4, '1411501438', '1f79d1a654a689955751892d0c39332a', 'Muhammad Fahrizal', '089639823858', 'pegawai', '18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'c0wk48k0s8ksgc0408k4gogss00gwkooko00ow0w', 1, 1, 0, NULL, 1544443441);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `kd_cuti` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `mulai_cuti` varchar(20) NOT NULL,
  `akhir_cuti` varchar(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_pengajuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`kd_cuti`, `nama`, `mulai_cuti`, `akhir_cuti`, `keterangan`, `status`, `tgl_pengajuan`) VALUES
('CT001', 'Muhammad Fahrizal', '20-12-2018', '31-12-2018', 'Lahiran', 'Tidak Disetujui', '10-12-2018'),
('CT002', 'Muhammad Fahrizal', '20-12-2018', '31-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '12-12-2018'),
('CT003', 'Muhammad Fahrizal', '20-12-2018', '31-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '12-12-2018'),
('CT004', 'Muhammad Fahrizal', '01-12-2018', '04-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '12-12-2018'),
('CT005', 'Muhammad Fahrizal', '01-12-2018', '31-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '12-12-2018'),
('CT006', 'Muhammad Fahrizal', '01-12-2018', '02-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '12-12-2018'),
('CT007', 'Muhammad Fahrizal', '13-12-2018', '16-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '12-12-2018'),
('CT008', 'Muhammad Fahrizal', '01-12-2018', '03-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '13-12-2018'),
('CT009', 'Muhammad Fahrizal', '01-12-2018', '02-12-2018', 'Lahiran', 'Belum Dikonfirmasi', '14-12-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE `tbl_golongan` (
  `id` int(5) NOT NULL,
  `golongan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`id`, `golongan`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `kd_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
('JB001', 'Kepala Dinas'),
('JB002', 'Sekretaris'),
('JB003', 'Ketua Bidang TIK'),
('JB004', 'KASI Infrastruktur Internet dan Data'),
('JB005', 'KASI Tata Kelola dan Ekosistem TIK'),
('JB006', 'KASI Kemananan dan Informasi Persandian'),
('JB007', 'KABID Pengembangan Aplikasi Layanan Publik'),
('JB008', 'KASI Pengembangan dan Integrasi Layanan Publik'),
('JB009', 'KASI Pemerintahan dan Implementasi Aplikasi LP'),
('JB010', 'KASI Statistika dan Pengolahan Data LP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kinerja`
--

CREATE TABLE `tbl_kinerja` (
  `id_kinerja` int(5) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kinerja`
--

INSERT INTO `tbl_kinerja` (`id_kinerja`, `id_bulan`, `nama`, `nilai`) VALUES
(2, 1, 'Muhammad Fahrizal', '90'),
(4, 3, 'Muhammad Fahrizal', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pangkat`
--

CREATE TABLE `tbl_pangkat` (
  `id` int(5) NOT NULL,
  `id_golongan` int(5) NOT NULL,
  `pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pangkat`
--

INSERT INTO `tbl_pangkat` (`id`, `id_golongan`, `pangkat`) VALUES
(1, 1, 'Juru Muda'),
(2, 1, 'Juru Muda Tingkat I'),
(3, 1, 'Juru'),
(4, 1, 'Juru Tingkat I'),
(5, 2, 'Pengatur Muda'),
(6, 2, 'Pengatur Muda Tingkat I'),
(7, 2, 'Pengatur'),
(8, 2, 'Pengatur Tingkat I'),
(9, 3, 'Penata Muda'),
(10, 3, 'Penata Muda Tingkat I'),
(11, 3, 'Penata'),
(12, 3, 'Penata Tingkat I'),
(13, 4, 'Pembina'),
(14, 4, 'Pembina Tingkat I'),
(15, 4, 'Pembina Utama Muda'),
(16, 4, 'Pembina Utama Madya'),
(17, 4, 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_masuk` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `status_menikah` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nip`, `nama`, `alamat`, `email`, `tanggal_masuk`, `jenis_kelamin`, `status_menikah`, `pendidikan`, `agama`, `jabatan`, `golongan`, `pangkat`, `foto`) VALUES
(2, '1411501438', 'Muhammad Fahrizal', 'Komplek Pondok Kacang Prima', 'saya.masfahri@gmail.com', '04-12-2018', 'Laki-Laki', 'Belum Menikah', 'S1', 'Islam', 'KASI Infrastruktur Internet dan Data', '4', 'Pembina Utama', '18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pimpinan`
--

CREATE TABLE `tbl_pimpinan` (
  `id_pimpinan` int(20) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `status_menikah` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pimpinan`
--

INSERT INTO `tbl_pimpinan` (`id_pimpinan`, `nip`, `nama`, `alamat`, `email`, `jenis_kelamin`, `status_menikah`, `pendidikan`, `agama`, `jabatan`, `golongan`, `pangkat`, `foto`) VALUES
(1, '1411500299', 'Denny Aris Setiawan', 'Jl. Kayu Gede 1 Rt01/rw 04', 'dennyariss@gmail.com', 'Laki-Laki', 'Belum Menikah', 'Magister Komputer', 'Islam', 'Ketua Bidang TIK', '2', 'Pengatur Muda Tingkat I', 'denny.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`kd_cuti`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `tbl_kinerja`
--
ALTER TABLE `tbl_kinerja`
  ADD PRIMARY KEY (`id_kinerja`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `tbl_pangkat`
--
ALTER TABLE `tbl_pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kinerja`
--
ALTER TABLE `tbl_kinerja`
  MODIFY `id_kinerja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pangkat`
--
ALTER TABLE `tbl_pangkat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  MODIFY `id_pimpinan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kinerja`
--
ALTER TABLE `tbl_kinerja`
  ADD CONSTRAINT `tbl_kinerja_ibfk_1` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
