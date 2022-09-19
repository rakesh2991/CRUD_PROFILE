-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2022 at 03:56 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19557459_xyz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `User_email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Phone_no` bigint(20) NOT NULL,
  `u_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hobbies` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `languages` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stud_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_name`, `father_name`, `mother_name`, `gender`, `dob`, `User_email`, `u_password`, `Phone_no`, `u_address`, `hobbies`, `languages`, `stud_image`) VALUES
(1, 'g12c', '    g1v', 'g1', 'Male', '2022-09-23', 'g@gmail.com', 'g', 45678, 'ertu    ', 'Reading,Blogging', 'English', 'rakesh.jpg'),
(2, 'sdfsd', 'sdfsdf', 'sdfsd', 'Male', '2022-09-15', 'sdfsd@adfds.com', 'sdfsdfsd', 52345435, 'dfsdf', 'Reading,Blogging', 'English', 'IMG_20220914_125859.jpg'),
(3, 'sdfsd', 'sdfsdf', 'sdfsd', 'Male', '2022-09-15', 'sdfsd@adfds.com', '', 52345435456, 'dfsdf', 'Reading,Blogging', 'English', 'IMG_20220914_125859.jpg'),
(4, 'sdfsd', 'sdfsdf', 'sdfsd', 'Male', '2022-09-15', 'sdfsd@adfds.com', '', 52345435456, 'dfsdf', 'Reading,Blogging', 'English', 'IMG_20220914_125859.jpg'),
(5, 'rak', 'r', 'r', 'Male', '2022-09-14', 'q@gmail.com', 'q', 8770099860, 'zzz', 'Reading,Blogging', 'English', 'IMG20211225184801.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
