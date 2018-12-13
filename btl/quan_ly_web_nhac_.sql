-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2018 lúc 05:24 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_web_nhac_`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `song` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `singer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `musician` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `style` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `new` int(1) NOT NULL,
  `best` int(1) NOT NULL,
  `topten` int(2) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mp3` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mylist`
--

CREATE TABLE `mylist` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `email`, `username`, `password`, `level`) VALUES
(1, 'cau', 'vang', 'cauvang@gmail.com', 'cauvang', '123456', 0),
(2, 'ad', 'ad', 'admin@gmail.com', 'admin', '123456', 1),
(3, 'xin ', 'chao', 'xinchao@gmail.com', 'xinchao', '123456', 0),
(4, 'toi', 'la', 'haiau@gmail.com', 'haiau', '123456', 0),
(5, 'kiem', 'thanh', 'kiemthanh@gmail.com', 'kiemthanh', '123456', 0),
(6, 'kiem', 'than', 'kiemthan@gmail.com', 'kiemthan', '123456', 0),
(7, 'than', 'kiem', 'thankiem@gmail.com', 'thankiem', '123456', 0),
(8, 'chao', 'chao', 'chaochao@gmail.com', 'chaochao', '123456', 0),
(9, 'g', 'd', 'gdnhell@gmail.com', 'gdnhell', '123456', 0),
(10, 'so', '1', 'so1@gmail.com', 'so1', '123456', 0),
(11, 'so', '2', 'so2@gmail.com', 'so2', '123456', 0),
(12, 'kiem', 'quy', 'quykiem@gmail.com', 'quykiem', 'e10adc3949ba59abbe56e057f20f88', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mylist`
--
ALTER TABLE `mylist`
  ADD KEY `fk_music` (`id`),
  ADD KEY `fk_users` (`userid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `mylist`
--
ALTER TABLE `mylist`
  ADD CONSTRAINT `fk_music` FOREIGN KEY (`id`) REFERENCES `music` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
