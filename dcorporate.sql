-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 04:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcorporate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminID` int(10) NOT NULL,
  `AdminName` varchar(20) NOT NULL,
  `AdminUsername` varchar(20) NOT NULL,
  `AdminPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `CustID` varchar(10) NOT NULL,
  `CustFName` varchar(25) NOT NULL,
  `CustLName` varchar(25) NOT NULL,
  `CustAddress` varchar(90) NOT NULL,
  `CustEmail` varchar(35) NOT NULL,
  `CustContactNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FeedbackID` int(10) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `OrderID` varchar(10) NOT NULL,
  `CustID` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `EventType` varchar(10) NOT NULL,
  `OrderDate` date NOT NULL,
  `guestnum` int(3) NOT NULL COMMENT 'number of guests',
  `Pricing` int(6) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE `tblorderdetails` (
  `orderdetails` varchar(10) NOT NULL,
  `OrderID` varchar(10) NOT NULL,
  `ProdID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `ProdID` int(10) NOT NULL,
  `ProdName` varchar(20) NOT NULL,
  `ProdType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ProdID`, `ProdName`, `ProdType`) VALUES
(1, 'Cordon Bleu', 'Chicken'),
(2, 'Buffalo Wings', 'Chicken'),
(3, 'Chicken Tenders', 'Chicken'),
(4, 'Chicken Ala King', 'Chicken'),
(5, 'Garlic Chicken', 'Chicken'),
(6, 'Lemon Chicken', 'Chicken'),
(7, 'Chicken Pastel', 'Chicken'),
(8, 'Chicken Nuggets', 'Chicken'),
(9, 'Chicken Pandan', 'Chicken'),
(10, 'Chicken Galantina', 'Chicken'),
(11, 'Garlic Pork Ribs', 'Pork'),
(12, 'Grilled Ribs', 'Pork'),
(13, 'Humba', 'Pork'),
(14, 'Spicy Pork', 'Pork'),
(15, 'Pork Broccoli', 'Pork'),
(16, 'Pork Tonkatsu', 'Pork'),
(17, 'Korean Pork Stew', 'Pork'),
(18, 'Pata Hamonado', 'Pork'),
(19, 'Mongolian Pork', 'Pork'),
(20, 'Pineapple Ribs', 'Pork'),
(21, 'Tempanyaki', 'Beef'),
(22, 'Stroganoff', 'Beef'),
(23, 'Kare-Kare', 'Beef'),
(24, 'Chili Con Carne', 'Beef'),
(25, 'Mechado', 'Beef'),
(26, 'Beef Broccoli', 'Beef'),
(27, 'Callos', 'Beef'),
(28, 'Caldereta', 'Beef'),
(29, 'Teriyaki', 'Beef'),
(30, 'Salpicao', 'Beef'),
(31, 'Baked Mac', 'PastaVeg'),
(32, 'Lasagna', 'PastaVeg'),
(33, 'Palaboc', 'PastaVeg'),
(34, 'Garden Salad', 'PastaVeg'),
(35, 'Caesar Salad', 'PastaVeg'),
(36, 'Carbonara', 'PastaVeg'),
(37, 'Seafood Pasta', 'PastaVeg'),
(38, 'Pansit Canton', 'PastaVeg'),
(39, 'Lumpiang Ubod', 'PastaVeg'),
(40, 'Tri-color Pasta', 'PastaVeg'),
(41, 'Empanada', 'MeriendaDesserts'),
(42, 'Siomai', 'MeriendaDesserts'),
(43, 'Buko Salad', 'MeriendaDesserts'),
(44, 'Coffee Jelly', 'MeriendaDesserts'),
(45, 'Biko', 'MeriendaDesserts'),
(46, 'Maja Blanca', 'MeriendaDesserts'),
(47, 'Ube Halaya', 'MeriendaDesserts'),
(48, 'Sopas', 'MeriendaDesserts'),
(49, 'Dumpling', 'MeriendaDesserts'),
(50, 'Lumpiang Shanghai', 'MeriendaDesserts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`CustID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustID` (`CustID`),
  ADD KEY `PricingID` (`Pricing`),
  ADD KEY `OrderDate` (`OrderDate`);

--
-- Indexes for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD PRIMARY KEY (`orderdetails`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProdID` (`ProdID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`ProdID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `tblcustomer` (`CustID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD CONSTRAINT `tblorderdetails_ibfk_1` FOREIGN KEY (`ProdID`) REFERENCES `tblproduct` (`ProdID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblorderdetails_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `tblorder` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
