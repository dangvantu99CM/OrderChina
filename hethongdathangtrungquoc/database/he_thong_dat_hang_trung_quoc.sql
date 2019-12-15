-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2019 lúc 11:54 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `he_thong_dat_hang_trung_quoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `ca_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `ca_arr_pr_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`ca_id`, `us_id`, `ca_arr_pr_id`, `updated_at`, `created_at`) VALUES
(1, 3, '[1,2]', '2019-09-25 14:34:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `economy`
--

CREATE TABLE `economy` (
  `eco_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eco_tien_nap` double NOT NULL,
  `eco_tien_coc` double NOT NULL,
  `eco_tien_tat_toan` double NOT NULL,
  `eco_tien_khieu_nai` double NOT NULL,
  `eco_tien_van_chuyen` double NOT NULL,
  `eco_tien_hoan_tra` double NOT NULL,
  `eco_cong_no` double NOT NULL,
  `or_id` int(11) DEFAULT NULL,
  `eco_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `economy`
--

INSERT INTO `economy` (`eco_id`, `created_at`, `updated_at`, `eco_tien_nap`, `eco_tien_coc`, `eco_tien_tat_toan`, `eco_tien_khieu_nai`, `eco_tien_van_chuyen`, `eco_tien_hoan_tra`, `eco_cong_no`, `or_id`, `eco_status`) VALUES
(1, '2019-09-28 17:36:38', '0000-00-00 00:00:00', 31231321, 233213, 12123, 2312321, 32332, 3123123, 3213123, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `or_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `or_id_user` int(11) NOT NULL,
  `or_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `or_status` int(1) DEFAULT NULL,
  `or_arr_id_products` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `or_sum_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`or_id`, `or_code`, `updated_at`, `created_at`, `or_id_user`, `or_note`, `or_status`, `or_arr_id_products`, `or_sum_price`) VALUES
(2, '2121', '2019-09-27 09:28:17', '0000-00-00 00:00:00', 3, NULL, 101, '[1,2,3]', NULL),
(3, '3', '2019-09-30 07:22:55', '0000-00-00 00:00:00', 2, '11111111', 1, '[1,2,3,4]', 312321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `us_avartar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_type` int(1) DEFAULT NULL,
  `us_phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_xaPhuong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_quan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_gender` int(1) DEFAULT NULL,
  `us_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_birthDay` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `us_avartar`, `us_type`, `us_phone_number`, `us_xaPhuong`, `us_city`, `us_quan`, `us_gender`, `us_code`, `us_birthDay`) VALUES
(3, 'admin', 'vantund2017@gmail.com', NULL, '$2y$10$luGWz4dKx9NgOGFfwKjRyeEgPW9hDwjsQ7txCLsvnPQy1..AFudpq', NULL, '2019-09-19 19:00:05', '2019-09-21 18:00:53', '/uploads/Users/20190921041133.png', NULL, '3123231', NULL, NULL, NULL, NULL, 'sa', NULL),
(7, 'admin', 'admin@gmail.com', NULL, '$2y$10$1R1P3DgxqlfFybuEMz1H4euUPu08xpv.qmeT6rzpGrW6nI7xOSO9u', NULL, '2019-09-20 06:21:19', '2019-09-21 18:07:52', '/uploads/Users/20190922010752.png', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ca_id`);

--
-- Chỉ mục cho bảng `economy`
--
ALTER TABLE `economy`
  ADD PRIMARY KEY (`eco_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `or_code` (`or_code`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `economy`
--
ALTER TABLE `economy`
  MODIFY `eco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
