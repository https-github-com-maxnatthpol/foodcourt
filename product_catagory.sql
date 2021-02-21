-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2021 at 08:34 PM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `product_catagory`
--

CREATE TABLE `product_catagory` (
  `id_catagory` int(11) NOT NULL,
  `name_catagory_th` varchar(100) NOT NULL,
  `name_catagory_en` varchar(100) NOT NULL,
  `description_th` text,
  `description_en` text,
  `create_datetime` datetime NOT NULL,
  `group_sub` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `delete_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_catagory`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_catagory`
--
ALTER TABLE `product_catagory`
  ADD PRIMARY KEY (`id_catagory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_catagory`
--
ALTER TABLE `product_catagory`
  MODIFY `id_catagory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
