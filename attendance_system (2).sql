-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 07:31 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `name` varchar(100) NOT NULL,
  `roll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`name`, `roll`) VALUES
('fahad', 143092),
('habib', 143104),
('karim', 143102),
('ussash', 143093),
('asif', 143120),
('tuhin', 143085);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('fahad', 'fahadruetcse143092', 'admin'),
('user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `roll` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `cycle` varchar(11) NOT NULL,
  `attendance_status` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `course_name` varchar(30) NOT NULL,
  `cycle` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` int(11) NOT NULL,
  `attendance_status` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`course_name`, `cycle`, `name`, `roll`, `attendance_status`, `date`) VALUES
('cse-3200', '1(A)', 'fahad', 143092, 'Present', '2018-03-08'),
('cse-3200', '1(A)', 'habib', 143104, 'Absent', '2018-03-08'),
('cse-3200', '1(A)', 'karim', 143102, 'Present', '2018-03-08'),
('cse-3200', '1(A)', 'ussash', 143093, 'Present', '2018-03-08'),
('cse-3200', '1(A)', 'asif', 143120, 'Absent', '2018-03-08'),
('cse-3200', '1(B)', 'fahad', 143092, 'Present', '2018-03-08'),
('cse-3200', '1(B)', 'habib', 143104, 'Present', '2018-03-08'),
('cse-3200', '1(B)', 'karim', 143102, 'Present', '2018-03-08'),
('cse-3200', '1(B)', 'ussash', 143093, 'Absent', '2018-03-08'),
('cse-3200', '1(B)', 'asif', 143120, 'Present', '2018-03-08'),
('cse-3200', '1(C)', 'fahad', 143092, 'Present', '2018-03-08'),
('cse-3200', '1(C)', 'habib', 143104, 'Absent', '2018-03-08'),
('cse-3200', '1(C)', 'karim', 143102, 'Present', '2018-03-08'),
('cse-3200', '1(C)', 'ussash', 143093, 'Present', '2018-03-08'),
('cse-3200', '1(C)', 'asif', 143120, 'Present', '2018-03-08'),
('cse-3200', '1(D)', 'fahad', 143092, 'Absent', '2018-03-08'),
('cse-3200', '1(D)', 'habib', 143104, 'Present', '2018-03-08'),
('cse-3200', '1(D)', 'karim', 143102, 'Present', '2018-03-08'),
('cse-3200', '1(D)', 'ussash', 143093, 'Absent', '2018-03-08'),
('cse-3200', '1(D)', 'asif', 143120, 'Present', '2018-03-08'),
('cse-3200', '1(E)', 'fahad', 143092, 'Absent', '2018-03-30'),
('cse-3200', '1(E)', 'habib', 143104, 'Present', '2018-03-30'),
('cse-3200', '1(E)', 'karim', 143102, 'Present', '2018-03-30'),
('cse-3200', '1(E)', 'ussash', 143093, 'Present', '2018-03-30'),
('cse-3200', '1(E)', 'asif', 143120, 'Present', '2018-03-30'),
('cse-3200', '2(A)', 'fahad', 143092, 'Present', '2018-04-06'),
('cse-3200', '2(A)', 'habib', 143104, 'Present', '2018-04-06'),
('cse-3200', '2(A)', 'karim', 143102, 'Present', '2018-04-06'),
('cse-3200', '2(A)', 'ussash', 143093, 'Present', '2018-04-06'),
('cse-3200', '2(A)', 'asif', 143120, 'Present', '2018-04-06'),
('cse-3200', '2(A)', 'tuhin', 143085, 'Present', '2018-04-06'),
('cse-3200', '2(B)', 'fahad', 143092, 'Present', '2018-04-06'),
('cse-3200', '2(B)', 'habib', 143104, 'Absent', '2018-04-06'),
('cse-3200', '2(B)', 'karim', 143102, 'Present', '2018-04-06'),
('cse-3200', '2(B)', 'ussash', 143093, 'Present', '2018-04-06'),
('cse-3200', '2(B)', 'asif', 143120, 'Absent', '2018-04-06'),
('cse-3200', '2(B)', 'tuhin', 143085, 'Present', '2018-04-06'),
('cse-3200', '2(D)', 'fahad', 143092, 'Present', '2018-04-07'),
('cse-3200', '2(D)', 'habib', 143104, 'Absent', '2018-04-07'),
('cse-3200', '2(D)', 'karim', 143102, 'Present', '2018-04-07'),
('cse-3200', '2(D)', 'ussash', 143093, 'Present', '2018-04-07'),
('cse-3200', '2(D)', 'asif', 143120, 'Present', '2018-04-07'),
('cse-3200', '2(D)', 'tuhin', 143085, 'Absent', '2018-04-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
