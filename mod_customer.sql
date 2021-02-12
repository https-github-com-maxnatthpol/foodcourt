-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 04:35 PM
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
-- Database: `vao_main`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ลูกค้า';

--
-- Dumping data for table `mod_customer`
--

INSERT INTO `mod_customer` (`id_customer`, `forename`, `surename`, `id_card`, `license_number`, `email`, `telephone`, `secondary_email`, `status`, `ticket_amount`, `ticket_expire`, `create_id`, `create_datetime`, `update_id`, `update_datetime`, `delete_datetime`) VALUES
('a380e3e960bc163a3b9a1sfb01678cbf84z', 'test_mike1', 'mike1', '1232321232312', '12232332233123', 'test_mike1@gmail.com', '0934232423', NULL, 2, NULL, NULL, '', '2020-01-20 10:01:09.000000', NULL, '2020-01-20 15:00:25.000000', NULL),
('bcd41cd219e0foaaa2606f1eaed9827bfbl', 'test_mike20', 'mike02', '2020200202002', '20202020020202', 'mai.supakon@gmail.com', '1234', NULL, 2, NULL, NULL, '', '2020-01-24 16:05:50.000000', NULL, '2020-01-24 16:33:23.000000', NULL),
('c4a288eaf70992c4f4f29zea2edbce1640n', 'roon', 'roon', '1231646446464', 'gdfgdfg26dfgd5', 'rungarun.titha.1996@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-22 11:23:13.000000', NULL, NULL, NULL),
('c8ebc582057859c65c6645af1265cd9c11s', 'test_mike10', '55555', '5645646546546', '65465465465', 'test_mike10@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-23 14:27:36.000000', NULL, NULL, NULL),
('d22cb674c49e2839d3b3508dae793c52aca', '321321', '321321', '3213132131321', '32-1321/3213', '321321@gmail.com', '321-3213-213', NULL, 2, NULL, NULL, 'ea249b5c58p1b6f9813ab5b694feff7c20w', '2020-01-24 09:15:12.000000', NULL, NULL, NULL),
('ed7161d1fc7b1b109330a3a9b8465c2nd7m', '654654', '987987', '6546546546546', '65465465465465', '654654@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-24 17:00:11.000000', NULL, NULL, NULL),
('f000524e2c9b38fr9d1e546dc7101286fbh', '99999', '99999', '9999999999998', '99999999999998', '99998@gmail.com', '124', NULL, 2, NULL, NULL, '', '2020-01-27 09:34:38.000000', NULL, '2020-01-27 09:35:16.000000', NULL),
('fa03w6ff1e195c601c75232a35929c37b3u', '63636363', '6.363636', '6363636363636', '63636363636363', '636363636@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-27 09:31:15.000000', NULL, NULL, NULL),
('h77ddl9f73237b1012d406f7981b1a451ay', 'มานี', 'มานะ', '8888888888888', '44-4444/4444', 'manee@mana.com', '___-____-___', NULL, 2, NULL, NULL, 'uab78242ecbc855156d289c0b4313822fxb', '2020-01-23 14:53:55.000000', '', '2020-01-23 17:26:55.000000', NULL),
('i30136fe2e5fb28617f37490850h4ab570e', '1234', '1234', '1234123412341', '12341234123412', '1234@gmail.com', '0936792513', NULL, 2, '18550.00', '2020-03-25', '', '2020-01-23 17:45:19.000000', NULL, '2020-03-20 16:00:51.000000', NULL),
('j003cc637d1f5384ddde52a2ckdbbf0f21r', 'roon', 'roon', '1231646446465', 'gdfgdfg26dfgdf', 'rungarun2539.titha@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-22 10:25:28.000000', NULL, NULL, NULL),
('j3be50559092fr0e09916cbef7211ca896v', 'จิตต์มนัส', 'เลาวกุล', '1100200062945', '01-7087/2552', '1100200062945@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-02-24 16:19:41.000000', NULL, NULL, NULL),
('m0fadde27d4f0b41e4c5573ccm3eb288bew', 'test_mike', 'mike', '1231231231323', '1231232321323', 'test_mike2@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-22 14:33:23.000000', NULL, NULL, NULL),
('m7a5ha3b40c3a21718bbd9ebbe00209af3n', '321321', '321321', '3213213213213', '32132132132132', '321321321@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-27 09:26:39.000000', NULL, NULL, NULL),
('o3746d1d719fcc2522ffczc266f657dda2l', '213123', '123213', '1231231231231', '12312321323232', '8888@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-27 09:31:55.000000', NULL, NULL, NULL),
('o5c4a9a1d9e934odac6f2fb6b1fa2d073dr', '654654', '987987', '6546546546546', '65465465465465', '654654@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-24 17:00:05.000000', NULL, NULL, NULL),
('q1634d7b2a3ufe8561971d7600aab0e5e8n', '4321', '4321', '4321321313213', '564564654654', '4321@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-23 17:52:19.000000', NULL, NULL, NULL),
('r6909a0ce2s4de04eec3b1332e672cbb3dj', 'ken', '1234', '1233121332121', '231dsa351', 'ken2@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-22 14:18:32.000000', NULL, NULL, NULL),
('r9cb26621892dezc50712f4aa10d897433h', '213123', '123213', '1231231231231', '12312321323232', '8888@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-27 09:32:12.000000', NULL, NULL, NULL),
('rb35171bffb20acd893c2813c446ed481bl', '9999', '9999', '9999999999999', '99999999999999', '9999@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-24 17:01:17.000000', NULL, NULL, NULL),
('v2d09c081cbfc880ad6l84028c4a44a475s', 'ken', 'oichi', '1233518516856', '1335351513', 'ken@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-17 13:29:13.000000', NULL, NULL, NULL),
('vcae77fddb83ce5e5195adcee50768fddxd', '654654', '987987', '6546546546546', '65465465465465', '654654@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-24 17:00:41.000000', NULL, NULL, NULL),
('x2dd6ea964e933e348f1fa9a0dc217928mo', '123', '213213', '2131231231231', '123123123', '123213@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-27 09:32:28.000000', NULL, NULL, NULL),
('xe40859eda27e13c8e57b3429bd56662w6p', 'นินดา', 'ใจงาม', '1151215111151', '22-6262/6262', 'tester03@gmail.com', '087-5454-545', NULL, 2, NULL, NULL, '', '2019-12-12 13:19:53.000000', '', '2019-12-12 13:20:21.000000', NULL),
('xfca9837f23oc42b7fb80050ca19bca47fk', 'ลัดดาวรรณ', 'สมรูป', '5800900030309', '01-4059/2546', '333@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-02-17 09:13:47.000000', NULL, NULL, NULL),
('y4ed8d40j614def48767f81e22429d9425s', 'test_mike', 'mike', '1234239420934', '321045-5464/25', 'test_mike@gmail.com', NULL, NULL, 2, NULL, NULL, '', '2020-01-17 13:26:36.000000', NULL, NULL, NULL),
('z3i64daa7704f157615919077851f713abk', 'กนกนพ  ใจงาม', 'ใจงาม', '1214548544545', '12-1215/4545', 'tester02@gmail.com', '045-4545-454', NULL, 2, NULL, NULL, '', '2019-12-12 10:44:55.000000', NULL, NULL, NULL);

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
