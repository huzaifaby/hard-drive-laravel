-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 03:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hard_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_sku` varchar(255) NOT NULL,
  `product_condition` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_meta_title` varchar(255) NOT NULL,
  `product_meta_description` varchar(255) NOT NULL,
  `is_sale` int(15) NOT NULL,
  `is_featured` int(15) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_price`, `product_image`, `updated_at`, `created_at`, `product_sku`, `product_condition`, `product_description`, `product_slug`, `product_meta_title`, `product_meta_description`, `is_sale`, `is_featured`, `category_id`) VALUES
(1, 'HP BL10e C-GbE Interconnect Switch', '490.00', '1674559139-63cfbea36fa7c.jpg', '2023-01-24 06:51:49', '2023-01-24 06:18:59', '253077-001', 'Refurbished', '253077-001 HP BL10e C-GbE Interconnect Switch', 'hp-bl10e-c-gbe-interconnect-switch', 'HP BL10e C-GbE Interconnect Switch', 'HP BL10e C-GbE Interconnect Switch', 1, 0, 1),
(4, 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', '409.64', '1674561399-63cfc77709b21.jpg', '2023-01-24 07:01:32', '2023-01-24 06:56:39', 'AP14FS35', 'Refurbished', 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', 'ap14fs35-sun-ultra45-1000-watt-power-supply', 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', 1, 0, 3),
(5, '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '66.42', '1674561461-63cfc7b521c5d.jpg', '2023-01-24 06:59:58', '2023-01-24 06:57:41', '412358-001', 'Refurbished', '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '412358-001-hp-256mb-ddr2-533mhz-pc2-4200-non-ecc-unbuffered-cl4-200-pin-sodimm-1-8v-memory-module', '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_banners`
--

CREATE TABLE `product_banners` (
  `id` int(255) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_slug` varchar(255) NOT NULL,
  `banner_description` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_banners`
--

INSERT INTO `product_banners` (`id`, `banner_name`, `banner_slug`, `banner_description`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'Speakers', 'speakers', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptate?', '1674565598.jpg', '2023-01-24 08:02:51', '2023-01-24 08:06:38'),
(2, 'Mobile', 'mobile', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptate?', '1674565999-63cfd96fafa75.jpg', '2023-01-24 08:13:19', '2023-01-24 08:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` int(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'samsung', '1674568689-63cfe3f1e996a.jpg', '2023-01-24 08:58:09', '2023-01-24 08:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `category_is_featured` int(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `category_slug`, `category_image`, `sub_category`, `category_is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Networking Devices', 'networking-devices', '1674558889-63cfbda9ba353.jpg', 'networking-devices', 1, '2023-01-24 06:14:49', '2023-01-24 07:04:15'),
(2, 'Memory', 'memory', '1674558921-63cfbdc9435d8.jpg', NULL, 1, '2023-01-24 06:15:21', '2023-01-24 06:15:21'),
(3, 'Power Supply & others', 'power-supply-others', '1674558963-63cfbdf3b7235.jpg', 'power-supply-others', 1, '2023-01-24 06:16:03', '2023-01-24 07:04:08'),
(4, 'Storage Devices', 'storage-devices', '1674558994-63cfbe12ac00e.jpg', 'storage-devices', 1, '2023-01-24 06:16:34', '2023-01-24 07:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `review_description` text NOT NULL,
  `review_stars` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE `slug` (
  `id` int(250) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(8, 'Muhammad Huzaifa', 'huzi@gmail.com', '$2y$10$0VnkeTOQDKaVM81uQHyECuVmHBkp5HvGvom14o4dRERRc4PeGtqz6', '2023-01-18 07:23:59', '2023-01-18 07:23:59'),
(9, 'Humaambyv', 'humaam.byv@gmail.com', '$2y$10$c/x3skrAYrIkyYahQNih0OeDHvUEN4PT7HKLknzyoo8IxOC81k.IO', '2023-01-21 02:16:53', '2023-01-21 02:16:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_banners`
--
ALTER TABLE `product_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_banners`
--
ALTER TABLE `product_banners`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
