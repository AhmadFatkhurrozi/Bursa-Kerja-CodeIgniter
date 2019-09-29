-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2018 at 08:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci_sibuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `ID_USER` varchar(20) NOT NULL,
  `NAMA_ADMIN` varchar(50) NOT NULL,
  `TELEPON` varchar(15) NOT NULL,
  `FOTO_ADMIN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `ID_USER`, `NAMA_ADMIN`, `TELEPON`, `FOTO_ADMIN`) VALUES
(14, 'AD20181227051654', 'Disnaker Jombang', '(0321) 861459', 'AD20181227051654.png');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `ID_BID` varchar(20) NOT NULL,
  `ID_PENCAKER` int(11) DEFAULT NULL,
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `ID_LOWONGAN` int(11) DEFAULT NULL,
  `TGL_BID` date DEFAULT NULL,
  `STATUS_BID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`ID_BID`, `ID_PENCAKER`, `ID_PERUSAHAAN`, `ID_LOWONGAN`, `TGL_BID`, `STATUS_BID`) VALUES
('BID20181224084901', 8, 6, 5, '2018-12-24', 1),
('BID20181224090212', 8, 9, 8, '2018-12-24', 1),
('BID20181229010428', 5, 9, 8, '2018-12-29', 1),
('BID20181229010613', 9, 9, 8, '2018-12-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID_HISTORY` int(11) NOT NULL,
  `ID_BID` varchar(20) NOT NULL,
  `ID_PENCAKER` int(11) NOT NULL,
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `ID_LOWONGAN` int(11) NOT NULL,
  `TGL_BID` date NOT NULL,
  `STATUS_HISTORY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID_HISTORY`, `ID_BID`, `ID_PENCAKER`, `ID_PERUSAHAAN`, `ID_LOWONGAN`, `TGL_BID`, `STATUS_HISTORY`) VALUES
(89, 'BID20181224084713', 8, 6, 5, '2018-12-24', 'dibatalkan'),
(90, 'BID20181224084718', 8, 9, 8, '2018-12-24', 'dibatalkan'),
(91, 'BID20181224084838', 8, 9, 8, '2018-12-24', 'dibatalkan'),
(92, 'BID20181224084901', 8, 6, 5, '2018-12-24', 'Ditolak'),
(93, 'BID20181224085719', 8, 9, 8, '2018-12-24', 'dibatalkan'),
(94, 'BID20181224090140', 8, 9, 8, '2018-12-24', 'dibatalkan'),
(95, 'BID20181224090212', 8, 9, 8, '2018-12-24', 'Ditolak'),
(96, 'BID20181229010428', 5, 9, 8, '2018-12-29', 'Diterima'),
(97, 'BID20181229010613', 9, 9, 8, '2018-12-29', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'Teknologi'),
(2, 'Buruh'),
(3, 'Tenaga Pengajar'),
(4, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `ID_KEAHLIAN` int(11) NOT NULL,
  `ID_PENCAKER` int(11) DEFAULT NULL,
  `BIDANG_KEAHLIAN` varchar(100) NOT NULL,
  `DESKRIPSI_KEAHLIAN` text NOT NULL,
  `LAMPIRAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`ID_KEAHLIAN`, `ID_PENCAKER`, `BIDANG_KEAHLIAN`, `DESKRIPSI_KEAHLIAN`, `LAMPIRAN`) VALUES
(5, 5, 'IT', 'Front End Developer', '1545631632.png');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `ID_LOWONGAN` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `TGL_MULAI` date NOT NULL,
  `TGL_SELESAI` date NOT NULL,
  `STATUS_LOWONGAN` varchar(50) NOT NULL,
  `KUOTA` int(11) NOT NULL,
  `DESKRIPSI` text,
  `GAJI` varchar(50) NOT NULL,
  `GAMBAR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`ID_LOWONGAN`, `ID_KATEGORI`, `ID_PERUSAHAAN`, `JUDUL`, `TGL_MULAI`, `TGL_SELESAI`, `STATUS_LOWONGAN`, `KUOTA`, `DESKRIPSI`, `GAJI`, `GAMBAR`) VALUES
(5, 2, 6, 'Tukang Kebun', '2018-12-10', '2018-12-26', 'Tervalidasi', 5, '<p><span style=\"text-decoration: underline;\"><strong>Syarat</strong></span></p>\r\n<p>Laki-laki usia max 28 thn</p>\r\n<p>Bersedia kerja keras</p>\r\n<p>&nbsp;</p>\r\n<p>SMA</p>', '700.000', 'low5.jpg'),
(8, 1, 9, 'Web Developer', '2018-12-11', '2018-12-30', 'Tervalidasi', 25, '<div class=\"blog-content\">\r\n<p><strong>Syarat :</strong></p>\r\n<p>- Berpengalaman / Fresh Graduate (dipertimbangkan)<br />- pendidikan S1 TI<br />- Menguasai PHP, CSS dan HTML<br />- Diutamakan menguasai Laravel dan&nbsp; Bootstrap<br />- Biasa mengunakan dependency management dan Github<br />- Memiliki kemampuan penulisan query berelasi<br />- Bisa bekerja dalam tim<br />- Siap kerja full time<br />- Menguasai Javascript JQuery</p>\r\n</div>', '1000.000', 'low8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `ID_PENCAKER` int(11) NOT NULL,
  `ID_USER` varchar(20) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `NAMA_PENCAKER` varchar(50) NOT NULL,
  `JK` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(50) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `TELEPON` varchar(15) DEFAULT NULL,
  `ALAMAT` text,
  `FOTO` varchar(100) DEFAULT NULL,
  `FOTO_KTP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pencaker`
--

INSERT INTO `pencaker` (`ID_PENCAKER`, `ID_USER`, `NIK`, `NAMA_PENCAKER`, `JK`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `AGAMA`, `TELEPON`, `ALAMAT`, `FOTO`, `FOTO_KTP`) VALUES
(5, 'PK20181130140124', '3517062609970001', 'Ahmad Fatkhurrozi', 'Laki-laki', 'Jombang', '1997-09-26', 'Islam', '0856559949778', 'Jln. H. Nur RT/RW 04/02 Kalibening Mojoagung Jombang', 'PK20181130140124.jpg', 'ktpPK20181130140124.jpg'),
(8, 'PK20181210161012', '12345678', 'Diah Novitasari', 'Perempuan', 'Jombang', '2018-12-11', 'Islam', '081537137617', 'Branjang', 'PK20181210161012.jpg', 'ktpPK20181130140124.jpg'),
(9, 'PK20181213073207', '13458', 'Ivan Dwi Fibrian', 'Laki-laki', 'Jombang', '1988-02-02', 'Islam', '0987654323', 'kajlkl', 'PK20181213073207.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `ID_PENDIDIKAN` int(11) NOT NULL,
  `ID_PENCAKER` int(11) DEFAULT NULL,
  `TINGKAT_PENDIDIKAN` varchar(50) NOT NULL,
  `NAMA_SEKOLAH` varchar(50) NOT NULL,
  `JURUSAN` varchar(50) NOT NULL,
  `ALAMAT_SEKOLAH` text,
  `TAHUN_MASUK` varchar(4) NOT NULL,
  `TAHUN_LULUS` varchar(4) NOT NULL,
  `LAMPIRAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`ID_PENDIDIKAN`, `ID_PENCAKER`, `TINGKAT_PENDIDIKAN`, `NAMA_SEKOLAH`, `JURUSAN`, `ALAMAT_SEKOLAH`, `TAHUN_MASUK`, `TAHUN_LULUS`, `LAMPIRAN`) VALUES
(8, 5, 'SD/MI', 'MI Babussalam', '-', 'Kalibening', '2003', '2009', 'pend8.png'),
(11, 5, 'SMA/SMK', 'MA Babussalam', 'IPS', 'Kalibening', '2012', '2015', 'pend11.jpg'),
(12, 8, 'S1/Sarjana', 'Universitas Pesantren Tinggi Darul Ulum', 'S1 Pendidikan Agama Islam', 'Peterongan Jombang', '2015', '2019', 'pend12.jpg'),
(13, 9, 'S1/Sarjana', 'UNIPDU', 'SI', 'Peterongan', '2012', '2016', 'pend13.jpg'),
(20, 8, 'SMA/SMK', 'DU 3', 'IPA', 'Ppp', '2012', '2015', 'pend1.png'),
(22, 8, 'SMP/MTS', 'Du', 'IPA', 'pkpkpjo', '2009', '2012', '1545542492.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `ID_PENGALAMAN` int(11) NOT NULL,
  `ID_PENCAKER` int(11) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(100) NOT NULL,
  `JABATAN` varchar(50) NOT NULL,
  `DESKRIPSI_JABATAN` text NOT NULL,
  `BIDANG_PERUSAHAAN` varchar(100) NOT NULL,
  `TGL_MASUK` date NOT NULL,
  `TGL_KELUAR` date NOT NULL,
  `LAMPIRAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`ID_PENGALAMAN`, `ID_PENCAKER`, `NAMA_PERUSAHAAN`, `JABATAN`, `DESKRIPSI_JABATAN`, `BIDANG_PERUSAHAAN`, `TGL_MASUK`, `TGL_KELUAR`, `LAMPIRAN`) VALUES
(6, 8, 'Iffa Fashion', 'Pegawai', 'Menjaga toko', 'Fashion', '2018-12-04', '2018-12-12', 'peng6.jpg'),
(8, 5, 'Iffa Fashion', 'Owner', 'Pemilik Toko', 'Fashion', '2018-12-01', '2018-12-18', '1545631503.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_PERUSAHAAN` int(11) NOT NULL,
  `ID_USER` varchar(20) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(100) NOT NULL,
  `NO_SIUP` varchar(20) DEFAULT NULL,
  `NO_SITU` varchar(20) DEFAULT NULL,
  `BIDANG_USAHA` varchar(50) DEFAULT NULL,
  `ALAMAT` text,
  `TELEPON` varchar(15) DEFAULT NULL,
  `DESKRIPSI_PERUSAHAAN` text,
  `WEBSITE` varchar(50) DEFAULT NULL,
  `LOGO_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `SLOGAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`ID_PERUSAHAAN`, `ID_USER`, `NAMA_PERUSAHAAN`, `NO_SIUP`, `NO_SITU`, `BIDANG_USAHA`, `ALAMAT`, `TELEPON`, `DESKRIPSI_PERUSAHAAN`, `WEBSITE`, `LOGO_PERUSAHAAN`, `SLOGAN`) VALUES
(6, 'PR20181130162628', 'Saintek Unipdu', '13/NOV/SIUP-2018', '13/JUL/NOV-2018', 'Pendidikan', 'Peterongan', '085692992829', 'PTS', 'saintek.unipdu.ac.id', 'PR20181130162628.jpg', 'Kampus Insan Penuh Cinta'),
(9, 'PR20181211170616', 'PT. CJ Feed Jombang', 'SIUP/2018/71987', 'SITU/2018/92170', 'Pakan Ternak', 'Jalan Raya Mojoagung', '(0276) 321247', 'Perusahaan PMA yang berasal dari Korea Selatan bergerak di bidang makanan ternak dan tergabung di dalam CJ Corporation', 'www.cjv.com', 'PR20181211170616.jpg', 'Karena kami selalu mengutamakan kesejahteraan, kesehatan, dan Gaya hidup yang nyaman'),
(10, 'PR20181229054527', 'PT. SAI', '-', '-', '-', '-', '-', '-', '-', 'default.png', '-'),
(11, 'PR20181229054959', 'PT. Sampoerna', '-', '-', '-', '-', '-', '-', '-', 'default.png', '-'),
(12, 'PR20181229055048', 'Yamaha Indo Perkasa', '-', '-', '-', '-', '-', '-', '-', 'default.png', '-');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID_REVIEW` int(11) NOT NULL,
  `ID_BID` varchar(20) DEFAULT NULL,
  `ID_PENCAKER` int(11) NOT NULL,
  `ID_PERUSAHAAN` int(11) DEFAULT NULL,
  `HASIL_REVIEW` varchar(50) NOT NULL,
  `CATATAN` text NOT NULL,
  `STATUS_REVIEW` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID_REVIEW`, `ID_BID`, `ID_PENCAKER`, `ID_PERUSAHAAN`, `HASIL_REVIEW`, `CATATAN`, `STATUS_REVIEW`) VALUES
(22, 'BID20181224084901', 8, 6, 'Diterima', '<p>Anda terlalu sering membatalkan lamaran, anda tidak komitmen!</p>', 1),
(23, 'BID20181224090212', 8, 9, 'Ditolak', '<p>Maaf, anda tidak memenuhi kriteria</p>', 1),
(24, 'BID20181229010428', 5, 9, 'Diterima', '', 1),
(25, 'BID20181229010613', 9, 9, 'Diterima', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_akun`
--

CREATE TABLE `user_akun` (
  `ID_USER` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `LEVEL_USER` enum('admin','pencaker','perusahaan') NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `DIBUAT_PADA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_akun`
--

INSERT INTO `user_akun` (`ID_USER`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL_USER`, `STATUS`, `DIBUAT_PADA`) VALUES
('AD20181227051654', 'disnakerjombang@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'AKTIF', '2018-12-27'),
('PK20181130140124', 'jamban.umum96@gmail.com', 'rozi', '6b77cfa7c0de00cd481b82dc5c5d99fe', 'pencaker', 'AKTIF', '2018-11-30'),
('PK20181210161012', 'novi@gmail.com', 'novi', '832f72b7a13b2cedcfb108603a10e2a6', 'pencaker', 'AKTIF', '2018-12-10'),
('PK20181213073207', 'idfibrian@gmail.com', 'ivan', '2c42e5cf1cdbafea04ed267018ef1511', 'pencaker', 'AKTIF', '2018-12-13'),
('PR20181130162628', 'jamban.umum26@gmail.com', 'saintek', '762604a72502dd28864a5d09584142dd', 'perusahaan', 'AKTIF', '2018-11-30'),
('PR20181211170616', 'cj@gmail.com', 'cjv', '7922f5684c6ea036d0ee19fd0252d574', 'perusahaan', 'AKTIF', '2018-12-11'),
('PR20181229054527', 'sai@gmail.com', 'sai', 'a29bac723ca2d59ed78a2d715e17e92f', 'perusahaan', 'AKTIF', '2018-12-29'),
('PR20181229054959', 'sampoerna@gmail.com', 'sampoerna', '9b7a10d284cb2d92eff22fda74db7ab3', 'perusahaan', 'AKTIF', '2018-12-29'),
('PR20181229055048', 'indoperkasa@gmail.com', 'indo', '882838be9bb614de4c630fe8f6ab900c', 'perusahaan', 'AKTIF', '2018-12-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `ID_USER_2` (`ID_USER`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`ID_BID`),
  ADD KEY `ID_LOWONGAN` (`ID_LOWONGAN`),
  ADD KEY `ID_PENCAKER` (`ID_PENCAKER`),
  ADD KEY `ID_PERUSAHAAN` (`ID_PERUSAHAAN`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID_HISTORY`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`ID_KEAHLIAN`),
  ADD KEY `ID_PENCAKER` (`ID_PENCAKER`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`ID_LOWONGAN`),
  ADD KEY `ID_KATEGORI` (`ID_KATEGORI`),
  ADD KEY `ID_PERUSAHAAN` (`ID_PERUSAHAAN`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD PRIMARY KEY (`ID_PENCAKER`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`ID_PENDIDIKAN`),
  ADD KEY `ID_PENCAKER` (`ID_PENCAKER`);

--
-- Indexes for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`ID_PENGALAMAN`),
  ADD KEY `ID_PENCAKER` (`ID_PENCAKER`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_PERUSAHAAN`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID_REVIEW`);

--
-- Indexes for table `user_akun`
--
ALTER TABLE `user_akun`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID_HISTORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `ID_KEAHLIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `ID_LOWONGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `ID_PENCAKER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `ID_PENDIDIKAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `ID_PENGALAMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `ID_PERUSAHAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID_REVIEW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_akun` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`ID_LOWONGAN`) REFERENCES `lowongan` (`ID_LOWONGAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`ID_PENCAKER`) REFERENCES `pencaker` (`ID_PENCAKER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`ID_PENCAKER`) REFERENCES `pencaker` (`ID_PENCAKER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_ibfk_2` FOREIGN KEY (`ID_PERUSAHAAN`) REFERENCES `perusahaan` (`ID_PERUSAHAAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD CONSTRAINT `pencaker_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_akun` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`ID_PENCAKER`) REFERENCES `pencaker` (`ID_PENCAKER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD CONSTRAINT `pengalaman_kerja_ibfk_1` FOREIGN KEY (`ID_PENCAKER`) REFERENCES `pencaker` (`ID_PENCAKER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_akun` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
