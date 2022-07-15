-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2016 at 06:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prog_rizky_aliza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin Disnaker');

-- --------------------------------------------------------

--
-- Table structure for table `jamsostek`
--

CREATE TABLE IF NOT EXISTS `jamsostek` (
  `id_jamsostek` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(9) NOT NULL,
  `tanggal_jamsostek` date NOT NULL,
  `no_jamsostek` varchar(10) NOT NULL,
  `peserta_jamsostek` int(11) NOT NULL,
  `jaminan_kecelakaan` varchar(50) NOT NULL,
  `jaminan_kematian` varchar(50) NOT NULL,
  `jaminan_hari_tua` varchar(50) NOT NULL,
  `jaminan_kesehatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jamsostek`),
  KEY `no_pendaftaran` (`no_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jamsostek`
--

INSERT INTO `jamsostek` (`id_jamsostek`, `no_pendaftaran`, `tanggal_jamsostek`, `no_jamsostek`, `peserta_jamsostek`, `jaminan_kecelakaan`, `jaminan_kematian`, `jaminan_hari_tua`, `jaminan_kesehatan`) VALUES
(2, '000012016', '2016-10-10', '1230012341', 2041, 'Badan Penyelenggara adalah selain PT ASTEK', 'Badan Penyelenggara adalah selain PT ASTEK', 'Badan Penyelenggara adalah selain PT ASTEK', 'Badan Penyelenggara adalah selain PT ASTEK'),
(3, '000022016', '2016-09-27', '123', 123, 'Badan Penyelenggara adalah PT ASTEK', 'Badan Penyelenggara adalah PT ASTEK', 'Badan Penyelenggara adalah PT ASTEK', 'Badan Penyelenggara adalah PT ASTEK');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(9) NOT NULL,
  `pelatihan_pekerja` enum('Ada','Tidak') NOT NULL,
  `pemagangan` enum('Ada','Tidak') NOT NULL,
  `pelatihan` enum('Ada','Tidak') NOT NULL,
  `pengindonesiaan` enum('Ada','Tidak') NOT NULL,
  PRIMARY KEY (`id_pelatihan`),
  KEY `no_pendaftaran` (`no_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `no_pendaftaran`, `pelatihan_pekerja`, `pemagangan`, `pelatihan`, `pengindonesiaan`) VALUES
(2, '000012016', 'Tidak', 'Tidak', 'Tidak', 'Ada'),
(4, '000022016', 'Ada', 'Ada', 'Ada', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_siu` varchar(20) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `alamat_usaha` varchar(100) NOT NULL,
  `status` enum('Menunggu Verifikasi Data','Data Valid','Data Tidak Valid') NOT NULL DEFAULT 'Menunggu Verifikasi Data',
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `tanggal_daftar`, `no_ktp`, `nama`, `alamat`, `no_hp`, `email`, `password`, `no_siu`, `nama_usaha`, `alamat_usaha`, `status`) VALUES
(1, '2016-10-23 13:03:13', '1234567891233222', 'Rizky Aliza', 'Jalan Teuku Umar No. 52, Kedaton, Bandar Lampung', '082189894444', 'indra.setyawantoro@gmail.com', '202cb962ac59075b964b07152d234b70', '123456789', 'PT Pesona Putra Perkasa', 'Jalan Teuku Umar No. 100, Kedaton, Bandar Lampung', 'Data Valid');

-- --------------------------------------------------------

--
-- Table structure for table `pengupahan`
--

CREATE TABLE IF NOT EXISTS `pengupahan` (
  `id_upah` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(9) NOT NULL,
  `upah_harian` int(11) NOT NULL,
  `upah_bulanan` int(11) NOT NULL,
  `upah_borongan` int(11) NOT NULL,
  `upah_seluruh` int(11) NOT NULL,
  `upah_tertinggi` int(11) NOT NULL,
  `upah_terendah` int(11) NOT NULL,
  `pekerja_umr` int(11) NOT NULL,
  PRIMARY KEY (`id_upah`),
  KEY `no_pendaftaran` (`no_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengupahan`
--

INSERT INTO `pengupahan` (`id_upah`, `no_pendaftaran`, `upah_harian`, `upah_bulanan`, `upah_borongan`, `upah_seluruh`, `upah_tertinggi`, `upah_terendah`, `pekerja_umr`) VALUES
(2, '000012016', 1200000001, 2147483647, 0, 2147483647, 60000001, 25000001, 2051),
(3, '000022016', 100000000, 200000000, 0, 300000000, 2000000, 1000000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_kerja`
--

CREATE TABLE IF NOT EXISTS `tenaga_kerja` (
  `id_tenaga_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(9) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Wanita') NOT NULL,
  `kelompok_umur` varchar(20) NOT NULL,
  `cpuh_tetap` int(11) NOT NULL,
  `cpubr_tetap` int(11) NOT NULL,
  `cpubl_tetap` int(11) NOT NULL,
  `cpuh_tidak_tetap` int(11) NOT NULL,
  `cpubr_tidak_tetap` int(11) NOT NULL,
  `cpubl_tidak_tetap` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_tenaga_kerja`),
  KEY `no_pendaftaran` (`no_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tenaga_kerja`
--

INSERT INTO `tenaga_kerja` (`id_tenaga_kerja`, `no_pendaftaran`, `kewarganegaraan`, `jenis_kelamin`, `kelompok_umur`, `cpuh_tetap`, `cpubr_tetap`, `cpubl_tetap`, `cpuh_tidak_tetap`, `cpubr_tidak_tetap`, `cpubl_tidak_tetap`, `jumlah`) VALUES
(9, '000012016', 'WNI', 'Laki-laki', '>= 18 th', 101, 0, 1201, 21, 0, 101, 1424),
(10, '000012016', 'WNI', 'Laki-laki', '> 15 th s/d < 18 th', 0, 0, 0, 0, 0, 0, 0),
(11, '000012016', 'WNI', 'Laki-laki', '>= 15 th', 0, 0, 0, 0, 0, 0, 0),
(12, '000012016', 'WNI', 'Wanita', '>= 18 th', 101, 0, 601, 21, 0, 151, 874),
(13, '000012016', 'WNI', 'Wanita', '> 15 th s/d < 18 th', 0, 0, 0, 0, 0, 0, 0),
(14, '000012016', 'WNI', 'Wanita', '>= 15 th', 0, 0, 0, 0, 0, 0, 0),
(15, '000012016', 'WNA', 'Laki-laki', '', 0, 0, 0, 0, 0, 0, 0),
(16, '000012016', 'WNA', 'Wanita', '', 0, 0, 0, 0, 0, 0, 0),
(25, '000022016', 'WNI', 'Laki-laki', '>= 18 th', 5, 0, 8, 5, 0, 8, 26),
(26, '000022016', 'WNI', 'Laki-laki', '> 15 th s/d < 18 th', 0, 0, 0, 0, 0, 0, 0),
(27, '000022016', 'WNI', 'Laki-laki', '>= 15 th', 0, 0, 0, 0, 0, 0, 0),
(28, '000022016', 'WNI', 'Wanita', '>= 18 th', 6, 0, 7, 3, 0, 8, 24),
(29, '000022016', 'WNI', 'Wanita', '> 15 th s/d < 18 th', 0, 0, 0, 0, 0, 0, 0),
(30, '000022016', 'WNI', 'Wanita', '>= 15 th', 0, 0, 0, 0, 0, 0, 0),
(31, '000022016', 'WNA', 'Laki-laki', '', 0, 0, 0, 0, 0, 0, 0),
(32, '000022016', 'WNA', 'Wanita', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wkpl`
--

CREATE TABLE IF NOT EXISTS `wkpl` (
  `no_pendaftaran` varchar(9) NOT NULL,
  `tgl_wkpl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_daftar` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `telp_fax` varchar(12) NOT NULL,
  `jenis_usaha` varchar(30) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `nama_pengurus` varchar(30) NOT NULL,
  `alamat_pengurus` varchar(100) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alamat_lama` varchar(100) NOT NULL,
  `status_perusahaan` enum('Pusat','Cabang') NOT NULL,
  `status_pemilikan` varchar(30) NOT NULL,
  `status_permodalan` varchar(20) NOT NULL,
  `waktu_kerja` varchar(30) NOT NULL,
  `alat_bahan` varchar(255) NOT NULL,
  `limbah_produksi` varchar(5) NOT NULL,
  `pengolah_limbah` varchar(10) NOT NULL,
  `amdal` varchar(15) NOT NULL,
  `sertifikat` varchar(6) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  `tunjangan` varchar(20) NOT NULL,
  `bonus` varchar(20) NOT NULL,
  `fasilitas_kesehatan` varchar(255) NOT NULL,
  `fasilitas_kesejahteraan` varchar(255) NOT NULL,
  `program_pensiun` varchar(50) NOT NULL,
  `hubungan_kerja` varchar(30) NOT NULL,
  `organisasi_kerja` varchar(50) NOT NULL,
  `rencana_pekerja` int(11) NOT NULL,
  `penerimaan_pekerja` int(11) NOT NULL,
  `pekerja_berhenti` int(11) NOT NULL,
  `status_wkpl` enum('Menunggu Verifikasi Data','Data Valid','Data Tidak Valid') NOT NULL DEFAULT 'Menunggu Verifikasi Data',
  PRIMARY KEY (`no_pendaftaran`),
  KEY `id_daftar` (`id_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wkpl`
--

INSERT INTO `wkpl` (`no_pendaftaran`, `tgl_wkpl`, `id_daftar`, `nama_perusahaan`, `alamat_perusahaan`, `kecamatan`, `kode_pos`, `telp_fax`, `jenis_usaha`, `nama_pemilik`, `alamat_pemilik`, `nama_pengurus`, `alamat_pengurus`, `tanggal_berdiri`, `tanggal_pindah`, `alamat_lama`, `status_perusahaan`, `status_pemilikan`, `status_permodalan`, `waktu_kerja`, `alat_bahan`, `limbah_produksi`, `pengolah_limbah`, `amdal`, `sertifikat`, `tanggal_sertifikat`, `tunjangan`, `bonus`, `fasilitas_kesehatan`, `fasilitas_kesejahteraan`, `program_pensiun`, `hubungan_kerja`, `organisasi_kerja`, `rencana_pekerja`, `penerimaan_pekerja`, `pekerja_berhenti`, `status_wkpl`) VALUES
('000012016', '2016-10-23 16:19:09', 1, 'PT Media Teknologii', 'Jalan Teuku Umar No. 111, Kedaton, Bandar Lampungi', 'Rajabasai', '35141', '082177894431', 'Jasai', 'Indra Styawantoroi', 'Jalan Teuku Umar No. 110, Kedaton, Bandar Lampungi', 'Danang Kusumai', 'Jalan Teuku Umar No. 112, Kedaton, Bandar Lampungi', '2016-10-01', '0000-00-00', '', 'Cabang', 'Persero', 'Penanaman Modal Dala', '8 Jam / hari dan 40 Jam / ming', '', 'Padat', 'Tidak Ada', 'Tidak Pernah', '000123', '2016-10-03', '<br />\r\n<b>Notice</b', '<br />\r\n<b>Notice</b', '', '', 'Dilaksanakan oleh Dana Pensiun Lembaga Keuangan', 'Perjanjian Kerja', 'Serikat Pekerja Tingkat Perusahaan', 12, 25, 11, 'Menunggu Verifikasi Data'),
('000022016', '2016-10-23 16:26:09', 1, 'aaa', 'aaa', 'aaa', '123', '123', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', '2016-10-01', '2016-10-02', 'aaa', 'Cabang', 'Swasta', 'Penanaman Modal Asin', '8 Jam / hari dan 40 Jam / ming', 'Instalasi Listrik', 'Padat', 'Ada', 'Tidak Pernah', '123', '2016-10-23', '1 Bulan Upah', '< 1 Bulan Upah', 'Poliklinik', 'Perumahan Karyawan', 'Dilaksanakan oleh Dana Pensiun Lembaga Keuangan', 'Perjanjian Kerja', 'Serikat Pekerja Tingkat Perusahaan', 12, 12, 12, 'Menunggu Verifikasi Data');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jamsostek`
--
ALTER TABLE `jamsostek`
  ADD CONSTRAINT `jamsostek_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `wkpl` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `wkpl` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengupahan`
--
ALTER TABLE `pengupahan`
  ADD CONSTRAINT `pengupahan_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `wkpl` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tenaga_kerja`
--
ALTER TABLE `tenaga_kerja`
  ADD CONSTRAINT `tenaga_kerja_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `wkpl` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wkpl`
--
ALTER TABLE `wkpl`
  ADD CONSTRAINT `wkpl_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `pendaftaran` (`id_daftar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
