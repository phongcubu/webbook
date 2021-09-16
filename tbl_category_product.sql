-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 11:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(13, 'Sách Học Ngoại Ngữ & Từ Điển', 'từ điển', 1, NULL, NULL),
(14, 'Khoa Học - Toán Học', 'khoa hoc - toán hoc', 1, NULL, NULL),
(15, 'Lịch sử - Văn hóa', 'lịch sử - văn học', 1, NULL, NULL),
(16, 'Sách Chính Trị - Pháp Lý & Khoa Học', 'chính trị - pháp lí & khoa học', 1, NULL, NULL),
(17, 'Sách Dạy Nấu Ăn', 'dạy nấu ăn', 1, NULL, NULL),
(18, 'Sách Giáo Dục', 'giao duc', 1, NULL, NULL),
(19, 'Sách Hướng Nghiệp & Phát Triển Bản Thân', 'hướng nghiệp & phát triển bản thân', 1, NULL, NULL),
(20, 'Sách Khoa Học Thiếu Nhi', 'khoa hoc thiếu nhi', 1, NULL, NULL),
(21, 'Sách Kinh Tế - Kinh Doanh', 'kinh tế - kinh doanh', 1, NULL, NULL),
(22, 'Sách Nghệ thuật, Thiết kế & Nhiếp ảnh', 'nghệ thuật, thiết kế & nhiếp ảnh', 1, NULL, NULL),
(23, 'Sách Thiếu Nhi', 'thiếu nhi', 1, NULL, NULL),
(24, 'Sách y học', 'y học', 1, NULL, NULL),
(25, 'Truyện tranh', 'truyện tranh', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
