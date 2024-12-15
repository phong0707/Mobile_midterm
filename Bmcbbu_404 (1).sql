-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2024 at 02:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BmcBbu404_API`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bmcbbu_404`
--

CREATE TABLE `Bmcbbu_404` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `UserPassword` varchar(200) NOT NULL,
  `UserType` varchar(50) NOT NULL DEFAULT 'user',
  `UserImage` varchar(200) NOT NULL DEFAULT 'default.png',
  `UserEmail` varchar(200) DEFAULT NULL,
  `FullName` varchar(200) NOT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Bmcbbu_404`
--

INSERT INTO `Bmcbbu_404` (`UserID`, `UserName`, `UserPassword`, `UserType`, `UserImage`, `UserEmail`, `FullName`, `PhoneNumber`) VALUES
(50, '2', 'c20ad4d76fe97759aa27a0c99bff6710', 'user', 'default.png', NULL, '2', NULL),
(51, 'Phongz', '202cb962ac59075b964b07152d234b70', 'user', '241215082150-image_picker_2CC9A90C-FB73-469C-899E-3A21454B78E5-30049-00000040E9832675.jpg.jpg', '123@gmail.com', 'Phongz', '0987654321'),
(52, 'Admin', '202cb962ac59075b964b07152d234b70', 'user', '241215082119-image_picker_6AFA8920-6715-42A4-82FF-D71429536D23-30049-00000040BE5E2D12.jpg.jpg', 'Admin@gmail.com', 'Admin', '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bmcbbu_404`
--
ALTER TABLE `Bmcbbu_404`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bmcbbu_404`
--
ALTER TABLE `Bmcbbu_404`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
