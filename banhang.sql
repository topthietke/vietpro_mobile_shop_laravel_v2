-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 10:11 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_slug`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', 'iphone', NULL, NULL),
(2, 'Nokia', 'nokia', NULL, NULL),
(3, 'Sam sung', 'sam-sung', NULL, NULL),
(4, 'Oppo', 'oppo', NULL, NULL),
(5, 'Vivo', 'vivo', NULL, NULL),
(6, 'HTC', 'htc', NULL, NULL),
(7, 'Sony', 'sony', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` bigint(20) UNSIGNED NOT NULL,
  `comm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comm_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prd_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `comm_name`, `comm_mail`, `comm_detail`, `created_at`, `updated_at`, `prd_id`) VALUES
(10, 'Administrator', 'admin@gmail.com', 'San pham tot', NULL, NULL, 10),
(11, 'Khach 1', 'Khach1@gmail.com', 'San pham tot', NULL, NULL, 11),
(12, 'Do Van Toan', 'toandv11@gmail.com', 'San pham tot', NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` bigint(20) UNSIGNED NOT NULL,
  `cus_full` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_full`, `cus_pass`, `cus_address`, `cus_email`, `cus_phone`, `google_id`, `facebook_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Van A', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hà Nội', 'Khach1@gmail.com', '012345678', NULL, NULL, NULL, NULL),
(2, 'Nguyen Van B', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hà Nội', 'Khach2@gmail.com', '012345678', NULL, NULL, NULL, NULL),
(3, 'Nguyen Van C', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hà Nội', 'Khach3@gmail.com', '012345678', NULL, NULL, NULL, NULL),
(4, 'Nguyen Van A', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hà Nội', 'Khach4@gmail.com', '012345678', NULL, NULL, NULL, NULL),
(5, 'Nguyen Van B', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hà Nội', 'Khach5@gmail.com', '012345678', NULL, NULL, NULL, NULL),
(6, 'Nguyen Van C', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hà Nội', 'Khach6@gmail.com', '012345678', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail_config`
--

CREATE TABLE `mail_config` (
  `conf_id` bigint(20) UNSIGNED NOT NULL,
  `conf_server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_smtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_tcp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_sendcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_config`
--

INSERT INTO `mail_config` (`conf_id`, `conf_server`, `conf_user`, `conf_pass`, `conf_smtp`, `conf_tcp`, `conf_from`, `conf_sendcc`, `conf_subject`, `conf_content`, `created_at`, `updated_at`) VALUES
(1, 'pop3.gmail.com', 'abcd', '12334567889', 'Test mail', '', 'topthietke.com@gmail.com', 'ngoctusoftware@gmail.com', 'Test mail', 'Chung toi test mail', NULL, NULL);

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
(1, '2020_11_15_080213_create_customs_table', 1),
(2, '2020_11_15_080940_create_mail_config_table', 1),
(3, '2020_11_15_081115_create_users_table', 1),
(4, '2020_11_15_081229_create_categories_table', 1),
(5, '2020_11_15_081314_create_products_table', 1),
(6, '2020_11_15_081341_create_orders_table', 1),
(7, '2020_11_15_081539_create_order_details_table', 1),
(8, '2020_11_15_081614_create_comment_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` bigint(20) UNSIGNED NOT NULL,
  `cus_id` bigint(20) UNSIGNED NOT NULL,
  `ord_total` decimal(18,2) NOT NULL,
  `ord_state` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `cus_id`, `ord_total`, `ord_state`, `created_at`, `updated_at`) VALUES
(1, 2, '3000000.00', 1, NULL, NULL),
(2, 3, '3000000.00', 1, NULL, NULL),
(3, 4, '3000000.00', 0, NULL, NULL),
(4, 5, '3000000.00', 0, NULL, NULL),
(5, 6, '3000000.00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` bigint(20) UNSIGNED NOT NULL,
  `od_quantity` int(10) UNSIGNED NOT NULL,
  `od_price` int(10) UNSIGNED NOT NULL,
  `prd_id` bigint(20) UNSIGNED NOT NULL,
  `ord_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`od_id`, `od_quantity`, `od_price`, `prd_id`, `ord_id`, `created_at`, `updated_at`) VALUES
(17, 2, 3000000, 10, 1, NULL, NULL),
(18, 1, 3000000, 10, 2, NULL, NULL),
(19, 1, 3000000, 10, 3, NULL, NULL),
(20, 1, 3000000, 10, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prd_id` bigint(20) UNSIGNED NOT NULL,
  `prd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_price` decimal(18,2) NOT NULL,
  `prd_warrnty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_new` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_status` tinyint(4) NOT NULL,
  `prd_featured` tinyint(4) NOT NULL,
  `prd_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `prd_code`, `prd_image`, `prd_price`, `prd_warrnty`, `prd_slug`, `prd_new`, `prd_status`, `prd_featured`, `prd_details`, `cat_id`, `created_at`, `updated_at`) VALUES
(10, 'Nokia A2', 'NK002', 'Nokia-1-red.png', '600000.00', '12', 'nokia-a9', '100%', 1, 1, 'san pham doc quyen cua nokia', 2, NULL, NULL),
(11, 'Nokia A3', 'NK003', 'Nokia-1-red.png', '600000.00', '12', 'nokia-a9', '100%', 1, 1, 'san pham doc quyen cua nokia', 2, NULL, NULL),
(12, 'Nokia A4', 'NK004', 'Nokia-1-red.png', '600000.00', '12', 'nokia-a9', '100%', 1, 1, 'san pham doc quyen cua nokia', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(10) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0395954444',
  `level` tinyint(3) UNSIGNED NOT NULL,
  `status` int(20) NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full`, `gender`, `password`, `address`, `email`, `phone`, `level`, `status`, `google_id`, `facebook_id`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 0, '$2y$10$QyfDY8NJVgVyuo/3.r1ZHeC/V78DQfK8fOJhWViQZp2ZULJgwuVOK', 'Hà Nội', 'admin@gmail.com', '012345678', 0, 0, NULL, NULL, NULL, NULL),
(2, 'Trần Ngọc Tú', 0, '$2y$10$SVXpAgyR/5w9RAULdfldLuIwCWmFKBUL.pmbxmQ.9RdbCAqfuW2Ii', 'Hà Nội', 'ngoctusoftware@gmail.com', '012345678', 0, 0, '111298882283928177073', NULL, NULL, '2020-12-20 08:06:47'),
(3, 'Tran Ngoc Tu', 0, '$2y$10$dYw8P8C.nHZLe3kYb068luFHBSjlrJcyTCw28K/CPWaP9R/JDur.C', 'Việt Nam', 'tutn37563@student-topica.edu.vn', '0909123456', 1, 0, '106309155174961029577', NULL, '2020-12-18 07:04:04', '2020-12-18 09:17:33'),
(5, 'Trần Ngọc Tú', 0, '$2y$10$a0d/vHoEFy7Q8E7lyMThGeFCuOFKJqSp25aXNcLoG10l4/oK.tMWS', 'Việt Nam', 'ntsoftware@hotmail.com', '0909123444', 1, 0, NULL, '3748428615177089', '2020-12-18 16:44:24', '2020-12-18 16:44:24'),
(6, 'Trần Ngọc Tú', NULL, '$2y$10$zZpaLtTxpxY4LH9D5sCDJeO0sOVDXUF.ddTl2XgN/K.bFaThRLfGO', 'Hà Nội', 'test.sendmail.vn@gmail.com', '0973631930', 1, 0, NULL, NULL, '2021-01-01 01:49:36', '2021-01-01 01:49:36'),
(7, 'thử Kiểm', NULL, '$2y$10$18E6KxjcbIfTogLqmq1OG.HEL77Wn7soXtzdbYZQ7LDYlyAvUrghO', 'Việt Nam', 'test.sendmail.vn@gmail.com', '0909123456', 1, 0, '110765201946894900455', NULL, '2021-01-01 01:50:23', '2021-01-01 01:50:23'),
(8, 'Đỗ Thị Xuyên', NULL, '$2y$10$gzTqUHuXJ9grhPr8ljsnsOhKkH9uPCn/0hxUZAN/C1Se88kR7Yegi', 'Hà Nội', 'xuyendt1@gmail.com', '0978565336', 1, 0, NULL, NULL, '2021-01-01 01:56:31', '2021-01-01 01:56:31'),
(9, 'Đỗ Thị Xuyên', NULL, '$2y$10$QAGEqwtcY3wRMXZQoVQUXu4feZmNRjMNSeoXArnAe5COCQNctj.6u', 'THanh hoa', 'dothixuyen@gmail.com', '1111111111', 1, 0, NULL, NULL, '2021-01-01 02:02:43', '2021-01-01 02:02:43'),
(11, 'Trần Thành công', NULL, '$2y$10$sxEwpyY9WhQ/G8VtdfNqQuGTKG138G1eodcDBKowia9E8/cVbd0ca', 'THanh hoa', 'congtt16@gmail.com', '1111111111', 1, 0, NULL, NULL, '2021-01-01 02:06:33', '2021-01-01 02:06:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `comment_prd_id_foreign` (`prd_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `mail_config`
--
ALTER TABLE `mail_config`
  ADD PRIMARY KEY (`conf_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `orders_cus_id_foreign` (`cus_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `order_detail_prd_id_foreign` (`prd_id`),
  ADD KEY `order_detail_ord_id_foreign` (`ord_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mail_config`
--
ALTER TABLE `mail_config`
  MODIFY `conf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `od_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cus_id_foreign` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ord_id_foreign` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_prd_id_foreign` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
