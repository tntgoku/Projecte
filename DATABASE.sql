-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2024 lúc 04:28 PM
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
  `id_sp` int(10) NOT NULL,
  `count` int(10) NOT NULL,
  `Total` varchar(10) NOT NULL,
  `id_Bill` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_us`, `id_sp`, `count`, `Total`, `id_Bill`, `address`, `note`, `date`, `status`) VALUES
(1, 1, 1, '135.000', 1, 'vp', 'fgsdf', '2024-06-01', 1),
(1, 17, 1, '135.000', 2, 'vp', 'sdfgs', '2024-06-13', 1),
(2, 3, 1, '135.000', 3, 'Vp', 'ádfgsdf', '2024-06-27', 0);

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
(2, 2, 2),
(2, 1, 1),
(3, 1, 3),
(1, 2, 2),
(1, 3, 3),
(1, 1, 1);

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
  `Cost` varchar(255) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Discount` int(2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `Name`, `Type_id`, `Color`, `Size`, `Cost`, `Amount`, `Discount`, `img`) VALUES
(1, 'Áo thun tay ngắn in hình con vịt ', 1, 'Đen', 'L', '185.000', 10, 45, 'a5.png'),
(2, 'Áo ba lỗ in hình bóng rổ', 2, 'Đen', 'M', '150.000', 20, 45, 'a2.jpg'),
(3, 'Baby tee xámmm', 1, 'Xám', 'XL', '150.000', 10, 45, 'n1.jpg'),
(15, 'BabyTee màu hồng', 2, 'Hồng', 'L', '135.000', 12, 45, 'bbt1.jpg'),
(16, 'Áo ba lỗ bóng rổ màu xanh dương', 1, 'Xanh dương', 'L', '130.000', 10, 25, 'bl1.jpg'),
(17, 'BabyTee màu đen', 1, 'Đen', 'S', '135.000', 10, 25, 'bbt2.webp');

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
  `Address` varchar(255) NOT NULL,
  `Phone_Num` varchar(20) NOT NULL,
  `Login_name` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `Name`, `Address`, `Phone_Num`, `Login_name`, `pass`) VALUES
(1, 'Đỗ Kiên', 'Vĩnh Phúc', '0123456789', 'Kiez', '1'),
(2, 'Thu Trang', 'Hà Nội', '0123456789', 'Trang', '1'),
(3, 'Phương Anh', 'Hà Nội', '0123456789', 'P.Anh', '1'),
(4, 'Văn Huân', 'Hà Nội', '0123456789', 'Huân', '1'),
(5, 'Đức Tú', 'Hà Nội', '0123456789', 'Tú', '1'),
(6, 'Trung Hiếu', 'Lào Cai', '0123456789', 'Hiếu', '1');

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
  MODIFY `id_Bill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
