-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 07:24 PM
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
-- Database: `mobile_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Nokia', 'Nokia', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(2, 'Sam sung', 'Sam-sung', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(3, 'Iphone', 'Iphone', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(4, 'HTC', 'HTC', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(5, 'Sony', 'Sony', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(6, 'Oppo', 'Oppo', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(7, 'Blackberry', 'Blackberry', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(8, 'Vivo', 'Vivo', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(9, 'Xiao mi', 'Xiao mi', '2021-02-14 11:18:34', '2021-02-14 11:18:34'),
(10, 'Vertu', 'Vertu', '2021-02-14 11:18:34', '2021-02-14 11:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cusid` bigint(20) UNSIGNED NOT NULL,
  `prdid` bigint(20) UNSIGNED NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_gender` tinyint(4) NOT NULL,
  `cus_birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_identity_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_join` datetime NOT NULL,
  `google_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_config`
--

CREATE TABLE `mail_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sendcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `cusId` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `prdid` bigint(20) UNSIGNED NOT NULL,
  `ordid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `warrnty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `promotion`, `accessories`, `image`, `price`, `warrnty`, `slug`, `new`, `status`, `featured`, `details`, `catid`, `created_at`, `updated_at`) VALUES
(5, 'Nokia 2.4', 'NK002', 'Dán cường lực 4D', 'accessories', 'Nokia 2.jpg', '600000.00', '12', 'nokia-a2', '100%', 1, 1, '<p>san pham doc quyen cua nokia</p>', 1, '2021-02-14 11:19:52', '2021-02-14 11:19:52'),
(6, 'Nokia 3.4', 'NK003', 'Dán cường lực 4D', 'accessories', 'nokia-3_4.jpg', '600000.00', '12', 'nokia-a3', '100%', 1, 1, '<p>san pham doc quyen cua nokia</p>', 1, '2021-02-14 11:19:52', '2021-02-14 11:19:52'),
(7, 'Nokia 8000', 'NK004', 'Dán cường lực 4D', 'Cáp, sạc, tai nghe', 'nokia-8000.jpg', '600000.00', '12', 'nokia-a4', '100%', 1, 1, '<p>san pham doc quyen cua nokia</p>', 1, '2021-02-14 11:19:52', '2021-02-14 11:19:52'),
(8, 'Nokia A8', 'Nk-A21', 'Dán cường lực', 'accessories', 'GALAXY-A8-VIOLET-1.png', '1111111.00', '12', 'nokia-a8', 'new 100%', 1, 1, '<p>dsfsdfsdf</p>', 1, '2021-02-14 11:19:52', '2021-02-14 11:19:52'),
(9, 'Nokia 2.4', 'NK002', 'Dán cường lực 4D', 'accessories', 'Nokia 2.jpg', '600000.00', '12', 'nokia-a2', '100%', 1, 1, '<p>san pham doc quyen cua nokia</p>', 1, '2021-02-14 11:20:03', '2021-02-14 11:20:03'),
(10, 'Nokia 3.4', 'NK003', 'Dán cường lực 4D', 'accessories', 'nokia-3_4.jpg', '600000.00', '12', 'nokia-a3', '100%', 1, 1, '<p>san pham doc quyen cua nokia</p>', 1, '2021-02-14 11:20:03', '2021-02-14 11:20:03'),
(11, 'Nokia 8000', 'NK004', 'Dán cường lực 4D', 'Cáp, sạc, tai nghe', 'nokia-8000.jpg', '600000.00', '12', 'nokia-a4', '100%', 1, 1, '<p>san pham doc quyen cua nokia</p>', 1, '2021-02-14 11:20:03', '2021-02-14 11:20:03'),
(12, 'Nokia A8', 'Nk-A21', 'Dán cường lực', 'accessories', 'GALAXY-A8-VIOLET-1.png', '1111111.00', '12', 'nokia-a8', 'new 100%', 1, 1, '<p>dsfsdfsdf</p>', 1, '2021-02-14 11:20:03', '2021-02-14 11:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0395954444',
  `level` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `google_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full`, `password`, `address`, `email`, `phone`, `level`, `status`, `gender`, `google_id`, `facebook_id`, `created_at`, `updated_at`) VALUES
(1, 'Trần Ngọc Tú', '$2y$10$47NdW5gCEKqdWbF.CJmaHO12Bdk17PSYmQtH44Sd4bfflpCWH/J0C', 'Hà Nội', 'ngoctusoftware@gmail.com', '0989198304', 0, 0, 0, NULL, NULL, '2021-02-14 11:18:20', '2021-02-14 11:18:20'),
(2, 'Người quản trị', '$2y$10$d2SkljF6glNRWeQ2bWW52uw/L99FomNEmCQ1au14ri7mFrWHIf8W.', 'Hà Nội', 'cskh.topthietke.vn@gmail.com', '123456789', 0, 0, 0, NULL, NULL, '2021-02-14 11:18:20', '2021-02-14 11:18:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_prdid_foreign` (`prdid`),
  ADD KEY `comment_cusid_foreign` (`cusid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_config`
--
ALTER TABLE `mail_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_cusid_foreign` (`cusId`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_prdid_foreign` (`prdid`),
  ADD KEY `order_detail_ordid_foreign` (`ordid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_catid_foreign` (`catid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_config`
--
ALTER TABLE `mail_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_cusid_foreign` FOREIGN KEY (`cusid`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_prdid_foreign` FOREIGN KEY (`prdid`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cusid_foreign` FOREIGN KEY (`cusId`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ordid_foreign` FOREIGN KEY (`ordid`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_prdid_foreign` FOREIGN KEY (`prdid`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catid_foreign` FOREIGN KEY (`catid`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
