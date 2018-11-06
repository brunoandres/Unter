-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2018 a las 18:41:16
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `asunto` text COLLATE utf8_spanish2_ci NOT NULL,
  `cuerpo` text COLLATE utf8_spanish2_ci NOT NULL,
  `adjunto` tinyint(1) NOT NULL,
  `dropbox` text COLLATE utf8_spanish2_ci NOT NULL,
  `enviado` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `descripcion`, `activo`, `asunto`, `cuerpo`, `adjunto`, `dropbox`, `enviado`, `date`) VALUES
(4, 'Abogados', 'Abogados', 1, 'Mail masivo abogados InformaciÃ³n actual', '<h2><u>Mail masivo abogados InformaciÃ³n actual</u></h2>', 0, '', 0, '2018-11-06 15:20:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dominio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mails`
--

INSERT INTO `mails` (`id`, `nombre`, `direccion`, `dominio`, `activo`, `date`) VALUES
(1, 'bruno', 'brunoandres2013@gmail.com', 'GMAIL', 1, '2018-11-05 17:24:15'),
(2, 'bruno', 'andres.942013@hotmail.com', 'HOTMAIL', 1, '2018-11-05 17:24:32'),
(3, 'prueba', 'prueba@gmail.com', 'GMAIL', 0, '2018-11-06 14:05:02'),
(4, 'Prueba ', 'prueba2@gmail.com', 'GMAIL', 1, '2018-11-06 14:11:30'),
(5, 'Nuevo', 'nuevo@hotmail.com', 'HOTMAIL', 1, '2018-11-06 14:12:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails_subgrupos`
--

CREATE TABLE `mails_subgrupos` (
  `id_mail` int(11) NOT NULL,
  `id_subgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mails_subgrupos`
--

INSERT INTO `mails_subgrupos` (`id_mail`, `id_subgrupo`) VALUES
(1, 3),
(2, 3),
(3, 3),
(3, 4),
(4, 3),
(5, 3),
(5, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgrupos`
--

CREATE TABLE `subgrupos` (
  `id` int(11) NOT NULL,
  `fk_id_grupo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `individual` tinyint(1) NOT NULL,
  `asunto` text COLLATE utf8_spanish2_ci NOT NULL,
  `cuerpo` text COLLATE utf8_spanish2_ci NOT NULL,
  `adjunto` text COLLATE utf8_spanish2_ci NOT NULL,
  `dropbox` text COLLATE utf8_spanish2_ci NOT NULL,
  `enviado` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subgrupos`
--

INSERT INTO `subgrupos` (`id`, `fk_id_grupo`, `nombre`, `descripcion`, `activo`, `individual`, `asunto`, `cuerpo`, `adjunto`, `dropbox`, `enviado`, `date`) VALUES
(3, 4, 'Grupo2', 'para pruebas', 1, 1, 'InformaciÃ³n de subgrupo actual', '<p>InformaciÃ³n de subgrupo actual<br></p>', '0', '', 1, '2018-11-06 15:18:59'),
(4, 4, 'Grupo1', 'sdfsdf', 1, 1, 'sdfsdf', '<ol><li>sdfsdf</li><li style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0.5rem; font-family: Roboto, sans-serif; font-weight: 500; line-height: 1.1; color: rgb(0, 0, 0); font-size: 1.75rem; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">sdfsdf</li></ol><h3><br></h3>', '0', '', 0, '2018-11-06 17:20:36'),
(5, 4, 'subgrupo3', 'subgrupo3', 1, 1, 'subgrupo3', '<p><b>subgrupo3</b><br></p>', '0', '', 1, '2018-11-06 15:19:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mails_subgrupos`
--
ALTER TABLE `mails_subgrupos`
  ADD KEY `id_mail` (`id_mail`),
  ADD KEY `id_subgrupo` (`id_subgrupo`);

--
-- Indices de la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `fk_id_grupo` (`fk_id_grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mails_subgrupos`
--
ALTER TABLE `mails_subgrupos`
  ADD CONSTRAINT `mails_subgrupos_ibfk_1` FOREIGN KEY (`id_subgrupo`) REFERENCES `subgrupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mails_subgrupos_ibfk_2` FOREIGN KEY (`id_mail`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  ADD CONSTRAINT `subgrupos_ibfk_1` FOREIGN KEY (`fk_id_grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
