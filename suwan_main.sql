-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 09:56 PM
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
('l6cb5591de6ce759942x749b3bb729ffc0l', 'ทองดี', 'มีสุข', '0000000000000', '', 'test@gmail.com', '000-0000-000', NULL, 2, NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 02:54:15.000000', NULL, NULL, NULL);

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
('b0641f4e53a5a390104ec2d4ee31dr08b3l', 'Shop05', '', '5555555555555', '5555@gmail.com', '555-555-5555', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:16:47.000000', 'admin', '2021-04-01 02:34:15.000000', '192.168.1.45', 'Shop05', 0, NULL),
('e91134133c6eedabfk63063cffd6363f8bu', 'Shop01', '', '1111111111111', '1111@gmail.com', '111-111-1111', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:14:53.000000', 'admin', '2021-04-01 02:34:10.000000', '192.168.1.41', 'Shop01', 0, NULL),
('el7c05cfe5c562887817201caf8b34440di', 'Shop06', '', '6666666666666', '6666@gmail.com', '666-666-6666', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:17:07.000000', 'admin', '2021-04-01 02:34:16.000000', '192.168.1.46', 'Shop06', 0, NULL),
('g0a042835aefc5f7b4ae33ede6j30ba87cw', 'Shop03', '', '3333333333333', '3333@gmail.com', '333-333-3333', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:15:39.000000', 'admin', '2021-04-01 02:34:13.000000', '192.168.1.43', 'Shop03', 0, NULL),
('lb89b01ac028f7331b7dc97f1c3z17267ct', 'Shop07', '', '7777777777777', '7777@gmail.com', '777-777-7777', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:17:27.000000', 'admin', '2021-04-01 02:34:18.000000', '192.168.1.47', 'Shop07', 0, NULL),
('lt75f06e4896b4e641dcdaf45b954a7ae2h', 'Shop04', '', '4444444444444', '4444@gmail.com', '444-444-4444', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:16:25.000000', 'admin', '2021-04-01 02:34:14.000000', '192.168.1.44', 'Shop04', 0, NULL),
('vda8fda29bc5f349eb28df867sce70df1an', 'Shop02', '', '2222222222222', '2222@gmail.com', '222-222-2222', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:15:17.000000', 'admin', '2021-04-01 02:34:12.000000', '192.168.1.42', 'Shop02', 0, NULL),
('vdb8bee2cec911dad6c875a0632b507e1fn', 'Shop08', '', '8888888888888', '8888@gmail.com', '888-888-8888', NULL, 3, '1', NULL, NULL, 'x952ef7b81d11232f4d65ab4e0a761oe1cz', '2021-04-01 01:17:43.000000', 'admin', '2021-04-01 02:34:19.000000', '192.168.1.48', 'Shop08', 0, NULL);

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
('x952ef7b81d11232f4d65ab4e0a761oe1cz', 'Admin', 'admin', '', '', '2021-04-01', 'Admin', '', '0000000000000', '', '', 'admin@gmail.com', '', '', '', '', '0000000000', '', '', '', '', '', '');

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

--
-- Dumping data for table `mod_employee_image`
--

INSERT INTO `mod_employee_image` (`id_image`, `name_image`, `size`, `date_image`, `id_employee`, `directory`) VALUES
(1, 'EM-0104211713.png', '197652', '2021-04-01 01:13:22', 'x952ef7b81d11232f4d65ab4e0a761oe1cz', 'uploads/2021/employee/');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` varchar(35) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `name_product_en` varchar(100) DEFAULT NULL,
  `product_code` varchar(35) NOT NULL,
  `detail_product` text DEFAULT NULL,
  `detail_product_en` text DEFAULT NULL,
  `date_add` datetime NOT NULL,
  `date_edit` datetime DEFAULT NULL,
  `id_customer` varchar(35) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 1 COMMENT 'จะให้แสดงสินค้านั้นหรือไม่',
  `delete_datetime` datetime DEFAULT NULL,
  `create_id` varchar(35) NOT NULL,
  `update_id` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `name_product_en`, `product_code`, `detail_product`, `detail_product_en`, `date_add`, `date_edit`, `id_customer`, `view`, `delete_datetime`, `create_id`, `update_id`) VALUES
('1234', 'test test', 'tesst ', '', NULL, NULL, '2021-02-22 00:30:57', NULL, 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q', 1, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_catagory`
--

CREATE TABLE `product_catagory` (
  `id_catagory` int(11) NOT NULL,
  `name_catagory_th` varchar(100) NOT NULL,
  `name_catagory_en` varchar(100) NOT NULL,
  `description_th` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
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

INSERT INTO `product_catagory` (`id_catagory`, `name_catagory_th`, `name_catagory_en`, `description_th`, `description_en`, `create_datetime`, `group_sub`, `icon`, `image`, `level`, `order`, `create_id`, `delete_datetime`, `update_datetime`) VALUES
(1, 'สินค้า', '', '', '', '2021-02-21 20:39:18', '', '', '', 1, 1, '', NULL, '2021-03-29 00:18:39'),
(2, 'บริการ', '', '', '', '2021-02-21 20:39:51', '', '', '', 1, 2, '', NULL, '2021-02-21 20:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id_image` varchar(35) NOT NULL,
  `name_image` varchar(100) NOT NULL,
  `size_image` int(11) NOT NULL,
  `date_image` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL DEFAULT '1',
  `id_product` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id_image`, `name_image`, `size_image`, `date_image`, `active`, `id_product`) VALUES
('123', 'EM-2601211657.png', 0, '../../uploads/2021/employee/', '1', 'n7c6e8b70f0ba30c5eba6e79e23ccd7978q');

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
('o08f223d416f41274a85b5cc7f9bc6l777m', 'Back Office', 'mod_employee', '2021-04-01 02:51:53', NULL),
('tecc7b75da4a064e697280w10c55d043cby', 'ร้านค้า', 'mod_customer', '2021-04-01 01:02:48', NULL),
('vbjc0debfdecb8a769aa1d9d5fdcaca5dch', 'แคชเชียร์', 'mod_cashier', '2021-04-01 01:03:16', NULL);

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

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id_role_perm`, `id_role`, `id_system`, `permissions`) VALUES
(169, 'tecc7b75da4a064e697280w10c55d043cby', 19, '1, 2, 3, 4, 5, 6, 7, 8'),
(170, 'tecc7b75da4a064e697280w10c55d043cby', 20, '1, 2, 3, 4, 5, 6, 7, 8'),
(171, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', 21, '1, 2, 3, 4, 5, 6, 7, 8'),
(172, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', 22, '1, 2, 3, 4, 5, 6, 7, 8'),
(173, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', 23, '1, 2, 3, 4, 5, 6, 7, 8'),
(174, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', 24, '1, 2, 3, 4, 5, 6, 7, 8'),
(175, 'o08f223d416f41274a85b5cc7f9bc6l777m', 25, '1, 2, 3, 4, 5, 6, 7, 8'),
(176, 'o08f223d416f41274a85b5cc7f9bc6l777m', 26, '1, 2, 3, 4, 5, 6, 7, 8'),
(177, 'o08f223d416f41274a85b5cc7f9bc6l777m', 28, '1, 2, 3, 4, 5, 6, 7, 8'),
(178, 'o08f223d416f41274a85b5cc7f9bc6l777m', 29, '1, 2, 3, 4, 5, 6, 7, 8'),
(179, 'o08f223d416f41274a85b5cc7f9bc6l777m', 30, '1, 2, 3, 4, 5, 6, 7, 8'),
(180, 'o08f223d416f41274a85b5cc7f9bc6l777m', 33, '1, 2, 3, 4, 5, 6, 7, 8'),
(181, 'o08f223d416f41274a85b5cc7f9bc6l777m', 34, '1, 2, 3, 4, 5, 6, 7, 8'),
(182, 'o08f223d416f41274a85b5cc7f9bc6l777m', 35, '1, 2, 3, 4, 5, 6, 7, 8'),
(183, 'o08f223d416f41274a85b5cc7f9bc6l777m', 36, '1, 2, 3, 4, 5, 6, 7, 8'),
(184, 'o08f223d416f41274a85b5cc7f9bc6l777m', 37, '1, 2, 3, 4, 5, 6, 7, 8'),
(185, 'o08f223d416f41274a85b5cc7f9bc6l777m', 32, '1, 2, 3, 4, 5, 6, 7, 8');

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
(2, 'email', 'Unofence@gmail.com', '2021-03-31 17:07:29'),
(3, 'address', '40 Street Thailand', NULL),
(4, 'logo_img', '../../uploads/2021/logo/logo-0104214682.png', '2021-03-31 17:07:29'),
(5, 'scores_CE', '85', '2020-02-27 01:44:15'),
(6, 'veterinary_council', '1', '2020-02-27 01:44:15'),
(7, 'partner', '1', '2020-02-27 01:44:15'),
(8, 'lecturer', '2', '2020-02-27 01:44:15'),
(9, 'longitude', '', '2020-02-27 01:44:15'),
(10, 'latitude', '', '2020-02-27 01:44:15'),
(11, 'keyworde_en', 'Unofence, the manufacturer and distributor of Korat prefabricated steel fence products Finished balcony railing Finished railing Finished door Baked iron fence Colored iron fence with arrowhead Baked iron fence, buried in the ground Metal sheet fence Welded Mesh Fence Straight balcony railing Curved balcony railing Color slide baking door Curved slide door Double slide door Color swing oven door Baked door Finished door frame Painted steel pool fence Steel fence panels Unofence', '2021-03-31 17:07:29'),
(12, 'description_en', 'Unofence, the manufacturer and distributor of Korat prefabricated steel fence products Finished balcony railing Finished railing Finished door Baked iron fence Colored iron fence with arrowhead Baked iron fence, buried in the ground Metal sheet fence Welded Mesh Fence Straight balcony railing Curved balcony railing Color slide baking door Curved slide door Double slide door Color swing oven door Baked door Finished door frame Painted steel pool fence Steel fence panels Unofence', '2021-03-31 17:07:29'),
(13, 'title_en', 'Unofence | manufacturer and distributor Prefabricated steel fence Finished balcony railing Finished railing Finished door', '2021-03-31 17:07:29'),
(14, 'address_en', 'Head office: 737 Sport Klang Road, Nai Mueang Subdistrict, Mueang District, Nakhon Ratchasima Province 30000', '2021-03-31 17:07:29'),
(15, 'name_en', 'Unofence', '2021-03-31 17:07:29'),
(16, 'email', 'Unofence@gmail.com', '2021-03-31 17:07:29'),
(17, 'keyworde_th', 'ระบบศูนย์อาหาร สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-03-31 17:07:29'),
(18, 'description_th', 'ระบบศูนย์อาหาร สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-03-31 17:07:29'),
(19, 'title_th', 'ระบบศูนย์อาหาร  สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22', '2021-03-31 17:07:29'),
(20, 'address_th', '737 ถ.กีฬากลาง ต.ในเมือง อ.เมือง จ.นครราชสีมา 30000', '2021-03-31 17:07:29'),
(21, 'name_th', 'สโมสร กก. ตชด. 22', '2021-03-31 17:07:29'),
(22, 'name_th', 'สโมสร กก. ตชด. 22', '2021-03-31 17:07:29'),
(23, 'tax_id', '1245345678945', '2020-01-23 09:27:04'),
(24, 'telephone', '0996261408', '2021-03-31 17:07:29'),
(25, 'random_banner', '0', '2021-03-31 17:07:29'),
(26, 'head_title', 'ระบบศูนย์อาหาร  สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22รั้วเหล็กสำเร็จรูป ราวระเบียงสำเร็จรูป ราวบันไดสำเร็จรูป ประตูสำเร็จรูป', '2021-03-31 17:07:29'),
(27, 'head_title_mini', 'สโมสร กก. ตชด. 22', '2021-03-31 17:07:29'),
(28, 'merchantid', '', '2020-02-27 01:44:15'),
(29, 'google_map_key', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7707.91046959502!2d102.107902!3d14.99519!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d7dab9510666d4d!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4l-C4teC5gOC4reC5h-C4meC5gOC4reC4qiDguYHguIHguKPguJnguJTguYwg4LiU4Li14LmE4LiL4LiZ4LmMIOC4iOC4s-C4geC4seC4lA!5e0!3m2!1sth!2sth!4v1602571637912!5m2!1sth!2sth', '2021-03-31 17:07:29'),
(30, 'time_open_f', '90', NULL),
(31, 'email2', '', '2021-01-25 07:02:11'),
(32, 'telephone2', '0812822424', '2021-03-31 17:07:29'),
(33, 'detail_th', '&lt;p&gt;ระบบศูนย์อาหาร สหกรณ์ออมทรัพย์ตำรวจตระเวนชายแดนที่ 22&lt;/p&gt;', '2021-03-31 17:07:29'),
(34, 'detail_en', '&lt;p&gt;Committed to improving quality and service In order for our customers to get products with modern design, beautiful, durable, reasonable price according to the Modern Zen philosophy, we aim for long-term success with our quality team.We are ready to serve everyone with speed, courteousness.&lt;/p&gt;', '2021-03-31 17:07:29'),
(35, 'logo_img2', '../../uploads/2021/logo/logo-3103218293.jpg', '2021-03-31 13:05:12');

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
(19, 'ชำระเงิน', '', 'mod_shopmenu/front_manage.php', 1, 0, 1, 1, '<i class=\"mdi mdi-food-fork-drink\"></i>', '2021-04-01', '2021-04-01'),
(20, 'ประวัติการชำระเงิน', '', 'mod_shophistory/front_manage.php', 1, 0, 2, 1, '<i class=\"fas fa-history\"></i>', '2021-04-01', '2021-04-01'),
(21, 'ซื้อบัตร / เติมเงิน', '', 'mod_cashier/front_manage.php', 1, 0, 3, 1, '<i class=\"mdi mdi-credit-card-plus\"></i>', '2021-04-01', '2021-04-01'),
(22, 'คืนบัตร', '', 'mod_cashier/return_card.php', 1, 0, 4, 1, '<i class=\"mdi mdi-credit-card-off\"></i>', '2021-04-01', '2021-04-01'),
(23, 'สรุปยอดรายวัน', '', 'mod_cashier/summary.php', 1, 0, 5, 1, '<i class=\"mdi mdi-history\"></i>', '2021-04-01', '2021-04-01'),
(24, 'สรุปยอดรายการย้อนหลัง', '', 'mod_cashier_history/front_manage.php', 1, 0, 6, 1, '<i class=\"mdi mdi-chart-histogram\"></i>', '2021-04-01', '2021-04-01'),
(25, 'บริหารงานบุคคล', '', 'mod_employee/front-manage.php', 1, 0, 7, 1, '<i class=\"fas fa-sitemap\"></i>', '2021-04-01', '2021-04-01'),
(26, 'ตั้งค่าการใช้งาน', '', '#', 1, 0, 8, 1, '<i class=\"fas fa-lock\"></i>', '2021-04-01', '2021-04-01'),
(27, 'กลุ่มผู้ใช้งาน', '', 'mod_role/front-manage.php', 1, 26, 0, 2, '<i class=\"fas fa-users\"></i>', '2021-04-01', '2021-04-01'),
(28, 'สิทธิ์การใช้งาน', '', 'mod_permission/front-manage.php', 1, 26, 0, 2, '<i class=\"fas fa-lock-open\"></i>', '2021-04-01', '2021-04-01'),
(29, 'จัดการร้านค้า', '', '#', 1, 0, 9, 1, '<i class=\"fas fa-shopping-bag\"></i>', '2021-04-01', '2021-04-01'),
(30, 'ร้านค้า', '', 'mod_customer/front_manage.php', 1, 29, 0, 2, '<i class=\"mdi mdi-shopping-music\"></i>', '2021-04-01', '2021-04-01'),
(31, 'หมวดหมู่ร้านค้า', '', 'mod_category/front_manage.php', 1, 29, 0, 2, '<i class=\"fas fa-list-alt\"></i>', '2021-04-01', '2021-04-01'),
(32, 'จัดการส่วนกลาง', '', 'mod_central_information/front_manage.php', 2, 0, 10, 1, '<i class=\"mdi mdi-settings\"></i>', '2021-04-01', '2021-04-01'),
(33, 'จัดการบัตร', '', 'mod_card/front_manage.php', 1, 0, 12, 1, '<i class=\"mdi mdi-credit-card\"></i>', '2021-04-01', '2021-04-01'),
(34, 'รายรับ - รายจ่าย', '', '#', 1, 0, 13, 1, '<i class=\"mdi mdi-coin\"></i>', '2021-04-01', '2021-04-01'),
(35, 'รายงานยอดเงิน Cashier', '', 'mod_cashier_balance_report/front_manage.php', 1, 34, 14, 2, '<i class=\"fas fa-piggy-bank\"></i>', '2021-04-01', '2021-04-01'),
(36, 'รายงานยอดขาย ร้านค้า', '', 'mod_shop_report/front_manage.php', 1, 34, 15, 2, '<i class=\"mdi mdi-bank\"></i>', '2021-04-01', '2021-04-01'),
(37, 'จัดการแคชเชียร์', '', 'mod_cashier_add/front_manage.php', 1, 0, 11, 1, '<i class=\"fas fa-barcode\"></i>', '2021-04-01', '2021-04-01');

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
('a53deb97be9b18bfh743f3d18e4197a349y', '192.168.1.42', '$2y$10$xgNH4UEetyu2LUt1hrBIQ.jESbnesw.SR2CI/IidXJxlFxH/xYvFy', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:24:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:12', NULL, 0, 3, '', 'vda8fda29bc5f349eb28df867sce70df1an'),
('c3e4e3c777dcd30c270feba59pd4f79896e', 'test', '$2y$10$puIIVB5oMOEQnI87SjX87u30YsWwHCB33KKkhtQOhBK.6tdLwZLKe', NULL, 'vbjc0debfdecb8a769aa1d9d5fdcaca5dch', '2021-04-01 02:55:09', '2021-04-01 02:55:25', '2021-04-01 02:55:41', NULL, '0000-00-00 00:00:00', NULL, 0, 1, '1c9cfb80f74319588a6b736fb7b5074e', 'l6cb5591de6ce759942x749b3bb729ffc0l'),
('i34fb36ac6808410ad9e1ab0e7ff22ffe0b', '192.168.1.43', '$2y$10$l9e4YfzlQGYc32B.aRAQaOqs4pqO3wxMIkskEsOF5BNO5MrrPl8Nu', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:25:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:13', NULL, 0, 3, '', 'g0a042835aefc5f7b4ae33ede6j30ba87cw'),
('k5c1a67703247d9a4c79716778fcga7acdy', '192.168.1.45', '$2y$10$1xXi5enGHXxCZmpTyOx9le7EYZ2/bGAYaZVr6XPJlpt5v2b6Cg.Yi', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:25:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:15', NULL, 0, 3, '', 'b0641f4e53a5a390104ec2d4ee31dr08b3l'),
('n15add375e3e4a27bbf66y73318d44cd89y', 'maxnatthpol', '$2y$10$fBy8AA1UP0jc6WfzSKs1xOukmf0AFzfWsEWlj2/KZXDioZiJvloue', 'tike.natthpol@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-04-01 01:07:10', '2021-04-01 02:49:29', '2021-04-01 02:52:12', NULL, '0000-00-00 00:00:00', NULL, 1, 1, 'e13c347723a1eeb4b6b0f7eccc16ca35', 'admin_max'),
('p571f43851a8571vaf90b1994250a79984v', '192.168.1.46', '$2y$10$KyfcZBnpAaf3aE3zMBxT/uLpEEWU1k05eUwZ.N5Cd/WNwyYSw3ATO', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:26:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:16', NULL, 0, 3, '', 'el7c05cfe5c562887817201caf8b34440di'),
('q02bfd06ffs5f0819ec30a4fe572b67a73c', 'supadmin', '$2y$10$s6CqhypM9oPT6aDuHiITueWvm6P06oRsdHaHKiPhtob5FOQdlhgpy', NULL, 'o08f223d416f41274a85b5cc7f9bc6l777m', '2019-11-23 16:44:32', '2021-04-01 02:43:04', '2021-04-01 02:48:38', NULL, '0000-00-00 00:00:00', NULL, 1, 1, 'f8adf616721e538f70b85a44afa37e6a', 'admin'),
('r726a63c93319ce50da8c508e53bc7042ed', '192.168.1.41', '$2y$10$KEIlfFuUyWXsHVioGnoPd.xwIX6xoVMejVhrqrtUyEA2s/e5PNi/y', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 01:18:46', '2021-04-01 01:34:15', '2021-04-01 01:19:07', NULL, '2021-04-01 02:34:10', NULL, 0, 3, '3b31d8fb9ce0e6c1e66acbd5b496d792', 'e91134133c6eedabfk63063cffd6363f8bu'),
('t8b2ac39c7d7ctbccf264cc2bd1d6229d6p', 'Admin', '$2y$10$fKGS3AAxP4cgalUiz7FHBOK2dt.j4TsctZwlfeF85Gi1xQxDI/FC6', 'admin@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-04-01 01:13:22', '2021-04-01 02:52:22', '2021-04-01 02:55:15', NULL, '2021-04-01 02:06:08', NULL, 0, 1, '85b8a2e8c9cb87cf76abf03da802bdec', 'x952ef7b81d11232f4d65ab4e0a761oe1cz'),
('tdb209e6a6f9aa0171202255da7c1caa78k', '192.168.1.47', '$2y$10$PTWOto6UdmvusAJUBfMQ2uxinpuzynImgsv47BNJcSxLpk8Wsr4WO', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:27:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:18', NULL, 0, 3, '', 'lb89b01ac028f7331b7dc97f1c3z17267ct'),
('w62c15455c5882d1fbea83350c88c3c22dh', '192.168.1.48', '$2y$10$LMjvlKmGTzHgVJgj33JHK.FmHjOlzsv8V8TtND3RvhUnZwEwz28ee', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:27:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:19', NULL, 0, 3, '', 'vdb8bee2cec911dad6c875a0632b507e1fn'),
('y9991gcec1067f425a3d63a50bc9d0f09fx', '192.168.1.44', '$2y$10$0zbz2fEkUAuCjeF4mausfufjDsewW3Km5y4XueZnQgt7T3MpyUcpi', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-04-01 02:25:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2021-04-01 02:34:14', NULL, 0, 3, '', 'lt75f06e4896b4e641dcdaf45b954a7ae2h');

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
(1, 'e91134133c6eedabfk63063cffd6363f8bu', '', 0, '2021-04-01 01:14:53', '../../uploads/2021/mod_customer/', 1, 1),
(2, 'vda8fda29bc5f349eb28df867sce70df1an', '', 0, '2021-04-01 01:15:17', '../../uploads/2021/mod_customer/', 1, 1),
(3, 'g0a042835aefc5f7b4ae33ede6j30ba87cw', '', 0, '2021-04-01 01:15:39', '../../uploads/2021/mod_customer/', 1, 1),
(4, 'lt75f06e4896b4e641dcdaf45b954a7ae2h', '', 0, '2021-04-01 01:16:25', '../../uploads/2021/mod_customer/', 1, 1),
(5, 'b0641f4e53a5a390104ec2d4ee31dr08b3l', '', 0, '2021-04-01 01:16:47', '../../uploads/2021/mod_customer/', 1, 1),
(6, 'el7c05cfe5c562887817201caf8b34440di', '', 0, '2021-04-01 01:17:07', '../../uploads/2021/mod_customer/', 1, 1),
(7, 'lb89b01ac028f7331b7dc97f1c3z17267ct', '', 0, '2021-04-01 01:17:27', '../../uploads/2021/mod_customer/', 1, 1),
(8, 'vdb8bee2cec911dad6c875a0632b507e1fn', '', 0, '2021-04-01 01:17:43', '../../uploads/2021/mod_customer/', 1, 1),
(9, 'l6cb5591de6ce759942x749b3bb729ffc0l', 'cashier-0104214796.png', 197652, '2021-04-01 02:54:15', '../../uploads/2021/mod_cashier/', 1, 2);

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
(24, 6, '1, 2, 3, 4, 5, 6, 7, 8', 'y1c0e989be2314eeaz82971968f9768a2ah'),
(25, 17, '1, 2, 3, 4, 5, 6, 7, 8', 'b051k42a04abbd60dc5188557ace25102bx'),
(26, 2, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(27, 4, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(28, 5, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(29, 7, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(30, 9, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(31, 10, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(32, 11, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(33, 13, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(34, 14, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(35, 6, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(36, 15, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(37, 17, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(38, 18, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(39, 1, '1, 2, 3, 4, 5, 6, 7, 8', 'v14f4d9c9cc9001479a3e5e87j595dd8a1m'),
(57, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'vad9b621d5bd83fa43a0de54c56d390659p'),
(58, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'vad9b621d5bd83fa43a0de54c56d390659p'),
(65, 21, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(66, 22, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(67, 23, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(68, 24, '1, 2, 3, 4, 5, 6, 7, 8', 'w2f06a46d7df0cb103f4evdec59f2e9eaby'),
(91, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'r726a63c93319ce50da8c508e53bc7042ed'),
(92, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'r726a63c93319ce50da8c508e53bc7042ed'),
(146, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'a53deb97be9b18bfh743f3d18e4197a349y'),
(147, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'a53deb97be9b18bfh743f3d18e4197a349y'),
(148, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'i34fb36ac6808410ad9e1ab0e7ff22ffe0b'),
(149, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'i34fb36ac6808410ad9e1ab0e7ff22ffe0b'),
(150, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'y9991gcec1067f425a3d63a50bc9d0f09fx'),
(151, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'y9991gcec1067f425a3d63a50bc9d0f09fx'),
(152, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'k5c1a67703247d9a4c79716778fcga7acdy'),
(153, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'k5c1a67703247d9a4c79716778fcga7acdy'),
(154, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'p571f43851a8571vaf90b1994250a79984v'),
(155, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'p571f43851a8571vaf90b1994250a79984v'),
(156, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'tdb209e6a6f9aa0171202255da7c1caa78k'),
(157, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'tdb209e6a6f9aa0171202255da7c1caa78k'),
(158, 19, '1, 2, 3, 4, 5, 6, 7, 8', 'w62c15455c5882d1fbea83350c88c3c22dh'),
(159, 20, '1, 2, 3, 4, 5, 6, 7, 8', 'w62c15455c5882d1fbea83350c88c3c22dh'),
(160, 19, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(161, 20, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(162, 21, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(163, 22, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(164, 23, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(165, 24, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(166, 25, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(167, 26, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(168, 28, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(169, 29, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(170, 30, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(171, 37, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(172, 33, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(173, 34, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(174, 35, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(175, 36, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(176, 32, '1, 2, 3, 4, 5, 6, 7, 8', 't8b2ac39c7d7ctbccf264cc2bd1d6229d6p'),
(177, 21, '1, 2, 3, 4, 5, 6, 7, 8', 'c3e4e3c777dcd30c270feba59pd4f79896e'),
(178, 22, '1, 2, 3, 4, 5, 6, 7, 8', 'c3e4e3c777dcd30c270feba59pd4f79896e'),
(179, 23, '1, 2, 3, 4, 5, 6, 7, 8', 'c3e4e3c777dcd30c270feba59pd4f79896e'),
(180, 24, '1, 2, 3, 4, 5, 6, 7, 8', 'c3e4e3c777dcd30c270feba59pd4f79896e');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_catagory`
--
ALTER TABLE `product_catagory`
  ADD PRIMARY KEY (`id_catagory`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_product` (`id_product`);

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
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_catagory`
--
ALTER TABLE `product_catagory`
  MODIFY `id_catagory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id_property` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id_role_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

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
  MODIFY `id_system` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id_user_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
