-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2020 a las 05:54:31
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_citas_medicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE_CATEGORIA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` VALUES(1, 'Medico General');
INSERT INTO `categoria` VALUES(2, 'Oftalmología');
INSERT INTO `categoria` VALUES(5, 'Odontologia');
INSERT INTO `categoria` VALUES(6, 'Dermatología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `ID_MEDICO` int(11) NOT NULL,
  `NOMBRE_MED` varchar(100) NOT NULL,
  `APELLIDO_MED` varchar(100) NOT NULL,
  `EMAIL_MED` varchar(100) NOT NULL,
  `TELEFONO` varchar(100) NOT NULL,
  `CATEGORIA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` VALUES(1, 'Darìo Jose', 'Muños Gutierrez', 'gutimun@gmail.com', '3012304566', 1);
INSERT INTO `medicos` VALUES(2, 'Juliana', 'Cortez Gomez', 'julicort@gmail.com', '3002399309', 1);
INSERT INTO `medicos` VALUES(3, 'Manuel Jose', 'Martinez Lopez', 'martinez@gmail.com', '3022345586', 1);
INSERT INTO `medicos` VALUES(4, 'Michel', 'Valdes Guiño', 'valdes09@gmail.com', '3002293230', 2);
INSERT INTO `medicos` VALUES(5, 'Valentina', 'Patiño', 'valen1999@gmail.com', '3009823945', 2);
INSERT INTO `medicos` VALUES(6, 'Maria Isabel', 'Lopez Mendoza', 'lopezmen34@gmail.com', '3012293874', 2);
INSERT INTO `medicos` VALUES(7, 'Adriana del pilar', 'Manzur', 'manzur29@gmail.com', '3002938475', 5);
INSERT INTO `medicos` VALUES(8, 'Mario', 'Lopez Nasoht', 'lopeznaht@gmail.com', '3029384758', 5);
INSERT INTO `medicos` VALUES(9, 'Jhon', 'Monsalve Luijk', 'monsalve45@gmail.com', '3009826784', 5);
INSERT INTO `medicos` VALUES(10, 'Cielo', 'Miel Alba', 'cielo39@gmail.com', '3029384939', 6);
INSERT INTO `medicos` VALUES(11, 'Geraldine', 'Urrego Pol', 'urregopol@gmail.com', '3012998394', 6);
INSERT INTO `medicos` VALUES(12, 'Frank Paul', 'Fernandez', 'paulfrank@gmail.com', '3002930498', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `ID_RES` int(11) NOT NULL,
  `NOMBRE_PAC` varchar(100) NOT NULL,
  `APELLIDO_PAC` varchar(100) NOT NULL,
  `ASUNTO` varchar(200) NOT NULL,
  `FECHA_CITA` varchar(100) NOT NULL,
  `MEDICO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` VALUES(1, 'Mario', 'Gozet', 'Consulta con medico general', '25-02-2020', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID_MEDICO`),
  ADD KEY `ID_MEDICO` (`ID_MEDICO`),
  ADD KEY `ID_MEDICO_2` (`ID_MEDICO`),
  ADD KEY `CATEGORIA_ID` (`CATEGORIA_ID`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`ID_RES`),
  ADD KEY `MEDICO_ID` (`MEDICO_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `ID_MEDICO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `ID_RES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`CATEGORIA_ID`) REFERENCES `categoria` (`ID_CATEGORIA`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`MEDICO_ID`) REFERENCES `medicos` (`ID_MEDICO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
