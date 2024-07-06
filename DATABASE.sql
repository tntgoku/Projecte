-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 06, 2024 lúc 10:15 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_web_ban_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_us` int(10) NOT NULL,
  `id_Bill` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `count` int(10) NOT NULL,
  `Total` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_us`, `id_Bill`, `id_sp`, `count`, `Total`, `address`, `note`, `date`, `status`) VALUES
(1, 1, 1, 1, 135000, 'vp', 'fgsdf', '2024-05-14', 1),
(1, 2, 17, 1, 135000, 'vp', 'sdfgs', '2024-05-12', 1),
(2, 3, 3, 1, 135000, 'Vp', 'ádfgsdf', '2024-06-27', 0),
(6, 4, 15, 1, 555000, 'HANOI', '', '2024-06-28', 1),
(6, 5, 16, 1, 555000, 'HANOI', '', '2024-06-28', 1),
(6, 6, 2, 4, 740000, '', '', '2024-05-30', 0),
(6, 7, 2, 6, 111000, '', '', '2024-06-28', 0),
(6, 8, 2, 14, 1320000, 'Địa chỉ:951234                                        :---Đồng Nai-Đắk Lắk-Hà Nội-', '951234                                        ', '2024-07-03', 1),
(47, 9, 2, 12, 1360000, 'Địa chỉ:Doan van huan:---Đắk Nông-Đắk Lắk-Hải Phòng-', 'Doan van huan', '2024-07-03', 1),
(48, 10, 2, 1, 45000, 'Địa chỉ:1511151555444                                        :---Hà Nội-An Giang-Choose...-', '1511151555444                                        ', '2024-07-03', 0),
(49, 11, 2, 3, 1560000, 'Địa chỉ:9995566                                        :---Bắc Ninh-Đà Nẵng-Yên Bái-', '9995566                                        ', '2024-07-03', 0),
(2, 12, 2, 3, 500000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 0),
(2, 13, 2, 3, 500000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1),
(2, 14, 2, 3, 500000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1),
(2, 15, 2, 3, 500000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1),
(2, 16, 2, 2, 315000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1),
(2, 17, 2, 2, 315000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1),
(1, 18, 2, 0, 180000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1),
(1, 19, 2, 0, 180000, 'Địa chỉ:                                        :---An Giang-An Giang-Choose...-', '                                        ', '2024-07-07', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `id_billl` int(11) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_billl`, `id_sp`, `amount`, `cost`, `date`) VALUES
(1, 0, 6, 2, 5, '2024-07-31 15:30:56'),
(2, 0, 6, 2, 0, '0000-00-00 00:00:00'),
(3, 0, 6, 2, 9, '0000-00-00 00:00:00'),
(4, 8, 2, 8, 150000, '2024-07-03 15:56:58'),
(5, 8, 3, 6, 15000, '2024-07-03 15:56:58'),
(6, 9, 3, 4, 15000, '2024-07-03 16:01:29'),
(7, 9, 2, 6, 150000, '2024-07-03 16:01:29'),
(8, 9, 1, 2, 185000, '2024-07-03 16:01:29'),
(9, 1, 3, 4, 15000, '2024-07-03 18:03:21'),
(10, 1, 2, 6, 150000, '2024-07-03 18:03:21'),
(11, 1, 1, 2, 185000, '2024-07-03 18:03:21'),
(12, 1, 3, 4, 15000, '2024-07-03 18:21:01'),
(13, 1, 2, 6, 150000, '2024-07-03 18:21:01'),
(14, 1, 1, 2, 185000, '2024-07-03 18:21:01'),
(15, 10, 3, 1, 15000, '2024-07-03 19:01:28'),
(16, 11, 3, 2, 15000, '2024-07-03 19:02:40'),
(17, 11, 2, 1, 150000, '2024-07-03 19:02:40'),
(18, 12, 15, 1, 135000, '2024-07-07 00:30:46'),
(19, 12, 1, 1, 185000, '2024-07-07 00:30:46'),
(20, 12, 2, 1, 150000, '2024-07-07 00:30:46'),
(21, 13, 15, 1, 135000, '2024-07-07 00:30:53'),
(22, 13, 1, 1, 185000, '2024-07-07 00:30:53'),
(23, 13, 2, 1, 150000, '2024-07-07 00:30:53'),
(24, 14, 15, 1, 135000, '2024-07-07 00:30:54'),
(25, 14, 1, 1, 185000, '2024-07-07 00:30:54'),
(26, 14, 2, 1, 150000, '2024-07-07 00:30:54'),
(27, 15, 15, 1, 135000, '2024-07-07 00:31:06'),
(28, 15, 1, 1, 185000, '2024-07-07 00:31:06'),
(29, 15, 2, 1, 150000, '2024-07-07 00:31:06'),
(30, 16, 15, 1, 135000, '2024-07-07 00:40:42'),
(31, 16, 2, 1, 150000, '2024-07-07 00:40:42'),
(32, 17, 15, 1, 135000, '2024-07-07 00:41:00'),
(33, 17, 2, 1, 150000, '2024-07-07 00:41:00'),
(34, 18, 1, 1, 185000, '2024-07-07 02:47:22'),
(35, 18, 15, 1, 135000, '2024-07-07 02:47:22'),
(36, 18, 17, 1, 135000, '2024-07-07 02:47:22'),
(37, 18, 3, 1, 15000, '2024-07-07 02:47:22'),
(38, 18, 16, 1, 130000, '2024-07-07 02:47:22'),
(39, 18, 2, 1, 150000, '2024-07-07 02:47:22'),
(40, 19, 1, 1, 185000, '2024-07-07 02:47:23'),
(41, 19, 15, 1, 135000, '2024-07-07 02:47:23'),
(42, 19, 17, 1, 135000, '2024-07-07 02:47:23'),
(43, 19, 3, 1, 15000, '2024-07-07 02:47:23'),
(44, 19, 16, 1, 130000, '2024-07-07 02:47:23'),
(45, 19, 2, 1, 150000, '2024-07-07 02:47:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_us` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_us`, `id_sp`, `amount`) VALUES
(3, 1, 3),
(1, 1, 6),
(1, 15, 1),
(1, 17, 1),
(1, 3, 1),
(1, 16, 1),
(1, 2, 1),
(2, 1, 2),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_News` int(8) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type_id` int(10) NOT NULL,
  `Content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_News`, `Name`, `Type_id`, `Content`) VALUES
(1, 'Khuyến mãi Ngày 6/6/2024 ', 3, 'Ngày 6/6 ưu đãi giảm giá lên tới 45%%'),
(2, 'Áo thun in hình ba con thỏ trên mặt trăng', 3, 'Sản phẩm áo thun in hình 3 con thỏ ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_list`
--

CREATE TABLE `news_list` (
  `Type_id` int(10) NOT NULL,
  `Name_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `news_list`
--

INSERT INTO `news_list` (`Type_id`, `Name_type`) VALUES
(1, 'Khuyến Mãi'),
(2, 'Sản phẩm mới'),
(3, 'Sản phảm bán chạy'),
(5, 'Tri ân khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type_id` int(10) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Cost` int(255) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Discount` int(2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `Name`, `Type_id`, `Color`, `Size`, `Cost`, `Amount`, `Discount`, `img`) VALUES
(1, 'Áo thun tay ngắn in hình con vịt ', 1, 'Đen', 'L', 185000, 40, 45, 'a5.png'),
(2, 'Áo ba lỗ in hình bóng rổ', 2, 'Đen', 'M', 150000, 0, 45, 'a2.jpg'),
(3, 'Baby tee xámmm', 1, 'Xám', 'XL', 15000, -1, 45, 'n1.jpg'),
(15, 'BabyTee màu hồng', 2, 'Hồng', 'L', 135000, 4, 45, 'bbt1.jpg'),
(16, 'Áo ba lỗ bóng rổ màu xanh dương', 1, 'Xanh dương', 'L', 130000, 8, 25, 'bl1.jpg'),
(17, 'BabyTee màu đen', 1, 'Đen', 'S', 135000, 8, 25, 'n8.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_list`
--

CREATE TABLE `product_list` (
  `Type_id` int(10) NOT NULL,
  `Type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_list`
--

INSERT INTO `product_list` (`Type_id`, `Type_name`) VALUES
(1, 'Áo Thun'),
(2, 'Baby Tee'),
(3, 'Áo Polo'),
(4, 'Áo Sơ Mi'),
(5, 'Áo Khoác '),
(6, 'Hoddie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gt` int(1) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_Num` varchar(20) NOT NULL,
  `Login_name` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `passhash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `Name`, `Gt`, `Address`, `Phone_Num`, `Login_name`, `pass`, `role`, `passhash`) VALUES
(1, 'Đỗ Kiên', 1, 'Vĩnh Phúc', '012345678', 'Kiez', '123', 0, ''),
(2, 'Thu Trang', 0, 'Hà Nội', '0123456789', 'Trang', '1', 0, ''),
(3, 'Phương Anh', 0, 'Hà Nội', '0123456789', 'P.Anh', '1', 0, ''),
(4, 'Văn Huân', 1, 'Hà Nội', '0123456789', 'Huân', '1', 0, ''),
(5, 'Đức Tú', 1, 'Hà Nội', '0123456789', 'Tú', '1', 0, ''),
(6, 'Trung Hiếu', 1, 'Lào Cai', '0123456789', 'admin', '1', 1, ''),
(47, 'Doan van huan', 1, 'Địa chỉ:Doan van huan:---Đắk Nông-Đắk Lắk-Hải Phòng-', '0987654321', '', '', 0, ''),
(48, 'Anh ne', 0, 'Địa chỉ:1511151555444                                        :---Hà Nội-An Giang-Choose...-', '096950255599', '', '', 0, ''),
(49, 'Huandayne', 1, 'Địa chỉ:9995566                                        :---Bắc Ninh-Đà Nẵng-Yên Bái-', '95123', '', '', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_Bill`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_us` (`id_us`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_us` (`id_us`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_News`),
  ADD KEY `Type_id` (`Type_id`);

--
-- Chỉ mục cho bảng `news_list`
--
ALTER TABLE `news_list`
  ADD PRIMARY KEY (`Type_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `Type_id` (`Type_id`);

--
-- Chỉ mục cho bảng `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`Type_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_Bill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_News` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `news_list`
--
ALTER TABLE `news_list`
  MODIFY `Type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_list`
--
ALTER TABLE `product_list`
  MODIFY `Type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`id_us`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `news_list` (`Type_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `product_list` (`Type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
