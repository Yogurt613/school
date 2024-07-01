-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 07:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbtodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `calendar_id` int(11) NOT NULL,
  `calendar_name` varchar(255) NOT NULL,
  `calendar_link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`calendar_id`, `calendar_name`, `calendar_link`, `created_at`, `updated_at`) VALUES
(1, '112學年度行事曆 (112.3.9 教育部核備112.11.6 行政會議修正)', 'https://secretary.takming.edu.tw/var/file/4/1004/img/871489827.pdf', '2023-11-08 06:31:34', '2023-11-08 06:31:34'),
(2, '111學年行事曆 (111.03.15臺教技(四)字第1110025866號函核備)-111.0.7.4行政會議後修訂', 'https://secretary.takming.edu.tw/var/file/4/1004/img/53/135123082.pdf', '2023-11-08 06:31:34', '2023-11-08 06:31:34'),
(3, '110學年度行事曆(110.03.25教育部核備版本)', 'https://secretary.takming.edu.tw/var/file/4/1004/img/53/354794713.pdf', '2023-11-08 06:31:34', '2023-11-08 06:31:34'),
(4, '109學年度第2學期行事曆(110.02.22教育部核備版本)', 'https://secretary.takming.edu.tw/var/file/4/1004/img/53/416710148.pdf', '2023-11-08 06:31:34', '2023-11-08 06:31:34'),
(5, '108學年度第2學期行事曆(109.02.11教育部核備版本)', 'https://secretary.takming.edu.tw/var/file/4/1004/img/53/139792999.pdf', '2023-11-08 06:31:34', '2023-11-08 06:31:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`calendar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `calendar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
