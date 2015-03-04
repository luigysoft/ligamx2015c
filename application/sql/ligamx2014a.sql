-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2014 a las 09:40:20
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ligamx2014a`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_equipos`
--

CREATE TABLE IF NOT EXISTS `c_equipos` (
  `id_equipo` int(3) NOT NULL,
  `equipo` varchar(200) NOT NULL,
  `parti_jugados` int(2) NOT NULL,
  `parti_ganados` int(2) NOT NULL,
  `parti_empatados` int(2) NOT NULL,
  `parti_perdidos` int(2) NOT NULL,
  `goles_favor` int(2) NOT NULL,
  `goles_econtra` int(2) NOT NULL,
  `diferencia` int(2) NOT NULL,
  `activo` int(2) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_equipos`
--

INSERT INTO `c_equipos` (`id_equipo`, `equipo`, `parti_jugados`, `parti_ganados`, `parti_empatados`, `parti_perdidos`, `goles_favor`, `goles_econtra`, `diferencia`, `activo`) VALUES
(1, 'AmÃ©rica', 0, 0, 0, 0, 0, 0, 0, 1),
(2, 'Atlas', 0, 0, 0, 0, 0, 0, 0, 1),
(3, 'Chiapas', 0, 0, 0, 0, 0, 0, 0, 1),
(4, 'Tijuana', 0, 0, 0, 0, 0, 0, 0, 1),
(5, 'Cruz Azul', 0, 0, 0, 0, 0, 0, 0, 1),
(6, 'Guadalajara', 0, 0, 0, 0, 0, 0, 0, 1),
(7, 'LeÃ³n', 0, 0, 0, 0, 0, 0, 0, 1),
(8, 'Morelia', 0, 0, 0, 0, 0, 0, 0, 1),
(9, 'Monterrey', 0, 0, 0, 0, 0, 0, 0, 1),
(10, 'Pachuca', 0, 0, 0, 0, 0, 0, 0, 1),
(11, 'Puebla', 0, 0, 0, 0, 0, 0, 0, 1),
(12, 'UNAM', 0, 0, 0, 0, 0, 0, 0, 1),
(13, 'QuerÃ©taro', 0, 0, 0, 0, 0, 0, 0, 1),
(14, 'Santos', 0, 0, 0, 0, 0, 0, 0, 1),
(15, 'U.A.N.L', 0, 0, 0, 0, 0, 0, 0, 1),
(16, 'Toluca', 0, 0, 0, 0, 0, 0, 0, 1),
(17, 'U. de G.', 0, 0, 0, 0, 0, 0, 0, 1),
(18, 'Veracruz', 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_participantes`
--

CREATE TABLE IF NOT EXISTS `c_participantes` (
  `id_participante` int(3) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL,
  PRIMARY KEY (`id_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_participantes`
--

INSERT INTO `c_participantes` (`id_participante`, `nombre`, `alias`, `correo`, `password`, `activo`) VALUES
(1, 'Alejandra Hernández', 'alehernandezo', 'alehernandezo@hotmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Victor Alfonso Lopez Canchola', 'victor.canchola', 'victor.canchola2012@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(3, 'Luis Sanchez', 'luigynew', 'luigynew@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(4, 'César Santiago', 'santiago.cesar', 'santiago.cesar@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(5, 'Itzel Amaro', 'amaro.estrada', 'amaro.estrada@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(6, 'Jordy Oliver', 'jordyoliver', 'jordyoliver008@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(7, 'Jesús Arriaga', 'chuy', 'quimera475@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(8, 'Francisco Valdez Romo', 'paquito', 'varfe13@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(9, 'Miguel Angel Mendoza Maldonado', 'mikeportero', 'mikeportero@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(10, 'Miguel León', 'miguel.leon', 'eli_lavinge@hotmail.com', '202cb962ac59075b964b07152d234b70', 1),
(11, 'Oso', 'oso.muzquiz', 'oso@hotmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_sedes`
--

CREATE TABLE IF NOT EXISTS `c_sedes` (
  `id_sede` int(3) NOT NULL,
  `sede` varchar(200) NOT NULL,
  `activo` int(2) NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_sedes`
--

INSERT INTO `c_sedes` (`id_sede`, `sede`, `activo`) VALUES
(1, 'La Corregidora', 1),
(2, 'Estadio Caliente', 1),
(3, 'Estadio Azul', 1),
(4, 'Estadio Luis Pirata Fuente', 1),
(5, 'Estadio TechnolÃ³gico', 1),
(6, 'Estadio LeÃ³n', 1),
(7, 'Estadio Jalisco', 1),
(8, 'Estadio Nemesio DÃ­ez Riega', 1),
(9, 'Estadio Omnilife', 1),
(10, 'Estadio JosÃ© Maria Morelos y PavÃ³n', 1),
(11, 'Estadio Corona', 1),
(12, 'Azteca Stadium', 1),
(13, 'Estadio CuauhtÃ©moc', 1),
(14, 'Estadio Universitario', 1),
(15, 'Estadio Hildago', 1),
(16, 'Estadio Victor Manuel Reyna', 1),
(17, 'Estadio OlÃ­mpico Universitario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_nombreJuegos`
--

CREATE TABLE IF NOT EXISTS `c_nombreJuegos` (
  `id_nombreJuego` int(3) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` int(2) NOT NULL,
  PRIMARY KEY (`id_nombreJuego`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_nombreJuegos`
--

INSERT INTO `c_nombreJuegos` (`id_nombreJuego`, `nombre`, `activo`) VALUES
(1, 'Jornada 1', 1),
(2, 'Jornada 2', 1),
(3, 'Jornada 3', 0),
(4, 'Jornada 4', 0),
(5, 'Jornada 5', 0),
(6, 'Jornada 6', 0),
(7, 'Jornada 7', 0),
(8, 'Jornada 8', 0),
(9, 'Jornada 9', 0),
(10, 'Jornada 10', 0),
(11, 'Jornada 11', 0),
(12, 'Jornada 12', 0),
(13, 'Jornada 13', 0),
(14, 'Jornada 14', 0),
(15, 'Jornada 15', 0),
(16, 'Jornada 16', 0),
(17, 'Jornada 17', 0),
(18, 'Cuartos de final', 0);




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_partidos`
--

CREATE TABLE IF NOT EXISTS `m_partidos` (
  `id_partido` int(3) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `hora` varchar(11) NOT NULL,
  `grupo` char(11) NOT NULL,
  `sede` int(50) NOT NULL,
  `local` int(3) NOT NULL,
  `goles_local` char(11) DEFAULT NULL,
  `goles_visit` char(11) DEFAULT NULL,
  `bandera` char(10) DEFAULT NULL,
  `visitante` int(3) NOT NULL,
  `jornada` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_partido`),
  KEY `local` (`local`),
  KEY `visitante` (`visitante`),
  KEY `sede` (`sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `m_partidos`
--

INSERT INTO `m_partidos` (`id_partido`, `fecha`, `hora`, `grupo`, `sede`, `local`, `goles_local`, `goles_visit`, `bandera`, `visitante`, `jornada`) VALUES
(1, '18 de julio de 2014', '19:30', '', 1, 13, NULL, NULL, NULL, 12, 1),
(2, '18 de julio de 2014', '21:30', '', 2, 4, NULL, NULL, NULL, 11, 1),
(3, '19 de julio de 2014', '17:00', '', 3, 5, NULL, NULL, NULL, 10, 1),
(4, '19 de julio de 2014', '17:00', '', 4, 18, NULL, NULL, NULL, 14, 1),
(5, '19 de julio de 2014', '19:00', '', 5, 9, NULL, NULL, NULL, 17, 1),
(6, '19 de julio de 2014', '20:00', '', 6, 7, NULL, NULL, NULL, 1, 1),
(7, '19 de julio de 2014', '21:00', '', 7, 2, NULL, NULL, NULL, 15, 1),
(8, '20 de julio de 2014', '12:00', '', 8, 16, NULL, NULL, NULL, 8, 1),
(9, '20 de julio de 2014', '17:00', '', 9, 6, NULL, NULL, NULL, 3, 1),
(10, '25 de julio de 2014', '19:30', '', 10, 8, NULL, NULL, NULL, 2, 2),
(11, '25 de julio de 2014', '21:30', '', 11, 14, NULL, NULL, NULL, 5, 2),
(12, '26 de julio de 2014', '17:00', '', 12, 1, NULL, NULL, NULL, 4, 2),
(13, '26 de julio de 2014', '17:00', '', 13, 11, NULL, NULL, NULL, 18, 2),
(14, '26 de julio de 2014', '19:00', '', 7, 17, NULL, NULL, NULL, 13, 2),
(15, '26 de julio de 2014', '19:00', '', 14, 15, NULL, NULL, NULL, 7, 2),
(16, '26 de julio de 2014', '20:06', '', 15, 10, NULL, NULL, NULL, 9, 2),
(17, '26 de julio de 2014', '21:00', '', 16, 3, NULL, NULL, NULL, 16, 2),
(18, '27 de julio de 2014', '12:00', '', 17, 12, NULL, NULL, NULL, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_pronosticos`
--

CREATE TABLE IF NOT EXISTS `m_pronosticos` (
  `id_partido` int(3) NOT NULL,
  `id_participante` int(3) NOT NULL,
  `goles_local` char(11) NOT NULL,
  `goles_visit` char(11) NOT NULL,
  `aciertos` int(5) DEFAULT NULL,
  `puntos` int(5) DEFAULT NULL,
  `bandera` char(10) DEFAULT NULL,
  `activo` int(2) NOT NULL,
  PRIMARY KEY (`id_partido`,`id_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_partidos`
--
ALTER TABLE `m_partidos`
  ADD CONSTRAINT `m_partidos_ibfk_1` FOREIGN KEY (`local`) REFERENCES `c_equipos` (`id_equipo`),
  ADD CONSTRAINT `m_partidos_ibfk_2` FOREIGN KEY (`visitante`) REFERENCES `c_equipos` (`id_equipo`),
  ADD CONSTRAINT `m_partidos_ibfk_3` FOREIGN KEY (`sede`) REFERENCES `c_sedes` (`id_sede`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Estructura de tabla para la tabla `c_nombreJuegos`
--

CREATE TABLE IF NOT EXISTS `r_participantesJuegos` (
  `id_participantesJuego` int(3) NOT NULL AUTO_INCREMENT,
  `id_participante` int(3) NOT NULL,
  `id_nombreJuego` int(3) NOT NULL,
  PRIMARY KEY (`id_participantesJuego`,`id_participante`,`id_nombreJuego`),
  KEY `fk_r_participantesJuegos_c_participantes1` (`id_participante`),
  KEY `fk_r_participantesJuegos_c_nombreJuegos1` (`id_nombreJuego`),
  CONSTRAINT `fk_r_participantesJuegos_c_participantes1` FOREIGN KEY (`id_participante`) REFERENCES `c_participantes` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_r_participantesJuegos_c_nombreJuegos1` FOREIGN KEY (`id_nombreJuego`) REFERENCES `c_nombreJuegos` (`id_nombreJuego`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `r_participantesuegos`
--

INSERT INTO `r_participantesJuegos` (`id_participantesJuego`, `id_participante`, `id_nombreJuego`) VALUES
(1, 8, 1);
