-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 m. Sau 03 d. 00:10
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marsrutai`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `applications`
--

CREATE TABLE `applications` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Baggage` double NOT NULL,
  `RouteID` int(11) NOT NULL,
  `StopID` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `applications`
--

INSERT INTO `applications` (`ID`, `Username`, `UserID`, `Baggage`, `RouteID`, `StopID`, `Date`) VALUES
(16, 'naujas', 1, 0, 21, 4, '2017-12-13 02:56:25'),
(17, 'naujas', 1, 0, 27, 27, '2017-12-13 03:02:08'),
(18, 'naujas', 1, 0, 22, 9, '2017-12-13 03:39:19'),
(19, 'naujas', 1, 0, 23, 14, '2017-12-13 03:39:22'),
(20, 'naujas', 1, 0, 24, 17, '2017-12-13 03:39:24'),
(21, 'naujas', 1, 0, 25, 21, '2017-12-13 03:39:25'),
(22, 'naujas', 1, 0, 26, 24, '2017-12-13 03:39:28'),
(23, 'naujas', 1, 0, 28, 29, '2017-12-13 03:39:31'),
(24, 'naujas', 1, 0, 29, 33, '2017-12-13 03:39:33'),
(25, 'naujas', 1, 0, 30, 37, '2017-12-13 03:39:36'),
(26, 'Keleivis', 3, 0, 21, 4, '2017-12-13 02:56:25');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `routes`
--

CREATE TABLE `routes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `routeWords` text,
  `weakDays` varchar(255) DEFAULT NULL,
  `Driver` varchar(255) NOT NULL,
  `DriverID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `routes`
--

INSERT INTO `routes` (`ID`, `Name`, `Date`, `routeWords`, `weakDays`, `Driver`, `DriverID`) VALUES
(22, 'Iki siauliu ir atgal', '2017-12-14', ';Vilnius;Kaunas;Siauliai;Kaunas;Vilnius;', 'false', 'Vairuotojas', 4),
(23, 'Iš kauno į Ryga', '2017-12-27', ';Kaunas;panevezys;Pasvalys;Jelgava;Ryga;', 'false', 'Kitas', 2),
(24, 'Pasivažinėjimas', '2017-12-12', ';Vilnius;Kur kojos nuves;Vilnius;', 'false', 'Vairuotojas', 4),
(25, 'Vilnius - Kaunas į darbą ir atgal', NULL, ';Vilnius;Kaunas;Kaunas;Vilnius;', ';1;2;3;4;5;', 'kitas', 2),
(26, 'Į Klaipėda', NULL, ';Vilnius;kaunas;Klaipėda;', ';5;6;', 'kitas', 2),
(27, 'Į Klaipėda', NULL, ';Vilnius;kaunas;Klaipėda;', ';5;6;', 'kitas', 2),
(28, 'Į pasaulio kraštą', '2017-12-28', ';Kaunas;Pasaulio kraštas;', 'false', 'kitas', 2),
(29, 'Panevažys - Kaunas', NULL, ';Panevežys;kaunas;Kaunas;Panevežys;', ';1;2;3;4;5;', 'kitas', 2),
(31, 'Darbo grafikas', '2017-12-13', ';pirma;antra;trecia;ataskaita;', '3;', 'kitas', 2),
(33, 'Vaziuojam', '0000-00-00', ';Vilnius;Kaunas;Kauno stotis;', ';1;2;3;6;7;', 'Vairuotojas', 4),
(34, 'Vaziuojam in miesta', '0000-00-00', ';Draaugystes g.;Centriukas;', 'false', 'vairuotojas2', 6);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `stops`
--

CREATE TABLE `stops` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Time` time NOT NULL,
  `RouteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `stops`
--

INSERT INTO `stops` (`ID`, `Name`, `Time`, `RouteID`) VALUES
(5, 'Vilnius', '10:30:00', 22),
(6, 'Kaunas', '11:40:00', 22),
(7, 'Siauliai', '13:20:00', 22),
(8, 'Kaunas', '15:00:00', 22),
(9, 'Vilnius', '16:10:00', 22),
(10, 'Kaunas', '06:00:00', 23),
(11, 'panevezys', '07:00:00', 23),
(12, 'Pasvalys', '09:30:00', 23),
(13, 'Jelgava', '11:10:00', 23),
(14, 'Ryga', '13:30:00', 23),
(15, 'Vilnius', '12:00:00', 24),
(16, 'Kazkur', '14:30:00', 24),
(17, 'Vilnius', '20:00:00', 24),
(18, 'Vilnius', '07:00:00', 25),
(19, 'Kaunas', '08:00:00', 25),
(20, 'Kaunas', '18:00:00', 25),
(21, 'Vilnius', '19:00:00', 25),
(22, 'Vilnius', '08:00:00', 26),
(23, 'kaunas', '12:00:00', 26),
(24, 'Klaipėda', '16:00:00', 26),
(25, 'Vilnius', '08:00:00', 27),
(26, 'kaunas', '12:00:00', 27),
(27, 'Klaipėda', '16:00:00', 27),
(28, 'Kaunas', '12:00:00', 28),
(29, 'Kraštas', '13:00:00', 28),
(30, 'Panevežys', '07:30:00', 29),
(31, 'kaunas', '08:30:00', 29),
(32, 'Kaunas', '19:30:00', 29),
(33, 'Panevežys', '20:30:00', 29),
(38, 'pirma', '00:00:00', 31),
(39, 'antra', '01:00:00', 31),
(40, 'trecia', '02:00:00', 31),
(41, 'ataskaita', '03:00:00', 31),
(43, 'Vilnius', '08:30:00', 33),
(44, 'Kaunas', '09:00:00', 33),
(45, 'Kauno stotis', '09:10:00', 33),
(46, 'Draaugystes g.', '11:00:00', 34),
(47, 'Centriukas', '12:00:00', 34);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateCreated` date NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `DateCreated`, `Type`, `Phone`) VALUES
(1, 'naujas', 'naujas', '2017-12-10', 'passenger', '868686868'),
(2, 'kitas', 'kitas', '2017-12-10', 'driver', '866868686'),
(3, 'Keleivis', 'pass', '2017-12-13', 'passenger', ''),
(4, 'Vairuotojas', 'vairuotojas', '2017-12-10', 'driver', '866868686'),
(5, 'admin', 'admin', '2017-12-10', 'admin', '866868686'),
(6, 'vairuotojas2', 'pass', '2017-12-22', 'driver', ''),
(8, 'kitasDarvienas', 'kitas', '2017-12-10', 'driver', '866868686'),
(9, 'naujasKeleivis', 'naujas', '2017-12-10', 'passenger', '868686868');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
