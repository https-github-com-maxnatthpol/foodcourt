-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 07:40 PM
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
-- Table structure for table `history_payment_shop`
--

CREATE TABLE `history_payment_shop` (
  `id_history_pay` varchar(35) NOT NULL,
  `id_customer` varchar(35) NOT NULL,
  `amount` int(11) NOT NULL,
  `card_number` varchar(18) NOT NULL,
  `id_catagory` varchar(100) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `date_action` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_payment_shop`
--

INSERT INTO `history_payment_shop` (`id_history_pay`, `id_customer`, `amount`, `card_number`, `id_catagory`, `create_datetime`, `date_action`) VALUES
('b384ced3d8ce80a4722q6336b8fe9cdfbau', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 50, '000466875507115699', '1', '2021-03-16 01:34:17', '2021-03-16'),
('f1ce796be059ff45t7e5236c585ac06edct', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:56:15', '2021-03-17'),
('hd87afr89959873a543b9abd0200599751i', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 11, '000466875507115699', '1', '2021-03-16 01:33:16', '2021-03-16'),
('i4h0cd27531edbfaf1a53f07600221fb86v', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 40, '000466875507115699', '1', '2021-03-17 00:38:30', '2021-03-17'),
('i817817b4f804ab3g3a495a10352bc8a8ev', 'p5154ceeef7d836777fu0958fd2a94e928x', 10, '000466875507115699', '1', '2021-03-17 00:52:20', '2021-03-17'),
('lf02a0f56dc458279baa7d9cfgc4efacccd', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:37:25', '2021-03-17'),
('s3f1df7b351f6d6fc1681iab3199f79359d', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:50:32', '2021-03-17'),
('sf7e4fb76e56e2d57c9dd201b8560vea99c', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 50, '000466875507115699', '1', '2021-03-17 01:00:59', '2021-03-17'),
('v191b335c94fe04490d21tb4bac9c28873p', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 01:00:38', '2021-03-17'),
('w80da8305ddb41cbeda95c08f29295795rs', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:59:41', '2021-03-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_payment_shop`
--
ALTER TABLE `history_payment_shop`
  ADD PRIMARY KEY (`id_history_pay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
