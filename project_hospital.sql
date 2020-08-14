-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2020 at 06:17 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `password`) VALUES
(1, 'adminmoonnew', '$2y$10$aYjgwHL7s40yuOHyN2U14OcI/GwTGqoXA1.ZenHD853gXWGXvb7uu');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialization` varchar(255) NOT NULL,
  `patientId` int(11) NOT NULL,
  `patientName` varchar(255) NOT NULL,
  `patientContact` varchar(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `consultancyFees` int(5) NOT NULL,
  `appointmentDate` varchar(255) DEFAULT current_timestamp(),
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `specialization`, `patientId`, `patientName`, `patientContact`, `doctorId`, `doctorName`, `consultancyFees`, `appointmentDate`, `postingDate`, `status`) VALUES
(1, 'Gynecologist', 2, 'Jon Doe', '01234456789', 2, 'Jon Doe', 500, '11th Aug, 2020', '2020-08-08 03:43:14', 1),
(5, 'Cardiology', 6, 'Jessy', '09876543212', 7, 'Jim Doe', 458, '17th Aug, 2020', '2020-08-14 14:18:13', 1),
(10, 'Emergency', 3, 'Jim Doe', '01834724406', 1, 'Moon Kabir', 500, '17th Aug, 2020', '2020-08-14 17:31:39', 1),
(9, 'Cardiology', 5, 'kabir', '01834724406', 7, 'Jim Doe', 458, '17th Aug, 2020', '2020-08-14 16:48:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `specialization` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fees` int(11) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `scheduleTime` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `specialization`, `name`, `address`, `fees`, `contact`, `email`, `scheduleTime`, `status`, `password`, `creationdate`, `updateDate`) VALUES
(1, 'Emergency', 'Moon Kabir', 'Dhaka', 500, '01521217040', 'moonkabir4@gmail.com', '09AM-11AM', 1, '$2y$10$Qelf43r.8Qe3v84EmJfyoezoxYXFIzP9Sq444PDTnyQe8QFTRh2ay', '2020-06-16 18:09:06', '2020-08-08 04:57:18'),
(2, 'Gynecologist', 'Jon Doe', 'Sylhet', 500, '1521255040', 'jon@doe.com', '01PM-3.50PM', 1, '$2y$10$HC4SZ8vSl1KyZCAG/dtYBeECv8OEEUMz55p/Q8gBHf5EF0/AYcZge', '2020-06-16 18:35:53', '2020-06-21 03:06:22'),
(4, 'Emergency', 'kabir', 'Mirpur', 450, '345745', 'kabir@gmail.com', '07PM-09PM', 1, '$2y$10$kd89T0NVqJJM61FZ.zdeRucSlyWSIqEYgZWdEcwj.z4bSXDsJl5RK', '2020-06-20 03:12:04', '2020-06-21 03:18:23'),
(7, 'Cardiology', 'Jim Doe', 'Mirpur', 458, '01531103070', 'jim@doe.com', '09Pm-11.30Pm', 1, '$2y$10$GUViNOFeymg5.ChvU28gLuFeMmgiAQKPzRhKsi1nZdTx.g.jyxoeq', '2020-08-14 13:47:34', '2020-08-14 17:36:38'),
(8, 'Orthopedics', 'Jessy Doe', 'Mohakhali', 768, '98765432123', 'jessy@doe.com', '09AM-11.30AM', 1, '$2y$10$nCXjDNlY9DB1twIVxsdUl.epwJkHEeeb8Nb4Zn92XnyZOKxbYcRK2', '2020-08-14 13:49:39', '2020-08-14 13:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecialization`
--

DROP TABLE IF EXISTS `doctorspecialization`;
CREATE TABLE IF NOT EXISTS `doctorspecialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecialization`
--

INSERT INTO `doctorspecialization` (`id`, `specialization`, `creationDate`) VALUES
(1, 'Emergency', '2020-06-15 17:49:15'),
(2, 'Gynecologist', '2020-06-15 17:49:15'),
(7, 'Dentist', '2020-06-17 05:23:30'),
(9, 'Medicine ', '2020-08-14 13:45:14'),
(10, 'Orthopedics', '2020-08-14 13:45:22'),
(11, 'Cardiology', '2020-08-14 13:45:28'),
(12, 'Homoipathy', '2020-08-14 13:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` varchar(255) DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `address`, `city`, `gender`, `contact`, `email`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Moon Kabir', 'Mitford', 'Dhaka', 'male', '01521217040', 'moonkabir4@gmail.com', '$2y$10$8J542c0nEFbYJGgYC4U.1ez5QNCcvMyygZfQxi8cdGKoD0.Wa2.Pa', '2020-08-08 09:00:46', '0000-00-00 00:00:00'),
(4, 'Jon Doe', 'Mitford', 'Dinajpur', 'female', '01234567890', 'jon@doe.com', '$2y$10$d.A8GTG5kuIAttaCsxgkLemyUpRJ8fSWmVHjL9vUIbwUOnx2bfRAC', '2020-08-08 20:39:51', '2020-08-08 20:39:51'),
(3, 'Jim Doe', 'Mirpur', 'Dhaka', 'female', '01834724406', 'jim@doe.com', '$2y$10$tYYAl0O5U4gq/gMNX4O7DOaIDIXIoIEIaer7Y9qx.mWJSEUFWOkem', '2020-08-08 09:55:09', '2020-08-08 09:55:09'),
(5, 'kabir', 'Mirpur', 'dinajpur', 'male', '01834724406', 'kabir@gmail.com', '$2y$10$GiYvSUs5IV9Gu6sNcSWfq.FrzDcRBbHFlc30fQ11KVu5PEHatnW.K', '2020-08-08 21:08:24', '2020-08-08 21:08:24'),
(6, 'Jessy', 'Kollanpur', 'Dhaka', 'Female', '09876543212', 'jessy@gmail.com', '$2y$10$Hdlen06a.Ms8ac0WS0e61OwwBxnfHJhcial/VDxKJQM0FcKC/Posy', '2020-08-14 19:48:31', '2020-08-14 19:48:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
