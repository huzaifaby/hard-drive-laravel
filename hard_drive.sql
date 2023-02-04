-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 09:58 AM
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
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_no` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `post_code` int(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `payment_method` varchar(150) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `order_id`, `full_name`, `phone_no`, `email`, `address`, `country`, `state`, `city`, `post_code`, `company_name`, `payment_method`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad Huzaifa', '03012780856', 'huzi@gmail.com', 'a238', 'Pakistan', 'Sindh', 'karachi', 74000, 'test', 'Credit Card', '4242424242424242', '2023-02-02 09:52:01', '2023-02-03 06:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_is_featured` varchar(255) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `city` varchar(150) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip_code` int(150) DEFAULT NULL,
  `fax_no` varchar(150) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone_no`, `address`, `password`, `created_at`, `updated_at`, `city`, `country`, `zip_code`, `fax_no`, `customer_image`) VALUES
(1, 'Muhammad Huzaifa', 'huzi@gmail.com', '03012780856', 'A238', '$2y$10$GcLRmMlwuj7nu9fkrnbcruXioTxoslB.L8guRcNOyKZguFFVRqA3i', '2023-02-02 09:50:17', '2023-02-03 06:45:54', NULL, NULL, NULL, NULL, '1675424754.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `user_id`, `order_status`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '0', 1, 'On hold', '966.06', '2023-02-02 09:52:01', '2023-02-03 06:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `qty`, `price`, `product_id`, `product_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '66.42', 5, '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '2023-02-02 09:52:01', '2023-02-02 09:52:01'),
(2, 1, 1, '409.64', 4, 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', '2023-02-02 09:52:01', '2023-02-02 09:52:01'),
(3, 1, 1, '490', 1, 'HP BL10e C-GbE Interconnect Switch', '2023-02-02 09:52:01', '2023-02-02 09:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `product_condition` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_meta_title` varchar(255) NOT NULL,
  `product_meta_description` varchar(255) NOT NULL,
  `is_sale` int(15) NOT NULL,
  `is_featured` int(15) NOT NULL,
  `category_id` int(255) NOT NULL,
  `brand_id` int(255) NOT NULL,
  `availability` int(15) NOT NULL,
  `quantity` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_price`, `product_image`, `product_sku`, `product_condition`, `product_description`, `product_slug`, `product_meta_title`, `product_meta_description`, `is_sale`, `is_featured`, `category_id`, `brand_id`, `availability`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'HP BL10e C-GbE Interconnect Switch', '490.00', '1674559139-63cfbea36fa7c.jpg', '253077-001', 'Refurbished', '<p>253077-001 HP BL10e C-GbE Interconnect Switch</p>', 'hp-bl10e-c-gbe-interconnect-switch', 'HP BL10e C-GbE Interconnect Switch', 'HP BL10e C-GbE Interconnect Switch', 0, 0, 1, 1, 0, 22, '2023-01-31 10:16:00', '2023-01-31 10:16:00'),
(4, 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', '409.64', '1674561399-63cfc77709b21.jpg', 'AP14FS35', 'Refurbished', 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', 'ap14fs35-sun-ultra45-1000-watt-power-supply', 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', 'AP14FS35 Sun Ultra45 1000 Watt Power Supply', 0, 1, 3, 1, 1, 24, '2023-01-31 10:16:00', '2023-01-31 10:16:00'),
(5, '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '66.42', '1674561461-63cfc7b521c5d.jpg', '412358-001', 'Refurbished', '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '412358-001-hp-256mb-ddr2-533mhz-pc2-4200-non-ecc-unbuffered-cl4-200-pin-sodimm-1-8v-memory-module', '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', '412358-001 HP 256MB DDR2-533MHz PC2-4200 non-ECC Unbuffered CL4 200-Pin SoDIMM 1.8V Memory Module', 0, 1, 2, 1, 1, 44, '2023-01-31 10:16:00', '2023-01-31 10:16:00');

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
  `category_is_featured` int(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `category_slug`, `category_image`, `category_is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Networking Devices', 'networking-devices', '1674558889-63cfbda9ba353.jpg', 1, '2023-01-24 06:14:49', '2023-01-25 08:18:10'),
(2, 'Memory', 'memory', '1674558921-63cfbdc9435d8.jpg', 1, '2023-01-24 06:15:21', '2023-01-25 08:18:08'),
(3, 'Power Supply & others', 'power-supply-others', '1674558963-63cfbdf3b7235.jpg', 1, '2023-01-24 06:16:03', '2023-01-25 08:18:06'),
(4, 'Storage Devices', 'storage-devices', '1674558994-63cfbe12ac00e.jpg', 1, '2023-01-24 06:16:34', '2023-01-25 08:18:01'),
(7, 'sadasdad', 'sadasdad', '1675255634-63da5f5239c97.jpeg', 0, '2023-02-01 07:47:14', '2023-02-01 07:47:14');

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `phone_no_1` varchar(255) NOT NULL,
  `phone_no_2` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `footer_description` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `phone_no_1`, `phone_no_2`, `Address`, `meta_title`, `meta_description`, `email`, `updated_at`, `footer_description`, `facebook`, `twitter`, `instagram`, `linkedin`) VALUES
(1, '1674647554.png', '+1 469-459-9688', '+1 310-935-4325', 'New York, NY 10012, US', 'Home', 'Home', 'info@example.com', '2023-01-25 07:57:54', 'Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'facebook.com', 'Twitter.com', 'instagram.com', 'linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_no` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `post_code` int(150) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `order_notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `order_id`, `full_name`, `phone_no`, `email`, `address`, `country`, `state`, `city`, `post_code`, `company_name`, `order_notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'huzaifa', '03012780856', 'huzi@gmail.com', 'a238 block t', 'Pakistan', 'Sindh', 'karachi', 74000, 'test', 'TEST', '2023-02-02 09:52:01', '2023-02-03 06:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE `slug` (
  `id` int(250) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sub_category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_slug` varchar(255) NOT NULL,
  `sub_category_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_slug`, `sub_category_image`, `created_at`, `updated_at`) VALUES
(3, 3, 'Power Distribution Unit (PDU)', 'power-distribution-unit-pdu', '1675093249-63d7e501118a5.jpg', '2023-01-30 10:40:49', '2023-01-30 10:40:49');

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
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_banners`
--
ALTER TABLE `product_banners`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
