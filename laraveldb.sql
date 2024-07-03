-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 05:26 PM
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
-- Database: `laraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PC', 1, NULL, NULL, '2024-05-27 06:34:26', '2024-05-27 06:34:26'),
(2, 'LapTop', 1, NULL, NULL, '2024-05-27 06:34:32', '2024-05-27 06:34:32'),
(3, 'Linh Kiện', 1, NULL, NULL, '2024-05-27 06:34:41', '2024-05-27 06:34:41'),
(4, 'PC Gaming', 1, 1, NULL, '2024-05-27 06:35:06', '2024-05-27 06:35:24'),
(5, 'PC văn phòng', 1, 1, NULL, '2024-05-27 06:35:43', '2024-05-27 06:35:43'),
(6, 'Laptop Gaming', 1, 2, NULL, '2024-05-27 06:36:06', '2024-05-27 06:36:06'),
(7, 'LapTop văn phòng', 1, 2, NULL, '2024-05-27 06:36:20', '2024-05-27 06:36:20'),
(8, 'Tai nghe', 1, 3, NULL, '2024-05-27 06:36:31', '2024-05-27 06:36:31'),
(9, 'CPU', 1, 3, NULL, '2024-05-27 06:36:51', '2024-05-27 06:36:51');

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
-- Table structure for table `img_products`
--

CREATE TABLE `img_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img_products`
--

INSERT INTO `img_products` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'dellg15.jpg', '2024-05-27 06:39:50', '2024-05-27 06:39:50'),
(2, 1, 'dellg151.jpg', '2024-05-27 06:39:50', '2024-05-27 06:39:50'),
(3, 1, 'dellg152.jpg', '2024-05-27 06:39:50', '2024-05-27 06:39:50'),
(4, 2, 'laptop.jpg', '2024-05-27 06:43:08', '2024-05-27 06:43:08'),
(5, 2, 'laptop1.jpg', '2024-05-27 06:43:08', '2024-05-27 06:43:08'),
(6, 2, 'laptop2.jpg', '2024-05-27 06:43:08', '2024-05-27 06:43:08'),
(7, 3, 'pc-cps-van-phong-s2.webp', '2024-05-27 06:46:26', '2024-05-27 06:46:26'),
(8, 3, 'pc-cps-van-phong-s2-40.webp', '2024-05-27 06:46:26', '2024-05-27 06:46:26'),
(9, 3, 'pc-cps-van-phong-s2-40_1_.webp', '2024-05-27 06:46:26', '2024-05-27 06:46:26'),
(10, 3, 'pc-cps-van-phong-s2-41.webp', '2024-05-27 06:46:26', '2024-05-27 06:46:26'),
(11, 4, 'pc.jpg', '2024-05-27 06:50:47', '2024-05-27 06:50:47'),
(12, 4, 'pc1.jpg', '2024-05-27 06:50:47', '2024-05-27 06:50:47'),
(13, 4, 'pc2.jpg', '2024-05-27 06:50:47', '2024-05-27 06:50:47'),
(14, 4, 'pc-cps-gaming-g2-40.webp', '2024-05-27 06:50:47', '2024-05-27 06:50:47'),
(15, 5, 'cpui3.jpg', '2024-05-27 06:53:51', '2024-05-27 06:53:51'),
(16, 5, 'cpui31.jpg', '2024-05-27 06:53:51', '2024-05-27 06:53:51'),
(17, 5, 'cpui32.jpg', '2024-05-27 06:53:51', '2024-05-27 06:53:51'),
(18, 6, 'tainghe.jpg', '2024-05-27 06:56:09', '2024-05-27 06:56:09'),
(19, 6, 'tainghe1.jpg', '2024-05-27 06:56:09', '2024-05-27 06:56:09'),
(20, 6, 'tainghe2.jpg', '2024-05-27 06:56:09', '2024-05-27 06:56:09'),
(21, 7, 'msi.jpg', '2024-05-27 06:58:26', '2024-05-27 06:58:26'),
(22, 7, 'msi1.jpg', '2024-05-27 06:58:26', '2024-05-27 06:58:26'),
(23, 7, 'msi2.jpg', '2024-05-27 06:58:26', '2024-05-27 06:58:26'),
(24, 7, 'msi3.jpg', '2024-05-27 06:58:26', '2024-05-27 06:58:26'),
(25, 8, 'ban-phim-co-rapoo-v500se-rainbow-2_2.webp', '2024-05-27 07:01:15', '2024-05-27 07:01:15'),
(26, 8, 'ban-phim-co-rapoo-v500se-rainbow-3_2.webp', '2024-05-27 07:01:15', '2024-05-27 07:01:15'),
(27, 8, 'ban-phim-co-rapoo-v500se-rainbow-4_2.webp', '2024-05-27 07:01:15', '2024-05-27 07:01:15'),
(28, 8, 'ban-phim-co-rapoo-v500se-rainbow-red-switch.webp', '2024-05-27 07:01:15', '2024-05-27 07:01:15'),
(29, 9, 'laptop_asus_vivobook_15_oled_a1505va-l1114w_1_.webp', '2024-05-27 07:04:08', '2024-05-27 07:04:08'),
(30, 9, 'text_ng_n_1__1_120.webp', '2024-05-27 07:04:08', '2024-05-27 07:04:08'),
(31, 9, 'text_ng_n_2__2_57.webp', '2024-05-27 07:04:08', '2024-05-27 07:04:08'),
(32, 9, 'text_ng_n_7__91.webp', '2024-05-27 07:04:08', '2024-05-27 07:04:08'),
(33, 10, 'mainboard-gigabyte-h610m-h-v2-ddr4_1_.webp', '2024-05-27 07:06:19', '2024-05-27 07:06:19'),
(34, 10, 'mainboard-gigabyte-h610m-h-v2-ddr4_3_.webp', '2024-05-27 07:06:19', '2024-05-27 07:06:19'),
(35, 10, 'mainboard-gigabyte-h610m-h-v2-ddr4_6_.webp', '2024-05-27 07:06:19', '2024-05-27 07:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_16_235623_create_categories_table', 1),
(5, '2024_03_22_061643_create_products_table', 1),
(6, '2024_03_22_063006_create_img_products_table', 1),
(7, '2024_04_07_142218_add_column_to_table_products', 1),
(8, '2024_04_07_142243_add_column_to_products', 1),
(9, '2024_04_08_045446_create_related_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `sale_price` double NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `image`, `category_id`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dell G15', 18000000, 1600000, 'dellg15.jpg', 6, 'dell-g15', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\r\n\r\n<ul>\r\n	<li>Chip AMD Ryzen&trade; R5-5600H c&ugrave;ng card rời RTX&trade; 3050 xử l&yacute; mượt m&agrave; c&aacute;c tựa game AAA hay c&aacute;c phần mềm đồ hoạ như PTS, Premier</li>\r\n	<li>Ram 8GB cho ph&eacute;p n&acirc;ng cấp tối đa đến 32GB</li>\r\n	<li>Ổ cứng SSD 256 GB - Đa nhi&ecirc;̣m và lưu trữ dữ li&ecirc;̣u ti&ecirc;̣n dụng, nhanh chóng hơn..</li>\r\n	<li>C&ocirc;ng nghệ chống ch&oacute;i - L&agrave;m việc kh&ocirc;ng lo bị mỏi mắt</li>\r\n	<li>M&agrave;n h&igrave;nh Full HD k&iacute;ch thước chuẩn 15.6 inch, tần số qu&eacute;t 120Hz vượt qua giới hạn 60FPS</li>\r\n	<li>Đa dạng c&aacute;c cổng kết nối: jack cắm audio, cổng HDMI 1.4, cổng USB C,...dễ truyền hoặc xuất dữ liệu với nhiều thiết bị kh&aacute;c nhau</li>\r\n	<li>Pin cực khỏe - 3Cell 56WHrs cho thời gian sử dụng bền bỉ</li>\r\n	<li>M&aacute;y đi k&egrave;m Windows 11 bản quyền</li>\r\n</ul>\r\n\r\n<h2><strong>Laptop Dell Gaming G15 5515 P105F004CGR &ndash; Hiệu năng ổn định, thoải m&aacute;i trải nghiệm</strong></h2>\r\n\r\n<p>Laptop gaming nổi tiết với cấu h&igrave;nh vượt trội gi&uacute;p người d&ugrave;ng c&oacute; thể xử l&yacute; c&aacute;c t&aacute;c vụ một c&aacute;ch nhanh ch&oacute;ng v&agrave; mượt m&agrave;.&nbsp;<a href=\"https://cellphones.com.vn/laptop/dell/gaming.html\" target=\"_self\">Laptop Dell Gaming</a>&nbsp;G15 5515 P105F004CGR cũng kh&ocirc;ng ngoại lệ, laptop sở hữu một thiết kế đậm chất game thủ c&ugrave;ng cấu h&igrave;nh ổn định.</p>\r\n\r\n<h3><strong>Thiết kế phong c&aacute;ch gaming, m&agrave;n h&igrave;nh lớn hiển thị r&otilde; n&eacute;t</strong></h3>\r\n\r\n<p>Dell Gaming G15 5515 P105F004CGR được nh&agrave; sản xuất trang bị một thiết kế kh&aacute; hầm hố khiến người d&ugrave;ng nhận ra đ&acirc;y l&agrave; một mẫu laptop gaming ngay từ &aacute;nh nh&igrave;n đầu ti&ecirc;n. Laptop với thiết kế khe tản nhiệt lớn nhờ đ&oacute; gi&uacute;p thiết bị lu&ocirc;n duy tr&igrave; được nhiệt độ ổn định.</p>\r\n\r\n<p><img alt=\"Thiết kế phong cách gaming, màn hình lớn hiển thị rõ nét\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/dell-gaming-g15-5515-p105f004cgr-1.jpg\" /></p>\r\n\r\n<p>Laptop Dell Gaming G15 5515 P105F004CGR được trang bị m&agrave;n h&igrave;nh k&iacute;ch thước chuẩn 15,6 inch với độ ph&acirc;n giải FHD. M&agrave;n h&igrave;nh với tần số qu&eacute;t lớn 120Hz c&ugrave;ng c&ocirc;ng nghệ chống ch&oacute;i Anti-Glare mang lại trải nghiệm hiển thị v&agrave; sử dụng ấn tượng.</p>\r\n\r\n<h3><strong>Hoạt động mượt m&agrave; với CPU AMD Ryzen, card đồ họa GeForce RTX</strong></h3>\r\n\r\n<p>Dell Gaming G15 5515 P105F004CGR sở hữu một sức mạnh ấn tượng nhờ cấu h&igrave;nh mạnh mẽ. Cụ thể, Dell Gaming G15 5515 P105F004CGR được trang bị con chip AMD Ryzen d&ograve;ng H mạnh mẽ c&ugrave;ng với đ&oacute; l&agrave; card đồ họa NVIDIA GeForce RTX, ổ cứng SSD. Tất cả mang lại cho laptop Dell Gaming G15 5515 P105F004CGR một hiệu năng sử dụng ấn tượng, đa nhiệm mượt m&agrave;.</p>\r\n\r\n<p><img alt=\"Hoạt động mượt mà với CPU AMD Ryzen, card đồ họa GeForce RTX\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/dell-gaming-g15-5515-p105f004cgr-2.jpg\" /></p>\r\n\r\n<h2><strong>Mua ngay laptop Dell Gaming G15 5515 P105F004CGR ch&iacute;nh h&atilde;ng tại CellphoneS</strong></h2>\r\n\r\n<p>Mẫu laptop gaming Dell G15 5515 P105F004CGR với thiết kế phong c&aacute;ch, hiệu năng vượt trội hiện được b&aacute;n ch&iacute;nh h&atilde;ng tại Cellphones. Nếu bạn quan t&acirc;m đến laptop Dell gaming n&agrave;y, đến ngay CellphoneS để trải nghiệm.</p>\r\n\r\n<h2>&nbsp;</h2>', NULL, '2024-05-27 06:39:50', '2024-05-27 06:39:50'),
(2, 'Dell vostro 5620', 21000000, 20000000, 'laptop.jpg', 7, 'dell-vostro-5620', '<ul>\r\n	<li>\r\n	<p>16.0 inch, 1920 x 1200 Pixels, WVA, 60 Hz, Anti-Glare LED-Backlit Display</p>\r\n	</li>\r\n	<li>\r\n	<p>Intel, Core i5, 1240P</p>\r\n	</li>\r\n	<li>\r\n	<p>8 GB (1 thanh 8 GB), DDR4</p>\r\n	</li>\r\n	<li>\r\n	<p>SSD 512 GB</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Đặc điểm nổi bật của&nbsp;Dell Vostro V5620 i5 1240P (V6I5405W1)</h2>\r\n\r\n<p><img alt=\"Laptop Dell Vostro V5620 i5 1240P/8GB/512GB/16&quot;FHD+/Nvidia MX570 2GB/Win11\" src=\"https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/13/638380821721457837_dell-vostro-v5620-i5-1240p-mx570-win11-1.jpg\" width=\"665\" /></p>\r\n\r\n<p><img alt=\"Laptop Dell Vostro V5620 i5 1240P/8GB/512GB/16&quot;FHD+/Nvidia MX570 2GB/Win11\" src=\"https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/13/638380821719739151_dell-vostro-v5620-i5-1240p-mx570-win11-2.jpg\" width=\"665\" /></p>\r\n\r\n<p><img alt=\"Laptop Dell Vostro V5620 i5 1240P/8GB/512GB/16&quot;FHD+/Nvidia MX570 2GB/Win11\" src=\"https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/13/638380821719107553_dell-vostro-v5620-i5-1240p-mx570-win11-3.jpg\" width=\"665\" /></p>\r\n\r\n<p><img alt=\"Laptop Dell Vostro V5620 i5 1240P/8GB/512GB/16&quot;FHD+/Nvidia MX570 2GB/Win11\" src=\"https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/13/638380821719263670_dell-vostro-v5620-i5-1240p-mx570-win11-4.jpg\" width=\"665\" /></p>\r\n\r\n<p><img alt=\"Laptop Dell Vostro V5620 i5 1240P/8GB/512GB/16&quot;FHD+/Nvidia MX570 2GB/Win11\" src=\"https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/13/638380821717701152_dell-vostro-v5620-i5-1240p-mx570-win11-6.jpg\" width=\"665\" /></p>\r\n\r\n<p><img alt=\"Laptop Dell Vostro V5620 i5 1240P/8GB/512GB/16&quot;FHD+/Nvidia MX570 2GB/Win11\" src=\"https://images.fpt.shop/unsafe/fit-in/665x374/filters:quality(100):fill(white)/fptshop.com.vn/Uploads/Originals/2023/12/13/638380821717701152_dell-vostro-v5620-i5-1240p-mx570-win11-5.jpg\" width=\"665\" /></p>\r\n\r\n<h2>Đ&aacute;nh gi&aacute; chi tiết&nbsp;Dell Vostro V5620 i5 1240P (V6I5405W1)</h2>\r\n\r\n<p><strong>Kh&ocirc;ng c&oacute; việc g&igrave; kh&oacute; đối với Dell Vostro 16 5620, chiếc laptop to&agrave;n năng n&agrave;y sở hữu m&agrave;n h&igrave;nh cực lớn 16 inch, hiệu năng đỉnh cao với bộ vi xử l&yacute; Intel Core i5 1240P v&agrave; card đồ họa rời MX570. Bạn sẽ l&agrave;m việc với trải nghiệm thoải m&aacute;i v&agrave; nhanh ch&oacute;ng hơn bao giờ hết.</strong></p>\r\n\r\n<p><strong><img alt=\"Dell Vostro 16 5620 (ảnh 1)\" src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/0511/Dell-Vostro-16-V5620-8.jpg\" /></strong></p>\r\n\r\n<h3><strong>Kiểu d&aacute;ng gọn g&agrave;ng với m&agrave;n h&igrave;nh viền si&ecirc;u mỏng</strong></h3>\r\n\r\n<p>L&agrave; một chiếc laptop m&agrave;n h&igrave;nh lớn tới 16 inch nhưng&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell-vostro-v5620-i5-1240p-mx570-win11\">Dell Vostro 5620</a>&nbsp;kh&ocirc;ng hề &ldquo;qu&aacute; khổ&rdquo; như bạn nghĩ. Tr&aacute;i lại, m&aacute;y vẫn v&ocirc; c&ugrave;ng gọn g&agrave;ng với thiết kế tổng thể chỉ tương đương một sản phẩm 15,6 inch th&ocirc;ng thường, với độ mỏng chỉ 17,95mm v&agrave; trọng lượng 1,9kg. Ng&ocirc;n ngữ thiết kế của Dell Vostro 5620 đậm chất &ldquo;Dell&rdquo;, nghĩa l&agrave; đơn giản nhưng đẹp v&agrave; hiện đại. Viền m&agrave;n h&igrave;nh si&ecirc;u mỏng, kiểu d&aacute;ng phẳng, thanh mảnh v&agrave; sự trau chuốt, tinh tế ở mọi đường n&eacute;t tạo n&ecirc;n một sản phẩm đẹp, cao cấp. Phi&ecirc;n bản m&agrave;u đen x&aacute;m với logo Dell trắng bạc nổi bật ph&ugrave; hợp cho kh&ocirc;ng gian c&ocirc;ng sở, m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp.</p>\r\n\r\n<p><img alt=\"Dell Vostro 16 5620 (ảnh 2)\" src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/0511/Dell-Vostro-16-V5620-6.jpg\" /></p>\r\n\r\n<h3><strong>Cấu h&igrave;nh cực mạnh cho c&ocirc;ng việc</strong></h3>\r\n\r\n<p>Hiệu năng của Dell Vostro 16 5620 mạnh hơn so với&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;th&ocirc;ng thường nhờ việc sử dụng bộ vi xử l&yacute; d&ograve;ng P thay v&igrave; d&ograve;ng U tiết kiệm điện. Con chip Intel Core i5 1240P c&oacute; mặt tr&ecirc;n Dell 5620 thuộc thế hệ thứ 12 Alder Lake, c&oacute; tới 12 nh&acirc;n 16 luồng, trong đ&oacute; 4 nh&acirc;n hiệu năng cho tốc độ tối đa l&ecirc;n tới 4.40 GHz. Sức mạnh ấn tượng ở cả đơn nh&acirc;n v&agrave; đa nh&acirc;n gi&uacute;p Dell Vostro 16 5620 c&oacute; thể chạy tốt c&aacute;c ứng dụng nặng, l&agrave;m được nhiều việc c&ugrave;ng l&uacute;c, cho bạn n&acirc;ng cao năng suất l&agrave;m việc dễ d&agrave;ng.</p>\r\n\r\n<p><img alt=\"Dell Vostro 16 5620 (ảnh 3)\" src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/0511/Dell-Vostro-16-V5620-7.jpg\" /></p>\r\n\r\n<h3><strong>Trang bị card m&agrave;n h&igrave;nh rời, l&agrave;m việc đồ họa cực đỉnh</strong></h3>\r\n\r\n<p>Dell Vostro 16 5620 l&agrave; chiếc laptop văn ph&ograve;ng hiếm hoi trang bị card đồ họa rời. Với việc sở hữu GPU NVIDIA GeForce MX570, Dell Vostro 16 5620 ho&agrave;n to&agrave;n c&oacute; thể l&agrave;m c&aacute;c c&ocirc;ng việc nặng về đồ họa. Tr&ecirc;n chiếc laptop nhỏ gọn n&agrave;y, bạn c&oacute; thể chỉnh sửa ảnh, bi&ecirc;n tập video, dựng h&igrave;nh 3D, thiết kế v&agrave; nhiều t&aacute;c vụ kh&aacute;c.&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell-vostro\">Dell Vostro</a>&nbsp;c&oacute; đủ sức mạnh cần thiết để đ&aacute;p ứng ho&agrave;n hảo c&ocirc;ng việc của bạn.</p>\r\n\r\n<h3><strong>Thoải m&aacute;i l&agrave;m việc tr&ecirc;n m&agrave;n h&igrave;nh lớn</strong></h3>\r\n\r\n<p>M&agrave;n h&igrave;nh Dell Vostro 16 5620 kh&ocirc;ng chỉ lớn với k&iacute;ch thước 16 inch m&agrave; tỉ lệ khung h&igrave;nh mới 16:10 c&ograve;n gi&uacute;p c&oacute; th&ecirc;m nhiều kh&ocirc;ng gian hiển thị hơn nữa. Bạn sẽ c&oacute; thể l&agrave;m việc trực quan hơn, giải tr&iacute; v&ocirc; c&ugrave;ng hấp dẫn khi viền m&agrave;n h&igrave;nh mỏng đều cả 4 cạnh. Hơn nữa, m&agrave;n h&igrave;nh độ ph&acirc;n giải Full HD+ sắc n&eacute;t mang đến những h&igrave;nh ảnh thực sự sống động với m&agrave;u sắc rực rỡ, hiển thị trong trẻo. M&agrave;n h&igrave;nh Vostro 16 5620 cũng kh&ocirc;ng qu&ecirc;n trang bị phần mềm ComfortView, giảm thiểu &aacute;nh s&aacute;ng xanh c&oacute; hại v&agrave; hiện tượng nhấp nh&aacute;y để đ&ocirc;i mắt bạn lu&ocirc;n được thoải m&aacute;i d&ugrave; l&agrave;m việc trong thời gian d&agrave;i.</p>\r\n\r\n<p><img alt=\"Dell Vostro 16 5620 (ảnh 4)\" src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/0511/Dell-Vostro-16-V5620-1.jpg\" /></p>\r\n\r\n<h3><strong>Hệ thống bảo mật đ&aacute;ng tin cậy</strong></h3>\r\n\r\n<p>Dell Vostro 16 5620 t&iacute;ch hợp con chip bảo mật Trusted Platform Module 2.0. Đ&acirc;y l&agrave; con chip bảo mật cấp thương mại được c&agrave;i đặt ngay tr&ecirc;n bo mạch chủ. Con chip n&agrave;y sẽ lưu trữ mật khẩu v&agrave; kh&oacute;a m&atilde; h&oacute;a để bảo vệ dữ liệu của bạn ngay từ trước khi khởi động, gi&uacute;p bạn tr&aacute;nh khỏi c&aacute;c cuộc tấn c&ocirc;ng phần mềm từ b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<h3><strong>Rất nhiều cổng kết nối d&agrave;nh cho bạn</strong></h3>\r\n\r\n<p>Kh&ocirc;ng chỉ mang tr&ecirc;n m&igrave;nh những kết nối hiện đại như 2 cổng USB 3.2 Gen 1; cổng USB 3.2 Gen 2 Type-C (hỗ trợ DisplayPort v&agrave; Power Delivery), Dell Vostro 16 5620 c&ograve;n giữ lại cổng mạng LAN truyền thống thay v&igrave; bỏ đi như nhiều laptop kh&aacute;c hiện nay. Cổng mạng LAN RJ45 l&agrave; cổng kết nối rất quan trọng khi gi&uacute;p&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell\">laptop Dell</a>&nbsp;c&oacute; thể sử dụng được mạng d&acirc;y, cho nguồn mạng Internet nhanh v&agrave; ổn định hơn. Tất nhi&ecirc;n Dell Vostro 16 5620 cũng c&oacute; đầy đủ c&aacute;c kết nối phổ biến kh&aacute;c như HDMI 1.4; jack tai nghe 3.5mm v&agrave; đầu đọc thẻ nhớ SD.</p>\r\n\r\n<p><img alt=\"Dell Vostro 16 5620 (ảnh 5)\" src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/0511/Dell-Vostro-16-V5620-3.jpg\" /></p>\r\n\r\n<h3><strong>Webcam Full HD sắc n&eacute;t, &acirc;m thanh AI cho cuộc gọi video</strong></h3>\r\n\r\n<p>Dell Vostro 16 5000 sở hữu webcam chất lượng vượt trội so với c&aacute;c đối thủ với độ ph&acirc;n giải Full HD v&ocirc; c&ugrave;ng sắc n&eacute;t. Kết hợp với phần cứng giảm nhiễu v&agrave; phần mềm dải động rộng, h&igrave;nh ảnh của bạn sẽ lu&ocirc;n r&otilde; r&agrave;ng kể cả trong điều kiện thiếu s&aacute;ng. Ngo&agrave;i ra, &acirc;m thanh dựa tr&ecirc;n AI sẽ tối ưu h&oacute;a để bạn v&agrave; đối t&aacute;c c&oacute; thể nghe r&otilde; r&agrave;ng hơn. Trải nghiệm hội nghị qua video của bạn sẽ được n&acirc;ng l&ecirc;n một tầm cao mới.</p>', NULL, '2024-05-27 06:43:08', '2024-05-27 06:43:08'),
(3, 'PC i3 12000f', 14900000, 13000000, 'pc-cps-van-phong-s2.webp', 5, 'pc-i3-12000f', '<h2><strong>PC CPS Văn Ph&ograve;ng S2 - Tối ưu kh&ocirc;ng gian, xử l&yacute; đa năng</strong></h2>\r\n\r\n<p><strong>PC CPS văn ph&ograve;ng S2</strong>&nbsp;l&agrave; sự kết hợp những điểm ưu việt nhất giữa những linh kiện cao cấp. Từ đ&oacute;, phi&ecirc;n bản&nbsp;<a href=\"https://cellphones.com.vn/may-tinh-de-ban/van-phong.html\"><strong>m&aacute;y t&iacute;nh văn ph&ograve;ng</strong></a>&nbsp;n&agrave;y sẵn s&agrave;ng đ&aacute;p ứng được tất cả c&aacute;c ti&ecirc;u ch&iacute; m&agrave; một người doanh nh&acirc;n cần trong c&ocirc;ng việc v&agrave; giải tr&iacute;.&nbsp;</p>\r\n\r\n<h3><strong>Bố cục hợp l&yacute;, tuổi thọ d&agrave;i l&acirc;u</strong></h3>\r\n\r\n<p>Loại bỏ c&aacute;c chi tiết rườm r&agrave;, PC CPS văn ph&ograve;ng S2 sở hữu thiết kế gọn g&agrave;ng c&ugrave;ng độ ho&agrave;n chỉnh vượt trội gi&uacute;p tiết kiệm diện t&iacute;ch kh&ocirc;ng gian l&agrave;m việc của người d&ugrave;ng. Phần case Xigmatek được ho&agrave;n thiện từ chất liệu cao cấp nhằm bảo vệ c&aacute;c linh kiện b&ecirc;n trong bền bỉ theo thời gian, nhờ đ&oacute; m&agrave; bạn c&oacute; thể y&ecirc;n t&acirc;m về chất lượng trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p><img alt=\"PC CPS Văn Phòng S2 - Tối ưu không gian, xử lý đa năng\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/pc/CPS/pc-cps-van-phong-s2-1_1.png\" /></p>\r\n\r\n<h3><strong>Hiệu năng vượt bậc, trải nghiệm ho&agrave;n hảo</strong></h3>\r\n\r\n<p>Nhờ vận dụng tối ưu c&aacute;c sức mạnh c&ocirc;ng nghệ, PC CPS văn ph&ograve;ng S2 đ&atilde; th&agrave;nh c&ocirc;ng khẳng định đỉnh cao mới về chất lượng h&igrave;nh ảnh hiển thị cho người d&ugrave;ng m&atilde;n nh&atilde;n thưởng thức với tốc độ xử l&yacute; nhạy b&eacute;n. Ngo&agrave;i mang trong m&igrave;nh hiệu suất mạnh mẽ c&ugrave;ng CPU Intel Core i3 12100 PC CPS văn ph&ograve;ng S2 c&ograve;n cho ph&eacute;p bạn chinh phục c&aacute;c phần mềm nặng th&ocirc;ng qua bộ card đồ họa ti&ecirc;n tiến được trang bị trong phi&ecirc;n bản.</p>\r\n\r\n<p><img alt=\"PC CPS Văn Phòng S2 - Tối ưu không gian, xử lý đa năng\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/pc/CPS/pc-cps-van-phong-s2-2_1.png\" /></p>\r\n\r\n<p>Bằng sự phối hợp của RAM KINGSTON FURY 8GB 3200MHz v&agrave; ổ cứng SSD 240GB Sata, PC CPS văn ph&ograve;ng S2 tự tin lưu trữ mọi dữ liệu của người d&ugrave;ng với khả năng ph&acirc;n t&iacute;ch v&agrave; truy xuất thần tốc gi&uacute;p m&aacute;y t&iacute;nh hoạt động ổn định, kh&ocirc;ng lo chậm lag.</p>\r\n\r\n<h2><strong>Mua ngay PC CPS văn ph&ograve;ng S2 chất lượng tại CellphoneS</strong></h2>\r\n\r\n<p>Nếu bạn muốn sở hữu một bộ PC CPS văn ph&ograve;ng S2 với mức gi&aacute; phải chăng, vậy th&igrave; h&atilde;y nhanh ch&oacute;ng gh&eacute; tại chi nh&aacute;nh cửa h&agrave;ng CellphoneS gần nhất để sắm ngay sản phẩm. Đồng thời, bạn c&ograve;n được tặng th&ecirc;m ch&iacute;nh s&aacute;ch bảo h&agrave;nh hấp dẫn c&ugrave;ng nhiều ưu đ&atilde;i kh&aacute;c khi mua h&agrave;ng tại đ&acirc;y.</p>', NULL, '2024-05-27 06:46:26', '2024-05-27 06:46:26'),
(4, 'PC i7 12700H', 28000000, 27000000, 'pc-cps-gaming-g2-infographic-3.webp', 4, 'pc-i7-12700h', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\r\n\r\n<ul>\r\n	<li>PC G2 được chế t&aacute;c từ linh kiện chất lượng cao</li>\r\n	<li>Cấu h&igrave;nh đủ đ&aacute;p ứng cho những tựa game mạnh</li>\r\n	<li>Hỗ trợ card m&agrave;n h&igrave;nhRTX 3050 cho việc đồ họa</li>\r\n	<li>Thiết kế case gọn nhẹ ph&ugrave; hợp đặt mọi kh&ocirc;ng gian</li>\r\n</ul>\r\n\r\n<h2><strong>PC CPS Gaming G02 - Sức mạnh vượt trội, thỏa sức chơi game</strong></h2>\r\n\r\n<p>PC CPS Gaming G02 l&agrave; loại&nbsp;<a href=\"https://cellphones.com.vn/may-tinh-de-ban/pc-gaming.html\" target=\"_blank\"><strong>PC gaming</strong></a>&nbsp;d&agrave;nh cho c&aacute;c game thủ c&oacute; y&ecirc;u cầu cao về đồ họa. PC được chế t&aacute;c từ c&aacute;c linh kiện chất lượng cao, cấu h&igrave;nh mạnh mẽ mang tới hiệu năng xuất sắc. H&atilde;y xem đoạn m&ocirc; tả dưới đ&acirc;y để c&oacute; lựa chọn ch&iacute;nh x&aacute;c trước khi mua PC.</p>\r\n\r\n<h3><strong>Thiết kế chuy&ecirc;n dụng, thỏa sức trải nghiệm game&nbsp;</strong></h3>\r\n\r\n<p>Thiết kế của PC CPS Gaming G02 chuy&ecirc;n dụng d&agrave;nh cho gaming với những đường n&eacute;t hiện đại gọn ghẽ. T&iacute;ch hợp nhiều khoảng trống để th&ocirc;ng hơi tản nhiệt, tổng thể tr&ocirc;ng tối giản nhưng kh&ocirc;ng k&eacute;m phần hiệu quả.</p>\r\n\r\n<p><img alt=\"PC CPS Gaming G2 - Sức mạnh vượt trội, thỏa sức chơi game\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/pc/CPS/pc-cps-gaming-g2-1.png\" /></p>\r\n\r\n<p>PC CPS Gaming G02 được t&iacute;ch hợp bộ vi xử l&yacute; Core i3-12100F c&oacute; tốc độ trung b&igrave;nh đạt 3.3GHz, tối đa l&ecirc;n tới 4.3GHz. Chip c&oacute; đến 4 nh&acirc;n 8 luồng gi&uacute;p bạn trải nghiệm đủ c&aacute;c tựa game từ cơ bản đến kh&oacute;.</p>\r\n\r\n<h3><strong>Đầu tư h&igrave;nh ảnh, lưu trữ to&agrave;n diện&nbsp;</strong></h3>\r\n\r\n<p>PC được trang bị card đồ họa rời kết hợp với bộ RAM c&oacute; dung lượng 8GB. Nhờ vậy h&igrave;nh ảnh lu&ocirc;n ch&acirc;n thực, mượt m&agrave; được xử l&yacute; kỹ c&agrave;ng phục vụ tốt cho c&ocirc;ng việc đồ họa v&agrave; chơi game.</p>\r\n\r\n<p><img alt=\"PC CPS Gaming G2 - Sức mạnh vượt trội, thỏa sức chơi game\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/pc/CPS/pc-cps-gaming-g2-2.png\" /></p>\r\n\r\n<p>PC CPS Gaming G02 t&iacute;ch hợp bộ nhớ SSD 256GB, c&oacute; khả năng lưu trữ với tốc độ tối đa. Bạn c&oacute; thể lưu trữ nội dung h&igrave;nh ảnh, video nhanh ch&oacute;ng dựa theo nhu cầu sử dụng.</p>\r\n\r\n<h2><strong>Mua ngay PC CPS Gaming G02 ch&iacute;nh h&atilde;ng gi&aacute; rẻ tại cửa h&agrave;ng CellphoneS</strong></h2>\r\n\r\n<p>Một trong những địa điểm để sở hữu PC CPS Gaming G02 ch&iacute;nh l&agrave; cửa h&agrave;ng CellphoneS. Khi mua tại đ&acirc;y bạn được tư vấn kỹ c&agrave;ng c&aacute;c ch&iacute;nh s&aacute;ch bảo h&agrave;nh, mức gi&aacute;, khả năng của PC. Ngo&agrave;i ra, CellphoneS c&oacute; nhiều PC gaming kh&aacute;c chất lượng cao v&agrave; gi&aacute; tốt, h&atilde;y tham khảo th&ecirc;m tại website nh&eacute;!</p>', NULL, '2024-05-27 06:50:47', '2024-05-27 06:50:47'),
(5, 'CPU i3 12100', 2690000, 2300000, 'cpui3.jpg', 9, 'cpu-i3-12100', '<p>CPU Intel Core i3 12100 được đ&aacute;nh gi&aacute; l&agrave; một trong những d&ograve;ng chip m&aacute;y t&iacute;nh c&oacute; hiệu năng mạnh mẽ, được ứng dụng c&aacute;c c&ocirc;ng nghệ hiện đại, c&oacute; tốc độ phản hồi nhanh ch&oacute;ng, g&oacute;p phần đ&aacute;p ứng đa t&aacute;c vụ cho người d&ugrave;ng.</p>\r\n\r\n<p><strong>CPU Intel Core i3 12100 - Hiệu năng vượt trội</strong></p>\r\n\r\n<p><strong>CPU Intel Core i3 12100</strong>&nbsp;l&agrave; một vi xử l&yacute; mới đến từ nh&agrave; Intel. CPU đầu ti&ecirc;n sở hữu những đặc điểm nổi bật với những CPU cao cấp hơn so với trước đ&acirc;y. Đ&acirc;y sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những đối tượng cần hiệu suất ổn định để xử l&yacute; tốt c&aacute;c t&aacute;c vụ cơ bản.</p>\r\n\r\n<h3><strong>Sức mạnh từ kiến tr&uacute;c kết hợp của CPU Intel thế hệ 12</strong></h3>\r\n\r\n<p>CPU Intel Core i3 12100 l&agrave; thế hệ đầu ti&ecirc;n Intel sử dụng nh&acirc;n hiệu năng cao Performance Cores.</p>\r\n\r\n<p>Performance Cores l&agrave; nh&acirc;n&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/cpu/intel.html\" target=\"_blank\"><strong>CPU Intel</strong></a>&nbsp;c&oacute; hiệu suất cao từ ​​xưa đến nay. L&otilde;i n&agrave;y được thiết kế để tối đa h&oacute;a đơn luồng v&agrave; khả năng phản hồi nhằm t&iacute;nh to&aacute;n khối lượng c&ocirc;ng việc chuy&ecirc;n nghiệp như chơi game v&agrave; thiết kế đồ họa 3D.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i3 12100\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/CPU/Intel/i3/cpu-intel-core-i3-12100-5.jpg\" /></p>\r\n\r\n<p>Nh&acirc;n Performance-cores mang lại hiệu năng đa luồng mạnh hơn, gi&uacute;p cho c&aacute;c t&aacute;c vụ c&oacute; thể chạy song song v&agrave; kết xuất h&igrave;nh ảnh, render, giảm tải ti&ecirc;u thụ điện năng c&aacute;c t&aacute;c vụ nền.</p>\r\n\r\n<p><em><strong>Xem ngay</strong>:&nbsp;<a href=\"https://cellphones.com.vn/cpu-intel-core-i3-12100f.html\" target=\"_blank\">CPU Intel Core i3 12100F</a>&nbsp;được thiết kế với tốc độ phản hồi lớn, ấn tượng</em></p>\r\n\r\n<h3><strong>Hỗ trợ PCI-e Gen 5 c&ugrave;ng với bộ nhớ DDR5</strong></h3>\r\n\r\n<p>CPU Intel Core i3 12100 c&oacute; tốc độ của PCI-e Gen 5 đ&atilde; tăng gấp đ&ocirc;i so với phi&ecirc;n bản PCIe 4.0 trước đ&oacute;. C&aacute;c d&ograve;ng card thế hệ mới, card mạng, card mở rộng hiện nay đều y&ecirc;u cầu mức băng th&ocirc;ng n&agrave;y tương đối cao. Với tốc độ băng th&ocirc;ng vượt trội n&agrave;y, PCI e 5.0 l&agrave; một sự n&acirc;ng cấp rất cần thiết đối với nhu cầu hiện nay.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i3 12100\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/CPU/Intel/i3/cpu-intel-core-i3-12100-3.jpg\" /></p>\r\n\r\n<p>CPU Intel Core i3-12100 l&agrave; tầm trung th&iacute;ch hợp để&nbsp;<a href=\"https://cellphones.com.vn/may-tinh-de-ban/build-pc.html\" target=\"_blank\"><strong>build PC gaming</strong></a>&nbsp;cấu h&igrave;nh mạnh, c&oacute; mức hiệu năng tương đối l&agrave; cao, nhưng gi&aacute; th&agrave;nh tốt hiện tại. Với những c&ocirc;ng nghệ Intel &aacute;p dụng tr&ecirc;n d&ograve;ng CPU thế hệ thứ 12 mới, CPU Intel Core i3-12100F c&oacute; thể đ&aacute;p ứng được c&aacute;c cấu h&igrave;nh m&aacute;y t&iacute;nh đồ họa nhẹ, Photoshop, xử l&yacute; dữ liệu, văn ph&ograve;ng,l&agrave;m việc online, m&aacute;y t&iacute;nh chơi game.</p>\r\n\r\n<h3><strong>Hiệu suất xử l&yacute; ấn tượng với 4 l&otilde;i v&agrave; 8 luồng</strong></h3>\r\n\r\n<p>Giống với thế hệ Comet Lake trước đ&oacute;, CPU Intel Core i3 12100 được thiết kế theo cấu tr&uacute;c bao gồm 4 l&otilde;i v&agrave; 8 luồng. D&ugrave; kh&ocirc;ng sở hữu c&aacute;c l&otilde;i xử l&yacute; Gracemont E cao cấp nhưng hiệu năng xử l&yacute; của con chip Intel n&agrave;y vẫn cực kỳ đ&aacute;ng nể.&nbsp;</p>\r\n\r\n<p><img alt=\"Đánh giá CPU Intel Core i3-12100\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/CPU/Intel/i3/cpu-intel-core-i3-12100-4.jpg\" /></p>\r\n\r\n<p>Tần số xử l&yacute; đơn l&otilde;i của CPU Intel Core i3 12100 l&agrave; 3.3GHz. Tuy nhi&ecirc;n th&igrave; hiệu suất n&agrave;y của chip c&oacute; thể được biến đổi l&ecirc;n tới 4.3GHz. Đem tới khả năng xử l&yacute; đỉnh cao, dễ d&agrave;ng giải quyết được c&aacute;c t&aacute;c vụ tầm trung m&agrave; nhiều chipset Core i3 trước đ&oacute; kh&ocirc;ng l&agrave;m được.</p>\r\n\r\n<h3><strong>Điện năng ổn định hơn c&ugrave;ng GPU t&iacute;ch hợp tốt</strong></h3>\r\n\r\n<p>So với d&ograve;ng chip tiền nhiệm Core i3-10100 th&igrave; điện năng của CPU Intel Core i3 12100 c&oacute; phần n&agrave;o ổn định hơn. Cụ thể, c&ocirc;ng suất cơ bản của chipset n&agrave;y rơi v&agrave;o khoảng 60W, tốt hơn một ch&uacute;t so với 65W của i3-10100.&nbsp;</p>\r\n\r\n<p>C&ocirc;ng suất đạt đỉnh của i3 thế hệ mới n&agrave;y c&ugrave;ng kh&ocirc;ng qu&aacute; cao, với 89W. Với th&ocirc;ng số n&agrave;y, CPU sẽ kh&ocirc;ng gặp bất kỳ t&igrave;nh trạng qu&aacute; tải nhiệt độ n&agrave;o trong qu&aacute; tr&igrave;nh sử dụng. Kiểm so&aacute;t nhiệt của chipset ổn định hơn một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<p><img alt=\"Đánh giá CPU Intel Core i3-12100\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/CPU/Intel/i3/cpu-intel-core-i3-12100-1.jpg\" /></p>\r\n\r\n<p>Sang tới ph&acirc;n kh&uacute;c CPU n&agrave;y, Intel đ&atilde; phần n&agrave;o lưu &yacute; hơn về khả năng xử l&yacute; đồ hoạ. Theo đ&oacute;, i3-12100 được t&iacute;ch hợp GPU Intel&reg; UHD 730, gi&uacute;p n&acirc;ng cao hơn chất lượng xử l&yacute; đồ hoạ.&nbsp;</p>\r\n\r\n<p>Nhờ đ&oacute; m&agrave; trải nghiệm chiến game của người d&ugrave;ng tr&ecirc;n chipset n&agrave;y cũng được tối ưu hơn, giảm độ giật lag v&agrave; tăng chất lượng khung h&igrave;nh.</p>\r\n\r\n<h2><strong>Sở hữu CPU Intel Core i3 12100 với gi&aacute; tốt tại hệ thống CellphoneS</strong></h2>\r\n\r\n<p>CPU Intel Core i3 12100 hiện đang được ph&acirc;n phối tại hệ thống cửa h&agrave;ng của CellphoneS tại TP Hồ Ch&iacute; Minh v&agrave; H&agrave; Nội. Đặc biệt được b&aacute;n ra với mức gi&aacute; ưu đ&atilde;i v&agrave; chất lượng 100% cho người sử dụng.&nbsp;</p>', NULL, '2024-05-27 06:53:51', '2024-05-27 06:53:51'),
(6, 'Tai nghe Gaming Logitech G45', 700000, 650000, 'tainghe.jpg', 8, 'tai-nghe-gaming-logitech-g45', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\r\n\r\n<ul>\r\n	<li>Kết nối lightspeed kh&ocirc;ng d&acirc;y hiệu suất cao c&oacute; thể sử dụng tr&ecirc;n PC, Mac, PS4 &amp; 5</li>\r\n	<li>C&oacute; thể kết nối th&ocirc;ng qua bluetooth khi sử dụng thiết bị kh&aacute;c</li>\r\n	<li>Thoải m&aacute;i nghe nhạc với thời lượng pin l&ecirc;n đến 18 giờ</li>\r\n	<li>Trọng lượng nhẹ chỉ 165GR, đeo suốt cả ng&agrave;y</li>\r\n	<li>Tr&ograve; chuyện thoải m&aacute;i với mic t&iacute;ch hợp</li>\r\n</ul>\r\n\r\n<h2><strong>Tai nghe chụp tai gaming Logitech G435 - &Acirc;m thanh vượt trội, thoải m&aacute;i nghe nhạc</strong></h2>\r\n\r\n<p>Đối với game thủ th&igrave; tai nghe gaming l&agrave; một trong những thiết bị c&ocirc;ng nghệ được lựa chọn nhiều v&agrave; được sự ưu &aacute;i đặc biệt bởi sự cần thiết v&agrave; tiện &iacute;ch của n&oacute;.&nbsp;<strong><a href=\"https://cellphones.com.vn/thiet-bi-am-thanh/tai-nghe/gaming.html\" target=\"_self\">Tai nghe gaming</a>&nbsp;Logitech G435</strong>&nbsp;l&agrave; 1 sản phẩm hỗ trợ n&acirc;ng cao trải nghiệm.</p>\r\n\r\n<h3><strong>Trọng lượng cực nhẹ v&agrave; &ecirc;m &aacute;i, kết nối th&ocirc;ng minh</strong></h3>\r\n\r\n<p>Tai nghe kh&ocirc;ng d&acirc;y chụp tai gaming Logitech G435 sở hữu k&iacute;ch thước cực tối ưu gi&uacute;p &ocirc;m trọn đầu v&agrave; 2 tai. Về khối lượng, tai nghe được trang bị một khối lượng cực k&igrave; nhẹ gi&uacute;p tạo cho người d&ugrave;ng cảm gi&aacute;c thoải m&aacute;i kh&ocirc;ng nặng đầu.</p>\r\n\r\n<p><img alt=\"Trọng lượng cực nhẹ và êm ái, kết nối thông minh\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/accessories/headphones/tai-nghe-khong-day-chup-tai-gaming-logitech-g435-1.jpg\" /></p>\r\n\r\n<p>Tai nghe Logitech G435 được thiết kế với khả năng kết nối th&ocirc;ng minh gi&uacute;p người d&ugrave;ng sử dụng 1 c&aacute;ch dễ d&agrave;ng v&agrave; hiệu qu&aacute;.</p>\r\n\r\n<h3><strong>M&agrave;u sắc bắt mắt, đa dạng</strong></h3>\r\n\r\n<p>Tai nghe kh&ocirc;ng d&acirc;y chụp tai Logitech G435 được trang bị nhiều m&agrave;u sắc sang trọng cho người d&ugrave;ng lựa chọn. Với 3 m&agrave;u phi&ecirc;n bản m&agrave;u sắc như đen kết hợp v&agrave;ng neon, xanh dương kết hợp đỏ m&acirc;m x&ocirc;i v&agrave; cuối c&ugrave;ng l&agrave; trắng kết hợp c&ugrave;ng t&iacute;m. Với 3 phối m&agrave;u đỉnh cao tr&ecirc;n sẽ gi&uacute;p người d&ugrave;ng c&oacute; được những trải nghiệm tuyệt vời nhất với chiếc tai nghe ưng &yacute; n&agrave;y.</p>\r\n\r\n<p><img alt=\"Màu sắc bắt mắt, đa dạng\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/accessories/headphones/tai-nghe-khong-day-chup-tai-gaming-logitech-g435-2.jpg\" /></p>\r\n\r\n<h2><strong>Mua ngay tai nghe kh&ocirc;ng d&acirc;y Logitech G435 ch&iacute;nh h&atilde;ng tại CellphoneS</strong></h2>\r\n\r\n<p>Hiện nay tr&ecirc;n c&aacute;c cơ sở v&agrave; hệ thống cả chuỗi cửa h&agrave;ng thiết bị c&ocirc;ng nghệ CellphoneS đ&atilde; trưng b&agrave;y v&agrave; b&aacute;n chiếc tai nghe kh&ocirc;ng d&acirc;y chụp tai gaming Logitech G435. Khi bạn đ&atilde; sẵn s&agrave;ng cho việc mua tai nghe kh&ocirc;ng d&acirc;y Logitech G435 ch&iacute;nh h&atilde;ng với c&aacute;c mức chi ph&iacute; v&agrave; chất lượng ổn định th&igrave; đ&acirc;y l&agrave; phương &aacute;n tốt nhất d&agrave;nh cho bạn.</p>', NULL, '2024-05-27 06:56:09', '2024-05-27 06:56:09'),
(7, 'MSi Brova 15', 16900000, 15290000, 'msi.jpg', 6, 'msi-brova-15', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\r\n\r\n<ul>\r\n	<li>Chip AMD Ryzen 5 - 7535HS xử l&yacute; nhanh ch&oacute;ng c&aacute;c t&aacute;c vụ như văn ph&ograve;ng, đồ hoạ, coding hay chiến game</li>\r\n	<li>GPU AMD Radeon RX 6550M 4 GB cho đồ hoạ cao, mượt m&agrave; v&agrave; ổn định ở c&aacute;c pha giao tranh</li>\r\n	<li>RAM 16 GB cho ph&eacute;p m&aacute;y vận h&agrave;nh mượt m&agrave;, mở c&ugrave;ng l&uacute;c nhiều t&aacute;c vụ</li>\r\n	<li>Ổ cứng 512 GB hỗ trợ khởi động laptop, truy xuất dữ liệu nhanh hơn</li>\r\n	<li>Tần số qu&eacute;t 144 Hz gi&uacute;p h&igrave;nh ảnh kh&ocirc;ng bị r&aacute;ch hay nho&egrave; mờ khi chơi game</li>\r\n</ul>\r\n\r\n<p><strong>MSI Bravo 15</strong>&nbsp;l&agrave; d&ograve;ng laptop sở hữu một cấu h&igrave;nh vượt trội với con chip R5-7535HS c&ugrave;ng với đ&oacute; l&agrave; bộ nhớ RAM 16GB (8GB + 8GB). B&ecirc;n cạnh đ&oacute;, laptop c&ograve;n được trang bị ổ cứng thể rắn SSD PCIE với dung lượng 512GB v&agrave; card đồ họa VGA 4GB RX6550M. Laptop c&ograve;n sở hữu một m&agrave;n h&igrave;nh 15.6 inch 144HZ mang lại một trải nghiệm hiển thị vượt trội.</p>\r\n\r\n<h2><strong>Laptop MSI BRAVO 15 &ndash; Hiệu năng vượt trội, chơi game mượt m&agrave;</strong></h2>\r\n\r\n<p>MSI BRAVO 15 l&agrave; d&ograve;ng laptop gaming đến từ thương hiệu MSI. Sản phẩm&nbsp;<a href=\"https://cellphones.com.vn/laptop/msi/gaming.html\" target=\"_blank\"><strong>laptop MSI gaming</strong></a>&nbsp;n&agrave;y với cấu h&igrave;nh mạnh mẽ c&oacute; thể đ&aacute;p ứng tốt c&aacute;c trải nghiệm gaming của người d&ugrave;ng.</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>Thiết kế phong c&aacute;ch gaming đầy mạnh mẽ</strong></h3>\r\n\r\n<p>MSI Bravo 15 l&agrave; sản phẩm thuộc d&ograve;ng laptop gaming, do đ&oacute; vẻ ngo&agrave;i của sản phẩm đậm chất gaming với phần logo được khắc trực tiếp l&ecirc;n mặt lưng m&aacute;y. Tổng thể m&aacute;y v&ocirc; c&ugrave;ng hiện đại v&agrave; cứng c&aacute;p. Chiếc laptop n&agrave;y c&oacute; tổng trọng lượng khoảng 2.25 kg &ndash; K&iacute;ch thước tương đ&ocirc;i nhẹ so với nhiều d&ograve;ng laptop gaming kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Thiết kế MSI Bravo 15 sang trọng\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/MSI/gaming/laptop-msi-gaming-bravo-15-b7ed-010vn_3.jpg\" /></p>\r\n\r\n<p><a href=\"https://cellphones.com.vn/laptop-msi-gaming-bravo-15-b7ed-010vn.html\" target=\"_blank\"><strong>Laptop MSI Bravo 15</strong></a>&nbsp;sở hữu b&agrave;n ph&iacute;m với k&iacute;ch thước fullsize gi&uacute;p mang lại cho người d&ugrave;ng trải nghiệm g&otilde; thoải m&aacute;i. B&agrave;n ph&iacute;m với độ nhạy cao c&ugrave;ng đ&egrave;n nền LED nhờ đ&oacute; người d&ugrave;ng c&oacute; thể thoải m&aacute;i l&agrave;m việc. Ph&iacute;a dưới khu vực b&agrave;n ph&iacute;m l&agrave; Touchpad với một k&iacute;ch thước vừa đủ cũng như mang lại khả năng di chuyển mượt m&agrave;.</p>\r\n\r\n<h3><strong>Hoạt động ổn định với con chip AMD Ryzen 5 c&ugrave;ng VGA RX6550M</strong></h3>\r\n\r\n<p>Laptop MSI BRAVO 15 sẽ hoạt động tr&ecirc;n con chip AMD Ryzen 5 - 7535HS&nbsp;&ndash; Con chip d&ograve;ng H mạnh mẽ. Con chip n&agrave;y gi&uacute;p cho laptop c&oacute; một hiệu suất vượt trội trong c&aacute;c trải nghiệm từ học tập đến giải tr&iacute; gaming.</p>\r\n\r\n<p><img alt=\"Hiệu năng laptop MSI gaming BRAVO 15 B7ED-010VN\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/MSI/gaming/laptop-msi-gaming-bravo-15-b7ed-010vn-1.jpg\" /></p>\r\n\r\n<p>C&ugrave;ng với đ&oacute;, m&aacute;y MSI Bravo 15 được trang bị card đồ họa AMD Radeon RX 6550M 4GB&nbsp;nhờ đ&oacute; c&oacute; thể hỗ trợ tối ưu c&aacute;c trải nghiệm li&ecirc;n quan đến đồ họa. Card hỗ trợ t&aacute;i tạo h&igrave;nh ảnh với mức ph&acirc;n giải cao.</p>\r\n\r\n<p><em>&gt;&gt;&gt;&nbsp;<strong>Kh&aacute;m ph&aacute; ngay</strong>: C&aacute;c mẫu&nbsp;<a href=\"https://cellphones.com.vn/bo-loc/laptop-tu-15-20-trieu\" target=\"_blank\"><strong>laptop 17 triệu</strong></a>&nbsp;cấu h&igrave;nh mạnh mẽ, mang lại trải nghiệm vượt trội</em></p>\r\n\r\n<h3><strong>Bộ nhớ RAM lớn 16GB (8GB + 8GB) c&ugrave;ng ổ cứng SSD 512GB</strong></h3>\r\n\r\n<p><strong>Laptop MSI BRAVO 15</strong>&nbsp;được trang bị bộ nhớ RAM dung lượng lớn l&ecirc;n đến 16GB (8GB + 8GB). Mức dung lượng lớn tr&ecirc;n laptop gi&uacute;p mang lại khả năng đa nhiệm ổn định.</p>\r\n\r\n<p><img alt=\"Cấu hình laptop MSI gaming BRAVO 15 B7ED-010VN\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/MSI/gaming/laptop-msi-gaming-bravo-15-b7ed-010vn-2.jpg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, laptop MSI Bravo 15 n&agrave;y c&ograve;n được trang bị ổ cứng dung lượng tới 512GB chuẩn PCIE. Ổ cứng thể rắn tr&ecirc;n thiết bị hỗ trợ qu&aacute; tr&igrave;nh khởi động nhanh ch&oacute;ng cũng như truy xuất dữ liệu nhanh hơn c&ugrave;ng như nhiều kh&ocirc;ng gian để lưu trữ dữ liệu.</p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh 144HZ với k&iacute;ch thước chuẩn 15.6 inch</strong></h3>\r\n\r\n<p>Về khả năng hiển thị, laptop MSI Bravo 15 B7ED-010VN được trang bị viền m&agrave;n h&igrave;nh Thin Benzel si&ecirc;u mỏng nhờ đ&oacute; mang lại kh&ocirc;ng gian hiển thị vượt trội. M&agrave;n h&igrave;nh với tấm nền IPS c&ugrave;ng độ ph&acirc;n giải FHD gi&uacute;p mang lại khả năng hiển thị r&otilde; n&eacute;t cũng như chi tiết sống động.</p>\r\n\r\n<p>M&agrave;n h&igrave;nh laptop MSI Bravo 15 n&agrave;y c&ograve;n đặc biệt th&iacute;ch hợp với người d&ugrave;ng chơi game với tần số qu&eacute;t 144HZ. Với mức tần số n&agrave;y, c&aacute;c chuyển động tr&ecirc;n Bravo 15 c&oacute; thể diễn ra mượt m&agrave;. C&ugrave;ng với đ&oacute;, m&agrave;n h&igrave;nh c&ograve;n được trang bị lớp phủ chống ch&oacute;i nhờ đ&oacute; gi&uacute;p người d&ugrave;ng c&oacute; thể sử dụng laptop trong nhiều điều khiện &aacute;nh s&aacute;ng kh&aacute;c nhau từ trong ph&ograve;ng đến ngo&agrave;i trời.</p>\r\n\r\n<p><img alt=\"MSI Bravo 15 có màn hình rộng lớn\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/MSI/gaming/laptop-msi-gaming-bravo-15-b7ed-010vn_2.jpg\" /></p>\r\n\r\n<h3><strong>Đa dạng cổng kết nối, tạo trải nghiệm vượt trội</strong></h3>\r\n\r\n<p>Laptop MSI Bravo 15 sở hữu hệ thống cổng kết nối hiện đại từ USB A đến jack tai nghe, HDMI, RJ45. Với hệ thống cổng giao tiếp n&agrave;y, người d&ugrave;ng c&oacute; thể kết nối thiết bị với phụ kiện m&aacute;y t&iacute;nh, phụ kiện &acirc;m thanh hay m&agrave;n h&igrave;nh một c&aacute;ch dễ d&agrave;ng. Kh&ocirc;ng chỉ kết nối c&oacute; d&acirc;y, latpop c&ograve;n sở hữu những chuẩn kết nối kh&ocirc;ng d&acirc;y t&acirc;n tiến nhất như Bluetooth 5.3 hay&nbsp; Wi-Fi 6E với khả năng kết nối ổn định.</p>', NULL, '2024-05-27 06:58:26', '2024-05-27 06:58:26'),
(8, 'Bàn phim Gaming Rapoo', 600000, 580000, 'ban-phim-co-rapoo-v500se-rainbow-red-switch.webp', 3, 'ban-phim-gaming-rapoo', '<h2><strong>B&agrave;n ph&iacute;m cơ Rapoo V500SE Rainbow Red Switch - chất liệu cao cấp, trải nghiệm g&otilde; &ecirc;m &aacute;i</strong></h2>\r\n\r\n<p><strong>B&agrave;n ph&iacute;m cơ Rapoo V500SE Rainbow Red Switch</strong>&nbsp;đến từ thương hiệu cao cấp Rapoo. Sản phẩm đem đến cho người d&ugrave;ng một trải nghiệm g&otilde; cực &ecirc;m &aacute;i với mức gi&aacute; phải chăng. Sản phẩm&nbsp;<a href=\"https://cellphones.com.vn/phu-kien/chuot-ban-phim-may-tinh/ban-phim/rapoo.html\"><strong>b&agrave;n ph&iacute;m Rapoo</strong></a>&nbsp;n&agrave;y l&agrave; lựa chọn ho&agrave;n hảo d&agrave;nh cho những người l&agrave;m việc hoặc game thủ muốn một kh&ocirc;ng gian y&ecirc;n tĩnh.</p>\r\n\r\n<h3><strong>Chất liệu cao cấp, thiết kế chống nước</strong></h3>\r\n\r\n<p>B&agrave;n ph&iacute;m cơ Rapoo V500SE Rainbow Red Switch c&oacute; thiết kế được l&agrave;m bằng chất liệu hợp kim cực cao cấp với vẻ ngo&agrave;i kh&aacute; nhỏ gọn. Ở bề mặt sản phẩm được sơn một lớp nh&aacute;m tĩnh điện gi&uacute;p đảm bảo an to&agrave;n khi sử dụng.</p>\r\n\r\n<p><img alt=\"Bàn phím cơ Rapoo V500SE Rainbow Red Switch - chất liệu cao cấp, trải nghiệm gõ êm ái\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/phu-kien/Ban-phim/Rapoo/ban-phim-co-rapoo-v500se-rainbow-red-switch-1.png\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, b&agrave;n ph&iacute;m sở hữu c&aacute;c k&yacute; tự được in đều đặn c&ugrave;ng c&aacute;c ph&iacute;m chức năng được l&agrave;m nổi bật hơn đem lại sự thuận tiện cho người d&ugrave;ng. Khả năng chống nước của b&agrave;n ph&iacute;m n&agrave;y cực tốt n&ecirc;n bạn kh&ocirc;ng cần qu&aacute; lo lắng khi lỡ l&agrave;m đổ nước v&agrave;o.</p>\r\n\r\n<h3><strong>Cảm gi&aacute;c g&otilde; &ecirc;m &aacute;i, phối m&agrave;u keycap c&ugrave;ng đ&egrave;n LED Rainbow bắt mắt</strong></h3>\r\n\r\n<p>Nh&agrave; sản xuất cũng trang bị đ&egrave;n LED Rainbow cho B&agrave;n ph&iacute;m cơ Rapoo V500SE Rainbow Red Switch đem lại một vẻ đẹp ấn tượng v&agrave; bắt mắt. Người d&ugrave;ng cũng c&oacute; thể thay đổi m&agrave;u đ&egrave;n LED theo sở th&iacute;ch bằng tổ hợp ph&iacute;m FN + c&aacute;c ph&iacute;m k&yacute; hiệu.</p>\r\n\r\n<p><img alt=\"Bàn phím cơ Rapoo V500SE Rainbow Red Switch - chất liệu cao cấp, trải nghiệm gõ êm ái\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/phu-kien/Ban-phim/Rapoo/ban-phim-co-rapoo-v500se-rainbow-red-switch-2.png\" /></p>\r\n\r\n<p>Keycap của sản phẩm cũng l&agrave; d&ograve;ng double shot c&oacute; sơn nh&aacute;m n&ecirc;n độ bền bỉ rất cao. Chất liệu nhựa của c&aacute;c n&uacute;t bấm l&agrave; ABS cũng đem lại cảm gi&aacute;c g&otilde; cực tốt. Ngo&agrave;i ra, v&igrave; l&agrave; d&ograve;ng Red Switch n&ecirc;n khi g&otilde; b&agrave;n ph&iacute;m sẽ rất &ecirc;m &aacute;i v&agrave; kh&ocirc;ng g&acirc;y ra tiếng động qu&aacute; lớn.</p>', NULL, '2024-05-27 07:01:15', '2024-05-27 07:01:15'),
(9, 'Asus VivoBook 15', 22000000, 19000000, 'text_ng_n_1__1_120.webp', 7, 'asus-vivobook-15', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh 15.6 inch tấm nền OLED cho khả năng t&aacute;i tạo ho&agrave;n hảo</li>\r\n	<li>CPU&nbsp;Intel Core i5-13500H mạnh mẽ c&oacute; thể xử l&yacute; mượt m&agrave; mọi t&aacute;c vụ</li>\r\n	<li>Card Intel Iris XE cho trải nghiệm giải tr&iacute; cao</li>\r\n	<li>RAM 16 GB chạy đa ứng dụng mượt m&agrave; kh&ocirc;ng lo giật, lag</li>\r\n	<li>Ổ cứng SSD 512 GB cho tốc độ truy xuất dữ liệu nhanh, kh&ocirc;ng gian lưu trữ đủ lớn</li>\r\n</ul>\r\n\r\n<h2><strong>Laptop Asus Vivobook 15 OLED - Hiệu năng đỉnh cao</strong></h2>\r\n\r\n<p><strong>Laptop Asus Vivobook 15 OLED A1505VA-L1114W</strong>&nbsp;mang đến những trải nghiệm l&agrave;m việc v&agrave; giải tr&iacute; tuyệt vời khi sở hữu th&ocirc;ng số cấu h&igrave;nh v&ocirc; c&ugrave;ng ấn tượng. Thiết bị gi&uacute;p bạn ho&agrave;n th&agrave;nh mọi c&ocirc;ng việc nhanh ch&oacute;ng khi t&iacute;ch hợp bộ vi xử l&yacute; h&agrave;ng đầu. Với m&agrave;n h&igrave;nh OLED rực rỡ, chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/asus/vivobook.html\"><strong>laptop Asus Vivobook</strong></a>&nbsp;cũng mở ra một thế giới giải tr&iacute; v&ocirc; c&ugrave;ng phong ph&uacute; v&agrave; ch&acirc;n thực.</p>\r\n\r\n<h3><strong>Ho&agrave;n th&agrave;nh mọi t&aacute;c vụ nhanh ch&oacute;ng với bộ cấu h&igrave;nh mạnh mẽ</strong></h3>\r\n\r\n<p>Asus Vivobook 15 OLED được trang bị bộ vi xử l&yacute; thế hệ thứ 13 Intel Core i5-13500H, chiếc laptop gi&uacute;p bạn xử l&yacute; mọi t&aacute;c vụ v&ocirc; c&ugrave;ng mượt m&agrave; v&agrave; nhanh ch&oacute;ng. Với 12 nh&acirc;n v&agrave; xung nhịp l&ecirc;n đến 4.7GHz, bộ vi xử l&yacute; gi&uacute;p bạn tăng năng suất l&agrave;m việc, cũng như mang đến những trải nghiệm giải tr&iacute; ấn tượng.</p>\r\n\r\n<p><img alt=\"Laptop Asus Vivobook 15 OLED A1505VA-L1114W\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-15-oled-a1505va-l1114w-3.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, laptop Asus Vivobook 15 OLED cũng được đ&aacute;nh gi&aacute; cao ở khả năng đa nhiệm mượt m&agrave; khi sở hữu dung lượng RAM đến 16GB. Đi k&egrave;m với đ&oacute; l&agrave; c&ocirc;ng nghệ kết nối WiFi 6E hỗ trợ người d&ugrave;ng truy cập mạng nhanh ch&oacute;ng.</p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh OLED đỉnh cao với khả năng bảo vệ thị lực hiệu quả</strong></h3>\r\n\r\n<p>Asus Vivobook 15 OLED A1505VA-L1114W thuộc ph&acirc;n kh&uacute;c&nbsp;<a href=\"https://cellphones.com.vn/bo-loc/laptop-tu-15-20-trieu\" target=\"_blank\"><strong>laptop 20 triệu</strong></a>&nbsp;sở hữu k&iacute;ch thước m&agrave;n h&igrave;nh 15.6 inch với tấm nền OLED cao cấp c&ugrave;ng độ ph&acirc;n giải Full HD. Nhờ v&agrave;o đ&oacute;, h&igrave;nh ảnh hiển thị tr&ecirc;n m&agrave;n h&igrave;nh laptop c&oacute; độ sắc n&eacute;t rất cao. Khả năng hạn chế &aacute;nh s&aacute;ng xanh nhằm bảo vệ thị lực của người d&ugrave;ng cũng l&agrave; thế mạnh ở thiết bị. Bạn kh&ocirc;ng phải lo lắng về t&igrave;nh trạng mỏi mắt khi l&agrave;m việc qu&aacute; l&acirc;u trước m&agrave;n h&igrave;nh laptop.&nbsp;</p>\r\n\r\n<p><img alt=\"Laptop Asus Vivobook 15 OLED A1505VA-L1114W\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-15-oled-a1505va-l1114w-2_1.jpg\" /></p>\r\n\r\n<h3><strong>Thiết kế nhỏ gọn, sang trọng trong từng chi tiết</strong></h3>\r\n\r\n<p>D&ugrave; được ho&agrave;n thiện từ chất liệu&nbsp;<strong>nhựa&nbsp;</strong>ở phần vỏ nhưng laptop Asus VivoBook 15 OLED A1505VA-L1114W vẫn thể hiện được sự&nbsp;<strong>tinh tế</strong>,&nbsp;<strong>sang trọng&nbsp;</strong>trong từng đường n&eacute;t thiết kế. Cụ thể, laptop sở hữu k&iacute;ch thước chỉ từ&nbsp;<strong>35.68 x 22.76 x 1.99cm</strong>, kh&aacute; gọn g&agrave;ng để người sử dụng di chuyển một c&aacute;ch tiện lợi.</p>\r\n\r\n<p><img alt=\"Thiết kế laptop Asus Vivobook 15 OLED\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-15-oled-a1505va-l1114w-5.jpg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, thế hệ laptop Asus n&agrave;y cũng chỉ nặng vỏn vẹn khoảng&nbsp;<strong>1.70 kg</strong>. Th&ocirc;ng số n&agrave;y của m&aacute;y được cho l&agrave; kh&aacute; nhẹ nh&agrave;ng, hỗ trợ người sử dụng c&oacute; thể dễ d&agrave;ng mang theo b&ecirc;n m&igrave;nh m&agrave; kh&ocirc;ng hề cảm thấy bị nặng nề, kh&oacute; chịu g&igrave; nh&eacute;!</p>\r\n\r\n<h3><strong>Dung lượng Pin cỡ lớn, đ&aacute;p ứng mọi y&ecirc;u cầu sử dụng suốt ng&agrave;y d&agrave;i</strong></h3>\r\n\r\n<p>X&eacute;t tới thời lượng sử dụng, laptop Asus VivoBook 15 OLED A1505VA-L1114W cũng đặc biệt thu h&uacute;t người sử dụng nhờ được trang bị cụm&nbsp;<strong>Pin 3-cell Li-ion&nbsp;</strong>dung lượng&nbsp;<strong>50 Whrs</strong>. Đ&acirc;y l&agrave; một th&ocirc;ng số năng lượng kh&aacute; ấn tượng trong thế giới laptop hiện nay. N&oacute; đảm bảo mang tới cho người sử dụng trải nghiệm c&ocirc;ng việc, giải tr&iacute; liền mạch m&agrave; kh&ocirc;ng cần lo lắng về việc sạc pin li&ecirc;n tục trong ng&agrave;y.</p>\r\n\r\n<p><img alt=\"Pin laptop Asus Vivobook 15 OLED\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-15-oled-a1505va-l1114w-4.jpg\" /></p>\r\n\r\n<p>Chưa hết, ph&acirc;n kh&uacute;c laptop Asus tr&ecirc;n c&ograve;n được t&iacute;ch hợp k&egrave;m nhiều cổng giao tiếp hữu &iacute;ch, bao gồm&nbsp;<strong>USB 2.0 Type-A&nbsp;</strong>v&agrave;&nbsp;<strong>USB 3.2 Gen 1 Type-C&nbsp;</strong>đảm bảo sạc nhanh v&agrave; truyền dữ liệu tốt cho c&aacute;c thiết bị ngoại vi. Ngo&agrave;i ra, m&aacute;y c&ograve;n bao gồm&nbsp;<strong>2 cổng USB 3.2 Gen 1 Type-A</strong>, cổng&nbsp;<strong>HDMI 1.4&nbsp;</strong>cho ph&eacute;p người sử dụng dễ d&agrave;ng kết nối m&agrave;n h&igrave;nh ngo&agrave;i, đ&aacute;p ứng mọi nhu cầu tr&igrave;nh chiếu phục vụ c&ocirc;ng việc cho đến giải tr&iacute; c&aacute; nh&acirc;n.</p>\r\n\r\n<h3><strong>Webcam r&otilde; n&eacute;t, b&agrave;n ph&iacute;m Chiclet hiện đại</strong></h3>\r\n\r\n<p>Trải nghiệm g&otilde; nhập tr&ecirc;n laptop Asus VivoBook 15 OLED A1505VA-L1114W cũng thực sự kh&aacute;c biệt khi được trang bị&nbsp;<strong>b&agrave;n ph&iacute;m Chicle&nbsp;</strong>t đầy đủ cụm ph&iacute;m số (<strong>Num-key</strong>) tinh tế, cho cảm gi&aacute;c g&otilde; ph&iacute;m thoải m&aacute;i v&agrave; ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p><img alt=\"Bàn phím laptop Asus Vivobook 15 OLED\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-15-oled-a1505va-l1114w-6.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, m&aacute;y cũng đi k&egrave;m với một&nbsp;<strong>webcam 720p HD&nbsp;</strong>v&agrave; t&iacute;ch hợp&nbsp;<strong>m&agrave;n trập camera</strong>, đảm bảo t&iacute;nh ri&ecirc;ng tư v&agrave; an to&agrave;n khi kh&ocirc;ng sử dụng. Điều n&agrave;y l&agrave;m cho cuộc gọi video v&agrave; họp trực tuyến trở n&ecirc;n thuận tiện v&agrave; đảm bảo chất lượng h&igrave;nh ảnh r&otilde; n&eacute;t, gi&uacute;p bạn dễ d&agrave;ng kết nối với người th&acirc;n v&agrave; đồng nghiệp trong mọi t&igrave;nh huống.</p>', NULL, '2024-05-27 07:04:08', '2024-05-27 07:04:08');
INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `image`, `category_id`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 'Main H610M', 2100000, 1990000, 'mainboard-gigabyte-h610m-h-v2-ddr4_1_.webp', 3, 'main-h610m', '<p><strong>Mainboard Gigabyte H610M H V2 DDR4</strong>&nbsp;l&agrave; lựa chọn tối ưu cho người d&ugrave;ng muốn tận dụng hiệu suất của CPU Intel Core thế hệ thứ 12, 13, 14,... với socket LGA1700. Thế hệ mainboard nh&agrave; Gigabyte n&agrave;y c&oacute; hỗ trợ RAM DDR4 với khả năng mở rộng l&ecirc;n đến 64GB qua 2 khe DIMM, c&ugrave;ng với một khe PCI Express x16 hỗ trợ PCIe 4.0 v&agrave; một khe PCIe x1 cho c&aacute;c mở rộng kh&aacute;c. B&ecirc;n cạnh đ&oacute;, d&ograve;ng&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/mainboard-bo-mach-chu.html\"><strong>mainboard Gigabyte</strong></a>&nbsp;n&agrave;y cũng hỗ trợ kết nối M.2 v&agrave; SATA 6Gb/s cho ổ cứng, cung cấp đa dạng lựa chọn lưu trữ v&agrave; tốc độ truyền tải dữ liệu nhanh ch&oacute;ng.</p>\r\n\r\n<h2><strong>Mainboard Gigabyte H610M H V2 DDR4 - Hiệu năng ấn tượng, khả năng kết nối ngoại vi ổn định</strong></h2>\r\n\r\n<p>D&ograve;ng sản phẩm&nbsp;<strong>mainboard Gigabyte H610M H V2 DDR4</strong>&nbsp;được thiết kế nhằm phục vụ nhu cầu đa dạng của người d&ugrave;ng, từ c&ocirc;ng việc h&agrave;ng ng&agrave;y đến chơi game v&agrave; xử l&yacute; đồ họa. Với k&iacute;ch thước Micro-ATX, mainboard H610M H V2 DDR4 của nh&agrave; Gigabyte n&agrave;y c&oacute; thể dễ d&agrave;ng ph&ugrave; hợp với hầu hết c&aacute;c loại vỏ m&aacute;y, từ cơ bản đến cao cấp. Đi k&egrave;m theo đ&oacute; l&agrave; chipset H610 gi&uacute;p Gigabyte H610M H V2 DDR4 kh&ocirc;ng chỉ cung cấp hiệu suất ổn định m&agrave; c&ograve;n đảm bảo t&iacute;nh năng mở rộng tốt cho c&aacute;c th&agrave;nh phần hệ thống kh&aacute;c.</p>\r\n\r\n<h3><strong>Hiệu năng xử l&yacute; xuất sắc th&ocirc;ng qua CPU hiện đại v&agrave; Socket cao cấp</strong></h3>\r\n\r\n<p>Hiệu suất của mainboard Gigabyte H610M H V2 DDR4 được tối ưu h&oacute;a cho CPU Intel Core thế hệ thứ 12, 13, 14,... cung cấp nền tảng vững chắc cho x&acirc;y dựng hệ thống m&aacute;y t&iacute;nh mạnh mẽ. Với sự hỗ trợ ấn tượng d&agrave;nh cho DDR4 3200/3000/2933/2666/2400/2133 MT/s, bo mạch chủ n&agrave;y kh&ocirc;ng chỉ đảm bảo khả năng chạy c&aacute;c ứng dụng nặng một c&aacute;ch mượt m&agrave; m&agrave; c&ograve;n hỗ trợ tốt cho việc chơi game v&agrave; c&ocirc;ng việc đồ họa.&nbsp;</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte H610M H V2 DDR4 - Hiệu năng ấn tượng, khả năng kết nối ngoại vi ổn định\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/VGA/Gigabyte/mainboard-gigabyte-h610m-h-v2-ddr4-1.jpg\" /></p>\r\n\r\n<p>Chưa hết, Gigabyte H610M H V2 DDR4 c&ograve;n c&oacute; được sự kết hợp ấn tượng giữa c&ocirc;ng nghệ kết nối hiện đại c&ugrave;ng c&aacute;c t&iacute;nh năng quản l&yacute; nhiệt v&agrave; điện năng ti&ecirc;n tiến. Nhờ c&oacute; những điểm nhấn nổi bật n&agrave;y m&agrave; mainboard H610M H V2 DDR4 của nh&agrave; Gigabyte đ&atilde; được đ&aacute;nh gi&aacute; rất cao v&agrave; l&agrave; lựa chọn l&yacute; tưởng cho bất kỳ ai muốn n&acirc;ng cấp hoặc x&acirc;y dựng một hệ thống m&aacute;y t&iacute;nh hiệu suất mạnh mẽ.</p>\r\n\r\n<h3><strong>Khả năng kết nối ngoại vi xuất sắc với hệ thống c&aacute;c cổng kết nối đa dạng</strong></h3>\r\n\r\n<p>Khả năng gh&eacute;p nối ngoại vi của mainboard Gigabyte H610M H V2 DDR4 l&agrave; một trong những yếu tố nổi bật, mang lại sự linh hoạt cao cho người d&ugrave;ng. Cụ thể, hệ thống cổng kết nối đa dạng n&agrave;y bao gồm USB 3.2 Gen 1, USB 2.0/1.1, c&ugrave;ng cổng PS/2 cho b&agrave;n ph&iacute;m v&agrave; chuột, HDMI v&agrave; D-Sub cho m&agrave;n h&igrave;nh. Th&ocirc;ng qua ưu điểm n&agrave;y, mainboard H610M H V2 DDR4 của nh&agrave; Gigabyte c&oacute; thể đ&aacute;p ứng nhu cầu kết nối đa nhiệm một c&aacute;ch dễ d&agrave;ng.&nbsp;</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte H610M H V2 DDR4 - Hiệu năng ấn tượng, khả năng kết nối ngoại vi ổn định\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/VGA/Gigabyte/mainboard-gigabyte-h610m-h-v2-ddr4-1.png\" /></p>\r\n\r\n<p>Đặc biệt, mainboard H610M H V2 DDR4 c&ograve;n được biệt sở hữu cổng RJ-45 hỗ trợ kết nối &acirc;m thanh Realtek Audio CODEC, từ đ&oacute; cung cấp tốc độ truyền &acirc;m ổn định. Sự đa dạng v&agrave; t&iacute;nh năng cao của c&aacute;c cổng kết nối tr&ecirc;n Gigabyte H610M H V2 DDR4 n&agrave;y gi&uacute;p người d&ugrave;ng dễ d&agrave;ng mở rộng hệ thống của m&igrave;nh, từ việc kết nối c&aacute;c thiết bị ngoại vi đến việc tối ưu h&oacute;a trải nghiệm sử dụng tổng thể.</p>\r\n\r\n<h3><strong>Ho&agrave;n thiện với độ bền bỉ cao v&agrave; kiểu d&aacute;ng nhỏ gọn hơn</strong></h3>\r\n\r\n<p>Thiết kế ấn tượng của mainboard Gigabyte H610M H V2 DDR4 kh&ocirc;ng chỉ thể hiện qua k&iacute;ch thước nhỏ gọn của chuẩn Micro ATX m&agrave; c&ograve;n qua việc sử dụng c&aacute;c linh kiện chất lượng cao. Sự kết hợp giữa hợp chất liệu cao cấp kh&ocirc;ng những mang lại độ bền cao cho mainboard m&agrave; c&ograve;n gi&uacute;p n&oacute; ph&ugrave; hợp với hầu hết c&aacute;c loại vỏ m&aacute;y, từ cơ bản đến cao cấp.&nbsp;</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte H610M H V2 DDR4 - Hiệu năng ấn tượng, khả năng kết nối ngoại vi ổn định\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/VGA/Gigabyte/mainboard-gigabyte-h610m-h-v2-ddr4-4.jpg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, mainboard H610M H V2 DDR4 tới từ nh&agrave; Gigabyte n&agrave;y cũng sở hữu một bộ tản nhiệt tốt tr&ecirc;n chipset, gi&uacute;p hệ thống hoạt động m&aacute;t mẻ v&agrave; ổn định d&ugrave; trong điều kiện sử dụng nặng.</p>\r\n\r\n<h3><strong>N&acirc;ng cấp hiệu suất, tối ưu ho&aacute; hiệu năng sử dụng</strong></h3>\r\n\r\n<p>C&aacute;c t&iacute;nh năng đặc biệt được t&iacute;ch hợp tr&ecirc;n mainboard Gigabyte H610M H V2 DDR4 như khả năng tối ưu ho&aacute; hiệu suất v&agrave; tiết kiệm điện năng đ&atilde; l&agrave;m nổi bật gi&aacute; trị của d&ograve;ng mainboard n&agrave;y trong ph&acirc;n kh&uacute;c bo mạch chủ phổ th&ocirc;ng. Nhờ được hỗ trợ bởi RAM DDR4 v&agrave; khe cắm PCI Express x16 hỗ trợ PCIe 4.0, mainboard n&agrave;y cung cấp nền tảng vững chắc cho việc x&acirc;y dựng hệ thống m&aacute;y t&iacute;nh hiệu suất cao.&nbsp;</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte H610M H V2 DDR4 - Hiệu năng ấn tượng, khả năng kết nối ngoại vi ổn định\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/linh-kien-may-tinh/VGA/Gigabyte/mainboard-gigabyte-h610m-h-v2-ddr4-3.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, chế độ quản l&yacute; điện năng ti&ecirc;n tiến tr&ecirc;n Gigabyte H610M H V2 DDR4 cũng gi&uacute;p giảm ti&ecirc;u thụ năng lượng, đồng thời duy tr&igrave; hiệu suất ổn định. Nhờ ưu điểm n&agrave;y m&agrave; mainboard H610M H V2 DDR4 lu&ocirc;n lọt v&agrave;o tầm ngắm của người d&ugrave;ng muốn kết hợp hiệu suất cao với tiết kiệm năng lượng v&agrave;o trong bo mạch chủ</p>', NULL, '2024-05-27 07:06:19', '2024-05-27 07:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `related_table`
--

CREATE TABLE `related_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('DqQQrHpyX9rBWf2K0c6srNiNvqjzIAGUYA7EEcij', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM2RFeVJOT3Joc0dPaEJaemJMYlg1NElZNHUwUEloS000Nkc0andWRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXJ0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImNhcnQiO2E6Mzp7aTowO2E6NTp7czo5OiJwcm9kdWN0SWQiO2k6NztzOjQ6Im5hbWUiO3M6MTI6Ik1TaSBCcm92YSAxNSI7czo1OiJwcmljZSI7ZDoxNTI5MDAwMDtzOjU6ImltYWdlIjtzOjc6Im1zaS5qcGciO3M6ODoicXVhbnRpdHkiO3M6MToiMSI7fWk6MTthOjU6e3M6OToicHJvZHVjdElkIjtpOjE7czo0OiJuYW1lIjtzOjg6IkRlbGwgRzE1IjtzOjU6InByaWNlIjtkOjE2MDAwMDA7czo1OiJpbWFnZSI7czoxMToiZGVsbGcxNS5qcGciO3M6ODoicXVhbnRpdHkiO3M6MToiMSI7fWk6MjthOjU6e3M6OToicHJvZHVjdElkIjtpOjI7czo0OiJuYW1lIjtzOjE2OiJEZWxsIHZvc3RybyA1NjIwIjtzOjU6InByaWNlIjtkOjIwMDAwMDAwO3M6NToiaW1hZ2UiO3M6MTA6ImxhcHRvcC5qcGciO3M6ODoicXVhbnRpdHkiO2k6Mzt9fX0=', 1716823187);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'danh', 'danh27606@gmail.com', NULL, '$2y$12$Hbg.8JvbZCZ41gzoCnMK.O9UXGPTb4vDaY0QWWf1/gsKO8ddi5o.W', NULL, '2024-05-27 06:33:35', '2024-05-27 06:33:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `img_products`
--
ALTER TABLE `img_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `related_table`
--
ALTER TABLE `related_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `related_table_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_products`
--
ALTER TABLE `img_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `related_table`
--
ALTER TABLE `related_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `img_products`
--
ALTER TABLE `img_products`
  ADD CONSTRAINT `img_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `related_table`
--
ALTER TABLE `related_table`
  ADD CONSTRAINT `related_table_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
