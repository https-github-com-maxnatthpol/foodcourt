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
-- Table structure for table `mod_customer`
--

CREATE TABLE `mod_customer` (
  `id_customer` varchar(35) NOT NULL,
  `forename` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = Active, 2 = Registered, 3 = Lock',
  `id_catagory` varchar(100) NOT NULL,
  `ticket_amount` decimal(10,2) DEFAULT NULL,
  `ticket_expire` date DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `ip_customer` text DEFAULT NULL,
  `print_customer` text DEFAULT NULL,
  `percent_customer` int(11) NOT NULL DEFAULT 0,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ลูกค้า';

--
-- Dumping data for table `mod_customer`
--

INSERT INTO `mod_customer` (`id_customer`, `forename`, `surename`, `id_card`, `email`, `telephone`, `secondary_email`, `status`, `id_catagory`, `ticket_amount`, `ticket_expire`, `create_id`, `create_datetime`, `update_id`, `update_datetime`, `ip_customer`, `print_customer`, `percent_customer`, `delete_datetime`) VALUES
('c21d53933fd0519bbcb16784521m18b2dfd', 'ร้านตัดผม ทรงดี', '', '1112311211112', 'pppp@hot.com', '111111', NULL, 1, '2', NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-13 16:32:15.000000', 'admin', '2021-03-28 14:29:03.000000', NULL, NULL, 20, NULL),
('j4f687f2ed060dc2f96fd2kc92c73ce40eq', 'test19', '', '2222222222222', '11111@gmail.com', '111-111-1111', NULL, 1, '1', NULL, NULL, 'admin', '2021-03-07 19:26:13.000000', 'admin', '2021-03-26 02:37:08.000000', '192.168.1.106', 'test01', 0, NULL),
('macd544f079e5c307a8ec8dcd62e51b27dk', 'test02', '', '2222222222222', '2222@gmail.com', '222-222-2222', NULL, 2, '2', NULL, NULL, 'admin', '2021-03-11 03:35:52.000000', 'admin', '2021-03-28 14:15:24.000000', NULL, NULL, 20, NULL),
('n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 'ร้านอาหารศรีมา ธานี', '', '1111111111111', '222@222.com', '222-2222-222', NULL, 1, '1', NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-17 16:35:21.000000', 'admin', '2021-03-17 01:32:42.000000', '192.168.1.119', 'Shop02', 0, NULL),
('p5154ceeef7d836777fu0958fd2a94e928x', 'ddd ddddd', '', '1321465843654', 'ttt@dfdfdf.com', '087-3580-651', NULL, 1, '1', NULL, NULL, '', '2021-02-12 22:38:13.000000', '', '2021-02-21 23:01:01.000000', NULL, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_customer`
--
ALTER TABLE `mod_customer`
  ADD PRIMARY KEY (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
