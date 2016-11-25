-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2016 a las 00:04:07
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataformavotos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `ID` int(11) NOT NULL,
  `Pregunta` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Origen` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Lugar` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL DEFAULT '12:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`ID`, `Pregunta`, `Origen`, `Lugar`, `Fecha`, `Hora`) VALUES
(1, '¿Necesita RITSI una plataforma de votos?', 'prueba', 'local', '2016-11-25', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasconfig`
--

CREATE TABLE `preguntasconfig` (
  `ID` int(11) NOT NULL,
  `universidadID` int(11) NOT NULL,
  `preguntaID` int(11) NOT NULL,
  `fechaPregunta` date NOT NULL,
  `horaComienzo` time NOT NULL,
  `horaFin` time NOT NULL,
  `disponible` varchar(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `preguntasconfig`
--

INSERT INTO `preguntasconfig` (`ID`, `universidadID`, `preguntaID`, `fechaPregunta`, `horaComienzo`, `horaFin`, `disponible`) VALUES
(1, 1, 1, '2016-11-25', '12:00:00', '12:15:00', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadosfcan`
--

CREATE TABLE `resultadosfcan` (
  `Clave` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `preguntaID` int(11) NOT NULL,
  `Voto1` set('FAV','CON','ABS','NUL') COLLATE latin1_spanish_ci NOT NULL,
  `Voto2` set('FAV','CON','ABS','NUL') COLLATE latin1_spanish_ci NOT NULL,
  `Voto3` set('FAV','CON','ABS','NUL') COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `IP` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Siglas` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Comentario` varchar(255) COLLATE latin1_spanish_ci DEFAULT 'Sin comentario',
  `Usuario` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Pass` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `ultimaConexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimaIP` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Siglas`, `Nombre`, `Comentario`, `Usuario`, `Pass`, `ultimaConexion`, `ultimaIP`) VALUES
(1, 'UPV - EHU', 'Universidad del País Vasco - Euskal Herriko Unibertsitatea', 'Sin comentario', 'upv_ehu', '12345678', '2016-11-25 16:26:17', '127.0.0.1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `preguntasconfig`
--
ALTER TABLE `preguntasconfig`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `universidadID` (`universidadID`),
  ADD KEY `preguntaID` (`preguntaID`);

--
-- Indices de la tabla `resultadosfcan`
--
ALTER TABLE `resultadosfcan`
  ADD PRIMARY KEY (`Clave`),
  ADD KEY `preguntaID` (`preguntaID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `preguntasconfig`
--
ALTER TABLE `preguntasconfig`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntasconfig`
--
ALTER TABLE `preguntasconfig`
  ADD CONSTRAINT `preguntasconfig_ibfk_1` FOREIGN KEY (`universidadID`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `preguntasconfig_ibfk_2` FOREIGN KEY (`preguntaID`) REFERENCES `preguntas` (`ID`);

--
-- Filtros para la tabla `resultadosfcan`
--
ALTER TABLE `resultadosfcan`
  ADD CONSTRAINT `resultadosfcan_ibfk_1` FOREIGN KEY (`preguntaID`) REFERENCES `preguntas` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
