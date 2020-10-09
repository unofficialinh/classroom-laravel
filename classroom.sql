-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 09, 2020 lúc 01:56 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `classroom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(50) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deadline` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hint` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `challenges`
--

INSERT INTO `challenges` (`id`, `name`, `deadline`, `hint`) VALUES
(5, 'Challenge 1', 'None', 'Làng Vũ Đại'),
(6, 'Challenge 2', 'Sat, Oct 31, 2020 6:00 PM', 'Tác phẩm nổi tiếng của Xuân Quỳnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint(50) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deadline` text DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filepath` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `deadline`, `description`, `filepath`) VALUES
(3, 'Ex1', 'Sat, Oct 10, 2020 10:30 PM', 'The first exercise', 'storage/exercises/3_S1.pdf'),
(4, 'Ex2', 'None', 'Test 2', 'storage/exercises/4_S2.pdf'),
(5, 'Ex3', 'Sat, Oct 31, 2020 9:29 AM', 'Test3', 'storage/exercises/5_lect1[0]_GioiThieu.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `send_id` bigint(50) NOT NULL,
  `receive_id` bigint(50) NOT NULL,
  `send_time` datetime NOT NULL,
  `send_time_string` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `message`, `send_id`, `receive_id`, `send_time`, `send_time_string`) VALUES
(3, 'xin chao', 1, 4, '2020-10-05 22:13:55', 'Mon, Oct 5, 2020 10:13 PM'),
(5, 'xin chao', 4, 1, '2020-10-05 22:23:14', 'Mon, Oct 5, 2020 10:23 PM'),
(7, 'hello', 1, 4, '2020-10-09 09:22:35', 'Fri, Oct 9, 2020 9:22 AM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2020_10_01_035235_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('X7v4d0VUe5hJAgG19BKKrJqHWjMJSn82UES0FHAo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NoYWxsZW5nZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiSHF5a1VVYVlwTlQyWWI3UlZiaHcxNmIzbXpnbVFadmRpZUczSlZKbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NoYWxsZW5nZXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSWRXa1hjUXNzWjVMaWlEbkVwV2VwdThqZHhGZTZKQnExbFdkTHgyeWZmQU13emZDZEgzNnUiO30=', 1602210805),
('z6ff9k5kVTfOcmlICUlKqXQ488bmlDPMbkeCx9Eu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia3djZ1pLbjJHMmFHVWtoZ0JMODduSWhYT096bDV3V2s0R2RDNVRPOSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRJZFdrWGNRc3NaNUxpaURuRXBXZXB1OGpkeEZlNkpCcTFsV2RMeDJ5ZmZBTXd6ZkNkSDM2dSI7fQ==', 1602218736);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(50) NOT NULL,
  `user_id` bigint(50) NOT NULL,
  `exercise_id` bigint(50) NOT NULL,
  `submit_time` text NOT NULL,
  `filepath` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `submissions`
--

INSERT INTO `submissions` (`id`, `user_id`, `exercise_id`, `submit_time`, `filepath`) VALUES
(2, 4, 3, 'Wed, Oct 7, 2020 8:22 AM', 'storage/submissions/3/longnn_S1.pdf'),
(3, 4, 5, 'Fri, Oct 9, 2020 2:31 AM', 'storage/submissions/5/longnn_lab01.o'),
(4, 7, 3, 'Fri, Oct 9, 2020 2:32 AM', 'storage/submissions/3/chidl_lab01.o');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `role`) VALUES
(1, 'linhnt', '$2y$10$IdWkXcQssZ5LiiDnEpWepu8jdxFe6JBq1lWdLx2yffAMwzfCdH36u', 'Nguyen Thuy Linh', 'nguyenthuylinh3400@gmail.com', '0947619029', 'teacher'),
(4, 'longnn', '$2y$10$IdWkXcQssZ5LiiDnEpWepu8jdxFe6JBq1lWdLx2yffAMwzfCdH36u', 'Nguyen Nhat Long', 'nguyenhatlong@gmail.com', '113', 'student'),
(6, 'quynhnt', '$2y$10$Naym6dbBw.oZSnQkt32JaOFyrhuGmXQkIaQank.3Xv4/34JgpxNv2', 'Nguyen Thuy Quynh', NULL, '0947619029', 'student'),
(7, 'chidl', '$2y$10$Xe37K6SkS1.FhnNjIFIbIeqVMihBm9hMi.bO59SG.6Xbn/2gmfkbm', 'Duong Linh Chi', 'chilinhduong9@gmail.com', '123', 'student'),
(8, 'anhtp', '$2y$10$SAVkHTYyE0HtBgyFRwyYfuvzgUucuzUT91XAe1E.VXGvXSgJHFxAO', 'Pham Tran Anh', NULL, NULL, 'student'),
(12, 'nguyenthuylinh', '$2y$10$txDYVe0yQ9tVpHd/SVvP7um/b9EKpISxRj3SOA1TjiYXP/p9PIVKa', 'Nguyễn Thùy Linh', 'nguyenthuylinh3400@gmail.com', '0947619029', 'student');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
