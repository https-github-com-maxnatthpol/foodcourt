-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 10:22 AM
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
(7, 'แคชเชียร์', '', 'mod_cashier/front_manage.php', 1, 0, 0, 1, '', '2021-02-13', '2021-02-13');

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
('j36316de91a255403f6e7d768c443dcb70m', '1111', '$2y$10$PKGrvTqxgx68EviJfTUCV.2ii6y5DMviPNVR0Ub7ju6LmermJS91S', NULL, 'tecc7b75da4a064e697280w10c55d043cby', '2021-02-12 23:28:35', '2021-02-12 23:35:08', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 0, 1, '7305dcae2057dda43ebeea20c209dfe0', 'p5154ceeef7d836777fu0958fd2a94e928x'),
('q02bfd06ffs5f0819ec30a4fe572b67a73c', 'supadmin', '$2y$10$s6CqhypM9oPT6aDuHiITueWvm6P06oRsdHaHKiPhtob5FOQdlhgpy', NULL, 'o08f223d416f41274a85b5cc7f9bc6l777m', '2019-11-23 16:44:32', '2021-02-12 22:37:01', '2021-02-12 22:40:56', NULL, '0000-00-00 00:00:00', NULL, 1, 1, 'be5eff2d70991f37cd94e2cffe263660', ''),
('r7ef62dwc60eadf66e213249d4f7817f6ep', 'test', '$2y$10$NlIRsit.XkvMo/wY9CD6ROr4ay9WiVmWJaAIzXyyd7bHUQkDoeOxi', 'test@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-02-12 21:45:31', '2021-02-12 23:33:36', '2021-02-12 23:27:32', NULL, '2021-02-12 21:52:13', NULL, 0, 1, 'b1279d5798ac2115845621a4cc614d17', 'r5ddf3e2505ad307ce509d1c8bb77f3662u'),
('x2250d1337390f4ee4566f156fe83e6707k', 'maxnatapatr', '$2y$10$u2kCPXutUKL568m9SB7xfeWQ7AYoGCKZFlgdVkl548SU0eqA78B9m', 'tike.natthpol@gmail.com', 'o08f223d416f41274a85b5cc7f9bc6l777m', '2021-02-12 17:34:21', '2021-02-13 15:03:58', '2021-02-13 15:03:52', NULL, '2021-02-12 21:42:55', NULL, 1, 1, 'b1324dd61a75c5a726dded48c2a0c165', 'hd4cff774d6516542n451ce4dbd75c3513o');

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
(32, 'p5154ceeef7d836777fu0958fd2a94e928x', '', 0, '2021-02-12 22:38:13', '../../uploads/2021/mod_customer/', 1, 1);

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
(9, 2, '1', 'r7ef62dwc60eadf66e213249d4f7817f6ep'),
(10, 3, '1, 2, 3, 4, 5, 6, 7, 8', 'r7ef62dwc60eadf66e213249d4f7817f6ep');

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
  MODIFY `id_system` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id_user_perm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
