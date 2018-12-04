-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 02:11 AM
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
-- Table structure for table `EmployeeOrderStatus`
--

CREATE TABLE `EmployeeOrderStatus` (
  `ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `ReceivedCount` int(11) NOT NULL,
  `FufilledStatus` bit(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeOrderStatus`
--

INSERT INTO `EmployeeOrderStatus` (`ID`, `Product_ID`, `ReceivedCount`, `FufilledStatus`, `Count`) VALUES
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
-- Table structure for table `ProviderOrder`
--

CREATE TABLE `ProviderOrder` (
  `Order_ID` int(11) NOT NULL,
  `Commission` double NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Delivered_Date` date NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProviderOrder`
--

INSERT INTO `ProviderOrder` (`Order_ID`, `Commission`, `Amount`, `Date`, `Delivered_Date`, `Status_ID`) VALUES
(1, 1, 2, '2018-12-05', '2018-12-31', 1),
(2, 2, 42, '2018-12-01', '2018-12-04', 2),
(3, 3, 12, '2018-11-06', '2018-12-05', 3),
(4, 4, 8, '2018-10-02', '2018-11-15', 4),
(5, 5, 1, '2018-12-07', '2018-12-12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ProviderOrderStatus`
--

CREATE TABLE `ProviderOrderStatus` (
  `ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `ReceivedCount` int(11) NOT NULL,
  `FulfilledStatus` int(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProviderOrderStatus`
--

INSERT INTO `ProviderOrderStatus` (`ID`, `Product_ID`, `ReceivedCount`, `FulfilledStatus`, `Count`) VALUES
(1, 1, 12, 1, 14),
(2, 2, 35, 1, 37),
(3, 3, 12, 0, 78),
(4, 4, 11, 0, 15),
(5, 5, 90, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `RequestList`
--

CREATE TABLE `RequestList` (
  `Request_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RequestOrder`
--

CREATE TABLE `RequestOrder` (
  `Order_ID` int(11) NOT NULL,
  `Commission` double NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Delivered_Date` date NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RequestOrder`
--

INSERT INTO `RequestOrder` (`Order_ID`, `Commission`, `Amount`, `Date`, `Delivered_Date`, `Status_ID`) VALUES
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
  `User_Email` text NOT NULL,
  `User_Password` text NOT NULL,
  `User_FullName` text NOT NULL,
  `User_Status` bit(1) NOT NULL,
  `User_LastAccess` datetime NOT NULL,
  `User_LastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Email`, `User_Password`, `User_FullName`, `User_Status`, `User_LastAccess`, `User_LastUpdate`) VALUES
('RioatHalberto@gmail.com', 'choco55tree', 'Halberto Rio', b'1', '2018-11-23 07:08:00', '2018-11-02 19:22:08'),
('NikolaTesla@gmail.com', 'IamNikki', 'Nikola Tesla', b'1', '2018-12-31 16:24:00', '2018-12-17 02:05:03'),
('ObedisAmazing@yahoo.com', 'Obed77', 'Oscar Rodriguez', b'0', '2018-12-18 14:19:03', '2018-12-17 05:06:05'),
('rebekah14@gmail.com', '1234', 'Rebekah Cardenas', b'0', '2018-11-05 02:09:22', '2018-11-22 07:28:32'),
('Sammantha.King@yahoo.com', 'catsarecool', 'Samantha King', b'1', '2018-11-14 12:10:45', '2018-11-07 12:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD KEY `Request_ID` (`Request_ID`);

--
-- Indexes for table `EmployeeOrderStatus`
--
ALTER TABLE `EmployeeOrderStatus`
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
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Provider_ID`);

--
-- Indexes for table `ProviderOrder`
--
ALTER TABLE `ProviderOrder`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `ProviderOrderStatus`
--
ALTER TABLE `ProviderOrderStatus`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `RequestList`
--
ALTER TABLE `RequestList`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `RequestOrder`
--
ALTER TABLE `RequestOrder`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Session_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EmployeeOrderStatus`
--
ALTER TABLE `EmployeeOrderStatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `OrderList_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `Provider_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `RequestList`
--
ALTER TABLE `RequestList`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Request_ID`) REFERENCES `requestlist` (`Request_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
