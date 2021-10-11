-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 07:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop6`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `link`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Banner home 1', 'cua-hang', 'Banner_home_1.jpg', 1, '2021-06-14 20:50:55', '2021-06-14 21:07:52'),
(2, 'Banner trang chu 2', 'cua-hang', 'Banner_trang_chu_2.jpg', 1, '2021-06-14 20:52:15', '2021-06-14 21:26:35'),
(3, 'Banner thinh hanh cot trai', 'cua-hang', 'Banner_thinh_hanh_cot_trai.png', 1, '2021-06-14 20:56:34', '2021-08-20 11:59:12'),
(4, 'Banner thinh hanh cot phai', 'cua-hang', 'Banner_thinh_hanh_cot_phai.png', 1, '2021-08-20 11:59:55', '2021-08-20 11:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Nhãn hiệu 1', '2021-06-12 09:27:08', '2021-06-12 09:27:08', 1),
(2, 'Nhãn hiệu 2', '2021-06-12 09:27:21', '2021-06-12 09:27:21', 1),
(3, 'Nhãn hiệu 3', '2021-06-12 09:27:31', '2021-06-12 09:27:31', 0),
(4, 'Nhãn hiệu 4', '2021-06-12 22:19:31', '2021-06-12 22:19:31', 1),
(5, 'Nhãn hiệu 5', '2021-06-12 22:19:47', '2021-06-12 22:19:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `price`, `size`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'Ghế da', 'KL-AS-1', '', 10000, '', 1, '', 'dzYCWm1C4eyadAlbCZyA7JmzTLdHYgGADLkmowqC', NULL, NULL),
(2, 18, 'Xe đạp leo núi', 'KL-AS-4', '', 400000, '', 1, '', 'dzYCWm1C4eyadAlbCZyA7JmzTLdHYgGADLkmowqC', NULL, NULL),
(4, 15, 'Giày thể thao', 'KL-B-3', '', 89000, '', 1, '', 'dzYCWm1C4eyadAlbCZyA7JmzTLdHYgGADLkmowqC', NULL, NULL),
(5, 3, 'Tai nghe', 'KL-NT-1', '', 24000000, '', 1, '', 'cQ4NYzNwxu0RIDU41wjbNp6WcLCITnURsJCkckiu', NULL, NULL),
(6, 18, 'Xe đạp leo núi', 'KL-AS-4', '', 400000, '', 1, '', 'EBMtIB74jlf32FHO4KvH2Ju3NENDzgoGngsKplaM', NULL, NULL),
(7, 3, 'Tai nghe', 'KL-NT-1', '', 24000000, '', 1, 'chau@gmail.com', 'MsVwdEmb28ukihgR6N82oJGyxSPQEb4R0bp2iQ8p', NULL, NULL),
(8, 7, 'iphone 7', 'KL-AS-2', '', 2800000, '', 1, 'chau@gmail.com', 'MsVwdEmb28ukihgR6N82oJGyxSPQEb4R0bp2iQ8p', NULL, NULL),
(9, 9, 'Máy chụp hình', 'KL-VH-2', '', 2000000, '', 1, 'chau@gmail.com', 'MsVwdEmb28ukihgR6N82oJGyxSPQEb4R0bp2iQ8p', NULL, NULL),
(10, 5, 'Bộ bàn ghế', 'KL-TT-1', '', 5550000, '', 1, '', '3Iu9PEdcFTtjLw5SUcgxJmkX3L8a6t5DMpEHtKgk', NULL, NULL),
(11, 4, 'Ghế da', 'KL-AS-1', '', 10000, '', 1, '', '3Iu9PEdcFTtjLw5SUcgxJmkX3L8a6t5DMpEHtKgk', NULL, NULL),
(12, 1, 'Nón', 'KL-TN-1', '', 1800000, '', 1, '', '2CUerkibRatnggbL6VFysah6ayXqsOF6gMnQjqEP', NULL, NULL),
(13, 16, 'Giày nữ', 'KL-NT-3', '', 200000, '', 1, '', '2CUerkibRatnggbL6VFysah6ayXqsOF6gMnQjqEP', NULL, NULL),
(14, 17, 'Áo thun nữ', 'KL-TT-3', '', 300000, '', 1, 'admin@admin.com', 'Fdhoi47Zr4YTFw60FemUqTxTMy3VD3qZBlAurasT', NULL, NULL),
(15, 18, 'Xe đạp leo núi', 'KL-AS-4', '', 400000, '', 1, 'admin@admin.com', 'Fdhoi47Zr4YTFw60FemUqTxTMy3VD3qZBlAurasT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent_id`, `featured`, `created_at`, `updated_at`, `is_active`, `image`) VALUES
(1, 'Thời trang', 'Các sản phảm nội thất trong nhà đẹp,hiện đại', NULL, 1, '2021-06-12 09:02:27', '2021-08-18 04:41:22', 1, 'Thời_trang.png'),
(2, 'Thể thao', 'Các sản phẩm nội thất văn phòng hiện đại,tiện nghi', NULL, 1, '2021-06-12 09:03:50', '2021-08-18 04:42:35', 1, 'Thể_thao.png'),
(3, 'Đồ điện tử', 'Các sản phẩm nội thất ngoài trời', NULL, 0, '2021-06-12 09:05:02', '2021-08-18 04:44:22', 1, 'Đồ_điện_tử.png'),
(4, 'Đồ công nghệ', 'Hiện đại,tiện nghi,đẹp', NULL, 1, '2021-06-12 09:06:26', '2021-08-18 04:45:16', 1, 'Đồ_công_nghệ.png'),
(5, 'Đồ nội thất', 'Mẫu mã đa dạng', NULL, 0, '2021-06-12 09:07:29', '2021-08-18 04:46:21', 1, 'Đồ_nội_thất.png'),
(6, 'Nội thất bếp', 'Nhiều mẫu mã mới hiện đại', NULL, 0, '2021-06-12 09:09:44', '2021-06-13 03:24:24', 1, 'Nội_thất_bếp.jpg'),
(7, 'Trong nhà 1', NULL, 1, 1, '2021-06-14 22:23:22', '2021-06-14 22:23:22', 1, NULL),
(8, 'Trong nhà 2', NULL, 1, 1, '2021-06-14 22:23:45', '2021-06-14 22:23:45', 1, NULL),
(9, 'Trong nhà 2.1', NULL, 8, 1, '2021-06-14 22:24:05', '2021-06-14 22:24:05', 1, NULL),
(10, 'Ánh sáng 1', NULL, 4, 1, '2021-06-14 22:24:54', '2021-06-14 22:24:54', 1, NULL),
(11, 'Ánh sáng 2', NULL, 4, 1, '2021-06-14 22:25:18', '2021-06-14 22:25:18', 1, NULL),
(12, 'Bếp 1', NULL, 6, 1, '2021-06-14 22:25:52', '2021-06-14 22:25:52', 1, NULL),
(13, 'Bếp 1.1', NULL, 12, 1, '2021-06-14 22:26:21', '2021-06-14 22:26:21', 1, NULL),
(14, 'Bếp 1.2', NULL, 12, 1, '2021-06-14 22:26:42', '2021-06-14 22:26:42', 1, NULL),
(15, 'Trong nhà 2.1.1', NULL, 9, 1, '2021-06-15 22:38:52', '2021-06-15 22:38:52', 1, NULL),
(16, 'trong nha 1.1', NULL, 7, 1, '2021-06-26 03:17:17', '2021-06-26 03:17:17', 1, NULL),
(17, 'trong nha 1.2', NULL, 7, 1, '2021-06-26 03:17:39', '2021-06-26 03:17:39', 1, NULL),
(18, 'trong nha 2.2', NULL, 8, 1, '2021-06-26 03:18:07', '2021-06-26 03:18:07', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_features`
--

CREATE TABLE `category_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_type` tinyint(4) NOT NULL COMMENT '1 => text, 2 => color',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_features`
--

INSERT INTO `category_features` (`id`, `field_title`, `field_type`, `category_id`, `created_at`, `updated_at`) VALUES
(26, 'Width', 1, 2, '2021-08-18 04:42:35', '2021-08-18 04:42:35'),
(27, 'Height', 1, 2, '2021-08-18 04:42:35', '2021-08-18 04:42:35'),
(28, 'Red', 2, 2, '2021-08-18 04:42:35', '2021-08-18 04:42:35'),
(29, 'Yellow', 2, 2, '2021-08-18 04:42:35', '2021-08-18 04:42:35'),
(30, 'Red', 2, 4, '2021-08-18 04:45:16', '2021-08-18 04:45:16'),
(31, 'Blue', 2, 4, '2021-08-18 04:45:16', '2021-08-18 04:45:16'),
(32, 'Black', 2, 4, '2021-08-18 04:45:16', '2021-08-18 04:45:16'),
(33, '60x80', 1, 4, '2021-08-18 04:45:16', '2021-08-18 04:45:16'),
(34, '90x100', 1, 4, '2021-08-18 04:45:16', '2021-08-18 04:45:16'),
(45, 'blue', 2, 1, '2021-08-23 03:31:10', '2021-08-23 03:31:10'),
(46, 'red', 2, 1, '2021-08-23 03:31:10', '2021-08-23 03:31:10'),
(47, 'L', 1, 1, '2021-08-23 03:31:10', '2021-08-23 03:31:10'),
(48, 'M', 1, 1, '2021-08-23 03:31:10', '2021-08-23 03:31:10'),
(49, 'XL', 1, 1, '2021-08-23 03:31:10', '2021-08-23 03:31:10'),
(50, 'yellow', 2, 1, '2021-08-23 03:31:10', '2021-08-23 03:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `cat_news`
--

CREATE TABLE `cat_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_news`
--

INSERT INTO `cat_news` (`id`, `title`, `description`, `parent_id`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục tin tức 1', 'Đang cập nhật', NULL, NULL, 1, '2021-06-14 09:37:19', '2021-06-14 09:37:19'),
(2, 'Danh mục tin tức 2', 'Đang cập nhật', NULL, NULL, 1, '2021-06-14 09:37:42', '2021-06-14 09:37:42'),
(3, 'Danh mục tin tức 3', 'Đang cập nhật', NULL, NULL, 1, '2021-06-14 09:38:16', '2021-06-14 09:38:16'),
(4, 'Danh mục tin tức 4', 'Đang cập nhật', NULL, NULL, 1, '2021-06-14 09:38:30', '2021-06-14 09:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TP HCM', NULL, NULL),
(2, 'Hà Nội', NULL, NULL),
(3, 'Hải Phòng', NULL, NULL),
(4, 'Đà Nẵng', NULL, NULL),
(5, 'An Giang', NULL, NULL),
(6, 'Bà Rịa - Vũng Tàu', NULL, NULL),
(7, 'Bắc Giang', NULL, NULL),
(8, 'Bắc Kạn', NULL, NULL),
(9, 'Bạc Liêu', NULL, NULL),
(10, 'Bắc Ninh', NULL, NULL),
(11, 'Bến Tre', NULL, NULL),
(12, 'Bình Định', NULL, NULL),
(13, 'Bình Dương', NULL, NULL),
(14, 'Bình Phước', NULL, NULL),
(15, 'Bình Thuận', NULL, NULL),
(16, 'Cà Mau', NULL, NULL),
(17, 'Cao Bằng', NULL, NULL),
(18, 'Cần Thơ', NULL, NULL),
(19, 'Đắk Lắk', NULL, NULL),
(20, 'Đắk Nông', NULL, NULL),
(21, 'Điện Biên', NULL, NULL),
(22, 'Đồng Nai', NULL, NULL),
(23, 'Đồng Tháp', NULL, NULL),
(24, 'Gia Lai', NULL, NULL),
(25, 'Hà Giang', NULL, NULL),
(26, 'Hà Nam', NULL, NULL),
(27, 'Hà Tĩnh', NULL, NULL),
(28, 'Hải Dương', NULL, NULL),
(29, 'Hậu Giang', NULL, NULL),
(30, 'Hòa Bình', NULL, NULL),
(31, 'Hưng Yên', NULL, NULL),
(32, 'Khánh Hòa', NULL, NULL),
(33, 'Kiên Giang', NULL, NULL),
(34, 'Kon Tum', NULL, NULL),
(35, 'Lai Châu', NULL, NULL),
(36, 'Lâm Đồng', NULL, NULL),
(37, 'Lạng Sơn', NULL, NULL),
(38, 'Lào Cai', NULL, NULL),
(39, 'Long An', NULL, NULL),
(40, 'Nam Định', NULL, NULL),
(41, 'Nghệ An', NULL, NULL),
(42, 'Ninh Bình', NULL, NULL),
(43, 'Ninh Thuận', NULL, NULL),
(44, 'Phú Thọ', NULL, NULL),
(45, 'Quảng Bình', NULL, NULL),
(46, 'Quảng Nam', NULL, NULL),
(47, 'Quảng Ngãi', NULL, NULL),
(48, 'Quảng Ninh', NULL, NULL),
(49, 'Quảng Trị', NULL, NULL),
(50, 'Sóc Trăng', NULL, NULL),
(51, 'Sơn La', NULL, NULL),
(52, 'Tây Ninh', NULL, NULL),
(53, 'Thái Bình', NULL, NULL),
(54, 'Thái Nguyên', NULL, NULL),
(55, 'Thanh Hóa', NULL, NULL),
(56, 'Thừa Thiên Huế', NULL, NULL),
(57, 'Tiền Giang', NULL, NULL),
(58, 'Trà Vinh', NULL, NULL),
(59, 'Tuyên Quang', NULL, NULL),
(60, 'Vĩnh Long', NULL, NULL),
(61, 'Vĩnh Phúc', NULL, NULL),
(62, 'Yên Bái', NULL, NULL),
(63, 'Phú Yên', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `email`, `message`, `created_at`, `updated_at`, `status`) VALUES
(1, 'cuong', '1234567890', 'cuong@gmail.com', 'test', '2021-06-27 02:47:33', '2021-06-27 02:59:48', 1),
(2, 'lam', '0909090789', 'dokhaclam@gmail.com', 'test shop6', '2021-08-25 09:46:05', '2021-08-25 09:46:05', 0),
(3, 'lam', '0909090789', 'dokhaclam@gmail.com', 'test shop6', '2021-08-25 09:47:47', '2021-08-25 09:47:47', 0),
(4, 'lam', '0909090789', 'dokhaclam@gmail.com', 'test shop6', '2021-08-25 09:51:13', '2021-08-25 09:51:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'KL-10', 10, 'Phần trăm', '2021-08-31', 1, '2021-06-19 21:11:11', '2021-08-23 21:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `mobile`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 3, 'chaucuong@gmail.com', 'do chi cuong', '1111', 'TP HCM', '11', '99999', NULL, '2021-06-20 05:39:32', '2021-06-24 10:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `link`, `position`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', 'tin-tuc/giới-thiệu/5', 1, 1, '2021-08-31 22:31:12', '2021-08-31 22:41:24'),
(2, 'Liên hệ', 'lien-he', 1, 1, '2021-08-31 22:31:43', '2021-08-31 22:18:03'),
(3, 'Tin tức', 'tin-tuc', 2, 1, '2021-08-31 22:39:04', '2021-08-31 22:17:45'),
(4, 'Hướng dẫn sử dụng', 'tin-tuc/tin-tuc/1', 4, 1, '2021-08-31 21:43:28', '2021-08-31 21:43:28'),
(5, 'Đổi trả hàng', 'tin-tuc/tin-tuc/2', 4, 1, '2021-08-31 21:44:01', '2021-08-31 21:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_15_074346_create_categories_table', 1),
(5, '2021_04_15_074445_create_category_features_table', 1),
(6, '2021_04_15_074458_create_brands_table', 1),
(7, '2021_04_15_074509_create_products_table', 1),
(8, '2021_04_15_074520_create_product_gallery_table', 1),
(9, '2021_04_15_074532_create_product_features_table', 1),
(10, '2021_04_15_074547_create_shopping_cart_table', 1),
(11, '2021_04_15_074600_create_shipping_addresses_table', 1),
(12, '2021_04_15_074611_create_payment_methods_table', 1),
(13, '2021_04_15_074625_create_orders_table', 1),
(14, '2021_04_15_075024_create_order_details_table', 1),
(15, '2021_04_15_075358_add_is_super_admin_to_users_table', 1),
(16, '2021_04_15_081910_create_sliders_table', 1),
(17, '2021_04_15_082817_create_tags_table', 1),
(18, '2021_04_15_083020_create_product_tag_table', 1),
(19, '2021_04_15_154917_create_reviews_table', 1),
(20, '2021_04_15_180349_create_permission_tables', 1),
(21, '2021_04_15_181942_create_settings_table', 1),
(22, '2021_04_17_083013_add_column_to_users_table', 1),
(23, '2021_04_17_092235_add_column_image_to_users_table', 1),
(24, '2021_04_20_174144_add_column_is_active_to_categories_tables', 1),
(25, '2021_04_22_064327_add_column_is_active_to_brands_table', 1),
(26, '2021_04_22_174304_add_column_is_active_to_sliders_table', 1),
(27, '2021_04_22_174443_add_column_names_to_sliders_table', 1),
(28, '2021_04_23_160522_add_colunm_image_to_categories_table', 1),
(29, '2021_04_23_160615_add_colunm_is_active_to_settings_table', 1),
(30, '2021_04_23_170446_add_colunm_type_to_settings_table', 1),
(31, '2021_04_24_074228_add_column_is_active_to_products_table', 1),
(32, '2021_04_24_095459_add_column_image_to_products_table', 1),
(33, '2021_04_27_171122_create_coupon_table', 1),
(34, '2021_05_01_100133_add_column_namefour_to_sliders_table', 1),
(35, '2021_05_06_082553_add_column_new_to_products_table', 1),
(36, '2021_05_06_162729_add_column_additional_to_products_table', 1),
(37, '2021_05_07_075039_create_cart_table', 1),
(38, '2021_05_13_173237_add_column_info_address_to_users_table', 1),
(39, '2021_05_13_173711_add_column_mobile_to_users_table', 1),
(40, '2021_05_13_193054_create_city_table', 1),
(41, '2021_05_14_160953_create_delivery_address_table', 1),
(42, '2021_05_17_050030_add_column_extra_to_orders_table', 1),
(43, '2021_05_17_051803_create_orders_products_table', 1),
(44, '2021_05_17_100040_add_column_color_to_orders_products_table', 1),
(45, '2021_05_18_102058_add_column_ma_order_to_orders_table', 1),
(46, '2021_05_19_111035_add_column_rating_to_products_table', 1),
(47, '2021_05_19_124642_add_column_status_to_reviews_table', 1),
(48, '2021_05_25_103953_create_cat_news_controllers_table', 1),
(49, '2021_05_25_171301_create_news_table', 1),
(50, '2021_05_26_093117_create_taggable_table', 1),
(51, '2021_05_28_051539_create_contacts_table', 1),
(52, '2021_05_30_173850_add_column_noi_bat_to_products_table', 1),
(53, '2021_05_30_174008_add_column_product_id_to_orders_table', 1),
(54, '2021_06_03_123342_add_column_status_to_contacts_table', 1),
(55, '2021_06_03_174731_create_newsletters_table', 1),
(56, '2021_06_03_184827_add_column_status_to_newsletters_table', 1),
(57, '2021_06_12_092146_add_column_price_bigint_to_products_table', 2),
(58, '2021_06_14_172642_create_banners_table', 3),
(59, '2021_06_21_074625_create_orders_table', 4),
(60, '2021_06_21_102058_add_column_ma_order_to_orders_table', 5),
(61, '2021_06_25_174738_add_column_note_to_orders_table', 6),
(62, '2021_08_31_115751_add_column_views_to_products_table', 7),
(63, '2021_09_01_052550_create_links_table', 8),
(64, '2021_09_01_054032_create_links_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cat_news_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `cat_news_id`, `title`, `description`, `content`, `image_path`, `image_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Tin tức 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat.', '<div class=\"blog-post-content-inner\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat.</p>\r\n</div>\r\n<div class=\"single-post-content\">\r\n<p class=\"quate-speech\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p><img src=\"/shop3/public/storage/photos/1/news/blog-13.jpg\" alt=\"\" width=\"450\" height=\"277\" /></p>\r\n<p>&nbsp;</p>\r\n</div>', NULL, 'Tin_tức_1.jpg', 1, '2021-06-14 09:46:25', '2021-06-14 09:47:44'),
(2, 1, 2, 'Tin tức 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua', '<p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua.&nbsp;</p>', NULL, 'Tin_tức_2.jpg', 1, '2021-06-14 09:48:45', '2021-06-26 21:36:16'),
(3, 1, 3, 'Tin tức 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua.', '<p><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. &nbsp; &nbsp;&nbsp;</p>', NULL, 'Tin_tức_3.jpg', 1, '2021-06-14 09:49:57', '2021-06-26 21:36:33'),
(4, 1, 4, 'Tin tức 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua.', '<p><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in rep rehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiumod tempor incididunt ut labore et dolore magna aliqua. &nbsp; &nbsp;&nbsp;</p>', NULL, 'Tin_tức_4.jpg', 1, '2021-06-14 09:50:30', '2021-06-26 21:36:46'),
(5, 1, 1, 'Giới thiệu', 'Đang cập nhật mô tả', '<p>nội dung đang cập nhật</p>\r\n<p><img src=\"/shop3/public/storage/photos/1/news/blog-13.jpg\" alt=\"\" width=\"450\" height=\"277\" /></p>', NULL, 'Giới_thiệu.jpg', 1, '2021-06-26 21:07:26', '2021-06-26 21:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'chau@gmail.com', '2021-06-27 03:09:40', '2021-06-27 03:09:40', 0),
(2, 'cuong@gmail.com', '2021-06-27 03:10:22', '2021-06-27 03:10:22', 0),
(3, 'thy@gmail.com', '2021-06-27 03:14:51', '2021-06-27 03:14:51', 0),
(4, 'quyen@gmail.com', '2021-08-25 10:36:03', '2021-08-25 10:36:03', 0),
(5, 'dochicuong@gmail.com', '2021-08-25 10:36:52', '2021-08-25 10:36:52', 0),
(6, 'lethihien@gmail.com', '2021-08-25 10:48:01', '2021-08-25 10:48:01', 0),
(7, 'thanh@gmail.com', '2021-08-25 10:50:21', '2021-08-25 10:50:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_price` bigint(20) NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ma_order` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `user_email`, `name`, `address`, `city`, `state`, `mobile`, `postal_code`, `shipping_charges`, `coupon_code`, `coupon_amount`, `payment_method`, `created_at`, `updated_at`, `ma_order`, `product_id`, `note`) VALUES
(60, 3, 'Hoàn thành', 1170000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, 'KL-10', 130000.00, 'Sau khi nhận hàng', '2021-06-24 11:40:24', '2021-06-25 11:34:18', 'KL-W3rHHKoZVz0', NULL, 'cap nhat so luong san pham'),
(61, 3, 'Đang xử lý', 879000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', '2021-06-24 11:43:20', '2021-06-24 11:43:20', 'KL-m0lo3oubFgl', NULL, NULL),
(62, 3, 'Đang xử lý', 1320000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', '2021-08-24 02:58:13', '2021-08-24 02:58:13', 'KL-77UiUCdUfYI', NULL, NULL),
(63, 3, 'Đang xử lý', 1320000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', '2021-08-24 02:59:47', '2021-08-24 02:59:47', 'KL-A0JWBwG3oP7', NULL, NULL),
(64, 3, 'Đang xử lý', 2700000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, 'KL-10', 300000.00, 'Sau khi nhận hàng', '2021-08-24 03:33:26', '2021-08-24 03:33:26', 'KL-f1SgbTmtR3j', NULL, NULL),
(65, 3, 'Đang xử lý', 1800000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, 'KL-10', 200000.00, 'Sau khi nhận hàng', '2021-08-24 03:35:10', '2021-08-24 03:35:10', 'KL-1Z7T0ejIopH', NULL, NULL),
(66, 3, 'Đang xử lý', 689000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', '2021-08-31 22:01:41', '2021-08-31 22:01:41', 'KL-HRJAJxRnrE5', NULL, NULL),
(67, 3, 'Đang xử lý', 400000, 'chau@gmail.com', 'le thi minh chau', '111/222', 'Hà Nội', '1111', '999999', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', '2021-08-31 22:06:30', '2021-08-31 22:06:30', 'KL-a04cgNckOnp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`, `product_color`) VALUES
(220, 60, 3, 18, 'KL-AS-4', 'Sản phẩm ánh sáng 4', '', 400000, 1, '2021-06-24 11:40:24', '2021-06-24 11:40:24', ''),
(221, 60, 3, 17, 'KL-TT-3', 'Sản phẩm treo tường 3', '', 300000, 1, '2021-06-24 11:40:24', '2021-06-24 11:40:24', ''),
(222, 60, 3, 16, 'KL-NT-3', 'Sản phẩm ngoài trời 3', '', 200000, 3, '2021-06-24 11:40:24', '2021-06-24 11:40:24', ''),
(223, 61, 3, 15, 'KL-B-3', 'Sản phẩm bếp 3', '', 89000, 1, '2021-06-24 11:43:20', '2021-06-24 11:43:20', ''),
(224, 61, 3, 13, 'KL-TT-2', 'Sản phẩm treo tường 2', '', 400000, 1, '2021-06-24 11:43:20', '2021-06-24 11:43:20', ''),
(225, 61, 3, 14, 'KL-TN-3', 'Sản phẩm trong nhà 3', '', 45000, 2, '2021-06-24 11:43:20', '2021-06-24 11:43:20', ''),
(226, 61, 3, 17, 'KL-TT-3', 'Sản phẩm treo tường 3', '', 300000, 1, '2021-06-24 11:43:20', '2021-06-24 11:43:20', ''),
(227, 62, 3, 4, 'KL-AS-1', 'Ghế da', '', 10000, 10, '2021-08-24 02:58:13', '2021-08-24 02:58:13', ''),
(228, 62, 3, 17, 'KL-TT-3', 'Áo thun nữ', 'L', 610000, 2, '2021-08-24 02:58:13', '2021-08-24 02:58:13', 'blue'),
(229, 63, 3, 4, 'KL-AS-1', 'Ghế da', '', 10000, 10, '2021-08-24 02:59:47', '2021-08-24 02:59:47', ''),
(230, 63, 3, 17, 'KL-TT-3', 'Áo thun nữ', 'L', 610000, 2, '2021-08-24 02:59:47', '2021-08-24 02:59:47', 'blue'),
(231, 64, 3, 16, 'KL-NT-3', 'Giày nữ', '', 200000, 15, '2021-08-24 03:33:26', '2021-08-24 03:33:26', ''),
(232, 65, 3, 13, 'KL-TT-2', 'Sofa văn phòng', '', 400000, 5, '2021-08-24 03:35:10', '2021-08-24 03:35:10', ''),
(233, 66, 3, 18, 'KL-AS-4', 'Xe đạp leo núi', '', 400000, 1, '2021-08-31 22:01:41', '2021-08-31 22:01:41', ''),
(234, 66, 3, 16, 'KL-NT-3', 'Giày nữ', '', 200000, 1, '2021-08-31 22:01:41', '2021-08-31 22:01:41', ''),
(235, 66, 3, 15, 'KL-B-3', 'Giày thể thao', '', 89000, 1, '2021-08-31 22:01:41', '2021-08-31 22:01:41', ''),
(236, 67, 3, 18, 'KL-AS-4', 'Xe đạp leo núi', '', 400000, 1, '2021-08-31 22:06:30', '2021-08-31 22:06:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', 'paypal', NULL, NULL),
(2, 'Pay on delivery', 'cash', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_product', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(2, 'edit_product', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(3, 'delete_product', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(4, 'list_product', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(5, 'create_slider', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(6, 'edit_slider', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(7, 'delete_slider', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(8, 'list_slider', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(9, 'create_category', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(10, 'edit_category', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(11, 'delete_category', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43'),
(12, 'list_category', 'web', '2021-06-12 03:13:43', '2021-06-12 03:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_start_date` date DEFAULT NULL,
  `discount_end_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(4) NOT NULL DEFAULT '1',
  `additional` text COLLATE utf8mb4_unicode_ci,
  `noi_bat` tinyint(4) NOT NULL DEFAULT '1',
  `price` bigint(20) NOT NULL,
  `pro_total_rating` int(11) NOT NULL DEFAULT '1' COMMENT 'Tổng số đánh giá',
  `pro_total_number` int(11) NOT NULL DEFAULT '1' COMMENT 'Tổng số đánh giá',
  `trend` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `amount`, `discount`, `discount_start_date`, `discount_end_date`, `created_by`, `category_id`, `brand_id`, `product_code`, `featured`, `created_at`, `updated_at`, `is_active`, `image`, `new`, `additional`, `noi_bat`, `price`, `pro_total_rating`, `pro_total_number`, `trend`, `views`) VALUES
(1, 'Nón', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress<img src=\"/shop3/public/storage/photos/1/product/7.jpg\" alt=\"\" width=\"800\" height=\"800\" /></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', 20, 10, '2021-06-18', '2021-06-23', 1, 1, 2, 'KL-TN-1', 1, '2021-06-12 09:31:16', '2021-08-31 10:47:58', 1, 'Nón.jpg', 1, 'Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco\r\n\r\n    - 0.5 mm Dail\r\n    - Inspired vector icons\r\n    - Very modern style', 1, 2000000, 1, 1, 1, 5),
(2, 'Máy hút bụi', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 59, 10, NULL, NULL, 1, 3, 1, 'KL-VH-1', 1, '2021-06-12 21:34:12', '2021-08-31 10:47:47', 1, 'Máy_hút_bụi.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 600000, 1, 1, 1, 3),
(3, 'Tai nghe', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 50, 20, NULL, NULL, 1, 4, 3, 'KL-NT-1', 1, '2021-06-12 21:36:48', '2021-08-31 22:18:15', 1, 'Tai_nghe.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 30000000, 1, 1, 1, 9),
(4, 'Ghế da', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 80, 50, NULL, NULL, 1, 5, 1, 'KL-AS-1', 1, '2021-06-12 21:39:18', '2021-08-20 12:03:52', 1, 'Ghế_da.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 20000, 1, 1, 1, 1),
(5, 'Bộ bàn ghế', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 80, 0, NULL, NULL, 1, 5, 2, 'KL-TT-1', 1, '2021-06-12 21:42:46', '2021-08-31 10:46:40', 1, 'Bộ_bàn_ghế.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 5550000, 1, 1, 1, 3),
(6, 'Máy in', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 90, 25, NULL, NULL, 1, 4, 1, 'KL-B-1', 1, '2021-06-12 21:44:56', '2021-08-31 10:46:25', 1, 'Máy_in.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 600000, 1, 1, 0, 6),
(7, 'iphone 7', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 67, 60, NULL, NULL, 1, 4, 1, 'KL-AS-2', 1, '2021-06-12 22:18:56', '2021-08-18 09:58:40', 1, 'iphone_7.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 7000000, 1, 1, 0, 1),
(8, 'Máy matxa', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 10, 10, NULL, NULL, 1, 3, 4, 'KL-TN-2', 1, '2021-06-12 22:21:56', '2021-08-18 09:56:43', 1, 'Máy_matxa.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 7890000, 1, 1, 0, 1),
(9, 'Máy chụp hình', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 10, 0, NULL, NULL, 1, 4, 2, 'KL-VH-2', 1, '2021-06-12 22:24:17', '2021-08-18 10:08:04', 1, 'Máy_chụp_hình.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 2000000, 1, 1, 0, 1),
(10, 'Laptop dell', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 90, 40, NULL, NULL, 1, 4, 5, 'KL-NT-2', 1, '2021-06-12 22:26:35', '2021-08-18 10:06:58', 1, 'Laptop_dell.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 50000000, 1, 1, 0, 1),
(11, 'Laptop hp', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n<p><img src=\"/shop3/public/storage/photos/1/product/19.jpg\" alt=\"\" width=\"360\" height=\"360\" /></p>\r\n</div>\r\n</div>', 70, 80, NULL, NULL, 1, 4, 5, 'KL-B-2', 1, '2021-06-12 22:30:17', '2021-08-20 11:35:15', 1, 'Laptop_hp.jpg', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 888800, 1, 1, 1, 1),
(12, 'Máy đo điện tử', '<p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>\r\n<div class=\"pro-details-list\">\r\n<ul>\r\n<li>- 0.5 mm Dail</li>\r\n<li>- Inspired vector icons</li>\r\n<li>- Very modern style</li>\r\n</ul>\r\n</div>', 90, 10, NULL, NULL, 1, 3, 1, 'KL-AS-3', 1, '2021-06-13 02:41:30', '2021-08-20 11:33:59', 1, 'Máy_đo_điện_tử.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 900000, 2, 3, 1, 1),
(13, 'Sofa văn phòng', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 90, 0, NULL, NULL, 1, 5, 5, 'KL-TT-2', 1, '2021-06-13 02:44:07', '2021-08-20 11:32:54', 1, 'Sofa_văn_phòng.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 400000, 1, 1, 1, 1),
(14, 'Ghế nội thất văn phòng', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 90, 0, NULL, NULL, 1, 5, 2, 'KL-TN-3', 1, '2021-06-13 02:47:01', '2021-08-20 11:31:50', 1, 'Ghế_nội_thất_văn_phòng.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 45000, 1, 1, 1, 1),
(15, 'Giày thể thao', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 90, 0, NULL, NULL, 1, 2, 3, 'KL-B-3', 1, '2021-06-13 02:49:21', '2021-08-31 10:18:49', 1, 'Giày_thể_thao.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 89000, 2, 5, 1, 2),
(16, 'Giày nữ', '<p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>\r\n<div class=\"pro-details-list\">\r\n<ul>\r\n<li>- 0.5 mm Dail</li>\r\n<li>- Inspired vector icons</li>\r\n<li>- Very modern style</li>\r\n</ul>\r\n</div>', 87, 90, NULL, NULL, 1, 1, 2, 'KL-NT-3', 1, '2021-06-13 04:11:23', '2021-08-31 10:48:57', 1, 'Giày_nữ.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 2000000, 3, 9, 1, 2),
(17, 'Áo thun nữ', '<div id=\"des-details2\" class=\"tab-pane active\">\r\n<div class=\"product-anotherinfo-wrapper\">\r\n<ul>\r\n<li>Weight 400 g</li>\r\n<li>Dimensions10 x 10 x 15 cm</li>\r\n<li>Materials 60% cotton, 40% polyester</li>\r\n<li>Other Info American heirloom jean shorts pug seitan letterpress</li>\r\n</ul>\r\n</div>\r\n</div>', 79, 50, NULL, NULL, 1, 1, 5, 'KL-TT-3', 1, '2021-06-13 04:13:33', '2021-08-31 21:45:15', 1, 'Áo_thun_nữ.jpg', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n\r\nut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt', 1, 600000, 1, 1, 1, 5),
(18, 'Xe đạp leo núi', '<div id=\"des-details1\" class=\"tab-pane active\">\r\n<div class=\"product-description-wrapper\">\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>\r\n<p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>\r\n</div>\r\n</div>', 889, 80, NULL, NULL, 1, 2, 4, 'KL-AS-4', 1, '2021-06-13 04:15:24', '2021-09-02 04:44:11', 1, 'Xe_đạp_leo_núi.jpg', 1, 'Weight 400 g\r\n    Dimensions10 x 10 x 15 cm\r\n    Materials 60% cotton, 40% polyester\r\n    Other Info American heirloom jean shorts pug seitan letterpress', 1, 2000000, 6, 17, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `field_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `field_id`, `field_value`, `created_at`, `updated_at`) VALUES
(1, 18, 26, '200', '2021-08-23 03:33:02', '2021-08-23 03:33:02'),
(2, 18, 27, '300', '2021-08-23 03:33:02', '2021-08-23 03:33:02'),
(11, 17, 45, '#260ce9', '2021-08-23 03:32:06', '2021-08-23 03:32:06'),
(12, 17, 46, '#e70817', '2021-08-23 03:32:06', '2021-08-23 03:32:06'),
(13, 17, 47, '610000', '2021-08-23 03:32:06', '2021-08-23 03:32:06'),
(14, 17, 48, '590000', '2021-08-23 03:32:06', '2021-08-23 03:32:06'),
(15, 17, 49, '700000', '2021-08-23 03:32:06', '2021-08-23 03:32:06'),
(16, 17, 50, '#d3e109', '2021-08-23 03:32:06', '2021-08-23 03:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(143, '16293982965d44ee6f2c3f71b73125876103c8f6c4.jpg', 18, '2021-08-19 11:38:16', '2021-08-19 11:38:16'),
(144, '16293982968b6dd7db9af49e67306feb59a8bdc52c.jpg', 18, '2021-08-19 11:38:16', '2021-08-19 11:38:16'),
(145, '1629398296024d7f84fff11dd7e8d9c510137a2381.jpg', 18, '2021-08-19 11:38:16', '2021-08-19 11:38:16'),
(146, '1629398382291597a100aadd814d197af4f4bab3a7.jpg', 17, '2021-08-19 11:39:42', '2021-08-19 11:39:42'),
(147, '162939838208419be897405321542838d77f855226.jpg', 17, '2021-08-19 11:39:42', '2021-08-19 11:39:42'),
(148, '16293983826cfe0e6127fa25df2a0ef2ae1067d915.jpg', 17, '2021-08-19 11:39:42', '2021-08-19 11:39:42'),
(149, '16294840901651cf0d2f737d7adeab84d339dbabd3.jpg', 16, '2021-08-20 11:28:10', '2021-08-20 11:28:10'),
(150, '1629484090bd4c9ab730f5513206b999ec0d90d1fb.jpg', 16, '2021-08-20 11:28:10', '2021-08-20 11:28:10'),
(151, '1629484090d14220ee66aeec73c49038385428ec4c.jpg', 16, '2021-08-20 11:28:10', '2021-08-20 11:28:10'),
(152, '16294842190d3180d672e08b4c5312dcdafdf6ef36.jpg', 15, '2021-08-20 11:30:19', '2021-08-20 11:30:19'),
(153, '1629484219109a0ca3bc27f3e96597370d5c8cf03d.jpg', 15, '2021-08-20 11:30:19', '2021-08-20 11:30:19'),
(154, '16294842195ec91aac30eae62f4140325d09b9afd0.jpg', 15, '2021-08-20 11:30:19', '2021-08-20 11:30:19'),
(155, '16294843105ea1649a31336092c05438df996a3e59.jpg', 14, '2021-08-20 11:31:50', '2021-08-20 11:31:50'),
(156, '1629484310a64c94baaf368e1840a1324e839230de.jpg', 14, '2021-08-20 11:31:50', '2021-08-20 11:31:50'),
(157, '1629484310dc6a6489640ca02b0d42dabeb8e46bb7.jpg', 14, '2021-08-20 11:31:50', '2021-08-20 11:31:50'),
(158, '1629484374a64c94baaf368e1840a1324e839230de.jpg', 13, '2021-08-20 11:32:54', '2021-08-20 11:32:54'),
(159, '16294843748e82ab7243b7c66d768f1b8ce1c967eb.jpg', 13, '2021-08-20 11:32:54', '2021-08-20 11:32:54'),
(160, '162948437449ae49a23f67c759bf4fc791ba842aa2.jpg', 13, '2021-08-20 11:32:54', '2021-08-20 11:32:54'),
(161, '1629484439539fd53b59e3bb12d203f45a912eeaf2.jpg', 12, '2021-08-20 11:33:59', '2021-08-20 11:33:59'),
(162, '16294844399fc3d7152ba9336a670e36d0ed79bc43.jpg', 12, '2021-08-20 11:33:59', '2021-08-20 11:33:59'),
(163, '16294844391f50893f80d6830d62765ffad7721742.jpg', 12, '2021-08-20 11:33:59', '2021-08-20 11:33:59'),
(164, '16294845159c838d2e45b2ad1094d42f4ef36764f6.jpg', 11, '2021-08-20 11:35:15', '2021-08-20 11:35:15'),
(165, '1629484515303ed4c69846ab36c2904d3ba8573050.jpg', 11, '2021-08-20 11:35:15', '2021-08-20 11:35:15'),
(166, '1629484515e836d813fd184325132fca8edcdfb40e.jpg', 11, '2021-08-20 11:35:15', '2021-08-20 11:35:15'),
(167, '1629485790eb6fdc36b281b7d5eabf33396c2683a2.jpg', 10, '2021-08-20 11:56:30', '2021-08-20 11:56:30'),
(168, '16294857901f50893f80d6830d62765ffad7721742.jpg', 10, '2021-08-20 11:56:30', '2021-08-20 11:56:30'),
(169, '1629485790e7f8a7fb0b77bcb3b283af5be021448f.jpg', 10, '2021-08-20 11:56:30', '2021-08-20 11:56:30'),
(170, '1629485882c24cd76e1ce41366a4bbe8a49b02a028.jpg', 9, '2021-08-20 11:58:02', '2021-08-20 11:58:02'),
(171, '162948588226e359e83860db1d11b6acca57d8ea88.jpg', 9, '2021-08-20 11:58:02', '2021-08-20 11:58:02'),
(172, '16294858826e2713a6efee97bacb63e52c54f0ada0.jpg', 9, '2021-08-20 11:58:02', '2021-08-20 11:58:02'),
(173, '1629485984eefc9e10ebdc4a2333b42b2dbb8f27b6.jpg', 8, '2021-08-20 11:59:44', '2021-08-20 11:59:44'),
(174, '1629485984ac1dd209cbcc5e5d1c6e28598e8cbbe8.jpg', 8, '2021-08-20 11:59:44', '2021-08-20 11:59:44'),
(175, '162948598439059724f73a9969845dfe4146c5660e.jpg', 8, '2021-08-20 11:59:45', '2021-08-20 11:59:45'),
(176, '1629486042c4b31ce7d95c75ca70d50c19aef08bf1.jpg', 7, '2021-08-20 12:00:42', '2021-08-20 12:00:42'),
(177, '1629486042b2eb7349035754953b57a32e2841bda5.jpg', 7, '2021-08-20 12:00:42', '2021-08-20 12:00:42'),
(178, '16294860426c29793a140a811d0c45ce03c1c93a28.jpg', 7, '2021-08-20 12:00:42', '2021-08-20 12:00:42'),
(179, '1629486115f7664060cc52bc6f3d620bcedc94a4b6.jpg', 6, '2021-08-20 12:01:55', '2021-08-20 12:01:55'),
(180, '1629486115eb160de1de89d9058fcb0b968dbbbd68.jpg', 6, '2021-08-20 12:01:55', '2021-08-20 12:01:55'),
(181, '16294861153644a684f98ea8fe223c713b77189a77.jpg', 6, '2021-08-20 12:01:55', '2021-08-20 12:01:55'),
(182, '1629486178c9e1074f5b3f9fc8ea15d152add07294.jpg', 5, '2021-08-20 12:02:58', '2021-08-20 12:02:58'),
(183, '162948617846922a0880a8f11f8f69cbb52b1396be.jpg', 5, '2021-08-20 12:02:58', '2021-08-20 12:02:58'),
(184, '1629486178cdc0d6e63aa8e41c89689f54970bb35f.jpg', 5, '2021-08-20 12:02:58', '2021-08-20 12:02:58'),
(185, '16294862329f53d83ec0691550f7d2507d57f4f5a2.jpg', 4, '2021-08-20 12:03:52', '2021-08-20 12:03:52'),
(186, '16294862326395ebd0f4b478145ecfbaf939454fa4.jpg', 4, '2021-08-20 12:03:52', '2021-08-20 12:03:52'),
(187, '16294862323621f1454cacf995530ea53652ddf8fb.jpg', 4, '2021-08-20 12:03:52', '2021-08-20 12:03:52'),
(188, '1629486285c8c41c4a18675a74e01c8a20e8a0f662.jpg', 3, '2021-08-20 12:04:45', '2021-08-20 12:04:45'),
(189, '1629486285d240e3d38a8882ecad8633c8f9c78c9b.jpg', 3, '2021-08-20 12:04:45', '2021-08-20 12:04:45'),
(190, '1629486285bea5955b308361a1b07bc55042e25e54.jpg', 3, '2021-08-20 12:04:45', '2021-08-20 12:04:45'),
(191, '16294863509fc3d7152ba9336a670e36d0ed79bc43.jpg', 2, '2021-08-20 12:05:50', '2021-08-20 12:05:50'),
(192, '1629486350ba2fd310dcaa8781a9a652a31baf3c68.jpg', 2, '2021-08-20 12:05:50', '2021-08-20 12:05:50'),
(193, '16294863505f2c22cb4a5380af7ca75622a6426917.jpg', 2, '2021-08-20 12:05:50', '2021-08-20 12:05:50'),
(194, '162948640528f0b864598a1291557bed248a998d4e.jpg', 1, '2021-08-20 12:06:45', '2021-08-20 12:06:45'),
(195, '1629486405ccb0989662211f61edae2e26d58ea92f.jpg', 1, '2021-08-20 12:06:45', '2021-08-20 12:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`, `status`) VALUES
(1, 16, 3, 3, 'sản phẩm bình thường', '2021-06-23 02:45:29', '2021-06-23 02:45:29', 0),
(2, 16, 2, 5, 'sản phẩm tuyệt vời', '2021-06-23 02:48:12', '2021-06-23 02:48:12', 0),
(3, 15, 2, 4, 'san pham tot', '2021-06-23 04:35:27', '2021-06-23 04:35:27', 0),
(4, 12, 2, 2, 'san pham tam duoc', '2021-06-23 05:09:20', '2021-06-23 05:09:20', 0),
(5, 18, 3, 2, 'tét danh giá shop 6 tam duoc', '2021-08-30 04:40:46', '2021-08-30 04:40:46', 0),
(6, 18, 3, 1, 'san pham khong tot lam', '2021-08-31 03:50:05', '2021-08-31 03:50:05', 0),
(7, 18, 3, 3, 'tam duoc', '2021-08-31 04:08:03', '2021-08-31 04:08:03', 0),
(8, 18, 2, 5, 'san pham tuyet voi', '2021-08-31 04:10:19', '2021-08-31 04:10:19', 0),
(9, 18, 2, 5, 'tuyet ovi', '2021-08-31 04:11:13', '2021-08-31 04:11:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`, `is_active`, `type`) VALUES
(1, 'Vận chuyển', 'Miễn phí vận chuyển hóa đơn trên 200 ngàn', '2021-06-18 09:15:04', '2021-06-18 09:15:04', 1, 'Textarea'),
(2, 'Đổi trả hàng', 'Đổi trả hàng lỗi trong 30 ngày', '2021-06-18 09:17:25', '2021-06-18 09:17:25', 1, 'Textarea'),
(3, 'Bảo mật', 'Chúng tôi bảo mật thông tin khách hàng khi thanh toán!', '2021-06-18 09:20:37', '2021-06-18 09:20:37', 1, 'Textarea'),
(4, 'Hỗ trợ khách hàng', 'Công ty hỗ trợ 24/7, làm việc các ngày trong tuân', '2021-08-25 11:14:04', '2021-08-25 11:14:04', 1, 'Textarea'),
(5, 'Khuyến mãi', 'Công ty chúng tôi luôn có các chương trình khuyến mãi hàng tháng', '2021-08-25 11:15:15', '2021-08-25 11:15:15', 1, 'Textarea');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `nametwo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namethree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `content`, `image_path`, `image_name`, `created_at`, `updated_at`, `is_active`, `nametwo`, `namethree`, `namefour`) VALUES
(1, 'Nơi mua sắm uy tín', 'Aliquam sed arcu a elit porttitor mattis eu id nibh. Vestibulum ultricies nulla sed dapibus vestibulum.', '<p>Đang cập nhật</p>\r\n<p><img src=\"/shop6/public/storage/photos/1/sliders/electronic_01.jpg\" alt=\"\" width=\"800\" height=\"923\" /></p>', NULL, 'Nơi_mua_sắm_uy_tín.jpg', '2021-06-13 21:39:41', '2021-08-18 05:08:42', 1, 'Chất lượng', 'Tiện lợi', 'cua-hang'),
(2, 'Bộ sưu tập mới', 'Aliquam sed arcu a elit porttitor mattis eu id nibh. Vestibulum ultricies nulla sed dapibus vestibulum.', '<p>Đang cập nhật</p>', NULL, 'Bộ_sưu_tập_mới.jpg', '2021-06-13 21:43:02', '2021-08-18 05:10:01', 1, 'Hiện đại', 'Thư giãn với ghế mới', 'cua-hang');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`id`, `tag_id`, `taggable_type`, `taggable_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\News', 1, '2021-06-14 09:46:25', '2021-06-14 09:46:25'),
(2, 2, 'App\\Models\\News', 1, '2021-06-14 09:46:25', '2021-06-14 09:46:25'),
(3, 3, 'App\\Models\\News', 2, '2021-06-14 09:48:46', '2021-06-14 09:48:46'),
(4, 2, 'App\\Models\\News', 2, '2021-06-14 09:48:46', '2021-06-14 09:48:46'),
(5, 4, 'App\\Models\\News', 3, '2021-06-14 09:49:57', '2021-06-14 09:49:57'),
(6, 5, 'App\\Models\\News', 3, '2021-06-14 09:49:57', '2021-06-14 09:49:57'),
(7, 1, 'App\\Models\\News', 4, '2021-06-14 09:50:30', '2021-06-14 09:50:30'),
(8, 2, 'App\\Models\\News', 4, '2021-06-14 09:50:30', '2021-06-14 09:50:30'),
(9, 3, 'App\\Models\\News', 4, '2021-06-14 09:50:30', '2021-06-14 09:50:30'),
(10, 6, 'App\\Models\\News', 5, '2021-06-26 21:07:27', '2021-06-26 21:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'đèn', '2021-06-14 09:46:25', '2021-06-14 09:46:25'),
(2, 'ghe', '2021-06-14 09:46:25', '2021-06-14 09:46:25'),
(3, 'bàn', '2021-06-14 09:48:45', '2021-06-14 09:48:45'),
(4, 'đồng hồ', '2021-06-14 09:49:57', '2021-06-14 09:49:57'),
(5, 'giường', '2021-06-14 09:49:57', '2021-06-14 09:49:57'),
(6, 'gioi-thieu', '2021-06-26 21:07:26', '2021-06-26 21:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_super_admin`, `is_active`, `image`, `address`, `country`, `city`, `postal_code`, `state`, `mobile`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$wDY6X5.xxXCIBKGmnKwjgufClU8UMiL.kp4BWzYebLN0Y3ulMCsHW', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'cuong', 'cuong@gmail.com', NULL, '$2y$10$Zv19bfMiSgrt5vmtCRBC0.lW2Yua.DyIWQ35eoHrDOUqvQ17gpI8q', NULL, '2021-06-17 09:09:04', '2021-06-20 23:07:18', 0, 1, NULL, '345', NULL, 'TP HCM', NULL, '3', '0909090'),
(3, 'le thi minh chau', 'chau@gmail.com', NULL, '$2y$10$jsTesBBUVIl3VeQb5Zn5q.pltrlWwDMceH9Wk2GlyyoHdnB/7NfUG', NULL, '2021-06-17 09:15:55', '2021-08-31 22:06:30', 0, 1, '1624513534_.png', '111/222', NULL, 'Hà Nội', NULL, '1111', '999999'),
(4, 'tuan', 'tuan@gmail.com', NULL, '$2y$10$Kda9MPneQZ2ThgyzuzOWmOQ9.spqKjMGzMTQK9ydeuGVehvLFHPU6', NULL, '2021-08-21 10:27:58', '2021-08-21 10:27:58', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_features`
--
ALTER TABLE `category_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_features_category_id_foreign` (`category_id`);

--
-- Indexes for table `cat_news`
--
ALTER TABLE `cat_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_news_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`),
  ADD KEY `news_cat_news_id_foreign` (`cat_news_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_slug_unique` (`slug`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_features_product_id_foreign` (`product_id`),
  ADD KEY `product_features_field_id_foreign` (`field_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_gallery_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tag_product_id_foreign` (`product_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_setting_key_unique` (`setting_key`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_cart_user_id_foreign` (`user_id`),
  ADD KEY `shopping_cart_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category_features`
--
ALTER TABLE `category_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cat_news`
--
ALTER TABLE `cat_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_features`
--
ALTER TABLE `category_features`
  ADD CONSTRAINT `category_features_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cat_news`
--
ALTER TABLE `cat_news`
  ADD CONSTRAINT `cat_news_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cat_news` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_cat_news_id_foreign` FOREIGN KEY (`cat_news_id`) REFERENCES `cat_news` (`id`),
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `category_features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_features_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
