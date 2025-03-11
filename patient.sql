-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 06:54 AM
-- Server version: 8.0.41
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `first_name` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `ssn` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`first_name`, `last_name`, `dob`, `ssn`) VALUES
('Andrew', 'd\'Arms', '2003-07-08', 123456789),
('John', 'Smith', '2025-02-06', 0),
('Bob', 'Dylan', '2014-08-13', 789003456);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phoneNumber` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `passwordHash` varchar(60) NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `profilePic` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
