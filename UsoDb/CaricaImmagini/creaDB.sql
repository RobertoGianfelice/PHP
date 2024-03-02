-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mar 02, 2024 alle 17:54
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `album`
--
CREATE DATABASE IF NOT EXISTS `album` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `album`;

-- --------------------------------------------------------

--
-- Struttura della tabella `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `immagine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Svuota la tabella prima dell'inserimento `images`
--

TRUNCATE TABLE `images`;
--
-- Dump dei dati per la tabella `images`
--

INSERT INTO `images` (`immagine`) VALUES
('image.jpg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`immagine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
