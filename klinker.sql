-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2020 at 08:56 AM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinker`
--

-- --------------------------------------------------------

--
-- Table structure for table `Docenten`
--

CREATE TABLE `Docenten` (
  `ID_Docent` int(11) NOT NULL,
  `Voornaam` varchar(30) NOT NULL,
  `Achternaam` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DocentKopeling`
--

CREATE TABLE `DocentKopeling` (
  `ID_Docent` int(11) NOT NULL,
  `Klas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Leerling`
--

CREATE TABLE `Leerling` (
  `ID_Leerling` int(11) NOT NULL,
  `Voornaam` varchar(30) NOT NULL,
  `Achternaam` varchar(30) NOT NULL,
  `Klas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Punten`
--

CREATE TABLE `Punten` (
  `ID_Punten` int(11) NOT NULL,
  `ID_Leerling` int(11) NOT NULL,
  `ID_Docent` int(11) NOT NULL,
  `Punt` int(1) NOT NULL,
  `Opmerking` text,
  `Datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Docenten`
--
ALTER TABLE `Docenten`
  ADD PRIMARY KEY (`ID_Docent`);

--
-- Indexes for table `Leerling`
--
ALTER TABLE `Leerling`
  ADD PRIMARY KEY (`ID_Leerling`);

--
-- Indexes for table `Punten`
--
ALTER TABLE `Punten`
  ADD PRIMARY KEY (`ID_Punten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Docenten`
--
ALTER TABLE `Docenten`
  MODIFY `ID_Docent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Leerling`
--
ALTER TABLE `Leerling`
  MODIFY `ID_Leerling` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Punten`
--
ALTER TABLE `Punten`
  MODIFY `ID_Punten` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
