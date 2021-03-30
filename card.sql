-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 08:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suwan_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` varchar(35) NOT NULL,
  `number` int(4) NOT NULL,
  `card_number` varchar(18) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 = ใช้งานได้ ,0 = ระงับการใช้งาน',
  `amount` int(11) NOT NULL,
  `Issue_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `id_employee` varchar(35) NOT NULL COMMENT 'ผู้ออกบัตร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `number`, `card_number`, `status`, `amount`, `Issue_date`, `last_update`, `id_employee`) VALUES
('j0a4a9p37b9f32138c66bf7010555164a9m', 1, '001167521822222222', 1, 0, '2021-03-07 01:19:16', '2021-03-11 01:45:09', 'hd4cff774d6516542n451ce4dbd75c3513o');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
