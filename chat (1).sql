-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Wrz 2021, 21:45
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `chat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `email` text NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nazwa`, `email`, `haslo`) VALUES
(1, 'test', 'test@test', '$2y$10$mMJ8cqEcqR14bUVwznxtj.0yBuesbHXYki0G4UTGpLFmmIGP/ft9e'),
(2, 'siema', 'siema@siema', '$2y$10$0EXsqiZ/OCxeQunAuA/bO.iLdBO/28le7nyZ7u/2o4GIF1aTZM2GC');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `autor` text NOT NULL,
  `tresc` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wiadomosci`
--

INSERT INTO `wiadomosci` (`id`, `autor`, `tresc`, `data`) VALUES
(44, '1', 'tetst', '2021-09-28 19:38:42'),
(45, '1', 'elo', '2021-09-28 19:52:28'),
(46, '1', 'witam', '2021-09-28 19:52:33'),
(47, '1', 'witam', '2021-09-28 19:54:56'),
(48, '1', 'witam', '2021-09-28 19:54:57'),
(49, '1', 'witam', '2021-09-28 19:55:11'),
(50, '1', 'witamasdsa', '2021-09-28 19:55:33'),
(51, '1', 'siema', '2021-09-28 20:05:17'),
(52, '1', 'siema', '2021-09-28 20:05:18'),
(53, '1', 'test', '2021-09-28 20:07:00'),
(54, '1', 'testsdds', '2021-09-28 20:07:07'),
(55, '1', 'siema', '2021-09-28 20:10:32'),
(56, '1', 'jaktam', '2021-09-28 20:10:37'),
(57, '1', 'jaktam', '2021-09-28 20:10:58'),
(58, '1', 'jaktam', '2021-09-28 20:11:18'),
(59, '1', 'jaktam', '2021-09-28 20:11:27'),
(60, '1', '1', '2021-09-28 20:12:07'),
(61, '1', '1', '2021-09-28 20:12:31'),
(62, '1', 'elo', '2021-09-28 20:14:42'),
(63, '1', 'milo mi', '2021-09-28 20:14:49'),
(64, '1', 'jak tam?', '2021-09-28 20:15:08'),
(65, '1', 'elo', '2021-09-28 20:16:36'),
(66, '1', 'elo', '2021-09-28 20:16:59'),
(67, '1', 'test', '2021-09-28 20:18:40'),
(68, '1', 'witam', '2021-09-28 20:19:12'),
(69, '1', 'witam', '2021-09-28 20:28:59'),
(70, '1', 'siema', '2021-09-28 20:29:45'),
(71, '1', 'siema', '2021-09-28 20:30:07'),
(72, '1', 'test', '2021-09-28 20:32:47'),
(73, '1', 'test', '2021-09-28 20:33:44'),
(74, '2', '', '2021-09-28 20:39:34'),
(75, '2', 'elo', '2021-09-28 20:39:48'),
(76, '2', 'witam', '2021-09-28 20:57:24'),
(77, '2', 'tst', '2021-09-28 20:59:23'),
(78, '2', 'witam', '2021-09-28 21:12:32'),
(79, '1', 'siema', '2021-09-28 21:12:39'),
(80, '1', 'XD', '2021-09-28 21:12:45'),
(81, '1', 'olol', '2021-09-28 21:13:09');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
