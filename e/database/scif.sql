-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2018 at 03:24 AM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announce` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announce`) VALUES
('.Announcements will appear here.');

-- --------------------------------------------------------

--
-- Table structure for table `hrtem_order_details`
--

CREATE TABLE `hrtem_order_details` (
  `order_id` int(11) NOT NULL,
  `nature_of_sample` varchar(255) NOT NULL,
  `magnetic` varchar(255) NOT NULL,
  `magnetic_details` text NOT NULL,
  `measurement` varchar(255) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The preferences and details of HRTEM orders. ';

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `pid` int(11) NOT NULL,
  `table_name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='This table stores the  link between product id and the produ';

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`pid`, `table_name`) VALUES
(1, 'slot_hrtem'),
(2, 'slot_raman'),
(3, 'slot_xrd');

-- --------------------------------------------------------

--
-- Table structure for table `mrs_order_details`
--

CREATE TABLE `mrs_order_details` (
  `order_id` int(11) NOT NULL,
  `nature_of_sample` varchar(255) NOT NULL,
  `wavelength` varchar(255) NOT NULL,
  `wavelength_justi` text,
  `scan_range_from` int(11) NOT NULL,
  `scan_range_to` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `price` text NOT NULL,
  `pi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`, `pi`) VALUES
(1, 'SCIF1', 'HRTEM', 'Hi-Resolution Transmission Electron Microscope.\r\nMade By: JEOL, Japan', 'hrtem.jpg', '300.00', 'admin.hrtem@ktr.srmuniv.ac.in'),
(2, 'SCIF2', 'MRS', 'Micro-Raman Spectrometer\r\nMade By: HORIBA France, LABRAM HR Evolution', 'raman.jpg', 'Free', 'admin.microraman@ktr.srmuniv.ac.in '),
(3, 'SCIF3', 'XRD', 'X-Ray Diffractometer (XRD)\r\nMade By: BRUKER', 'xrd.jpg', 'Free', 'admin.xrd@ktr.srmuniv.ac.in ');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='slot table for scale.';

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='slot table for scale.';

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='slot table for scale.';

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
  `active` int(2) DEFAULT NULL,
  `ustatus` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `institute`, `iid`, `address`, `email`, `pwd`, `phno`, `type`, `hash`, `active`, `ustatus`) VALUES
(1, 'Super', 'User', 'SRM', '1', 'SRM IST', 'admin.scif@ktr.srmuniv.ac.in', 'scifsuperuser', '', 'superuser', NULL, 1, 1),
(2, 'Hrtem', 'Admin', 'SRM', '2', 'SRM IST', 'admin.hrtem@ktr.srmuniv.ac.in', 'hrtemadmin', '1', 'hrtemadmin', NULL, 1, 1),
(3, 'Raman', 'Admin', 'SRM', '3', 'SRM IST', 'admin.microraman@ktr.srmuniv.ac.in', 'ramanadmin', '1', 'ramanadmin', NULL, 1, 1),
(4, 'XRD', 'Admin', 'SRM', '4', 'SRM IST', 'admin.xrd@ktr.srmuniv.ac.in', 'xrdadmin', '1', 'xrdadmin', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xrd_order_details`
--

CREATE TABLE `xrd_order_details` (
  `order_id` int(11) NOT NULL,
  `nature_of_sample` varchar(255) NOT NULL,
  `scan_range_from` int(11) NOT NULL,
  `scan_range_to` int(11) NOT NULL,
  `details` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `slot_id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
