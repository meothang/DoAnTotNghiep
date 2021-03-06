-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 12:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electro1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `product_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `price_sale` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `product_id`, `order_id`, `qty`, `price_sale`, `created_at`, `updated_at`) VALUES
(11, 2, 17, 1, 9899100, '2020-05-19 18:20:32', '2020-05-19 18:20:32'),
(14, 4, 20, 1, 209000, '2020-05-24 08:07:47', '2020-05-24 08:07:47'),
(15, 4, 21, 1, 209000, '2020-05-24 08:09:08', '2020-05-24 08:09:08'),
(16, 4, 22, 5, 209000, '2020-05-24 08:22:50', '2020-05-24 08:22:50'),
(17, 3, 22, 2, 34199050, '2020-05-24 08:22:50', '2020-05-24 08:22:50'),
(27, 11, 31, 2, 23999000, '2020-06-13 20:53:53', '2020-06-13 20:53:53'),
(28, 11, 32, 2, 23999000, '2020-06-13 20:54:24', '2020-06-13 20:54:24'),
(33, 11, 37, 2, 23999000, '2020-06-13 21:01:33', '2020-06-13 21:01:33'),
(34, 11, 38, 2, 23999000, '2020-06-13 21:02:02', '2020-06-13 21:02:02'),
(41, 13, 45, 1, 3242, '2020-06-15 05:22:15', '2020-06-15 05:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `cate_slug`, `cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', '1', '2020-04-10 07:03:13', '2020-04-10 07:03:13'),
(10, 'Asus', 'asus', '1', '2020-06-15 05:20:33', '2020-06-15 05:20:33'),
(11, 'HP', 'hp', '1', '2020-06-15 05:20:39', '2020-06-15 05:20:39'),
(12, 'Lenovo', 'lenovo', '1', '2020-06-15 05:20:46', '2020-06-15 05:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idPro` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idPro`, `content`, `created_at`, `updated_at`) VALUES
(110, 11, 2, 'sản phẩm quá tốt! dùng rất bền và mượt', '2020-05-24 18:26:31', '2020-05-24 18:26:31'),
(111, 14, 1, 'Sản Phẩm Quá tuyệt vời!', '2020-05-24 18:28:17', '2020-05-24 18:28:17'),
(112, 11, 1, 'Tôi chưa hài lòng lắm về sản phẩm này. Mong cải thiện thêm', '2020-05-24 18:29:35', '2020-05-24 18:29:35'),
(113, 11, 9, 'Quá tốt', '2020-06-06 23:25:35', '2020-06-06 23:25:35'),
(114, 11, 9, 'Quá tuyệt vời', '2020-06-06 23:26:22', '2020-06-06 23:26:22'),
(115, 11, 10, 'vjhfjhhhhhhhhhhhhh', '2020-06-09 02:29:02', '2020-06-09 02:29:02'),
(116, 11, 3, 'gfgfhg', '2020-06-13 20:09:02', '2020-06-13 20:09:02'),
(117, 11, 11, 'quá tốt luôn', '2020-06-15 05:07:16', '2020-06-15 05:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_04_02_020700_create_categories_table', 1),
(6, '2020_04_03_055342_create_products_table', 2),
(7, '2020_04_25_130124_create_orders_table', 3),
(8, '2020_05_20_124235_create_roles_table', 4),
(9, '2020_05_20_124434_create_permissions_table', 4),
(10, '2020_05_20_124501_create_user_roles_table', 4),
(11, '2020_05_20_124529_create_role_permissions_table', 5),
(12, '2020_05_22_025210_create_comments_table', 6),
(13, '2020_06_14_020616_edit_table_products', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nameguest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailguest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `receive` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nameguest`, `emailguest`, `phone`, `address`, `total`, `note`, `status`, `receive`, `created_at`, `updated_at`) VALUES
(31, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 47998000, 'Giao hành chính', 1, 0, '2020-06-13 20:53:53', '2020-06-14 19:41:51'),
(32, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com.vn', '907875', 'Bình Tú', 47998000, 'Giao hành chính', 1, 0, '2020-06-13 20:54:24', '2020-06-15 07:08:13'),
(37, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 47998000, 'dfdfdf', 1, 0, '2020-06-13 21:01:33', '2020-06-15 07:08:11'),
(38, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 47998000, 'sdfsffd', 0, 0, '2020-06-13 21:02:02', '2020-06-13 21:02:02'),
(45, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 3242, 'okok', 1, 1, '2020-06-15 05:22:15', '2020-06-15 05:23:03');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'view-user', 'Xem thể thành viên', NULL, NULL, NULL),
(2, 'create-user', 'Thêm thành viên', NULL, NULL, NULL),
(3, 'edit-user', 'Sửa thành viên', NULL, NULL, NULL),
(4, 'delete-user', 'Xóa thành viên', NULL, NULL, NULL),
(5, 'view-category', 'Xem thể danh mục', NULL, NULL, NULL),
(6, 'create-category', 'Thêm danh mục', NULL, NULL, NULL),
(7, 'edit-category', 'Sửa danh mục', NULL, NULL, NULL),
(8, 'delete-category', 'Xóa Danh Mục', NULL, NULL, NULL),
(9, 'history-category', 'Xem lịch sử xóa DM', NULL, NULL, NULL),
(10, 'view-product', 'Xem sản phẩm', NULL, NULL, NULL),
(11, 'create-product', 'Thêm sản phẩm', NULL, NULL, NULL),
(12, 'edit-product', 'Sửa sản phẩm', NULL, NULL, NULL),
(13, 'delete-product', 'Xóa sản phẩm', NULL, NULL, NULL),
(14, 'action-product', 'Action product', NULL, NULL, NULL),
(15, 'view-order', 'Xem đơn đặc hàng', NULL, NULL, NULL),
(16, 'delete-order', 'Xóa đơn đặc hàng', NULL, NULL, NULL),
(17, 'action-order', 'Duyệt đơn hàng', NULL, NULL, NULL),
(18, 'history-order', 'Lịch sử Xóa đơn hàng', NULL, NULL, NULL),
(19, 'delete-slide', 'Xóa slides', NULL, NULL, NULL),
(20, 'create-slide', 'Thêm slides', NULL, NULL, NULL),
(21, 'delete-role', 'Xóa Gruop User', NULL, NULL, NULL),
(22, 'create-role', 'Thêm nhóm quản trị', NULL, NULL, NULL),
(23, 'edit-role', 'Sửa nhóm quản trị', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_sale` tinyint(4) NOT NULL DEFAULT 0,
  `pro_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_amount` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `pro_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_hot` tinyint(4) NOT NULL DEFAULT 0,
  `pro_price` int(11) NOT NULL DEFAULT 0,
  `pro_cate_id` int(11) NOT NULL DEFAULT 0,
  `pro_total_rating` int(11) DEFAULT NULL COMMENT 'Tổng lượt đánh giá\r\n',
  `pro_total_number` int(11) DEFAULT NULL COMMENT 'Điểm đánh giá\r\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_type`, `pro_content`, `pro_sale`, `pro_detail`, `pro_amount`, `status`, `pro_image`, `image1`, `image2`, `image3`, `pro_hot`, `pro_price`, `pro_cate_id`, `pro_total_rating`, `pro_total_number`, `created_at`, `updated_at`) VALUES
(2, 'Asus VivoBook A512DA', 'asus-vivobook-a512da', '2', 'Bất kể là công việc hay giải trí, dòng Laptop Asus Vivobook 15 luôn có thể hỗ trợ bạn hết mình. Hãy cùng HANOICOMPUTER tìm hiểu Laptop Asus VivoBook A512DA-EJ421T – một trong những chiếc máy tính tiêu biểu cho dòng sản phẩm', 10, 'AMD Dual Core R3-3200U,4GB,15.6\'//Ultra Slim 200nits//FHD 1920x1080,AMD Radeon™ Vega 3 Graphics,PCIEG3x2 NVME 256GB M.2 SSD,1.35 kg (Without Battery)  1.60 kg (with 2 cell battery),HD Web Camera,2x USB 2.0; 1x Micro SD; 1x HDMI; 1x USB3.1 Type A (Gen1); 1x USB3.1 Type C,37WHrs', 453, 0, '16-06-2020_2036720816_macair-1.jpg', '16-06-2020_1569366099_macair-1.jpg', 'macair-1.jpg', '16-06-2020_1525146805_macair-1.jpg', 1, 10999000, 1, 1, 3, '2020-04-10 17:00:00', '2020-06-16 03:37:44'),
(3, 'Apple Macbook Pro 13\" (2019)', 'macbook-pro-2019', '3', 'MacBook Pro 13 inch năm nay có ngoại hình không thay đổi nhưng có sự nâng cấp ngoạn mục về sức mạnh hiệu năng.', 5, 'AMD Dual Core R3-3200U,4GB,15.6\'//Ultra Slim 200nits//FHD 1920x1080,AMD Radeon™ Vega 3 Graphics,PCIEG3x2 NVME 256GB M.2 SSD,1.35 kg (Without Battery)  1.60 kg (with 2 cell battery),HD Web Camera,2x USB 2.0; 1x Micro SD; 1x HDMI; 1x USB3.1 Type A (Gen1); 1x USB3.1 Type C,37WHrs', 29, 1, 'asus1.jpg', 'asus3.jpg', 'asus3.jpg', 'asus1.jpg', 1, 35999000, 10, 2, 8, '2020-04-10 17:00:00', '2020-06-15 05:19:25'),
(8, 'Acer Nitro AN515 43 R9FD', 'acer-nitro-an515-43-r9fd', '1', 'quá đẹp', 0, ',,,,,,,,', 12, 1, 'macair-1.jpg', 'macair-2.jpg', 'macair-2.jpg', 'macair-3.jpg', 0, 200000, 11, NULL, NULL, '2020-06-04 20:18:40', '2020-06-15 21:07:51'),
(11, 'Laptop Asus Gaming TUF FA506II', 'laptop-asus-gaming-tuf-fa506ii', '1', 'ASUS TUF FA506II-AL016T sẽ thay đổi cách bạn nhìn vào laptop chơi game. Được trang bị phần cứng ấn tượng, thiết kế gọn nhưng mạnh mẽ. Trang bị CPU R7 4800H, hỗ trợ ram tối đa 32GB, VGA GTX 16 series, màn hình IPS 120Hz với bàn phím có đèn nền RGB.\r\n\r\nASUS TUF FA506II-AL016T có bàn phím chuyên dụng chơi game với các phím RGB-backlit, cụm phím WASD nổi bật và công nghệ Overstroke để thao tác nhanh và chính xác. Với màn hình NanoEdge IPS cấp độ tiên tiến, và độ bền được chứng nhận kiểm tra MIL-STD-810G. Sẽ mang đến trải nghiệm chơi game phong phú mọi lúc mọi nơi!', 0, 'AMD Ryzen™ 7 4800H Processor 2.9 GHz (8M Cache,up to 4.2 GHz),8GB DDR4-3200 SO-DIMM,15,6” FHD (1920x1080) 16:9/ 144hz/ 170:170/ Value IPS-level/ 1000:1,NVIDIA® GeForce® GTX 1650 Ti with ROG Boost/ 4GB GDDR6,PCIE NVME 512G M.2 SSD,2.30 Kg,720P HD', 7, 1, '31314_c06251902.jpg', '31314_c06251902.jpg', '31314_c06251902.jpg', '31314_c06251902.jpg', 0, 23999000, 12, NULL, NULL, '2020-06-13 19:52:34', '2020-06-15 21:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Game', '2020-06-05 03:03:16', '2020-06-05 03:03:16'),
(2, 'Design', '2020-06-05 03:03:16', '2020-06-05 03:03:16'),
(3, 'Office', '2020-06-05 03:03:26', '2020-06-05 03:03:26'),
(4, 'Business', '2020-06-05 03:03:26', '2020-06-05 03:03:26'),
(5, 'Compact', '2020-06-05 03:03:42', '2020-06-05 03:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ra_product_id` int(11) NOT NULL DEFAULT 0,
  `ra_number` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'sao đánh giá cho 1 user',
  `ra_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ra_user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `ra_product_id`, `ra_number`, `ra_content`, `ra_user_id`, `created_at`, `updated_at`) VALUES
(17, 2, 3, 'tốt tôi hài lòng về nó!', 11, '2020-05-24 18:27:00', '2020-05-24 18:27:00'),
(18, 1, 4, 'OKOK', 14, '2020-05-24 18:28:26', '2020-05-24 18:28:26'),
(19, 1, 2, 'Không hài lòng', 11, '2020-05-24 18:29:50', '2020-05-24 18:29:50'),
(20, 9, 5, 'okokokok', 11, '2020-06-09 01:31:25', '2020-06-09 01:31:25'),
(21, 3, 4, 'ok', 11, '2020-06-13 20:09:30', '2020-06-13 20:09:30'),
(22, 3, 4, 'ok', 11, '2020-06-13 20:09:30', '2020-06-13 20:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

CREATE TABLE `reply_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `rep_user_id` int(11) DEFAULT 0,
  `rep_comment_id` int(11) NOT NULL,
  `rep_product_id` int(11) NOT NULL DEFAULT 0,
  `rep_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `rep_user_id`, `rep_comment_id`, `rep_product_id`, `rep_name`, `rep_content`, `created_at`, `updated_at`) VALUES
(29, 1, 107, 1, 'Mai Linh', 'Cảm ơn bạn đã test', '2020-01-01 10:46:08', '2020-01-01 10:46:08'),
(36, 11, 111, 1, 'Trần Thắng', 'Bạn nói sai rùi!', '2020-05-24 18:30:08', '2020-05-24 18:30:08'),
(37, 11, 113, 9, 'Linh', 'hay ghe', '2020-06-06 23:25:58', '2020-06-06 23:25:58'),
(38, 11, 113, 9, 'Linh', 'koko', '2020-06-06 23:26:35', '2020-06-06 23:26:35'),
(39, 11, 116, 3, 'gfh`', 'ok', '2020-06-13 20:09:15', '2020-06-13 20:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'AdminFull', NULL, NULL, NULL),
(3, 'Nhân viên', NULL, NULL, NULL),
(9, 'Xem Nội Dung', NULL, '2020-05-20 18:54:59', '2020-05-20 18:54:59'),
(10, 'Nhân Viên Ktra', NULL, '2020-06-16 01:49:56', '2020-06-16 01:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(237, 2, 1, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(238, 2, 2, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(239, 2, 3, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(240, 2, 4, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(241, 2, 5, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(242, 2, 6, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(243, 2, 7, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(244, 2, 8, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(245, 2, 9, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(246, 2, 10, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(247, 2, 11, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(248, 2, 12, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(249, 2, 13, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(250, 2, 14, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(251, 2, 15, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(252, 2, 16, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(253, 2, 17, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(254, 2, 18, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(255, 2, 19, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(256, 2, 20, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(257, 2, 21, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(258, 2, 22, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(259, 2, 23, NULL, '2020-06-05 02:03:52', '2020-06-05 02:03:52'),
(260, 3, 12, NULL, '2020-06-16 02:33:37', '2020-06-16 02:33:37'),
(261, 3, 13, NULL, '2020-06-16 02:33:37', '2020-06-16 02:33:37'),
(262, 9, 10, NULL, '2020-06-16 04:08:40', '2020-06-16 04:08:40'),
(263, 10, 1, NULL, '2020-06-16 08:49:56', '2020-06-16 08:49:56'),
(264, 10, 2, NULL, '2020-06-16 08:49:56', '2020-06-16 08:49:56'),
(265, 10, 8, NULL, '2020-06-16 08:49:56', '2020-06-16 08:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(255) NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `sex`, `phone`, `birthday`, `address`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'vantoan', 'trantoanpro12b11@gmail.com', NULL, '$2y$10$EQnlC.PSbc0nlzE0hvJIh.UVMrvMT0W4xKrSyx95c6uZ7Dc6yFIa6', '1', 585842292, '1996-11-01', 'Hà Nội', 1, NULL, '2020-04-06 20:33:58', '2020-04-06 20:33:58'),
(4, 'Cu Tê', 'admin1@gmail.com', NULL, '$2y$10$pqXFJw1w9k4vR5eI1KYm3uj.5ZURRTWGRPz9HLIhp94yhLd.QJjCq', '0', 585842292, '1996-11-01', 'Hà Nội', 2, NULL, '2020-04-07 02:44:14', '2020-04-07 02:44:14'),
(5, 'meothang', 'adminthang', NULL, '$2y$10$YU7R9Oe/0zaDxirXKVnPOOBgdou6gFySWyqtX.32U6KCkNuC/8p16', '0', 944126886, '1996-11-01', '78 văn chương', 3, NULL, '2020-04-11 06:45:58', '2020-04-11 06:45:58'),
(8, 'nvthang', 'nvthang@gmail.com', NULL, '$2y$10$VMQ8n4PNV7hs4kR8dRYSbO9uINLstY8/Qfzi6mfxt1dAhSRBPhPJi', '1', 944126876, '1996-11-01', '78 văn chương', 2, NULL, '2020-04-14 07:22:19', '2020-04-14 07:22:19'),
(11, 'Trần Thắng', 'Meothanglzd1@gmail.com', NULL, '$2y$10$BRwowVsGWalYKoweS1VJUO3xgr.a9qKlM5x8RrW4Qf5K1VF8DaG5q', '1', 907875, NULL, 'Bình Tú', NULL, 'Dc5T0Vhbhl6aMsgh2JqZnbwd3DryV2Tu5p3F5T6yZwnI8CHfZbkk5CjXoi9p', '2020-05-20 23:38:42', '2020-05-20 23:38:42'),
(13, 'Thanh Abc', 'thanh6bb@gmail.com', NULL, '$2y$10$VFEyv1Zv.pjEWfTbY/wZiOhuzeXNf4nZ.54hEkXNgnJIYqi7evnpO', '0', 9935892, NULL, 'Thang Binh', NULL, NULL, '2020-05-20 23:43:37', '2020-05-20 23:43:37'),
(14, 'Linh Mai', 'mailinh6bb@gmail.com', NULL, '$2y$10$Iaw.p8vaWCx9k42akCrkmOGwAsvQHSnuX4HkGC2GAT/XwH78Vf/Gm', NULL, 9709706, NULL, 'Thăng Bình', NULL, 'YOCQJueo0EzWnwrPODyHg67YnJ6F1k21ZYhDoOoA8b37R8hadPjcBnkUIvtC', '2020-05-24 18:27:45', '2020-05-24 18:27:45'),
(15, 'abcddddd', 'abc123@gmail.com', NULL, '$2y$10$XoWqYb0FeSrvssHYMDZwH.PVZ2jlxKeNfJSOSORlSCirnMs81IxFi', NULL, 2143142, NULL, 'aaaaaaaaaaaa', NULL, 'j59jztFkvpGGL4ZK0mtJMFNDJhx4is800Ga4rvHMatr7mpVfqZtW6pIICZLB', '2020-06-04 19:23:46', '2020-06-04 19:23:46'),
(16, 'Mai Linh', 'mailinh6bbbbb@gmail.com', NULL, '$2y$10$PIMaVRoWr9jiVAshIDGtXOxUrAD11wKLF3/PNZhrQlButB6oUo9by', '1', 325245345, NULL, 'Bình Tú Thăng Bình', NULL, 'oujcIXXIvoX9pnh4YJ82lCx7kTp7S5G0HOC5djqZUx06T3aoGbuqEc9X7gyW', '2020-06-14 05:48:19', '2020-06-14 05:48:19'),
(17, 'linh', 'mailinh6bbbbbbb@gmail.com', NULL, '$2y$10$XobLv270C4tFvkBhDZzgO.cU9Ja.pKL/Ifq84C7iQ0g3umkk6g8PW', '0', 786969968, NULL, 'nnnnnnnjgjkgh', NULL, 'e8srGAnWl6qMuigFJxRdALrQMfdKOVxt4bt9giQwnBbstEjTv3tiBNPkVmho', '2020-06-14 05:53:11', '2020-06-14 05:53:11'),
(18, 'Cu Tèo', 'abc1234@gmail.com', NULL, '$2y$10$9qsdo5Np0m4rQAk/Kl.SLe4SZTR2yvADW1P6mSWZtzdw1pY8LR3Tm', '1', 9475093, NULL, 'Hà Nội', NULL, 'GvmHwY2z1H2lnJw3C88OliRCSqZSHCaGqUTk1MDjFKdiGFsfLfmLN55S1SWX', '2020-06-15 05:13:59', '2020-06-15 05:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 11, 2, NULL, NULL, NULL),
(8, 16, 3, NULL, NULL, NULL),
(9, 17, 2, NULL, NULL, NULL),
(10, 18, 9, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_cate_slug_index` (`cate_slug`),
  ADD KEY `categories_cate_status_index` (`cate_status`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_iduser_foreign` (`idUser`),
  ADD KEY `comment_idtintuc_foreign` (`idPro`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pro_slug_index` (`pro_slug`),
  ADD KEY `products_pro_cate_id_index` (`pro_cate_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_ra_product_id_index` (`ra_product_id`),
  ADD KEY `ratings_ra_user_id_index` (`ra_user_id`);

--
-- Indexes for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_comments_rep_user_id_index` (`rep_user_id`),
  ADD KEY `reply_comments_rep_article_id_index` (`rep_product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
