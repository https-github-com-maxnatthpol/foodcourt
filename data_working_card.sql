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
-- Table structure for table `data_working_card`
--

CREATE TABLE `data_working_card` (
  `id` varchar(35) NOT NULL,
  `amount` int(11) NOT NULL COMMENT 'จำนวนเงินที่เติมหรือจ่ายออก',
  `receive_money` int(11) NOT NULL COMMENT 'เงินที่รับมา',
  `Identity` int(1) NOT NULL COMMENT '0 = เงินเข้า, 1 = เงินออก,2 = ย้ายเงิน',
  `data_date` datetime NOT NULL,
  `id_card` varchar(35) NOT NULL,
  `id_cashier` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_working_card`
--
ALTER TABLE `data_working_card`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
