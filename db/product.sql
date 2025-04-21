-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 02:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `createtime`, `updateby`, `status`) VALUES
(1, 'admin', 'admin', '2018-08-01 10:16:38', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `status`, `created_time`) VALUES
(1, 'Necklaces', 1, '2023-01-25 17:32:21'),
(2, 'Earrings', 1, '2023-01-25 17:33:28'),
(3, 'Rings', 1, '2025-04-16 18:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `price` float(7,2) NOT NULL,
  `category` int(11) NOT NULL,
  `pimage` varchar(229) NOT NULL,
  `createtime` datetime NOT NULL DEFAULT current_timestamp(),
  `updateby` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `description`, `price`, `category`, `pimage`, `createtime`, `updateby`, `status`) VALUES
(1, 'Diamond Engagement Ring', 'A stunning 18K gold ring studded with a single sparkling diamond, ideal for engagements and anniversaries.', 23344.00, 3, 'cropped_1745230916.jpg', '2025-04-16 07:13:49', 1, 'A'),
(4, 'test cropper', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.Some quick example text to build on the card title and make up the bulk of the card\'s content.Some quick example text to build on the card title and make up the bulk of the card\'s content.', 23344.00, 1, 'cropped_1744877433.png', '2025-04-17 13:40:41', 1, 'D'),
(6, '24K Gold Necklace', 'A beautifully crafted pure 24K gold necklace with intricate traditional patterns, perfect for weddings and special occasions.A beautifully crafted pure 24K gold necklace with intricate traditional patterns, perfect for weddings and special occasions.', 90000.00, 1, 'cropped_1745230753.jpg', '2025-04-21 15:49:18', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` double NOT NULL,
  `descript` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `weekday` varchar(255) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `work_day` varchar(255) NOT NULL,
  `work_time` varchar(255) NOT NULL,
  `close_day` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `contact_number`, `descript`, `username`, `password`, `image`, `address`, `weekday`, `hours`, `work_day`, `work_time`, `close_day`, `url`, `createtime`, `updatetime`, `updateby`, `status`) VALUES
(1, 'sathyaraj', 4310789632, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'STR_25-08-2018.jpg', 'asdfsadf', 'Weekdays', '24/7', 'Mon-Sat', '09.00am-07.00am', 'Sunday', 'https://www.example.com', '2018-08-25 07:51:46', '2018-08-25 10:09:01', 1, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
