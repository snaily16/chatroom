-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 09:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `send_id` varchar(11) NOT NULL,
  `recv_id` varchar(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`send_id`, `recv_id`, `time`, `message`) VALUES
('2019PCP5333', '', '2019-11-05 18:24:22', 'didi'),
('2019PCP5150', '2019PCP5333', '2019-11-05 19:09:21', 'dkjfjkd');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `sid` varchar(11) NOT NULL,
  `fid` varchar(11) NOT NULL,
  `status` enum('0','1','2') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `supervisor_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `image` text NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `fname`, `lname`, `dept`, `year`, `supervisor_name`, `password`, `email`, `phone`, `image`, `dob`) VALUES
('2019IS5392', 'Kirti', 'Dubey', 'is', 2019, 'Prof. Vijay Lakshmi', '1234', 'kirti@gmail.com', 2147483647, 'kk.jpg', '1995-09-23'),
('2019PCP5150', 'Snehal', 'Gharat', 'cse', 2019, 'Neeta Nain', 'hello', 'snaily16@gmail.com', 997522616, 'oW1dGDI.jpg', '1997-04-17'),
('2019PCP5333', 'Shabnam', 'Ali', '', 2019, 'Satyendra ', '12345', 'shabbo@gmail.com', 987654323, 'images.jfif', '0000-00-00'),
('2019PCP5334', 'Deepali', 'Singh', '', 2019, '', '12345', 'deep@gmail.com', 998877334, 'deep.webp', '0000-00-00'),
('2019PCP5335', 'Pratibha', 'Rawat', 'cse', 2019, 'Mr. Arka', '4321', 'prati@gmail.com', 2147483647, 'p.gif', '2019-11-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`sid`,`fid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `user_details` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `user_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
