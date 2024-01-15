-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2024 um 23:46
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hotel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `extras`
--

CREATE TABLE `extras` (
  `ExtraID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `extras`
--

INSERT INTO `extras` (`ExtraID`, `Name`, `Price`) VALUES
(1, 'Breakfast', 10),
(2, 'Parking', 5),
(3, 'Pets', 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `image` varchar(40) NOT NULL COMMENT 'imagelink',
  `titel` varchar(30) NOT NULL COMMENT 'titel des news beitrag',
  `content` text NOT NULL COMMENT 'news text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `datum`, `image`, `titel`, `content`) VALUES
(14, '2024-01-03', '2024-01-03', 'ERik', 'ERik'),
(15, '2024-01-03', '2024-01-03', 'dsadsad', 'dsadsad'),
(16, '2024-01-03', '2024-01-03', 'dsadsad', 'dsadsad'),
(17, '2024-01-03', '2024-01-03', 'dsadsad', 'dsadsad'),
(18, '2024-01-03', '2024-01-03', 'dsadsad', 'dsadsad'),
(19, '2024-01-18', '2024-01-18', 'ERik', 'ERik'),
(20, '2024-01-23', '2024-01-23', 'anita', 'anita'),
(21, '2024-01-11', '2024-01-11', 'dogu', 'dagukan'),
(22, '2024-01-31', 'ka', 'ka', 'ka'),
(23, '2024-01-17', '', 'bl', 'content'),
(24, '2024-01-17', '', 'bl', 'content'),
(25, '2024-01-24', 'unbennant.jpg', 'eerik', 'dsadsa'),
(26, '2024-01-24', 'unbennant.jpg', 'eerik', 'dsadsa'),
(27, '2024-01-10', 'dsadsad', 'fdasdsa', 'hgfhdgh'),
(28, '2024-01-12', 'jhgfjj', 'dsadsa', 'hfjhjfjhfj'),
(29, '0000-00-00', '', '', ''),
(30, '2024-01-10', 'kjgkhg', 'khgkjhgk', 'vmnvmvbn'),
(31, '0000-00-00', '', '', ''),
(32, '2024-01-10', 'dsadsd', 'dsadsad', 'dsaddsddsa'),
(33, '2024-01-10', 'dsadsd', 'dsadsad', 'dsaddsddsa'),
(34, '2024-01-12', 'ztrztztrzztrz', 'zotzotz', 'ztrztrzrt'),
(35, '2024-01-16', 'Image_created_with_a_mobile_phone.png', 'Bild', 'content'),
(36, '2024-01-04', '', 'hellpo', 'jo'),
(37, '2024-01-04', '', 'hellpo', 'jo'),
(38, '2024-01-04', '', 'hellpo', 'jo'),
(39, '2024-01-04', '', 'hellpo', 'jo'),
(40, '2024-01-04', 'Image_created_with_a_mobile_phone.png', 'hellpo', 'jo'),
(41, '2024-01-04', 'Image_created_with_a_mobile_phone.png', 'hellpo', 'jo'),
(42, '2024-01-03', '', 'rerwr', 'contetn'),
(43, '0000-00-00', '', '', ''),
(44, '0000-00-00', 'Titelbild.jpg', 'dsa', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `ReservationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `CheckInDate` date DEFAULT NULL,
  `CheckOutDate` date DEFAULT NULL,
  `Status` varchar(15) NOT NULL DEFAULT 'neu',
  `breakfast` tinyint(4) NOT NULL DEFAULT 0,
  `parking` tinyint(4) NOT NULL DEFAULT 0,
  `pets` tinyint(4) NOT NULL DEFAULT 0,
  `date-time-stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `reservations`
--

INSERT INTO `reservations` (`ReservationID`, `UserID`, `RoomID`, `CheckInDate`, `CheckOutDate`, `Status`, `breakfast`, `parking`, `pets`, `date-time-stamp`) VALUES
(13, 51, 2, '2024-01-24', '2024-01-31', 'neu', 1, 1, 0, '2024-01-15 22:29:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` int(11) DEFAULT NULL,
  `RoomType` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomNumber`, `RoomType`, `Price`) VALUES
(1, 101, 'Standard', 100),
(2, 201, 'Suite', 200);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT 'ob aktiv oder deactivated',
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `firstname`, `lastname`, `gender`, `active`, `admin`) VALUES
(51, 'erikdittrich11@gmail.com', '$2y$10$ajk.lydtq6.UbR6mBQWE3OL8jrRkAKu1dVlqX13Np1JvSTcjY0PCa', 'erik', 'Erik', 'Dittrich', 'male', 1, 0),
(53, 'admin@admin.com', '$2y$10$UDSNo52SACd6C1alopjyR.PW2BaR55XLlg9kPOHte.kB4gmPNU8x6', 'admins', 'Admin', 'Admin', 'male', 1, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`ExtraID`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indizes für die Tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`RoomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
