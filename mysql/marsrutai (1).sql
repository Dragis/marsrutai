-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 m. Grd 11 d. 14:16
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
(21, 'Kaunas-Vilnius', '2017-12-13', ';Kaunas;Rumsiskes;Vilnius;', ';4;5;', 'Kitas', 2),
(22, 'Iki siauliu ir atgal', '2017-12-14', ';Vilnius;Kaunas;Siauliai;Kaunas;Vilnius;', 'false', 'Kitas', 2),
(23, 'Iš kauno į Ryga', '2017-12-27', ';Kaunas;panevezys;Pasvalys;Jelgava;Ryga;', 'false', 'Kitas', 2),
(24, 'Pasivažinėjimas', '2017-12-12', ';Vilnius;Kur kojos nuves;Vilnius;', 'false', 'Kitas', 2),
(25, 'Vilnius - Kaunas į darbą ir atgal', '2017-12-12', ';Vilnius;Kaunas;Kaunas;Vilnius;', ';1;2;3;4;5;', 'kitas', 2);

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
(1, 'asd', '00:00:00', 20),
(2, 'Kaunas', '08:30:00', 21),
(3, 'Rumsiskes', '09:15:00', 21),
(4, 'Vilnius', '10:10:00', 21),
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
(16, 'Kur kojos nuves', '12:30:00', 24),
(17, 'Vilnius', '20:00:00', 24),
(18, 'Vilnius', '07:00:00', 25),
(19, 'Kaunas', '08:00:00', 25),
(20, 'Kaunas', '18:00:00', 25),
(21, 'Vilnius', '19:00:00', 25);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateCreated` date NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `DateCreated`, `Type`) VALUES
(1, 'naujas', 'naujas', '2017-12-10', 'passenger'),
(2, 'kitas', 'kitas', '2017-12-10', 'driver');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
