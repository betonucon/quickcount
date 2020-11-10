-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 10:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickcount`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `singkatan` varchar(200) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id`, `name`, `singkatan`, `warna`) VALUES
(1, 'Ratu Ati Marliati-Sokhidin', 'PAS', '#3c8dbc'),
(2, ' Ali Mujahidin-Firman Mutakin', 'MULIA', '#ff851b'),
(3, 'Helldy Agustian-Sanuji Pentamarta', 'HAJI', '#d2d6de'),
(4, 'Iye Iman Rohiman-Awab', 'IYE-AWAB', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(5) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `name`, `color`) VALUES
(1, 'Cibeber', '#c1c7d1'),
(2, 'Cilegon', '#c1c7d1'),
(3, 'Citangkil', '#c1c7d1'),
(4, 'Ciwandan', 'yellow'),
(5, 'Gerogol', 'yellow'),
(6, 'Jombang', '#c1c7d1'),
(7, 'Pulo Merak', 'yellow'),
(8, 'Purwakarta', '#c1c7d1');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(5) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `kecamatan_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `name`, `kecamatan_id`) VALUES
(1, 'Bulakan', 1),
(2, 'Cikerai', 1),
(3, 'Kalitimbang', 1),
(4, 'Karangasem', 1),
(5, 'Kedaleman', 1),
(6, 'Cibeber', 1),
(7, 'Bagendung', 2),
(8, 'Bendungan', 2),
(9, 'Ciwaduk', 2),
(10, 'Ciwedus', 2),
(11, 'Ketileng', 2),
(12, 'Citangkil', 3),
(13, 'Deringo', 3),
(14, 'Kebonsari', 3),
(15, 'Lebakdenok', 3),
(16, 'Samangraya', 3),
(17, 'Tamanbaru', 3),
(18, 'Warnasari', 3),
(19, 'Banjar Negara', 4),
(20, 'Gunungsugih', 4),
(21, 'Kepuh', 4),
(22, 'Kubangsari', 4),
(23, 'Randakari', 4),
(24, 'Tegalratu', 4),
(25, 'Gerem', 5),
(26, 'Gerogol', 5),
(27, 'Kotasari', 5),
(28, 'Rawa Arum', 5),
(29, 'Gedong Dalem', 6),
(30, 'Jombang Wetan', 6),
(31, 'Masigit', 6),
(32, 'Panggung Rawi', 6),
(33, 'Sukmajaya', 6),
(34, 'Lebak Gede', 7),
(35, 'Mekarsari', 7),
(36, 'Suralaya', 7),
(37, 'Tamansari', 7),
(38, 'Kebondalem', 8),
(39, 'Kotabumi', 8),
(40, 'Pabean', 8),
(41, 'Purwakarta', 8),
(42, 'Ramanuju', 8),
(43, 'Tegal Bunder', 8);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemilihan`
--

CREATE TABLE `pemilihan` (
  `id` int(10) NOT NULL,
  `calon_id` int(5) DEFAULT NULL,
  `kecamatan_id` int(5) DEFAULT NULL,
  `nilai` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kelurahan_id` int(5) DEFAULT NULL,
  `tps` varchar(20) DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilihan`
--

INSERT INTO `pemilihan` (`id`, `calon_id`, `kecamatan_id`, `nilai`, `tanggal`, `kelurahan_id`, `tps`, `users_id`) VALUES
(1, 1, 1, 11, '2020-11-10', 1, '1', NULL),
(2, 2, 1, 10, '2020-11-10', 1, '1', NULL),
(3, 3, 1, 9, '2020-11-10', 1, '1', NULL),
(4, 4, 1, 4, '2020-11-10', 1, '1', NULL),
(5, 1, 1, 34, '2020-11-10', 1, '3', 7),
(6, 2, 1, 21, '2020-11-10', 1, '3', NULL),
(7, 0, 1, 12, '2020-11-10', 1, '3', NULL),
(8, 11, 1, 10, '2020-11-10', 1, '1', NULL),
(9, 1, 3, 100, '2020-11-10', 14, '11', NULL),
(10, 2, 3, 101, '2020-11-10', 14, '11', NULL),
(11, 3, 3, 98, '2020-11-10', 14, '11', NULL),
(12, 4, 3, 97, '2020-11-10', 14, '11', NULL),
(13, 0, 3, 10, '2020-11-10', 14, '11', NULL),
(14, 11, 3, 2, '2020-11-10', 14, '11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(10) NOT NULL,
  `tps` varchar(20) DEFAULT '',
  `nik` varchar(20) DEFAULT '',
  `kecamatan_id` int(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelurahan_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `tps`, `nik`, `kecamatan_id`, `alamat`, `kelurahan_id`) VALUES
(3, '1', '123456789', 1, 'tps 1', 1),
(4, '3', '123456788', 1, 'tps 3', 1),
(7, '11', '123456787', 3, 'Kebon sari', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nik`, `role_id`) VALUES
(1, 'ucon', '1111111111', NULL, '$2y$10$7Z2StzZ3iHhItIPicNFSo.4UUdKwGZnjtgtQbMjq/VceaoMXWo5zi', '1PYyCf4kBUu8SZlYHyFhlUPm11yLQWZGjLoqpAjlky8a8k8QDxPV7dkRl84x', '2020-11-08 22:36:08', '2020-11-08 22:36:08', '111111111', 1),
(6, 'arkan', '123456789', NULL, '$2y$10$gxIUMazjYjLdm/3jUKkvuuN.HQwOjCx/aPdkDefHgM51n0X1otsjy', 'fT0lQYDSLtTyls5p11Uw8ARaCFtjafdZnAGzpHupeJYabxXK4aNgJoGf2AzH', '2020-11-09 19:30:19', '2020-11-09 19:30:19', '123456789', 2),
(7, 'sendra', '123456788', NULL, '$2y$10$topglVkdrtmDjI7bKLsb9uGXqnMPcEKUFW1HGqQCc97jiojyKQwb.', NULL, '2020-11-09 19:30:41', '2020-11-09 19:30:41', '123456788', 2),
(10, 'Ato Ulloh', '123456787', NULL, '$2y$10$FoDdWymVV1do4SanOFwjWekdnuZgvF0oC7jflhkBILpsk2ellpR2a', NULL, '2020-11-10 01:10:37', '2020-11-10 01:10:37', '123456787', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_un` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
