-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 09 jan 2024 om 11:03
-- Serverversie: 5.7.42-0ubuntu0.18.04.1
-- PHP-versie: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `rsvp_completed` tinyint(4) NOT NULL DEFAULT '0',
  `update_datetime` datetime DEFAULT NULL,
  `created_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `guests`
--

--
-- Triggers `guests`
--
DELIMITER $$
CREATE TRIGGER `generate_random_id` BEFORE INSERT ON `guests` FOR EACH ROW BEGIN
    DECLARE random_id INT;
    
    SET random_id = FLOOR(10000 + (RAND() * 90000));
    
    -- Controleer of het gegenereerde ID al bestaat, zo ja, genereer opnieuw
    WHILE EXISTS (SELECT 1 FROM guests WHERE id = random_id) DO
        SET random_id = FLOOR(10000 + (RAND() * 90000));
    END WHILE;
    
    SET NEW.id = random_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rsvp`
--

CREATE TABLE `rsvp` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `attend` tinyint(1) NOT NULL DEFAULT '0',
  `adults` int(11) NOT NULL DEFAULT '1',
  `children` int(11) NOT NULL DEFAULT '0',
  `accommodation` tinyint(4) NOT NULL DEFAULT '0',
  `flight_in` tinyint(4) NOT NULL DEFAULT '0',
  `flight_in_datetime` datetime DEFAULT NULL,
  `flight_in_num` varchar(25) DEFAULT NULL,
  `flight_from` varchar(25) DEFAULT NULL,
  `flight_out` tinyint(4) NOT NULL DEFAULT '0',
  `flight_out_num` varchar(25) DEFAULT NULL,
  `flight_out_datetime` datetime DEFAULT NULL,
  `flight_to` varchar(25) DEFAULT NULL,
  `created_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `rsvp`
--


--
-- Triggers `rsvp`
--
DELIMITER $$
CREATE TRIGGER `generate_random_id_rsvp` BEFORE INSERT ON `rsvp` FOR EACH ROW BEGIN
    DECLARE random_id INT;
    
    SET random_id = FLOOR(10000 + (RAND() * 90000));
    
    -- Controleer of het gegenereerde ID al bestaat, zo ja, genereer opnieuw
    WHILE EXISTS (SELECT 1 FROM rsvp WHERE id = random_id) DO
        SET random_id = FLOOR(10000 + (RAND() * 90000));
    END WHILE;
    
    SET NEW.id = random_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `created_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `last_login`, `ip`, `created_datetime`) VALUES
(1, 'admin', '$2y$10$RdIs42SpmoqvBmZ3YuiXS.HHx5Y8mwwzgpWeN90Bf/ilukZlxRlZy', '2023-08-11 00:09:33', '127.0.0.1', '2023-08-08 17:03:12');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rsvp`
--
ALTER TABLE `rsvp`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `rsvp`
--
ALTER TABLE `rsvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
