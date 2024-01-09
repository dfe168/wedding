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

INSERT INTO `guests` (`id`, `name`, `phone`, `token`, `rsvp_completed`, `update_datetime`, `created_datetime`) VALUES
(10653, 'Shad ', '+46737188912', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTk1NTk1MDAsImV4cCI6MTczMTA5NTUwMCwiZGF0YSI6eyJ1c2VyIjoxMDY1Mywid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.7vhlsxUH-9_HFDsVzAykEFH-OY1PzIXMjLxyxxgpfKw', 1, '2023-11-09 20:51:40', '2023-11-09 20:51:40'),
(12689, 'Yad', '+4646737048983', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTk4MDk3NzQsImV4cCI6MTczMTM0NTc3NCwiZGF0YSI6eyJ1c2VyIjoxMjY4OSwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.ob2Z06R14IUlsS8ucNGYSrTXHMRf1AikZeTZ3hOrmWo', 1, '2023-11-12 18:22:54', '2023-11-12 18:22:54'),
(19018, 'Shayie & Shevan ', '+3163118472134', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQzNDQ0MjQsImV4cCI6MTcyNTg4MDQyNCwiZGF0YSI6eyJ1c2VyIjoxOTAxOCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.l4a2YLakf9NJwLbiR2iSfQuWkxs9UBzEngxmF4--ric', 1, '2023-09-10 13:13:44', '2023-09-10 13:13:44'),
(22690, 'Kardo Khorshid ', '+31628338458', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQxMTc3NzUsImV4cCI6MTcyNTY1Mzc3NSwiZGF0YSI6eyJ1c2VyIjoyMjY5MCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.SD-bfRHi8gsLeZRrQIuPPXvsTve548_CCUd50uGbXMc', 1, '2023-09-07 22:16:15', '2023-09-07 22:15:08'),
(27677, 'Shna', '+460762679172', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTk2NTMyMjEsImV4cCI6MTczMTE4OTIyMSwiZGF0YSI6eyJ1c2VyIjoyNzY3Nywid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.EvslbbXy8ravSQefamzXVH6ptc3Pfhoz_fmzbowvvec', 1, '2023-11-10 22:53:41', '2023-11-10 22:53:41'),
(33094, 'james hedhli', '+33+33603866876', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTkzNzE2MjAsImV4cCI6MTczMDkwNzYyMCwiZGF0YSI6eyJ1c2VyIjozMzA5NCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.VKKB9z4MZH93VjC43EkehN0Nj1ogkhnc-pKFWcWvfKo', 1, '2023-11-07 16:40:20', '2023-11-07 16:40:20'),
(43216, 'Sharo Amin ', '+46700777466', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDA4Mjk5NjQsImV4cCI6MTczMjM2NTk2NCwiZGF0YSI6eyJ1c2VyIjo0MzIxNiwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.oTx5gR7fLXBGJ-VBHapCsHMzOTKIaBVXmEExT6PCyNg', 1, '2023-11-24 13:46:04', '2023-11-24 13:46:04'),
(46841, 'Ghufran ', '+971557742010', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQyODkyNzIsImV4cCI6MTcyNTgyNTI3MiwiZGF0YSI6eyJ1c2VyIjo0Njg0MSwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.sIjDKCEdtjnVaTxEPg1uyA-9ycS7rJ2_1u_res1L_eI', 1, '2023-09-09 21:54:32', '2023-09-09 21:54:32'),
(47789, 'Pexsan', '+310031615250939', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQyNjcwODAsImV4cCI6MTcyNTgwMzA4MCwiZGF0YSI6eyJ1c2VyIjo0Nzc4OSwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.eb6i3mLDTge693SnRfMq5QVU8CkjCygVOcfmHTLuSMo', 1, '2023-09-09 15:44:40', '2023-09-09 15:44:40'),
(70297, 'Roza & Shwan ', '+310613749471', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQyNDg1NTYsImV4cCI6MTcyNTc4NDU1NiwiZGF0YSI6eyJ1c2VyIjo3MDI5Nywid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.arCxpp0RiiX-5w33shVupLR54qv6PwcZ_L_sqP2CO9M', 1, '2023-09-09 10:35:56', '2023-09-09 10:35:56'),
(70638, 'Mohammed al saleem', '+31643027042', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTYxMDY2OTYsImV4cCI6MTcyNzY0MjY5NiwiZGF0YSI6eyJ1c2VyIjo3MDYzOCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.jtIFIF8Q7OCrKruAmCCrTkmcQ9EYDtkSzx1l3_PubHA', 1, '2023-09-30 22:44:56', '2023-09-30 22:44:56'),
(79234, 'Dara', '+310642718653', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQ3ODU0MzAsImV4cCI6MTcyNjMyMTQzMCwiZGF0YSI6eyJ1c2VyIjo3OTIzNCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.XxwbUsJMcmkAjm66-6P2--lyLJ5pWjMNB_J3zT0Eiw8', 1, '2023-09-15 15:43:50', '2023-09-07 22:16:27'),
(87710, 'Darren Horspool ', '+33622912652', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTk0MzU0OTksImV4cCI6MTczMDk3MTQ5OSwiZGF0YSI6eyJ1c2VyIjo4NzcxMCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.rtoGZr6FsD1RonTyOuDg4tB7HpxN9OdQDj4YLMg-qjM', 1, '2023-11-08 10:24:59', '2023-11-08 10:24:59'),
(88104, 'Pexan ', '+310031615250939', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTQzNTI3NTYsImV4cCI6MTcyNTg4ODc1NiwiZGF0YSI6eyJ1c2VyIjo4ODEwNCwid2Vic2l0ZSI6IjEyNy4wLjAuMSJ9fQ.JbsaLXVuMSTqHIVlX_e7xcFwUD8zx6NCaLwq4WH2RII', 1, '2023-09-10 15:32:36', '2023-09-10 15:32:36');

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

INSERT INTO `rsvp` (`id`, `guest_id`, `attend`, `adults`, `children`, `accommodation`, `flight_in`, `flight_in_datetime`, `flight_in_num`, `flight_from`, `flight_out`, `flight_out_num`, `flight_out_datetime`, `flight_to`, `created_datetime`) VALUES
(17857, 33094, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-07 16:40:20'),
(26171, 22690, 1, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-07 22:16:15'),
(26976, 88104, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-10 15:32:36'),
(31600, 43216, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-24 13:46:04'),
(31687, 79234, 1, 2, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-07 22:16:27'),
(40891, 12689, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-12 18:22:54'),
(42391, 70638, 1, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-30 22:44:56'),
(50779, 27677, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-10 22:53:41'),
(65804, 47789, 1, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-09 15:44:40'),
(86890, 87710, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-08 10:24:59'),
(88785, 19018, 0, 2, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-10 13:13:44'),
(93259, 46841, 1, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-09 21:54:32'),
(98476, 10653, 0, 2, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-09 20:51:40'),
(99896, 70297, 0, 1, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-09 10:35:56');

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
(1, 'dara', '$2y$10$LSP/2dCaBBkHjrKGY6ARGO43tOPQ1fByReuEETBwOR.I1YLp8AUry', '2023-08-11 00:09:33', '127.0.0.1', '2023-08-08 17:03:12'),
(2, 'rebaz', '$2y$10$B03Ts/sELgBeNufyDQJMeeYXCMTVuLWkx1QMlNqZDbwmw1MjX4Voa', NULL, NULL, '2023-08-17 11:29:04'),
(3, 'shene', '$2y$10$.K3FSIHNRyWFWmk24HYeG.UF3.pC9e7gstuMxLcsIwuZSMvSAr6Mu', NULL, NULL, '2023-08-17 11:29:04');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99897;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
