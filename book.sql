-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 08:23 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `requestid` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(19,2) DEFAULT NULL,
  `total_price` decimal(19,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `requestid`, `product_id`, `quantity`, `price`, `total_price`, `user_id`, `status`) VALUES
(76, 4, 4, 1, '161.15', '161.15', 31, 'Submitted'),
(77, 4, 3, 1, '85.00', '85.00', 31, 'Submitted'),
(78, 1, 5, 1, '38.00', '38.00', 31, 'Submitted'),
(79, 2, 11, 1, '33.99', '33.99', 31, 'Submitted'),
(80, 2, 5, 1, '38.00', '38.00', 31, 'Submitted'),
(81, 3, 4, -9, '161.15', '-1450.35', 31, 'Submitted');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `first_name`, `last_name`, `phone_number`, `address`, `city`, `state`, `zip`, `user_id`) VALUES
(1, 'Rebekah', 'Gonzales', '1-686-640-0771', 'Ap #310-6047 Metus Av.', 'Penrith', 'TX', '03587-025', 1),
(2, 'Nell', 'TeslaBarnes', '1-515-729-3218', 'Ap #179-7432 Ante. Av.', 'Miramichi', 'AL', '4274', 2),
(3, 'Ayanna', 'Dillon', '1-346-577-2603', '9345 Proin Ave', 'Lexington', 'AK', '71020', 3),
(4, 'Gray', 'Finch', '1-577-709-6314\r\n', '3906 Sed Rd.', 'Biloxi', 'AR', '76504', 4),
(5, 'Cullen', 'Dorsey', '', '', '', '', '', 5),
(6, 'Lee', 'Contreras', '', '', '', '', '', 6),
(7, 'Devin', 'Marquez', '', '', '', '', '', 7),
(8, 'Iliana', 'Colon', '', '', '', '', '', 8),
(9, 'Keane', 'Pugh', '', '', '', '', '', 9),
(10, 'Ali', 'Molina', '', '', '', '', '', 10),
(11, 'Rajah', 'Mclaughlin', '', '', '', '', '', 11),
(12, 'Barbara', 'Luna', '', '', '', '', '', 12),
(13, 'Isadora', 'Hogan', '', '', '', '', '', 13),
(14, 'Gregory', 'Leon', '', '', '', '', '', 14),
(15, 'Abraham', 'Carter', '', '', '', '', '', 15),
(16, 'Hilel', 'Kinney', '', '', '', '', '', 16),
(17, 'Demetria', 'Noble', '', '', '', '', '', 17),
(18, 'Kyra', 'Walters', '', '', '', '', '', 18),
(19, 'Colton', 'Jenkins', '', '', '', '', '', 19),
(20, 'Rigel', 'Moody', '', '', '', '', '', 20),
(21, 'Steven', 'Hamilton', '', '', '', '', '', 21),
(22, 'John', 'Estrada', '', '', '', '', '', 22),
(23, 'Sara', 'Rojas', '', '', '', '', '', 23),
(24, 'Delilah', 'Lewis', '', '', '', '', '', 24),
(25, 'Palmer', 'Bruce', '', '', '', '', '', 25),
(26, 'Rebekah', 'Craft', '', '', '', '', '', 26),
(27, 'Christian', 'Owen', '', '', '', '', '', 27),
(28, 'Quemby', 'Gonzalez', '', '', '', '', '', 28),
(29, 'Caleb', 'Howard', '', '', '', '', '', 29),
(30, 'Melinda', 'Merritt', '', '', '', '', '', 30),
(31, 'Inah', 'Guerrero', '', '', '', '', '', 31);

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `title`, `quantity`, `status`) VALUES
(34, 'Data Structures', 8, 1),
(35, 'Math', 0, 1),
(36, 'Math', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Completed');

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
  `price` decimal(19,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `author`, `edition`, `isbn10`, `isbn13`, `publisher`, `price`, `image_url`) VALUES
(3, 'Essential Calculus: Early Transcendentals', 'James Stewart', '2', '1133112285', '978-1133112280', 'Cengage Learning', '85.00', 'https://i.ebayimg.com/images/a/T2eC16VHJHIE9nyseF5YBRIRhSKLUw~~/s-l300.jpg'),
(4, 'Database System Concepts', 'Abraham Silberschatz', '6', '0073523321', '978-0073523323', 'McGraw-Hill Education', '161.15', 'https://images-na.ssl-images-amazon.com/images/I/51PoU%2BwM0iL._SX395_BO1,204,203,200_.jpg'),
(5, 'Cracking the Coding Interview: 189 Programming Questions and Solutions', 'Gayle Laakmann McDowell', '6', '0984782869', '978-0984782857', 'CareerCup', '38.00', 'https://images-na.ssl-images-amazon.com/images/I/51l5XzLln%2BL._SX348_BO1,204,203,200_.jpg'),
(7, 'Database Systems The Complete Book', 'Garcia-Molina ', '2', '933251867X', '978-9332518674', 'PE', '37.90', 'https://images-na.ssl-images-amazon.com/images/I/61pBuMLr1cL.jpg'),
(8, 'Database Reliability Engineering: Designing and Operating Resilient Database Systems', 'Laine Campbell', '1', '1491925949', '978-1491925942', 'O\'Reilly Media', '39.99', 'https://images-na.ssl-images-amazon.com/images/I/51UvR3a63OL._SX379_BO1,204,203,200_.jpg'),
(9, 'Calculus: Early Transcendentals', 'James Stewart ', '8', '9781285741550', '978-1285741550', 'Cengage Learning', '230.00', 'https://images-na.ssl-images-amazon.com/images/I/41XZVHND-aL._SX423_BO1,204,203,200_.jpg'),
(10, 'Data and Computer Communications', 'William Stallings', '10', '0133506487', '978-0133506488', 'Pearson', '165.20', 'https://images-na.ssl-images-amazon.com/images/I/51Dz0SiHhZL._SX381_BO1,204,203,200_.jpg'),
(11, 'JavaScript and JQuery: Interactive Front-End Web Development', 'Jon Duckett', '1', '9781118531648', '978-1118531648', 'Wiley', '33.99', 'https://images-na.ssl-images-amazon.com/images/I/41y31M-zcgL._SX400_BO1,204,203,200_.jpg'),
(12, 'Head First JavaScript Programming: A Brain-Friendly Guide', 'Eric Freeman', '1', '9781449340131', '978-1449340131', 'O\'Reilly Media', '33.77', 'https://images-na.ssl-images-amazon.com/images/I/51qQTSKL2nL._SX430_BO1,204,203,200_.jpg'),
(13, 'PHP for the Web: Visual QuickStart Guide', 'Larry Ullman', '5', '0134291255', '978-0134291253', 'Peachpit Press', '15.65', 'https://images-na.ssl-images-amazon.com/images/I/51b5LUjYNrL._SX387_BO1,204,203,200_.jpg'),
(14, 'SQL Queries for Mere Mortals: A Hands-On Guide to Data Manipulation in SQL', 'John L. Viescas', '4', '0134858336', '978-0134858333', 'Addison-Wesley Professional', '22.30', 'https://images-na.ssl-images-amazon.com/images/I/51bYGTH%2B1wL._SX381_BO1,204,203,200_.jpg'),
(15, 'Grokking Algorithms: An illustrated guide for programmers and other curious people', 'Aditya Bhargava', '1', '1617292230', '978-1617292231', '', '36.29', 'https://images-na.ssl-images-amazon.com/images/I/61uUPXbhMxL._SX397_BO1,204,203,200_.jpg'),
(16, 'Database System Concepts', 'Abraham Silberschatz', '7', '0078022150', '978-0078022159', 'McGraw-Hill Education', '189.22', 'https://images-na.ssl-images-amazon.com/images/I/51cq3aAdqNL._SX402_BO1,204,203,200_.jpg'),
(17, 'PqwHP for wqWeb: Visual Quick', 'qweq', '1', '0134291255', '978-0134291253', 'wewew', '12.00', 'https://images-na.ssl-images-amazon.com/images/I/51b5LUjYNrL._SX387_BO1,204,203,200_.jpg');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `insertToList` AFTER INSERT ON `product` FOR EACH ROW INSERT INTO storage VALUES(null, NEW.id, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `phone_number`, `address`, `city`, `state`, `zip`) VALUES
(1, 'Cengage Learning', '+1 617.289.7700 ', '20 Channel Center Street', 'Boston', 'MA', '02210');

-- --------------------------------------------------------

--
-- Table structure for table `requestslist`
--

CREATE TABLE `requestslist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_requested` datetime DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestslist`
--

INSERT INTO `requestslist` (`id`, `user_id`, `date_requested`, `date_completed`, `total`, `status_id`) VALUES
(1, 31, '2018-12-14 00:00:00', NULL, 0, 1),
(2, 31, '2018-12-14 00:00:00', NULL, 0, 1),
(3, 31, '2018-12-14 00:00:00', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requeststatus`
--

CREATE TABLE `requeststatus` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requeststatus`
--

INSERT INTO `requeststatus` (`id`, `status`) VALUES
(1, 'Commission: Waiting for Admin'),
(2, 'Commission: Waiting for response'),
(3, 'Commission: Denied'),
(4, 'Commission: Accepted'),
(5, 'Processing'),
(6, 'Ready'),
(7, 'Completed'),
(8, 'Cancelled');

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
(15, 16, 9),
(16, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `status`) VALUES
(1, 'rebekah14@gmail.com', '$2y$10$4AgWldoo4ksbXJ.vPr0VVOglZ2Q6aC0qtfVDzazPXWRKhC/KapZi6', 'Admin'),
(2, 'Nullam@maurisa.com', '$2y$10$C24YkQ.64HFPol70hFDSGuDT.jYANIrYa5kCTNGnJjqdSWn61q5ZC', 'Employee'),
(3, 'non.sollicitudin@penatibuset.ca', '$2y$10$stxaMOdR1fr.XN6yaccza.VyksdTyPfPyio2xQJjvYtYE6Wmbte1m', 'Employee'),
(4, 'lacus.pede.sagittis@cursus.org', '$2y$10$ca97FNgwyVPsNh6VV5y03.0P0qtQBDGr.ZrZjSHGJY0n144/V9XcG', 'Employee'),
(5, 'ac.nulla.In@euismodestarcu.org', '$2y$10$7SJc3gXfmqsB9VO2I2urGuq3xZolhfi/usP49StWen3piB8mLsnOm', 'Employee'),
(6, 'Curabitur@Aeneansedpede.com', '$2y$10$PZYAnoZLruclhWeqPGg.6uATwO2zPzScAmDUGyijBw7Wzw0/zvuN6', 'Employee'),
(7, 'purus@at.com', '$2y$10$AmpJqaYtNh6JVfx3JGmnrOmGmY2VT8MI7s3QOceSkN/dN5Jb2RaAG', 'Employee'),
(8, 'dui.Suspendisse.ac@Aliquameratvolutpat.com', '$2y$10$MT/nqYJs.oUvAaNxKbFzCewZJbVBmSLsE17XrOS7JX9uNrLNzTSey', 'Employee'),
(9, 'facilisis.non@maurissit.net', '$2y$10$TY.LJaLhx2.qiZaS2j9ga.qzG8544oUOUuZ43sKdHEtIqiumePEAm', 'Employee'),
(10, 'dignissim.tempor.arcu@apurusDuis.co.uk', '$2y$10$P57P38nWqDGUbV6JnIJSseO2Mt21m2WF7BQ47gMhgy9W84c5aRHQe', 'Employee'),
(11, 'eget@risus.ca', '$2y$10$pIfa2/HvpCzt0FwBjCmObepgnXpHIy106gMXHl0Xr4HvvPOTd5W.6', 'Employee'),
(12, 'In.tincidunt@blanditatnisi.co.uk', '$2y$10$PEERI7I6h38IE6brI5dXgeM4EDBr.pI5uOj./dtnHHioasFmPTOz6', 'Employee'),
(13, 'magna@utaliquamiaculis.ca', '$2y$10$Dbk5Dj611LWNexbwJyI8xuuz2Xa4CRGxwsEKmOSsoS.sT8MulbOHq', 'Employee'),
(14, 'mauris.ipsum@nonenimcommodo.org', '$2y$10$FFG1LsLkxXbG28CTzAvaLeOx21kEM2Fiw0xtvNAtE0Dr7ZEkxQA/6', 'Employee'),
(15, 'leo.elementum@odio.co.uk', '$2y$10$qaMpq04ZoOzc03bGXrzK3uJeY2BuBwzi1UeiKjj9.cM/Y/korhw/2', 'Employee'),
(16, 'ullamcorper.nisl.arcu@consectetuer.edu', '$2y$10$wwd6hu9Pcd/NRogSTfnKt.ahOdAlGG0oc9Q5lm3h.BppDOoYd5RQu', 'Employee'),
(17, 'enim.Curabitur.massa@quisaccumsan.ca', '$2y$10$X4cW9LZi/lgZF3MuHdRrAOrDbmATi//JJWhHNR6wUuDi.9czGML/.', 'Employee'),
(18, 'Donec@Maurisquisturpis.ca', '$2y$10$EPUQZ3MK.iWlj6GhB3bpLOf2J6maBXd9x486pmAQ9xuNR4GhttNk.', 'Employee'),
(19, 'habitant@Mauris.net', '$2y$10$f8f8dwY7Q4HgkhdA5m1qh.CJ0V7DcAMIp/Rer02tobrNMiHY9dO46', 'Employee'),
(20, 'ultrices.iaculis.odio@egestas.edu', '$2y$10$/KE3Wsc1lqvusQ8HrPBbE.AA1yZ4T4u86nkBiEk29AF/Ulq2wTuS2', 'Employee'),
(21, 'nunc.In@lobortisClass.edu', '$2y$10$ro87GqUhXZlzrARiCvhljuuqaSJ5CqPyExjryLbPdUnCFHhUHsTVS', 'Employee'),
(22, 'diam@idlibero.edu', '$2y$10$NAkhQvl0HDPtDrRthXG2ReXfhBTvCx9B7MmFYQijtfZxY2WMDnzGS', 'Employee'),
(23, 'malesuada.fames@Praesentinterdum.ca', '$2y$10$Qsxwcn54Zr/FP0r.aIkGBu.mkGWbEjmLEx6fmOnn7H8AZ1zUoLVZG', 'Admin'),
(24, 'neque@feugiat.net', '$2y$10$WhP4Dj03Zrm4ejY290CcQOt4QfCI3sAm5OTu1xBHlma6NrRzFgPse', 'Admin'),
(25, 'aliquet@risusDonecegestas.ca', '$2y$10$QDbOyRHGba2GT/yVql.JJ.aFX9.TbfI63CotD/kS0roiWKtCVT/BO', 'Admin'),
(26, 'nec@interdum.com', '$2y$10$hNk8IthLzTbu41/x04yOXOvaSFBK1i7DLvaTz45jXT3Q52TaOnaXi', 'Admin'),
(27, 'pharetra@odiotristique.ca', '$2y$10$1mE8zTlPrDpek7TfeeBhXeXaG76AcCp8.3Vfl798O.ESLNNoF5XPe', 'Admin'),
(28, 'penatibus.et.magnis@velitSedmalesuada.net', '$2y$10$G7ZwQ0Dp8Fz9yZBucVJ22OKkAwgLEhtDhkiE9YtrD6m/1pwDXSxry', 'Admin'),
(29, 'sodales.Mauris@netus.edu', '$2y$10$Mu0VNmlR3VwJ7ko03nX9UuoCSdvZbWheLC8aFpExDs.3F7/vnLWTm', 'Employee'),
(30, 'diam@malesuadamalesuada.ca', '$2y$10$fDQFn4S6zkoHFbAD2Rh8Bu3WsYmE99mk6G1MEG4qWGsyQy06YD1u.', 'Employee'),
(31, 'inah@gmail.com', '$2y$10$JY0TfzI8s8zeyOHOBVcnHuBFUf.v0HwEG1.UTli1k7mhe88uzHwAK', 'Employee');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `addProfile` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO info VALUES(null, "" , "" ,"" , "", "","" ,"" , NEW.id)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `requestid` (`requestid`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestslist`
--
ALTER TABLE `requestslist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requeststatus`
--
ALTER TABLE `requeststatus`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requestslist`
--
ALTER TABLE `requestslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requeststatus`
--
ALTER TABLE `requeststatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`requestid`) REFERENCES `requestslist` (`id`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`status`) REFERENCES `orderstatus` (`id`);

--
-- Constraints for table `requestslist`
--
ALTER TABLE `requestslist`
  ADD CONSTRAINT `requestslist_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `requeststatus` (`id`),
  ADD CONSTRAINT `requestslist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
