-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Nov 2024 pada 09.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuanki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(255) DEFAULT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `meja` varchar(255) DEFAULT NULL,
  `pelayan` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `waktu_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `kode_order`, `pelanggan`, `meja`, `pelayan`, `status`, `waktu_order`) VALUES
(12, 'ORD-1731225128', 'sam', '1', 1, 'Menunggu', '2024-11-09 07:52:08'),
(13, 'ORD-1731225142', 'kipli', '1', 1, 'Menunggu', '2024-11-09 07:52:08'),
(14, 'ORD-1731225157', 'aldi', '2', 1, 'Selesai', '2024-11-09 07:52:08'),
(15, 'ORD-1731225166', 'aldi', '1', 1, 'Selesai', '2024-11-09 07:52:46'),
(16, 'ORD-1731225174', 'alda', '3', 1, 'Selesai', '2024-11-10 07:52:54'),
(17, 'ORD-1731225206', 'alda', '3', 1, 'Selesai', '2024-11-10 07:53:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id_detail`, `id_order`, `id_menu`, `nama_menu`, `harga`, `jumlah`, `catatan`, `pelanggan`) VALUES
(12, 12, 83, 'Bakso Aci Komplit', '10.00', 2, '', 'sam'),
(13, 13, 85, 'Burger', '20.00', 3, '', 'sam'),
(14, 14, 95, 'cyber army', '60.00', 1, '', 'aldi'),
(15, 15, 85, 'Burger', '20.00', 2, '', 'aldi'),
(16, 16, 96, 'mie ayam', '50.00', 1, '', 'alda'),
(17, 17, 86, 'Opor', '30.00', 4, '', 'alda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_per_menu`
--

CREATE TABLE `penjualan_per_menu` (
  `id_penjualan` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `total_penjualan` decimal(10,2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_menu`
--

CREATE TABLE `tb_daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` int(5) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_daftar_menu`
--

INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(83, '1.png', 'Bakso Aci Komplit', 'A', 1, 10, '5'),
(85, '2.png', 'Burger', 'B', 2, 20, '10'),
(86, '3.png', 'Opor', 'C', 1, 30, '10'),
(95, '27642-WhatsApp Image 2024-10-30 at 01.11.42.jpeg', 'cyber army', 'teh', 3, 60, '64756'),
(96, '68354-6.png', 'mie ayam', 'dhtfdjt', 2, 50, '424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_menu`
--

CREATE TABLE `tb_kategori_menu` (
  `id_kat_menu` int(11) NOT NULL,
  `jenis_menu` int(11) NOT NULL,
  `kategori_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_menu`
--

INSERT INTO `tb_kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
(1, 1, 'Nasi'),
(2, 1, 'Snack'),
(3, 2, 'Jus'),
(4, 2, 'Kopi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `alamat`, `level`, `nama`, `nohp`) VALUES
(74, 'abc3@abc.com', 'aabbcc33', '', 3, 'abc3', 0),
(81, 'abc1@abc.com', 'password', 'hbjhbhb', 1, 'abc1', 876767),
(82, 'abc2@abc.com', 'aabbcc22', 'kjbnjknbkb', 0, 'abc2', 868787),
(89, 'cwecewc', 'ececefc', 'ecfc', 2, 'efcefc', 34355353),
(92, 'flt1@gmail.com', 'fflltt11', 'xdvsdvbsrb', 2, 'flt1', 374891);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `penjualan_per_menu`
--
ALTER TABLE `penjualan_per_menu`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  ADD PRIMARY KEY (`id_kat_menu`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `penjualan_per_menu`
--
ALTER TABLE `penjualan_per_menu`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  MODIFY `id_kat_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `tb_daftar_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan_per_menu`
--
ALTER TABLE `penjualan_per_menu`
  ADD CONSTRAINT `penjualan_per_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tb_daftar_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD CONSTRAINT `tb_daftar_menu_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kat_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
