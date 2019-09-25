-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 07:41 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-
-- Database: `stock`
--
CREATE DATABASE IF NOT EXISTS `stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stock`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Great Wall', 1, 1),
(2, 'CBC', 1, 1),
(3, 'RFL', 1, 1),
(4, 'Stella', 1, 1),
(5, 'Gazi Tank', 1, 1),
(6, 'Gazi Sink', 1, 1),
(7, 'Bengal', 1, 1),
(8, 'Tanvir Metal', 1, 1),
(9, 'NPOLY', 1, 1),
(10, 'Others', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Wall Tiles', 1, 1),
(2, 'Floor Tiles', 1, 1),
(3, 'Stair', 1, 1),
(4, 'Tank', 1, 1),
(5, 'Sink', 1, 1),
(6, 'Comode', 1, 1),
(7, 'Basin', 1, 1),
(8, 'Pane', 1, 1),
(9, 'Pipe', 1, 1),
(10, 'Upvc', 1, 1),
(11, 'Upvc Fittings', 1, 1),
(12, 'Metal', 1, 1),
(13, 'Door', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `credit_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `credit_type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`credit_id`, `date`, `credit_type`, `amount`) VALUES
(46, '2017-10-23', 'due_pay', '78.00'),
(47, '2017-10-23', 'qq', '100'),
(48, '2017-10-23', 'due_pay', '10');

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `debit_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `debit_type` varchar(255) NOT NULL,
  `debit_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`debit_id`, `date`, `debit_type`, `debit_amount`) VALUES
(1, '2017-10-23', 'others', '100'),
(2, '2017-10-23', 'others', '200'),
(3, '2017-10-23', 'aa', '100');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(57, 50, 1, '1', '', '11.00', 1),
(58, 51, 1, '3', '112', '336.00', 1),
(59, 52, 1, '3', '11', '33.00', 1),
(60, 53, 1, '1', '100', '100.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(51, '2017-10-23', 'shafiq', '111', '336.00', '0.00', '336.00', '0', '336.00', '336', '0', 0, 3, 1),
(52, '2017-10-23', 'a', '1', '33.00', '0.00', '33.00', '1', '32.00', '32', '0', 0, 3, 1),
(53, '2017-10-23', 'q', 'q', '100.00', '0.00', '100.00', '0', '100.00', '100', '0', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` date NOT NULL,
  `rr` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `rr`, `total`, `active`, `status`) VALUES
(1, 'GW-Wall-Tiles- 8-12', '../assests/images/stock/1615059cf96f617bc7.png', 1, 1, '2', '2017-10-22', '10', '20', 1, 1),
(2, 'GW-Wall-Tiles-10-16', '../assests/images/stock/1653559cf9774d1e11.png', 1, 1, '11', '2017-09-30', '10', '110', 1, 1),
(3, 'GW-Wall-Tiles-8-22', '../assests/images/stock/2724559cf98239d8d7.png', 1, 1, '11', '2017-10-22', '20', '220', 1, 1),
(4, 'GW-Wall-Tiles-12-20', '../assests/images/stock/1398659cf991927e79.png', 1, 1, '12', '2017-10-22', '11', '132', 1, 1),
(5, 'GW-Wall-Tiles-12-24', '../assests/images/stock/2027559cf9948b747d.png', 1, 1, '20', '2017-09-30', '11', '220', 1, 1),
(6, 'GW-Floor-Tiles-12-12', '../assests/images/stock/2942459cf9977bb17c.png', 1, 2, '22', '2017-09-30', '11', '242', 1, 1),
(7, 'GW-Floor-Tiles-16-16', '../assests/images/stock/1648959cf99c174ffd.png', 1, 2, '20', '2017-09-30', '11', '220', 1, 1),
(8, 'GW-Floor-Tiles-24-24', '../assests/images/stock/689459cf9a251bdfb.png', 1, 2, '20', '2017-09-30', '11', '220', 1, 1),
(9, 'GW-Stair-12-12', '../assests/images/stock/1115159cf9a5ad4b63.png', 1, 3, '10', '2017-09-30', '11', '110', 1, 1),
(10, 'R-Tank-300', '../assests/images/stock/1999659cf9a9485e59.png', 3, 4, '1', '2017-09-30', '100', '100', 1, 1),
(11, 'CBC-Wall-Tiles-8-12', '../assests/images/stock/3126959cf9b073dd69.png', 2, 1, '12', '2017-09-30', '11', '132', 1, 1),
(12, 'CBC-Wall-Tiles-10-16', '../assests/images/stock/3071459cf9b381ccc8.png', 2, 1, '12', '2017-09-30', '10', '120', 1, 1),
(13, 'CBC-Wall-Tiles-8-22', '../assests/images/stock/2909959cf9b6b2970e.png', 2, 1, '12', '2017-09-30', '10', '120', 1, 1),
(14, 'CBC-Wall-Tiles-12-20', '../assests/images/stock/1229659cf9bada7060.png', 2, 1, '12', '2017-09-30', '10', '120', 1, 1),
(15, 'CBC-Wall-Tiles-12-24', '../assests/images/stock/502559cf9c00d2e21.png', 2, 1, '10', '2017-09-30', '10', '100', 1, 1),
(16, 'CBC-Floor-Tiles-12-12', '../assests/images/stock/659859cf9ca3d7ba2.png', 2, 2, '10', '2017-09-30', '10', '100', 1, 1),
(17, 'CBC-Floor-Tiles-16-16', '../assests/images/stock/3213559cf9d034f89b.png', 2, 2, '12', '2017-09-30', '10', '120', 1, 1),
(18, 'CBC-Floor-Tiles-24-24', '../assests/images/stock/405359cf9d9f619d1.png', 2, 2, '10', '2017-09-30', '10', '100', 1, 1),
(19, 'CBC-Stair-12-12', '../assests/images/stock/2148259cf9de816da1.png', 2, 3, '12', '2017-09-30', '10', '120', 1, 1),
(20, 'R-Tank-300', '../assests/images/stock/1404359cf9e2a15bd5.png', 3, 4, '10', '2017-09-30', '10', '100', 1, 1),
(21, 'R-Tank-500', '../assests/images/stock/1778459cf9e6446cb4.png', 3, 4, '12', '2017-09-30', '10', '120', 1, 1),
(22, 'R-Tank-700', '../assests/images/stock/2158559cfa022caf0d.png', 3, 4, '12', '2017-09-30', '10', '120', 1, 1),
(23, 'R-Tank-1000', '../assests/images/stock/502559cfa0fe5a266.png', 0, 4, '1', '2017-09-30', '0', '', 1, 1),
(24, 'S-Cpmode-Vershow', '../assests/images/stock/659859cfa139b4f10.png', 4, 6, '12', '2017-09-30', '10', '120', 1, 1),
(25, 'S-Comode-Mercella', '../assests/images/stock/1758859cfa17683217.png', 4, 6, '12', '2017-09-30', '10', '120', 1, 1),
(26, 'S-Basin-Crown', '../assests/images/stock/3213559cfa2098d36b.png', 4, 7, '12', '2017-09-30', '10', '120', 1, 1),
(27, 'S-Basin-Maria', '../assests/images/stock/1865359cfa23240d96.png', 4, 7, '12', '2017-09-30', '10', '120', 1, 1),
(28, 'S-Basin-Vershow', '../assests/images/stock/849759cfa265701a7.png', 4, 7, '12', '2017-09-30', '10', '120', 1, 1),
(29, 'S-Basin-Angelina', '../assests/images/stock/1758859cfa29e72b94.png', 4, 7, '12', '2017-09-30', '10', '120', 1, 1),
(30, 'S-Basin-Esabela', '../assests/images/stock/315459cfa2d2b4326.png', 4, 7, '12', '2017-09-30', '10', '120', 1, 1),
(31, 'GT-300', '../assests/images/stock/1640659cfa390b11f7.png', 5, 4, '12', '2017-09-30', '10', '120', 1, 1),
(32, 'GT-500', '../assests/images/stock/1167159cfa43a3e12f.png', 5, 4, '12', '2017-09-30', '10', '120', 1, 1),
(33, 'GT-750', '../assests/images/stock/1865359cfa46567838.png', 5, 4, '12', '2017-09-30', '10', '120', 1, 1),
(34, 'GT-1000', '../assests/images/stock/704459cfa4e5ab3c5.png', 5, 4, '12', '2017-09-30', '10', '120', 1, 1),
(35, 'BN-Pipe-3-4-Thread', '../assests/images/stock/247459cfa52a92b70.png', 7, 9, '12', '2017-09-30', '10', '120', 1, 1),
(36, 'BN-Pipe-1-inch-Thread', '../assests/images/stock/804559cfa56ea8489.png', 7, 9, '12', '2017-09-30', '10', '120', 1, 1),
(37, 'BN-Pipe-1.5-inch-Thread', '../assests/images/stock/3075259cfa5a32073e.png', 7, 9, '12', '2017-09-30', '10', '120', 1, 1),
(38, 'BN-Pipe-2 -inch-Thread', '../assests/images/stock/1833859cfa619d5116.png', 7, 9, '12', '2017-09-30', '10', '120', 1, 1),
(39, 'BN-UPVC-1.5-inch', '../assests/images/stock/3075259cfaa42b655a.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(40, 'BN-UPVC-2-inch', '../assests/images/stock/655559cfaa66c75eb.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(41, 'BN-UPVC-40mm', '../assests/images/stock/559359cfaa9409f0c.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(42, 'BN-UPVC-50mm', '../assests/images/stock/2079259cfaab9489e4.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(43, 'BN-UPVC-3-inch', '../assests/images/stock/707059cfaae90d468.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(44, 'BN-UPVC-4-inch-[2.0]', '../assests/images/stock/2177759cfab1dac443.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(45, 'BN-UPVC-4-inch-[2.7]', '../assests/images/stock/559359cfab88a2749.png', 7, 10, '14', '2017-09-30', '10', '140', 1, 1),
(46, 'BN-UPVC-4-inch-[3,4]', '../assests/images/stock/575059cfabc3d63dc.png', 7, 10, '14', '2017-09-30', '10', '140', 1, 1),
(47, 'BN-UPVC-5-inch-[2.0]', '../assests/images/stock/575959cfac15289eb.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(48, 'BN-UPVC-6-inch-[2.7]', '../assests/images/stock/1343159cfac4b5499f.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1),
(49, 'BN-UPVC-6-inch-[4.0]', '../assests/images/stock/3028459cfac966d60e.png', 7, 10, '12', '2017-09-30', '10', '120', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`date`, `client_name`, `client_contact`, `total`, `paid`, `due`) VALUES
('2017-10-23', '11', '11', '32.00', '11', '21.00'),
('2017-10-23', '11', '11', '33.00', '0', '33.00'),
('2017-10-23', 'shafiq', '01736507993', '264.00', '0', '264.00'),
('2017-10-23', 'shafiq', '01736507993', '264.00', '0', '264.00'),
('2017-10-23', 'shafiq', '01736507993', '131.00', '0', '131.00'),
('2017-10-23', 'shafiq', '01736507993', '131.00', '0', '131.00'),
('2017-10-23', 'shafiq', '01736507993', '131.00', '0', '131.00'),
('2017-10-23', 'shafiq', '01736507993', '131.00', '0', '131.00'),
('2017-10-23', 'ss', '01736507993', '100.00', '0', '100.00'),
('2017-10-23', '11', '11', '11.00', '1', '10.00'),
('2017-10-23', '11', '11', '10.00', '1', '9.00'),
('2017-10-23', 'qq', 'qq', '10.00', '1', '9.00'),
('2017-10-23', 'shafiq', '111', '336.00', '0', '336.00'),
('2017-10-23', 'a', '1', '32.00', '1', '31.00'),
('2017-10-23', 'q', 'q', '100.00', '12', '88.00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`debit_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `debit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
