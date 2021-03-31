-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 08:09 PM
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `account_name` varchar(45) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `qrcode_image` varchar(255) DEFAULT NULL,
  `qrcode_directory` varchar(255) DEFAULT NULL,
  `id_tutor` varchar(35) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `branch_en` varchar(255) NOT NULL,
  `account_name_en` varchar(255) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('b89aa0a5bfa8cee97581fc105e5bbd457gt', 2, '000794540112115545', 1, 0, '2021-03-14 17:39:03', '2021-03-31 20:42:03', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('k09ab2953785ffa1a797309f93a08864e7j', 3, '001167521817809810', 1, 0, '2021-03-14 17:39:26', '2021-03-31 19:27:52', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('u1e7305f2778p666e404f1c576361191f8k', 1, '000466875507115699', 1, 0, '2021-03-14 17:31:46', '2021-03-29 00:59:17', 'hd4cff774d6516542n451ce4dbd75c3513o');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_th` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_th` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='กลุ่มวิชา';

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '1 = reply',
  `action_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_reply`
--

CREATE TABLE `contact_reply` (
  `id_reply` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `messages` text NOT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Dumping data for table `data_working_card`
--

INSERT INTO `data_working_card` (`id`, `amount`, `receive_money`, `Identity`, `data_date`, `id_card`, `id_cashier`) VALUES
('byf733eefeef1a1a78145568b80e950884f', 100, 100, 0, '2021-03-31 18:33:35', 'k09ab2953785ffa1a797309f93a08864e7j', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('fe26a2d0765577895915fa2061bfa3d96aa', 100, 100, 0, '2021-03-31 18:36:38', 'k09ab2953785ffa1a797309f93a08864e7j', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('i8e3c1b7fcc3s08031ea5958da05799672s', 100, 0, 1, '2021-03-31 18:34:03', 'k09ab2953785ffa1a797309f93a08864e7j', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('t34e510dd20352ee113a808073j3f6163ds', 100, 100, 0, '2021-03-31 20:41:36', 'b89aa0a5bfa8cee97581fc105e5bbd457gt', 'u94361f75d15c4950912039cfdd54ab78rf'),
('w66235a79pb0cd75963d54cfe31926a619u', 100, 0, 1, '2021-03-31 20:42:03', 'b89aa0a5bfa8cee97581fc105e5bbd457gt', 'u94361f75d15c4950912039cfdd54ab78rf');

-- --------------------------------------------------------

--
-- Table structure for table `freedom_page`
--

CREATE TABLE `freedom_page` (
  `id_page` int(11) NOT NULL,
  `name_th` varchar(100) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `text_th` text DEFAULT NULL,
  `text_en` text DEFAULT NULL,
  `id_link` int(11) DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `froala_uploads`
--

CREATE TABLE `froala_uploads` (
  `id_uploads` int(11) NOT NULL,
  `name_uploads` varchar(100) NOT NULL,
  `link_uploads` varchar(100) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `heading`
--

CREATE TABLE `heading` (
  `id_heading` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `name_th` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_th` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `percent_customer` int(11) NOT NULL DEFAULT 0,
  `date_action` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_payment_shop`
--

INSERT INTO `history_payment_shop` (`id_history_pay`, `id_customer`, `amount`, `card_number`, `id_catagory`, `create_datetime`, `percent_customer`, `date_action`) VALUES
('a59478a1c0e4dd8c633bbe742bf0p800a8f', 'admin', 1, '001167521817809810', '', '2021-03-21 18:33:20', 0, '2021-03-21'),
('a5abe31a644833ce1bd9y502f30f64ca31y', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 0, '001167521817809810', '1', '2021-03-25 23:31:02', 0, '2021-03-25'),
('ab5d9e951eeba6ac1aa5n2ad4421ae57c8f', 'admin', 1, '001167521817809810', '', '2021-03-21 19:40:33', 0, '2021-03-21'),
('acb1ba0db53933cafa249eb5a588b7ev60m', 'admin', 1, '001167521817809810', '', '2021-03-21 20:12:57', 0, '2021-03-21'),
('ao8fda15c327338e09eacc0489479aa345l', 'admin', 1, '001167521817809810', '', '2021-03-21 18:34:23', 0, '2021-03-21'),
('b35d0daf1fd41511be9dcb686ae4652ac4z', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 0, '001167521817809810', '1', '2021-03-25 23:31:34', 0, '2021-03-25'),
('b384ced3d8ce80a4722q6336b8fe9cdfbau', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 50, '000466875507115699', '1', '2021-03-16 01:34:17', 10, '2021-03-31'),
('b401c01012c9b183902f6cde35835ecd5pn', 'admin', 1, '001167521817809810', '', '2021-03-21 18:52:21', 0, '2021-03-21'),
('b68a717b17cy618a04e86a5f1643f4a122g', 'admin', 1, '001167521817809810', '', '2021-03-21 20:09:44', 0, '2021-03-21'),
('b8d91ade5f9ee2193b5u0ae5f114b0f3d6e', 'admin', 1, '001167521817809810', '', '2021-03-21 18:43:08', 0, '2021-03-21'),
('be00249d0b57f54b933e9062e53s366a73p', 'admin', 1, '001167521817809810', '', '2021-03-21 23:04:07', 0, '2021-03-21'),
('c3ff712e3b53h260f06c49b63e7bd9241ay', 'admin', 1, '001167521817809810', '', '2021-03-21 18:53:41', 0, '2021-03-21'),
('c5233148d8c8f7f7da1138436ae7d5o53av', 'admin', 1, '001167521817809810', '', '2021-03-21 18:53:20', 0, '2021-03-21'),
('cb382ef4852ad7e86b817f58ce5by6425fg', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-31 19:27:14', 0, '2021-03-31'),
('ccd0d5cf07b226u2c14bba0b858b1962d1i', 'admin', 1, '001167521817809810', '', '2021-03-28 14:20:41', 0, '2021-03-28'),
('d00ddf558ac8a4a19czd374a4427a1a2c7y', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 20:30:22', 0, '2021-03-21'),
('d032426a947c539x19cfd14957c3133842c', 'admin', 1, '001167521817809810', '', '2021-03-21 20:13:32', 0, '2021-03-21'),
('d33d2e2c7ac87b60bbam965ced9e219cbdo', 'admin', 1, '001167521817809810', '', '2021-03-21 18:54:49', 0, '2021-03-21'),
('d441ac8b883483d92be480a745d268f62ku', 'admin', 1, '001167521817809810', '', '2021-03-21 18:54:05', 0, '2021-03-21'),
('dd0406e9cz67a207235f42f15f56626a94w', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 9, '001167521817809810', '1', '2021-03-21 16:09:34', 0, '2021-03-21'),
('f1ce796be059ff45t7e5236c585ac06edct', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:56:15', 0, '2021-03-17'),
('f67be56961n009678796dd1a2f8eb391b0l', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 01:43:17', 0, '2021-03-17'),
('f89a983664d15e45bqd0b64fed9e3c2461a', 'admin', 1, '001167521817809810', '', '2021-03-28 14:21:55', 0, '2021-03-28'),
('fce7k1abc40947c9ce9e17e619f9b44479y', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 5, '001167521817809810', '1', '2021-03-21 16:22:48', 0, '2021-03-21'),
('g293f1e977a88fc112ebz5954b8f2dcbf9u', 'admin', 1, '001167521817809810', '', '2021-03-21 18:48:54', 0, '2021-03-21'),
('g34d0a4c862be0e2ef3419c40e1c7d9f60r', 'admin', 1, '001167521817809810', '', '2021-03-21 18:34:00', 0, '2021-03-21'),
('g5f67c45c10eddh2d6c069874d4eb71038z', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 20, '001167521817809810', '1', '2021-03-31 19:27:52', 0, '2021-03-29'),
('g88e28b42ea25dze1a8cfe3f29f75cfdd5k', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-21 15:41:57', 0, '2021-03-21'),
('gbee54647e08k8f61666527359ad736671l', 'admin', 1, '001167521817809810', '', '2021-03-21 18:21:56', 0, '2021-03-21'),
('gc40r0d2b1b56e178f245af75d8f961e9de', 'admin', 1, '001167521817809810', '', '2021-03-21 18:42:58', 0, '2021-03-21'),
('gd996b69105994dec5a6h51688540dc068n', 'c21d53933fd0519bbcb16784521m18b2dfd', 40, '001167521817809810', '2', '2021-03-28 14:24:27', 10, '2021-03-28'),
('hb25476d6e8fbdfb56a5fb135e2100ab10h', 'admin', 1, '001167521817809810', '', '2021-03-21 16:16:27', 0, '2021-03-21'),
('hcb54f362c0ecue3cac16cb579d0d355cfz', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-31 19:27:20', 0, '2021-03-31'),
('hce8c75a6an60ea1291cd163dabfd17ff6x', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 20:01:58', 0, '2021-03-21'),
('hd0c1z2fda8bac25907235a3a9a8605453q', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 16:00:06', 0, '2021-03-21'),
('hd87afr89959873a543b9abd0200599751i', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 11, '000466875507115699', '1', '2021-03-16 01:33:16', 0, '2021-03-16'),
('i0918v857b4b99e09e8870e058c03cca41u', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-31 19:27:33', 0, '2021-03-28'),
('i46c075ac3ac05175277e9d43d3a97525aw', 'admin', 1, '001167521817809810', '', '2021-03-21 18:45:34', 0, '2021-03-21'),
('i4h0cd27531edbfaf1a53f07600221fb86v', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 40, '000466875507115699', '1', '2021-03-17 00:38:30', 0, '2021-03-17'),
('i817817b4f804ab3g3a495a10352bc8a8ev', 'p5154ceeef7d836777fu0958fd2a94e928x', 10, '000466875507115699', '1', '2021-03-17 00:52:20', 0, '2021-03-17'),
('i940qa95b2bdc0795f5a45bc3bb86cab2ba', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-31 19:26:55', 0, '2021-03-25'),
('ic9102bd6adbad2d771e29fc4d5cda4b18y', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-31 19:27:26', 0, '2021-03-24'),
('k9a0ec4ae742a79f8dacd69a770522d1bdc', 'c21d53933fd0519bbcb16784521m18b2dfd', 50, '001167521817809810', '2', '2021-03-28 14:25:52', 10, '2021-03-28'),
('kftb8ca16b339aa1963fa8332964fdf079u', 'admin', 1, '001167521817809810', '', '2021-03-21 18:48:24', 0, '2021-03-21'),
('l427767we80200f70640b321cd89f745e7h', 'admin', 1, '001167521817809810', '', '2021-03-21 18:20:13', 0, '2021-03-21'),
('lf02a0f56dc458279baa7d9cfgc4efacccd', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:37:25', 0, '2021-03-17'),
('m64bde1ef59394cjfc464a0777a4a1172fc', 'admin', 1, '001167521817809810', '', '2021-03-21 20:09:25', 0, '2021-03-21'),
('n017442ba9c930e77910e248a65d99a991u', 'admin', 5, '001167521817809810', '', '2021-03-21 16:13:01', 0, '2021-03-21'),
('n30cbf895a0bbd93f808e67056dcjf8f95k', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 20:27:31', 0, '2021-03-21'),
('ncb0a957f3d24f5yd4b6f99ea9dd11c72ac', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 20:25:40', 0, '2021-03-21'),
('o35v50e1b56f252ab7b2a643668ad859fdr', 'admin', 1, '001167521817809810', '', '2021-03-21 18:44:25', 0, '2021-03-21'),
('o70c1jceb807cf1aca3dfbbed519837919j', 'admin', 1, '001167521817809810', '', '2021-03-21 18:30:08', 0, '2021-03-21'),
('of1019e19cc78dcf6401z45430f589f660z', 'admin', 1, '001167521817809810', '', '2021-03-21 20:13:24', 0, '2021-03-21'),
('p290c5321e9ec77be36ft63c6436c38d1ap', 'admin', 5, '001167521817809810', '', '2021-03-21 18:26:32', 0, '2021-03-21'),
('p5d74c1c8o975a3be6ddf3e8dd654d43fee', 'admin', 1, '001167521817809810', '', '2021-03-21 19:41:20', 0, '2021-03-21'),
('p623f39d9241538c06ce3be77c6464cfxbo', 'admin', 1, '001167521817809810', '', '2021-03-21 23:04:01', 0, '2021-03-21'),
('p99cda4ef11cee634ecd793caa5a2cce31h', 'admin', 1, '001167521817809810', '', '2021-03-21 20:10:13', 0, '2021-03-21'),
('q338a4c8c54904810taa8725c23a2a11bab', 'admin', 1, '001167521817809810', '', '2021-03-21 18:36:50', 0, '2021-03-21'),
('q4c7de43c12l6de1d4e651c361e6562674s', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 5, '001167521817809810', '1', '2021-03-21 16:12:09', 0, '2021-03-21'),
('q5ec8b80da1419f3b113273ea307d82a1dg', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 50, '001167521817809810', '1', '2021-03-21 18:16:59', 0, '2021-03-21'),
('qbda7b37017uda4d70eb390a9023c45c86w', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 40, '001167521817809810', '1', '2021-03-21 18:17:31', 0, '2021-03-21'),
('r1648eed04e30b86f9w1847ad46d4148a3t', 'admin', 1, '001167521817809810', '', '2021-03-21 18:49:24', 0, '2021-03-21'),
('r31f67e36cc27e2c63df26cfcb8f4f644dx', 'admin', 1, '001167521817809810', '', '2021-03-21 18:30:41', 0, '2021-03-21'),
('rd4f2ec1s9015bf4f67501d4937ada0986c', 'admin', 1, '001167521817809810', '', '2021-03-21 19:33:47', 0, '2021-03-21'),
('re1d20b07237b44a3d986051a740b2eb57c', 'admin', 1, '001167521817809810', '', '2021-03-21 18:47:12', 0, '2021-03-21'),
('s08bcc665680e703an48c53b023f29c108k', 'admin', 1, '001167521817809810', '', '2021-03-21 16:14:05', 0, '2021-03-21'),
('s18801306373c0e4fda423fb882101f1edq', 'admin', 1, '001167521817809810', '', '2021-03-21 19:40:09', 0, '2021-03-21'),
('s29046da156c64ab591cadd3h7431cbb6bv', 'admin', 1, '001167521817809810', '', '2021-03-21 16:18:54', 0, '2021-03-21'),
('s3f1df7b351f6d6fc1681iab3199f79359d', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:50:32', 0, '2021-03-17'),
('sbsc1ebd5ece353e574ff83388f5396fdbu', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 4, '001167521817809810', '1', '2021-03-25 23:30:57', 0, '2021-03-25'),
('sf0f5af814fcb33a3h1fc069d8899ed2c5s', 'admin', 1, '001167521817809810', '', '2021-03-21 18:34:56', 0, '2021-03-21'),
('sf7e4fb76e56e2d57c9dd201b8560vea99c', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 50, '000466875507115699', '1', '2021-03-17 01:00:59', 0, '2021-03-17'),
('t4e069391e74dc025b91bd9923e4ea7c15j', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 20, '001167521817809810', '1', '2021-03-31 19:27:46', 0, '2021-03-27'),
('ta495529bcf50c55fe3e429047cez8f592y', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 20:23:45', 0, '2021-03-21'),
('th392e6a7a1ad2abda90385076e31ba71cf', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '001167521817809810', '1', '2021-03-31 19:27:41', 0, '2021-03-26'),
('u9xcd23abc4ea4e00d81f81b9291fb8609u', 'admin', 1, '001167521817809810', '', '2021-03-21 20:13:04', 0, '2021-03-21'),
('uc2151c91c99267939aa34b6a8b12ce2ebn', 'admin', 1, '001167521817809810', '', '2021-03-21 18:52:03', 0, '2021-03-21'),
('v191b335c94fe04490d21tb4bac9c28873p', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 01:00:38', 0, '2021-03-17'),
('v1946b7fb278a09af75ec3543b5204i6dcv', 'admin', 1, '001167521817809810', '', '2021-03-21 18:21:08', 0, '2021-03-21'),
('v742d8aceec7cc45u38beb8a2cb787bf59l', 'admin', 1, '001167521817809810', '', '2021-03-21 18:20:46', 0, '2021-03-21'),
('ve00754ae3976f0b6bce4456d9235c2avaz', 'admin', 1, '001167521817809810', '', '2021-03-21 18:19:42', 0, '2021-03-21'),
('w3461e9u739b98632e7bcc9a372198b968o', 'c21d53933fd0519bbcb16784521m18b2dfd', 100, '001167521817809810', '2', '2021-03-28 14:23:40', 20, '2021-03-28'),
('w4430159e9bf7cfab5a9619cfca5xf63b1p', 'p5154ceeef7d836777fu0958fd2a94e928x', 10, '000466875507115699', '1', '2021-03-17 01:44:17', 0, '2021-03-17'),
('w4520475ch1dd0a95c3758867d2236760cr', 'admin', 1, '001167521817809810', '', '2021-03-21 18:32:56', 0, '2021-03-21'),
('w80da8305ddb41cbeda95c08f29295795rs', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 10, '000466875507115699', '1', '2021-03-17 00:59:41', 0, '2021-03-17'),
('w8871je84b6c51cdaf32c95fa2b633f419a', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 7, '001167521817809810', '1', '2021-03-21 16:20:30', 0, '2021-03-21'),
('w8b524d848ck57e8b2b413c5b9d1441163o', 'admin', 1, '001167521817809810', '', '2021-03-25 20:44:48', 0, '2021-03-25'),
('x2780f88ec25410f1aed8ao1979c28d275k', 'admin', 1, '001167521817809810', '', '2021-03-21 20:09:34', 0, '2021-03-21'),
('xec4d868ad4029e7d5609b943n58bda2b9l', 'c21d53933fd0519bbcb16784521m18b2dfd', 30, '001167521817809810', '2', '2021-03-28 14:23:36', 10, '2021-03-28'),
('y6d17896a5e6b45fd6b760fcf73fa7eud3v', 'admin', 5, '001167521817809810', '', '2021-03-21 16:21:55', 0, '2021-03-21'),
('y8f09fd6b825fc3623a51ej11cab036d88g', 'admin', 1, '001167521817809810', '', '2021-03-21 19:37:32', 0, '2021-03-21'),
('y9915d2ced268365b0d7232644d5297hc1j', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, '001167521817809810', '1', '2021-03-21 20:34:22', 0, '2021-03-21'),
('yb8b6f2v9cedf2c092c967c7ad9fe46ca4m', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 80, '000466875507115699', '1', '2021-03-17 01:45:04', 0, '2021-03-17'),
('z0o1e88fcb4695500f21ca973218a10ddeg', 'admin', 1, '001167521817809810', '', '2021-03-21 19:41:07', 0, '2021-03-21'),
('z6884700c2ff56ce19689c287220120c58v', 'admin', 1, '001167521817809810', '', '2021-03-21 18:43:55', 0, '2021-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_image` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `date_action` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_category`
--

CREATE TABLE `image_category` (
  `id_catagory` int(11) NOT NULL,
  `name_catagory` varchar(100) NOT NULL,
  `name_catagory_en` varchar(100) NOT NULL,
  `date_catagory` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `link_page`
--

CREATE TABLE `link_page` (
  `id_link` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `table` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ip_cashier` text DEFAULT NULL,
  `print_cashier` text DEFAULT NULL,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='แคสเชียร์';

--
-- Dumping data for table `mod_cashier`
--

INSERT INTO `mod_cashier` (`id_cashier`, `forename`, `surename`, `id_card`, `license_number`, `email`, `telephone`, `secondary_email`, `status`, `ticket_amount`, `ticket_expire`, `create_id`, `create_datetime`, `update_id`, `update_datetime`, `ip_cashier`, `print_cashier`, `delete_datetime`) VALUES
('i80a7f3248fbf2f90515db8f84745ed9o0c', 'max', 'suwan', '1111111111111', '', '111@hot.com', '111-1111-111', NULL, 2, NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-20 16:44:48.000000', 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-03-11 02:56:56.000000', '192.168.1.103', 'XP-58-111', NULL),
('u94361f75d15c4950912039cfdd54ab78rf', '3333', '3333', '3333333333333', '', '3333@333.com', '333-3333-333', NULL, 2, NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-17 16:37:37.000000', 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-03-28 14:40:24.000000', '192.168.1.117', 'Shop01', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `mod_contact`
--

CREATE TABLE `mod_contact` (
  `id_mail` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `send_datetime` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `mod_employee`
--

CREATE TABLE `mod_employee` (
  `id_employee` varchar(35) NOT NULL,
  `username` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username_en` varchar(100) NOT NULL,
  `surname_en` varchar(100) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `position` varchar(100) NOT NULL,
  `position_en` varchar(100) NOT NULL,
  `code_id` varchar(13) NOT NULL,
  `detail_employee` text NOT NULL,
  `detail_employee_en` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_state` varchar(100) NOT NULL,
  `user_district` varchar(100) NOT NULL,
  `detail_city` varchar(200) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `id_branch` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `amphures` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_employee`
--

INSERT INTO `mod_employee` (`id_employee`, `username`, `surname`, `username_en`, `surname_en`, `birthday`, `position`, `position_en`, `code_id`, `detail_employee`, `detail_employee_en`, `email`, `user_city`, `user_state`, `user_district`, `detail_city`, `tel`, `id_branch`, `address`, `district`, `amphures`, `province`, `zip_code`) VALUES
('hd4cff774d6516542n451ce4dbd75c3513o', 'Natapatr', 'Suwanthanee', '', '', '1993-11-01', 'admin', '', '1309900973106', 'admin จัดๆ', '', 'tike.natthpol@gmail.com', '', '', '', '', '0873580651', '', '', '', '', '', ''),
('r5ddf3e2505ad307ce509d1c8bb77f3662u', 'test', 'test', '', '', '2021-02-10', 'test', '', '1234589532164', 'test', '', 'test@gmail.com', '', '', '', '', '0846054014', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mod_employee_image`
--

CREATE TABLE `mod_employee_image` (
  `id_image` int(11) NOT NULL,
  `name_image` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `date_image` datetime NOT NULL,
  `id_employee` varchar(35) NOT NULL,
  `directory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mod_sales_store`
--

CREATE TABLE `mod_sales_store` (
  `sales_store_id` varchar(35) NOT NULL,
  `sales_store_shop` int(35) NOT NULL,
  `sales_store_percent` int(35) NOT NULL,
  `sales_store_total` int(35) NOT NULL,
  `date_action` date NOT NULL,
  `id_customer` varchar(35) NOT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mod_sales_store`
--

INSERT INTO `mod_sales_store` (`sales_store_id`, `sales_store_shop`, `sales_store_percent`, `sales_store_total`, `date_action`, `id_customer`, `create_id`, `create_datetime`) VALUES
('c4f04fc6f80d5d37cddb238cwc38e66a9fo', 0, 0, 0, '2021-03-31', 'macd544f079e5c307a8ec8dcd62e51b27dk', 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-03-31 15:02:51');

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

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_perm` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_perm`, `name`, `del_flg`) VALUES
(1, 'Create', 0),
(2, 'View', 0),
(3, 'Update', 0),
(4, 'Delete', 0),
(5, 'Download', 0),
(6, 'Upload', 0),
(7, 'Print', 0),
(8, 'Approval', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id_property` int(11) NOT NULL,
  `name_th` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_th` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` varchar(35) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name`, `tag`, `update_datetime`, `delete_datetime`) VALUES
('o08f223d416f41274a85b5cc7f9bc6l777m', 'Back Office', 'mod_employee', '2021-02-12 22:30:40', NULL),
('tecc7b75da4a064e697280w10c55d043cby', 'ร้านค้า', 'mod_customer', '2021-02-12 22:28:17', NULL),
('vbjc0debfdecb8a769aa1d9d5fdcaca5dch', 'แคชเชียร์', 'mod_cashier', '2021-02-12 22:30:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id_role_perm` int(11) NOT NULL,
  `id_role` varchar(35) NOT NULL,
  `id_system` int(11) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text DEFAULT NULL,
  `updated_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `updated_datetime`) VALUES
(1, 'telephon', '081-919-0276', NULL),
(2, 'email', 'Unofence@gmail.com', '2021-03-31 12:25:41'),
(3, 'address', '40 Street Thailand', NULL),
(4, 'logo_img', '../../uploads/2021/logo/logo-2202217476.png', '2021-02-22 06:37:25'),
(5, 'scores_CE', '85', '2020-02-27 01:44:15'),
(6, 'veterinary_council', '1', '2020-02-27 01:44:15'),
(7, 'partner', '1', '2020-02-27 01:44:15'),
(8, 'lecturer', '2', '2020-02-27 01:44:15'),
(9, 'longitude', '', '2020-02-27 01:44:15'),
(10, 'latitude', '', '2020-02-27 01:44:15'),
(11, 'keyworde_en', 'Unofence, the manufacturer and distributor of Korat prefabricated steel fence products Finished balcony railing Finished railing Finished door Baked iron fence Colored iron fence with arrowhead Baked iron fence, buried in the ground Metal sheet fence Welded Mesh Fence Straight balcony railing Curved balcony railing Color slide baking door Curved slide door Double slide door Color swing oven door Baked door Finished door frame Painted steel pool fence Steel fence panels Unofence', '2021-03-31 12:25:41'),
(12, 'description_en', 'Unofence, the manufacturer and distributor of Korat prefabricated steel fence products Finished balcony railing Finished railing Finished door Baked iron fence Colored iron fence with arrowhead Baked iron fence, buried in the ground Metal sheet fence Welded Mesh Fence Straight balcony railing Curved balcony railing Color slide baking door Curved slide door Double slide door Color swing oven door Baked door Finished door frame Painted steel pool fence Steel fence panels Unofence', '2021-03-31 12:25:41'),
(13, 'title_en', 'Unofence | manufacturer and distributor Prefabricated steel fence Finished balcony railing Finished railing Finished door', '2021-03-31 12:25:41'),
(14, 'address_en', 'Head office: 737 Sport Klang Road, Nai Mueang Subdistrict, Mueang District, Nakhon Ratchasima Province 30000', '2021-03-31 12:25:41'),
(15, 'name_en', 'Unofence', '2021-03-31 12:25:41'),
(16, 'email', 'Unofence@gmail.com', '2021-03-31 12:25:41'),
(17, 'keyworde_th', 'ระบบศูนย์อาหาร สโมสร กก. ตชด 22', '2021-03-31 12:25:41'),
(18, 'description_th', 'ระบบศูนย์อาหาร สโมสร กก. ตชด 22', '2021-03-31 12:25:41'),
(19, 'title_th', 'ระบบศูนย์อาหาร  สโมสร กก. ตชด 22', '2021-03-31 12:25:41'),
(20, 'address_th', '737 ถ.กีฬากลาง ต.ในเมือง อ.เมือง จ.นครราชสีมา 30000', '2021-03-31 12:25:41'),
(21, 'name_th', 'สโมสร กก. ตชด. 22', '2021-03-31 12:25:41'),
(22, 'name_th', 'สโมสร กก. ตชด. 22', '2021-03-31 12:25:41'),
(23, 'tax_id', '1245345678945', '2020-01-23 09:27:04'),
(24, 'telephone', '0996261408', '2021-03-31 12:25:41'),
(25, 'random_banner', '0', '2021-03-31 12:25:41'),
(26, 'head_title', 'ระบบศูนย์อาหาร  สโมสร กก. ตชด 22', '2021-03-31 12:25:41'),
(27, 'head_title_mini', 'สโมสร กก. ตชด 22', '2021-03-31 12:25:41'),
(28, 'merchantid', '', '2020-02-27 01:44:15'),
(29, 'google_map_key', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7707.91046959502!2d102.107902!3d14.99519!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d7dab9510666d4d!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4l-C4teC5gOC4reC5h-C4meC5gOC4reC4qiDguYHguIHguKPguJnguJTguYwg4LiU4Li14LmE4LiL4LiZ4LmMIOC4iOC4s-C4geC4seC4lA!5e0!3m2!1sth!2sth!4v1602571637912!5m2!1sth!2sth', '2021-03-31 12:25:41'),
(30, 'time_open_f', '90', NULL),
(31, 'email2', '', '2021-01-25 07:02:11'),
(32, 'telephone2', '0812822424', '2021-03-31 12:25:41'),
(33, 'detail_th', '&lt;p&gt;ระบบศูนย์อาหาร สโมสร กก. ตชด 22&lt;/p&gt;', '2021-03-31 12:25:41'),
(34, 'detail_en', '&lt;p&gt;Committed to improving quality and service In order for our customers to get products with modern design, beautiful, durable, reasonable price according to the Modern Zen philosophy, we aim for long-term success with our quality team.We are ready to serve everyone with speed, courteousness.&lt;/p&gt;', '2021-03-31 12:25:41'),
(35, 'logo_img2', '../../uploads/2021/logo/logo-3103212955.jpg', '2021-03-31 12:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `name_slide` varchar(100) NOT NULL,
  `name_slide_en` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `text_en` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slide_image`
--

CREATE TABLE `slide_image` (
  `id_image` int(11) NOT NULL,
  `name_image` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_slide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id_system` int(11) NOT NULL,
  `name_system` varchar(100) NOT NULL,
  `name_system_en` varchar(100) NOT NULL,
  `link_system` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `groups` int(11) NOT NULL,
  `sort` double NOT NULL,
  `level` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id_system`, `name_system`, `name_system_en`, `link_system`, `type`, `groups`, `sort`, `level`, `icon`, `create_date`, `update_date`) VALUES
(1, 'ข้อมูลส่วนกลาง', '', 'mod_central_information/front_manage.php', 2, 0, 0, 1, '', '2021-02-07', '2021-02-07'),
(2, 'จัดการพนักงาน', '', 'mod_employee/front-manage.php', 1, 0, 0, 1, '', '2021-02-07', '2021-02-07'),
(4, 'จัดการสิทธิ์การใช้งาน', '', 'mod_permission/front-manage.php', 1, 0, 0, 1, '', '2021-02-12', '2021-02-12'),
(5, 'จัดการกลุ่มผู้ใช้งาน', '', 'mod_role/front-manage.php', 1, 0, 0, 1, '', '2021-02-12', '2021-02-12'),
(6, 'ร้านค้า', '', 'mod_customer/front_manage.php', 1, 0, 0, 1, '', '2021-02-12', '2021-02-12'),
(7, 'แคชเชียร์', '', 'mod_cashier/front_manage.php', 1, 0, 0, 1, '', '2021-02-13', '2021-02-13'),
(9, 'เพิ่ม Cashier', '', 'mod_cashier_add/front_manage.php', 1, 0, 0, 1, '', '2021-02-17', '2021-02-17'),
(11, 'คืนบัตร', '', 'mod_cashier/return_card.php', 1, 0, 0, 1, '', '2021-02-17', '2021-02-17'),
(14, 'จัดการบัตร', '', 'mod_card/front_manage.php', 1, 0, 0, 1, '', '2021-03-14', '2021-03-14'),
(16, 'สรุปข้อมูลทางการเงิน', '', 'mod_cashier/summary.php', 1, 0, 0, 1, '', '2021-03-16', '2021-03-16'),
(17, 'ประวัติร้านค้า', '', 'mod_cashier_history/front_manage.php', 1, 0, 0, 1, '', '2021-03-25', '2021-03-25'),
(18, 'ซื้อบัตร / เติมเงิน', '', 'mod_cashier/front_manage.php', 1, 0, 0, 1, '', '2021-03-26', '2021-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(35) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `id_role` varchar(35) NOT NULL DEFAULT '',
  `create_datetime` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `passwd_changed` datetime DEFAULT NULL,
  `update_datetime` datetime NOT NULL,
  `delete_datetime` datetime DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Admin',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 2 = Registered, 3 = Lock',
  `token` varchar(255) DEFAULT NULL,
  `id_data_role` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_password`, `user_email`, `id_role`, `create_datetime`, `last_login`, `last_logout`, `passwd_changed`, `update_datetime`, `delete_datetime`, `admin`, `status`, `token`, `id_data_role`) VALUES
('j36316de91a255403f6e7d768c443dcb70m', '1111', '$2y$10$PKGrvTqxgx68EviJfTUCV.2ii6y5DMviPNVR0Ub7ju6LmermJS91S', NULL, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', '2021-02-12 23:28:35', '2021-03-28 00:59:31', '2021-03-28 00:59:36', NULL, '0000-00-00 00:00:00', NULL, 0, 1, 'aea9023ca9affc0b2113bf449664102b', 'p5154ceeef7d836777fu0958fd2a94e928x'),
('ovbae7c0bc4025eb0b82f0734f1d2de3b0j', '5555', '$2y$10$ORDVnozsiwaNTzbEr1AMRuaaZttXbcrWnlK19.bPF75.tvjMIUPpm', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-03-11 02:31:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 0, 1, '', 'j4f687f2ed060dc2f96fd2kc92c73ce40eq'),
('q02bfd06ffs5f0819ec30a4fe572b67a73c', 'supadmin', '$2y$10$s6CqhypM9oPT6aDuHiITueWvm6P06oRsdHaHKiPhtob5FOQdlhgpy', NULL, 'o08f223d416f41274a85b5cc7f9bc6l777m', '2019-11-23 16:44:32', '2021-03-31 19:25:33', '2021-03-31 19:26:14', NULL, '0000-00-00 00:00:00', NULL, 1, 1, '80f15cad4877e3b75869250fd3ae50a1', ''),
('r7ef62dwc60eadf66e213249d4f7817f6ep', 'test', '$2y$10$udT/6zAFGO4J6MdHPATxB.qDjHBbkwGmc16vD0EWpS6gZ4ViJQLMS', 'test@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-02-12 21:45:31', '2021-03-26 01:29:33', '2021-02-13 16:25:28', NULL, '2021-02-13 16:26:35', NULL, 0, 1, '55327edb50246cac20636be1af53c18d', 'r5ddf3e2505ad307ce509d1c8bb77f3662u'),
('w2f06a46d7df0cb103f4evdec59f2e9eaby', '333', '$2y$10$Xdf1fr9j2O5MtdKmL1USbetqjfFeT8mC1EVKnqAaF6k7l8PnTklm.', NULL, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', '2021-02-17 16:38:17', '2021-04-01 00:21:48', '2021-04-01 00:32:56', NULL, '0000-00-00 00:00:00', NULL, 0, 1, '90fa1f26c970e95f4584f3223af983f3', 'u94361f75d15c4950912039cfdd54ab78rf'),
('x2250d1337390f4ee4566f156fe83e6707k', 'maxnatapatr', '$2y$10$u2kCPXutUKL568m9SB7xfeWQ7AYoGCKZFlgdVkl548SU0eqA78B9m', 'tike.natthpol@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-02-12 17:34:21', '2021-04-01 00:33:11', '2021-04-01 00:21:44', NULL, '2021-02-12 21:42:55', NULL, 1, 1, 'b9da3980f30f91888044706ad19e1578', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('yad5fde00268j436112e3002741f15e72bm', '1234', '$2y$10$mjvZILe7Y/MTLYr36ALfK.F0V7gDGA2t7MmRyD61SkZ5ejlphhqiK', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-02-13 17:02:32', '2021-03-25 19:26:04', '2021-03-25 19:19:11', NULL, '0000-00-00 00:00:00', NULL, 0, 1, '8d333b5ab22b838b680f025797f304b1', 'c21d53933fd0519bbcb16784521m18b2dfd'),
('z5b526d463db4b6be52el320ccc5e32299v', 'tttt', '$2y$10$py24gQp9eW.L1OHrKe8rvOcUe8SDsvsb95lXGkUESib9BojxM6UsC', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-03-31 19:26:12', '2021-03-31 19:26:20', '2021-03-31 19:28:25', NULL, '0000-00-00 00:00:00', NULL, 0, 1, 'd70ba38d4d04348c2475b789a16ccf99', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id_address` int(11) NOT NULL,
  `id_user` varchar(35) NOT NULL COMMENT 'อ้างถึง id ของ customer,tutor,employee,partner',
  `tax_number` varchar(13) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `amphur` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `type` tinyint(1) DEFAULT 1 COMMENT '1 = ที่อยู่ออกบิล , 2 = ที่อยู่จัดส่ง',
  `status` tinyint(1) NOT NULL COMMENT ' 1=customer,2=tutor,3=employee,4=partner',
  `create_id` varchar(35) NOT NULL,
  `create_datetime` datetime(6) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL,
  `update_datetime` datetime(6) DEFAULT NULL,
  `delete_datetime` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ที่อยู่';

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id_image` int(11) NOT NULL,
  `id_user` varchar(35) DEFAULT NULL COMMENT 'อ้างถึง id ของ customer,tutor,employee',
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0 COMMENT '1 = actived',
  `type` tinyint(1) DEFAULT NULL COMMENT '1 = customer,2 = tutor, 3 = employee,4 = Parter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='รูปภาพ';

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id_image`, `id_user`, `name`, `size`, `date`, `directory`, `active`, `type`) VALUES
(32, 'p5154ceeef7d836777fu0958fd2a94e928x', '', 0, '2021-02-12 22:38:13', '../../uploads/2021/mod_customer/', 1, 1),
(33, 'c21d53933fd0519bbcb16784521m18b2dfd', '', 0, '2021-02-13 16:32:15', '../../uploads/2021/mod_customer/', 1, 1),
(34, 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', '', 0, '2021-02-17 16:35:21', '../../uploads/2021/mod_customer/', 1, 1),
(35, 'u94361f75d15c4950912039cfdd54ab78rf', '', 0, '2021-02-17 16:37:37', '../../uploads/2021/mod_cashier/', 1, 2),
(36, 'i80a7f3248fbf2f90515db8f84745ed9o0c', '', 0, '2021-02-20 16:44:48', '../../uploads/2021/mod_cashier/', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id_user_perm` int(11) NOT NULL,
  `id_system` int(11) NOT NULL,
  `permissions` text DEFAULT NULL,
  `id_user` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id_user_perm`, `id_system`, `permissions`, `id_user`) VALUES
(6, 2, '1, 2, 3, 4, 5, 6, 7, 8', 'x2250d1337390f4ee4566f156fe83e6707k'),
(7, 1, '1, 2, 3, 4, 5, 6, 7, 8', 'x2250d1337390f4ee4566f156fe83e6707k'),
(12, 2, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(13, 4, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(14, 5, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(15, 6, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(16, 7, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(17, 1, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(24, 6, '1, 2, 3, 4, 5, 6, 7, 8', 'ovbae7c0bc4025eb0b82f0734f1d2de3b0j'),
(35, 11, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(36, 16, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(37, 17, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(38, 18, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(41, 9, '1, 2, 3, 4, 5, 6, 7, 8', 'r7ef62dwc60eadf66e213249d4f7817f6ep'),
(42, 14, '1, 2, 3, 4, 5, 6, 7, 8', 'r7ef62dwc60eadf66e213249d4f7817f6ep'),
(43, 2, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(44, 4, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(45, 5, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(46, 6, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(47, 7, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(48, 9, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(49, 11, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(50, 14, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(51, 16, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(52, 17, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(53, 18, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v'),
(54, 1, '1, 2, 3, 4, 5, 6, 7, 8', 'z5b526d463db4b6be52el320ccc5e32299v');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id_user_role` int(11) NOT NULL,
  `id_user` varchar(35) NOT NULL,
  `id_role` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `contact_reply`
--
ALTER TABLE `contact_reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `data_working_card`
--
ALTER TABLE `data_working_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freedom_page`
--
ALTER TABLE `freedom_page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `froala_uploads`
--
ALTER TABLE `froala_uploads`
  ADD PRIMARY KEY (`id_uploads`);

--
-- Indexes for table `heading`
--
ALTER TABLE `heading`
  ADD PRIMARY KEY (`id_heading`),
  ADD UNIQUE KEY `tag_UNIQUE` (`tag`);

--
-- Indexes for table `history_payment_shop`
--
ALTER TABLE `history_payment_shop`
  ADD PRIMARY KEY (`id_history_pay`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `image_category`
--
ALTER TABLE `image_category`
  ADD PRIMARY KEY (`id_catagory`);

--
-- Indexes for table `link_page`
--
ALTER TABLE `link_page`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `mod_cashier`
--
ALTER TABLE `mod_cashier`
  ADD PRIMARY KEY (`id_cashier`);

--
-- Indexes for table `mod_cashier_sales_store`
--
ALTER TABLE `mod_cashier_sales_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_contact`
--
ALTER TABLE `mod_contact`
  ADD PRIMARY KEY (`id_mail`);

--
-- Indexes for table `mod_customer`
--
ALTER TABLE `mod_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `mod_employee`
--
ALTER TABLE `mod_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `mod_employee_image`
--
ALTER TABLE `mod_employee_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `mod_sales_store`
--
ALTER TABLE `mod_sales_store`
  ADD PRIMARY KEY (`sales_store_id`);

--
-- Indexes for table `percent_customer_history`
--
ALTER TABLE `percent_customer_history`
  ADD PRIMARY KEY (`percent_cus_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_perm`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id_property`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id_role_perm`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_settings_on_name` (`name`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `slide_image`
--
ALTER TABLE `slide_image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_slide` (`id_slide`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id_system`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id_address`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id_user_perm`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_reply`
--
ALTER TABLE `contact_reply`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freedom_page`
--
ALTER TABLE `freedom_page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `froala_uploads`
--
ALTER TABLE `froala_uploads`
  MODIFY `id_uploads` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `heading`
--
ALTER TABLE `heading`
  MODIFY `id_heading` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_category`
--
ALTER TABLE `image_category`
  MODIFY `id_catagory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_page`
--
ALTER TABLE `link_page`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_contact`
--
ALTER TABLE `mod_contact`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_employee_image`
--
ALTER TABLE `mod_employee_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id_property` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id_role_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_image`
--
ALTER TABLE `slide_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id_system` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id_user_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
