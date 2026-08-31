-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 04:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `clusters` int(11) NOT NULL,
  `course_from` varchar(116) NOT NULL,
  `course_to` varchar(116) NOT NULL,
  `status` varchar(116) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clusters`
--

CREATE TABLE `clusters` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `cluster_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(123) NOT NULL,
  `name` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(2, 'COMPUTER SCIENCE'),
(3, 'MATHEMATICS'),
(4, 'FOOD SCIENCE'),
(5, 'INFORMATION TECHNOLOGY'),
(6, 'EDUCATION'),
(7, 'AGRICULTURE');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(123) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `cluster_points` varchar(30) NOT NULL,
  `no_of_students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `pname`, `dept`, `cluster_points`, `no_of_students`) VALUES
(1, 'BCS', 'COMPUTER SCIENCE', '50', 66),
(5, 'BMC', 'MATHEMATICS', '38', 45),
(6, 'BIT', 'COMPUTER SCIENCE', '44', 45);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(123) NOT NULL,
  `fullname` varchar(123) NOT NULL,
  `regno` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `idnumber` int(123) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `program` varchar(40) NOT NULL,
  `date_admission` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `cluster_points` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `regno`, `email`, `idnumber`, `dob`, `sex`, `dept`, `program`, `date_admission`, `photo`, `cluster_points`) VALUES
(7, 'Johana Nyaga', 'CT201/998/19', 'user@gmail.com1', 456565, '2021-12-09', 'male', 'MATHEMATICS', 'BMC', '2021-12-02', 'upload/logo2.j', '38'),
(10, 'Mercy Njoki', 'CS/999/19', 'mercy@students.max', 2345678, '2021-12-10', 'female', 'INFORMATION TECHNOLOGY', 'BCS', '2021-12-09', 'upload/default.jpg', '38'),
(11, 'dennis ke', 'rtrty55', 'usewr@gmail.com', 2147483647, '2021-12-09', 'male', 'MATHEMATICS', 'BMC', '2021-12-17', 'upload/default.jpg', '38'),
(12, 'Tesr Bill', 'CT201/998/199', 'user@gmail.com', 4565652, '2021-12-09', 'male', 'FOOD SCIENCE', 'BMC', '2021-12-06', 'upload/default.jpg', '55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clusters`
--
ALTER TABLE `clusters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clusters`
--
ALTER TABLE `clusters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
