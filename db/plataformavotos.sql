-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2016 a las 01:07:24
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
  `Descripcion` varchar(255) COLLATE latin1_spanish_ci DEFAULT 'Sin descripción',
  `Origen` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Lugar` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL DEFAULT '12:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`ID`, `Pregunta`, `Descripcion`, `Origen`, `Lugar`, `Fecha`, `Hora`) VALUES
(1, '&iquest;Necesita RITSI una plataforma de votos?', 'La pregunta viene a ra&iacute;z de que en las asambleas se pierde bastante tiempo con el voto secreto y se ha decidido llevar a votaci&oacute;n, c&oacute;mo no, con voto secreto.', 'prueba', 'local', '2016-11-25', '12:00:00'),
(2, 'Prueba', 'Sin descripci&oacute;n', 'prueba', 'prueba', '2016-11-30', '12:00:00');

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
(1, 1, 1, '2016-11-30', '02:30:00', '02:44:00', 'NO'),
(2, 2, 1, '2016-11-25', '12:00:00', '12:15:00', 'NO'),
(3, 3, 1, '2016-11-25', '12:00:00', '12:15:00', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadosfcan`
--

CREATE TABLE `resultadosfcan` (
  `Clave` int(11) NOT NULL,
  `preguntaID` int(11) NOT NULL,
  `universidadID` int(11) NOT NULL,
  `Voto1` set('FAV','CON','ABS','NUL') COLLATE latin1_spanish_ci NOT NULL,
  `Voto2` set('FAV','CON','ABS','NUL') COLLATE latin1_spanish_ci NOT NULL,
  `Voto3` set('FAV','CON','ABS','NUL') COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `IP` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `resultadosfcan`
--

INSERT INTO `resultadosfcan` (`Clave`, `preguntaID`, `universidadID`, `Voto1`, `Voto2`, `Voto3`, `Fecha`, `Hora`, `IP`) VALUES
(1, 1, 1, 'CON', 'CON', 'FAV', '2016-11-29', '23:00:00', '127.0.0.1'),
(2, 1, 2, 'CON', 'ABS', 'ABS', '2016-11-29', '23:00:00', '127.0.0.1');

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
  `Imagen` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'uni/uni_default.jpg',
  `linkUniversidad` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `ultimaConexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimaIP` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Siglas`, `Nombre`, `Comentario`, `Usuario`, `Pass`, `Imagen`, `linkUniversidad`, `ultimaConexion`, `ultimaIP`) VALUES
(1, 'UPV - EHU', 'Universidad del Pa&iacute;s Vasco - Euskal Herriko Unibertsitatea', 'Sin comentario', 'upv_ehu', '1', 'uni/uni_ehu.jpg', 'http://www.ehu.eus/eu/web/informatika-fakultatea', '2016-11-29 21:37:57', '::1'),
(2, 'UPNA', 'Universidad P&uacute;blica de Navarra - Nafarroako Unibertsitate Publikoa', 'Sin comentario', 'upna', '1', 'uni/uni_upna.jpg', 'https://www.unavarra.es/ets-industrialesytelecos/estudios/grado/grado-en-ingenieria-informatica', '2016-11-29 23:50:26', '::1'),
(3, 'UPV', 'Universitat Polit&egrave;cnica de Val&egrave;ncia', 'Sin comentario', 'upv', '1', 'uni/uni_upv.jpg', 'https://www.upv.es/titulaciones/GII/', '2016-11-29 23:54:37', '::1');

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
  ADD KEY `preguntaID` (`preguntaID`),
  ADD KEY `universidadID` (`universidadID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `preguntasconfig`
--
ALTER TABLE `preguntasconfig`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `resultadosfcan`
--
ALTER TABLE `resultadosfcan`
  MODIFY `Clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `resultadosfcan_ibfk_1` FOREIGN KEY (`preguntaID`) REFERENCES `preguntasconfig` (`preguntaID`),
  ADD CONSTRAINT `resultadosfcan_ibfk_2` FOREIGN KEY (`universidadID`) REFERENCES `preguntasconfig` (`universidadID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
