-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2024 a las 19:01:31
-- Versión del servidor: 8.0.36-0ubuntu0.22.04.1
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qcep`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartat`
--

CREATE TABLE `apartat` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `icono` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `apartat`
--

INSERT INTO `apartat` (`nom`, `icono`, `descripcio`, `link`, `id`) VALUES
('proba2', './img/portada/Captura desde 2024-05-05 23-53-20.png', 'Descriptcio', 'www.thosicodina.cat', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avaluacio`
--

CREATE TABLE `avaluacio` (
  `tipus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `nivell` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `valoracio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `planificacio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `accions` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estrategia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `proces_id` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `avaluacio`
--

INSERT INTO `avaluacio` (`tipus`, `nivell`, `valoracio`, `planificacio`, `accions`, `estrategia`, `proces_id`, `id`) VALUES
('Oportunitat', 'Alt', 'Es comença a treballar al Març 2024', 'Fins 2022', 'Reorganitzar elsprocessos i revisar la documntació, fent-la més funcional', 'De millora', 1, 2),
('234234', 'Baix', '123123', '123', '123123', 'Preventiva', 1, 3),
('123123213', 'Baix', '12312313', '123123213', '123123', 'Preventiva', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `proces_id` int NOT NULL,
  `grupInteres_id` int NOT NULL,
  `sortida` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`proces_id`, `grupInteres_id`, `sortida`) VALUES
(1, 1, 'Projecte Educatiu (PE) revisat'),
(1, 2, '	\r\n\r\nPressupost'),
(1, 9, 'Programació General de centre (PGC)'),
(1, 13, 'Normativa d\'organització i Funcionament de centre (NOFC) actualitzat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `proces_id` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `document`
--

INSERT INTO `document` (`nom`, `tipus`, `link`, `proces_id`, `id`) VALUES
('arrays', 'docs', 'documents/javascriptArrays.docs', 3, 1),
('bootstrap', 'docs', 'documents/htmlBootstrap.docs', 6, 2),
('database table', 'sql', 'documents/database_tables.sql', 9, 3),
('eslint Installation', 'txt', 'documents/javascriptESlint.txt', 3, 4),
('functions', 'pdf', 'documents/javascriptFunctions.pdf', 3, 5),
('introduction to javascript', 'pdf', 'documents/javascriptIntroduction.pdf', 3, 6),
('introduction to PHP', 'pdf', 'documents/phpIntroductions.pdf', 4, 7),
('media query', 'pdf', 'documents/htmlMediaQuery.pdf', 6, 9),
('objects', 'txt', 'documents/javascriptObjects.txt', 3, 10),
('oop objects and hierchary', 'pdf', 'documents/javascriptOOP.pdf', 3, 11),
('php Linux installation', 'pdf', 'documents/phpLinuxInstallation.pdf', 4, 12),
('sass introduction', 'docs', 'documents/htmlSASS.docs', 6, 14),
('structure', 'text', 'documents/javascriptStructures.pdf', 3, 15),
('proba', 'pdf', 'https://proba.com', 7, 17),
('Proba2', '', 'Proba2', 1, 24),
('Yuan', '', '123', 9, 26),
('Thos i Codina2', '', 'https://docs.google.com/document/d/1L1qXd0E-XhyBVPaVXVGYDSiqIdD3Ua_SEdi6u1QPt4E/edit', 1, 28),
('PROJECTE M12: QCEP', '', 'https://docs.google.com/document/d/1OytCfvM2q4S8lV7LAtQGI0MbwGq9LFNgJ0p1SuxSp4Q/edit?usp=drive_link', 1, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `title`, `user_id`, `created_at`) VALUES
(42, 'Bienvenido a Qcep', 7, '2024-05-23 02:43:42'),
(45, 'Prueba 999', 7, '2024-05-23 02:54:57'),
(46, 'Prueba 12', 7, '2024-05-23 08:42:27'),
(48, 'Prueba123', 7, '2024-05-23 10:14:55'),
(56, 'Prueba123', 7, '2024-05-23 13:23:48'),
(57, 'Prueba123Prueba123', 7, '2024-05-23 13:23:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupInteres`
--

CREATE TABLE `grupInteres` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcio` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `grupInteres`
--

INSERT INTO `grupInteres` (`nom`, `descripcio`, `id`) VALUES
('Famílies', 'Famílies amb alumnat al centre', 1),
('Alumnat', 'Alumnat', 2),
('Empreses', 'Empreses', 3),
('Claustre', 'Claustre', 4),
('Equip directiu', 'Equip directiu', 5),
('Comissió de qualitat', 'Comissió de qualitat', 6),
('Professorat', 'Professorat', 7),
('Tutors', 'Tutors', 8),
('Departament d\'educació', 'Departament d\'educació', 9),
('Empresa auditora', 'Empresa auditora', 10),
('Altres centres', 'Altres centres', 11),
('Organismes locals, nacionals, internacionals', 'Organismes locals, nacionals, internacionals', 12),
('Tots els procesos', 'Tots els procesos', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
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

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`id`, `codi`, `nom`, `link`, `curs`, `valoracio`, `proces_id`) VALUES
(1, 'IN047', 'Resultats Alumnat que supera el curs ESO', '', '', '', 1),
(2, 'IN048', 'Resultats Alumnat que supera el curs Batxillerat', '', '', '', 2),
(3, 'IN053', 'Rendiment acadèmic CFGM', '', '', '', 3),
(4, 'IN054', 'Rendiment acadèmic CFGS', '', '', '', 4),
(5, 'IN056', 'Recursos humans : ratios Alumnes / Professors', '', '', '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organitzacio`
--

CREATE TABLE `organitzacio` (
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `web` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `organitzacio`
--

INSERT INTO `organitzacio` (`nom`, `email`, `web`, `logo`, `id`) VALUES
('Thos i Codina', 'django-aula@iesthosicodina.cat', 'www.iesthosicodina.cat', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAaVBMVEX////mARrmABfmABL//Pz3tbvsQVL+7/D/+fr+9PXrJz/nFynnCiHmAAz2rLToGi7lAADrLkP83eH4vsTvY3D6ztL1nKXwd4H0j5n95+ruVGTqQEr1qq/zh5H5x8zvbHbpIzbuTV771dk8pdheAAAI30lEQVR4nO2di5aaMBCGJdwFpdzCTQj4/g9ZkqCruwiJ3aCm852zPbVdJ/zkNkmGYbcDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFGHpwIpEb8SafqSQ/sKMiTkbD+w+LO6xQv+MiyHefz6xQ8rO/aHPTdu62feBDkR9MxC7uhd4xllvIAU8a9R4/MV1k6ZpRHXZeTedL2kdwzSWoaV+DsiMSX6VaFVFZC5e/2epYyAzrM8XiW4ZTf861q8GXOojJMllkIkn1UYUOxqwD5lGZESYDzfndqrYpsBHWwNObR2wIcnMUtYLjwMfZOK5WeQT8ZJjHVJFZo/9He2FAWu3IdZDH8XL45BNOMV5/HQmbPaJanfFofskPBzTajNre/xg17SRohh7q9/7HKyEtVPTweMH7FCFZmNrVIVj38to3zObcvw7brjCVCuFfhZRhXG7uyhEuiq0NlbobXUbfTIqRLcK1bdSK0nLghQtPm8xpHGFaEOFlm+XWdNHfTwUx0S9xrs6dLZQ6HZDRH1iunZzcKK8sd71Q2eDfuimzoEvbMeiDn2ZKCyL8XOkUVyHHTEuAqlGB6uuRNZKDbTfaiytyh7drKNRUOfqCmPwOtxOYc593+tOAWqwusIYWyu8LNCuCnuirjDG1grL5pvCqFZXGONnP1Q70vxUOKgrjLG1QvyjlWbqCmNMCjfzS9PsfjsSxaW6whg/Faqtw6QNbiUiY0jVFcbYWqFl3zXTsXv46gpjbN1Kd9UpuG7UGqZBVE/49yPNFn6pVZ16g50cjK531ObKFxdc4Yae986rMHH6MAyjOCtz1W30FQrp8qIk9VBn7bHaYKH/U+EmO1GeW1X+NvsYP9eH2+y1rUUR/B6br4A35xX9cFt8viPMfKfTwHf1T1oprLKQ7XnTdWiaMYV9q5XCfGC+xUAVVq3BnI2+0+hoxq2ZI2xm3fjBx3vmM4ZZqssBopeUPd8PatkxN2+m46qU4C55QOU+XcGeX/2yScuv5k1O5HbbcAfYOTHvKcEh9/jDOGvLefAxT565ovFi8hTjWZN2lzxxKEst2vMWL5Ah4k4+mjx861xPEs3DI0y0z3Au7Y94rk2cCM2bDEeTiayH6iV2EQfzFm+uli9i4nQy76exsR4SFEYOrpaL/47fkShcshnVJzmTXprtFy1+gVD0FZng2kO4FvQ13oNwT6RWBRUeIsPgoS2PTDaFzAZ/hZtg6QrvPsT4xsV3T2SPVkO7kNHLrOxcXPOAiIUGMvb9thI2WZ2G1cY29UAUZffnP25aOH3wuP4n9UjiTMVLh5DV36M7x49pjEC4ofp2vRJ+N/2Mq9CGHL+b9anGRxKvpyr86F8Eq3JCdPfdb0qvR1HX8WCNLjMvlhaF0lX2cW5ut9yks4+z4NYxp1ixQXCLxS0vc9Ce4NOMzbaexnSzEDPpF/1ljCzw/HUy7PT8qOFbnu+781Tngo+3aF8KTRlWMvDLj4idzJvMscPvQXwSqsSOt3ojIum8xQv+U9ECVl6wKCMUiMVO+ekU0Uke+oJWhePQ+PKt1uBhTqjPOkXbPGlGK3FsdEKn8BU+MIH7pU7mFtx9FNpc9Nia1kC1soM5H/NuEAjdwqT8w7otWaoeq2PtlEefrWC5Q8DusFiFP8W0bx3ODlPfyYs/7JcXAx4tvsjh0WcrWC4PN+wVxt+lNfd7pBTaixU+7RcJKayYQnOvcC8irQ+vV6h0t+X1CmmfBYX/gqTCg/YKoR9SQOEN/41C/fuh5goN7VvpmylUMB/+FyMNKPwnpBUipPtY+usKwS/9V0DhHapWT++kUP8ZHxRSQOEN7zhbIO0V0nM+rWcL/RXqv3oChZTPXlvorxD22iig8IY3VKh/P9Rfof6t9LcVTrEYGkcquCwSEEVY3YNvr1W482kStlGiYJzfM7xYodX2TGHTKnto4sUKd7bDAusCByeKHvF77Wyx2yXsYS0aOF2m56XnLapnH+V4tcIddnhQsWn2zlAPNWX4SZ0VuKueiTF9ucKkja5PFISLRHH2PcuuCK/uhzsrb8NriDe6/Dll3p2iv6c/jCAu5FPsvVzhzu+KSODZFyocGftMNEL+ystbKc1pSZrlp3BuVAaZ7FPxr6/DHX0EYDD+HKZkujd5ddmHKRP0tR0vBijP8BYKWWZ1MsQL7KMprzUyJXOKvYlCy6+Sc94tYLcDr0Wzlkuh8iYKKbMJ+K+4yTG7ZNmV8vDeSOEafsoPqniWXWE+SOHOKm+y7ArzSQp3/KEkJGf5oxS6NzkVhHmDGV8cnjVCMuPWZym8ZFGS+dJnKbzJKigMKLzj1SPNba4vYZ445X6twtEJV9xKfzU2URJqWb1C3fvhm8wWmit8opWijxlLb7KZCTMqRNor/KBWmj3XStEHKQz+C59G7Xz4Dgr1ny30b6X6K9S/HypVSN5jxpfap+kyphAJ7SNPvxwsn3B55InrEOLyRiupe5eTA99HFjjusI78XQHRSvazYk/Hg7749RiZM9svNYeTzJeSktdhL3DymLQsp1MYr+R9xo5JTzOd305C77UsXRDP7imMb0+pn7LlzrWjOVEbFjYRZSu/2RGTBTplv/sSKPfIzy0kExJdMkiinpzO1UKurSQtG56Wq1l7Y05V8pRmUZEumpSi6nDNqsJ0TnI3zsW8ElHYFKfHL8k84oyfto9Vs9ZlLf5uwtFk3S6YlOKISTzFM8hGiFlJzfMyIvPwOJFkOP7vdM48HFdtVqdLZtHlhIEymOZ0dcLZ/L4kplOmQCEOscC8YiVE0duG77J7CuPb2Xoa0KkAM8Yip+heQvp/lTjzdYTCu+yewlQ26dcSMzL7KBqw2AvkrK51QrRuU0YhLb9+8u1uft4OS2lAGWHYO0TIuWOccdZEoWCYjAhh0M9k9xTXmJI4PPxZAvXZSSbOwz+XTmQumpThYPT1Uy30C6/KH6QBZdk1O+n8xyPuOV3I2CnDc+XfY3mPsoBO6TWfuH8rJmXwN3qHBgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwP/HXy2CLw7rDgQFAAAAAElFTkSuQmCC', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proces`
--

CREATE TABLE `proces` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `objectiu` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL,
  `usuari_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proces`
--

INSERT INTO `proces` (`nom`, `tipus`, `objectiu`, `id`, `usuari_id`) VALUES
('Planificar i Organitzar el centre', 'Estratègic', 'Elaborar, revisar i mantenir actualitzada la missió o finalitat i la visió del centre educatiu, i planificar i organitzar les accions i les estratègies que les fan possibles', 1, 6),
('Elaborar i revisar el projecte curricular de centre', 'Estratègic', 'Contextualitzar, definir i actualitzar el projecte curricular, programacions de centre', 2, 5),
('Desenvolupar i revisar el Sistema de Gestió', 'Estratègic', 'Crear el marc per a la gestió de la qualitat del centre. Mantenir i millorar el sistema de qualitat', 3, 6),
('Gestionar la comunicació, promoció i relacions', 'Estratègic', 'Crear el marc per la gestió de la comunicació interna i externa del centre', 4, 6),
('Intercanvi experiències pedagògiques i de gestió', 'Estratègic', 'Crear oportunitats de millora interna del centre mitjançant l\'observació i comparació amb experiències d\'altres centres o organitzacions', 5, 5),
('Gestionar la informació i l\'admissió de l\'alumnat', 'Estratègic', 'Planificar i dur a terme les activitats d\'atenció, informació, preinscripció i matricula de l\'alumnat i les inscripcions d\'altres usuaris, per tal de satisfer les necessitats i expectatives dels grups d\'interès (principalment alumnat i famílies)', 6, 5),
('Desenvolupar els ensenyaments-aprenentatges', 'Estratègic', 'Desenvolupar les activitats didàctiques d\'ensenyament, avaluar iqualificar l\'evolució i l\'aprenentatge dels alumnes, d\'acord amb el marc establert en el projecte educatiu i les concrecions i metodologies expressades a les programacions, (per què) per possibilitar el desenvolupament personal, social ', 7, 5),
('Gestionar la satisfacció Alumnat i Famílies', 'Estratègic', 'Conèixer el grau de satisfacció de les necessitats i de les expectatives de l\'alumnat, de les famílies, per tal de disposar de dades i informació que permetin desenvolupar les accions i/o actuacions necessàries per avançar en la millora de la gestió de centre', 9, 5),
('Lorem Ipsum', 'Lorem Ipsum', 'Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum', 40, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proces_puntNorma`
--

CREATE TABLE `proces_puntNorma` (
  `proces_id` int NOT NULL,
  `primerNum` int NOT NULL,
  `segundaNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proces_puntNorma`
--

INSERT INTO `proces_puntNorma` (`proces_id`, `primerNum`, `segundaNum`) VALUES
(1, 1, 0),
(1, 1, 1),
(1, 4, 1),
(40, 4, 1),
(1, 4, 2),
(40, 4, 4),
(1, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proces_recus`
--

CREATE TABLE `proces_recus` (
  `proces_id` int NOT NULL,
  `recurs_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proces_recus`
--

INSERT INTO `proces_recus` (`proces_id`, `recurs_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveidor`
--

CREATE TABLE `proveidor` (
  `proces_id` int NOT NULL,
  `grupInteres_id` int NOT NULL,
  `entrada` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proveidor`
--

INSERT INTO `proveidor` (`proces_id`, `grupInteres_id`, `entrada`) VALUES
(1, 1, 'Veu Alumnes / Famílies'),
(1, 7, 'Necessitats detectades en Ensenyament Aprenentatge'),
(1, 9, 'Normativa i planificació del Departament d\'Ensenyament'),
(1, 10, 'Avaluació de l\'organització');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntNorma`
--

CREATE TABLE `puntNorma` (
  `primerNum` int NOT NULL,
  `segundaNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `puntNorma`
--

INSERT INTO `puntNorma` (`primerNum`, `segundaNum`) VALUES
(1, 0),
(1, 1),
(1, 2),
(1, 3),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurs`
--

CREATE TABLE `recurs` (
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `recurs`
--

INSERT INTO `recurs` (`nom`, `tipus`, `id`) VALUES
('Equip informàtic', 'Infraestrutura', 1),
('Claustre', 'Personal', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int NOT NULL,
  `document_id` int NOT NULL,
  `type` enum('text','image') COLLATE utf8mb4_spanish_ci NOT NULL,
  `content` text COLLATE utf8mb4_spanish_ci,
  `image_url` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `position` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `document_id`, `type`, `content`, `image_url`, `position`) VALUES
(36, 45, 'text', 'Create Document\r\nCreate Document\r\nCreate Document\r\nCreate Document\r\nCreate Document\r\nCreate Document\r\n', '', 0),
(37, 45, 'text', 'Prueba 999Prueba 999Prueba 999Prueba 999', '', 0),
(38, 45, 'image', '', './img/Documentos/Captura desde 2024-05-22 00-03-11.png', 0),
(47, 46, 'text', 'Prueba 12Prueba 12Prueba 12Prueba 12Prueba 12', '', 0),
(48, 46, 'image', '', './img/Documentos/Captura desde 2024-05-22 00-03-11.png', 1),
(55, 48, 'text', 'Create Document\r\nCreate Document\r\nCreate Document\r\nCreate Document\r\n', '', 0),
(61, 56, 'text', 'Prueba123Prueba123Prueba123Prueba123Prueba123Prueba123Prueba123\r\nPrueba123Prueba123Prueba123', '', 0),
(64, 42, 'text', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', '', 0),
(66, 57, 'text', 'Prueba123Prueba123Prueba123', '', 0),
(67, 57, 'image', '', './img/Documentos/Captura desde 2024-05-19 17-05-37.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `es_administrador` tinyint(1) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`email`, `username`, `es_administrador`, `id`) VALUES
('fernandez@outlook.es', 'Ferz', 0, 2),
('gabriel@yahoo.com', 'garbriel', 0, 3),
('izan@gmail.com', 'IZAN', 0, 4),
('joseph@gmail.com', 'BISB', 0, 5),
('yuanduo@gmail.com', 'TalkFox', 1, 6),
('2002duguxiu@gmail.com', 'TalkFox', 1, 7),
('thos.zhao.yuanduo@gmail.com', 'Yuan', 0, 8),
('elizbe@gmail.com', 'elizbe', 1, 12),
('123', '123@gmail.com', 1, 13),
('1234567@gmail.com', 'X5375251J', 1, 16),
('noAdmin1', 'noadmin@gmail.com', 1, 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartat`
--
ALTER TABLE `apartat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avaluacio`
--
ALTER TABLE `avaluacio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proces` (`proces_id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`proces_id`,`grupInteres_id`),
  ADD KEY `grupInteres_id` (`grupInteres_id`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proces_id` (`proces_id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indices de la tabla `grupInteres`
--
ALTER TABLE `grupInteres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proces_id` (`proces_id`);

--
-- Indices de la tabla `organitzacio`
--
ALTER TABLE `organitzacio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proces`
--
ALTER TABLE `proces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuari` (`usuari_id`);

--
-- Indices de la tabla `proces_puntNorma`
--
ALTER TABLE `proces_puntNorma`
  ADD PRIMARY KEY (`proces_id`,`primerNum`,`segundaNum`),
  ADD KEY `primerNum` (`primerNum`,`segundaNum`);

--
-- Indices de la tabla `proces_recus`
--
ALTER TABLE `proces_recus`
  ADD PRIMARY KEY (`proces_id`,`recurs_id`),
  ADD KEY `recurs_id` (`recurs_id`);

--
-- Indices de la tabla `proveidor`
--
ALTER TABLE `proveidor`
  ADD PRIMARY KEY (`proces_id`,`grupInteres_id`),
  ADD KEY `grupInteres_id` (`grupInteres_id`);

--
-- Indices de la tabla `puntNorma`
--
ALTER TABLE `puntNorma`
  ADD PRIMARY KEY (`primerNum`,`segundaNum`);

--
-- Indices de la tabla `recurs`
--
ALTER TABLE `recurs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartat`
--
ALTER TABLE `apartat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `avaluacio`
--
ALTER TABLE `avaluacio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `grupInteres`
--
ALTER TABLE `grupInteres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `organitzacio`
--
ALTER TABLE `organitzacio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proces`
--
ALTER TABLE `proces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `recurs`
--
ALTER TABLE `recurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `usuari`
--
ALTER TABLE `usuari`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avaluacio`
--
ALTER TABLE `avaluacio`
  ADD CONSTRAINT `avaluacio_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`grupInteres_id`) REFERENCES `grupInteres` (`id`);

--
-- Filtros para la tabla `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`);

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `usuari` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `indicador_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`);

--
-- Filtros para la tabla `proces`
--
ALTER TABLE `proces`
  ADD CONSTRAINT `fk_usuari` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id`),
  ADD CONSTRAINT `proces_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id`);

--
-- Filtros para la tabla `proces_puntNorma`
--
ALTER TABLE `proces_puntNorma`
  ADD CONSTRAINT `proces_puntNorma_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`),
  ADD CONSTRAINT `proces_puntNorma_ibfk_2` FOREIGN KEY (`primerNum`,`segundaNum`) REFERENCES `puntNorma` (`primerNum`, `segundaNum`);

--
-- Filtros para la tabla `proces_recus`
--
ALTER TABLE `proces_recus`
  ADD CONSTRAINT `proces_recus_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`),
  ADD CONSTRAINT `proces_recus_ibfk_2` FOREIGN KEY (`recurs_id`) REFERENCES `recurs` (`id`);

--
-- Filtros para la tabla `proveidor`
--
ALTER TABLE `proveidor`
  ADD CONSTRAINT `proveidor_ibfk_1` FOREIGN KEY (`proces_id`) REFERENCES `proces` (`id`),
  ADD CONSTRAINT `proveidor_ibfk_2` FOREIGN KEY (`grupInteres_id`) REFERENCES `grupInteres` (`id`);

--
-- Filtros para la tabla `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
