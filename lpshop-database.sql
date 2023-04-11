-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 06:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đặng Kiến Phong', '0924241299', 'dangkienphong555@gmail.com', NULL, '$2y$10$NtvHxqIods4u/vCOtjOgF.KB2pnoFOGttQZcuxHvAi0VQa/TqHLhW', NULL, '2022-06-13 07:58:29', '2022-08-03 09:01:54'),
(2, 'Phạm Tiến Long', '0795541901', 'phamtienlong135@gmail.com', NULL, '$2y$10$4tk6iFxo1tsfEZyMO0BADOvP384cXe5hJQkMRXap31tHYLPIeFzA6', NULL, '2022-06-13 08:53:17', '2022-06-13 08:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `TenNguoiBinhLuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BinhLuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DanhGia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `user_id`, `san_pham_id`, `TenNguoiBinhLuan`, `BinhLuan`, `DanhGia`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Đặng Kiến Phong', 'Tôi đã sử dụng máy được 3 tháng. Máy vẫn chạy rất tốt.', 4, '2022-07-12 07:08:29', '2022-07-12 07:08:40'),
(2, 0, 1, 'Võ Văn Hải', 'Sản phẩm chạy rất tốt.', 3, '2022-07-06 01:59:42', '2022-07-06 01:59:42'),
(3, 2, 10, 'Phạm Tiến Long', 'Sản phẩm hoạt động ổn trong 4 tháng. Đôi khi máy có tiếng quạt khá to sau khi chạy hơn 1 tiếng.', 4, '2022-07-06 02:04:42', '2022-07-06 02:04:42'),
(4, 0, 43, 'long', 'abch', 3, '2022-07-20 16:33:28', '2022-07-20 16:33:28'),
(5, 5, 5, 'long1355', 'Đbrr', 5, '2022-07-20 17:16:37', '2022-07-20 17:16:37'),
(6, 2, 1, 'Phạm Tiến Long', 'asd', 4, '2022-07-28 17:46:45', '2022-07-28 17:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(255) NOT NULL,
  `TenUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `TenUser`, `DiaChi`, `SoDienThoai`, `Email`, `created_at`, `updated_at`) VALUES
(38, 2, 'Phạm Tiến Long', '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', 'phamtienlong135@gmail.com', '2022-08-01 10:16:04', '2022-08-01 10:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `TenSanPham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TenHinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `soluong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `san_pham_id`, `TenSanPham`, `TenHinhAnh`, `DonGia`, `soluong`, `created_at`, `updated_at`) VALUES
(1, 38, 10, 'PS4 Pro 1TB', 'PS4 Pro 1TB-image-1655186999-878.jpg', 7800000, '3', '2022-08-01 10:22:47', '2022-08-01 10:23:46'),
(2, 38, 47, 'Darksiders III - Secondhand', 'darksiders-iii---secondhand-image-1658332288.jpg', 600000, '1', '2022-08-01 10:39:14', '2022-08-01 10:39:14'),
(4, 39, 23, 'Thẻ Psn 100,000 Rp Indonesia', 'Thẻ Psn 100,000 Rp Indonesia-image-1655228510-120.jpg', 210000, '3', '2022-08-01 10:42:30', '2022-08-01 10:54:18'),
(5, 40, 43, 'PlayStation 4 Slim 500GB FW 9.00 USED', 'playstation-4-slim-500gb-fw-900-used-image-1658331565.jpg', 6272000, '1', '2022-08-03 07:17:13', '2022-08-03 07:17:13'),
(6, 40, 42, 'Máy PS2 Slim', 'thng-hiu-oem-my-chi-game-in-t-tay-cm-gamer-kt-ni-tivi-a-cng-hdmi-v-av-800-game-h-tr-th-nh-lu-game-image-1658331289.jpg', 1532000, '3', '2022-08-03 07:17:18', '2022-08-03 07:17:26'),
(7, 41, 10, 'PS4 Pro 1TB', 'PS4 Pro 1TB-image-1655186999-878.jpg', 7800000, '1', '2022-08-03 09:24:13', '2022-08-03 09:24:13'),
(8, 41, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con-image-1655182336-118.png', 2500000, '1', '2022-08-03 09:24:19', '2022-08-03 09:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `don_hang_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `TenSanPham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`don_hang_id`, `san_pham_id`, `TenSanPham`, `SoLuong`, `DonGia`, `created_at`, `updated_at`) VALUES
(1, 8, 'Xbox Series Wireless Controller', 5, 530000, '2022-06-13 22:36:43', '2022-06-13 22:36:43'),
(1, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-06-13 22:36:44', '2022-06-13 22:36:44'),
(2, 5, 'Xbox Series X 1TB', 8, 3400000, '2022-06-14 03:11:50', '2022-06-14 03:11:50'),
(2, 6, 'Nintendo Switch Gray USED', 3, 1200000, '2022-06-14 03:11:50', '2022-06-14 03:11:50'),
(3, 6, 'Nintendo Switch Gray USED', 3, 1200000, '2022-06-14 06:14:13', '2022-06-14 06:14:13'),
(3, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-06-14 06:14:13', '2022-06-14 06:14:13'),
(3, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 3, 2500000, '2022-06-14 06:14:13', '2022-06-14 06:14:13'),
(4, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-06-14 09:27:40', '2022-06-14 09:27:40'),
(36, 1, 'PlayStation 4 Slim 1TB', 1, 4300000, '2022-06-14 10:05:44', '2022-06-14 10:05:44'),
(36, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-06-14 10:05:44', '2022-06-14 10:05:44'),
(37, 10, 'PS4 Pro 1TB', 1, 7800000, '2022-06-14 10:06:32', '2022-06-14 10:06:32'),
(39, 6, 'Nintendo Switch Gray USED', 1, 1200000, '2022-06-14 10:07:12', '2022-06-14 10:07:12'),
(41, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-06-14 10:10:04', '2022-06-14 10:10:04'),
(49, 10, 'PS4 Pro 1TB', 1, 7800000, '2022-07-01 01:38:18', '2022-07-01 01:38:18'),
(49, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-07-01 01:38:18', '2022-07-01 01:38:18'),
(50, 10, 'PS4 Pro 1TB', 1, 7800000, '2022-07-05 23:14:46', '2022-07-05 23:14:46'),
(51, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-07-05 23:24:00', '2022-07-05 23:24:00'),
(52, 28, 'DualSense - PS5 Wireless Game Controller', 1, 1980000, '2022-07-13 22:22:08', '2022-07-13 22:22:08'),
(53, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-07-20 04:05:15', '2022-07-20 04:05:15'),
(54, 9, 'Resident Evil 5 - US', 1, 1203000, '2022-07-20 16:31:10', '2022-07-20 16:31:10'),
(54, 47, 'Darksiders III - Secondhand', 3, 600000, '2022-07-20 16:31:10', '2022-07-20 16:31:10'),
(55, 37, 'PlayStation 5 / PS5 Standard Edition', 5, 14210000, '2022-07-24 12:57:19', '2022-07-24 12:57:19'),
(56, 37, 'PlayStation 5 / PS5 Standard Edition', 1, 14210000, '2022-07-24 17:18:28', '2022-07-24 17:18:28'),
(56, 37, 'PlayStation 5 / PS5 Standard Edition', 1, 14210000, '2022-07-24 17:18:28', '2022-07-24 17:18:28'),
(56, 10, 'PS4 Pro 1TB', 5, 7800000, '2022-07-24 17:18:28', '2022-07-24 17:18:28'),
(57, 38, 'PlayStation 5 / PS5 Standard Edition Horizon Forbidden West Bundle - Hàng VN', 1, 18130000, '2022-07-24 17:29:47', '2022-07-24 17:29:47'),
(57, 37, 'PlayStation 5 / PS5 Standard Edition', 1, 14210000, '2022-07-24 17:29:47', '2022-07-24 17:29:47'),
(57, 10, 'PS4 Pro 1TB', 1, 7800000, '2022-07-24 17:29:47', '2022-07-24 17:29:47'),
(58, 37, 'PlayStation 5 / PS5 Standard Edition', 1, 14210000, '2022-07-28 17:45:54', '2022-07-28 17:45:54'),
(60, 23, 'Thẻ Psn 100,000 Rp Indonesia', 3, 210000, '2022-08-01 11:05:50', '2022-08-01 11:05:50'),
(61, 43, 'PlayStation 4 Slim 500GB FW 9.00 USED', 1, 6272000, '2022-08-03 07:17:50', '2022-08-03 07:17:50'),
(61, 42, 'Máy PS2 Slim', 3, 1532000, '2022-08-03 07:17:50', '2022-08-03 07:17:50'),
(62, 10, 'PS4 Pro 1TB', 1, 7800000, '2022-08-03 09:28:25', '2022-08-03 09:28:25'),
(62, 7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 1, 2500000, '2022-08-03 09:28:25', '2022-08-03 09:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenDanhMuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenDanhMucCon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `TenDanhMuc`, `TenDanhMucCon`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Máy chơi game', 'Máy PS4', 0, '2022-06-13 08:01:10', '2022-06-13 08:01:10'),
(2, 'Máy chơi game', 'Máy Nintendo', 0, '2022-06-13 08:01:36', '2022-06-13 08:01:36'),
(3, 'Máy chơi game', 'Máy Xbox One S', 0, '2022-06-13 08:01:54', '2022-06-13 08:01:54'),
(4, 'Phụ kiện', 'Tay cầm', 0, '2022-06-13 08:02:11', '2022-06-13 08:02:11'),
(5, 'Game', 'Đĩa cũ - 2nd', 0, '2022-06-13 08:02:41', '2022-06-13 08:02:41'),
(6, 'Game', 'Game PS4', 0, '2022-06-13 08:03:37', '2022-06-13 08:03:37'),
(7, 'Game', 'Game PS5', 0, '2022-06-13 08:03:53', '2022-06-13 08:03:53'),
(8, 'Thẻ game', 'Asia', 0, '2022-06-14 08:05:46', '2022-06-14 08:05:46'),
(9, 'Máy cũ', 'Máy PS5 cũ', 0, '2022-06-14 08:06:08', '2022-06-14 11:04:48'),
(10, 'Phụ kiện', 'Cáp sạc', 0, '2022-06-14 08:24:40', '2022-06-14 08:24:40'),
(11, 'Game', 'Nintendo Switch', 0, '2022-06-14 08:47:34', '2022-06-14 08:47:34'),
(12, 'Thẻ game', 'US', 0, '2022-06-14 10:36:11', '2022-06-14 10:36:11'),
(13, 'Thẻ game', 'UK', 0, '2022-06-14 10:42:29', '2022-06-14 10:42:29'),
(14, 'Phụ kiện', 'Nitendo Gear', 0, '2022-06-14 10:48:54', '2022-06-14 10:48:54'),
(15, 'Phụ kiện', 'Phụ kiện PS4', 1, '2022-06-14 10:54:03', '2022-07-20 03:26:48'),
(16, 'Máy cũ', 'Máy PS2', 1, '2022-07-01 02:09:00', '2022-07-20 03:19:16'),
(17, 'Máy chơi game', 'PS5', 2, '2022-07-20 08:04:02', '2022-07-20 08:04:02'),
(18, 'Máy cũ', 'PS4', 2, '2022-07-20 08:38:12', '2022-07-20 08:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `TenNguoiNhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `GhiChu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhuongThucThanhToan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaGiaoDich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TinhTrang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LichSuDonHang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `user_id`, `TenNguoiNhan`, `DiaChi`, `SoDienThoai`, `Email`, `ThanhTien`, `GhiChu`, `PhuongThucThanhToan`, `MaGiaoDich`, `TinhTrang`, `LichSuDonHang`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi', '0924241299', 'dangkienphong555@gmail.com', 5150000, 'Test thanh toán', 'COD', NULL, 'Đang Vận Chuyển', '', 0, '2022-06-13 22:36:43', '2022-06-13 22:52:16'),
(2, 1, 'Đặng Kiến Phong', 'Nguyễn Trãi P11 Q5', '0924241299', 'dangkienphong555@gmail.com', 30800000, 'Không có ghi chú', 'VNPAY', '1685324', 'Chờ Phê Duyệt', '', 0, '2022-06-14 03:11:50', '2022-06-14 03:11:50'),
(3, 2, 'Phạm Tiến Long', 'âvv', '0795541901', 'phamtienlong135@gmail.com', 13600000, 'ádasdsa', 'VNPAY', '16853489', 'Chờ Phê Duyệt', '', 0, '2022-06-14 06:14:13', '2022-06-14 06:14:13'),
(4, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:27:40', '2022-06-14 09:27:40'),
(5, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:29:07', '2022-06-14 09:29:07'),
(6, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:29:20', '2022-06-14 09:29:20'),
(7, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:29:52', '2022-06-14 09:29:52'),
(8, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:30:00', '2022-06-14 09:30:00'),
(9, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:30:18', '2022-06-14 09:30:18'),
(10, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:30:40', '2022-06-14 09:30:40'),
(11, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:30:49', '2022-06-14 09:30:49'),
(12, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:31:00', '2022-06-14 09:31:00'),
(13, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:31:33', '2022-06-14 09:31:33'),
(14, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:34:13', '2022-06-14 09:34:13'),
(15, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:36:35', '2022-06-14 09:36:35'),
(16, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:38:48', '2022-06-14 09:38:48'),
(17, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:41:40', '2022-06-14 09:41:40'),
(18, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:41:55', '2022-06-14 09:41:55'),
(19, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:44:31', '2022-06-14 09:44:31'),
(20, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:46:10', '2022-06-14 09:46:10'),
(21, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:46:43', '2022-06-14 09:46:43'),
(22, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:46:54', '2022-06-14 09:46:54'),
(23, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:47:51', '2022-06-14 09:47:51'),
(24, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:50:38', '2022-06-14 09:50:38'),
(25, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:51:16', '2022-06-14 09:51:16'),
(26, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:52:43', '2022-06-14 09:52:43'),
(27, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:53:07', '2022-06-14 09:53:07'),
(28, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:55:04', '2022-06-14 09:55:04'),
(29, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:55:56', '2022-06-14 09:55:56'),
(30, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:56:06', '2022-06-14 09:56:06'),
(31, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:56:18', '2022-06-14 09:56:18'),
(32, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:57:08', '2022-06-14 09:57:08'),
(33, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:57:19', '2022-06-14 09:57:19'),
(34, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:57:33', '2022-06-14 09:57:33'),
(35, 2, 'Phạm Tiến Long', '231 Lê quang sung', '0795541901', 'phamtienlong135@gmail.com', 2500000, '23331', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 09:57:41', '2022-06-14 09:57:41'),
(36, 2, 'Phạm Tiến Long', 'àv', '0795541901', 'phamtienlong135@gmail.com', 6800000, '1221 2022-07-01 05:35:15 : Đơn hàng đã được vận chuyển. 2022-07-01 05:38:14 : Đơn hàng đã được vận chuyển. 2022-07-01 05:40:31 : Đơn hàng đã được nhận thành công.', 'VNPAY', '1583423', 'Nhận Thành Công', '', 0, '2022-06-14 10:05:44', '2022-06-30 22:40:31'),
(37, 2, 'long135', 'sá', '0795541901', 'phamtienlong135@gmail.com', 7800000, 'sá', 'VNPAY', '1534624', 'Chờ Phê Duyệt', '', 0, '2022-06-14 10:06:32', '2022-06-14 10:06:32'),
(38, 2, 'long135', 'sá', '0795541901', 'phamtienlong135@gmail.com', 7800000, 'sá', 'VNPAY', '1896583', 'Hủy Đơn Hàng', ' 2022-07-14 08:11:10 : Hủy đơn hàng vì Không còn sản phẩm.', 0, '2022-06-14 10:06:50', '2022-07-14 01:11:10'),
(39, 2, 'Tiến Long Phạm', 'sda', '0795541901', 'phamtienlong135@gmail.com', 1200000, 'sadas', 'COD', NULL, 'Chờ Phê Duyệt', '', 0, '2022-06-14 10:07:12', '2022-06-14 10:07:12'),
(40, 2, 'Tiến Long Phạm', 'sda', '0795541901', 'phamtienlong135@gmail.com', 1200000, 'sadas', 'COD', NULL, 'Hủy Đơn Hàng', ' 2022-07-20 10:40:24 : Hủy đơn hàng bởi Đặng Kiến Phong vì Không có sản phẩm trong đơn hàng.', 1, '2022-06-14 10:09:40', '2022-07-20 03:40:24'),
(41, 2, 'Phạm Tiến Long', 'sâs', '0795541901', 'phamtienlong135@gmail.com', 2500000, 'sấ 2022-07-01 05:24:17 : Đơn hàng đã được vận chuyển.', 'VNPAY', '1423516', 'Đang Vận Chuyển', '', 0, '2022-06-14 10:10:04', '2022-06-30 22:24:17'),
(42, 2, 'Phạm Tiến Long', 'sâs', '0795541901', 'phamtienlong135@gmail.com', 2500000, 'sấ', 'VNPAY', '1532468', 'Chờ Phê Duyệt', '', 0, '2022-06-14 10:10:43', '2022-06-14 10:10:43'),
(43, 2, 'Phạm Tiến Long', 'sâs', '0795541901', 'phamtienlong135@gmail.com', 2500000, 'sấ 2022-07-01 05:27:09 : Hủy đơn hàng vì Đơn hàng không có sản phẩm.', 'VNPAY', '1562315', 'Hủy Đơn Hàng', '', 0, '2022-06-14 10:10:52', '2022-06-30 22:27:09'),
(45, 2, 'Phạm Tiến Long', 'sâs', '0795541901', 'phamtienlong135@gmail.com', 2500000, 'sấ 2022-07-01 08:25:18 : Hủy đơn hàng vì Đơn hàng không có sản phẩm.', 'VNPAY', NULL, 'Hủy Đơn Hàng', '', 0, '2022-06-14 10:11:17', '2022-07-01 01:25:18'),
(47, 2, 'Phạm Tiến Long', 'sâs', '0795541901', 'phamtienlong135@gmail.com', 2500000, 'sấ 2022-07-01 08:05:58 : Hủy đơn hàng vì Không có sản phẩm trong đơn hàng.', 'VNPAY', NULL, 'Hủy Đơn Hàng', '', 0, '2022-06-14 10:11:47', '2022-07-01 01:05:58'),
(49, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi', '0924241299', 'dangkienphong555@gmail.com', 10300000, 'Đơn hàng mới nhất của website', 'COD', NULL, 'Nhận Thành Công', '2022-07-01 08:38:18: Nhận đơn hàng từ website. 2022-07-01 08:40:53 : Đơn hàng đã được vận chuyển. 2022-07-01 08:42:32 : Đơn hàng đã được nhận thành công.', 0, '2022-07-01 01:38:18', '2022-07-01 01:42:32'),
(51, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 2500000, 'Không có ghi chú', 'VNPAY', '1587453', 'Chờ Phê Duyệt', '2022-07-06 06:24:00: Nhận đơn hàng từ website.', 0, '2022-07-05 23:24:00', '2022-07-05 23:24:00'),
(52, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 1980000, 'Không có ghi chú', 'VNPAY', '1855642', 'Hủy Đơn Hàng', '2022-07-14 05:22:08: Nhận đơn hàng từ website. 2022-07-14 08:07:53 : Đơn hàng đã được vận chuyển. 2022-07-14 08:10:25 : Hủy đơn hàng vì test hủy đơn hàng.', 0, '2022-07-13 22:22:08', '2022-07-14 01:10:25'),
(53, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 2500000, 'Test việc thanh toán', 'COD', NULL, 'Chờ Phê Duyệt', '2022-07-20 11:05:15: Nhận đơn hàng từ website.', 0, '2022-07-20 04:05:15', '2022-07-20 04:05:15'),
(54, 2, 'Phạm Tiến Long', '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', 'phamtienlong135@gmail.com', 3003000, 'abvc', 'VNPAY', '1564326', 'Đang Vận Chuyển', '2022-07-20 23:31:10: Nhận đơn hàng từ website. 2022-07-21 00:13:04 : Phạm Tiến Long xác nhận đơn hàng đã được vận chuyển.', 2, '2022-07-20 16:31:10', '2022-07-20 17:13:04'),
(55, 2, 'Phạm Tiến Long', '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', 'phamtienlong135@gmail.com', 71050000, 'asas', 'VNPAY', '1534267', 'Đang Vận Chuyển', '2022-07-24 19:57:19: Nhận đơn hàng từ website. 2022-08-03 16:23:46 : Đặng Kiến Phong xác nhận đơn hàng đã được vận chuyển.', 1, '2022-07-24 12:57:19', '2022-08-03 09:23:46'),
(56, 2, 'Phạm Tiến Long', '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', 'phamtienlong135@gmail.com', 67420000, '321', 'VNPAY', '1452135', 'Hủy Đơn Hàng', '2022-07-25 00:18:28: Nhận đơn hàng từ website. 2022-08-03 14:08:14 : Hủy đơn hàng bởi Đặng Kiến Phong vì test chức năng hủy.', 1, '2022-07-24 17:18:28', '2022-08-03 07:08:14'),
(57, 2, 'Phạm Tiến Long', '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', 'phamtienlong135@gmail.com', 40140000, 'Không có ghi chú', 'COD', NULL, 'Chờ Phê Duyệt', '2022-07-25 00:29:47: Nhận đơn hàng từ website.', 0, '2022-07-24 17:29:47', '2022-07-24 17:29:47'),
(58, 2, 'Phạm Tiến Long', '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', 'phamtienlong135@gmail.com', 14210000, 'Không có ghi chú', 'COD', NULL, 'Đang Vận Chuyển', '2022-07-29 00:45:54: Nhận đơn hàng từ website. 2022-08-03 13:54:42 : Đặng Kiến Phong xác nhận đơn hàng đã được vận chuyển.', 1, '2022-07-28 17:45:54', '2022-08-03 06:54:42'),
(59, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 630000, 'Không có ghi chú', 'COD', NULL, 'Hủy Đơn Hàng', '2022-08-01 17:57:42: Nhận đơn hàng từ website. 2022-08-03 13:54:13 : Hủy đơn hàng bởi Đặng Kiến Phong vì đơn hàng bị lỗi.', 1, '2022-08-01 10:57:42', '2022-08-03 06:54:13'),
(60, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 630000, 'Không có ghi chú', 'COD', NULL, 'Đang Vận Chuyển', '2022-08-01 18:05:49: Nhận đơn hàng từ website. 2022-08-03 13:53:47 : Đặng Kiến Phong xác nhận đơn hàng đã được vận chuyển.', 1, '2022-08-01 11:05:49', '2022-08-03 06:53:47'),
(61, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 10868000, 'test chức năng Đặt hàng VNPay', 'VNPAY', '13810455', 'Đang Vận Chuyển', '2022-08-03 14:17:50: : Đơn hàng đã được tạo và chờ khách hàng thanh toán. 2022-08-03 21:18:31 : Đơn hàng đã được thanh toán thành công. 2022-08-03 14:18:54 : Đặng Kiến Phong xác nhận đơn hàng đã được vận chuyển.', 1, '2022-08-03 07:17:50', '2022-08-03 07:18:54'),
(62, 1, 'Đặng Kiến Phong', '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', 'dangkienphong555@gmail.com', 10300000, 'Test thanh toán COD', 'COD', NULL, 'Đang Vận Chuyển', '2022-08-03 16:28:25: Đơn hàng đã được tạo tự động , chờ phê duyệt của quản trị viên. 2022-08-03 16:28:48 : Đặng Kiến Phong xác nhận đơn hàng đã được vận chuyển.', 1, '2022-08-03 09:28:25', '2022-08-03 09:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenNguoiGui` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenCongTy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `TieuDe`, `TenNguoiGui`, `Email`, `TenCongTy`, `TinhTrang`, `NoiDung`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Liên hệ trang LPShop', 'Đặng Kiến Phong', 'dangkienphong555@gmail.com', 'Đại Học STU', 0, 'Test chức năng liên hệ website', 1, '2022-06-29 01:36:04', '2022-07-20 03:44:12'),
(2, 'Test chức năng gửi tin nhắn liên hệ', 'Đặng Kiến Phong', 'dangkienphong555@gmail.com', 'Đại Học STU', 0, 'Tin nhắn sẽ được gửi tới website LPSHOP. Mong shop hồi đáp qua email của mình', 0, '2022-08-03 09:27:30', '2022-08-03 09:27:30');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_13_074115_create_danh_mucs_table', 1),
(4, '2022_05_16_092339_create_nha_cung_caps_table', 1),
(5, '2022_05_19_053839_create_san_phams_table', 1),
(6, '2022_05_20_024549_create_userprofiles_table', 1),
(7, '2022_06_06_053213_create_users_table', 1),
(8, '2022_06_06_053327_create_admins_table', 1),
(9, '2022_06_09_070709_create_lien_hes_table', 1),
(10, '2022_06_09_085606_create_don_hangs_table', 1),
(11, '2022_06_09_091035_create_chi_tiet_don_hangs_table', 1),
(12, '2022_06_10_033854_create_carts_table', 1),
(13, '2022_07_06_070005_create_binh_luans_table', 2),
(14, '2022_08_01_164455_create_cart_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_caps`
--

CREATE TABLE `nha_cung_caps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenNhaCungCap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nha_cung_caps`
--

INSERT INTO `nha_cung_caps` (`id`, `TenNhaCungCap`, `Email`, `SoDienThoai`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Sony', 'phamtienlong135@gmail.com', '12312312312', 0, '2022-06-13 08:06:55', '2022-06-13 08:06:55'),
(2, 'Microsoft Xbox', 'leano41@96dc.asia', '0123456789', 0, '2022-06-13 08:07:24', '2022-06-13 08:07:24'),
(3, 'Nintendo', 'dangkienphong555@gmail.com', '0123456789', 0, '2022-06-13 08:07:55', '2022-06-13 08:07:55'),
(4, 'Ubisoft', 'binh.62910@gmail.com', '12312312312', 0, '2022-06-13 08:08:15', '2022-06-13 08:08:15'),
(5, 'Capcom', 'capcom@gmail.com', '12312312312', 0, '2022-06-14 08:09:40', '2022-06-14 08:09:40'),
(6, 'Activision', 'Activision@gmail.com', '1235566777', 0, '2022-06-14 08:29:33', '2022-06-14 08:29:33'),
(7, 'Rockstar Games', 'RockstarGames552@gmail.com', '0123456789', 0, '2022-06-14 08:37:35', '2022-07-20 03:23:30'),
(8, 'Dummy', 'dangkienphong585@gmail.com', '09034326512', 1, '2022-07-20 03:28:31', '2022-07-20 03:28:31'),
(9, 'Hori', 'hori@gmail.com', '12312312312', 2, '2022-07-20 08:41:09', '2022-07-20 08:41:09'),
(10, 'THQ Nordic', 'THQNordic@gmail.com', '0123456789', 2, '2022-07-20 08:50:20', '2022-07-20 08:50:20');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenSanPham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nha_cung_cap_id` bigint(20) UNSIGNED NOT NULL,
  `danh_muc_id` bigint(20) UNSIGNED NOT NULL,
  `NgayRaMat` date NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `SoLuongTrongKho` int(11) NOT NULL,
  `GPU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RAM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BoNhoTrong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChucNangHoTro` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTroBluetooth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CongKetNoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CongRaAV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThietBiBaoGom` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonGia` int(11) NOT NULL,
  `tenhinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `TenSanPham`, `nha_cung_cap_id`, `danh_muc_id`, `NgayRaMat`, `TinhTrang`, `SoLuongTrongKho`, `GPU`, `CPU`, `RAM`, `BoNhoTrong`, `ChucNangHoTro`, `HoTroBluetooth`, `CongKetNoi`, `CongRaAV`, `ThietBiBaoGom`, `DonGia`, `tenhinhanh`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'PlayStation 4 Slim 1TB', 1, 1, '2022-06-15', 1, 10, '8X Cores @ 3.8 GHz (3.66 GHz w/SMT) Custom Zen 2 CPU, 7nm Enhanced SoC', '12 TFLOPS, 52 CUs @1.825 GHz Custom AMD RDNA 2 GPU', '8GB', '1TB PCle Gen 4 NVME SSD', 'Không có', 'Có', '1x HDMI 2.1 port, 3x USB 3.1 Gen 1 ports', 'HDMI 2.1 (4K@120Hz, 8K@60Hz)', 'Tay Cầm,Doc sạc', 4300000, 'PlayStation 4 Slim 1TB-image-1655133839-873.png', 0, '2022-06-13 08:23:59', '2022-06-30 22:38:14'),
(5, 'Xbox Series X 1TB', 2, 3, '2022-06-04', 1, 50, '8X Cores @ 3.8 GHz (3.66 GHz w/SMT) Custom Zen 2 CPU, 7nm Enhanced SoC', '1.84 TFLOPS, đồ họa nền tảng AMD Radeon', '16GB GDDR6', '1TB PCle Gen 4 NVME SSD', 'không có', 'Có', '3.5mm audio jack, cổng game card, cổng microSD card - Nintendo Switch Dock: 2 cổng USB 2.0 bên cạnh và một cổng USB phía sau, cổng AC Adapter, Cổng HDMI', 'HDMI out port (hỗ trợ 4K/HDR)', 'Tay Cầm,Doc sạc', 3400000, 'Xbox Series X 1TB-image-1655181835-527.png', 0, '2022-06-13 21:43:55', '2022-06-14 08:57:51'),
(6, 'Nintendo Switch Gray USED', 3, 2, '2022-06-03', 1, 25, 'NVIDIA Custom', '8X Cores @ 3.8 GHz (3.66 GHz w/SMT) Custom Zen 2 CPU, 7nm Enhanced SoC', '64GB', '64GB', 'Không có', 'Có', '3.5mm audio jack, cổng game card, cổng microSD card - Nintendo Switch Dock: 2 cổng USB 2.0 bên cạnh và một cổng USB phía sau, cổng AC Adapter, Cổng HDMI, cổng LAN ở dock', 'Không có', 'Tay Cầm,Tai Nghe,Doc sạc', 1200000, 'Nintendo Switch Gray USED-image-1655182207-654.png', 0, '2022-06-13 21:50:07', '2022-06-13 21:50:07'),
(7, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con', 3, 2, '2022-06-06', 1, 13, 'NVIDIA Custom', 'NVIDIA Tegra X1, 20nm, Cortex A7 bốn nhân', '8GB', '64GB', 'không có', 'Có', '3.5mm audio jack, cổng game card, cổng microSD card - Nintendo Switch Dock: 2 cổng USB 2.0 bên cạnh và một cổng USB phía sau, cổng AC Adapter, Cổng HDMI, cổng LAN ở dock', 'Không có', 'Tay Cầm,Tai Nghe,Doc sạc', 2500000, 'Nintendo Switch OLED model with Neon Red Blue Joy‑Con-image-1655182336-118.png', 0, '2022-06-13 21:52:16', '2022-07-01 01:40:53'),
(8, 'Xbox Series Wireless Controller', 2, 4, '2022-03-16', 1, 20, 'Không có', 'x86-64 AMD \"Jaguar\", 8 nhân', 'Không có', 'Không có', 'Hỗ trợ bluetooth kết nối với các dòng máy Xbox', 'Có', 'USB Type-C (Sạc & Truyền dữ liệu), Stereo Headset Jack và Cổng sạc qua dock', 'Cổng USB tốc độ cao (USB 3.1 thế hệ 1) x 2, Cổng AUX x 1', 'Doc sạc', 530000, 'Xbox Series Wireless Controller-image-1655182504-350.jpg', 0, '2022-06-13 21:55:04', '2022-06-13 22:52:16'),
(9, 'Resident Evil 5 - US', 5, 6, '2021-11-24', 1, 5, 'Không có', 'Không có', 'Không có', 'Không có', 'Có thể chơi game với các dòng máy PS4 trở lên', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1203000, 'assassin\'s creed valhalla 4-image-1655182669-259.jpg', 0, '2022-06-13 21:57:49', '2022-07-20 17:13:04'),
(10, 'PS4 Pro 1TB', 1, 1, '2021-10-12', 1, 15, 'Không có', 'x86-64 AMD \"Jaguar\", 8 nhân. GPU: 4.20 TFLOPS, dựa trên nền tảng AMD Radeon.', 'Không có', 'GDDR5 8GB', 'Hiển thị nội dung 4K. Hỗ trợ chơi các game 4K với đồ họa chất lượng, nhiều hiệu ứng.', 'Có', 'USB (USB 3.1 thế hệ 1) x 3 cổng, AUX x 1 cổng.', 'Cổng HDMI. Cổng quang Optical', 'Tay Cầm', 7800000, 'PS4 Pro 1TB-image-1655186999-878.jpg', 0, '2022-06-13 23:09:59', '2022-07-01 01:40:53'),
(11, 'The Last of Us Remastered', 4, 6, '2022-06-02', 1, 24, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 2300000, 'The Last of Us Remastered-image-1655187498-169.jpg', 0, '2022-06-13 23:18:18', '2022-06-13 23:18:18'),
(12, 'Cáp xuất hình cho PS5 Ugreen Cable 3M 80602', 1, 10, '2022-06-13', 1, 13, 'Không có', 'Không có', 'Không có', 'Không có', 'Hỗ trợ độ phân giải: 8K/60Hz, 8K/50Hz, 4K/120Hz, 4K/100Hz\r\nTương thích ngược: Có (với HDMI v2.0a, v2.0, v1.4, v1.3, v1.2, v1.1)\r\nTốc độ truyền tải băng thông: 48Gbps\r\nHỗ trợ: eARC, HEC, CEC, HDCP 2.2', 'Không', 'HDMI 2.1 Ultra HD 8K@60Hz', 'Không có', 'Không có thiết bị', 580000, 'Cáp xuất hình cho PS5 Ugreen HDMI 2.1 Ultra HD 8K@60Hz, 4K@120Hz Cable 3M 80602-image-1655220396-135.jpg', 0, '2022-06-14 08:26:36', '2022-06-14 08:26:36'),
(14, 'Sniper Elite 5 - EU', 6, 7, '2022-06-09', 1, 12, 'Không có', 'Không có', 'Không có', 'Không có', 'Thể loại	Shooter\r\nHệ máy	PS5, PS4, Xbox\r\nESRB	Mature 17+\r\nBlood and Gore, Intense Violence, Language', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1300000, 'Sniper Elite 5 - EU-image-1655220971-526.jpg', 0, '2022-06-14 08:36:11', '2022-06-14 08:36:11'),
(15, 'Grand Theft Auto V - US', 7, 7, '2022-06-15', 0, 14, 'Không có', 'Không có', 'Không có', 'Không có', 'Thể loại	Action Adventure\r\nHệ máy	PS5, Xbox\r\nESRB	Mature 17+\r\nBlood and Gore, Intense Violence, Mature Humor, Nudity, Strong Language, Strong Sexual Content, Use of Drugs and Alcohol', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1680000, 'Grand Theft Auto V - US-image-1655221105-597.jpg', 0, '2022-06-14 08:38:25', '2022-06-14 08:38:25'),
(18, 'Pokémon Brilliant Diamond - AUS', 3, 11, '2022-06-13', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Thể loại	RPG\r\nHệ máy	Nintendo Switch\r\nESRB	Rating Pending', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1300000, 'Pokémon Brilliant Diamond - AUS-image-1655222189-551.jpg', 0, '2022-06-14 08:56:29', '2022-06-14 08:56:29'),
(20, 'Thẻ Playstation Plus Membership 12 Tháng Hệ US', 1, 12, '2022-06-07', 1, 11, 'Không có', 'Không có', 'Không có', 'Không có', 'Dùng cho tài khoản\r\nUnited States', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1580000, 'Thẻ Playstation Plus Membership 12 Tháng Hệ US-image-1655228267-690.jpg', 0, '2022-06-14 10:37:47', '2022-06-14 10:37:47'),
(21, 'Thẻ Xbox Gift Card 10$', 2, 12, '2022-06-07', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 240000, 'Thẻ Xbox Gift Card 10$-image-1655228398-240.png', 0, '2022-06-14 10:39:58', '2022-06-14 10:39:58'),
(22, 'Thẻ Playstation Plus Membership 12 Tháng Hệ Asia', 1, 8, '2022-06-08', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 980000, 'Thẻ Playstation Plus Membership 12 Tháng Hệ Asia-image-1655228460-579.jpg', 0, '2022-06-14 10:41:00', '2022-06-14 10:41:00'),
(23, 'Thẻ Psn 100,000 Rp Indonesia', 1, 8, '2022-06-07', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 210000, 'Thẻ Psn 100,000 Rp Indonesia-image-1655228510-120.jpg', 0, '2022-06-14 10:41:50', '2022-06-14 10:41:50'),
(24, 'Thẻ Psn 50GBP Hệ UK', 1, 13, '2022-06-15', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1600000, 'Thẻ Psn 50GBP Hệ UK-image-1655228584-223.jpg', 0, '2022-06-14 10:43:04', '2022-06-14 10:43:04'),
(25, 'DOBE Nintendo Switch Joy-Con & Pro Controller Charging Stand', 3, 4, '2022-06-15', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Tương thích cho Nintendo Switch Joy-Con và Switch Pro Controller', 'Không', 'Cổng USB-C to USB-A.', 'Không có', 'Tay Cầm,Doc sạc', 480000, 'DOBE Nintendo Switch Joy-Con & Pro Controller Charging Stand-image-1655228821-985.jpg', 0, '2022-06-14 10:47:01', '2022-06-28 01:41:37'),
(26, 'GripCase Set for Nintendo Switch - Neon Red & Blue', 3, 14, '2022-06-13', 1, 15, 'Không có', 'Không có', 'Không có', 'Không có', 'SnapGrip là bộ cơ bản phù hợp người chơi với hầu hết các trò chơi trên Switch.\r\nTriggerGrip cung cấp lực cầm mạnh hơn, được thiết kế cho những người chơi có bàn tay lớn hơn và thường xuyên chơi các game try-hard.\r\nPlusGrip được thiết kế cho những người chơi có bàn tay big size.', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1280000, 'GripCase Set for Nintendo Switch - Neon Red & Blue-image-1655228993-562.jpg', 0, '2022-06-14 10:49:53', '2022-06-14 10:49:53'),
(27, 'PlayStation VR Headset V2 Chính Hãng', 1, 15, '2022-06-15', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Hỗ trợ chơi game thực tế ảo', 'Có', 'Không có', 'Không có', 'Tay Cầm,Tai Nghe,Doc sạc', 98000000, 'PlayStation VR Headset V2 Chính Hãng-image-1655229310-215.jpg', 0, '2022-06-14 10:55:10', '2022-06-14 10:55:10'),
(28, 'DualSense - PS5 Wireless Game Controller', 1, 4, '2022-06-15', 1, 16, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Có', 'Không có', 'Không có', 'Tay Cầm,Doc sạc', 1980000, 'DualSense - PS5 Wireless Game Controller-image-1655230253-245.jpg', 0, '2022-06-14 11:10:53', '2022-07-14 01:07:53'),
(33, 'Fire Emblem Three Houses', 3, 11, '2022-06-10', 1, 40, 'Không có', 'Không có', 'Không có', 'Không có', 'Thể loại RPG\r\nHệ máy Nintendo Switch\r\nESRB Teen', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1300000, 'Fire Emblem Three Houses-image-1655277284.jpg', 0, '2022-06-15 00:14:44', '2022-06-15 00:14:44'),
(34, 'Pokémon: Let\'s Go, Pikachu! - EU', 3, 11, '2022-06-10', 1, 25, 'Không có', 'Không có', 'Không có', 'Không có', 'Thể loại Action Adventure\r\nHệ máy Nintendo Switch\r\nESRB Everyone\r\nMild Cartoon Violence', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 1300000, 'pokmon-lets-go-pikachu---eu-image-1655278298.png', 0, '2022-06-15 00:31:38', '2022-06-15 00:31:38'),
(37, 'PlayStation 5 / PS5 Standard Edition', 1, 17, '2022-07-19', 1, 35, 'Kiến trúc RDNA 2 của AMD, sức mạnh 10.3 TFLOPS, tốc độ 2.23GHz, hỗ trợ Ray-Tracing', 'AMD Zen 2 8 nhân 16 luồng, xung nhịp 3.5GHz', 'GDDR6 16GB', '825GB SSD tốc độ đạt 5,5 GB/s', 'Không có', 'Có', 'HDMI 2.1, 3 x USB-A, 1 x USB-C', 'HDMI 2.1 (4K@120Hz, 8K@60Hz)', 'Tay Cầm', 14210000, 'playstation-5--ps5-standard-edition-image-1658329566.jpg', 1, '2022-07-20 08:06:06', '2022-08-03 08:01:53'),
(38, 'PlayStation 5 / PS5 Standard Edition Horizon Forbidden West Bundle - Hàng VN', 1, 17, '2022-07-20', 1, 0, 'Kiến trúc RDNA 2 của AMD, sức mạnh 10.3 TFLOPS, tốc độ 2.23GHz, hỗ trợ Ray-Tracing', 'AMD Zen 2 8 nhân 16 luồng, xung nhịp 3.5GHz', 'GDDR6 16GB', '825GB SSD tốc độ đạt 5,5 GB/s', 'Hỗ trợ Ray-Tracing, hỗ trợ chơi game 8K 120Hz, âm thanh vòm 3D audio, tương thích ngược với game PS4', 'Có', 'HDMI 2.1, 3 x USB-A, 1 x USB-C', 'HDMI 2.1 (4K@120Hz, 8K@60Hz)', 'Tay Cầm', 18130000, 'playstation-5--ps5-standard-edition-horizon-forbidden-west-bundle---hng-vn-image-1658330081.jpg', 2, '2022-07-20 08:14:41', '2022-07-20 08:20:18'),
(39, 'DualSense Charging Station', 1, 10, '2022-07-20', 1, 20, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Có', 'Không có', 'Không có', 'Tay Cầm,Doc sạc', 1680000, 'dualsense-charging-station-image-1658330773.jpg', 2, '2022-07-20 08:26:13', '2022-07-20 08:26:13'),
(40, 'iPega 6 In 1 Desktop Charging Base Station For Nintendo Switch Joy-Con PG-9187A', 3, 14, '2022-07-20', 1, 14, 'Không có', 'Không có', 'Không có', 'Không có', 'Sản phẩm đế sạc đa năng IPega 6 In 1 Desktop Charging Base Station For Nintendo Switch Joy-Con PG-9187A là một phụ kiện vô cùng hữu ích cho những ai đang sử dụng Nintendo Switch và những phụ kiện đi kèm. Bộ sạc cung cấp đến 6 cổng sạc cho 6 thiết bị bao gồm: 4 Joy-Con (2 cặp), 2 Switch Pro Controller, Nintendo Switch tablet.\r\nThương hiệu: iPega\r\nMã sản phẩm: PG-9187A\r\nThể loại: Charging Base\r\nNguồn vào: DC5V/2A\r\nThời gian sạc cho Joy-Con: ~ 3 giờ\r\nThời gian sạc cho Pro Controller: ~ 4.5 giờ\r\nNguồn điện: DC4.8-5.5v\r\nNhiệt độ khi sạc: 0-40℃\r\nNhiệt độ khi không sạc: -20 - +60℃\r\nMàu sắc: Đen, trắng\r\nKích thước: ~ 243 x 58 x 57mm / 9.6 x 2.3 x 2.2in\r\nTrọng lượng: ~ 154g / 5.4oz\r\nKích thước đóng gói: ~ 27 x 6 x 5.4cm / 10.6 x 2.4 x 2.1in\r\nTrọng lượng đóng gói: ~ 182g / 6.4oz', 'Có', 'Không có', 'Không có', 'Doc sạc', 680000, 'ipega-6-in-1-desktop-charging-base-station-for-nintendo-switch-joy-con-pg-9187a-image-1658330890.jpg', 2, '2022-07-20 08:28:10', '2022-07-20 08:28:10'),
(41, 'PlayStation 5 / PS5 Digital Edition 2nd', 1, 9, '2022-07-19', 1, 2, 'Kiến trúc RDNA 2 của AMD, sức mạnh 10.3 TFLOPS, tốc độ 2.23GHz, hỗ trợ Ray-Tracing', '8-core AMD Zen 2 3.5 GHz', 'GDDR6 16GB', '825GB Custom SSD tốc độ đạt 5,5 GB/s', 'Hỗ trợ Ray-Tracing, hỗ trợ xuất hình ảnh game 4K 120Hz hoặc 8K 60Hz, âm thanh vòm 3D audio, tương thích ngược với game PS4', 'Không', 'HDMI 2.1, 3 x USB-A, 1 x USB-C', 'HDMI 2.1 (4K@120Hz, 8K@60Hz)', 'Tay Cầm,Doc sạc', 1000000, 'playstation-5--ps5-digital-edition-2nd-image-1658331073.jpg', 2, '2022-07-20 08:31:13', '2022-07-20 08:31:54'),
(42, 'Máy PS2 Slim', 1, 16, '2022-07-19', 1, 5, 'Không có', 'Không có', 'Không có', 'Không có', 'Gồm 100 game', 'Không', '1x HDMI 2.1 port, 3x USB 3.1 Gen 1 ports', 'HDMI 2.1 (4K@120Hz, 8K@60Hz)', 'Tay Cầm', 1532000, 'thng-hiu-oem-my-chi-game-in-t-tay-cm-gamer-kt-ni-tivi-a-cng-hdmi-v-av-800-game-h-tr-th-nh-lu-game-image-1658331289.jpg', 2, '2022-07-20 08:34:49', '2022-07-20 08:35:20'),
(43, 'PlayStation 4 Slim 500GB FW 9.00 USED', 1, 18, '2022-07-20', 1, 30, '1.84 TFLOPS, đồ họa nền tảng AMD Radeon', 'x86-64 AMD \"Jaguar\", 8 nhân', 'GDDR5 8GB', '500GB', 'Cáp mạng Ethernet (10BASE-T, 100BASE-TX, 1000BASE-T)x1 Wi-Fi IEEE 802.11 a/b/g/n/ac, Bluetooth®v4.0', 'Không', 'Cổng USB tốc độ cao (USB 3.1 thế hệ 1) x 2, Cổng AUX x 1', 'HDMI out port (hỗ trợ 4K/HDR)', 'Tay Cầm,Doc sạc', 6272000, 'playstation-4-slim-500gb-fw-900-used-image-1658331565.jpg', 2, '2022-07-20 08:39:25', '2022-07-20 08:39:57'),
(44, 'Hori Tactical Assault Commander Pro M2', 9, 15, '2022-07-20', 1, 10, 'Không có', 'Không có', 'Không có', 'Không có', 'Bộ bàn phím và chuột game Hori Tactical Assault Commander Pro M2 là bộ phụ kiện hỗ trợ tuyệt vời dành cho anh em game thủ PS4, PS3 và PC trải nghiệm các tựa game FPS tốt hơn, cạnh tranh công bằng với các game thủ PC nếu bạn đang chơi trên console.\r\n\r\nBàn phím được thiết kế custom, bao gồm 20 phím cơ mặc định cho các phím chức năng, phù hợp để chơi mọi loại game, nhất là các tựa game FPS. Mỗi phím được trang bị đèn nền đỏ, thích hợp khi chơi trong đêm, bạn có thể định vị chính xác vị trí từng phím. Bên phải bàn phím còn trang bị nút share, nút PS và bàn rê phía trên cho trải nghiệm hệt như khi sử dụng tay cầm Dualshock 4. Bên cạnh đó, bàn phím vẫn giữ lại cần di chuyển analog như trên tay cầm, được đặt ở vị trí thoải mái.\r\n\r\nHori Tactical Assault Commander Pro M2\r\nPhần kê tay cũng là một bộ phận quan trọng, giúp game thủ thoải mái khi chơi game trong thời gian dài, tạo nên trải nghiệm tốt nhất có thể.\r\n\r\nChuột quang đi kèm là loại cao cấp hỗ trợ DPI lên đến 3200, độ trễ cực thấp, giúp phản hồi cực nhanh, điều vô cùng quan trọng trong các tựa game FPS. Các phím chức năng đi kèm cho phép bạn tự do tùy chỉnh. Dây cáp của chuột hơi chếch lên để không gây vướng víu trong khi đang chơi game cũng là một điểm đáng lưu ý.\r\n\r\nVới Hori Tactical Assault Commander Pro M2 bạn sẽ thống trị các chiến trường khốc liệt trong game bằng sự chính xác tuyệt đối khi sử dụng chuột quang và bàn phím mechanical để ngắm và di chuyển.\r\n\r\nPhiên bản mới cũng cung cấp cho bạn ứng dụng trên mobile để tùy chỉnh công năng của từng phím cho phù hợp với thói quen sử dụng của game thủ. Để tải app, bạn tìm kiếm từ khóa \"HORI Device Manager\" trên kho ứng dụng.\r\n\r\nSản phẩm tương thích với các đời PS4, PS3, PC.', 'Có', 'Bluetooth', 'Không có', 'Không có thiết bị', 5880000, 'hori-tactical-assault-commander-pro-m2-image-1658331742.jpg', 2, '2022-07-20 08:42:22', '2022-07-20 08:42:22'),
(45, 'DOBE Taiko Drum for PS4', 9, 15, '2022-07-20', 1, 13, 'Không có', 'Không có', 'Không có', 'Không có', 'Bộ phụ kiện trống DOBE Taiko Drum for PS4 bao gồm một chiếc trống tích hợp cảm ứng lực và bộ nút điều khiển cùng 2 cây dùi để gõ đem lại trải nghiệm tựa game Taiko no Tatsujin chân thực hơn.Bộ điều khiển kết nối trực tiếp với trống giúp bạn thao tác trong game dễ dàng hơn, thiết lập các cài đặt, tùy chỉnh cho game trước khi bước vào trải nghiệm trống. Chiếc trống có lỗ trống bên hông để đựng 2 chiếc dùi khi không sử dụng ở lỗ trống phía sau. Chiếc trống HORI Taiko no Tatsujin Drum Controller có thể kết nối với PS4 ở chế độ tablet hoặc chế độ dock xuất hình ảnh lên TV.', 'Có', 'Không có', 'Không có', 'Không có thiết bị', 880000, 'dobe-taiko-drum-for-ps4-image-1658331912.jpg', 2, '2022-07-20 08:45:12', '2022-07-20 08:45:12'),
(46, 'Skin DualShock 4 - 00297', 1, 4, '2022-07-20', 1, 35, 'Không có', 'Không có', 'Không có', 'Không có', 'Cũng như máy game PS4 thì tay cầm DualShock 4 rất dễ bám bụi bẩn, đặc biệt là đối với các anh em chơi game với tần suất cao thì khó tránh khỏi việc mồ hôi tay bị bám lên tay cầm và dây bẩn ra. Để bảo vệ tay cầm tránh trầy xước hay bị dơ bạn có thể dán skin cho cả tay cầm và máy game PS4 tại HALO.\r\n\r\nViệc dán skin sẽ giúp tay cầm DualShock 4 của bạn đẹp hơn, tính thẩm mỹ cũng được tăng hơn rất nhiều.\r\nBày tỏ cá tính của bạn về tựa game yêu thích. Có thể thay đổi hình dán khác nhau rất dễ dàng mà không sợ hỏng tay cầm.\r\nGiảm được mức độ trầy xước hay va đập của tay cầm.', 'Có', 'Cổng USB tốc độ cao (USB 3.1 thế hệ 1) x 2, Cổng AUX x 1', 'Không có', 'Tay Cầm', 150000, 'skin-dualshock-4---00297-image-1658332106.jpg', 2, '2022-07-20 08:48:26', '2022-07-20 08:48:26'),
(47, 'Darksiders III - Secondhand', 10, 5, '2022-07-20', 1, 1, 'Không có', 'Không có', 'Không có', 'Không có', 'Không có', 'Không', 'Không có', 'Không có', 'Không có thiết bị', 600000, 'darksiders-iii---secondhand-image-1658332288.jpg', 2, '2022-07-20 08:51:28', '2022-08-03 07:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isBan` tinyint(4) NOT NULL DEFAULT 0,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `address`, `phone`, `password`, `isBan`, `note`, `admin_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đặng Kiến Phong', 'dangkienphong555@gmail.com', NULL, '714/34 Nguyễn Trãi Phường 11 Quận 5', '0924241299', '$2y$10$D7p6G7hp67JIWuXaqJUJMeAPl.O4YUoLhkINJMPn5cY62CwYiQQHm', 0, 'khóa tài khoản 2022-06-28 05:56:17: Mở khóa tài khoản lần thứ nhất.  2022-06-28 06:01:45 : Khóa tài khoản để test login. 2022-06-28 06:08:30 : Mở khóa để login. 2022-06-28 07:52:12 : Khóa tài khoản thử. 2022-06-28 07:53:17 : mở khóa lại.', 0, NULL, '2022-06-13 22:12:47', '2022-06-28 00:53:17'),
(2, 'Phạm Tiến Long', 'phamtienlong135@gmail.com', NULL, '231 Lê Quang Sung, phường 6, quận 6, TP. Hồ Chí Minh', '0795541901', '$2y$10$MR803YH2lvspUpzTG58uCuhsI9d9r0rS./I.Xuv.EHom1SnsEUdVC', 0, ' 2022-06-28 05:57:10: Khóa tài khoản lần thứ nhất.  2022-06-28 06:00:12 : Mở khóa tài khoản lần thứ nhất. ', 0, NULL, '2022-06-14 06:13:00', '2022-06-27 23:00:12'),
(3, 'Dummy', 'dummytest@gmail.com', NULL, '123 Lý Thường Kiệt Quận 5 Phường 11', '0934625358', '$2y$10$ZwqgV3pLGAQX5/.dI1Yr2.tEtKCj9YLmMzdtYxJSUnKvXfjAAR66a', 1, '2022-07-20 10:57:06: Các ghi chú cũ đã được xóa bởi Đặng Kiến Phong. 2022-07-20 10:57:32 : Tài khoản đã bị mở khóa bởi Đặng Kiến Phong vì Test việc mở khóa. 2022-07-20 10:59:38 : Tài khoản đã bị khóa bởi Đặng Kiến Phong vì test việc khóa tài khoản.', 1, NULL, '2022-06-28 00:57:33', '2022-07-20 03:59:38'),
(4, 'Dummy 2', 'dubacachi@gmail.com', NULL, '4568 ngày thứ 2', '0937210208', '$2y$10$s3pFCh4mrOAMkXlaFFjeJeEXbXexSWnWC/Aq1PpFrNFzvufn5Dn4S', 1, ' 2022-08-03 15:16:05 : Tài khoản đã bị khóa bởi Đặng Kiến Phong vì Test chức năng khóa tài khoản.', 1, NULL, '2022-07-20 04:00:45', '2022-08-03 08:16:05'),
(5, 'long1355', 'nordic@gmail.com', NULL, 'Bình Chánh', '09872452', '$2y$10$Z0WVZW4EoMTVSSnYhVGO/u3qWbzDWzVQqWPRggRgevemRhjoDvJg6', 0, '', 0, NULL, '2022-07-20 17:15:36', '2022-07-20 17:15:36');

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
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nha_cung_caps`
--
ALTER TABLE `nha_cung_caps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nha_cung_caps`
--
ALTER TABLE `nha_cung_caps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
