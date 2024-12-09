-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2024 lúc 03:38 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khamphadisan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel_table`
--

CREATE TABLE `hotel_table` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotel_table`
--

INSERT INTO `hotel_table` (`id`, `name`, `title`, `price`) VALUES
(1, 'Nguyễn Hồ Homestay - Đà Lạt', 'Khach San So 1 Viet Nam', 150000),
(2, 'Khách Sạn Hoàng Phúc', 'Khach San So 2 Viet Nam', 230000),
(3, 'Khách Sạn Đông Hồ', 'Khach San So 3 Viet Nam', 200000),
(4, 'Khách Sạn Trường Giang Huế', 'Khach san so 5 Viet Nam', 606000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_table`
--

CREATE TABLE `payment_table` (
  `id` int(11) NOT NULL,
  `totalBill` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booking_hotel_id` int(11) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `address` text NOT NULL,
  `select_payment` varchar(30) DEFAULT NULL,
  `phoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_table`
--

INSERT INTO `payment_table` (`id`, `totalBill`, `user_id`, `booking_hotel_id`, `gender`, `address`, `select_payment`, `phoneNumber`) VALUES
(25, 150000, 1, 1, 'nam', '232', 'tien mat', 322223232),
(27, 150000, 1, 1, 'nam', '23', 'tien mat', 2147483647),
(28, 606000, 5, 4, 'nam', '434', 'tien mat', 234),
(29, 200000, 5, 3, 'nam', '342', 'tien mat', 234);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `travel_table`
--

CREATE TABLE `travel_table` (
  `id` int(11) NOT NULL,
  `travel_name` varchar(256) DEFAULT NULL,
  `travel_title` text DEFAULT NULL,
  `travel_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agree_term` tinyint(1) NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_table`
--

INSERT INTO `user_table` (`id`, `userName`, `password`, `email`, `agree_term`, `newsletter`) VALUES
(1, 'admin1', '$2y$10$UDOaEIneaF3oli8NAN30nuLiSfvHdUJRYAbVLAdAgiPLkVG3tqO5u', 'admin1@1', 1, 0),
(5, 'admin2', '$2y$10$8gKj/3F6bTeepO978iZLjOWePK3Yi6XbsM3tVFuTaRAF3RPjk.l/K', 'admin2@2', 1, 0),
(9, 'deptrai', '123', 'deptrai@mail.com', 0, 0),
(10, 'khanhdzok334', '$2y$10$xCUPi8sxe6TuiP1Jbj/j6.D/d63bfnobo0HfLedze.3yTsAvhDhzK', 'admin3@mail.com', 0, 0),
(11, 'admin4', '$2y$10$1PCuPGO6Hh0VVjk9gw2/S.sKSQrGNZrdHYeNZVsxlu.1vQzZrHlUi', 'admin4@4.com', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hotel_table`
--
ALTER TABLE `hotel_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_hotel_id` (`booking_hotel_id`);

--
-- Chỉ mục cho bảng `travel_table`
--
ALTER TABLE `travel_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hotel_table`
--
ALTER TABLE `hotel_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `travel_table`
--
ALTER TABLE `travel_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `payment_table`
--
ALTER TABLE `payment_table`
  ADD CONSTRAINT `fk_hotel_id` FOREIGN KEY (`booking_hotel_id`) REFERENCES `hotel_table` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
