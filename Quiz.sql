-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2015 a las 22:06:15
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Acciones`
--

CREATE TABLE IF NOT EXISTS `Acciones` (
  `ID` int(11) NOT NULL,
  `ID_Conexion` int(11) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `Tipo_Accion` varchar(50) NOT NULL,
  `Hora_Accion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IP_Conexion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Acciones`
--

INSERT INTO `Acciones` (`ID`, `ID_Conexion`, `User_Email`, `Tipo_Accion`, `Hora_Accion`, `IP_Conexion`) VALUES
(1, 0, 'NULL', 'Ver', '2015-10-25 20:44:21', '::1'),
(2, 0, 'mgoicoechea012@ikasle.ehu.eus', 'Insertar', '2015-10-25 20:50:47', '::1'),
(3, 0, 'mgoicoechea012@ikasle.ehu.eus', 'Insertar', '2015-10-25 20:55:33', '::1'),
(8, 0, 'metxeberria002@ikasle.ehu.eus', 'Ver', '2015-10-25 21:03:04', '::1'),
(9, 0, 'NULL', 'Ver', '2015-10-25 21:03:35', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Conexiones`
--

CREATE TABLE IF NOT EXISTS `Conexiones` (
  `ID` int(11) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `Hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Conexiones`
--

INSERT INTO `Conexiones` (`ID`, `User_Email`, `Hora`) VALUES
(4, 'mgoicoechea012@ikasle.ehu.eus', '2015-10-25 19:39:58'),
(7, 'metxeberria002@ikasle.ehu.eus', '2015-10-25 19:48:33'),
(8, 'mgoicoechea012@ikasle.ehu.eus', '2015-10-25 20:49:18'),
(9, 'mgoicoechea012@ikasle.ehu.eus', '2015-10-25 20:54:51'),
(10, 'mgoicoechea012@ikasle.ehu.eus', '2015-10-25 20:55:39'),
(11, 'metxeberria002@ikasle.ehu.eus', '2015-10-25 20:57:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE IF NOT EXISTS `Preguntas` (
  `Numero_Pregunta` int(11) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `Pregunta` text NOT NULL,
  `Respuesta` text NOT NULL,
  `Complejidad` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Preguntas`
--

INSERT INTO `Preguntas` (`Numero_Pregunta`, `User_Email`, `Pregunta`, `Respuesta`, `Complejidad`) VALUES
(5, 'mgoicoechea012@ikasle.ehu.eus', 'Que "type" tenemos que usar para enviar un formulario html?', 'Submit', 0),
(6, 'mgoicoechea012@ikasle.ehu.eus', 'Que significan las siglas HTML?', 'HyperText Markup Language', 0),
(7, 'metxeberria002@ikasle.ehu.eus', 'Que comando tenemos que usar para iniciar una sesion en php?', 'Session_start()', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Telefono` int(50) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Intereses` varchar(50) NOT NULL,
  `Imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Nombre`, `Apellidos`, `Email`, `Password`, `Telefono`, `Especialidad`, `Intereses`, `Imagen`) VALUES
('Mikel', 'Etxeberria Garcia', 'metxeberria002@ikasle.ehu.eus', '123456Maik', 654654654, 'Ingenieria del software', '', ''),
('Mikel', 'Goikoetxea Martinez', 'mgoicoechea012@ikasle.ehu.eus', '123456Maik', 636087188, 'Ingenieria del software', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Acciones`
--
ALTER TABLE `Acciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Conexion` (`ID_Conexion`);

--
-- Indices de la tabla `Conexiones`
--
ALTER TABLE `Conexiones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`Numero_Pregunta`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Acciones`
--
ALTER TABLE `Acciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Conexiones`
--
ALTER TABLE `Conexiones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  MODIFY `Numero_Pregunta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
