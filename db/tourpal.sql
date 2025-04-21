-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 06:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `createtime`, `updateby`, `status`) VALUES
(1, 'admin', 'admin', '2018-08-01 10:16:38', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `deviceloc`
--

CREATE TABLE `deviceloc` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deviceloc`
--

INSERT INTO `deviceloc` (`id`, `location`, `createtime`, `updatetime`, `updateby`, `status`) VALUES
(1, 'Trichy', '2018-08-02 02:42:00', '0000-00-00 00:00:00', 1, 'A'),
(2, 'Chennai', '2018-08-02 02:42:14', '0000-00-00 00:00:00', 1, 'A'),
(3, 'Coimbatore', '2018-08-02 02:42:28', '0000-00-00 00:00:00', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device`, `createtime`, `updatetime`, `updateby`, `status`) VALUES
(1, 'Device 1', '2018-08-02 03:21:02', '0000-00-00 00:00:00', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` int(20) NOT NULL,
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
  `createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `contact_number`, `username`, `password`, `image`, `address`, `weekday`, `hours`, `work_day`, `work_time`, `close_day`, `url`, `createtime`, `updateby`, `status`) VALUES
(21, 'Nagore Dargah Indian Muslim Heritage Centre', 984654458, 'jegan@pixaknights.com', 'e6e061838856bf47e1de730719fb2609', 'Nagore_Dargah_Indian_Muslim_Heritage_Centre.jpg', '140 Telok Ayer Street | Singapore 068604', 'Weekdays', '1000hrs - 1700hrs', 'Mon - Tue', '09.00am - 06.00pm', 'Monday, Tuesday and Sunday', 'http://pixaknights.com', '2018-08-02 14:09:36', 0, ''),
(22, 'Jegan', 984654458, 'test@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'Jegan.jpg', 'Trichy', 'Weekdays', '1000hrs - 1700hrs', 'Mon - Tue', '09.00am - 06.00pm', 'Monday, Tuesday and Sunday', 'http://pixaknights.com', '2018-08-02 16:04:52', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deviceloc`
--
ALTER TABLE `deviceloc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
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
-- AUTO_INCREMENT for table `deviceloc`
--
ALTER TABLE `deviceloc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
