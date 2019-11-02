-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2019 at 04:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_bantu`
--

CREATE TABLE `alat_bantu` (
  `id_bantu` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_material`
--

CREATE TABLE `data_material` (
  `id_material` int(11) NOT NULL,
  `nama_material` varchar(40) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pekerjaan`
--

CREATE TABLE `data_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nm_pekerjaan` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_pekerjaan`
--

INSERT INTO `data_pekerjaan` (`id_pekerjaan`, `nm_pekerjaan`, `jenis`, `keterangan`) VALUES
(2, 'proyek jalan', 'pembangunan jalan', 'pembangunan jalan di kabupaten bogor\r\n'),
(5, 'Galian Tanah', 'Penggalian', 'penggalian tanah di kabupaten bogor');

-- --------------------------------------------------------

--
-- Table structure for table `data_proyek`
--

CREATE TABLE `data_proyek` (
  `id_proyek` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_kontraktor` int(11) NOT NULL,
  `nama_proyek` varchar(15) NOT NULL,
  `no_spk` varchar(30) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `lama` varchar(30) NOT NULL,
  `nilai_kontrak` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_proyek`
--

INSERT INTO `data_proyek` (`id_proyek`, `id_pekerjaan`, `id_kontraktor`, `nama_proyek`, `no_spk`, `lokasi`, `mulai`, `selesai`, `lama`, `nilai_kontrak`) VALUES
(2, 5, 2, 'Pt. Sumber Maju', 'PUEM/001/02/Nov/2019', 'Bogor', '2019-11-09', '2019-11-23', '14 hari', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `kontraktor`
--

CREATE TABLE `kontraktor` (
  `id_kontraktor` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `kepala_proyek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontraktor`
--

INSERT INTO `kontraktor` (`id_kontraktor`, `nama`, `alamat`, `email`, `telepon`, `kepala_proyek`) VALUES
(2, 'PT. Sumber Maju', 'Jl. Parung', 'septe.1991@gmail.com', '0812312312', 'septe habudin'),
(4, 'Pt. Agung Podomoro', 'Grogol', 'apg@apg.com', '212212112', 'jhon');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_proyek`
--

CREATE TABLE `pengeluaran_proyek` (
  `id_pengeluaran` int(11) NOT NULL,
  `kode_pengeluaran` varchar(15) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE `rab` (
  `id_rab` int(11) NOT NULL,
  `kode_rab` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `upah` int(11) NOT NULL,
  `material` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`id_rab`, `kode_rab`, `tanggal`, `id_proyek`, `upah`, `material`, `fee`, `total`, `ppn`, `grand_total`) VALUES
(1, 'RAB/001/021119', '2019-11-02', 2, 20000000, 200000000, 2000000, 222000000, 90, 199800000);

-- --------------------------------------------------------

--
-- Table structure for table `serah_terima`
--

CREATE TABLE `serah_terima` (
  `id_terima` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `id_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_bantu` int(11) NOT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `jenis`, `alamat`, `hp`, `fax`, `email`) VALUES
(3, 'septe', 'Baja Ringan', 'jl Panajang no.28 Parung-Bogor', '08124213212', '(021) 08234', 'septe.1991@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','owner','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `username`, `alamat`, `tanggal_lahir`, `password`, `level`) VALUES
(1, 'Ahmad', 'Faidzin', 'Ahmadfaizin@unpam.ac.id', 'ahmad', 'Kp.Pabuaran Rt.03/05', '2019-08-01', '$2y$10$Kj4XzDLX50RjAbv1cGkvkOgSI7SC4SDjQ0NAsB.g8sJ.vwfGajp8O', 'admin'),
(2, 'Dede', 'nanang', 'dedenanang@gmail.com', 'denang', 'Kp.Pabuaran Rt.03/05', '2019-08-03', '$2y$10$aQDYW5JFs1AHwcheFonOquQadjWupVllMuUZtfFLaNQhf5D9moRsy', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_bantu`
--
ALTER TABLE `alat_bantu`
  ADD PRIMARY KEY (`id_bantu`);

--
-- Indexes for table `data_material`
--
ALTER TABLE `data_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `data_proyek`
--
ALTER TABLE `data_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `kontraktor`
--
ALTER TABLE `kontraktor`
  ADD PRIMARY KEY (`id_kontraktor`);

--
-- Indexes for table `pengeluaran_proyek`
--
ALTER TABLE `pengeluaran_proyek`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`id_rab`);

--
-- Indexes for table `serah_terima`
--
ALTER TABLE `serah_terima`
  ADD PRIMARY KEY (`id_terima`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_bantu`
--
ALTER TABLE `alat_bantu`
  MODIFY `id_bantu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_material`
--
ALTER TABLE `data_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_proyek`
--
ALTER TABLE `data_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontraktor`
--
ALTER TABLE `kontraktor`
  MODIFY `id_kontraktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran_proyek`
--
ALTER TABLE `pengeluaran_proyek`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rab`
--
ALTER TABLE `rab`
  MODIFY `id_rab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serah_terima`
--
ALTER TABLE `serah_terima`
  MODIFY `id_terima` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
