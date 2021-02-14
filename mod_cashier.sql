-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 04:30 PM
-- Server version: 10.4.14-MariaDB
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
-- Table structure for table `mod_cashier`
--

CREATE TABLE `mod_cashier` (
  `id_cashier` varchar(35) NOT NULL,
  `forename` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `license_number` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = Active, 2 = Registered, 3 = Lock',
  `ticket_amount` decimal(10,2) DEFAULT NULL,
  `ticket_expire` date DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='แคสเชียร์';

--
-- Dumping data for table `mod_cashier`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_cashier`
--
ALTER TABLE `mod_cashier`
  ADD PRIMARY KEY (`id_cashier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
