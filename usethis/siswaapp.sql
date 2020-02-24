-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 05:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswaapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telpon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Sumiati Wardani', '08129111', 'Sumobito', '2020-02-18 00:50:50', '0000-00-00 00:00:00'),
(2, 'Hajik Solehah', '12412412', 'Saka', '2020-02-18 00:50:50', '0000-00-00 00:00:00'),
(3, 'Rio Bagus', '891231', 'Surabaya', '2020-02-18 00:51:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'M-001', 'Matematika Dasar', 'ganjil', 1, '2020-02-15 08:13:15', '0000-00-00 00:00:00'),
(2, 'B-001', 'Bahasa Indonesia', 'ganjil', 2, '2020-02-15 08:13:15', '0000-00-00 00:00:00'),
(3, 'A-001', 'Agama Islam', 'ganjil', 3, '2020-02-17 05:40:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(7, 3, 1, 90, '2020-02-17 17:56:32', '2020-02-19 03:33:43'),
(8, 3, 2, 70, '2020-02-18 20:40:50', '2020-02-19 03:40:50'),
(9, 3, 3, 84, '2020-02-18 20:40:56', '2020-02-19 03:40:56'),
(11, 5, 1, 60, '2020-02-18 21:31:04', '2020-02-19 04:31:04'),
(12, 5, 2, 88, '2020-02-18 21:48:20', '2020-02-19 04:48:20'),
(13, 5, 3, 78, '2020-02-18 21:48:26', '2020-02-19 04:48:26'),
(14, 6, 1, 100, '2020-02-18 21:48:36', '2020-02-19 04:48:36'),
(15, 6, 2, 89, '2020-02-18 21:48:44', '2020-02-19 04:48:44'),
(16, 6, 3, 100, '2020-02-18 21:48:52', '2020-02-19 04:48:52'),
(17, 7, 1, 87, '2020-02-18 21:49:03', '2020-02-19 04:49:03'),
(18, 7, 2, 76, '2020-02-18 21:49:10', '2020-02-19 04:49:10'),
(19, 7, 3, 80, '2020-02-18 21:49:19', '2020-02-19 04:49:19'),
(20, 8, 1, 84, '2020-02-18 21:49:29', '2020-02-19 04:49:29'),
(21, 8, 3, 56, '2020-02-18 21:49:37', '2020-02-19 04:49:37'),
(22, 8, 2, 79, '2020-02-18 21:49:44', '2020-02-19 04:49:44');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_18_004235_create_siswa_table', 1);

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
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 6, 'Hamdani', 'Razif', 'L', 'Islam', 'Mana Saja', '10_objects.png', '2020-02-17 00:26:28', '2020-02-17 00:26:28'),
(5, 8, 'Ramdani', 'rafiq', 'L', 'Islam', 'Surabaya', 'wayang keren.jpg', '2020-02-18 21:13:59', '2020-02-18 21:13:59'),
(6, 9, 'Sondere', 'Manda', 'L', 'Islam', 'Jakarta', 'supri.png', '2020-02-18 21:33:49', '2020-02-18 21:33:49'),
(7, 10, 'Sopret', 'Kilama', 'L', 'Islam', 'Sumobito', 'WIN_20191217_00_34_46_Pro.jpg', '2020-02-18 21:34:15', '2020-02-18 21:34:15'),
(8, 11, 'Landis', 'Opalahh', 'L', 'Islam', 'Korea', 'Untitled.png', '2020-02-18 21:48:06', '2020-02-18 21:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Tsaqif', 'admin@here.com', NULL, '$2y$10$UUG/xEChrzPX0/t/bhhkouZ9G1rnf0qpb.zajCfDAtfwj8qI48wIS', 'tYv4rq2KutUcaABZ8uemcFSSYJPj2wpz0t3kAn5WPfD39si5Jbvukv87Qap3', '2020-02-15 00:51:47', '2020-02-15 00:51:47'),
(6, 'siswa', 'Hamdani', 'razif@gmail.co', NULL, '$2y$10$L.O0sMIWAfIzqfroZW11C.6JmBTSwFoaqlTW9.naJB.zeDAv8oHoe', 'I4HjsO4HxMXdMIvGx5CSFulrQElmg332EAAzugrRJcQoYhOsPYWX27yZEm16', '2020-02-17 00:26:28', '2020-02-17 00:26:28'),
(8, 'siswa', 'Ramdani', 'Rafiq@gmail.com', NULL, '$2y$10$/Htq4hUWfun8Du2NOywPBepfiDi3VQZJCg5/s58iM0cjGT5.6VaIy', 'P7vg1ik6rV8HfCgUcr9BbnINMrzNBXeQAKcI1hdHUnYYWQLtX7YTJpwx4bRP', '2020-02-18 21:13:59', '2020-02-18 21:13:59'),
(9, 'siswa', 'Sondere', 'manda@gmail.com', NULL, '$2y$10$2sd/Lo70pKYXIHHDZWjCkO5.m3K010TM4dMsXahpEjl0J451CR2si', 'f6RegDmKRlmhXPyh7wVNmCMVTA7U01MTVcSHfN2FGtBnUbt6fO5Ni2EJ0YKu', '2020-02-18 21:33:49', '2020-02-18 21:33:49'),
(10, 'siswa', 'Sopret', 'Sopret@yahoo.com', NULL, '$2y$10$MmNJUOiU5rLPVdUq/Ut3EuIkH0bYw7kR3O8tmA6Ml7LMJJ2XsSZse', 'aKqpG8XQOci5dPZeVfGJmZNC8dhvohqiQjOr7piyiuMJsnOPhBQyhX6oEzqR', '2020-02-18 21:34:15', '2020-02-18 21:34:15'),
(11, 'siswa', 'Landis', 'opalansia@lama.org', NULL, '$2y$10$ehjlQKwFCzZPKPpQ2.GoWezMeFBiNrg.kU6A2Ci8fkDloWf/cVXZO', 'EEIyJaVHRnwdAjIlblHcEuJixeL4x6tFSyjwUESmDzdF54BcrmyOc8YSDSRa', '2020-02-18 21:48:06', '2020-02-18 21:48:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
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
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
