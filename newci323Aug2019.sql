-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 01:57 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `bId` int(200) NOT NULL,
  `bTitle` varchar(200) NOT NULL,
  `bBody` text NOT NULL,
  `bDate` datetime NOT NULL,
  `bStatus` int(10) DEFAULT '1',
  `userId` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`bId`, `bTitle`, `bBody`, `bDate`, `bStatus`, `userId`) VALUES
(10, 'Login with google plus in codeigniter', 'Why you always design for login to your client/users on your system/site..? Why they fill your long/short form and validate emails..? Nowadays every person is busy in his life and they don\'t have time to fill your forms for a single comment. It\'s the long procedure to create an account on your application or site, so what is the solution..?', '2018-02-11 00:00:00', 1, 31),
(11, 'again title', 'If you are planning to create/design a system login with google plus or want to use youtube tube data or any google product you must create your project before accessing any Google products data.\r\n\r\nToday we are going to create a project on google console OR we are going to create an API for login with google plus, so follow these...', '2018-02-11 00:00:00', 1, 31),
(12, 'dfdf', '\r\n     dfddf', '2018-02-11 00:00:00', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `cId` int(100) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `userId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `age` int(20) NOT NULL,
  `eLink` varchar(100) NOT NULL,
  `status` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `password`, `date`, `fullName`, `age`, `eLink`, `status`) VALUES
(29, 'info@shakzee.com', 'dc468c70fb574ebd07287b38d0d0676d', '2017-12-02 11:11:01', 'shakzee', 0, 'l8pQjXEob1Mge2y', 0),
(30, 'xyz.com', 'dc468c70fb574ebd07287b38d0d0676d', '2017-12-02 11:18:37', 'xyz', 0, 'PzDN4eWXMsdKLxI', 0),
(31, 'shahzad_raza171@hotmail.com', 'dc468c70fb574ebd07287b38d0d0676d', '2017-12-02 11:34:40', 'Billy', 0, 'ceMhy4XxLzbrWsBok', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`bId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`cId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `bId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `cId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
