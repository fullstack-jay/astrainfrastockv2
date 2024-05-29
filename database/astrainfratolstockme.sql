-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2024 pada 06.40
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
-- Database: `astrainfratolstockme`
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
('http://localhost/astrainfratolstock/', '3000', 'Aplikasi Stok Aset Astra Infra Solutions', '3', '0', 'Astra Infra Solutions', 0, 'dist/img/astra.jfif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(10) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hargasatuanaset` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `asetmasuk` int(11) NOT NULL,
  `asetkeluar` int(11) NOT NULL,
  `sisa` int(10) NOT NULL,
  `no` int(10) NOT NULL,
  `stokmin` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode`, `sku`, `nama`, `hargasatuanaset`, `keterangan`, `kategori`, `asetmasuk`, `asetkeluar`, `sisa`, `no`, `stokmin`, `brand`) VALUES
('000001', 'ME-LMP-01', 'Ini Barang 07', 70000, '', '0003', 10, 0, 136, 162, 1, ''),
('000003', 'WS-', '', 0, '', 'IT', 0, 0, 0, 164, 1, ''),
('000006', 'WS-', '', 0, '', 'ME', 0, 0, 0, 167, 1, 'Logitech');

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
('0002', 'Barang Workshop Nih', 2),
('0003', 'Test Merk Update', 3),
('0004', 'Barang ME Nih', 4);

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
('admin', '2', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('demo', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', ''),
('kassa', '0', '3', '0', '0', '0', '5', '5', '2', '0', '0', ''),
('Staff', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');

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
('0002', 'user', 32);

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
('0004', 'Test Update', 6);

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
('0001', '2024-02-23', 'Toko Jagodigital', 'jln bersama', '083190781585', 1);

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
('admin1', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Rizqi Reza Ardiansyah', 'Villa Balaraja Blok L3 No.06 RT/RW 001/006 Desa Saga Kecamatan Balaraja Kabuaten Tangerang. Banten', '085156811979', '2000-06-04', '2024-05-07', 'admin', 'dist/upload/reza.jfif', 1),
('admin2', 'e4df782e9185732c1bb3efcf052a21d4c11c605f', 'admin2', 'admin2', 'admin2', '2021-08-24', '2021-08-24', 'admin', 'dist/upload/index.jpg', 20),
('user', '22a44e2ff721590111588f73cbb865dd8079d9ab', 'user1', 'User ', '021827282172', '2022-07-05', '2022-07-26', 'kassa', 'dist/upload/win ad0b.jpg', 21);

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
  ADD PRIMARY KEY (`no`);

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
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
