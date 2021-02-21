-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 01:46 PM
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
  `number` int(7) NOT NULL,
  `card_number` varchar(15) NOT NULL,
  `img_card` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 = ใช้งานได้ ,0 = ระงับการใช้งาน',
  `amount` int(11) NOT NULL,
  `Issue_date` datetime NOT NULL,
  `id_employee` varchar(35) NOT NULL COMMENT 'ผู้ออกบัตร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `number`, `card_number`, `img_card`, `status`, `amount`, `Issue_date`, `id_employee`) VALUES
('h9b8e53b83a4m3bf69764c3573804b54dbs', 1, '640200018929850', '', 0, 720, '2021-02-19 14:42:47', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('o8523es53d97fbd5ca2d2ad8c99e0a0b80s', 3, '640200014260007', '', 0, 0, '2021-02-19 14:44:31', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('t1ddduf9815baea0cd3c053eb0ceb596a2j', 4, '640200015000733', '', 0, 0, '2021-02-20 12:20:49', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('x9fd82w50d7cc9f78c7b82fae76d041334a', 2, '640200018346372', '', 0, 0, '2021-02-19 14:43:14', 'u94361f75d15c4950912039cfdd54ab78rf');

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
('a2abe58b1615aeba25fc2efu7dd610b6f4r', 10, 0, 0, '2021-02-20 14:14:31', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('a30f8539de0f6f06521edee7a0b8ed6fyfm', 10, 0, 0, '2021-02-20 14:11:08', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('a38332ey940807113e7e45cf8d5082b415t', 10, 0, 0, '2021-02-20 14:13:16', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('aac78dof0aaefce46ee80b61622f892fcav', 10, 0, 0, '2021-02-20 14:13:55', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('c8esb305a6f1b29e1606663cc75230759cy', 200, 1000, 0, '2021-02-20 13:46:00', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('ep58ba76aa3d1a5c69969af0a184432bc1s', 10, 0, 0, '2021-02-20 14:13:39', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('g851c35627d554aj22a701d55e43cdbe91g', 10, 0, 0, '2021-02-20 14:08:21', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('h6f77013eeef4d4dccabd424c16a8ba5a7u', 10, 0, 0, '2021-02-20 14:12:22', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('l1f22109c5fa6c3d2d5c340088826b93fep', 10, 0, 0, '2021-02-20 14:09:16', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('m78dcf6223735d74d27776d9b4819cb011p', 10, 0, 0, '2021-02-20 14:10:45', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('n0fe536eaaf620904a98f81112bf5ar303y', 200, 300, 0, '2021-02-20 16:30:58', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('tbbc79be2bcbef1fffdi28aeb866c076a3r', 5, 0, 0, '2021-02-20 14:03:16', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('v0b36b9b06c39f7ce4fa0f81038585r7e8e', 200, 0, 0, '2021-02-20 13:54:03', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('v6015464ye7010f086e1846e012e0e8a92i', 10, 0, 0, '2021-02-20 14:07:43', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('xa2fe6ab790a0062cc3ce67eac8111i139l', 2, 0, 0, '2021-02-20 14:01:10', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('yc7c192e1646125994b3317c052b0s2b43n', 3, 0, 0, '2021-02-20 14:02:46', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf'),
('z603e9de2c84bf867863ed33359b7369dap', 10, 0, 0, '2021-02-20 14:04:56', 'h9b8e53b83a4m3bf69764c3573804b54dbs', 'u94361f75d15c4950912039cfdd54ab78rf');

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
  `delete_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='แคสเชียร์';

--
-- Dumping data for table `mod_cashier`
--

INSERT INTO `mod_cashier` (`id_cashier`, `forename`, `surename`, `id_card`, `license_number`, `email`, `telephone`, `secondary_email`, `status`, `ticket_amount`, `ticket_expire`, `create_id`, `create_datetime`, `update_id`, `update_datetime`, `delete_datetime`) VALUES
('i80a7f3248fbf2f90515db8f84745ed9o0c', 'max', 'suwan', '1111111111111', '', '111@hot.com', '111-1111-111', NULL, 2, NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-20 16:44:48.000000', NULL, NULL, NULL),
('u94361f75d15c4950912039cfdd54ab78rf', '3333', '3333', '3333333333333', '', '3333@333.com', '333-3333-333', NULL, 2, NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-17 16:37:37.000000', NULL, NULL, NULL);

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
('c21d53933fd0519bbcb16784521m18b2dfd', 'hhhh', 'hhhh', '1232146546546', '__-____/____', 'pppp@hot.com', '', NULL, 2, NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-13 16:32:15.000000', NULL, NULL, NULL),
('n7c6e8b70f0ba30c5eba6e79e23ccd7978q', '2222', '2222', '1111111111111', '22-2222/2222', '222@222.com', '222-2222-222', NULL, 2, NULL, NULL, 'hd4cff774d6516542n451ce4dbd75c3513o', '2021-02-17 16:35:21.000000', NULL, NULL, NULL),
('p5154ceeef7d836777fu0958fd2a94e928x', 'ddd', 'ddddd', '1321465843654', '__-____/____', 'ttt@dfdfdf.com', '087-3580-651', NULL, 2, NULL, NULL, '', '2021-02-12 22:38:13.000000', NULL, NULL, NULL);

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
(2, 'email', 'Unofence@gmail.com', '2021-02-13 07:52:40'),
(3, 'address', '40 Street Thailand', NULL),
(4, 'logo_img', '../../uploads/2021/logo/logo-1202212934.png', '2021-02-12 16:18:08'),
(5, 'scores_CE', '85', '2020-02-27 01:44:15'),
(6, 'veterinary_council', '1', '2020-02-27 01:44:15'),
(7, 'partner', '1', '2020-02-27 01:44:15'),
(8, 'lecturer', '2', '2020-02-27 01:44:15'),
(9, 'longitude', '', '2020-02-27 01:44:15'),
(10, 'latitude', '', '2020-02-27 01:44:15'),
(11, 'keyworde_en', 'Unofence, the manufacturer and distributor of Korat prefabricated steel fence products Finished balcony railing Finished railing Finished door Baked iron fence Colored iron fence with arrowhead Baked iron fence, buried in the ground Metal sheet fence Welded Mesh Fence Straight balcony railing Curved balcony railing Color slide baking door Curved slide door Double slide door Color swing oven door Baked door Finished door frame Painted steel pool fence Steel fence panels Unofence', '2021-02-13 07:52:40'),
(12, 'description_en', 'Unofence, the manufacturer and distributor of Korat prefabricated steel fence products Finished balcony railing Finished railing Finished door Baked iron fence Colored iron fence with arrowhead Baked iron fence, buried in the ground Metal sheet fence Welded Mesh Fence Straight balcony railing Curved balcony railing Color slide baking door Curved slide door Double slide door Color swing oven door Baked door Finished door frame Painted steel pool fence Steel fence panels Unofence', '2021-02-13 07:52:40'),
(13, 'title_en', 'Unofence | manufacturer and distributor Prefabricated steel fence Finished balcony railing Finished railing Finished door', '2021-02-13 07:52:40'),
(14, 'address_en', 'Head office: 737 Sport Klang Road, Nai Mueang Subdistrict, Mueang District, Nakhon Ratchasima Province 30000', '2021-02-13 07:52:40'),
(15, 'name_en', 'Unofence', '2021-02-13 07:52:40'),
(16, 'email', 'Unofence@gmail.com', '2021-02-13 07:52:40'),
(17, 'keyworde_th', 'ระบบศูนย์อาหาร สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-02-13 07:52:40'),
(18, 'description_th', 'ระบบศูนย์อาหาร สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-02-13 07:52:40'),
(19, 'title_th', 'ระบบศูนย์อาหาร  สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-02-13 07:52:40'),
(20, 'address_th', 'สำนักงานใหญ่ : 737 ถ.กีฬากลาง ต.ในเมือง อ.เมือง จ.นครราชสีมา 30000', '2021-02-13 07:52:40'),
(21, 'name_th', 'สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-02-13 07:52:40'),
(22, 'name_th', 'สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-02-13 07:52:40'),
(23, 'tax_id', '1245345678945', '2020-01-23 09:27:04'),
(24, 'telephone', '0996261408', '2021-02-13 07:52:40'),
(25, 'random_banner', '0', '2021-02-13 07:52:40'),
(26, 'head_title', 'ระบบศูนย์อาหาร  สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22รั้วเหล็กสำเร็จรูป ราวระเบียงสำเร็จรูป ราวบันไดสำเร็จรูป ประตูสำเร็จรูป', '2021-02-13 07:52:40'),
(27, 'head_title_mini', 'สหกรณ์ออมทรัพย์', '2021-02-13 07:52:40'),
(28, 'merchantid', '', '2020-02-27 01:44:15'),
(29, 'google_map_key', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7707.91046959502!2d102.107902!3d14.99519!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d7dab9510666d4d!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4l-C4teC5gOC4reC5h-C4meC5gOC4reC4qiDguYHguIHguKPguJnguJTguYwg4LiU4Li14LmE4LiL4LiZ4LmMIOC4iOC4s-C4geC4seC4lA!5e0!3m2!1sth!2sth!4v1602571637912!5m2!1sth!2sth', '2021-02-13 07:52:40'),
(30, 'time_open_f', '90', NULL),
(31, 'email2', '', '2021-01-25 07:02:11'),
(32, 'telephone2', '0812822424', '2021-02-13 07:52:40'),
(33, 'detail_th', '&lt;p&gt;ระบบศูนย์อาหาร สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22&lt;/p&gt;', '2021-02-13 07:52:40'),
(34, 'detail_en', '&lt;p&gt;Committed to improving quality and service In order for our customers to get products with modern design, beautiful, durable, reasonable price according to the Modern Zen philosophy, we aim for long-term success with our quality team.We are ready to serve everyone with speed, courteousness.&lt;/p&gt;', '2021-02-13 07:52:40'),
(35, 'logo_img2', '../../uploads/2021/logo/logo-0202214606.png', '2021-02-02 04:03:51');

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
(10, 'ซื้อบัตร / เติมเงิน', '', 'mod_cashier/buy_card.php', 1, 0, 0, 1, '', '2021-02-17', '2021-02-17'),
(11, 'คืนบัตร', '', 'mod_cashier/return_card.php', 1, 0, 0, 1, '', '2021-02-17', '2021-02-17'),
(13, 'จัดการบัตร', '', 'mod_employee/add_card.php', 1, 0, 0, 1, '', '2021-02-20', '2021-02-20');

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
('j36316de91a255403f6e7d768c443dcb70m', '1111', '$2y$10$PKGrvTqxgx68EviJfTUCV.2ii6y5DMviPNVR0Ub7ju6LmermJS91S', NULL, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', '2021-02-12 23:28:35', '2021-02-18 20:00:55', '2021-02-17 16:51:56', NULL, '0000-00-00 00:00:00', NULL, 0, 1, 'e92c950ff223b0c79865a752e658fc01', 'p5154ceeef7d836777fu0958fd2a94e928x'),
('q02bfd06ffs5f0819ec30a4fe572b67a73c', 'supadmin', '$2y$10$s6CqhypM9oPT6aDuHiITueWvm6P06oRsdHaHKiPhtob5FOQdlhgpy', NULL, 'o08f223d416f41274a85b5cc7f9bc6l777m', '2019-11-23 16:44:32', '2021-02-17 18:33:20', '2021-02-17 18:42:26', NULL, '0000-00-00 00:00:00', NULL, 1, 1, 'c9c7c34c26ada581410e6bc7530ad75f', ''),
('r7ef62dwc60eadf66e213249d4f7817f6ep', 'test', '$2y$10$NlIRsit.XkvMo/wY9CD6ROr4ay9WiVmWJaAIzXyyd7bHUQkDoeOxi', 'test@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-02-12 21:45:31', '2021-02-13 16:25:13', '2021-02-13 16:25:28', NULL, '2021-02-13 16:26:35', NULL, 0, 1, 'bb028487ee9957b74d96234597adea6a', 'r5ddf3e2505ad307ce509d1c8bb77f3662u'),
('w2f06a46d7df0cb103f4evdec59f2e9eaby', '333', '$2y$10$Xdf1fr9j2O5MtdKmL1USbetqjfFeT8mC1EVKnqAaF6k7l8PnTklm.', NULL, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', '2021-02-17 16:38:17', '2021-02-20 18:10:05', '2021-02-20 18:22:39', NULL, '0000-00-00 00:00:00', NULL, 0, 1, 'ede5b3812ea2d2ce7972f13d5d446909', 'u94361f75d15c4950912039cfdd54ab78rf'),
('x2250d1337390f4ee4566f156fe83e6707k', 'maxnatapatr', '$2y$10$u2kCPXutUKL568m9SB7xfeWQ7AYoGCKZFlgdVkl548SU0eqA78B9m', 'tike.natthpol@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-02-12 17:34:21', '2021-02-20 16:33:05', '2021-02-20 16:45:29', NULL, '2021-02-12 21:42:55', NULL, 1, 1, 'b90caf38199188707199d9347a1785c4', 'hd4cff774d6516542n451ce4dbd75c3513o'),
('yad5fde00268j436112e3002741f15e72bm', '1234', '$2y$10$mjvZILe7Y/MTLYr36ALfK.F0V7gDGA2t7MmRyD61SkZ5ejlphhqiK', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-02-13 17:02:32', '2021-02-13 17:02:41', '2021-02-13 17:05:04', NULL, '0000-00-00 00:00:00', NULL, 0, 1, '1c3fddcd713f7dfcaff621d4ced6c894', 'c21d53933fd0519bbcb16784521m18b2dfd');

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
(11, 7, '1, 2, 3, 4, 5, 6, 7, 8', 'r7ef62dwc60eadf66e213249d4f7817f6ep'),
(12, 2, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(13, 4, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(14, 5, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(15, 6, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(16, 7, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(17, 1, '1, 2, 3, 4, 5, 6, 7, 8', 'yad5fde00268j436112e3002741f15e72bm'),
(21, 10, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(22, 11, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(23, 12, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby');

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
  MODIFY `id_system` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id_user_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
