-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 01:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'febriana@gmail.com', 'febri', 'febriana');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `tarif`) VALUES
(1, 'boyolali', 27000),
(2, 'jakarta', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon`) VALUES
(1, 'febriana@gmail.com', 'febri', 'febriana', '085600904001');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `kota`, `tarif`, `alamat`) VALUES
(1, 1, 1, '2020-01-19', 100000, '0', 0, ''),
(2, 1, 2, '2020-01-24', 158000, '0', 0, ''),
(3, 1, 0, '2020-01-24', 150000, '0', 0, ''),
(4, 1, 1, '2020-01-24', 177000, '0', 0, ''),
(5, 1, 2, '2020-01-24', 158000, '0', 0, ''),
(6, 1, 0, '2020-01-24', 450000, '0', 0, ''),
(7, 1, 1, '2020-01-24', 127000, '0', 0, ''),
(8, 1, 1, '2020-01-24', 677000, 'boyolali', 27000, ''),
(9, 1, 1, '2020-01-24', 302000, 'boyolali', 27000, 'Kuncen, doplang, teras, boyolali, jateng 57372'),
(10, 1, 1, '2020-01-24', 377000, 'boyolali', 27000, 'kuncen, doplang, teras, boyolali\r\n'),
(11, 1, 1, '2020-02-05', 452000, 'boyolali', 27000, 'kuncen 06/03, doplang, teras, boyolali'),
(12, 1, 1, '2020-04-18', 177000, 'boyolali', 27000, 'Boyolali');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 5, '', 0, 0, 0, 0),
(2, 4, 13, 1, '', 0, 0, 0, 0),
(3, 5, 13, 1, '', 0, 0, 0, 0),
(4, 6, 7, 1, '', 0, 0, 0, 0),
(5, 6, 9, 1, '', 0, 0, 0, 0),
(6, 6, 13, 1, '', 0, 0, 0, 0),
(7, 7, 7, 1, 'Blus', 100000, 200, 200, 100000),
(8, 8, 14, 1, 'Sepatu', 500000, 750, 750, 500000),
(9, 8, 7, 1, 'Blus', 150000, 200, 200, 150000),
(10, 9, 8, 1, 'Celana Pendek', 75000, 250, 250, 75000),
(11, 9, 9, 1, 'Celana Panjang', 200000, 500, 500, 200000),
(12, 10, 7, 1, 'Blus', 150000, 200, 200, 150000),
(13, 10, 9, 1, 'Celana Panjang', 200000, 500, 500, 200000),
(14, 11, 7, 1, 'Blus', 150000, 200, 200, 150000),
(15, 11, 8, 1, 'Celana Pendek', 75000, 250, 250, 75000),
(16, 11, 9, 1, 'Celana Panjang', 200000, 500, 500, 200000),
(17, 12, 7, 1, 'Blus', 150000, 200, 200, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(7, 'Blus', 150000, 200, 'blus.jpg', 'Blus Lucu'),
(8, 'Celana Pendek', 75000, 250, 'celana pendek.jpg', 'Celana Jeans Pendek'),
(9, 'Celana Panjang', 200000, 500, 'celana panjang.webp', 'Celana panjang warna maroon bahan jeans'),
(10, 'Kaos', 50000, 100, 'kaos.jpg', 'Kaos korea warna pink'),
(11, 'Gamis', 200000, 500, 'gamis.jpg', 'Gamis muslimah warna hitam dengan garis putih dibawah'),
(13, 'Flatshoes', 150000, 450, 'flatshoes.jpg', 'Flatshoes hitam'),
(14, 'Sepatu', 500000, 750, 'sepatu.jpg', 'Sepatu running merk adidas\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
