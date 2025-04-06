-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 08:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psp`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptor`
--

CREATE TABLE `acceptor` (
  `id` int(11) NOT NULL,
  `uuid_user` varchar(36) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_admin_id` int(36) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uuid`, `instance`, `address`, `phone`, `email`, `password`, `role_admin_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '1df38189-b06b-11ef-a54f-7c7635b356c2', 'PillSync+ Authority', '', '', 'admin@pillsyncplus.com', '$2y$10$A66/mfmd4ISWxTMw6kSA8u0Ntv3Kf2LMjDrlarK0ApwzKR0ivWcS.', 1, '2024-12-02 12:05:39', 'system', '0000-00-00 00:00:00', '', 1),
(2, '5ffa09eb-94ea-4f9c-9a4b-da130a4b9779', 'Bidan Sejahtera', 'Jalan Suka Kaya', '0987654321', 'sejahtera@sejahtera.com', '$2y$10$6O40t8hhHydUV2V.zBys7uzLUF.teaBYL5mpxI9E/uybjk1PujTtC', 2, NULL, NULL, NULL, NULL, 1),
(3, '1c593037-116b-46e3-83a4-f98fbc5f75f1', 'Bidan Apapun', 'jl. apapun', '090909090909099', 'apapun@apapun.com', '$2y$10$tuVqvC7Q7Egs2An3hemY7Oysov7PyV/o6N6yqj1RigZCAeMOZ6YSy', 2, NULL, NULL, NULL, NULL, 1),
(4, 'ff28a6f8-4369-4aec-9a63-06ecbc9d087c', 'Bidan Test', 'jl. Test', '09808007777', 'Test@test.com', '$2y$10$MtX/lUCxlCO6..Bii.hlQOdCGVwgQZv7xDuHedd68QLWXRAXUZw1u', 2, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_admin`
--

CREATE TABLE `menu_admin` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `role_admin_id` int(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`id`, `menu_name`, `link`, `role_admin_id`) VALUES
(1, 'Dashboard PillSync+', 'index-psp.php', 1),
(2, 'Dashboard Nakes', 'index-nakes.php', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_admin`
--

CREATE TABLE `role_admin` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_admin`
--

INSERT INTO `role_admin` (`id`, `uuid`, `role_name`, `address`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '141cc2e5-b06a-11ef-a54f-7c7635b356c2', 'Admin System', '', '2024-12-02 11:58:13', 'system', '0000-00-00 00:00:00', '', 1),
(2, '141ce14f-b06a-11ef-a54f-7c7635b356c2', 'Admin Nakes', '', '2024-12-02 11:58:13', 'system', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `uuid_bidan` varchar(36) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nik` int(36) NOT NULL,
  `dob` datetime NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(36) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uuid`, `uuid_bidan`, `fullname`, `nik`, `dob`, `phone`, `email`, `password`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '5a672bfc-e37e-4ca0-b7c6-44042697af3b', '', 'MJ', 1234665, '2024-11-29 00:00:00', '0987654321', 'masjaw@agag.aj', '$2y$10$9rjq.24HJU.kZ1CWp6t34O4eQItSjaoLFBCPX.buHdmVPvst2/LVq', NULL, NULL, NULL, NULL, NULL, 1),
(2, '7246b4a6-b2d6-4f3b-8ec4-9f1887888f09', '', 'MJ2', 12345, '2024-11-30 00:00:00', '12345', 'qwert@qwert.com', '$2y$10$XY9k6BA8TAt.C3D1oH3WPuRCsUB9oX7lYX8HTnB6zhUEq28cx7l1a', NULL, NULL, NULL, NULL, NULL, 1),
(4, '8b5a3ad9-a7c4-4346-93cc-e1e70bdc44c7', 'ff28a6f8-4369-4aec-9a63-06ecbc9d087c', 'Raafi Dwi Susanto', 900909, '2025-03-31 00:00:00', '123123123123213', 'masjaw@masjaw.com', '$2y$10$tDZJzy6pao2eyBhYMiy0fOWBsM2Xm.z0o0z8TPp2BwP5mH8/.85.y', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `uuid_user` varchar(36) NOT NULL,
  `nama_pasangan` varchar(255) DEFAULT NULL,
  `pendidikan` int(5) DEFAULT NULL,
  `pendidikan_pasangan` int(5) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pekerjaan` int(5) DEFAULT NULL,
  `pekerjaan_pasangan` int(5) DEFAULT NULL,
  `asuransi` int(5) DEFAULT NULL,
  `anak_pria_hidup` int(5) DEFAULT NULL,
  `anak_wanita_hidup` int(5) DEFAULT NULL,
  `tahun_anak_terakhir` int(5) DEFAULT NULL,
  `bulan_anak_terakhir` int(5) DEFAULT NULL,
  `status_kb` int(5) DEFAULT NULL,
  `kb_terakhir` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `uuid_user`, `nama_pasangan`, `pendidikan`, `pendidikan_pasangan`, `alamat`, `pekerjaan`, `pekerjaan_pasangan`, `asuransi`, `anak_pria_hidup`, `anak_wanita_hidup`, `tahun_anak_terakhir`, `bulan_anak_terakhir`, `status_kb`, `kb_terakhir`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '8b5a3ad9-a7c4-4346-93cc-e1e70bdc44c7', 'qweqwe', 5, 5, 'qweqweqweqwe', 6, 6, 2, 2, 2, 1, 2, 1, 4, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptor`
--
ALTER TABLE `acceptor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_admin`
--
ALTER TABLE `menu_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptor`
--
ALTER TABLE `acceptor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_admin`
--
ALTER TABLE `role_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
