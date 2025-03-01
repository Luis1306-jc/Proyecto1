-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2025 a las 21:10:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sedena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sti`
--

CREATE TABLE `sti` (
  `ID` int(11) NOT NULL,
  `folio` varchar(20) DEFAULT NULL,
  `sill` varchar(20) DEFAULT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `falla` varchar(255) DEFAULT NULL,
  `uu` varchar(20) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `equipo` varchar(100) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(80) DEFAULT NULL,
  `situacion` varchar(100) DEFAULT NULL,
  `oficio` varchar(50) DEFAULT NULL,
  `noOficio` varchar(50) DEFAULT NULL,
  `fechaOficio` varchar(20) DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `piezas` varchar(50) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `parte` varchar(50) DEFAULT NULL,
  `num_serie` varchar(50) DEFAULT NULL,
  `reparacion` varchar(50) DEFAULT NULL,
  `fechaTermino` varchar(20) DEFAULT NULL,
  `responsable` varchar(50) DEFAULT NULL,
  `verificacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sti`
--

INSERT INTO `sti` (`ID`, `folio`, `sill`, `serie`, `falla`, `uu`, `fecha`, `equipo`, `marca`, `modelo`, `situacion`, `oficio`, `noOficio`, `fechaOficio`, `observacion`, `piezas`, `descripcion`, `parte`, `num_serie`, `reparacion`, `fechaTermino`, `responsable`, `verificacion`) VALUES
(13, '12345', '123', 'fefq4qwd', '43erwf', '342424', '2020-10-22', 'samsumg', 'efsf', '23rqwd', 'Falla de tinta en pantalla', 'TARJETA', '433fr', 'f43t', 'completas', '12', 'holaaaa', '231', '12112', '', '', '', ''),
(15, '456', 'fdgbdfb', 'bdfh45h', 'cpu', '3twefd', '12-02-2024', 'lenovo', 'lenovo', '4fgd354gd3454rwe', 'falta de memoria', 'f.c.a', 'erfefer', '12-03-2025', '', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sti`
--
ALTER TABLE `sti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sti`
--
ALTER TABLE `sti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
