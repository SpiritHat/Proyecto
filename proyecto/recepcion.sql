-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2021 a las 01:11:44
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recepcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `DNIadministrativo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo_documento_idtipo_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`DNIadministrativo`, `nombre`, `apellido`, `password`, `tipo_documento_idtipo_documento`) VALUES
(10, 'Sebastian', 'Calderon', '321', 3),
(12, 'Harold', 'Franco', '123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idequipo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_prestados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombre`, `cantidad`, `cantidad_prestados`) VALUES
(1, 'Teclado', 10, 0),
(2, 'Videobeam', 5, 0),
(3, 'Mouse', 20, 0),
(4, 'Computadores', 100, 0),
(5, 'Extension', 20, 0),
(6, 'Equipo de sonido', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `DNIestudiante` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `programas_idprogramas` int(11) NOT NULL,
  `tipo_documento_idtipo_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`DNIestudiante`, `nombre`, `apellido`, `password`, `programas_idprogramas`, `tipo_documento_idtipo_documento`) VALUES
(8, 'Jaider', 'Avarez', '12345', 7, 2),
(12, 'Felipe', 'Jimenez', '152', 8, 2),
(25, 'Julieth', 'Perdomo ', '554', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idprestamo` int(11) NOT NULL,
  `Estudiante_CC` int(11) NOT NULL,
  `equipo_idequipo` int(11) NOT NULL,
  `administrativo_CC` int(11) DEFAULT NULL,
  `fecha_recibe` datetime NOT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idprestamo`, `Estudiante_CC`, `equipo_idequipo`, `administrativo_CC`, `fecha_recibe`, `fecha_entrega`, `observaciones`) VALUES
(1, 12, 6, NULL, '2021-11-08 00:01:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `idprogramas` int(11) NOT NULL,
  `nombre_programa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`idprogramas`, `nombre_programa`) VALUES
(1, 'Contaduría publica'),
(2, 'Tecnología de gestión contable'),
(3, 'Administración de empresas'),
(4, 'Tecnología de gestión empresarial'),
(5, 'Ingeniaría de sistemas'),
(6, 'Tecnología en sistemas de información'),
(7, 'Técnico Prof. en programación de aplicaciones'),
(8, 'Administración agropecuaria'),
(9, 'Tecnología agropecuaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idtelefono` int(11) NOT NULL,
  `numero_telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_has_administrativo`
--

CREATE TABLE `telefono_has_administrativo` (
  `telefono_idtelefono` int(11) NOT NULL,
  `administrativo_CC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_has_estudiante`
--

CREATE TABLE `telefono_has_estudiante` (
  `telefono_idtelefono` int(11) NOT NULL,
  `Estudiante_CC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipo_documento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idtipo_documento`, `nombre`) VALUES
(1, 'Tarjeta de Identidad'),
(2, 'Cedula de Ciudadanía'),
(3, 'Cedula de Extranjería'),
(4, 'Pasaporte'),
(5, 'Registro Civil');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`DNIadministrativo`),
  ADD UNIQUE KEY `CC_UNIQUE` (`DNIadministrativo`),
  ADD KEY `fk_administrativo_tipo_documento1_idx` (`tipo_documento_idtipo_documento`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idequipo`),
  ADD UNIQUE KEY `idequipo_UNIQUE` (`idequipo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`DNIestudiante`),
  ADD UNIQUE KEY `CC_UNIQUE` (`DNIestudiante`),
  ADD KEY `fk_Estudiante_programas1_idx` (`programas_idprogramas`),
  ADD KEY `fk_Estudiante_tipo_documento1_idx` (`tipo_documento_idtipo_documento`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idprestamo`),
  ADD KEY `fk_entrega_Estudiante_idx` (`Estudiante_CC`),
  ADD KEY `fk_entrega_equipo1_idx` (`equipo_idequipo`),
  ADD KEY `fk_entrega_administrativo1_idx` (`administrativo_CC`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`idprogramas`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idtelefono`),
  ADD UNIQUE KEY `idtelefono_UNIQUE` (`idtelefono`),
  ADD UNIQUE KEY `numero_telefono_UNIQUE` (`numero_telefono`);

--
-- Indices de la tabla `telefono_has_administrativo`
--
ALTER TABLE `telefono_has_administrativo`
  ADD PRIMARY KEY (`telefono_idtelefono`,`administrativo_CC`),
  ADD KEY `fk_telefono_has_administrativo_administrativo1_idx` (`administrativo_CC`),
  ADD KEY `fk_telefono_has_administrativo_telefono1_idx` (`telefono_idtelefono`);

--
-- Indices de la tabla `telefono_has_estudiante`
--
ALTER TABLE `telefono_has_estudiante`
  ADD PRIMARY KEY (`telefono_idtelefono`,`Estudiante_CC`),
  ADD KEY `fk_telefono_has_Estudiante_Estudiante1_idx` (`Estudiante_CC`),
  ADD KEY `fk_telefono_has_Estudiante_telefono1_idx` (`telefono_idtelefono`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idtipo_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idequipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idprestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `idprogramas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `idtelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `fk_administrativo_tipo_documento1` FOREIGN KEY (`tipo_documento_idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_programas1` FOREIGN KEY (`programas_idprogramas`) REFERENCES `programas` (`idprogramas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiante_tipo_documento1` FOREIGN KEY (`tipo_documento_idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_entrega_Estudiante` FOREIGN KEY (`Estudiante_CC`) REFERENCES `estudiante` (`DNIestudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entrega_administrativo1` FOREIGN KEY (`administrativo_CC`) REFERENCES `administrativo` (`DNIadministrativo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entrega_equipo1` FOREIGN KEY (`equipo_idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefono_has_administrativo`
--
ALTER TABLE `telefono_has_administrativo`
  ADD CONSTRAINT `fk_telefono_has_administrativo_administrativo1` FOREIGN KEY (`administrativo_CC`) REFERENCES `administrativo` (`DNIadministrativo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_telefono_has_administrativo_telefono1` FOREIGN KEY (`telefono_idtelefono`) REFERENCES `telefono` (`idtelefono`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefono_has_estudiante`
--
ALTER TABLE `telefono_has_estudiante`
  ADD CONSTRAINT `fk_telefono_has_Estudiante_Estudiante1` FOREIGN KEY (`Estudiante_CC`) REFERENCES `estudiante` (`DNIestudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_telefono_has_Estudiante_telefono1` FOREIGN KEY (`telefono_idtelefono`) REFERENCES `telefono` (`idtelefono`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
