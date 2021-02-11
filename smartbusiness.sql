-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 08:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartbusiness`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, ';owije'),
(2, 'new'),
(3, 'Cookies');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_role` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `o_qty` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`o_id`, `u_id`, `u_role`, `p_id`, `o_qty`, `totalamount`) VALUES
(7, 10, 3, 19, 5, 250),
(8, 10, 3, 22, 2, 1000),
(9, 10, 3, 20, 3, 240),
(10, 11, 4, 19, 3, 150),
(11, 11, 4, 22, 2, 1000),
(12, 11, 4, 22, 3, 1500),
(13, 11, 4, 22, 1, 500),
(14, 11, 4, 22, 1, 500),
(15, 12, 3, 20, 3, 240),
(16, 10, 3, 24, 9, 4050),
(17, 10, 3, 20, 5, 400),
(18, 11, 4, 24, 5, 2250),
(19, 11, 4, 22, 4, 2000),
(20, 11, 4, 22, 4, 2000),
(21, 11, 4, 22, 5, 2500),
(22, 11, 4, 22, 5, 2500),
(23, 11, 4, 22, 5, 2500),
(24, 11, 4, 19, 5, 250),
(25, 11, 4, 22, 4, 2000),
(26, 11, 4, 22, 5, 2500),
(27, 11, 4, 24, 5, 2250),
(28, 11, 4, 22, 5, 2500),
(29, 11, 4, 24, 6, 2700),
(30, 11, 4, 19, 1, 50),
(31, 10, 3, 20, 1, 0),
(32, 10, 3, 24, 1, 0),
(33, 11, 4, 20, 1, 0),
(34, 11, 4, 22, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_disc` varchar(200) NOT NULL,
  `p_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`p_id`, `cat_id`, `p_name`, `p_img`, `p_qty`, `p_price`, `p_disc`, `p_exp`) VALUES
(19, 1, 'Water Wipes', 'uploads/babycare_400x400.jpg', 10, 50, 'Buy baby water wipes', 2021),
(20, 3, 'Good Day', 'uploads/bis1_400x400.jpg', 15, 80, 'Biscites For sale', 2021),
(21, 2, 'Vasline', 'uploads/bodycare2_400x400.jpg', 6, 200, 'Shampoo for your Hairs', 2021),
(22, 2, 'Oil', 'uploads/hair1_400x400.jpg', 20, 500, 'Oli for hairs to increase growth', 2021),
(23, 3, 'Bravo', 'uploads/bis4_400x400.jpg', 50, 15, 'Bravo biscuit for childs', 2021),
(24, 1, 'Skin Care', 'uploads/Babycare2_400x400.jpg', 50, 450, 'Cream for skin to see fresh', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pass` varchar(32) NOT NULL,
  `u_contact` varchar(11) NOT NULL,
  `u_city` varchar(50) NOT NULL,
  `u_address` varchar(200) NOT NULL,
  `u_role` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_contact`, `u_city`, `u_address`, `u_role`, `Status`) VALUES
(3, 'admin', 'wasay@gmail.com', '123', '03202020', 'karachi', 'karachi123', 1, 1),
(5, 'Stoker', 'rafay@gmail.com', '1234', '0320202554', 'lahore', 'lahore 123rsalknd', 2, 1),
(10, 'distributer', 'honey@gmail.com', '1234', '8432135', 'lahore', 'lahore 121', 3, 1),
(11, 'retailer', 'abc@gmail.com', '123', '0320202554', 'lahore', 'lahore askjbd;a', 4, 1),
(12, 'new', 'new@gmail.com', '123', '0318651', 'karachi', 'lahore 121', 3, 1),
(13, 'nimra', 'nimra@gmail.com', '123', '43516847653', 'karachi', 'shamsi', 1, 1),
(14, 'nimra1', 'new12@gmail.com', '123', '7352435', 'islamabad', ' L 22 new town', 1, 0),
(15, 'nimra123', 'new1234@gmail.com', '123', '43516847653', 'islamabad', 'lahore 121', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `u_roleid` int(11) NOT NULL,
  `u_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`u_roleid`, `u_role`) VALUES
(1, 'admin'),
(2, 'stockiest'),
(3, 'distributer'),
(4, 'retailer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `u_role` (`u_role`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_role` (`u_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`u_roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `u_roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `productdetail` (`p_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `userlogin` (`u_id`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`u_role`) REFERENCES `user_role` (`u_roleid`);

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `productdetail_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`u_role`) REFERENCES `user_role` (`u_roleid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
