-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:11 AM
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
-- Table structure for table `expiry_history`
--

CREATE TABLE `expiry_history` (
  `id` varchar(35) NOT NULL,
  `card_number` varchar(18) NOT NULL,
  `amount` int(11) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expiry_history`
--

INSERT INTO `expiry_history` (`id`, `card_number`, `amount`, `expiry_date`) VALUES
('b8052f1bca66f0bf0145dea951e4c1k678b', '000134415802033438', 10, '2021-06-12'),
('bdz59a130a699b6c04ab48a53b07017116h', '000001590000015900', 100, '2021-06-12'),
('e653daaf1bc2yc17cc3a191d774c21c31fr', '000205535303123737', 5, '2021-06-12'),
('ea0as6d06ce064179af8d206a7340c8618r', '000001590000015900', 100, '2021-06-12'),
('la8d3628b797d6febb9581e8d5a27031f2t', '000205535303123737', 5, '2021-06-12'),
('sf77f62975b3750ea6888e3c7f82exe0d7r', '000134415802033438', 10, '2021-06-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expiry_history`
--
ALTER TABLE `expiry_history`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
