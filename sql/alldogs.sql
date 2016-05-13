-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2016 a las 19:21:33
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alldogs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ComentarioNoticia`
--

CREATE TABLE `ComentarioNoticia` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `noticia` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evento`
--

CREATE TABLE `Evento` (
  `id` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticia`
--

CREATE TABLE `Noticia` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Publicidad`
--

CREATE TABLE `Publicidad` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `anuncio` text COLLATE utf8_spanish_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Puntua`
--

CREATE TABLE `Puntua` (
  `usuario` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `categoria` enum('peluqueria','veterinario','residencia','adiestrador','paseador','adopcion') COLLATE utf8_spanish_ci NOT NULL,
  `media_puntuacion` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('admin','gestor','normal','proveedor') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ComentarioNoticia`
--
ALTER TABLE `ComentarioNoticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_idx` (`usuario`),
  ADD KEY `noticia_idx` (`noticia`);

--
-- Indices de la tabla `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Evento_ibfk_1` (`usuario`);

--
-- Indices de la tabla `Noticia`
--
ALTER TABLE `Noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `Publicidad`
--
ALTER TABLE `Publicidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `Puntua`
--
ALTER TABLE `Puntua`
  ADD PRIMARY KEY (`usuario`,`servicio`),
  ADD KEY `servicio` (`servicio`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `n_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ComentarioNoticia`
--
ALTER TABLE `ComentarioNoticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Evento`
--
ALTER TABLE `Evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Noticia`
--
ALTER TABLE `Noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Publicidad`
--
ALTER TABLE `Publicidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ComentarioNoticia`
--
ALTER TABLE `ComentarioNoticia`
  ADD CONSTRAINT `comentarionoticia_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarionoticia_ibfk_2` FOREIGN KEY (`noticia`) REFERENCES `Noticia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `Evento_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

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
