-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 07:40 AM
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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(11) NOT NULL,
  `Commission` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Delivery_Date` date NOT NULL,
  `ProductList_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Commission`, `Amount`, `Date`, `Delivery_Date`, `ProductList_ID`) VALUES
(1, 1, 2, '2018-12-05', '2018-12-31', 1),
(2, 2, 42, '2018-12-01', '2018-12-04', 2),
(3, 3, 12, '2018-11-06', '2018-12-05', 3),
(4, 4, 8, '2018-10-02', '2018-11-15', 4),
(5, 5, 1, '2018-12-07', '2018-12-12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `OrderList_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Author` text NOT NULL,
  `Edition` int(11) NOT NULL,
  `ISBN` text NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Title`, `Author`, `Edition`, `ISBN`, `Price`) VALUES
(1, 'Bard Tales', 'Samuel Harris', 5, '1234567', 55.75),
(2, 'Narnia', 'Jim Carnal', 2, '1234568', 42.1),
(3, 'Huckaberry Finn', 'Harper Lee', 1, '1234569', 88.9),
(4, 'Twilight', 'Stephanie Meyer', 1, '', 12.5),
(5, 'Breaking Dawn', 'Stephanie Meyer', 2, '1234560', 10);

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `ProductList_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `Provider_ID` int(11) NOT NULL,
  `Provider_Name` text NOT NULL,
  `Provider_Phone` int(11) NOT NULL,
  `Provider_Address` text NOT NULL,
  `OrderList_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_ID` int(11) NOT NULL,
  `ProductList_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Count` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`Count`, `Product_ID`) VALUES
(5, 1),
(22, 2),
(47, 3),
(7, 4),
(89, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Login` text NOT NULL,
  `User_Password` text NOT NULL,
  `User_Email` text NOT NULL,
  `User_FullName` text NOT NULL,
  `User_Status` bit(1) NOT NULL,
  `User_LastAccess` datetime NOT NULL,
  `User_LastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Login`, `User_Password`, `User_Email`, `User_FullName`, `User_Status`, `User_LastAccess`, `User_LastUpdate`) VALUES
('32Halbert32', 'choco55tree', 'RioatHalberto@gmail.com', 'Halberto Rio', b'1', '2018-11-23 07:08:00', '2018-11-02 19:22:08'),
('Nikki32', 'IamNikki', 'NikolaTesla@gmail.com', 'Nikola Tesla', b'1', '2018-12-31 16:24:00', '2018-12-17 02:05:03'),
('Oscarito17', 'Obed77', 'ObedisAmazing@yahoo.com', 'Oscar Rodriguez', b'0', '2018-12-18 14:19:03', '2018-12-17 05:06:05'),
('Rebekah22', '1234', 'rebekah14@gmail.com', 'Rebekah Cardenas', b'0', '2018-11-05 02:09:22', '2018-11-22 07:28:32'),
('sammmy22', 'catsarecool', 'Sammantha.King@yahoo.com', 'Samantha King', b'1', '2018-11-14 12:10:45', '2018-11-07 12:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD KEY `Request_ID` (`Request_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`OrderList_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`ProductList_ID`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Provider_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Session_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Login`(25));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `OrderList_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `ProductList_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `Provider_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Request_ID`) REFERENCES `request` (`Request_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
