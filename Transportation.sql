-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 11:08 PM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Transportation`
--

-- --------------------------------------------------------

--
-- Table structure for table `Train`
--

CREATE TABLE `Train` (
  `ID` int(11) NOT NULL,
  `SOURCE` varchar(255) NOT NULL,
  `DESTINATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Main table';

--
-- Dumping data for table `Train`
--
-- --------------------------------------------------------

--
-- Table structure for table `Train_details`
--

CREATE TABLE `Train_details` (
  `ID` int(11) NOT NULL,
  `Train_no` int(255) NOT NULL,
  `Train_name` varchar(255) NOT NULL,
  `Train_source` varchar(255) NOT NULL,
  `Arival_time` varchar(255) NOT NULL,
  `Destination_time` varchar(255) NOT NULL,
  `Distance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Train_details`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `Train`
--
ALTER TABLE `Train`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
