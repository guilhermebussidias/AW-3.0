-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-05-2016 a las 17:11:28
-- Versión del servidor: 5.5.47-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alldogs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Eventos`
--

CREATE TABLE IF NOT EXISTS `Eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticia`
--

CREATE TABLE IF NOT EXISTS `Noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Publicidad`
--

CREATE TABLE IF NOT EXISTS `Publicidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `anuncio` text COLLATE utf8_spanish_ci NOT NULL,
  `banner` longblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Puntua`
--

CREATE TABLE IF NOT EXISTS `Puntua` (
  `usuario` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  PRIMARY KEY (`usuario`,`servicio`),
  KEY `servicio` (`servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE IF NOT EXISTS `Servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `categoria` enum('peluqueria','veterinario','residencia','adiestrador','paseador','adopcion') COLLATE utf8_spanish_ci NOT NULL,
  `media_puntuacion` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('admin','gestor','normal','proveedor') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `usuario`, `pass`, `rol`) VALUES
(1, 'perro1', 'perraco', 'normal');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Eventos`
--
ALTER TABLE `Eventos`
  ADD CONSTRAINT `Eventos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Noticia`
--
ALTER TABLE `Noticia`
  ADD CONSTRAINT `Noticia_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Publicidad`
--
ALTER TABLE `Publicidad`
  ADD CONSTRAINT `Publicidad_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Puntua`
--
ALTER TABLE `Puntua`
  ADD CONSTRAINT `Puntua_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `Puntua_ibfk_2` FOREIGN KEY (`servicio`) REFERENCES `Servicio` (`id`);

--
-- Filtros para la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD CONSTRAINT `Servicio_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
