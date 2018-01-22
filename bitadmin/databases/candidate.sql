-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 02:28 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `candidate`
--

-- --------------------------------------------------------

--
-- Table structure for table `candi`
--

CREATE TABLE `candi` (
  `nic` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cur_position` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candi`
--

INSERT INTO `candi` (`nic`, `name`, `cur_position`, `file`) VALUES
('5555555', 'Nuwan', 'Silva', '538018.png'),
('911711990V', 'Rajeewa WARL', 'COO', '971503.jpg'),
('9300000000V', 'Thilina Lakshan', 'System Admin', '494912.jpg'),
('930522481V', 'Gevindu Dias Madanayake', 'CEO', '917024.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candi`
--
ALTER TABLE `candi`
  ADD PRIMARY KEY (`nic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
