-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 04:08 PM
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Bawahan'),
(3, 'Dress'),
(4, 'Sepatu'),
(5, 'Aksesoris'),
(6, 'Makanan'),
(8, 'Atasan');

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
  `telepon` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon`, `alamat_pelanggan`) VALUES
(1, 'febriana@gmail.com', 'febri', 'febriana', '085600904001', ''),
(2, 'davidyudhawibantara@gmail.com', 'david123', 'David', '085826692623', 'Klaten');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 11, 'Febri', 'BRI', 452000, '2020-04-20', '20200420062321377729.jpg'),
(3, 15, 'Febriana', 'BNI', 452000, '2020-05-01', '20200501160318logo ugm.png'),
(4, 16, 'Febriana', 'BNI', 327, '2020-05-02', '20200502090421btn logout.PNG');

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
  `alamat` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `kota`, `tarif`, `alamat`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 2, 1, '2020-01-19', 100000, '0', 0, '', 'pending', ''),
(3, 2, 0, '2020-01-24', 150000, '0', 0, '', 'pending', ''),
(6, 2, 0, '2020-01-24', 450000, '0', 0, '', 'pending', ''),
(10, 2, 1, '2020-01-24', 377000, 'boyolali', 27000, 'kuncen, doplang, teras, boyolali\r\n', 'pending', ''),
(11, 1, 1, '2020-02-05', 452000, 'boyolali', 27000, 'kuncen 06/03, doplang, teras, boyolali', 'barang dikirim', 'J2342168AXT'),
(12, 1, 1, '2020-04-18', 177000, 'boyolali', 27000, 'Boyolali', 'pending', ''),
(13, 1, 1, '2020-04-20', 477000, 'boyolali', 27000, 'boyolali', 'pending', ''),
(14, 1, 2, '2020-04-20', 208000, 'jakarta', 8000, 'Jakarta Selatan', 'pending', ''),
(15, 1, 1, '2020-05-01', 452000, 'boyolali', 27000, 'Boyolali', 'Sudah kirim bukti pembayaran', ''),
(16, 1, 1, '2020-05-02', 327000, 'boyolali', 27000, 'Teras, Boyolali, Jawa Tengah', 'Sudah kirim bukti pembayaran', '');

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
(17, 12, 7, 1, 'Blus', 150000, 200, 200, 150000),
(18, 13, 7, 3, 'Blus', 150000, 200, 600, 450000),
(19, 14, 11, 1, 'Gamis', 200000, 500, 500, 200000),
(20, 15, 7, 1, 'Blus Pink', 150000, 200, 200, 150000),
(21, 15, 8, 1, 'Celana Pendek', 75000, 250, 250, 75000),
(22, 15, 9, 1, 'Celana Panjang', 200000, 500, 500, 200000),
(23, 16, 7, 1, 'Blus Pink', 150000, 200, 200, 150000),
(24, 16, 8, 2, 'Celana Pendek', 75000, 250, 500, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(7, 8, 'Blus Pink', 150000, 200, 'blus.jpg', 'Blus Lucu   ', 0),
(8, 2, 'Celana Pendek', 75000, 250, 'celana pendek.jpg', 'Celana Jeans Pendek', 2),
(9, 2, 'Celana Panjang', 200000, 500, 'celana panjang.webp', 'Celana panjang warna maroon bahan jeans', 4),
(10, 8, 'Kaos', 50000, 100, 'kaos.jpg', 'Kaos korea warna pink  ', 5),
(11, 3, 'Gamis', 200000, 500, 'gamis.jpg', 'Gamis muslimah warna hitam dengan garis putih dibawah', 4),
(13, 4, 'Flatshoes', 150000, 450, 'flatshoes.jpg', 'Flatshoes hitam', 5),
(14, 4, 'Sepatu', 500000, 750, 'sepatu.jpg', 'Sepatu running merk adidas\r\n', 5),
(16, 3, 'Midi Dress Floral', 150000, 500, '2020_01_06-15_24_09_ff524cff14f28b7b6d616675dc20daf3_960x640_thumb.jpg', 'Perpaduan corak floral dan warna peach yang memanjakan mata ', 0),
(17, 4, 'Sepatu Luhut', 3000000, 2000, '1680a528-87b0-48b8-9fde-85965c16da23.jpeg', 'Sepatu berisi dosa ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(1, 17, '2020_01_06-15_24_09_ff524cff14f28b7b6d616675dc20daf3_960x640_thumb.jpg'),
(2, 17, '2019_12_27-10_15_11_f5d6e8bc39a770c8138449eecae6153d_960x640_thumb.jpg'),
(3, 17, '1109793e-6d1a-4ec8-a746-d12b2fee4007_43.jpeg'),
(4, 18, '2020_01_06-15_24_09_ff524cff14f28b7b6d616675dc20daf3_960x640_thumb.jpg'),
(5, 18, '2019_12_27-10_15_11_f5d6e8bc39a770c8138449eecae6153d_960x640_thumb.jpg'),
(6, 18, '1109793e-6d1a-4ec8-a746-d12b2fee4007_43.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

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
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
