-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2022 pada 04.08
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siipm`
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

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kayu_id`, `jenis_id`, `harga`, `deskripsi_barang`, `stok`, `status`) VALUES
(12, 17, 24, 80000, 'Bahan Lemari', 60, 'Ada'),
(13, 15, 14, 14000, 'Atap', 339, 'Ada'),
(22, 17, 1, 250000, 'Atap', 10, 'Ada'),
(23, 19, 19, 10000, 'Bahan cor', 100, 'Ada'),
(24, 23, 19, 10000, 'Bahan cor', 10, 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idbarang_keluar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `tanggal_keluar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbarang_masuk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `transaksi_id`, `barang_id`, `jumlah`, `total`) VALUES
(59, 51, 13, 200, 2800000),
(60, 52, 23, 200, 2000000),
(61, 53, 24, 200, 2000000),
(62, 54, 24, 10, 100000),
(63, 54, 12, 10, 800000),
(64, 55, 23, 100, 1000000),
(65, 56, 24, 200, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `deskripsi_jenis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `deskripsi_jenis`) VALUES
(1, 'Blandar 8x12cm 3m', 'Panjang 3m ukuran 8x12cm'),
(9, 'Blandar 8x12cm 3,5m', 'Panjang 3,5m ukuran 8x12cm'),
(10, 'Blandar 8x12cm 4m', 'Panjang 4m ukuran 8x12cm'),
(11, 'Blandar 8x14cm 3m', 'Panjang 3m ukuran 8x14cm'),
(12, 'Blandar 8x14cm 3,5m', 'Panjang 3,5m ukuran 8x14cm'),
(13, 'Blandar 8x14cm 4m', 'Panjang 4m ukuran 8x14cm'),
(14, 'Usuk 2m', 'Panjang 2m ukuran 4x6cm'),
(15, 'Usuk 2,5m', 'Panjang 2,5m ukuran 4x6cm'),
(16, 'Usuk 3m', 'Panjang 3m ukuran 4x6cm'),
(17, 'Usuk 4m', 'Panjang 4m ukuran 4x6cm'),
(18, 'Papan 12cm', 'Lebar 12cm'),
(19, 'Papan 20cm', 'Lebar 20cm'),
(20, 'Papan Utuh 2cm', 'Lebar 20cm tebal 2cm'),
(21, 'Reng ', 'Per ikat total panjang 50m'),
(22, 'Kusen 1,5m', 'Panjang 1,5m'),
(23, 'Kusen 2m', 'Panjang 2m'),
(24, 'Galur 2m', 'Panjang 2m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kayu`
--

CREATE TABLE `kayu` (
  `id_kayu` int(11) NOT NULL,
  `nama_kayu` varchar(50) NOT NULL,
  `deskripsi_kayu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kayu`
--

INSERT INTO `kayu` (`id_kayu`, `nama_kayu`, `deskripsi_kayu`) VALUES
(15, 'Akasia', 'Kelas 1'),
(17, 'Jati ', 'Kelas 1'),
(19, 'Sengon Jawa', 'Kelas 1'),
(20, 'Sengon Laut', 'Kelas 1'),
(21, 'Mahoni', 'Kelas 2'),
(22, 'Gembilina', 'Kelas 1'),
(23, 'Trembesi', 'Bahan cor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
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

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat`, `no_telp`, `status_pengguna`, `deskripsi_pengguna`) VALUES
(9, 'Alvian Harisnur', 'Krendetan Kidul', '085600291962', 'konsumen', NULL),
(11, 'Pak Haris', 'Krendetan Kidul', '085600291962', 'pemasok', 'Jati'),
(13, 'Pak Alvian', 'Karangtengah', '081329123456', 'pemasok', 'Gembilina'),
(14, 'Handoyo', 'Tirtomoyo', '081234567890', 'konsumen', NULL),
(16, 'Pak Sigit', 'Krendetan Kidul', '085600291962', 'pemasok', 'Sengon Laut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kepada` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(30) DEFAULT NULL,
  `waktu_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT NULL,
  `nominal` int(20) DEFAULT NULL,
  `kembalian` int(10) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kepada`, `type`, `jumlah`, `total`, `waktu_transaksi`, `status`, `nominal`, `kembalian`, `keterangan`) VALUES
(51, 11, 'masuk', 200, 2800000, '2022-01-22', 'selesai', 2800000, 0, 'lunas'),
(52, 11, 'masuk', 200, 2000000, '2022-01-22', 'selesai', 2000000, 0, 'lunas'),
(53, 11, 'masuk', 200, 2000000, '2022-01-22', 'selesai', 2000000, 0, 'lunas'),
(54, 11, 'masuk', 20, 900000, '2022-01-22', 'selesai', 1000000, 100000, 'lunas'),
(55, 9, 'keluar', 100, 1000000, '2022-01-22', 'selesai', 1000000, 0, 'lunas'),
(56, 9, 'keluar', 200, 2000000, '2022-01-22', 'selesai', 2000000, 0, 'lunas');

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
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kayu_id` (`kayu_id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`idbarang_keluar`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idbarang_masuk`),
  ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kayu`
--
ALTER TABLE `kayu`
  ADD PRIMARY KEY (`id_kayu`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `idbarang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `idbarang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kayu`
--
ALTER TABLE `kayu`
  MODIFY `id_kayu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kayu_id`) REFERENCES `kayu` (`id_kayu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`);

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
