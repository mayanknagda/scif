-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2018 at 12:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
  `price` decimal(10,2) NOT NULL,
  `pi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`, `pi`) VALUES
(1, 'SCIF1', 'HRTEM', 'Hi-Resolution Transmission Electron Microscope.\r\nMade By: JEOL, Japan', 'machine.jpg', '5000.00', 'sir 1'),
(2, 'SCIF2', 'MRS', 'Micro-Raman Spectrometer\r\nMade By: HORIBA France, LABRAM HR Evolution', 'machine.jpg', '200.00', 'sir 2'),
(3, 'SCIF3', 'XRD', 'X-Ray Diffractometer (XRD)\r\nMade By: BRUKER', 'machine.jpg', '1000.00', 'sir 3');

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
(1, 'Super', 'User', 'SRM', '1', 'SRM Institutes', 'superuser@scif.com', 'super', '1', 'superuser', NULL, 1, 1),
(2, 'HRTEM', 'Admin', 'SRM', '1', 'SRM Institutes', 'hrtemadmin@scif.com', 'hrtem', '1', 'hrtemadmin', NULL, 1, 1),
(3, 'Raman', 'Admin', 'SRM', '1', 'SRM Institutes', 'ramanadmin@scif.com', 'raman', '1', 'ramanadmin', NULL, 1, 1),
(4, 'HRTEM', 'Admin', 'SRM', '1', 'SRM Institutes', 'xrdadmin@scif.com', 'xrd', '1', 'xrdadmin', NULL, 1, 1),
(5, 'Aam', 'Aadmi', 'SRM', '111', 'Green Pearl', 'aamaadmi@scif.com', 'aa', '2', 'user', NULL, 1, 1),
(6, 'mayank', 'nagda', 'srm', '313', 'a', 'nagdamayank05@gmail.com', 'a', '123', 'user', '55743cc0393b1cb4b8b37d09ae48d097', 0, 1),
(7, 'Sankalp', 'Sinha', 'SRM University', 'RA1511003010379', 'Room No: 328, Pierre Fauchard, SRM University Kattankulathur', 'sankalpsinha.cmos@gmail.com', '1', '8838464151', 'user', 'd709f38ef758b5066ef31b18039b8ce5', 0, 1),
(8, 'Sankalp', 'Sinha', 'SRM Univsersity', 'RA1511003010379', 'A308', 'sankalponfire@gmail.com', '1', '9999999999', 'user', '32bb90e8976aab5298d5da10fe66f21d', 1, 1),
(9, 'A', 'Arora', 'Srm', '677', 'Gahbensn', 'aditi18061998@gmail.com', '1234', '672-7282-388', 'user', '16c222aa19898e5058938167c8ab6c57', 1, 1),
(10, 'Sparsh ', 'Heda', 'SRMIST', 'IDONTKNOW', 'WHY', 'hedasp@gmail.com', 'pppp', '8503810920', 'user', 'e5f6ad6ce374177eef023bf5d0c018b6', 0, 1),
(11, 'Venkat Jayanth', 'A', 'SRM University', 'avjayanth@gmail.com', 'xyz', 'avjayanth@gmail.com', 'jayanth1996', '7598263130', 'user', '9f61408e3afb633e50cdf1b20de6f466', 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
