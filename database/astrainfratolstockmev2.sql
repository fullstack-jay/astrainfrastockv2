-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2024 pada 06.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astrainfratolstockmev2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `backset`
--

CREATE TABLE `backset` (
  `url` varchar(100) NOT NULL,
  `sessiontime` varchar(4) DEFAULT NULL,
  `footer` varchar(50) DEFAULT NULL,
  `themesback` varchar(2) DEFAULT NULL,
  `responsive` varchar(2) DEFAULT NULL,
  `namabisnis1` tinytext NOT NULL,
  `demo` int(1) NOT NULL,
  `loginbg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `backset`
--

INSERT INTO `backset` (`url`, `sessiontime`, `footer`, `themesback`, `responsive`, `namabisnis1`, `demo`, `loginbg`) VALUES
('http://localhost/astrainfratolstock', '3000', 'Aplikasi Stok Aset Astra Infra Solutions', '2', '1', 'Astra Infra Solutions', 0, 'dist/img/astra.jfif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(10) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `asetmasuk` int(11) NOT NULL,
  `asetkeluar` int(11) NOT NULL,
  `sisa` int(10) NOT NULL,
  `no` int(10) NOT NULL,
  `stokmin` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode`, `sku`, `nama`, `keterangan`, `kategori`, `asetmasuk`, `asetkeluar`, `sisa`, `no`, `stokmin`, `brand`, `jenis`, `nama_lengkap`) VALUES
('01', '01', 'PRINTER', 'contoh', 'IT', 75, 17, 50, 158, 10, 'HP', 'L1250', 'Rizqi Reza Ardiansya'),
('02', '02', 'HARDDISK', 'contoh', 'IT', 46, 15, 20, 159, 10, 'SEAGATE', '1 TB', 'Rizqi Reza Ardiansya'),
('0001', '0001', 'PALANG ALB', 'contoh', 'WS', 32, 12, 16, 160, 12, 'TRANSPEED', 'CARBON', 'Rizqi Reza Ardiansya'),
('0002', '0002', 'BLOWER', 'contoh', 'WS', 39, 0, 26, 161, 11, 'MAKITA', 'POLYTRON', 'Rizqi Reza Ardiansya'),
('001', '001', 'LAMPU PJU', 'contoh', 'ME', 50, 0, 30, 162, 15, 'PHILIPS', 'LED 100 WATT ubah', 'Rizqi Reza Ardiansya'),
('002', '002', 'KABEL POWER', 'satuan roll meter (50)', 'ME', 30, 0, 12, 163, 10, 'ETERNA', 'NYY', 'Rizqi Reza Ardiansya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `nama` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `avatar` varchar(150) NOT NULL,
  `app` varchar(100) NOT NULL,
  `co` varchar(100) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`nama`, `tagline`, `alamat`, `notelp`, `signature`, `avatar`, `app`, `co`, `no`) VALUES
('PT Astra Infra Solutions', 'Advancing the Nation\'s Infrastructure', 'Menara Astra Lt. 11, Jl. Jenderal Sudirman, Kav. 5-6,\r\nJakarta Pusat, DKI Jakarta 10250', '021 5082 1982', '', 'dist/img/astra.jfif', 'PT Astra Infra Solutions', 'PT Astra Infra Solutions', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kode`, `nama`, `no`) VALUES
('0001', 'admin', 30),
('0002', 'user', 32),
('0003', 'pic', 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksiaset`
--

CREATE TABLE `transaksiaset` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `asetmasuk` int(11) NOT NULL,
  `asetkeluar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `image_data` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksiaset`
--

INSERT INTO `transaksiaset` (`id`, `nama_lengkap`, `nama_barang`, `kategori`, `brand`, `jenis`, `asetmasuk`, `asetkeluar`, `sisa`, `timestamp`, `image_data`) VALUES
(93, '', 'PALANG ALB', 'WS', 'TRANSPEED', 'CARBON', 0, 2, 16, '2024-06-19 16:21:28', './dist/img/gambaraset/c00982cb0b490461cc45e3b29d470056.jpg'),
(94, 'Rizqi Reza Ardiansyah', 'PRINTER', 'IT', 'HP', 'L1250', 1, 0, 50, '2024-06-21 11:07:53', './dist/img/gambaraset/944649f99b4b6a6ade90ef2bbbca94c7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userna_me` varchar(20) NOT NULL,
  `pa_ssword` varchar(70) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglaktif` date DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userna_me`, `pa_ssword`, `nama`, `alamat`, `nohp`, `tgllahir`, `tglaktif`, `jabatan`, `avatar`, `no`) VALUES
('admin1', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Rizqi Reza Ardiansyah', 'Villa Balaraja Blok L3 No.06 RT/RW 001/006 Desa Saga Kecamatan Balaraja Kabuaten Tangerang. Banten', '085156811979', '2000-06-04', '2024-05-11', 'admin', 'dist/upload/reza.jfif', 1),
('rizqi', 'a0e056ac5850b9aab92a6ca7787d9a27b535d5c2', 'Irza', 'Villa Balaraja Blok L3 No.06 RT/RW 001/006 Desa Saga Kecamatan Balaraja Kabuaten Tangerang. Banten', '085156811979', '2017-06-04', '2024-06-13', 'pic', 'dist/upload/index.jpg', 26),
('Saefudin', 'f1ca877f0ba9016793684cf3548c21b1fa9eadc5', 'Saefudin Maulana', 'Villa Balaraja Blok L3 No.06 RT/RW 001/006 Desa Saga Kecamatan Balaraja Kabuaten Tangerang. Banten', '0851232323', '0000-00-00', '2024-06-10', 'user', 'dist/upload/index.jpg', 27);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `backset`
--
ALTER TABLE `backset`
  ADD PRIMARY KEY (`url`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kode` (`kode`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`);

--
-- Indeks untuk tabel `transaksiaset`
--
ALTER TABLE `transaksiaset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userna_me`),
  ADD KEY `no` (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `transaksiaset`
--
ALTER TABLE `transaksiaset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_old_transactions` ON SCHEDULE EVERY 1 DAY STARTS '2024-06-13 13:36:10' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM transaksiaset
  WHERE timestamp < NOW() - INTERVAL 12 MONTH$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
