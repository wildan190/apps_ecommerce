-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 10:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Outwear', '2023-09-29 18:00:44', '2023-09-29 18:00:44'),
(2, 'Shirt', '2023-10-01 15:27:01', '2023-10-01 15:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_27_125131_create_sessions_table', 1),
(7, '2023_09_27_130202_create_categories_table', 1),
(8, '2023_09_27_130202_create_products_table', 1),
(9, '2023_09_27_195219_create_permission_tables', 1),
(10, '2023_09_30_003947_create_orders_table', 2),
(11, '2023_09_30_003918_create_order_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nama_penerima`, `alamat_lengkap`, `kota`, `provinsi`, `kode_pos`, `nomor_telepon`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Muhamad Asep Wildan Muholadun', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'cash_on_delivery', 'Dikonfirmasi', '2023-09-29 18:06:12', '2023-09-30 00:57:30'),
(2, 2, 'Wilda', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'eWallet', 'Dikonfirmasi', '2023-09-30 00:17:23', '2023-09-30 00:57:37'),
(3, 2, 'Muhamad', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'kartu_kredit', 'Dikonfirmasi', '2023-09-30 00:59:38', '2023-09-30 01:00:18'),
(4, 2, 'Muhamad Asep Wildan Muholadun', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'cash_on_delivery', 'Dikonfirmasi', '2023-09-30 01:22:04', '2023-09-30 01:57:02'),
(7, 2, 'Muhamad Asep Wildan Muholadun', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'cash_on_delivery', 'Dikonfirmasi', '2023-09-30 01:27:42', '2023-09-30 01:57:04'),
(8, 2, 'Wildan J Belfiore', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'cash_on_delivery', 'Dikonfirmasi', '2023-09-30 01:36:11', '2023-09-30 01:57:06'),
(9, 2, 'Muholadun Asep Wildan Muholadun', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'Lebak', 'Banten', '42316', '085156334793', 'cash_on_delivery', 'Dikonfirmasi', '2023-09-30 01:51:15', '2023-09-30 01:57:08'),
(10, 2, 'Muhamad Asep Wildan Muholadun', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'kartu_kredit', 'Dikonfirmasi', '2023-09-30 01:56:07', '2023-09-30 01:57:10'),
(11, 2, 'Muholadun Asep Wildan Muholadun', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'Lebak', 'Banten', '42316', '085156334793', 'eWallet', 'Dikonfirmasi', '2023-09-30 01:58:35', '2023-09-30 02:05:03'),
(12, 2, 'Wildan J Belfiore', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Banten', '42316', '085156334793', 'eWallet', 'Dikonfirmasi', '2023-10-01 12:22:30', '2023-10-01 12:23:27'),
(13, 2, 'Wildan J Belfiore', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'DKI Jakarta', '42316', '085156334793', 'eWallet', 'Dikonfirmasi', '2023-10-01 13:41:54', '2023-10-01 15:06:09'),
(14, 2, 'Wildan J Belfiore', 'Jl. Profesor Dr. Insinyur Soetami\r\nPonpes Nurul Iman, Kp. Malangnengah, RT/RW 001/001', 'KAB. LEBAK', 'Jawa Barat', '42316', '0895616510484', 'kartu_kredit', 'Dikonfirmasi', '2023-10-01 15:29:47', '2023-10-01 15:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 199000.00, '2023-09-29 18:06:12', '2023-09-29 18:06:12'),
(2, 2, 1, 3, 199000.00, '2023-09-30 00:17:23', '2023-09-30 00:17:23'),
(3, 3, 1, 5, 199000.00, '2023-09-30 00:59:38', '2023-09-30 00:59:38'),
(4, 4, 1, 2, 199000.00, '2023-09-30 01:22:04', '2023-09-30 01:22:04'),
(5, 7, 1, 1, 199000.00, '2023-09-30 01:27:42', '2023-09-30 01:27:42'),
(6, 8, 1, 1, 199000.00, '2023-09-30 01:36:11', '2023-09-30 01:36:11'),
(7, 9, 1, 1, 199000.00, '2023-09-30 01:51:15', '2023-09-30 01:51:15'),
(8, 10, 1, 1, 199000.00, '2023-09-30 01:56:07', '2023-09-30 01:56:07'),
(9, 11, 1, 1, 199000.00, '2023-09-30 01:58:35', '2023-09-30 01:58:35'),
(10, 12, 2, 1, 250000.00, '2023-10-01 12:22:30', '2023-10-01 12:22:30'),
(11, 13, 1, 1, 199000.00, '2023-10-01 13:41:54', '2023-10-01 13:41:54'),
(12, 13, 2, 1, 250000.00, '2023-10-01 13:41:54', '2023-10-01 13:41:54'),
(13, 14, 3, 1, 1129900.00, '2023-10-01 15:29:47', '2023-10-01 15:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-product', 'web', '2023-09-29 17:59:06', '2023-09-29 17:59:06'),
(2, 'create-product', 'web', '2023-09-29 17:59:06', '2023-09-29 17:59:06'),
(3, 'edit-product', 'web', '2023-09-29 17:59:07', '2023-09-29 17:59:07'),
(4, 'delete-product', 'web', '2023-09-29 17:59:07', '2023-09-29 17:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `kategori_produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` decimal(10,2) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_produk`, `kategori_produk_id`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`, `created_at`, `updated_at`) VALUES
(1, 'O101K', 1, 'Jacket Pria Muslim', 199000.00, 'Tes', 'produk_images/w3zPaOeWBPkribKgAkThLIqrDcQFKhGWmTfqs6fC.png', '2023-09-29 18:01:09', '2023-09-29 18:01:09'),
(2, 'O102K', 1, 'Uniform Adat Brunei Darusalam', 250000.00, 'Dummy Images', 'produk_images/hnxvYvMz3vG1HSVbJ00Qg5PgDbAM8J7o2u3LDjpZ.jpg', '2023-10-01 04:55:06', '2023-10-01 04:55:06'),
(3, 'O103K', 1, 'Black Shirt', 1129900.00, 'Kaus hitam berkualitas', 'produk_images/NUHPcekvDoyljJE2fxv37nOb4i0FvOcsbKQPYkhE.jpg', '2023-10-01 15:27:56', '2023-10-01 15:27:56'),
(4, 'TES124', 1, 'Arab Fashion Man Premium', 199000.00, 'Arab', 'produk_images/B4Oa0EpKUPiDdItUWg3DniAU3ShDSe5z514Z68vV.jpg', '2023-10-02 00:41:55', '2023-10-02 00:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-09-29 17:58:57', '2023-09-29 17:58:57'),
(2, 'Pembeli', 'web', '2023-09-29 17:58:58', '2023-09-29 17:58:58'),
(3, 'Penjual', 'web', '2023-09-29 17:58:58', '2023-09-29 17:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qAnUxMQ2e2Sz06YbQdHKjuyahlsPUVBPnYpC8yWb', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.43', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjA3cTVBRzFkd0I5T1RJT2pkNXRvNE05M0hqNlJ2SUdJenpKaDllRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW1iZWxpIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1696234585);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$10$5NzVE83rTAjA/Q9OtEVXs.VOmTUaP0DXH0JdmdUWfNBxSv7zjPYcK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-29 18:00:07', '2023-09-29 18:00:07'),
(2, 'Buyer User', 'buyer@example.com', NULL, '$2y$10$Xz2elQBRoB6miPS.oybhxOXPcch9FHA62wfVLRkVnIfHB8nLYbdjC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-29 18:00:07', '2023-09-29 18:00:07'),
(3, 'Seller User', 'seller@example.com', NULL, '$2y$10$T2KwmtYmLFjFXIq/PtCVZO2n5qbzNJGF5KBB0hn5jFq01gLbUqIBi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-29 18:00:07', '2023-09-29 18:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_kategori_produk_id_foreign` (`kategori_produk_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_kategori_produk_id_foreign` FOREIGN KEY (`kategori_produk_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
