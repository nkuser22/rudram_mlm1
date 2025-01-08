-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 12:40 PM
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
-- Database: `rudram_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, '', 'admin@gmail.com', 'f5d1278e8109edd94e1e4197e04873b9', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Weekend Special Offer', 'banners/dGT6UUxRPGpNP4NaDFci0OUdRhR1q6a3Hoy8yBKI.jpg', 1, '2024-11-28 23:57:11', '2024-11-28 23:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) DEFAULT NULL,
  `is_parent` tinyint(4) DEFAULT 0,
  `type` varchar(50) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `is_parent`, `type`, `category_img`, `status`, `created_at`, `updated_at`) VALUES
(4, 'tops', NULL, 0, 'm_cat', '1732860103.svg', 1, '2024-11-29 00:31:43', '2024-11-29 00:31:43'),
(5, 'bottoms', NULL, 0, 'm_cat', '1732860142.svg', 1, '2024-11-29 00:32:23', '2024-11-29 00:32:23'),
(6, 'co-ords', NULL, 0, 'm_cat', '1732860187.svg', 1, '2024-11-29 00:33:12', '2024-11-29 00:33:12'),
(7, 'jackets', NULL, 0, 'm_cat', '1732860237.svg', 1, '2024-11-29 00:33:57', '2024-11-29 00:33:57'),
(8, 'blazers', NULL, 0, 'm_cat', '1732860274.svg', 1, '2024-11-29 00:34:34', '2024-11-29 00:34:34'),
(9, 'sheepwear', NULL, 0, 'm_cat', '1732860299.svg', 1, '2024-11-29 00:34:59', '2024-11-29 00:34:59'),
(10, 'swimwear', NULL, 0, 'm_cat', '1732860333.svg', 1, '2024-11-29 00:35:33', '2024-11-29 00:35:33'),
(11, 'Grown', NULL, 0, 'm_cat', '1732860358.svg', 1, '2024-11-29 00:35:58', '2024-11-29 00:35:58'),
(12, 'Jeans Pant', NULL, 0, 'm_cat', '1732860895.svg', 1, '2024-11-29 00:44:56', '2024-11-29 00:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', 'code', 'aaa', '2024-12-06 04:44:54', '2024-12-06 04:44:54');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_20_055410_create_products_table', 1),
(6, '2024_11_20_073605_create_categories_table', 2),
(7, '2024_11_27_112623_create_admins_table', 3),
(9, '2024_11_28_054642_create_banners_table', 4),
(10, '2024_12_02_091009_create_orders_table', 5),
(11, '2024_12_04_044754_create_user_wallets_table', 6),
(12, '2024_12_04_091908_create_order_items_table', 7),
(13, '2024_12_04_092632_create_shipping_addresses_table', 8),
(14, '2024_12_04_105918_create_order_histories_table', 9),
(15, '2024_12_06_094808_create_contacts_table', 10),
(16, '2024_12_07_065515_create_posts_table', 11),
(17, '2024_12_11_045752_create_tickets_table', 12),
(18, '2024_12_11_161306_create_notifications_table', 13),
(19, '2024_12_17_043602_create_wishlists_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `notifiable_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `message`, `is_read`, `notifiable_type`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'dfdfgdfg ddddf', 0, NULL, '2024-12-12 06:16:55', '2024-12-12 06:16:55'),
(2, 2, 'test', 'demo test', 0, NULL, '2024-12-12 06:18:47', '2024-12-12 06:18:47'),
(3, 2, 'test', 'sdfdsfds', 0, NULL, '2024-12-12 06:19:27', '2024-12-12 06:19:27'),
(4, 2, 'hello', 'all user test', 0, NULL, '2024-12-12 06:20:04', '2024-12-12 06:20:04'),
(5, 3, 'hello', 'all user test', 0, NULL, '2024-12-12 06:20:04', '2024-12-12 06:20:04'),
(6, 4, 'hello', 'all user test', 0, NULL, '2024-12-12 06:20:04', '2024-12-12 06:20:04'),
(7, 1, 'hello', 'all user test', 0, NULL, '2024-12-12 06:20:04', '2024-12-12 06:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_code` varchar(50) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `order_amount` double NOT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `order_details` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` varchar(50) DEFAULT NULL,
  `payment_option` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `u_code`, `order_type`, `order_amount`, `invoice_no`, `order_details`, `status`, `payment_status`, `payment_option`, `created_at`, `updated_at`) VALUES
(1, '1', 'purchase', 800, 'INV-000001', '{\"product_id\":[3],\"product_name\":[\"Blazer With Cap\"],\"price\":[\"1000\"],\"sale_price\":[\"800\"],\"product_qty\":[1],\"product_img\":[\"1732861837.jpg\"],\"name\":\"demoss\",\"email\":\"tes333wwm@gmail.comss\",\"address\":\"Village - Kharabgarh\\r\\nTeh - Dudhan sadhan\\r\\nPo - Devi nagar\",\"city\":\"PATIALA\",\"state\":\"Punjab\",\"pin_code\":\"147111\"}', 1, '1', 'Shopping Wallet', '2024-12-04 05:06:48', '2024-12-04 06:25:08'),
(2, '2', 'purchase', 800, 'INV-000002', '{\"product_id\":[3],\"product_name\":[\"Blazer With Cap\"],\"price\":[\"1000\"],\"sale_price\":[\"800\"],\"product_qty\":[1],\"product_img\":[\"1732861837.jpg\"],\"name\":\"Naresh Kumar\",\"email\":\"nk@gmail.com\",\"address\":\"kharabgarh\\r\\nkharabgarh\",\"city\":\"Patiala\",\"state\":\"PUNJAB\",\"pin_code\":\"147111\"}', 0, '1', 'Shopping Wallet', '2024-12-05 00:05:27', '2024-12-05 00:05:27'),
(3, '2', 'purchase', 600, 'INV-000003', '{\"product_id\":[5],\"product_name\":[\"Long Brown jacket\"],\"price\":[\"800\"],\"sale_price\":[\"600\"],\"product_qty\":[1],\"product_img\":[\"1732862110.jpg\"],\"name\":\"Naresh Kumar\",\"email\":\"nk@gmail.com\",\"address\":\"hghgfh\\r\\nyrtytry\",\"city\":\"hhhhhhh\",\"state\":\"hhhtttt\",\"pin_code\":\"4444444\"}', 0, '1', 'Shopping Wallet', '2024-12-05 01:15:38', '2024-12-05 01:15:38'),
(4, '2', 'purchase', 2400, 'INV-000004', '{\"product_id\":[2],\"product_name\":[\"White Top\"],\"price\":[\"1500\"],\"sale_price\":[\"1200\"],\"product_qty\":[2],\"product_img\":[\"1732861749.jpg\"],\"name\":\"Naresh Kumar\",\"email\":\"nk@gmail.com\",\"address\":\"kharabgarh\\r\\nkharabgarh\",\"city\":\"Patiala\",\"state\":\"PUNJAB\",\"pin_code\":\"147111\"}', 0, '1', 'Shopping Wallet', '2024-12-05 01:16:57', '2024-12-05 01:16:57'),
(5, '2', 'purchase', 2000, 'INV-000005', '{\"product_id\":[2,3],\"product_name\":[\"White Top\",\"Blazer With Cap\"],\"price\":[\"1500\",\"1000\"],\"sale_price\":[\"1200\",\"800\"],\"product_qty\":[1,1],\"product_img\":[\"1732861749.jpg\",\"1732861837.jpg\"],\"name\":\"Naresh Kumar\",\"email\":\"nk@gmail.com\",\"address\":\"kharabgarh\\r\\nkharabgarh\",\"city\":\"Patiala\",\"state\":\"PUNJAB\",\"pin_code\":\"147111\"}', 0, '1', 'Shopping Wallet', '2024-12-16 05:04:51', '2024-12-16 05:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remarks` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `order_id`, `status`, `changed_at`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-04 06:05:37', 'Status changed to Approved', '2024-12-04 11:35:37', '2024-12-04 06:05:37'),
(2, 1, 2, '2024-12-04 06:11:14', 'Status changed to Shipped', '2024-12-04 11:41:14', '2024-12-04 06:11:14'),
(3, 1, 4, '2024-12-04 06:25:08', 'Status changed to Completed', '2024-12-04 11:55:08', '2024-12-04 06:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `product_name`, `product_img`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '1', '800', 'Blazer With Cap', '1732861837.jpg', '2024-12-04 16:06:48', '2024-12-04 10:36:48'),
(2, '2', '3', '1', '800', 'Blazer With Cap', '1732861837.jpg', '2024-12-05 11:05:27', '2024-12-05 05:35:27'),
(3, '3', '5', '1', '600', 'Long Brown jacket', '1732862110.jpg', '2024-12-05 12:15:38', '2024-12-05 06:45:38'),
(4, '4', '2', '2', '1200', 'White Top', '1732861749.jpg', '2024-12-05 12:16:57', '2024-12-05 06:46:57'),
(5, '5', '2', '1', '1200', 'White Top', '1732861749.jpg', '2024-12-16 16:04:52', '2024-12-16 10:34:52'),
(6, '5', '3', '1', '800', 'Blazer With Cap', '1732861837.jpg', '2024-12-16 16:04:52', '2024-12-16 10:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nk@gmail.com', '$2y$12$qCYCjlmDUGYazf3Kwug83uQnjxP7wvMO5pwuxjU8t/mpEBDfeYlpu', '2024-12-06 23:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `parent_method` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `is_parent` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `parent_method`, `slug`, `name`, `image`, `type`, `address`, `is_parent`, `status`, `created_at`) VALUES
(1, NULL, 'upi', 'UPI', 'http://127.0.0.1:8000/front/f1/images/logo/rudram-logo.png', NULL, NULL, 1, 1, '2024-12-10 10:48:01'),
(2, NULL, 'bank', 'BANK', 'http://127.0.0.1:8000/front/f1/images/logo/rudram-logo.png', NULL, NULL, 1, 1, '2024-12-10 10:48:06'),
(6, 'upi', 'phonepe', 'PhonePe', 'http://127.0.0.1:8000/front/f1/images/logo/rudram-logo.png', NULL, '322332GFSDR', 0, 0, '2024-12-10 11:01:39'),
(7, 'upi', 'googlepay', 'Google Pay', 'http://127.0.0.1:8000/front/f1/images/logo/rudram-logo.png', NULL, 'XHGFY444', 0, 0, '2024-12-10 11:01:24'),
(8, 'bank', 'sbi', 'SBI', 'http://127.0.0.1:8000/front/f1/images/logo/rudram-logo.png', NULL, NULL, 0, 0, '2024-12-10 10:48:17');

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
-- Table structure for table `popups`
--

CREATE TABLE `popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `notifiable_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `status`, `image`, `created_at`, `updated_at`) VALUES
(4, 'heloo', NULL, 'content', 1, 'blogs/gjO0dKeIhFyq3uaEqqGh5kg1N7k9o12dCtjy9A2X.jpg', '2024-12-07 02:28:36', '2024-12-07 03:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_qty` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `exchangeable` varchar(255) DEFAULT NULL,
  `refundable` varchar(255) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `weight` decimal(10,0) NOT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `sale_price` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_type`, `product_qty`, `brand`, `unit`, `exchangeable`, `refundable`, `product_desc`, `product_img`, `weight`, `dimension`, `price`, `sale_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Brown khadi jacket', 'Clothing', 2, 'hrx', 'Pieces', 'on', 'on', '<p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.</p>', '1732861653.jpg', 2, 'Length', 2000, 1800, 1, '2024-11-29 00:57:33', '2024-12-05 01:53:07'),
(2, 4, 'White Top', 'Clothing', 10, 'puma', 'Kilogram', 'on', 'on', '<p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.</p>', '1732861749.jpg', 1, 'Length', 1500, 1200, 1, '2024-11-29 00:59:09', '2024-11-29 00:59:09'),
(3, 4, 'Blazer With Cap', 'Clothing', 4, 'puma', 'Kilogram', 'on', 'on', '<p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.</p>', '1732861837.jpg', 3, 'Length', 1000, 800, 1, '2024-11-29 01:00:37', '2024-11-29 01:00:37'),
(4, 4, 'Black Dotted Shirt', 'Clothing', 100, 'puma', 'Kilogram', 'on', 'on', '<p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.</p>', '1732861907.jpg', 6, 'Length', 3000, 2800, 1, '2024-11-29 01:01:47', '2024-11-29 01:01:47'),
(5, 4, 'Long Brown jacket', 'Clothing', 5, 'puma', 'Kilogram', 'on', 'on', '<p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.</p>', '1732862110.jpg', 2, 'Length', 800, 600, 1, '2024-11-29 01:05:10', '2024-11-29 01:05:10'),
(6, 4, 'Black Dotted jacket', 'Clothing', 12, 'puma', 'Pieces', 'on', 'on', '<p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.</p>', '1732862368.jpg', 2, 'Length', 1000, 700, 1, '2024-11-29 01:09:29', '2024-11-29 01:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `order_id`, `name`, `address_line1`, `address_line2`, `city`, `state`, `country`, `postal_code`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'demoss', 'Village - Kharabgarh\r\nTeh - Dudhan sadhan\r\nPo - Devi nagar', NULL, NULL, NULL, NULL, NULL, NULL, 'tes333wwm@gmail.comss', '2024-12-04 16:06:49', '2024-12-04 10:36:49'),
(2, 2, 'Naresh Kumar', 'kharabgarh\r\nkharabgarh', NULL, NULL, NULL, NULL, NULL, NULL, 'nk@gmail.com', '2024-12-05 11:05:27', '2024-12-05 05:35:27'),
(3, 3, 'Naresh Kumar', 'hghgfh\r\nyrtytry', NULL, NULL, NULL, NULL, NULL, NULL, 'nk@gmail.com', '2024-12-05 12:15:38', '2024-12-05 06:45:38'),
(4, 4, 'Naresh Kumar', 'kharabgarh\r\nkharabgarh', NULL, NULL, NULL, NULL, NULL, NULL, 'nk@gmail.com', '2024-12-05 12:16:57', '2024-12-05 06:46:57'),
(5, 5, 'Naresh Kumar', 'kharabgarh\r\nkharabgarh', NULL, NULL, NULL, NULL, NULL, NULL, 'nk@gmail.com', '2024-12-16 16:04:52', '2024-12-16 10:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `u_code` double DEFAULT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `reply_status` tinyint(4) NOT NULL DEFAULT 0,
  `reply_remark` varchar(255) DEFAULT NULL,
  `ticket_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`u_code`, `ticket`, `subject`, `description`, `status`, `reply_status`, `reply_remark`, `ticket_id`, `id`, `created_at`, `updated_at`) VALUES
(1, 'TCK-6759B80AAF810', 'hello', 'hello msg', 1, 1, 'you are no complete directs', NULL, 1, '2024-12-11 10:34:26', '2024-12-11 10:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `tx_u_code` varchar(25) DEFAULT NULL,
  `u_code` varchar(25) DEFAULT NULL,
  `tx_type` varchar(100) DEFAULT NULL,
  `debit_credit` varchar(55) DEFAULT NULL,
  `source` varchar(25) DEFAULT NULL,
  `wallet_type` varchar(100) DEFAULT 'main_wallet',
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tx_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_slip` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `txs_res` mediumtext DEFAULT NULL,
  `open_wallet` double DEFAULT NULL,
  `closing_wallet` double DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `tx_record` mediumtext DEFAULT NULL,
  `reason` mediumtext DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `payout_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tx_u_code`, `u_code`, `tx_type`, `debit_credit`, `source`, `wallet_type`, `amount`, `tx_charge`, `payment_slip`, `date`, `status`, `payment_method`, `payment_type`, `txn_id`, `txs_res`, `open_wallet`, `closing_wallet`, `remark`, `tx_record`, `reason`, `payment_id`, `payout_status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'product_purchase', 'debit', NULL, 'shopping_wallet', 800.00, 0.00, NULL, '2024-12-04 07:10:35', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount $order->order_amount Order ID: 1 - Invoice No: INV-000001', '1', NULL, NULL, 0, '2024-12-04 01:40:35', '2024-12-04 01:40:35'),
(2, NULL, '1', 'product_purchase', 'debit', NULL, 'shopping_wallet', 800.00, 0.00, NULL, '2024-12-04 09:51:36', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount $order->order_amount Order ID: 13 - Invoice No: INV-000013', '13', NULL, NULL, 0, '2024-12-04 04:21:36', '2024-12-04 04:21:36'),
(3, NULL, '1', 'product_purchase', 'debit', NULL, 'shopping_wallet', 1600.00, 0.00, NULL, '2024-12-04 10:14:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount $order->order_amount Order ID: 14 - Invoice No: INV-000014', '14', NULL, NULL, 0, '2024-12-04 04:44:25', '2024-12-04 04:44:25'),
(4, NULL, '1', 'product_purchase', 'debit', NULL, 'shopping_wallet', 800.00, 0.00, NULL, '2024-12-04 10:36:49', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount $order->order_amount Order ID: 1 - Invoice No: INV-000001', '1', NULL, NULL, 0, '2024-12-04 05:06:49', '2024-12-04 05:06:49'),
(5, NULL, '2', 'product_purchase', 'debit', NULL, 'shopping_wallet', 800.00, 0.00, NULL, '2024-12-05 05:35:27', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount 800 Order ID: 2 - Invoice No: INV-000002', '2', NULL, NULL, 0, '2024-12-05 00:05:27', '2024-12-05 00:05:27'),
(6, NULL, '2', 'product_purchase', 'debit', NULL, 'shopping_wallet', 600.00, 0.00, NULL, '2024-12-05 06:45:38', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount 600 Order ID: 3 - Invoice No: INV-000003', '3', NULL, NULL, 0, '2024-12-05 01:15:38', '2024-12-05 01:15:38'),
(7, NULL, '2', 'product_purchase', 'debit', NULL, 'shopping_wallet', 2400.00, 0.00, NULL, '2024-12-05 06:46:57', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount 2400 Order ID: 4 - Invoice No: INV-000004', '4', NULL, NULL, 0, '2024-12-05 01:16:57', '2024-12-05 01:16:57'),
(8, NULL, '2', 'AdminFund', 'credit', NULL, 'shopping_wallet', 100.00, 0.00, NULL, '2024-12-06 05:16:07', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Added fund by admin of amount 100', '1', NULL, NULL, 0, '2024-12-05 23:46:07', '2024-12-05 23:46:07'),
(9, NULL, '2', 'AdminFund', 'credit', NULL, 'shopping_wallet', 100.00, 0.00, NULL, '2024-12-06 05:39:15', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Added fund by admin of amount 100', '1', NULL, NULL, 0, '2024-12-06 00:09:15', '2024-12-06 00:09:15'),
(10, NULL, '2', 'AdminFund', 'credit', NULL, 'main_wallet', 100.00, 0.00, NULL, '2024-12-06 05:39:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Added fund by admin of amount 100', '1', NULL, NULL, 0, '2024-12-06 00:09:25', '2024-12-06 00:09:25'),
(11, NULL, '1', 'AdminFund', 'credit', NULL, 'main_wallet', 250.00, 0.00, NULL, '2024-12-06 05:51:54', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Added fund by admin of amount 250', '1', NULL, NULL, 0, '2024-12-06 00:21:54', '2024-12-06 00:21:54'),
(12, NULL, '3', 'AdminFund', 'credit', NULL, 'shopping_wallet', 250.00, 0.00, NULL, '2024-12-06 05:56:56', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Added fund by admin of amount 250', '1', NULL, NULL, 0, '2024-12-06 00:26:56', '2024-12-06 00:26:56'),
(13, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/kKLvfDzhTfgvmSWsceEbMe1x49VZpkKnkHl0RZcI.jpg', '2024-12-10 17:04:51', 2, 'upi', NULL, 'dsfsdfsdfdsf45345446456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:04:51', '2024-12-11 08:27:14'),
(14, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/MEZ0Sorq6vL4ow1dTU6E6waZyHslgJJjgoZAX9FS.jpg', '2024-12-10 17:13:53', 1, 'upi', NULL, 'dsfsdfsdfdsf45345446456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:13:53', '2024-12-11 08:43:17'),
(15, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/LCrQl7way0FOm2rPrrf8QKLujtyMg5MMdUUoQtoL.jpg', '2024-12-10 17:15:32', 1, 'upi', NULL, 'dsfsdfsdfdsf45345446456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:15:32', '2024-12-11 08:43:09'),
(16, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/hktfB9wTgy3sVcAxIKcCXTGl1UVAgKT6uucj4sr5.jpg', '2024-12-10 17:15:58', 1, 'bank', NULL, 'dsfsdfsdfdsf45345446456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:15:58', '2024-12-11 08:43:00'),
(17, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 1.00, 0.00, 'payment/NjDYkBTtvLsyCoLBeUpFkYVLbHTfNopE5sUZMRzt.jpg', '2024-12-10 17:18:06', 1, 'upi', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:18:06', '2024-12-11 08:42:52'),
(18, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/QWRQijjs3vmeHPe52fhAFF7i9UEeeJfNo3DfIyzE.jpg', '2024-12-10 17:18:49', 2, 'upi', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, 'testing', NULL, 0, '2024-12-10 06:18:49', '2024-12-11 08:42:11'),
(19, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/YSjkVn6hpc4dPKHG5QrzMIaSRPU6TZjZKH4mv3b1.jpg', '2024-12-10 17:23:28', 1, 'upi', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:23:28', '2024-12-11 07:56:43'),
(20, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/arepI1hyZmRCM4w8vN921zm3esXf9Ljo54QmBdx7.jpg', '2024-12-10 17:24:06', 1, 'bank', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 06:24:06', '2024-12-11 07:55:35'),
(21, NULL, '2', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/wxdkvHGVXEwtzBR8p6jRaiXwC3BJqj0xi6VcmO05.jpg', '2024-12-11 10:00:07', 1, 'upi', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-10 23:00:07', '2024-12-11 07:41:51'),
(22, NULL, '1', 'fundRequest', NULL, NULL, 'main_wallet', 100.00, 0.00, 'payment/HYfmIWpbQwaYSG2QAgCEcNZs89ed3xrzsBRPiqFn.jpg', '2024-12-11 18:20:10', 1, 'upi', NULL, 'NBVCXZXCVB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-11 07:20:10', '2024-12-11 07:42:24'),
(23, NULL, '1', 'fundRequest', NULL, NULL, 'main_wallet', 1.00, 0.00, 'payment/mxanDmRBNBUhyuhXKEWPOz1bzQgBbdyuZzGnTPVH.jpg', '2024-12-11 19:56:08', 0, 'upi', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-11 08:56:08', '2024-12-11 08:56:08'),
(24, NULL, '1', 'fundRequest', NULL, NULL, 'main_wallet', 1.00, 0.00, 'payment/BLvrYaJkhKDGh09IyZzhZrJiIkLCMckpVZ0ECWYP.jpg', '2024-12-11 19:59:21', 2, 'upi', NULL, 'sdsaasfsda4354645', NULL, NULL, NULL, NULL, NULL, 'testing request', NULL, 0, '2024-12-11 08:59:21', '2024-12-11 09:12:52'),
(25, NULL, '1', 'fundRequest', NULL, NULL, 'main_wallet', 1.00, 0.00, 'payment/v4Tixfa2mmaGJ6Ta9XEgzZjC8pCoZwLwCwy2ofUj.jpg', '2024-12-11 20:02:07', 0, 'upi', NULL, 'NBVCXZXCVB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-12-11 09:02:07', '2024-12-11 09:02:07'),
(26, NULL, '2', 'AdminFund', 'credit', NULL, 'shopping_wallet', 50000.00, 0.00, NULL, '2024-12-16 10:33:36', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Added fund by admin of amount 50000', '1', NULL, NULL, 0, '2024-12-16 05:03:36', '2024-12-16 05:03:36'),
(27, NULL, '2', 'product_purchase', 'debit', NULL, 'shopping_wallet', 2000.00, 0.00, NULL, '2024-12-16 10:34:52', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Purchase products of amount 2000 Order ID: 5 - Invoice No: INV-000005', '5', NULL, NULL, 0, '2024-12-16 05:04:52', '2024-12-16 05:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` double DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `image`, `profile_pic`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 'demoss', 'tes333wwm@gmail.comss', 3333333333, NULL, '$2y$12$YPiY7ZYQ.I7DBU3cQMbAZen9qPzUtn2XNamo.CDGvxV/WZa3rW7x6', '111111111111111111', NULL, NULL, '2024-11-28 06:22:29', '2024-12-04 01:44:43', 'HGF11111'),
(2, 'Naresh Kumar', 'nk@gmail.com', 2222222222, NULL, '$2y$12$YPiY7ZYQ.I7DBU3cQMbAZen9qPzUtn2XNamo.CDGvxV/WZa3rW7x6', NULL, NULL, NULL, '2024-12-04 23:50:44', '2024-12-09 06:02:03', 'NKH3216'),
(3, 'Gurdep singh', 'Gur@gmail.com', 8765678987, NULL, '$2y$12$Yb/NsoCUlSqy7Nu0ghtIjOXs6V29E/sSPrfnISJ1DlT/pgGUtveH2', NULL, NULL, NULL, '2024-12-05 00:01:50', '2024-12-05 00:01:50', 'GH1234'),
(4, 'Gurdep singh11', 'Gur1@gmail.com', 8765678987, NULL, '$2y$12$5LZAKDJjgX.0Ozt/6Z2sPuILXfouo9B/CZNNlmGpXv5F/MLiMg8Xm', 'wwwwwww', NULL, NULL, '2024-12-05 00:03:29', '2024-12-12 23:46:09', 'GH12341');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_code` varchar(255) DEFAULT NULL,
  `e1` double NOT NULL DEFAULT 0,
  `e2` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `u_code`, `e1`, `e2`, `created_at`, `updated_at`) VALUES
(1, '1', 250, 8800, '2024-12-03 23:48:24', '2024-12-06 00:21:54'),
(2, '2', 300, 48200, '2024-12-05 00:03:29', '2024-12-16 05:04:53'),
(3, '3', 0, 250, '2024-12-05 00:03:29', '2024-12-06 00:26:56'),
(4, '4', 0, 0, '2024-12-05 00:03:29', '2024-12-05 00:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_types`
--

CREATE TABLE `wallet_types` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `count_in_wallet` varchar(255) DEFAULT NULL,
  `wallet_type` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `wallet_column` varchar(55) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wallet_types`
--

INSERT INTO `wallet_types` (`id`, `name`, `slug`, `count_in_wallet`, `wallet_type`, `status`, `wallet_column`, `created_at`, `updated_at`) VALUES
(1, 'E- Wallet', 'main_wallet', NULL, 'wallet', 1, 'e1', '2024-12-04 10:16:10', '2024-12-04 04:46:10'),
(2, 'Shopping Wallet', 'shopping_wallet', NULL, 'wallet', 1, 'e2', '2024-12-04 10:16:10', '2024-12-04 04:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `value` varchar(500) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `website_info`
--

INSERT INTO `website_info` (`id`, `title`, `label`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Company name', 'company_name', 'Rudram Demo', 'text', 1, '2018-09-24 15:47:13', '2024-12-05 07:41:58'),
(2, 'Symbol', 'symbol', 'CPY', 'text', 1, '2018-09-24 15:47:13', '2024-12-05 07:41:58'),
(5, 'Base URL', 'base_url', 'http://127.0.0.1:8000/', 'text', 1, '2018-09-24 15:48:05', '2024-12-05 07:41:58'),
(6, 'Company Email', 'company_email', 'info@rudramsoft.com', 'text', 1, '2018-09-24 15:48:05', '2024-12-05 07:41:58'),
(7, 'Logo', 'logo', 'http://127.0.0.1:8000/front/f1/images/logo/rudram-logo.png', 'file', 1, '2018-09-24 15:48:20', '2024-12-05 07:41:58'),
(8, 'Logo height', 'logo_height', '', 'text', 1, '2018-09-24 15:48:20', '2024-12-05 07:41:58'),
(9, 'Logo width', 'logo_width', '150px', 'text', 1, '2018-09-24 15:48:35', '2024-12-05 07:41:58'),
(10, 'Company Mobile', 'company_mobile', '+91XXXXXXXXXX', 'text', 1, '2018-09-24 15:48:35', '2024-12-05 07:41:58'),
(11, 'Company title', 'title', 'Rudram Demo', 'text', 1, '2018-09-24 16:53:52', '2024-12-05 07:41:58'),
(12, 'Address', 'company_address', 'Abc, Town ,city 12345', 'text', 1, '2018-09-24 17:33:08', '2024-12-05 07:41:58'),
(13, 'User Sidebar Color', 'user_sidebar_color', '#000000', 'color', 1, '2018-09-29 22:14:45', '2024-12-05 07:41:58'),
(14, 'Telephone', 'hotline_mobile', '(+123)4 567 890', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(16, 'logo', 'footer', '', 'file', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(17, 'Panel', 'user_panel', 'p26', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(18, 'Admin', 'admin_panel', 'a1', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(19, 'Theme', 'main_theme', 'm89', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(20, 'Currency', 'currency', 'Rs.', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(21, 'Header', 'header_content', 'Welcome to Rudram Demo', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(22, 'Open Time', 'open_time', '8:00AM - 6:00PM', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(23, 'Admin', 'admin_directory', 'Admin_panel', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(24, 'Panel', 'panel_directory', 'User_panel', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(25, 'Theme', 'main_directory', 'Main', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(26, 'Panel', 'panel_path', 'user', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(27, 'Admin', 'admin_path', 'admin', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(28, 'Mailer', 'mailer_username', 'info@dd.com', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(29, 'Mailer', 'mailer_password', 'Md@#2021', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(30, 'Mailer', 'mailer_setFrom', 'support@pdd.co.in', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(31, 'Mailer', 'mailer_ReplyTo', 'support@pdd.co.in', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(32, 'News', 'news', 'Welcome to Company Name ', 'text', 1, '2020-05-11 15:20:15', '2024-12-05 07:41:58'),
(33, 'Franchise', 'franchise_path', 'franchise', 'text', 1, '2018-10-11 18:20:45', '2024-12-05 07:41:58'),
(39, 'Company GST', 'company_gst', NULL, 'text', 1, '2018-09-24 15:48:05', '2024-12-05 07:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2024-12-19 05:25:29', '2024-12-19 05:25:29'),
(2, 2, 5, '2024-12-19 22:32:02', '2024-12-19 22:32:02'),
(8, 2, 2, '2024-12-20 05:11:09', '2024-12-20 05:11:09'),
(9, 2, 6, '2024-12-20 05:17:09', '2024-12-20 05:17:09'),
(10, 2, 3, '2024-12-20 05:20:06', '2024-12-20 05:20:06'),
(11, 2, NULL, '2024-12-20 05:43:03', '2024-12-20 05:43:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_histories_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_types`
--
ALTER TABLE `wallet_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_info`
--
ALTER TABLE `website_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_types`
--
ALTER TABLE `wallet_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_info`
--
ALTER TABLE `website_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD CONSTRAINT `order_histories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
