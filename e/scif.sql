-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2018 at 03:53 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scif`
--

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `pid` int(11) NOT NULL,
  `table_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table stores the  link between product id and the produ';

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`pid`, `table_name`) VALUES
(1, 'slot_hrtem'),
(2, 'slot_raman'),
(3, 'slot_xrd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_id` int(11) NOT NULL,
  `date_of_order` date NOT NULL,
  `slot_time` text NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_id`, `date_of_order`, `slot_time`, `product_code`, `product_name`, `order_id`, `status`) VALUES
(2, '2018-01-26', '7 AM - 8 AM', 'SCIF1', 'HRTEM', 1001, '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` text NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`, `pi`) VALUES
(1, 'SCIF1', 'HRTEM', 'Hi-Resolution Transmission Electron Microscope.\r\nMade By: JEOL, Japan', 'machine.jpg', 23, '5000.00', 'sir 1'),
(2, 'SCIF2', 'MRS', 'Micro-Raman Spectrometer\r\nMade By: HORIBA France, LABRAM HR Evolution', 'machine.jpg', 6, '200.00', 'sir 2'),
(3, 'SCIF3', 'XRD', 'X-Ray Diffractometer (XRD)\r\nMade By: BRUKER', 'machine.jpg', 34, '1000.00', 'sir 3');

-- --------------------------------------------------------

--
-- Table structure for table `slot_hrtem`
--

CREATE TABLE `slot_hrtem` (
  `slot_id` int(10) NOT NULL,
  `slot_date` date NOT NULL,
  `slot_7` varchar(255) NOT NULL DEFAULT '1',
  `slot_8` varchar(255) NOT NULL DEFAULT '1',
  `slot_9` varchar(255) NOT NULL DEFAULT '1',
  `slot_10` varchar(255) NOT NULL DEFAULT '1',
  `slot_11` varchar(255) NOT NULL DEFAULT '1',
  `slot_12` varchar(255) NOT NULL DEFAULT '1',
  `slot_13` varchar(255) NOT NULL DEFAULT '1',
  `slot_14` varchar(255) NOT NULL DEFAULT '1',
  `slot_15` varchar(255) NOT NULL DEFAULT '1',
  `slot_16` varchar(255) NOT NULL DEFAULT '1',
  `slot_17` varchar(255) NOT NULL DEFAULT '1',
  `slot_18` varchar(255) NOT NULL DEFAULT '1',
  `slot_19` varchar(255) NOT NULL DEFAULT '1',
  `slot_20` varchar(255) NOT NULL DEFAULT '1',
  `slot_21` varchar(255) NOT NULL DEFAULT '1',
  `slot_22` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='slot table for scale.';

--
-- Dumping data for table `slot_hrtem`
--

INSERT INTO `slot_hrtem` (`slot_id`, `slot_date`, `slot_7`, `slot_8`, `slot_9`, `slot_10`, `slot_11`, `slot_12`, `slot_13`, `slot_14`, `slot_15`, `slot_16`, `slot_17`, `slot_18`, `slot_19`, `slot_20`, `slot_21`, `slot_22`) VALUES
(1, '2018-01-26', '1001', '1', '1', '1', '1', '1001', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `slot_raman`
--

CREATE TABLE `slot_raman` (
  `slot_id` int(10) NOT NULL,
  `slot_date` date NOT NULL,
  `slot_7` varchar(255) NOT NULL DEFAULT '1',
  `slot_8` varchar(255) NOT NULL DEFAULT '1',
  `slot_9` varchar(255) NOT NULL DEFAULT '1',
  `slot_10` varchar(255) NOT NULL DEFAULT '1',
  `slot_11` varchar(255) NOT NULL DEFAULT '1',
  `slot_12` varchar(255) NOT NULL DEFAULT '1',
  `slot_13` varchar(255) NOT NULL DEFAULT '1',
  `slot_14` varchar(255) NOT NULL DEFAULT '1',
  `slot_15` varchar(255) NOT NULL DEFAULT '1',
  `slot_16` varchar(255) NOT NULL DEFAULT '1',
  `slot_17` varchar(255) NOT NULL DEFAULT '1',
  `slot_18` varchar(255) NOT NULL DEFAULT '1',
  `slot_19` varchar(255) NOT NULL DEFAULT '1',
  `slot_20` varchar(255) NOT NULL DEFAULT '1',
  `slot_21` varchar(255) NOT NULL DEFAULT '1',
  `slot_22` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='slot table for scale.';

-- --------------------------------------------------------

--
-- Table structure for table `slot_xrd`
--

CREATE TABLE `slot_xrd` (
  `slot_id` int(10) NOT NULL,
  `slot_date` date NOT NULL,
  `slot_7` varchar(255) NOT NULL DEFAULT '1',
  `slot_8` varchar(255) NOT NULL DEFAULT '1',
  `slot_9` varchar(255) NOT NULL DEFAULT '1',
  `slot_10` varchar(255) NOT NULL DEFAULT '1',
  `slot_11` varchar(255) NOT NULL DEFAULT '1',
  `slot_12` varchar(255) NOT NULL DEFAULT '1',
  `slot_13` varchar(255) NOT NULL DEFAULT '1',
  `slot_14` varchar(255) NOT NULL DEFAULT '1',
  `slot_15` varchar(255) NOT NULL DEFAULT '1',
  `slot_16` varchar(255) NOT NULL DEFAULT '1',
  `slot_17` varchar(255) NOT NULL DEFAULT '1',
  `slot_18` varchar(255) NOT NULL DEFAULT '1',
  `slot_19` varchar(255) NOT NULL DEFAULT '1',
  `slot_20` varchar(255) NOT NULL DEFAULT '1',
  `slot_21` varchar(255) NOT NULL DEFAULT '1',
  `slot_22` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='slot table for scale.';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `institute` varchar(255) CHARACTER SET utf8 NOT NULL,
  `iid` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pwd` varchar(32) CHARACTER SET utf8 NOT NULL,
  `phno` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `hash` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `active` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `institute`, `iid`, `address`, `email`, `pwd`, `phno`, `type`, `hash`, `active`) VALUES
(2, 'Sankalp', 'Sinha', 'SRM Institute of Science and Technology', 'RA1511003010379', 'A-308, Green Pearl Hostel, Priyear Street, Potheri, Tamilnadu, India.', 'sankalpsinha_ro@srmuniv.edu.in', '1', '+918838464151', 'admin', 'f4b9ec30ad9f68f89b29639786cb62ef', 1),
(3, 'ABC', 'DEF', 'x', 'y', 'z', '2@g', '2', '0000000000', 'user', '00ac8ed3b4327bdd4ebbebcb2ba10a00', 1),
(4, 'G', 'H', 'I', 'J', 'H', 'L@G', '1', '1111111111', 'user', '3c7781a36bcd6cf08c11a970fbe0e2a6', 1),
(5, 'M', 'N', 'O', 'P', 'Q', 'R@G', '1', '222222222', 'user', '1ce927f875864094e3906a4a0b5ece68', 1),
(6, 'S', 'T', 'U', 'V', 'W', 'X@g', '1', '333333333', 'user', '8a0e1141fd37fa5b98d5bb769ba1a7cc', 1),
(7, 'Ram', 'Lakhan', 'SRM Univsersity', 'RA1511003010379', 'PF-328, SRM Hostels,', 'sankalponfire@gmail.com', '1', '77777777777', 'user', 'bbcbff5c1f1ded46c25d28119a85c6c2', 0),
(8, 'test', 'test', 'SRM Univsersity', '1', '1', '3@g', '3', '1111111111', 'user', '32bb90e8976aab5298d5da10fe66f21d', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `slot_hrtem`
--
ALTER TABLE `slot_hrtem`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `slot_raman`
--
ALTER TABLE `slot_raman`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `slot_xrd`
--
ALTER TABLE `slot_xrd`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slot_hrtem`
--
ALTER TABLE `slot_hrtem`
  MODIFY `slot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slot_raman`
--
ALTER TABLE `slot_raman`
  MODIFY `slot_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_xrd`
--
ALTER TABLE `slot_xrd`
  MODIFY `slot_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
