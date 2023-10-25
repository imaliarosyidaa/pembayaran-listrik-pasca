-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 12:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_listrik_pasca2`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin Tingkat Tinggi'),
(2, 'Admin Tingkat Menengah'),
(3, 'Admin Tingkat Rendah'),
(4, 'Pengguna'),
(5, 'Operator'),
(6, 'Superuser'),
(7, 'Moderator'),
(8, 'Manajer'),
(9, 'Staff'),
(10, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_kwh` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES
(1001, 'user1', 'pass_user1', '12345678901', 'John Doe ', 'Jl. Merdeka No. 123 ', 1),
(1002, 'user2', 'pass_user2', '98765432102', 'Jane Smith ', 'Jl. Raya 15A ', 2),
(1003, 'user3', 'pass_user3', '24681357903', 'Michael Johnson', 'Jl. Kemuning Indah No. 7 ', 1),
(1004, 'user4', 'pass_user4', '13579246804', 'Emily Lee', 'Jl. Harmoni 9', 3),
(1005, 'user5', 'pass_user5', '56789012345', 'David Brown', 'Jl. Cemara Putih No. 23', 2),
(1006, 'user6', 'pass_user6', '98765432109', 'Sarah Anderson', 'Jl. Bunga Mawar 17', 1),
(1007, 'user7', 'pass_user7', '12345678907', 'Robert Wang', 'Jl. Taman Bahagia 8 ', 2),
(1008, 'user8', 'pass_user8', '98765432106', 'Lisa Chen', 'Jl. Indah Permai No. 5', 3),
(1009, 'user9', 'pass_user9', '13579246801', 'Kevin Wilson', 'Jl. Merdeka No. 15B ', 1),
(1010, 'user10', 'pass_user10', '56789012346', 'Jessica Park', 'Jl. Kenangan 10', 2),
(1011, 'user11', 'pass_user11', '98765432110', 'Jason Lee', 'Jl. Bunga Indah 3A', 1),
(1012, 'user12', 'pass_user12', '12345678912', 'Emma Lee ', 'Jl. Cendana 25 ', 3),
(1013, 'user13', 'pass_user13', '24681357913', 'James Johnson ', 'Jl. Harmoni 7', 1),
(1014, 'user14', 'pass_user14', '98765432114', 'Olivia Smithhh', 'Jl. Mawar Indah 12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bulan_bayar` varchar(255) NOT NULL,
  `biaya_admin` varchar(255) NOT NULL,
  `total_bayar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_pelanggan`, `tanggal_pembayaran`, `bulan_bayar`, `biaya_admin`, `total_bayar`, `id_user`) VALUES
(1, 1, 1001, '2022-02-10', 'Januari', '2000', '102000', 100),
(2, 2, 1002, '2022-02-11', 'Januari', '2000', '52000', 101),
(3, 3, 1003, '2022-02-12', 'Januari', '2000', '102000', 102),
(4, 4, 1004, '2022-02-15', 'Januari', '2000', '203000', 103),
(5, 5, 1005, '2022-03-02', 'Februari', '2000', '102000', 104),
(6, 6, 1006, '2022-03-05', 'Februari', '2000', '52000', 105),
(7, 7, 1007, '2022-03-10', 'Februari', '2000', '102000', 106),
(8, 8, 1008, '2022-03-15', 'Februari', '2000', '52000', 107),
(9, 9, 1009, '2022-04-01', 'Maret', '2000', '102000', 108),
(10, 10, 1010, '2022-04-05', 'Maret', '2000', '52000', 109),
(11, 11, 1011, '2022-04-10', 'Maret', '2000', '102000', 110),
(12, 12, 1012, '2022-04-15', 'Maret', '2000', '52000', 111),
(13, 13, 1013, '2022-05-02', 'April', '2000', '102000', 112),
(14, 14, 1014, '2022-05-05', 'April', '2000', '52000', 113),
(15, 15, 1015, '2022-05-10', 'April', '2000', '102000', 114);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meter_awal` varchar(255) NOT NULL,
  `meter_akhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
(1, 1001, 'Januari', '2022', '1000', '1100'),
(2, 1002, 'Januari', '2022', '500', '550'),
(3, 1003, 'Januari', '2022', '2000', '2050'),
(4, 1004, 'Januari', '2022', '300', '400'),
(5, 1005, 'Februari', '2022', '1200', '1300'),
(6, 1006, 'Februari', '2022', '300', '350'),
(7, 1007, 'Februari', '2022', '2500', '2600'),
(8, 1008, 'Februari', '2022', '400', '450'),
(9, 1009, 'Maret', '2022', '750', '800'),
(10, 1010, 'Maret', '2022', '1500', '1550'),
(11, 1011, 'Maret', '2022', '3200', '3300'),
(12, 1012, 'Maret', '2022', '500', '600'),
(13, 1013, 'April', '2022', '1800', '1900'),
(14, 1014, 'April', '2022', '700', '750'),
(15, 1015, 'April', '2022', '2500', '2600');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_penggunaan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
(1, 1, 1001, 'Januari', '2022', '100', 'Lunas'),
(2, 2, 1002, 'Januari', '2022', '50', 'Lunas'),
(3, 3, 1003, 'Januari', '2022', '50', 'Belum Lunas'),
(4, 4, 1004, 'Januari', '2022', '100', 'Lunas'),
(5, 5, 1005, 'Februari', '2022', '100', 'Lunas'),
(6, 6, 1006, 'Februari', '2022', '50', 'Belum Lunas'),
(7, 7, 1007, 'Februari', '2022', '100', 'Lunas'),
(8, 8, 1008, 'Februari', '2022', '50', 'Lunas'),
(9, 9, 1009, 'Maret', '2022', '50', 'Belum Lunas'),
(10, 10, 1010, 'Maret', '2022', '100', 'Lunas'),
(11, 11, 1011, 'Maret', '2022', '100', 'Lunas'),
(12, 12, 1012, 'Maret', '2022', '100', 'Belum Lunas'),
(13, 13, 1013, 'April', '2022', '100', 'Lunas'),
(14, 14, 1014, 'April', '2022', '50 ', 'Lunas'),
(15, 15, 1015, 'April', '2022', '100', 'Belum Lunas'),
(16, 2, 1001, 'Januari', '2022', '100', 'Belum Lunas'),
(17, 1, 1001, 'Februari', '2023', '300', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `daya` varchar(255) NOT NULL,
  `tarifperkwh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `daya`, `tarifperkwh`) VALUES
(1, '900', '1500'),
(2, '1300', '1700'),
(3, '2200', '2000'),
(4, '3500', '2300'),
(5, '4500', '2600'),
(6, '5500', '3000'),
(7, '6600', '3300'),
(8, '7700', '3600'),
(9, '9000', '4000'),
(10, '10600', '4400'),
(11, '12000', '4800'),
(12, '13600', '5200'),
(13, '15000', '5600'),
(14, '17000', '6000'),
(15, '19000', '6500');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_admin`, `id_level`) VALUES
(1, 'admin1', 'pass_admin1', 'John Doe', 1),
(2, 'admin2', 'pass_admin2', 'Jane Smith ', 2),
(3, 'admin3', 'pass_admin3', 'Michael Johnson', 1),
(4, 'admin4', 'pass_admin4', 'Emily Lee ', 3),
(5, 'admin5', 'pass_admin5', 'David Brown', 2),
(6, 'admin6', 'pass_admin6', 'Sarah Anderson', 1),
(7, 'admin7', 'pass_admin7', 'Robert Wang', 2),
(8, 'admin8', 'pass_admin8', 'Lisa Chen', 3),
(9, 'admin9', 'pass_admin9', 'Kevin Wilson ', 1),
(10, 'admin10 ', 'pass_admin10', 'Jessica Park ', 2),
(11, 'admin11', 'pass_admin11', 'Jason Lee', 1),
(12, 'admin12 ', 'pass_admin12', 'Emma Lee', 3),
(13, 'admin13 ', 'pass_admin13', 'James Johnson', 1),
(14, 'admin14 ', 'pass_admin14', 'Olivia Smith ', 2),
(15, 'admin15 ', 'pass_admin15', 'Ethan Brown', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
