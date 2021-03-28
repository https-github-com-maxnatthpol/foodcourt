-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 06:45 PM
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
-- Table structure for table `percent_customer_history`
--

CREATE TABLE `percent_customer_history` (
  `percent_cus_id` varchar(35) NOT NULL,
  `percent_customer` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `id_customer` varchar(35) NOT NULL,
  `create_id` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `percent_customer_history`
--

INSERT INTO `percent_customer_history` (`percent_cus_id`, `percent_customer`, `create_datetime`, `id_customer`, `create_id`) VALUES
('ka31d65det3f7cbd27c984078a0172fbd2i', 20, '2021-03-28 14:29:03', 'c21d53933fd0519bbcb16784521m18b2dfd', 'admin'),
('w4a3bc1977e4fd40371d065fb195061m3aj', 20, '2021-03-28 14:15:24', 'c21d53933fd0519bbcb16784521m18b2dfd', 'admin'),
('x37e4c794c5c09fdf01ddn06de521bdc50f', 10, '2021-03-28 14:25:44', 'macd544f079e5c307a8ec8dcd62e51b27dk', 'hd4cff774d6516542n451ce4dbd75c3513o');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `percent_customer_history`
--
ALTER TABLE `percent_customer_history`
  ADD PRIMARY KEY (`percent_cus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
