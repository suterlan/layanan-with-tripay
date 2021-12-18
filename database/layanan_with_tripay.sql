-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2021 at 08:24 PM
-- Server version: 10.2.41-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azma7512_az_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_del` int(11) NOT NULL,
  `fitur1` varchar(80) DEFAULT NULL,
  `fitur2` varchar(80) DEFAULT NULL,
  `fitur3` varchar(80) DEFAULT NULL,
  `fitur4` varchar(80) DEFAULT NULL,
  `fitur5` varchar(80) DEFAULT NULL,
  `fitur6` varchar(80) DEFAULT NULL,
  `fitur7` varchar(80) DEFAULT NULL,
  `fitur8` varchar(80) DEFAULT NULL,
  `fitur9` varchar(80) DEFAULT NULL,
  `fitur10` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `harga`, `harga_del`, `fitur1`, `fitur2`, `fitur3`, `fitur4`, `fitur5`, `fitur6`, `fitur7`, `fitur8`, `fitur9`, `fitur10`) VALUES
(2, 'Website', 1750000, 3000000, 'Website Portofolio, Profile (Pribadi/Perusahaan), & akademik ', '- Gratis domain .com', '- Web Responsive', '- Modern Desain', '- SEO Friendly', '- Gratis bantuan hosting 1 bulan (Bagi yang memerlukan bantuan)', '- Harga akan berubah sesuai tingkat kompleksitas ', '', '', ''),
(3, 'Social Media Management', 890000, 990000, 'Instagram & Facebook', '- Total 20 Desain Konten', '- 17 Desain Feed', '- 3 Desain Story', '- 10 Caption Copywriting', '- Free Penjadwalan Konten', '- Unlimmited Revision', '- Kreatif Desain', '- Free konsultasi desain ', ''),
(4, 'Video Promotion', 1250000, 1500000, '2 Menit (Jika tambah durasi, +Rp. 500.000/menit)', '- Free Voice Over (Dubbing)', '- Kualitas HD 720p', '- Include Music', '- Kreatif Desain', '- Story Board', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `email`, `no_hp`, `alamat`, `image`, `password`, `is_active`, `date_created`) VALUES
(13, 'Suterlan', 'suterlan@gmail.com', '08147483647', 'Kp. Jatiwangi, RT.03/ RW.10 Sukajaya, Leles - Cianjur', 'default.png', '$2y$10$yqP7HpEyH2US/hq9AOg2G../3v87dM.LzTGb7zaUFWF4HIgyvQuFm', 1, 1637066223),
(15, 'Rustandi', '4lways4free@gmail.com', NULL, NULL, 'default.png', '$2y$10$2lfibAcq8FY2/zNHeGbHyuQgsXYLM5I8G0LDwA7j0L3BLqs0mD.Wa', 1, 1639193133),
(16, 'admin', 'admin@gmail.com', NULL, NULL, 'default.png', '$2y$10$e1H1e9OH7NKctVbygM4FAu2QFOtpktxShMYitTAhe8ykja.iZg3rq', 1, 1639211759),
(17, 'win umbara', 'wienoembhara@gmail.com', NULL, NULL, 'default.png', '$2y$10$wJS9reSkh51W5oMHOHTv2.Sm0RgBbvK9Zf5Y7ILEQgGDbapNwvF2C', 1, 1639223956);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul_pengumuman` varchar(128) DEFAULT NULL,
  `text_pengumuman` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul_pengumuman`, `text_pengumuman`) VALUES
(1, 'Selamat Datang di Az-Media', 'Temukan keuntungan anda <br> dengan memilih layanan kami');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `no_ref` varchar(128) NOT NULL,
  `date_trans` varchar(128) NOT NULL,
  `merchant_ref` varchar(128) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_member`, `id_layanan`, `no_ref`, `date_trans`, `merchant_ref`, `total_amount`, `status`) VALUES
(2, 13, 4, 'DEV-T789729832DMGRA', '1638979457', 'TR-1638979456', 500000, 'dibayar'),
(3, 13, 4, 'DEV-T789729920NJGU3', '1639063179', 'TR-1639063179', 500000, 'belum dibayar'),
(4, 13, 4, 'DEV-T789729921TB054', '1639063213', 'TR-1639063212', 500000, 'belum dibayar'),
(5, 13, 3, 'DEV-T7897299226MVC6', '1639066402', 'TR-1639066401', 800000, 'belum dibayar'),
(6, 13, 2, 'DEV-T789729923VLKCF', '1639066432', 'TR-1639066432', 999000, 'belum dibayar'),
(7, 13, 4, 'T82771394116AGZVR', '1639191508', 'TR-1639191506', 500000, 'belum dibayar'),
(8, 13, 4, 'T827713941518LJIL', '1639192301', 'TR-1639192300', 500000, 'belum dibayar'),
(9, 15, 4, 'T827713941949XLVW', '1639193382', 'TR-1639193379', 10000, 'belum dibayar'),
(10, 13, 2, 'T827713943873QDJ2', '1639196362', 'TR-1639196361', 999000, 'belum dibayar'),
(11, 13, 4, 'T82771394402REHZ7', '1639196557', 'TR-1639196556', 10000, 'belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `image`, `role_id`) VALUES
(14, 'admin', 'admin', '$2y$10$pbzkSCKxSJmZidERTHN8ouo9Oa0LdjoN6tz.iGLKoD0nu6T257Emm', 'default-admin.png', 1),
(17, 'Suterlan', 'suterlan', '$2y$10$IkGnSbNHMsA4Rbuq3L/tPuiTl.NH6a8wFqkGHAJsAOLJIxBWyJY16', 'default-admin.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
