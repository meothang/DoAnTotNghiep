-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 13, 2020 lúc 04:14 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `electro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
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
-- Đang đổ dữ liệu cho bảng `bills`
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
-- Cấu trúc bảng cho bảng `categories`
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
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `cate_slug`, `cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', '1', '2020-04-10 07:03:13', '2020-04-10 07:03:13'),
(10, 'Asus', 'asus', '1', '2020-06-15 05:20:33', '2020-06-15 05:20:33'),
(11, 'Acer', 'acer', '1', '2020-06-15 05:20:39', '2020-06-15 05:20:39'),
(12, 'Lenovo', 'lenovo', '1', '2020-06-15 05:20:46', '2020-06-15 05:20:46'),
(13, 'Dell', 'dell', '1', '2020-06-27 06:57:48', '2020-06-27 06:57:48'),
(14, 'Msi', 'msi', '1', '2020-06-27 06:57:53', '2020-06-27 06:57:53'),
(15, 'Microsoft', 'microsoft', '1', '2020-06-27 06:57:57', '2020-06-27 06:57:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
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
-- Đang đổ dữ liệu cho bảng `comment`
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
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
-- Cấu trúc bảng cho bảng `orders`
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
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nameguest`, `emailguest`, `phone`, `address`, `total`, `note`, `status`, `receive`, `created_at`, `updated_at`) VALUES
(31, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 47998000, 'Giao hành chính', 1, 0, '2020-06-13 20:53:53', '2020-06-14 19:41:51'),
(32, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com.vn', '907875', 'Bình Tú', 47998000, 'Giao hành chính', 1, 0, '2020-06-13 20:54:24', '2020-06-15 07:08:13'),
(37, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 47998000, 'dfdfdf', 1, 0, '2020-06-13 21:01:33', '2020-06-15 07:08:11'),
(38, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 47998000, 'sdfsffd', 0, 0, '2020-06-13 21:02:02', '2020-06-13 21:02:02'),
(45, 11, 'Trần Thắng', 'Meothanglzd1@gmail.com', '907875', 'Bình Tú', 3242, 'okok', 1, 1, '2020-06-15 05:22:15', '2020-06-15 05:23:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
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
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'view-user', 'Xem thành viên', NULL, NULL, NULL),
(2, 'create-user', 'Thêm thành viên', NULL, NULL, NULL),
(3, 'edit-user', 'Sửa thành viên', NULL, NULL, NULL),
(4, 'delete-user', 'Xóa thành viên', NULL, NULL, NULL),
(5, 'view-category', 'Xem danh mục', NULL, NULL, NULL),
(6, 'create-category', 'Thêm danh mục', NULL, NULL, NULL),
(7, 'edit-category', 'Sửa danh mục', NULL, NULL, NULL),
(8, 'delete-category', 'Xóa danh mục', NULL, NULL, NULL),
(9, 'history-category', 'Xem lịch sử xóa DM', NULL, NULL, NULL),
(10, 'view-product', 'Xem sản phẩm', NULL, NULL, NULL),
(11, 'create-product', 'Thêm sản phẩm', NULL, NULL, NULL),
(12, 'edit-product', 'Sửa sản phẩm', NULL, NULL, NULL),
(13, 'delete-product', 'Xóa sản phẩm', NULL, NULL, NULL),
(14, 'action-product', 'Action product', NULL, NULL, NULL),
(15, 'view-order', 'Xem đơn đặc hàng', NULL, NULL, NULL),
(16, 'delete-order', 'Xóa đơn đặt hàng', NULL, NULL, NULL),
(17, 'action-order', 'Duyệt đơn hàng', NULL, NULL, NULL),
(18, 'history-order', 'Lịch sử Xóa đơn hàng', NULL, NULL, NULL),
(19, 'delete-slide', 'Xóa slides', NULL, NULL, NULL),
(20, 'create-slide', 'Thêm slides', NULL, NULL, NULL),
(21, 'delete-role', 'Xóa Gruop User', NULL, NULL, NULL),
(22, 'create-role', 'Thêm nhóm quản trị', NULL, NULL, NULL),
(23, 'edit-role', 'Sửa nhóm quản trị', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_type`, `pro_content`, `pro_sale`, `pro_detail`, `pro_amount`, `status`, `pro_image`, `image1`, `image2`, `image3`, `pro_hot`, `pro_price`, `pro_cate_id`, `pro_total_rating`, `pro_total_number`, `created_at`, `updated_at`) VALUES
(2, 'Asus VivoBook A512DA', 'asus-vivobook-a512da', '3', 'Bất kể là công việc hay giải trí, dòng Laptop Asus Vivobook 15 luôn có thể hỗ trợ bạn hết mình. Hãy cùng HANOICOMPUTER tìm hiểu Laptop Asus VivoBook A512DA-EJ421T – một trong những chiếc máy tính tiêu biểu cho dòng sản phẩm', 10, 'AMD Dual Core R3-3200U,4GB,15.6\'//Ultra Slim 200nits//FHD 1920x1080,AMD Radeon™ Vega 3 Graphics,PCIEG3x2 NVME 256GB M.2 SSD,1.35 kg (Without Battery)  1.60 kg (with 2 cell battery),HD Web Camera,2x USB 2.0; 1x Micro SD; 1x HDMI; 1x USB3.1 Type A (Gen1); 1x USB3.1 Type C,37WHrs', 453, 1, '16-06-2020_1310395987_vivobook_a512da_1.jpg', '16-06-2020_1057640676_vivobook_a512da_2.jpg', '16-06-2020_913989548_vivobook_a512da_3.jpg', '16-06-2020_1173938029_vivobook_a512da_4.jpg', 1, 10999000, 10, 1, 3, '2020-04-10 17:00:00', '2020-06-16 10:10:59'),
(3, 'Apple Macbook Pro 13\" (20199)', 'apple-macbook-pro-13-20199', '2', 'MacBook Pro 13 inch năm nay có ngoại hình không thay đổi nhưng có sự nâng cấp ngoạn mục về sức mạnh hiệu năng.\r\n\r\nVề thiết kế tổng thể, diện mạo của dòng MacBook Pro năm nay không có gì thay đổi. Nhìn vào chiếc MacBook Pro 2019, người dùng sẽ thấy chúng rất quen mắt vì đây là diện mạo MacBook Pro mà người dùng đã thấy kể từ năm 2016.', 5, 'AMD Dual Core R3-3200U,4GB,15.6\'//Ultra Slim 200nits//FHD 1920x1080,AMD Radeon™ Vega 3 Graphics,PCIEG3x2 NVME 256GB M.2 SSD,1.35 kg (Without Battery)  1.60 kg (with 2 cell battery),HD Web Camera,2x USB 2.0; 1x Micro SD; 1x HDMI; 1x USB3.1 Type A (Gen1); 1x USB3.1 Type C,37WHrs', 29, 1, '16-06-2020_259834443_macbook_pro_13_touchbar_muhp2_1.jpg', '16-06-2020_864313381_macbook_pro_13_touchbar_muhp2_2.jpg', '16-06-2020_1956361228_macbook_pro_13_touchbar_muhp2_3.jpg', '16-06-2020_1696596206_macbook_pro_13_touchbar_muhp2_4.jpg', 1, 35999000, 1, 2, 8, '2020-04-10 17:00:00', '2020-06-16 10:07:26'),
(8, 'Acer Nitro AN515 43 R9FDD', 'acer-nitro-an515-43-r9fdd', '1', 'Laptop Acer Nitro AN515 (NH.Q6ZSV.003) là mẫu laptop gaming tầm trung có thiết kế hầm hố, cấu hình mạnh, đồ họa mượt mà với card màn hình Geforce GTX 1650. Đây là chiếc laptop không chỉ phù hợp cho chơi game mà còn làm việc, thiết kế đồ họa tốt. \r\n\r\nCấu hình dành cho chơi game và đồ họa\r\nVới phiên bản này, Acer Nitro AN515 sử dụng CPU AMD Ryzen 5 4 nhân, tốc độ xung nhịp 2.1 – 3.7 GHz cho hiệu năng ổn định, sử dụng được các ứng dụng nặng.\r\n\r\nKết hợp là RAM 8 GB có khả năng nâng cấp tối đa lên đến 32 GB giúp đa nhiệm tốt, thoải mái sử dụng nhiều ứng dụng cùng lúc hay mở nhiều tab Chrome. \r\n\r\nCard đồ họa rời khủng Geforce GTX 1650 4 GB cho máy sức mạnh chiến mượt các tựa game nặng. Bạn cũng sẽ có trải nghiệm sử dụng mượt mà, chuyên nghiệp các ứng dụng đồ họa 2D như Photoshop, Ai,...', 0, 'AMD Ryzen 5 3550H,8GB DDR4,15.6\" FHD Acer ComfyView IPS LED LCD,Nvidia Geforce GTX1650 4G DDR5,512GB SSD PCIe NVMe,363.4 (W) x 255 (D) x 25.9 (H) mm,HD,1 x USB 2.0; 1 x USB 3.0 Type C; 2 x USB 3.1; 1 x HDMI;1 x RJ45; 1 x Headphone,4 Cell', 12, 1, '16-06-2020_2033583238_acer_gaming_nitro_5_1.png', '16-06-2020_375792200_acer_gaming_nitro_5_2.png', '16-06-2020_1473731834_acer_gaming_nitro_5_3.png', '16-06-2020_831130735_acer_gaming_nitro_5_4.png', 0, 18798000, 11, NULL, NULL, '2020-06-04 20:18:40', '2020-06-27 07:11:24'),
(11, 'Asus Gaming TUF FA506II', 'asus-gaming-tuf-fa506ii', '1', 'ASUS TUF FA506II-AL016T sẽ thay đổi cách bạn nhìn vào laptop chơi game. Được trang bị phần cứng ấn tượng, thiết kế gọn nhưng mạnh mẽ. Trang bị CPU R7 4800H, hỗ trợ ram tối đa 32GB, VGA GTX 16 series, màn hình IPS 120Hz với bàn phím có đèn nền RGB.\r\nASUS TUF FA506II-AL016T có bàn phím chuyên dụng chơi game với các phím RGB-backlit, cụm phím WASD nổi bật và công nghệ Overstroke để thao tác nhanh và chính xác. Với màn hình NanoEdge IPS cấp độ tiên tiến, và độ bền được chứng nhận kiểm tra MIL-STD-810G. Sẽ mang đến trải nghiệm chơi game phong phú mọi lúc mọi nơi!', 0, 'AMD Ryzen™ 7 4800H Processor 2.9 GHz (8M Cache,up to 4.2 GHz),8GB DDR4-3200 SO-DIMM,15,6” FHD (1920x1080) 16:9/ 144hz/ 170:170/ Value IPS-level/ 1000:1,NVIDIA® GeForce® GTX 1650 Ti with ROG Boost/ 4GB GDDR6,PCIE NVME 512G M.2 SSD,2.30 Kg,720P HD', 7, 1, '16-06-2020_395873460_asus-tuf-fa506ii_1.jpg', '16-06-2020_1907255578_asus-tuf-fa506ii_2.jpg', '16-06-2020_524999867_asus-tuf-fa506ii_3.jpg', '16-06-2020_424379921_asus-tuf-fa506ii_4.jpg', 0, 23999000, 10, 1, 5, '2020-06-13 19:52:34', '2020-06-24 06:09:49'),
(19, 'Lenovo ThinkBook 15', 'lenovo-thinkbook-15', '4', 'Được trang bị cấu hình hiệu năng cao cũng như có thiết kế nhằm đảm bảo tính bảo mật và độ bền bỉ, dòng Laptop ThinkBook 15 của Lenovo sẽ giúp bạn tự tin xử lý công việc ở bất cứ đâu. Hôm nay, HANOICOMPUTER sẽ giúp các bạn có một cái nhìn sơ lược về dòng máy này qua bài viết đánh giá Laptop Lenovo ThinkBook 15-IML (20RW0091VN)', 0, 'I5-10210U,4GB DDR4 2666,15.6FHD TN AG 220N,Intel® UHD Graphics,256GB SSD M.2 2280 NVME TLC,WxDxH: 14.33\" x 9.65\" x 0.74\"; 364mm x 245mm x 18.9mm,HD720p camera, fixed focus, ThinkShutter,One USB-C 3.1 Gen 1, one USB-C 3.1 Gen 2,Integrated Li-ion 45Wh', 10, 1, '16-06-2020_697288140_laptop_lenovo_thinkbook_15_1.jpg', '16-06-2020_2144739151_laptop_lenovo_thinkbook_15_2.jpg', '16-06-2020_1162142394_laptop_lenovo_thinkbook_15_3.jpg', '16-06-2020_388263389_laptop_lenovo_thinkbook_15_4.jpg', 0, 13999000, 12, NULL, NULL, '2020-06-16 10:13:16', '2020-06-16 10:26:40'),
(20, 'Laptop Dell Inspiron 5391', 'laptop-dell-inspiron-5391', '3', 'Dell Inspiron 5391 sở hữu thiết kế hoàn hảo với lớp vỏ kim loại nguyên khối màu bạc có bề mặt cắt kim cương sang trọng. Với độ mỏng 14.9mm cùng khối lượng 1.24kg, máy sẽ là người bạn đồng hành hoàn hảo với người dùng trên mọi chuyến đi. Hai bên thân máy được trang bị đa dạng cổng kết nối để đáp ứng nhu cầu liên kết với các thiết bị ngoại vi của người dùng. Cụ thể cạnh phải máy là 1 USB-A 3.1 gen 1 và jack cắm tai nghe/micro. Còn cạnh trái máy đa dạng hơn với jack nguồn, HDMI 1.4b, USB-C 3.1 gen 1 và đầu đọc Micro SD Card.', 0, 'Intel Core™ i7 10510U (1.8Ghz, 8MB Cache),8GB LPDDR3 2133Mhz (Onboard),13.3-inch FHD (1920 x 1080) TrueLife LED Backlight,NVIDIA® GeForce® MX250 with 2GB GDDR5,512GB M2 NVMe SSD,1.24Kg,HD,1 x HDMI 1.4b, 1 x USB 3.1 Gen 1 Type-C™ DP/PowerDelivery), 1 x USB 3.1 Gen 1,4 cell (45Whr)', 10, 0, '27-06-2020_747550199_laptop_dell_inspiron_5391_1.png', '27-06-2020_820534786_laptop_dell_inspiron_5391_2.png', '27-06-2020_1698865323_laptop_dell_inspiron_5391_3.png', '27-06-2020_1737307774_laptop_dell_inspiron_5391_4.png', 0, 23989000, 13, NULL, NULL, '2020-06-27 07:02:26', '2020-06-27 07:02:26'),
(21, 'Laptop MSI Modern 14 A10M', 'laptop-msi-modern-14-a10m', '2', 'Laptop MSI Modern 14 A10M (693VN) - CẤU HÌNH SIÊU KHỦNG CHUYÊN DÙNG CHO ĐỒ HỌA\r\nLaptop MSI Modern 14 A10M (693VN) có cấu hình vô cùng siêu khủng với bộ vi xử lý Intel® Core ™ i7 10510U Comet Lake thế hệ thứ 10 mới nhất cùng ổ cứng SSD tối ưu hóa tốc độ xử lý chương trình trên máy. Đi kèm với bộ vi xử lý và ổ cứng trên là card đồ họa rời Intel UMA. Tổng hợp lại, ta có một chiếc máy tính xách tay mà trên đó ta có thể sử dụng các ứng dụng chỉnh sửa hình ảnh, dựng video hay thậm chí chơi game một cách vô cùng trơn tru, mượt mà.\r\n\r\nKhông chỉ có cấu hình khủng, Laptop MSI Modern 14 A10M (693VN) còn mang tính linh hoạt và tiện dụng cao. Kích thước của máy vô cùng nhỏ gọn, mỏng manh với độ dày chỉ 15.9mm cùng trọng lượng chỉ 1.18kg. Máy được làm từ chất liệu nhôm vô cùng bền. Bàn phím được trang bị đèn trắng. Đặc biệt, Laptop MSI Modern 14 A10M (693VN) đã xuất sắc vượt qua thử thách độ tin cậy và độ bền MIL-STD 810G tiêu chuẩn quân sự. Vì vậy, chủ nhân của máy có thể yên tâm về chất lượng của máy.', 0, 'Core i7 10510U – CPU_thế hệ 10 mới nhất,8GB DDR4 2666 Mhz,14\" FHD (1920*1080), IPS-Level 60Hz 72%NTSC Thin Bezel, close to 100%sRGB,Intel UMA,256GB NVMe PCIe SSD,1.18 kg,HD type (30fps@720p),2x Type-C USB3.2 Gen1, 2x Type-A USB3.2 Gen1, 1x HDMI,4 cell , 50Whr', 10, 0, '27-06-2020_1339615644_laptop_msi_modern_14_a10m_1.jpg', '27-06-2020_1933766886_laptop_msi_modern_14_a10m_2.jpg', '27-06-2020_1941354608_laptop_msi_modern_14_a10m_3.jpg', '27-06-2020_1320482987_laptop_msi_modern_14_a10m_4.jpg', 0, 20489000, 14, NULL, NULL, '2020-06-27 07:10:52', '2020-06-27 07:10:52'),
(22, 'Asus VivoBook A512DAA', 'asus-vivobook-a512daa', '3', 'Bất kể là công việc hay giải trí, dòng Laptop Asus Vivobook 15 luôn có thể hỗ trợ bạn hết mình. Hãy cùng HANOICOMPUTER tìm hiểu Laptop Asus VivoBook A512DA-EJ421T – một trong những chiếc máy tính tiêu biểu cho dòng sản phẩm', 10, 'AMD Dual Core R3-3200U,4GB,15.6\'//Ultra Slim 200nits//FHD 1920x1080,AMD Radeon™ Vega 3 Graphics,PCIEG3x2 NVME 256GB M.2 SSD,1.35 kg (Without Battery)  1.60 kg (with 2 cell battery),HD Web Camera,2x USB 2.0; 1x Micro SD; 1x HDMI; 1x USB3.1 Type A (Gen1); 1x USB3.1 Type C,37WHrs', 453, 1, '16-06-2020_1310395987_vivobook_a512da_1.jpg', '16-06-2020_1057640676_vivobook_a512da_2.jpg', '16-06-2020_913989548_vivobook_a512da_3.jpg', '16-06-2020_1173938029_vivobook_a512da_4.jpg', 1, 10999000, 10, 1, 3, '2020-04-10 17:00:00', '2020-06-16 10:10:59'),
(23, 'Apple Macbook Pro 13\" (2019)', 'apple-macbook-pro-13-2019', '2', 'MacBook Pro 13 inch năm nay có ngoại hình không thay đổi nhưng có sự nâng cấp ngoạn mục về sức mạnh hiệu năng.\r\n\r\nVề thiết kế tổng thể, diện mạo của dòng MacBook Pro năm nay không có gì thay đổi. Nhìn vào chiếc MacBook Pro 2019, người dùng sẽ thấy chúng rất quen mắt vì đây là diện mạo MacBook Pro mà người dùng đã thấy kể từ năm 2016.', 5, 'AMD Dual Core R3-3200U,4GB,15.6\'//Ultra Slim 200nits//FHD 1920x1080,AMD Radeon™ Vega 3 Graphics,PCIEG3x2 NVME 256GB M.2 SSD,1.35 kg (Without Battery)  1.60 kg (with 2 cell battery),HD Web Camera,2x USB 2.0; 1x Micro SD; 1x HDMI; 1x USB3.1 Type A (Gen1); 1x USB3.1 Type C,37WHrs', 29, 1, '16-06-2020_259834443_macbook_pro_13_touchbar_muhp2_1.jpg', '16-06-2020_864313381_macbook_pro_13_touchbar_muhp2_2.jpg', '16-06-2020_1956361228_macbook_pro_13_touchbar_muhp2_3.jpg', '16-06-2020_1696596206_macbook_pro_13_touchbar_muhp2_4.jpg', 1, 35999000, 1, 2, 8, '2020-04-10 17:00:00', '2020-06-16 10:07:26'),
(24, 'Acer Nitro AN515 43 R9FD', 'acer-nitro-an515-43-r9fd', '1', 'Laptop Acer Nitro AN515 (NH.Q6ZSV.003) là mẫu laptop gaming tầm trung có thiết kế hầm hố, cấu hình mạnh, đồ họa mượt mà với card màn hình Geforce GTX 1650. Đây là chiếc laptop không chỉ phù hợp cho chơi game mà còn làm việc, thiết kế đồ họa tốt. \r\n\r\nCấu hình dành cho chơi game và đồ họa\r\nVới phiên bản này, Acer Nitro AN515 sử dụng CPU AMD Ryzen 5 4 nhân, tốc độ xung nhịp 2.1 – 3.7 GHz cho hiệu năng ổn định, sử dụng được các ứng dụng nặng.\r\n\r\nKết hợp là RAM 8 GB có khả năng nâng cấp tối đa lên đến 32 GB giúp đa nhiệm tốt, thoải mái sử dụng nhiều ứng dụng cùng lúc hay mở nhiều tab Chrome. \r\n\r\nCard đồ họa rời khủng Geforce GTX 1650 4 GB cho máy sức mạnh chiến mượt các tựa game nặng. Bạn cũng sẽ có trải nghiệm sử dụng mượt mà, chuyên nghiệp các ứng dụng đồ họa 2D như Photoshop, Ai,...', 0, 'AMD Ryzen 5 3550H,8GB DDR4,15.6\" FHD Acer ComfyView IPS LED LCD,Nvidia Geforce GTX1650 4G DDR5,512GB SSD PCIe NVMe,363.4 (W) x 255 (D) x 25.9 (H) mm,HD,1 x USB 2.0; 1 x USB 3.0 Type C; 2 x USB 3.1; 1 x HDMI;1 x RJ45; 1 x Headphone,4 Cell', 12, 1, '16-06-2020_2033583238_acer_gaming_nitro_5_1.png', '16-06-2020_375792200_acer_gaming_nitro_5_2.png', '16-06-2020_1473731834_acer_gaming_nitro_5_3.png', '16-06-2020_831130735_acer_gaming_nitro_5_4.png', 0, 18798000, 11, NULL, NULL, '2020-06-04 20:18:40', '2020-06-27 07:11:24'),
(25, 'Asus Gaming TUF FA506I', 'asus-gaming-tuf-fa506i', '1', 'ASUS TUF FA506II-AL016T sẽ thay đổi cách bạn nhìn vào laptop chơi game. Được trang bị phần cứng ấn tượng, thiết kế gọn nhưng mạnh mẽ. Trang bị CPU R7 4800H, hỗ trợ ram tối đa 32GB, VGA GTX 16 series, màn hình IPS 120Hz với bàn phím có đèn nền RGB.\r\nASUS TUF FA506II-AL016T có bàn phím chuyên dụng chơi game với các phím RGB-backlit, cụm phím WASD nổi bật và công nghệ Overstroke để thao tác nhanh và chính xác. Với màn hình NanoEdge IPS cấp độ tiên tiến, và độ bền được chứng nhận kiểm tra MIL-STD-810G. Sẽ mang đến trải nghiệm chơi game phong phú mọi lúc mọi nơi!', 0, 'AMD Ryzen™ 7 4800H Processor 2.9 GHz (8M Cache,up to 4.2 GHz),8GB DDR4-3200 SO-DIMM,15,6” FHD (1920x1080) 16:9/ 144hz/ 170:170/ Value IPS-level/ 1000:1,NVIDIA® GeForce® GTX 1650 Ti with ROG Boost/ 4GB GDDR6,PCIE NVME 512G M.2 SSD,2.30 Kg,720P HD', 7, 1, '16-06-2020_395873460_asus-tuf-fa506ii_1.jpg', '16-06-2020_1907255578_asus-tuf-fa506ii_2.jpg', '16-06-2020_524999867_asus-tuf-fa506ii_3.jpg', '16-06-2020_424379921_asus-tuf-fa506ii_4.jpg', 0, 23999000, 10, 1, 5, '2020-06-13 19:52:34', '2020-06-24 06:09:49'),
(26, 'Laptop Dell Inspiron 53911', 'laptop-dell-inspiron-53911', '3', 'Dell Inspiron 5391 sở hữu thiết kế hoàn hảo với lớp vỏ kim loại nguyên khối màu bạc có bề mặt cắt kim cương sang trọng. Với độ mỏng 14.9mm cùng khối lượng 1.24kg, máy sẽ là người bạn đồng hành hoàn hảo với người dùng trên mọi chuyến đi. Hai bên thân máy được trang bị đa dạng cổng kết nối để đáp ứng nhu cầu liên kết với các thiết bị ngoại vi của người dùng. Cụ thể cạnh phải máy là 1 USB-A 3.1 gen 1 và jack cắm tai nghe/micro. Còn cạnh trái máy đa dạng hơn với jack nguồn, HDMI 1.4b, USB-C 3.1 gen 1 và đầu đọc Micro SD Card.', 0, 'Intel Core™ i7 10510U (1.8Ghz, 8MB Cache),8GB LPDDR3 2133Mhz (Onboard),13.3-inch FHD (1920 x 1080) TrueLife LED Backlight,NVIDIA® GeForce® MX250 with 2GB GDDR5,512GB M2 NVMe SSD,1.24Kg,HD,1 x HDMI 1.4b, 1 x USB 3.1 Gen 1 Type-C™ DP/PowerDelivery), 1 x USB 3.1 Gen 1,4 cell (45Whr)', 10, 0, '27-06-2020_747550199_laptop_dell_inspiron_5391_1.png', '27-06-2020_820534786_laptop_dell_inspiron_5391_2.png', '27-06-2020_1698865323_laptop_dell_inspiron_5391_3.png', '27-06-2020_1737307774_laptop_dell_inspiron_5391_4.png', 0, 23989000, 13, NULL, NULL, '2020-06-27 07:02:26', '2020-06-27 07:02:26'),
(27, 'Lenovo ThinkBook 155', 'lenovo-thinkbook-155', '4', 'Được trang bị cấu hình hiệu năng cao cũng như có thiết kế nhằm đảm bảo tính bảo mật và độ bền bỉ, dòng Laptop ThinkBook 15 của Lenovo sẽ giúp bạn tự tin xử lý công việc ở bất cứ đâu. Hôm nay, HANOICOMPUTER sẽ giúp các bạn có một cái nhìn sơ lược về dòng máy này qua bài viết đánh giá Laptop Lenovo ThinkBook 15-IML (20RW0091VN)', 0, 'I5-10210U,4GB DDR4 2666,15.6FHD TN AG 220N,Intel® UHD Graphics,256GB SSD M.2 2280 NVME TLC,WxDxH: 14.33\" x 9.65\" x 0.74\"; 364mm x 245mm x 18.9mm,HD720p camera, fixed focus, ThinkShutter,One USB-C 3.1 Gen 1, one USB-C 3.1 Gen 2,Integrated Li-ion 45Wh', 10, 1, '16-06-2020_697288140_laptop_lenovo_thinkbook_15_1.jpg', '16-06-2020_2144739151_laptop_lenovo_thinkbook_15_2.jpg', '16-06-2020_1162142394_laptop_lenovo_thinkbook_15_3.jpg', '16-06-2020_388263389_laptop_lenovo_thinkbook_15_4.jpg', 0, 13999000, 12, NULL, NULL, '2020-06-16 10:13:16', '2020-06-16 10:26:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Game', '2020-06-05 03:03:16', '2020-06-05 03:03:16'),
(2, 'Design', '2020-06-05 03:03:16', '2020-06-05 03:03:16'),
(3, 'Office', '2020-06-05 03:03:26', '2020-06-05 03:03:26'),
(4, 'Business', '2020-06-05 03:03:26', '2020-06-05 03:03:26'),
(5, 'Compact', '2020-06-05 03:03:42', '2020-06-05 03:03:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
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
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `ra_product_id`, `ra_number`, `ra_content`, `ra_user_id`, `created_at`, `updated_at`) VALUES
(17, 2, 3, 'tốt tôi hài lòng về nó!', 11, '2020-05-24 18:27:00', '2020-05-24 18:27:00'),
(18, 1, 4, 'OKOK', 14, '2020-05-24 18:28:26', '2020-05-24 18:28:26'),
(19, 1, 2, 'Không hài lòng', 11, '2020-05-24 18:29:50', '2020-05-24 18:29:50'),
(20, 9, 5, 'okokokok', 11, '2020-06-09 01:31:25', '2020-06-09 01:31:25'),
(21, 3, 4, 'ok', 11, '2020-06-13 20:09:30', '2020-06-13 20:09:30'),
(22, 3, 4, 'ok', 11, '2020-06-13 20:09:30', '2020-06-13 20:09:30'),
(23, 11, 5, 'ok', 11, '2020-06-24 06:09:49', '2020-06-24 06:09:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply_comments`
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
-- Đang đổ dữ liệu cho bảng `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `rep_user_id`, `rep_comment_id`, `rep_product_id`, `rep_name`, `rep_content`, `created_at`, `updated_at`) VALUES
(29, 1, 107, 1, 'Mai Linh', 'Cảm ơn bạn đã test', '2020-01-01 10:46:08', '2020-01-01 10:46:08'),
(36, 11, 111, 1, 'Trần Thắng', 'Bạn nói sai rùi!', '2020-05-24 18:30:08', '2020-05-24 18:30:08'),
(37, 11, 113, 9, 'Linh', 'hay ghe', '2020-06-06 23:25:58', '2020-06-06 23:25:58'),
(38, 11, 113, 9, 'Linh', 'koko', '2020-06-06 23:26:35', '2020-06-06 23:26:35'),
(39, 11, 116, 3, 'gfh`', 'ok', '2020-06-13 20:09:15', '2020-06-13 20:09:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'AdminFull', NULL, NULL, NULL),
(3, 'Nhân viên', NULL, NULL, NULL),
(9, 'Xem Nội Dung', NULL, '2020-05-20 18:54:59', '2020-05-20 18:54:59'),
(10, 'Nhân Viên Ktra', NULL, '2020-06-16 01:49:56', '2020-06-16 01:49:56'),
(11, 'Thêm sửa xóa thành viên', NULL, '2020-07-13 07:01:47', '2020-07-13 07:01:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permissions`
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
-- Đang đổ dữ liệu cho bảng `role_permissions`
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
(265, 10, 8, NULL, '2020-06-16 08:49:56', '2020-06-16 08:49:56'),
(266, 11, 2, NULL, '2020-07-13 14:01:48', '2020-07-13 14:01:48'),
(267, 11, 3, NULL, '2020-07-13 14:01:48', '2020-07-13 14:01:48'),
(268, 11, 4, NULL, '2020-07-13 14:01:48', '2020-07-13 14:01:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `sex`, `phone`, `birthday`, `address`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'vantoan', 'trantoanpro12b11@gmail.com', NULL, '$2y$10$EQnlC.PSbc0nlzE0hvJIh.UVMrvMT0W4xKrSyx95c6uZ7Dc6yFIa6', '1', 585842292, '1996-11-01', 'Hà Nội', 1, NULL, '2020-04-06 20:33:58', '2020-04-06 20:33:58'),
(4, 'Cu Tê', 'admin1@gmail.com', NULL, '$2y$10$pqXFJw1w9k4vR5eI1KYm3uj.5ZURRTWGRPz9HLIhp94yhLd.QJjCq', '0', 585842292, '1996-11-01', 'Hà Nội', 2, NULL, '2020-04-07 02:44:14', '2020-04-07 02:44:14'),
(5, 'meothang', 'adminthang', NULL, '$2y$10$YU7R9Oe/0zaDxirXKVnPOOBgdou6gFySWyqtX.32U6KCkNuC/8p16', '0', 944126886, '1996-11-01', '78 văn chương', 3, NULL, '2020-04-11 06:45:58', '2020-04-11 06:45:58'),
(8, 'nvthang', 'nvthang@gmail.com', NULL, '$2y$10$VMQ8n4PNV7hs4kR8dRYSbO9uINLstY8/Qfzi6mfxt1dAhSRBPhPJi', '1', 944126876, '1996-11-01', '78 văn chương', 2, NULL, '2020-04-14 07:22:19', '2020-04-14 07:22:19'),
(11, 'Trần Thắng', 'Meothanglzd1@gmail.com', NULL, '$2y$10$BRwowVsGWalYKoweS1VJUO3xgr.a9qKlM5x8RrW4Qf5K1VF8DaG5q', '1', 907875, NULL, 'Bình Tú', NULL, '7ZJFKKl2p2XNqy6p9Xqk3ogDRHilKSB9q86j9YWzdsIo8SJWFkaGifTCbihz', '2020-05-20 23:38:42', '2020-05-20 23:38:42'),
(13, 'Thanh Abc', 'thanh6bb@gmail.com', NULL, '$2y$10$VFEyv1Zv.pjEWfTbY/wZiOhuzeXNf4nZ.54hEkXNgnJIYqi7evnpO', '0', 9935892, NULL, 'Thang Binh', NULL, NULL, '2020-05-20 23:43:37', '2020-05-20 23:43:37'),
(14, 'Linh Mai', 'mailinh6bb@gmail.com', NULL, '$2y$10$Iaw.p8vaWCx9k42akCrkmOGwAsvQHSnuX4HkGC2GAT/XwH78Vf/Gm', NULL, 9709706, NULL, 'Thăng Bình', NULL, 'SeSmmsxKko4nkd7LEnT0RKE4zC3uvh3AoSkcJKsdoYYEDaveTfc9UrStma3r', '2020-05-24 18:27:45', '2020-05-24 18:27:45'),
(15, 'abcddddd', 'abc123@gmail.com', NULL, '$2y$10$XoWqYb0FeSrvssHYMDZwH.PVZ2jlxKeNfJSOSORlSCirnMs81IxFi', NULL, 2143142, NULL, 'aaaaaaaaaaaa', NULL, 'j59jztFkvpGGL4ZK0mtJMFNDJhx4is800Ga4rvHMatr7mpVfqZtW6pIICZLB', '2020-06-04 19:23:46', '2020-06-04 19:23:46'),
(16, 'Mai Linh', 'mailinh6bbbbb@gmail.com', NULL, '$2y$10$PIMaVRoWr9jiVAshIDGtXOxUrAD11wKLF3/PNZhrQlButB6oUo9by', '1', 325245345, NULL, 'Bình Tú Thăng Bình', NULL, 'oujcIXXIvoX9pnh4YJ82lCx7kTp7S5G0HOC5djqZUx06T3aoGbuqEc9X7gyW', '2020-06-14 05:48:19', '2020-06-14 05:48:19'),
(17, 'linh', 'mailinh6bbbbbbb@gmail.com', NULL, '$2y$10$XobLv270C4tFvkBhDZzgO.cU9Ja.pKL/Ifq84C7iQ0g3umkk6g8PW', '0', 786969968, NULL, 'nnnnnnnjgjkgh', NULL, 'e8srGAnWl6qMuigFJxRdALrQMfdKOVxt4bt9giQwnBbstEjTv3tiBNPkVmho', '2020-06-14 05:53:11', '2020-06-14 05:53:11'),
(18, 'Cu Tèo', 'abc1234@gmail.com', NULL, '$2y$10$9qsdo5Np0m4rQAk/Kl.SLe4SZTR2yvADW1P6mSWZtzdw1pY8LR3Tm', '1', 9475093, NULL, 'Hà Nội', NULL, 'GvmHwY2z1H2lnJw3C88OliRCSqZSHCaGqUTk1MDjFKdiGFsfLfmLN55S1SWX', '2020-06-15 05:13:59', '2020-06-15 05:13:59'),
(19, 'Thêm sửa xóa nhan viên', 'themsuaxoanhanvien@gmail.com', NULL, '$2y$10$CXgPVpj2BX0.zaXavN4ETeqeErXLG9PvFU.hDSTi7ckwPTOH4KiW.', '1', 944126876, NULL, 'Ha Noi', NULL, 'qh0yVthFpBOLlA2MR7SrEyTUCoHQ4EeruukKu37iedzi7hKTSq7w2CSDZD5r', '2020-07-13 07:04:57', '2020-07-13 07:04:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
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
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 11, 2, NULL, NULL, NULL),
(8, 16, 3, NULL, NULL, NULL),
(9, 17, 2, NULL, NULL, NULL),
(10, 18, 9, NULL, NULL, NULL),
(11, 19, 11, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_cate_slug_index` (`cate_slug`),
  ADD KEY `categories_cate_status_index` (`cate_status`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_iduser_foreign` (`idUser`),
  ADD KEY `comment_idtintuc_foreign` (`idPro`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pro_slug_index` (`pro_slug`),
  ADD KEY `products_pro_cate_id_index` (`pro_cate_id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_ra_product_id_index` (`ra_product_id`),
  ADD KEY `ratings_ra_user_id_index` (`ra_user_id`);

--
-- Chỉ mục cho bảng `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_comments_rep_user_id_index` (`rep_user_id`),
  ADD KEY `reply_comments_rep_article_id_index` (`rep_product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
