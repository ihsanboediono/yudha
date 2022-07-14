-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 05.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `katasandi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `katasandi`) VALUES
(1, 'Admin', 'admin', '$2y$10$MorhiJ.kY84cil25qXMO.eNGgVu8jujP4WVkEzNJihpKdHt2HAO6a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kayu_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `deskripsi_barang` text DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('Ada','Tidak Ada','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(200) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `status_pengguna` varchar(20) NOT NULL,
  `deskripsi_pengguna` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kepada` int(11) DEFAULT NULL,
  `nama_obat` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(30) DEFAULT NULL,
  `waktu_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  `kembalian` int(10) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kepada`, `nama_obat`, `jumlah`, `total`, `waktu_transaksi`, `status`, `harga`, `kembalian`, `keterangan`) VALUES
(58, NULL, 'Ambroxol', 1, NULL, '2021-09-01', NULL, ' Rp 5.500 ', NULL, NULL),
(59, NULL, 'Amoxcilin', 1, NULL, '2021-09-02', NULL, ' Rp 5.000 ', NULL, NULL),
(60, NULL, 'Cefixime', 1, NULL, '2021-09-03', NULL, ' Rp 40.000 ', NULL, NULL),
(61, NULL, 'Cilo', 1, NULL, '2021-09-04', NULL, ' Rp 6.000 ', NULL, NULL),
(62, NULL, 'Erlimpex (tablet)', 1, NULL, '2021-09-05', NULL, ' Rp 3.000 ', NULL, NULL),
(63, NULL, 'Imboost (tablet)', 1, NULL, '2021-09-06', NULL, ' Rp 41.000 ', NULL, NULL),
(64, NULL, 'Neuralgin', 1, NULL, '2021-09-07', NULL, ' Rp 9.500 ', NULL, NULL),
(65, NULL, 'Ondansetron', 4, NULL, '2021-09-08', NULL, ' Rp 72.000 ', NULL, NULL),
(66, NULL, 'Paracetamol', 1, NULL, '2021-09-09', NULL, ' Rp 28.000 ', NULL, NULL),
(67, NULL, 'Supertetra', 1, NULL, '2021-09-10', NULL, ' Rp 9.000 ', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
