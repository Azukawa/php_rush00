-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2020 at 09:15 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `droids`
--

-- --------------------------------------------------------

--
-- Table structure for table `droids`
--

CREATE TABLE `droids` (
  `id` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `name` char(12) COLLATE utf8mb4_general_ci NOT NULL,
  `year` int NOT NULL,
  `short` int DEFAULT '0',
  `tall` int DEFAULT '0',
  `round` int DEFAULT '0',
  `astromech` int DEFAULT '0',
  `protocol` int DEFAULT '0',
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `droids`
--

INSERT INTO `droids` (`id`, `name`, `year`, `short`, `tall`, `round`, `astromech`, `protocol`, `price`) VALUES
('d01', 'C3PO', 1977, 0, 1, 0, 0, 1, 5),
('d02', 'R2-D2', 1977, 1, 0, 1, 1, 0, 152),
('d03', 'BB-8', 2018, 1, 0, 1, 0, 0, 100),
('d04', 'GimliBot', 35, 1, 0, 0, 0, 0, 99999999),
('d05', 'RoboCop', 1987, 0, 1, 0, 0, 0, 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` char(12) COLLATE utf8mb4_general_ci NOT NULL,
  `contents` char(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `contents`) VALUES
('2020-11-15 21:11:07', 'dumbo', 'stuff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) DEFAULT NULL,
  `adm` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `admin`, `adm`) VALUES
(2, 'panderss', '$2y$10$mbV4PcBvK4B0lUndbAfou.Ws0FUJuIlEnvXRFEJxUhPUJgMyCDOhG', '2020-11-14 17:31:12', 1, 'yes'),
(3, 'skywalker', '$2y$10$qvjUW9NKvDZFTx6xafhRdO9CNXiyyDUPMalnrBLXW12w1R4kRgqQ6', '2020-11-14 17:55:54', 0, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
