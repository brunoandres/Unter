-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2018 a las 21:09:16
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails_subgrupos`
--

CREATE TABLE `mails_subgrupos` (
  `id_mail` int(11) NOT NULL,
  `id_subgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mails_subgrupos`
--
ALTER TABLE `mails_subgrupos`
  ADD CONSTRAINT `mails_subgrupos_ibfk_1` FOREIGN KEY (`id_subgrupo`) REFERENCES `subgrupos` (`id`),
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
