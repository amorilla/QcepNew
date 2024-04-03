-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2024 at 06:58 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcep`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartat`
--

CREATE TABLE `apartat` (
  `nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `icona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcio` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `apartat`
--

INSERT INTO `apartat` (`nom`, `icona`, `descripcio`, `link`, `id`) VALUES
('9001', 'data:image/png;base64,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', 'explain the mechanism of data management, focusing on ISO 9001', 'https://www.iso.org/standard/62085.html', 1),
('Correu', 'data:image/png;base64,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', 'Google Mail, the email needed to connect to our service', 'https://mail.google.com/mail/u/0/#inbox', 2),
('Riscs laboral', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6AA20TBS6Mxbp7I1MysjalG7GhElZ-2g4Jg&usqp=CAU', 'explains the risk while working', 'https://treball.gencat.cat/ca/ambits/seguretat_i_salut_laboral/riscos_i_condicions_treball/', 3);

-- --------------------------------------------------------

--
-- Table structure for table `avaluacio`
--

CREATE TABLE `avaluacio` (
  `tipus` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nivell` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `valoracio` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `planificacio` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `accions` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estrategia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `proces_id` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`nom`, `tipus`, `link`, `proces_id`, `id`) VALUES
('arrays', 'docs', 'documents/javascriptArrays.docs', 3, 1),
('bootstrap', 'docs', 'documents/htmlBootstrap.docs', 6, 2),
('database table', 'sql', 'documents/database_tables.sql', 9, 3),
('eslint Installation', 'txt', 'documents/javascriptESlint.txt', 3, 4),
('functions', 'pdf', 'documents/javascriptFunctions.pdf', 3, 5),
('introduction to javascript', 'pdf', 'documents/javascriptIntroduction.pdf', 3, 6),
('introduction to PHP', 'pdf', 'documents/phpIntroductions.pdf', 4, 7),
('java introduction', 'mp4', 'documents/javaTutorial.mp4', 1, 8),
('media query', 'pdf', 'documents/htmlMediaQuery.pdf', 6, 9),
('objects', 'txt', 'documents/javascriptObjects.txt', 3, 10),
('oop objects and hierchary', 'pdf', 'documents/javascriptOOP.pdf', 3, 11),
('php Linux installation', 'pdf', 'documents/phpLinuxInstallation.pdf', 4, 12),
('poo introduction', 'pdf', 'documents/javaPOO.pdf', 1, 13),
('sass introduction', 'docs', 'documents/htmlSASS.docs', 6, 14),
('structure', 'text', 'documents/javascriptStructures.pdf', 3, 15),
('xpath manual', 'docs', 'documents/xmlXPath.docs', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `grupInteres`
--

CREATE TABLE `grupInteres` (
  `nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcio` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador`
--

CREATE TABLE `indicador` (
  `id` int NOT NULL,
  `codi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `curs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `valoracio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `proces_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organitzacio`
--

CREATE TABLE `organitzacio` (
  `nom` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `web` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `organitzacio`
--

INSERT INTO `organitzacio` (`nom`, `email`, `web`, `logo`, `id`) VALUES
('Bisbe Sivilla', 'a8015171@xtec.cat', 'agora.xtec.cat/institutbisbesivilla', 'data:image/png;base64,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', 1),
('Thos i Codina', '<django-aula@iesthosicodina.cat', 'www.iesthosicodina.cat', 'data:image/png;base64,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', 2);

-- --------------------------------------------------------

--
-- Table structure for table `proces`
--

CREATE TABLE `proces` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `objectiu` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL,
  `usuari_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `proces`
--

INSERT INTO `proces` (`nom`, `tipus`, `objectiu`, `id`, `usuari_id`) VALUES
('M3', 'DAW', 'Java', 1, 6),
('M4', 'DAW', 'XML (Markdown, XPath, XQuery)', 2, 5),
('M6', 'DAW', 'Javascript', 3, 6),
('M7', 'DAW', 'PHP', 4, 6),
('M8', 'DAW', 'GitHub, Servlet', 5, 5),
('M9', 'DAW', 'HTML, CSS, SASS', 6, 5),
('M10', 'DAW', 'FOL', 7, 5),
('M11', 'DAW', 'EIE', 8, 6),
('M12', 'DAW', 'Project', 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `proces_puntNorma`
--

CREATE TABLE `proces_puntNorma` (
  `proces_id` int NOT NULL,
  `primerNum` int NOT NULL,
  `segundaNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proces_recus`
--

CREATE TABLE `proces_recus` (
  `proces_id` int NOT NULL,
  `recurs_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `puntNorma`
--

CREATE TABLE `puntNorma` (
  `primerNum` int NOT NULL,
  `segundaNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recurs`
--

CREATE TABLE `recurs` (
  `nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuari`
--

CREATE TABLE `usuari` (
  `email` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `es_administrador` tinyint(1) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuari`
--

INSERT INTO `usuari` (`email`, `username`, `es_administrador`, `id`) VALUES
('Elizabeth@gmail.com', 'Elizabeth2023', 0, 1),
('fernandez@outlook.es', 'Ferz', 0, 2),
('gabriel@yahoo.com', 'garbriel', 0, 3),
('izan@gmail.com', 'IZAN', 0, 4),
('joseph@gmail.com', 'BISB', 1, 5),
('yuanduo@gmail.com', 'TalkFox', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartat`
--
ALTER TABLE `apartat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaluacio`
--
ALTER TABLE `avaluacio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proces_id` (`proces_id`);

--
-- Indexes for table `grupInteres`
--
ALTER TABLE `grupInteres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proces_id` (`proces_id`);

--
-- Indexes for table `organitzacio`
--
ALTER TABLE `organitzacio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proces`
--
ALTER TABLE `proces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuari` (`usuari_id`);

--
-- Indexes for table `proces_puntNorma`
--
ALTER TABLE `proces_puntNorma`
  ADD PRIMARY KEY (`proces_id`,`primerNum`,`segundaNum`),
  ADD KEY `primerNum` (`primerNum`,`segundaNum`);

--
-- Indexes for table `proces_recus`
--
ALTER TABLE `proces_recus`
  ADD PRIMARY KEY (`proces_id`,`recurs_id`),
  ADD KEY `recurs_id` (`recurs_id`);

--
-- Indexes for table `puntNorma`
--
ALTER TABLE `puntNorma`
  ADD PRIMARY KEY (`primerNum`,`segundaNum`);

--
-- Indexes for table `recurs`
--
ALTER TABLE `recurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartat`
--
ALTER TABLE `apartat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `avaluacio`
--
ALTER TABLE `avaluacio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupInteres`
--
ALTER TABLE `grupInteres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indicador`
--
ALTER TABLE `indicador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organitzacio`
--
ALTER TABLE `organitzacio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proces`
--
ALTER TABLE `proces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recurs`
--
ALTER TABLE `recurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuari`
--
ALTER TABLE `usuari`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`);

--
-- Constraints for table `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `indicador_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`);

--
-- Constraints for table `proces`
--
ALTER TABLE `proces`
  ADD CONSTRAINT `fk_usuari` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id`),
  ADD CONSTRAINT `proces_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id`);

--
-- Constraints for table `proces_puntNorma`
--
ALTER TABLE `proces_puntNorma`
  ADD CONSTRAINT `proces_puntNorma_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`),
  ADD CONSTRAINT `proces_puntNorma_ibfk_2` FOREIGN KEY (`primerNum`,`segundaNum`) REFERENCES `puntNorma` (`primerNum`, `segundaNum`);

--
-- Constraints for table `proces_recus`
--
ALTER TABLE `proces_recus`
  ADD CONSTRAINT `proces_recus_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`),
  ADD CONSTRAINT `proces_recus_ibfk_2` FOREIGN KEY (`recurs_id`) REFERENCES `recurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
