-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Lis 2023, 15:43
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kartki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wzory`
--

CREATE TABLE `wzory` (
  `ID` int(11) NOT NULL,
  `Kolor_napisu` varchar(64) NOT NULL,
  `Kolor_tla` varchar(64) NOT NULL,
  `Wielkosc` int(11) NOT NULL,
  `Czcionka` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wzory`
--

INSERT INTO `wzory` (`ID`, `Kolor_napisu`, `Kolor_tla`, `Wielkosc`, `Czcionka`) VALUES
(1, 'Black', 'lightblue', 24, 'Arial Narrow, sans-serif'),
(2, 'Black', 'lightcoral', 24, 'Arial, sans-serif'),
(3, 'Black', 'lightgreen', 24, 'Courier New, monospace'),
(4, 'Black', 'lightsalmon', 24, 'Apple Chancery, cursive'),
(5, 'Black', 'lightyellow', 24, 'Brush Script MT, Brush Script Std, cursive'),
(6, 'Black', 'Burlywood', 24, 'American Typewriter, serif'),
(7, 'White', 'Thistle', 24, 'Jazz LET, fantasy'),
(8, 'White', '#800020', 24, 'Courier'),
(9, 'Black', '#AF6E4D', 24, 'URW Chancery L, cursive'),
(10, 'Black', '#4B92DB', 24, 'Snell Roundhand'),
(11, 'Black', '#E3DAC9', 24, 'Comic Sans MS'),
(12, 'white', '#6F4E37', 24, 'URW Chancery L'),
(13, 'black', '#DAC8AE', 24, 'Jazz LET, fantasy'),
(14, 'white', '#793AFC', 24, 'Brush Script MT, Brush Script Std, cursive'),
(15, 'black', '#D7FEE4', 24, 'Apple Chancery, cursive');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wzory`
--
ALTER TABLE `wzory`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `wzory`
--
ALTER TABLE `wzory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
