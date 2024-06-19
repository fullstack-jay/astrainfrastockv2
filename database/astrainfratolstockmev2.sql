-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 10.33
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
('01', '01', 'PRINTER', 'contoh', 'IT', 74, 17, 49, 158, 10, 'HP', 'L1250', 'Rizqi Reza Ardiansya'),
('02', '02', 'HARDDISK', 'contoh', 'IT', 42, 4, 27, 159, 10, 'SEAGATE', '1 TB', 'Rizqi Reza Ardiansya'),
('0001', '0001', 'PALANG ALB', 'contoh', 'WS', 24, 4, 16, 160, 12, 'TRANSPEED', 'CARBON', 'Rizqi Reza Ardiansya'),
('0002', '0002', 'BLOWER', 'contoh', 'WS', 33, 0, 20, 161, 11, 'MAKITA', 'POLYTRON', 'Rizqi Reza Ardiansya'),
('001', '001', 'LAMPU PJU', 'contoh', 'ME', 50, 0, 30, 162, 15, 'PHILIPS', 'LED 100 WATT ubah', 'Rizqi Reza Ardiansya'),
('002', '002', 'KABEL POWER', 'satuan roll meter (50)', 'ME', 30, 0, 12, 163, 10, 'ETERNA', 'NYY', 'Rizqi Reza Ardiansya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `nota` varchar(20) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `tglbayar` date DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `keluar` int(11) DEFAULT NULL,
  `kasir` varchar(100) DEFAULT NULL,
  `customer` varchar(50) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`nota`, `kode`, `tglbayar`, `bayar`, `total`, `kembali`, `keluar`, `kasir`, `customer`, `no`) VALUES
('00001', '00001', '2024-02-23', 35000, 35000, 0, 30000, 'admin', 'Umum', 1),
('00002', '00002', '2024-02-26', 175000, 175000, 0, 150000, 'admin', 'Umum', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `nota` varchar(20) NOT NULL,
  `tglbeli` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `supplier` varchar(20) DEFAULT NULL,
  `kasir` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`nota`, `tglbeli`, `total`, `supplier`, `kasir`, `keterangan`, `no`) VALUES
('00001', '2024-02-23', 30000, '0001', 'admin', '', 1),
('00002', '2024-02-23', 450000, '0001', 'admin', '', 2),
('00003', '2024-02-26', 750000, '0001', 'admin', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`kode`, `nama`, `no`) VALUES
('0001', 'Logitech', 1),
('0002', 'LG', 2),
('0003', 'SONT', 3),
('0004', 'PDIP', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chmenu`
--

CREATE TABLE `chmenu` (
  `userjabatan` varchar(20) NOT NULL,
  `menu1` varchar(1) DEFAULT '0',
  `menu2` varchar(1) DEFAULT '0',
  `menu3` varchar(1) DEFAULT '0',
  `menu4` varchar(1) DEFAULT '0',
  `menu5` varchar(1) DEFAULT '0',
  `menu6` varchar(1) DEFAULT '0',
  `menu7` varchar(1) DEFAULT '0',
  `menu8` varchar(1) DEFAULT '0',
  `menu9` varchar(1) DEFAULT '0',
  `menu10` varchar(1) DEFAULT '0',
  `menu11` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chmenu`
--

INSERT INTO `chmenu` (`userjabatan`, `menu1`, `menu2`, `menu3`, `menu4`, `menu5`, `menu6`, `menu7`, `menu8`, `menu9`, `menu10`, `menu11`) VALUES
('admin', '2', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode` varchar(20) NOT NULL,
  `tgldaftar` date DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `nama` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`nama`, `avatar`, `tanggal`, `isi`, `id`) VALUES
('Rizqi Reza Ardiansyah', 'dist/upload/reza.jfif', '2024-05-09', '<h1>Pengumuman Baru:</h1><p>Jangan Lupa Selalu di Cek yaa stoknya<br></p>', 1);

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode`, `nama`, `no`) VALUES
('0002', 'IT', 2),
('0003', 'ME', 3),
('0004', 'WS', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `kode` varchar(20) NOT NULL,
  `nota` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `kasir` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operasional`
--

INSERT INTO `operasional` (`kode`, `nota`, `nama`, `tanggal`, `biaya`, `keterangan`, `kasir`, `no`) VALUES
('000001', 'KAS000001', 'Sewa Toko', '2024-02-23', 500000, 'oke', 'admin', 1),
('000002', 'KAS000002', 'Pembelian Token Listrik Toko', '2024-02-26', 200000, '', 'admin', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pin`
--

CREATE TABLE `pin` (
  `pin` varchar(255) NOT NULL,
  `ubah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pin`
--

INSERT INTO `pin` (`pin`, `ubah`) VALUES
('10470c3b4b1fed12c3baac014be15fac67c6e815', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode` varchar(20) NOT NULL,
  `tgldaftar` date DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode`, `tgldaftar`, `nama`, `alamat`, `nohp`, `no`) VALUES
('0001', '2024-02-23', 'Reza Ganteng', 'jln bersama', '083190781585', 1);

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
(75, 'Rizqi Reza Ardiansyah', 'PRINTER', 'IT', 'HP', 'L1250', 2, 0, 49, '2024-06-19 15:30:31', './dist/img/gambaraset/e147d8626ea0b0eee5aabd6ee92b6d0e.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksibeli`
--

CREATE TABLE `transaksibeli` (
  `nota` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `hargaakhir` int(11) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksibeli`
--

INSERT INTO `transaksibeli` (`nota`, `kode`, `nama`, `harga`, `jumlah`, `hargaakhir`, `no`) VALUES
('00001', '000001', 'Mouse', 30000, 1, 30000, 1),
('00002', '000001', 'Mouse', 30000, 15, 450000, 2),
('00003', '000002', 'Keyboard', 15000, 50, 750000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksimasuk`
--

CREATE TABLE `transaksimasuk` (
  `nota` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `hargabeli` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `hargaakhir` int(11) DEFAULT NULL,
  `hargabeliakhir` int(11) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksimasuk`
--

INSERT INTO `transaksimasuk` (`nota`, `kode`, `nama`, `harga`, `hargabeli`, `jumlah`, `hargaakhir`, `hargabeliakhir`, `no`) VALUES
('00001', '000001', 'Mouse', 35000, 30000, 1, 35000, 30000, 1),
('00002', '000001', 'Mouse', 35000, 30000, 5, 175000, 150000, 2),
('00003', '000002', 'Keyboard', 20000, 15000, 4, 80000, 60000, 3);

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
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `no` (`no`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `no` (`no`);

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no4` (`no`);

--
-- Indeks untuk tabel `chmenu`
--
ALTER TABLE `chmenu`
  ADD PRIMARY KEY (`userjabatan`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no3` (`no`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no4` (`no`);

--
-- Indeks untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`);

--
-- Indeks untuk tabel `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`ubah`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no3` (`no`);

--
-- Indeks untuk tabel `transaksiaset`
--
ALTER TABLE `transaksiaset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksibeli`
--
ALTER TABLE `transaksibeli`
  ADD PRIMARY KEY (`nota`,`kode`),
  ADD KEY `no` (`no`),
  ADD KEY `username` (`kode`),
  ADD KEY `kdbarang` (`harga`);

--
-- Indeks untuk tabel `transaksimasuk`
--
ALTER TABLE `transaksimasuk`
  ADD PRIMARY KEY (`nota`,`kode`),
  ADD KEY `barang` (`nama`),
  ADD KEY `no5_2` (`no`);

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
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `operasional`
--
ALTER TABLE `operasional`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksiaset`
--
ALTER TABLE `transaksiaset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `transaksibeli`
--
ALTER TABLE `transaksibeli`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksimasuk`
--
ALTER TABLE `transaksimasuk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
