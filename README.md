-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 25 maj 2023 kl 07:25
-- Serverversion: 5.7.39
-- PHP-version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bokrejset`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Authors`
--

CREATE TABLE `Authors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Authors`
--

INSERT INTO `Authors` (`id`, `firstname`, `lastname`) VALUES
(2, 'Anthony', 'Doerr'),
(3, 'J.K', 'Rowling'),
(4, 'J.R.R', 'Tolkien'),
(5, 'William', 'Golding'),
(6, 'Jens ', 'Lapidus'),
(7, 'Olivier', 'Nakache');

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `id` int(3) NOT NULL,
  `title` varchar(64) NOT NULL,
  `pages` int(12) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`id`, `title`, `pages`, `author_id`) VALUES
(1, 'Ljuset vi inte ser', 350, 2),
(2, 'Sagan om Härskarringen', 200, 4),
(3, 'Harry Potter', 444, 3),
(4, 'En oväntad vänskap', 166, 7),
(5, 'Flugornas Herre', 328, 5),
(6, 'Snabba cash', 408, 6),
(7, 'Livet Deluxe', 494, 6),
(8, 'Top dogg', 472, 6),
(9, 'Sagan om de två tornen', 352, 4),
(10, 'Sagan om konungens återkomst', 416, 4),
(11, 'Spiran', 225, 5),
(12, 'Det nya folket', 411, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Stina'),
(4, 'Otis'),
(5, 'Juno'),
(6, 'Elsa'),
(7, 'Alba');

-- --------------------------------------------------------

--
-- Tabellstruktur `usersbooks`
--

CREATE TABLE `usersbooks` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `review` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `usersbooks`
--

INSERT INTO `usersbooks` (`id`, `bookid`, `userid`, `review`) VALUES
(1, 4, 7, 'Bra bok'),
(2, 1, 6, 'Bra bok'),
(3, 2, 5, 'Blablbalbllbalbalbal'),
(4, 1, 5, 'hejhejhejhejhjejehjhej'),
(5, 1, 1, 'Mycket bra bok'),
(9, 6, 6, 'asdasd'),
(10, 5, 5, 'Spännande bok'),
(11, 2, 6, 'Älskar sagan om ringen'),
(12, 12, 6, 'Hejhejehej');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `usersbooks`
--
ALTER TABLE `usersbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bookid` (`bookid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Authors`
--
ALTER TABLE `Authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `usersbooks`
--
ALTER TABLE `usersbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `Authors` (`id`);

--
-- Restriktioner för tabell `usersbooks`
--
ALTER TABLE `usersbooks`
  ADD CONSTRAINT `usersbooks_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usersbooks_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
