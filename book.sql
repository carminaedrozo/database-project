-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 12:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `User_Login` text NOT NULL,
  `Request_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeorderstatus`
--

CREATE TABLE `employeeorderstatus` (
  `ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `ReceivedCount` int(11) NOT NULL,
  `FufilledStatus` bit(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeorderstatus`
--

INSERT INTO `employeeorderstatus` (`ID`, `Product_ID`, `ReceivedCount`, `FufilledStatus`, `Count`) VALUES
(1, 0, 7, b'00000000000', 44),
(2, 2, 9, b'00000000001', 22),
(3, 3, 34, b'00000000000', 9),
(4, 4, 78, b'00000000001', 90),
(5, 5, 4, b'00000000000', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `OrderList_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`OrderList_ID`, `Order_ID`) VALUES
(1, 1),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `isbn10` varchar(255) NOT NULL,
  `isbn13` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `price` decimal(19,4) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `author`, `edition`, `isbn10`, `isbn13`, `publisher`, `price`, `image_url`) VALUES
(3, 'Essential Calculus: Early Transcendentals', 'James Stewart', '2', '1133112285', '978-1133112280', 'Cengage Learning', '85.0000', 'https://i.ebayimg.com/images/a/T2eC16VHJHIE9nyseF5YBRIRhSKLUw~~/s-l300.jpg'),
(4, 'Database System Concepts', 'Abraham Silberschatz', '6', '0073523321', '978-0073523323', 'McGraw-Hill Education', '161.1500', 'https://images-na.ssl-images-amazon.com/images/I/51PoU%2BwM0iL._SX395_BO1,204,203,200_.jpg'),
(5, 'Cracking the Coding Interview: 189 Programming Questions and Solutions', 'Gayle Laakmann McDowell', '6', '0984782869', '978-0984782857', 'CareerCup', '38.0000', 'https://images-na.ssl-images-amazon.com/images/I/51l5XzLln%2BL._SX348_BO1,204,203,200_.jpg'),
(7, 'Database Systems The Complete Book', 'Garcia-Molina ', '2', '933251867X', '978-9332518674', 'PE', '37.9000', 'https://images-na.ssl-images-amazon.com/images/I/61pBuMLr1cL.jpg'),
(8, 'Database Reliability Engineering: Designing and Operating Resilient Database Systems', 'Laine Campbell', '1', '1491925949', '978-1491925942', 'O\'Reilly Media', '39.9900', 'https://images-na.ssl-images-amazon.com/images/I/51UvR3a63OL._SX379_BO1,204,203,200_.jpg'),
(9, 'Calculus: Early Transcendentals', 'James Stewart ', '8', '9781285741550', '978-1285741550', 'Cengage Learning', '230.0000', 'https://images-na.ssl-images-amazon.com/images/I/41XZVHND-aL._SX423_BO1,204,203,200_.jpg'),
(10, 'Data and Computer Communications', 'William Stallings', '10', '0133506487', '978-0133506488', 'Pearson', '165.2000', 'https://images-na.ssl-images-amazon.com/images/I/51Dz0SiHhZL._SX381_BO1,204,203,200_.jpg'),
(11, 'JavaScript and JQuery: Interactive Front-End Web Development', 'Jon Duckett', '1', '9781118531648', '978-1118531648', 'Wiley', '33.9900', 'https://images-na.ssl-images-amazon.com/images/I/41y31M-zcgL._SX400_BO1,204,203,200_.jpg'),
(12, 'Head First JavaScript Programming: A Brain-Friendly Guide', 'Eric Freeman', '1', '9781449340131', '978-1449340131', 'O\'Reilly Media', '33.7700', 'https://images-na.ssl-images-amazon.com/images/I/51qQTSKL2nL._SX430_BO1,204,203,200_.jpg'),
(13, 'PHP for the Web: Visual QuickStart Guide', 'Larry Ullman', '5', '0134291255', '978-0134291253', 'Peachpit Press', '15.6500', 'https://images-na.ssl-images-amazon.com/images/I/51b5LUjYNrL._SX387_BO1,204,203,200_.jpg'),
(14, 'SQL Queries for Mere Mortals: A Hands-On Guide to Data Manipulation in SQL', 'John L. Viescas', '4', '0134858336', '978-0134858333', 'Addison-Wesley Professional', '22.3000', 'https://images-na.ssl-images-amazon.com/images/I/51bYGTH%2B1wL._SX381_BO1,204,203,200_.jpg'),
(15, 'Grokking Algorithms: An illustrated guide for programmers and other curious people', 'Aditya Bhargava', '1', '1617292230', '978-1617292231', '', '36.2900', 'https://images-na.ssl-images-amazon.com/images/I/61uUPXbhMxL._SX397_BO1,204,203,200_.jpg'),
(16, 'Database System Concepts', 'Abraham Silberschatz', '7', '0078022150', '978-0078022159', 'McGraw-Hill Education', '189.2200', 'https://images-na.ssl-images-amazon.com/images/I/51cq3aAdqNL._SX402_BO1,204,203,200_.jpg');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `insertToList` AFTER INSERT ON `product` FOR EACH ROW INSERT INTO storage VALUES(null, NEW.id, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `Provider_ID` int(11) NOT NULL,
  `Provider_Name` text NOT NULL,
  `Provider_Phone` bigint(11) NOT NULL,
  `Provider_Address` text NOT NULL,
  `OrderList_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`Provider_ID`, `Provider_Name`, `Provider_Phone`, `Provider_Address`, `OrderList_ID`) VALUES
(1, 'Marina Bay', 9561111111, '212 N 1st St', 1),
(2, 'Santa Anna', 9562222222, '515 S Bulberry Ave', 2);

-- --------------------------------------------------------

--
-- Table structure for table `providerorder`
--

CREATE TABLE `providerorder` (
  `Order_ID` int(11) NOT NULL,
  `Commission` double NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Delivered_Date` date NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `providerorder`
--

INSERT INTO `providerorder` (`Order_ID`, `Commission`, `Amount`, `Date`, `Delivered_Date`, `Status_ID`) VALUES
(1, 1, 2, '2018-12-05', '2018-12-31', 1),
(2, 2, 42, '2018-12-01', '2018-12-04', 2),
(3, 3, 12, '2018-11-06', '2018-12-05', 3),
(4, 4, 8, '2018-10-02', '2018-11-15', 4),
(5, 5, 1, '2018-12-07', '2018-12-12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `providerorderstatus`
--

CREATE TABLE `providerorderstatus` (
  `ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `ReceivedCount` int(11) NOT NULL,
  `FulfilledStatus` int(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `providerorderstatus`
--

INSERT INTO `providerorderstatus` (`ID`, `Product_ID`, `ReceivedCount`, `FulfilledStatus`, `Count`) VALUES
(1, 1, 12, 1, 14),
(2, 2, 35, 1, 37),
(3, 3, 12, 0, 78),
(4, 4, 11, 0, 15),
(5, 5, 90, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `requestlist`
--

CREATE TABLE `requestlist` (
  `Request_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestorder`
--

CREATE TABLE `requestorder` (
  `Order_ID` int(11) NOT NULL,
  `Commission` double NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Delivered_Date` date NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestorder`
--

INSERT INTO `requestorder` (`Order_ID`, `Commission`, `Amount`, `Date`, `Delivered_Date`, `Status_ID`) VALUES
(0, 2.2, 555.9, '2018-12-19', '2018-12-31', 1),
(1, 24.7, 900.77, '2018-12-04', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Session_ID` bit(16) NOT NULL,
  `Session_IP` text NOT NULL,
  `Session_State` bit(3) NOT NULL,
  `Session_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `User_Login` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `product_id`, `count`) VALUES
(2, 3, 21),
(3, 4, 43),
(4, 5, 31),
(6, 7, 0),
(7, 8, 39),
(8, 9, 25),
(9, 10, 0),
(10, 11, 0),
(11, 12, 0),
(12, 13, 21),
(13, 14, 47),
(14, 15, 11),
(15, 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `full_name`, `status`) VALUES
(1, 'rebekah14@gmail.com', '$2y$10$mGZTG823vjIo.RB2jGYLLeC1eaMkEjP0c.QM3dIAJ5/5PB93yZ6qe', 'Rebekah Cardenas', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD KEY `Request_ID` (`Request_ID`);

--
-- Indexes for table `employeeorderstatus`
--
ALTER TABLE `employeeorderstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`OrderList_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Provider_ID`);

--
-- Indexes for table `providerorder`
--
ALTER TABLE `providerorder`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `providerorderstatus`
--
ALTER TABLE `providerorderstatus`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `requestlist`
--
ALTER TABLE `requestlist`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `requestorder`
--
ALTER TABLE `requestorder`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Session_ID`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storage_ibfk_1` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeorderstatus`
--
ALTER TABLE `employeeorderstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `OrderList_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `Provider_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestlist`
--
ALTER TABLE `requestlist`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Request_ID`) REFERENCES `requestlist` (`Request_ID`);

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
