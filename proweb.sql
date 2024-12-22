-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 01:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ADMIN', 'admin@gmail.com', '$2y$10$KKxjm2TlPluXhzFgA8n56eDcdT53nnlyTZScMfqTith4oqaAwMF9S', NULL, NULL, NULL),
(2, 'meylin', 'meylinsinaga73@gmail.com', '$2y$10$5nWvJHddY0cFelrzz2xWKO4v6B.Fl.YhjgBeK3mzXRARKR9XsxHge', '2024-11-26 14:13:45', '2024-12-09 02:18:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akomodasi`
--

CREATE TABLE `akomodasi` (
  `id_akomodasi` int(11) NOT NULL,
  `nama_akomodasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga_per_malam` decimal(10,0) NOT NULL,
  `fasilitas` text NOT NULL,
  `kontak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `tipe_media` varchar(10) NOT NULL,
  `url_media` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_budaya`
--

CREATE TABLE `informasi_budaya` (
  `id_budaya` int(11) NOT NULL,
  `nama_budaya` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_acara` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kategori` enum('upacara','baju_adat','festival','rumah_adat','tari_tradisional') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tipe_kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas_admin`
--

CREATE TABLE `log_aktivitas_admin` (
  `id_log` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `aktivitas` varchar(50) NOT NULL,
  `id_target` int(11) NOT NULL,
  `tabel_target` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-11-22-041327', 'App\\Database\\Migrations\\KategoriProduk', 'default', 'App', 1732249220, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_layanan`
--

CREATE TABLE `pesanan_layanan` (
  `id_pesanan` varchar(150) NOT NULL,
  `id` varchar(25) DEFAULT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `qty_anak` varchar(10) DEFAULT NULL,
  `qty_dewasa` varchar(10) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `tgl_datang` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `snap` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan_layanan`
--

INSERT INTO `pesanan_layanan` (`id_pesanan`, `id`, `id_wisata`, `qty_anak`, `qty_dewasa`, `total`, `tgl_datang`, `status`, `snap`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1734748992', '104611670433176820666', 2, '500', '2', '2500', '2024-12-28', 'settlement', '0d66e625-4606-4ab5-96de-8a239ef30965', '2024-12-21 02:43:13', '2024-12-21 02:56:59', NULL),
('1734750374', '104611670433176820666', 2, '500', '2', '2500', '2024-12-28', '401', '8c5d7496-e67e-4aae-b4ce-d4339c3d98ec', '2024-12-21 03:06:14', '2024-12-21 03:38:20', NULL),
('1734753378', '104611670433176820666', 4, '750000', '2', '3750000', '2024-12-28', NULL, '19b16c69-44a9-4b71-9fcc-de354e6d493b', '2024-12-21 03:56:19', '2024-12-21 03:56:19', NULL),
('1734764104', '104611670433176820666', 2, '500', '2', '2500', '2024-12-20', '401', '1ce5b2cb-cd8a-4f9e-8c14-761b1907e768', '2024-12-21 06:55:05', '2024-12-21 06:55:15', NULL),
('1734769919', '1733800800', 3, '350', '2', '1750', '2024-12-31', 'settlement', '4a7c4247-8e3c-4113-99ec-47a507c7489b', '2024-12-21 08:32:00', '2024-12-21 08:35:32', NULL),
('1734770185', '104611670433176820666', 3, '350', '2', '1750', '2024-12-22', 'settlement', '5bca8791-1c0f-4859-8627-300a4539041a', '2024-12-21 08:36:25', '2024-12-21 08:37:09', NULL),
('1734854376', '1733800800', 1, '425000', '3', '2975000', '2024-12-26', NULL, '604dadb9-a101-4d83-9a04-5d7bf023a0e1', '2024-12-22 07:59:37', '2024-12-22 07:59:37', NULL),
('1734855625', '1733800800', 1, '425000', '2', '2125000', '2024-12-28', NULL, 'ef58fa64-6bd9-443e-89e4-fa7248f07bd6', '2024-12-22 08:20:29', '2024-12-22 08:20:29', NULL),
('1734857475', '1733800800', 1, '425000', '2', '2125000', '2024-12-31', NULL, '659169a4-37a3-4966-a016-5724e16176b3', '2024-12-22 08:51:17', '2024-12-22 08:51:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_ulasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(25) NOT NULL,
  `nama_users` varchar(100) DEFAULT NULL,
  `kelamin` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `ponsel` varchar(13) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_users`, `kelamin`, `email`, `ponsel`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
('104611670433176820666', 'Mardita Rindi', NULL, 'marditarindi@gmail.com', NULL, NULL, '2024-12-10 14:55:49', '2024-12-21 08:36:05', NULL),
('1733800800', 'anto', 'Laki-Laki', 'anto@gmail.com', '081245678769', '$2y$10$2EYE0KuRdE3MqEIr0FGZr.eQi5UQxbp0sEDtIYb9kx1tro9H/LzPq', '2024-12-10 03:20:00', '2024-12-10 03:20:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `deskripsi`, `foto`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wae rebo', 'sangat menakjubkan', 'Wae-Rebo.jpg', '850000', '2024-11-25 14:06:13', '2024-11-26 15:15:06', NULL),
(2, 'taman nasional kelimutu', 'ya  sangat bagus', 'kelimutu.jpg', '1000.000', '2024-11-25 14:31:42', '2024-11-26 11:40:27', NULL),
(3, 'pulau kera', 'wah menakjubkan', 'Pulau-Kera-NTT.jpg', '700.000', '2024-11-26 04:34:10', '2024-11-27 07:58:59', NULL),
(4, 'labuan bajo', 'sangat menakjubkan', 'labuan_bajo.jpg', '1500000', '2024-11-27 08:36:31', '2024-11-27 08:36:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akomodasi`
--
ALTER TABLE `akomodasi`
  ADD PRIMARY KEY (`id_akomodasi`),
  ADD KEY `lokasi` (`lokasi`);
ALTER TABLE `akomodasi` ADD FULLTEXT KEY `nama_akomodasi` (`nama_akomodasi`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `informasi_budaya`
--
ALTER TABLE `informasi_budaya`
  ADD PRIMARY KEY (`id_budaya`),
  ADD KEY `tanggal_acara` (`tanggal_acara`);
ALTER TABLE `informasi_budaya` ADD FULLTEXT KEY `nama_budaya` (`nama_budaya`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `tipe_kontak` (`tipe_kontak`);

--
-- Indexes for table `log_aktivitas_admin`
--
ALTER TABLE `log_aktivitas_admin`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `aktivitas` (`aktivitas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_layanan`
--
ALTER TABLE `pesanan_layanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`),
  ADD KEY `jenis` (`jenis`),
  ADD KEY `lokasi` (`lokasi`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_wisata` (`id_wisata`);
ALTER TABLE `ulasan` ADD FULLTEXT KEY `komentar` (`komentar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
