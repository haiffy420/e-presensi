-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2023 at 09:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `alamat_g` varchar(255) NOT NULL,
  `no_telepon_g` varchar(30) NOT NULL,
  `email_g` varchar(100) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `alamat_g`, `no_telepon_g`, `email_g`, `id_pengguna`) VALUES
(1, '11112312', 'asep', '', '', '', 2),
(2, '111', 'asepa', '', '', '', 4),
(3, '123', 'Makoto', '', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(255) NOT NULL,
  `hari` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mapel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` enum('7A','7B','-') COLLATE utf8_unicode_ci DEFAULT '-',
  `tgl` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pokok_bahas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rangkuman` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jam_ke` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `hari`, `mapel`, `kelas`, `tgl`, `pokok_bahas`, `rangkuman`, `jam_ke`, `id_guru`) VALUES
(1, 'Senin', 'asd', '7B', '1 Januari 2023', 'asdasd', 'asdasd', 'asd', 1),
(2, 'Senin', 'Agama', '7B', '1 Januari 2023', 'Ibadah', 'Ibadah adalah', '1', 1),
(3, 'dasd', 'adsd', '7A', 'asd', 'ads', '', '', 0),
(4, 'dasd', 'dsad', '7A', 'asd', 'dasdas', '', '', 0),
(5, 'dasd', 'asd', '-', 'asd', 'asd', 'asd', '', 1),
(6, 'ads', 'asd', '7A', 'asd', 'ads', 'asd', '', 1),
(7, 'asd', 'asd', '7A', 'asd', 'asd', 'asd', '', 0),
(8, 'asd', 'adsd', '7A', 'asd', 'asd', 'asd', '', 2),
(9, 'asd', 'asd', '7A', 'asd', 'asd', 'asd', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(255) NOT NULL,
  `nama_pengguna` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('Administrator','Guru') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Guru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin e-Presensi', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator'),
(2, 'Guru 1', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'Guru'),
(4, 'Pengguna e-KMS Lansia', 'user2', '12dea96fec20593566ab75692c9949596833adc9', 'Guru'),
(5, 'Makoto', 'makoto', 'b652819ff5bcc22c7ad49282998c384337f7da21', 'Guru'),
(6, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
