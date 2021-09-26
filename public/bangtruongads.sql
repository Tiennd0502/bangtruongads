-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2021 lúc 02:10 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bangtruongads`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2021_09_11_055704_create_offices_table', 1),
(2, '2021_09_11_060543_create_positions_table', 2),
(3, '2014_10_12_000000_create_users_table', 3),
(4, '2014_10_12_100000_create_password_resets_table', 3),
(5, '2019_08_19_000000_create_failed_jobs_table', 3),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(7, '2021_09_26_041618_add_network_operator_to_users_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `offices`
--

INSERT INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Văn phòng 2', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(2, 'Văn phòng 3', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(3, 'Văn phòng VietCall', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(4, 'Văn phòng VietCall 2', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(5, 'Văn phòng Tân Thành', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(6, 'Văn phòng TPCN Bằng Trường', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(7, 'Văn phòng Kỳ Anh', '2021-07-15 02:32:19', '2021-07-15 02:32:19');

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
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Giám đốc', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(2, 'Quản lý nhân viên', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(3, 'Nhân viên Telesale', '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(4, 'Nhân viên CSKH', '2021-07-15 02:32:19', '2021-07-15 02:32:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `network_operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viettel',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `fullname`, `phone`, `network_operator`, `address`, `email_verified_at`, `remember_token`, `office_id`, `position_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'nguyenvana@gmail.com', '$2y$10$AF007PfuQ0./kZz0GFYX..RDQXfSWxu4g2RXY6zvAImtOH/Aw3Yae', 'avatar.jpg', 'Nguyễn Văn A', '0979003232', 'viettel', 'Thanh Vinh , Đà Nẵng', NULL, NULL, 1, 1, 1, '2021-07-15 02:32:19', '2021-07-15 02:32:19'),
(2, 'admin1', 'nguyenvana1@gmail.com', '$2y$10$AF007PfuQ0./kZz0GFYX..RDQXfSWxu4g2RXY6zvAImtOH/Aw3Yae', 'avatar.jpg', 'Nguyễn Văn A', '0979000043', 'viettel', 'Thanh Vinh , Đà Nẵng', NULL, NULL, 1, 1, 1, '2021-07-15 02:32:19', '2021-09-25 22:47:17'),
(3, 'nv_telesale', 'gtranthi@gmail.com', '$2y$10$iP3bMYas.H579fUFKckksuYeQ3u0pcBhIgVfvd9HoRjGj.HOBsdLG', '/avatar-1.jpg', 'Trần Thị G', '0979999999', 'viettel', '12 Âu Cơ', NULL, NULL, 1, 3, 1, '2021-09-24 15:24:55', '2021-09-25 22:50:41'),
(4, 'nv_cskh01', 'loanvt2307@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999155', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 4, 4, 1, '2021-09-24 15:29:41', '2021-09-25 22:42:37'),
(5, 'nv_cskh02', 'nv_cskh02@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999199', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 6, 4, 1, '2021-09-24 15:29:41', '2021-09-25 22:49:00'),
(6, 'nv_cskh03', 'nv_cskh03@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999203', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 6, 4, 1, '2021-09-24 15:29:41', '2021-09-25 22:48:07'),
(7, 'nv_cskh04', 'nv_cskh04@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999204', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 6, 4, 1, '2021-09-24 15:29:41', '2021-09-24 15:29:41'),
(8, 'nv_cskh05', 'nv_cskh05@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999205', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 6, 4, 1, '2021-09-24 15:29:41', '2021-09-24 15:29:41'),
(9, 'nv_cskh06', 'nv_cskh06@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999206', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 6, 4, 1, '2021-09-24 15:29:41', '2021-09-24 15:29:41'),
(10, 'nv_cskh08', 'nv_cskh08@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999208', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 6, 4, 1, '2021-09-24 15:29:41', '2021-09-24 15:29:41'),
(11, 'nv_telesale01', 'nv_telesale01@gmail.com', '$2y$10$Q2STA4nl4ELUDpvks6hpfetkTYeLd0LMcUfYs5hbhPvTwnHYVlojy', '/1Reno4-Pro-Whi-1.jpg', 'Trần Anh Tuấn', '0979999333', 'viettel', 'Số 786 Nại Hiên', NULL, NULL, 5, 3, 1, '2021-09-24 15:29:41', '2021-09-24 15:29:41');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offices_name_unique` (`name`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_office_id_foreign` (`office_id`),
  ADD KEY `users_position_id_foreign` (`position_id`),
  ADD KEY `users_active_index` (`active`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
