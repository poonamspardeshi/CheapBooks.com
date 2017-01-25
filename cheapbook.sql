-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 05:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheapbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ssn` varchar(10) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ssn`, `name`, `address`, `phone`) VALUES
('123452633', 'Sidney Sheldon', 'New York', '10013829'),
('1234567890', 'Dan Brown', '101, Park Avenue, Ny', '10012230'),
('152762333', 'Danielle Steel', 'Chicago', '162382093'),
('36827333', 'Cecelia Ahern', 'Birmington', '1268782763');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(10) NOT NULL,
  `title` varchar(32) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `publisher` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `year`, `price`, `publisher`) VALUES
('100125602', 'DaVinci Code', '2001', '150', 'GreatMinds'),
('15428562', 'P.S. I love you', '2005', '145', 'ArtWorks'),
('412545854', 'Morning Noon and Night', '1993', '105', 'ArtWorks'),
('454875122', 'Zoya', '2010', '120', 'Greatworks');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `basketId` varchar(13) DEFAULT NULL,
  `ISBN` varchar(10) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`basketId`, `ISBN`, `number`) VALUES
('1001', '412545854', '2'),
('1002', '100125602', '1'),
('1004', '1548562', '1'),
('1005', '15428562', '1'),
('1006', '15428562', '1'),
('1007', '15428562', '1'),
('1008', '15428562', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `username` varchar(10) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`username`, `password`, `address`, `phone`, `email`) VALUES
('piyush', 'piyush123', 'Indore', '25124587', 'piyush@gmail.com'),
('poonam17', 'poo123', 'Arlington,Texas', '685655598', 'poonam17293@gmail.com'),
('Pradyumna', 'paddu123', 'Chandigarh', '44546461321', 'paddu@gmail.com'),
('Santwana', 'santa123', 'Hyderabad,India', '9096848422', 'santa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shippingorder`
--

CREATE TABLE `shippingorder` (
  `ISBN` varchar(10) DEFAULT NULL,
  `warehousecode` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingorder`
--

INSERT INTO `shippingorder` (`ISBN`, `warehousecode`, `username`, `number`) VALUES
('412545854', '101', 'poonam17', '1'),
('15428562', '104', 'piyush', '1'),
('15428562', '104', 'poonam17', '1'),
('15428562', '104', 'poonam17', '1'),
('15428562', '104', 'poonam17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingbasket`
--

CREATE TABLE `shoppingbasket` (
  `basketId` varchar(13) NOT NULL,
  `username` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingbasket`
--

INSERT INTO `shoppingbasket` (`basketId`, `username`) VALUES
('1001', 'poonam17'),
('1002', 'piyush'),
('1003', 'Santwana'),
('1004', 'Pradyumna'),
('1005', 'piyush'),
('1006', 'poonam17'),
('1007', 'poonam17'),
('1008', 'poonam17');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `ISBN` varchar(10) DEFAULT NULL,
  `warehousecode` varchar(10) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`ISBN`, `warehousecode`, `number`) VALUES
('412545854', '101', '14'),
('100125602', '102', '15'),
('454875122', '103', '12'),
('15428562', '104', '10');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehousecode` varchar(10) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehousecode`, `name`, `address`, `phone`) VALUES
('101', 'AmberValley', 'Ambervalley,Chicago', '4525886595'),
('102', 'OnlyBooks', 'NewYork', '1244541122'),
('103', 'Riverdale', 'Riverdale,Brooklyn', '4154525444'),
('104', 'Smartico', 'Arlington,Texas', '123478756');

-- --------------------------------------------------------

--
-- Table structure for table `writtenby`
--

CREATE TABLE `writtenby` (
  `ssn` varchar(20) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writtenby`
--

INSERT INTO `writtenby` (`ssn`, `ISBN`) VALUES
('123452633', '412545854'),
('1234567890', '100125602'),
('152762333', '454875122'),
('36827333', '15428562');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  ADD PRIMARY KEY (`basketId`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehousecode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
