-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 03:11 PM
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
-- Table structure for table `mod_cashier_sales_store`
--

CREATE TABLE `mod_cashier_sales_store` (
  `id` varchar(35) NOT NULL,
  `sales_store` int(35) NOT NULL,
  `sales_store_transfer` int(35) NOT NULL,
  `sales_store_paid` int(35) NOT NULL,
  `sales_store_total` int(35) NOT NULL,
  `date_action` date NOT NULL,
  `id_cashier` varchar(35) NOT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_cashier_sales_store`
--

INSERT INTO `mod_cashier_sales_store` (`id`, `sales_store`, `sales_store_transfer`, `sales_store_paid`, `sales_store_total`, `date_action`, `id_cashier`, `create_id`, `create_datetime`) VALUES
('i88fbdabefbc7d35241l8c3e52c1334b46e', 381, 0, 381, 0, '2021-03-31', 'u94361f75d15c4950912039cfdd54ab78rf', 'u94361f75d15c4950912039cfdd54ab78rf', '2021-03-31 12:49:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_cashier_sales_store`
--
ALTER TABLE `mod_cashier_sales_store`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
