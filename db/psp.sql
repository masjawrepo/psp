-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 01:40 PM
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

--
-- Dumping data for table `acceptor`
--

INSERT INTO `acceptor` (`id`, `uuid_user`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '8b5a3ad9-a7c4-4346-93cc-e1e70bdc44c7', NULL, NULL, NULL, NULL, NULL);

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
(5, '8ef273e2-95d2-4bc9-9f92-0c9db0b654c4', 'TPMB BDN. YANUAR ERMA', 'Jl. Mekarsari No.91 Rt06, RW.14, Babakan Sari, Kiaracondong, Bandung City, West Java 40283', '081214992003', 'admin@bdnyanuar.com', '$2y$10$eXq0kCan760AHhOmzyCyNeVEw4fL.ACDGEV7GUD0kXM1SFE.ISWnK', 2, NULL, NULL, NULL, NULL, 1);

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
(5, '6615c23d-30ee-4ea5-9753-ee910c3614b8', '8ef273e2-95d2-4bc9-9f92-0c9db0b654c4', 'Arista Sani Oktavianti', 2147483647, '2002-10-20 00:00:00', '081573265264', 'aristasunny@gmail.com', '$2y$10$wurFKemZVwChbjiXav5WpufH2uMatoDsezZ2f9PUdyzEpRj2ps9Sq', NULL, NULL, NULL, NULL, NULL, 1),
(6, '4c4c11d7-4444-4977-bfd6-e45d44b11bea', '8ef273e2-95d2-4bc9-9f92-0c9db0b654c4', 'Annisa Sepyia Maharani', 2147483647, '1998-10-17 00:00:00', '082219140548', 'ini@email.com', '$2y$10$AcCZhKj3nL8tN1IMWj4A3egjXuUlgtugNZ.8CXqf.MO4UWeb5IMYO', NULL, NULL, NULL, NULL, NULL, 1),
(7, '49c5d8f7-ecf5-4ed0-969c-b0897cab7597', '8ef273e2-95d2-4bc9-9f92-0c9db0b654c4', 'Annisa Sepyia Maharani', 2147483647, '1998-10-17 00:00:00', '082219140548', 'ini@email.com', '$2y$10$jrg4uBHCghjh/x6xCJXixOQxHXw76TlgVSgcGDeoi1XItot4DYH9C', NULL, NULL, NULL, NULL, NULL, 1);

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
  `status` int(11) DEFAULT NULL,
  `is_pasangan` int(3) DEFAULT NULL,
  `is_anak` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `uuid_user`, `nama_pasangan`, `pendidikan`, `pendidikan_pasangan`, `alamat`, `pekerjaan`, `pekerjaan_pasangan`, `asuransi`, `anak_pria_hidup`, `anak_wanita_hidup`, `tahun_anak_terakhir`, `bulan_anak_terakhir`, `status_kb`, `kb_terakhir`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `is_pasangan`, `is_anak`) VALUES
(1, '8b5a3ad9-a7c4-4346-93cc-e1e70bdc44c7', 'qweqwe', 5, 5, 'qweqweqweqwe', 6, 6, 2, 2, 2, 1, 2, 1, 4, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, '6615c23d-30ee-4ea5-9753-ee910c3614b8', 'Nama', 5, 5, 'Kp. Cikareo, Sukadamai, Cicantayan.', 6, 6, 2, 1, 1, 1, 1, 1, 11, NULL, NULL, NULL, NULL, 1, 1, 1),
(3, '49c5d8f7-ecf5-4ed0-969c-b0897cab7597', '-', 5, 99, 'Jl. Sukamulya', 6, 99, 1, 0, 0, 0, 0, 1, 11, NULL, NULL, NULL, NULL, 1, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
