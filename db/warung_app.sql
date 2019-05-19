-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2019 at 04:35 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `building_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`, `building_img`) VALUES
(1, 'Ruang 1', '20150424120435_border-meja.png'),
(2, 'Ruang 2', '20150424010411_room2.png');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_phone` varchar(100) NOT NULL,
  `member_settlement` int(11) NOT NULL,
  `member_discount` int(11) NOT NULL,
  `member_discount_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_items`
--

CREATE TABLE `member_items` (
  `member_item_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_items`
--

INSERT INTO `member_items` (`member_item_id`, `member_id`, `menu_id`) VALUES
(1, 1, 3),
(5, 2, 1),
(6, 2, 3),
(7, 1, 2),
(8, 1, 5),
(9, 1, 13),
(10, 1, 1),
(11, 1, 14),
(117, 3, 1),
(118, 3, 2),
(119, 3, 20),
(120, 3, 21),
(121, 3, 31),
(122, 3, 32),
(123, 3, 41),
(124, 3, 42),
(125, 3, 3),
(126, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_type_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_original_price` int(11) NOT NULL,
  `menu_margin_price` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_img` text NOT NULL,
  `partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_type_id`, `menu_name`, `menu_original_price`, `menu_margin_price`, `menu_price`, `menu_img`, `partner_id`) VALUES
(1, 1, 'V01 Crazy Chocolate', 3500, 4500, 8000, 'crazy-chocolate.jpg', 1),
(2, 1, 'V02 Koki Cookies', 3500, 4500, 8000, 'koki-cookies.jpg', 1),
(3, 1, 'V03 Coffee Mexico', 3500, 4500, 8000, 'coffe-mexico.jpg', 1),
(4, 1, 'V04 Vanilla Eskimo', 3500, 4500, 8000, 'vanilla-eskimo.jpg', 1),
(5, 1, 'V05 Magic Strawberry', 3500, 4500, 8000, 'magic-strawberry.jpg', 1),
(7, 1, 'V06 Grape Zombie', 3500, 4500, 8000, 'grape-zombie.jpg', 1),
(8, 1, 'V07 Police Mocca', 3500, 4500, 8000, 'police-mocca.jpg', 1),
(9, 1, 'V08 Green Potion', 3500, 4500, 8000, 'green-potion.jpg', 1),
(10, 1, 'V09 Coffe Sumatera', 3500, 4500, 8000, 'coffe-sumatera.jpg', 1),
(11, 1, 'V11 Dark Chocolate', 3500, 4500, 8000, 'dark-chocolate.jpg', 1),
(12, 1, 'V13 Ocean Bluberry', 3500, 4500, 8000, 'ocean-blueberry.jpg', 1),
(13, 1, 'V14 Green Tea', 5000, 5000, 10000, 'green-tea.jpg', 1),
(14, 1, 'V15 Havana Taro', 3500, 4500, 8000, 'havana-taro.jpg', 1),
(15, 2, 'Topping Keju', 1000, 1000, 2000, 'keju.png', 1),
(16, 2, 'Topping Coklat Serut', 500, 500, 1000, 'coklat.jpg', 1),
(17, 2, 'Topping Coco Crunch', 500, 500, 1000, 'coco.png', 1),
(18, 2, 'Topping Sereal', 500, 500, 1000, 'cereal.png', 1),
(19, 2, 'Topping Oreo', 500, 500, 1000, 'oreo.jpg', 1),
(20, 2, 'Free Topping Cocochips', 0, 0, 0, 'images.jpeg', 1),
(21, 2, 'Free Topping Sprinkle', 0, 0, 0, 'candy-sprinkles-png-3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `menu_type_id` int(11) NOT NULL,
  `menu_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`menu_type_id`, `menu_type_name`) VALUES
(1, 'Minuman Utama'),
(2, 'Topping');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL,
  `partner_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`partner_id`, `partner_name`) VALUES
(1, 'Widhi');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_jumlah` int(11) NOT NULL,
  `payment_sisa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_name` varchar(50) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_date`, `purchase_name`, `unit_id`, `purchase_qty`, `purchase_price`, `purchase_total`, `supplier_id`) VALUES
(6, '2019-05-17', 'Es batu', 1, 2, 1500, 3000, 2),
(7, '2019-05-15', 'Es batu', 1, 4, 1500, 6000, 2),
(8, '2019-05-14', 'Es batu', 1, 2, 1500, 3000, 2),
(9, '2019-05-13', 'Es batu', 1, 1, 23000, 23000, 4),
(10, '2019-05-11', 'Es batu', 1, 6, 1500, 9000, 2),
(11, '2019-05-12', 'Es batu', 1, 2, 1500, 3000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `supplier_addres` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_addres`) VALUES
(2, 'Es Batu Surya Kencana', '-', '-'),
(4, 'Es batu Pamulang', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `data_x` int(11) NOT NULL,
  `data_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `building_id`, `table_name`, `data_x`, `data_y`) VALUES
(0, 0, 'Bungkus', 0, 0),
(1, 1, '1', 251, 260),
(2, 1, '2', 437, 174),
(3, 1, '3', 367, 322),
(4, 1, '4', 541, 231),
(5, 2, '5', 299, 294),
(6, 2, '6', 421, 231),
(7, 2, '7', 545, 171),
(8, 2, '8', 442, 369),
(9, 1, '9', 758, 365),
(10, 1, '5', 713, 223),
(14, 2, '9', 572, 306),
(15, 1, '7', 983, 242),
(16, 1, '8', 867, 302),
(17, 1, '6', 835, 165),
(18, 2, '10', 695, 247),
(19, 2, '11', 598, 448),
(20, 2, '12', 726, 391),
(21, 2, '13', 846, 325);

-- --------------------------------------------------------

--
-- Table structure for table `table_items`
--

CREATE TABLE `table_items` (
  `table_item_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_qty` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_items`
--

INSERT INTO `table_items` (`table_item_id`, `table_id`, `menu_id`, `menu_qty`, `menu_price`, `menu_total_price`) VALUES
(1, 1, 1, 2, 4000, 8000),
(2, 1, 2, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_payment` int(11) NOT NULL,
  `transaction_change` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `table_id`, `member_id`, `transaction_date`, `transaction_total`, `transaction_payment`, `transaction_change`) VALUES
(124, 0, 0, '2019-05-11 01:05:28', 96000, 96000, 0),
(125, 0, 0, '2019-05-12 01:05:06', 184000, 184000, 0),
(126, 0, 0, '2019-05-13 01:05:05', 120000, 120000, 0),
(127, 0, 0, '2019-05-14 01:05:12', 160000, 160000, 0),
(128, 0, 0, '2019-05-15 01:05:46', 72000, 72000, 0),
(129, 0, 0, '2019-05-17 01:05:21', 96000, 96000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions_tmp`
--

CREATE TABLE `transactions_tmp` (
  `transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_price_discount` int(11) NOT NULL,
  `transaction_detail_grand_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_detail_id`, `transaction_id`, `menu_id`, `transaction_detail_original_price`, `transaction_detail_margin_price`, `transaction_detail_price`, `transaction_detail_price_discount`, `transaction_detail_grand_price`, `transaction_detail_qty`, `transaction_detail_total`) VALUES
(11, 124, 1, 3500, 4500, 8000, 0, 8000, 1, 8000),
(12, 124, 2, 3500, 4500, 8000, 0, 8000, 1, 8000),
(13, 124, 3, 3500, 4500, 8000, 0, 8000, 2, 16000),
(14, 124, 4, 3500, 4500, 8000, 0, 8000, 1, 8000),
(15, 124, 8, 3500, 4500, 8000, 0, 8000, 3, 24000),
(16, 124, 11, 3500, 4500, 8000, 0, 8000, 3, 24000),
(17, 124, 12, 3500, 4500, 8000, 0, 8000, 1, 8000),
(18, 125, 1, 3500, 4500, 8000, 0, 8000, 7, 56000),
(19, 125, 2, 3500, 4500, 8000, 0, 8000, 5, 40000),
(20, 125, 3, 3500, 4500, 8000, 0, 8000, 2, 16000),
(21, 125, 4, 3500, 4500, 8000, 0, 8000, 2, 16000),
(22, 125, 5, 3500, 4500, 8000, 0, 8000, 2, 16000),
(23, 125, 8, 3500, 4500, 8000, 0, 8000, 1, 8000),
(24, 125, 10, 3500, 4500, 8000, 0, 8000, 2, 16000),
(25, 125, 14, 3500, 4500, 8000, 0, 8000, 2, 16000),
(26, 126, 2, 3500, 4500, 8000, 0, 8000, 2, 16000),
(27, 126, 4, 3500, 4500, 8000, 0, 8000, 5, 40000),
(28, 126, 5, 3500, 4500, 8000, 0, 8000, 1, 8000),
(29, 126, 7, 3500, 4500, 8000, 0, 8000, 2, 16000),
(30, 126, 8, 3500, 4500, 8000, 0, 8000, 1, 8000),
(31, 126, 10, 3500, 4500, 8000, 0, 8000, 1, 8000),
(32, 126, 11, 3500, 4500, 8000, 0, 8000, 1, 8000),
(33, 126, 12, 3500, 4500, 8000, 0, 8000, 2, 16000),
(34, 127, 1, 3500, 4500, 8000, 0, 8000, 4, 32000),
(35, 127, 2, 3500, 4500, 8000, 0, 8000, 2, 16000),
(36, 127, 5, 3500, 4500, 8000, 0, 8000, 2, 16000),
(37, 127, 7, 3500, 4500, 8000, 0, 8000, 2, 16000),
(38, 127, 8, 3500, 4500, 8000, 0, 8000, 5, 40000),
(39, 127, 12, 3500, 4500, 8000, 0, 8000, 3, 24000),
(40, 127, 14, 3500, 4500, 8000, 0, 8000, 2, 16000),
(41, 128, 1, 3500, 4500, 8000, 0, 8000, 1, 8000),
(42, 128, 2, 3500, 4500, 8000, 0, 8000, 1, 8000),
(43, 128, 9, 3500, 4500, 8000, 0, 8000, 2, 16000),
(44, 128, 10, 3500, 4500, 8000, 0, 8000, 1, 8000),
(45, 128, 11, 3500, 4500, 8000, 0, 8000, 2, 16000),
(46, 128, 12, 3500, 4500, 8000, 0, 8000, 1, 8000),
(47, 128, 14, 3500, 4500, 8000, 0, 8000, 1, 8000),
(48, 129, 1, 3500, 4500, 8000, 0, 8000, 5, 40000),
(49, 129, 2, 3500, 4500, 8000, 0, 8000, 1, 8000),
(50, 129, 4, 3500, 4500, 8000, 0, 8000, 1, 8000),
(51, 129, 7, 3500, 4500, 8000, 0, 8000, 1, 8000),
(52, 129, 8, 3500, 4500, 8000, 0, 8000, 2, 16000),
(53, 129, 11, 3500, 4500, 8000, 0, 8000, 2, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_new_tmp`
--

CREATE TABLE `transaction_new_tmp` (
  `tnt_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tnt_price` int(11) NOT NULL,
  `tnt_discount` int(11) NOT NULL,
  `tnt_grand_price` int(11) NOT NULL,
  `tnt_qty` int(11) NOT NULL,
  `tnt_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tmp_details`
--

CREATE TABLE `transaction_tmp_details` (
  `transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_price_discount` int(11) NOT NULL,
  `transaction_detail_grand_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`) VALUES
(1, 'Biji'),
(2, 'Lusin'),
(3, 'KG'),
(4, 'Pack'),
(5, 'Kodi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_login`, `user_password`, `user_name`, `user_code`, `user_phone`, `user_img`, `user_active_status`) VALUES
(11, 1, 'melon', '3a2cf27458c9aa3e358f8fc0f002bff6', 'melon', 'A0001', '03125435432', '', 1),
(14, 1, 'widhi', '8ff86798710db76b2187852c3b499297', 'widhi', '', '0', '', 1),
(15, 3, 'siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'siti', '', '-', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_items`
--
ALTER TABLE `member_items`
  ADD PRIMARY KEY (`member_item_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`menu_type_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `table_items`
--
ALTER TABLE `table_items`
  ADD PRIMARY KEY (`table_item_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `transaction_new_tmp`
--
ALTER TABLE `transaction_new_tmp`
  ADD PRIMARY KEY (`tnt_id`);

--
-- Indexes for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
  ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_items`
--
ALTER TABLE `member_items`
  MODIFY `member_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `menu_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `table_items`
--
ALTER TABLE `table_items`
  MODIFY `table_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `transaction_new_tmp`
--
ALTER TABLE `transaction_new_tmp`
  MODIFY `tnt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
