-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2020 lúc 03:40 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthethao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`) VALUES
(1, 'Nguyen Minh Hai', 'nguyenminhhai1903@gmail.com', 'hai', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Adidas'),
(20, 'HÃNG BN'),
(11, 'HÃNG FAIRTEX'),
(13, 'HÃNG JDUANL'),
(8, 'HÃNG JIANJIANG'),
(17, 'HÃNG KINGDOM'),
(4, 'HÃNG KWON'),
(15, 'HÃNG LIVEUP'),
(18, 'HÃNG LP SUPPORT'),
(16, 'HÃNG MAGICODE'),
(3, 'HÃNG MOOTO'),
(14, 'HÃNG PRETORIAN'),
(19, 'HÃNG SHEN YU'),
(6, 'HÃNG TBEST'),
(5, 'HÃNG UFC'),
(10, 'HÃNG WESING'),
(9, 'HÃNG WOLON'),
(12, 'HÃNG WTF'),
(7, 'HÃNG YING SHENG'),
(2, 'Nike');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `giale` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `giale`, `quantity`, `image`) VALUES
(71, 18, 'u3klm51a2bk17ltuooosrvkqrr', 'BAO CÁT ĐỨNG LẬT ĐẬT BƠM HƠI EVERLAST', '900', 1, '6794749d4e.jpg'),
(72, 17, '27gaj2crlidaa8n4qv0eebkc80', 'BAO CÁT QUẢ LÊ TBEST – TEARDROP BAG', '1', 1, '26337157a5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(22, 'BĂNG QUẤN TAY'),
(21, 'BĂNG THUN BẢO HỘ'),
(6, 'BAO CÁT TẬP VÕ'),
(20, 'BẢO HỘ RĂNG'),
(7, 'BÌNH XỊT LẠNH'),
(23, 'BÓNG TẬP LUYỆN'),
(19, 'CHÂN VỊT BƠI LỘI'),
(8, 'DÂY NHẢY'),
(5, 'DỤNG CỤ BƠI LẶN'),
(2, 'DỤNG CỤ TẬP GYM'),
(1, 'DỤNG CỤ TẬP VÕ'),
(3, 'DỤNG CỤ THI ĐẤU'),
(24, 'GĂNG TAY BOXING'),
(9, 'GĂNG TAY MMA'),
(10, 'GIÁP THI ĐẤU'),
(25, 'GIÀY TẬP VÕ'),
(16, 'NGƯỜI NỘM LẬT ĐẬT'),
(11, 'NÓN THI ĐẤU'),
(13, 'SẢN PHẨM THỂ THAO'),
(15, 'THẢM JUDO'),
(12, 'THẢM TẬP VÕ'),
(14, 'VÁN CÔNG PHÁ'),
(18, 'ĐAI ĐEN'),
(17, 'ĐÍCH ĐẤM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `tenKh` varchar(255) NOT NULL,
  `sdtKh` int(11) NOT NULL,
  `emailKh` varchar(255) NOT NULL,
  `diachiKh` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ngaydat` date NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `productId`, `productName`, `tenKh`, `sdtKh`, `emailKh`, `diachiKh`, `quantity`, `price`, `image`, `ngaydat`, `tinhtrang`) VALUES
(46, 11, 'BAO CÁT ĐỨNG LẬT ĐẬT TRẺ EM', 'Hải', 367896503, 'nguyenminhhai1903@gmail.com', '111 Rạch Bùng Binh Phường 9, Quận 3', 3, 390000, '290a25322a.png', '2020-07-02', 0),
(47, 11, 'BAO CÁT ĐỨNG LẬT ĐẬT TRẺ EM', 'Hải', 367896503, 'nguyenminhhai1903@gmail.com', '111 Rạch Bùng Binh Phường 9, Quận 3', 1, 130000, '290a25322a.png', '2020-07-02', 0),
(48, 11, 'BAO CÁT ĐỨNG LẬT ĐẬT TRẺ EM', 'Hải', 367896503, 'nguyenminhhai1903@gmail.com', '111 Rạch Bùng Binh Phường 9, Quận 3', 1, 130000, '290a25322a.png', '2020-07-03', 0),
(49, 19, 'BAO CÁT ĐỨNG LẬT ĐẬT BƠM HƠI', 'Hải', 367896503, 'nguyenminhhai1903@gmail.com', '111 Rạch Bùng Binh Phường 9, Quận 3', 1, 900000, '263b12defd.jpg', '2020-07-03', 0),
(50, 17, 'BAO CÁT QUẢ LÊ TBEST – TEARDROP BAG', 'Hải', 367896503, 'nguyenminhhai1903@gmail.com', '111 Rạch Bùng Binh Phường 9, Quận 3', 1, 1, '26337157a5.jpg', '2020-07-15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productQuantity` int(20) NOT NULL,
  `hangton` int(20) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `giasi` int(11) NOT NULL,
  `giale` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `productQuantity`, `hangton`, `catId`, `brandId`, `image`, `giasi`, `giale`, `type`) VALUES
(11, 'BAO CÁT ĐỨNG LẬT ĐẬT TRẺ EM', 200, 200, 6, 9, '290a25322a.png', 100000, 130000, 0),
(15, 'GĂNG TAY BOXING BN CHẤT LƯỢNG CAO GIÁ SỈ', 200, 200, 24, 2, '965b7c4d5d.jpg', 340000, 380000, 0),
(16, 'BỘ DÂY THUN TẬP TAY CHÂN BOXING MMA', 500, 500, 2, 11, 'af50e08631.jpg', 110, 130, 0),
(17, 'BAO CÁT QUẢ LÊ TBEST – TEARDROP BAG', 200, 200, 6, 19, '26337157a5.jpg', 1, 1, 0),
(18, 'BAO CÁT ĐỨNG LẬT ĐẬT BƠM HƠI EVERLAST', 100, 100, 6, 11, '6794749d4e.jpg', 800, 900, 0),
(19, 'BAO CÁT ĐỨNG LẬT ĐẬT BƠM HƠI', 100, 100, 6, 4, '263b12defd.jpg', 800000, 900000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `type`, `image`) VALUES
(3, 1, 'a246e5e925.png'),
(4, 1, 'bb5d586016.jpg'),
(5, 1, 'f94275b901.jpg'),
(6, 1, '37f7e1bcdf.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`),
  ADD UNIQUE KEY `brandName` (`brandName`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `productName` (`productName`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
