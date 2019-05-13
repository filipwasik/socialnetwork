-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 13. Mai 2019 um 09:12
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `commented`
--

CREATE TABLE `commented` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `disliked`
--

CREATE TABLE `disliked` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `friends`
--

CREATE TABLE `friends` (
  `userID1` int(11) NOT NULL,
  `userID2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `liked`
--

CREATE TABLE `liked` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posted`
--

CREATE TABLE `posted` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `likeratio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profile`
--

CREATE TABLE `profile` (
  `status` tinyint(1) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `pic` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='email';

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `username`, `firstname`, `lastname`, `birthdate`, `email`, `password`, `gender`) VALUES
(12, 'test', 'test', 'test', '1299-12-12', 'test@gmail.com', '$2y$10$v2ihxMMJ2aDyodpoUhPLbuyrzPo13vb0Ec2R6zFEYFloyNl1uhDkS', 'male'),
(14, 'thomaswinter', 'thomas', 'winter', '2019-05-01', 'thomas@winter.com', '123', 'male'),
(15, 'eduard', 'eduard', 'eduard', '1999-12-12', 'eduard@gmail.com', '$2y$10$O0zaqpN52vj.q0tgRJniYOBpP4qs3xA9lR8lmRsAhgx7NzKcQxGQm', 'male');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`userID2`);

--
-- Indizes für die Tabelle `posted`
--
ALTER TABLE `posted`
  ADD PRIMARY KEY (`postID`);

--
-- Indizes für die Tabelle `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`userID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
