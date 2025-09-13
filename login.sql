-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2025 at 03:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mabit`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Nama` varchar(180) NOT NULL,
  `NIK` char(11) NOT NULL,
  `Password` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Nama`, `NIK`, `Password`) VALUES
('Nira Haazh', '14501350600', 'Vxq133HZm1135AUHP14SFq1135AU'),
('Sinta Rahmawati', '22332250282', '12345678'),
('Hudayullah Ayasya Khoirizal', '2410511102', 'SFFKX2006'),
('Johnny Armtrindst', '24113202711', '24113202711'),
('Jamarqus Haarkel Dwinkleberry', '24552310704', 'KARFBHKDKD2010HP1'),
('Syakira Sunabong', '32011523411', 'PieceOfPiePiPhi31456'),
('Ahmad Jawalriziq', '32012688312', 'Password123455'),
('Reza Maulana', '33120702235', 'RezaCoolestOne'),
('Najwa halfarqus', '44211512085', 'NajwaHalfarus'),
('Siti Nur Aisyah', '99212027113', 'RoyaltyOnMyDNA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
