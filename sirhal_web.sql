-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2020 a las 11:26:04
-- Versión del servidor: 5.5.68-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sirhal_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `path_folder` varchar(60) DEFAULT NULL,
  `upload_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `file_name`, `user_name`, `path_folder`, `upload_on`, `status`) VALUES
(1, 'AUCH1053.SIR', 'administrador', '../../uploads/files/', '2020-05-17 18:01:23', '1'),
(2, 'AUDP1053.SIR', 'administrador', '../../uploads/files/', '2020-05-17 18:01:23', '1'),
(3, 'AUDP3053.SIR', 'administrador', '../../uploads/files/', '2020-05-17 18:01:23', '1'),
(4, 'AULH1053.SIR', 'administrador', '../../uploads/files/', '2020-05-17 18:01:23', '1'),
(5, 'AULH2053.SIR', 'administrador', '../../uploads/files/', '2020-05-17 18:01:23', '1'),
(6, 'AUOR1053.SIR', 'administrador', '../../uploads/files/', '2020-05-17 18:01:23', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidadores`
--

CREATE TABLE `liquidadores` (
  `id` int(11) NOT NULL,
  `nombreApellido` varchar(30) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `organismo` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `liquidadores`
--

INSERT INTO `liquidadores` (`id`, `nombreApellido`, `sexo`, `dni`, `email`, `telefono`, `organismo`) VALUES
(1, 'Gustavo Flores', 'Masculino', '20456852', 'gflores@mecon.gov.ar', '43627895', 'Ministerio de EconomÃ­a de la NaciÃ³n'),
(3, 'Augusto Maza', 'Masculino', '24283493', 'debianmaza@gmail.com', '43626019', 'Ministerio de EconomÃ­a de la NaciÃ³n'),
(5, 'Ezequiel Greco', 'Masculino', '38125785', 'egreco@mecon.gov.ar', '43626019', 'Ministerio de EconomÃ­a de la NaciÃ³n'),
(6, 'Alejandro Ronald Krebs', 'Masculino', '33789456', 'akrebs@mecon.gov.ar', '43627874', 'Ministerio de EconomÃ­a de la NaciÃ³n'),
(7, 'Carlos Traverso', 'Masculino', '15759842', 'ctrave@mecon.gov.ar', '43627895', 'Ministerio de EconomÃ­a de la NaciÃ³n'),
(10, 'Florentina Maza', 'Femenino', '50722015', 'floren@mecon.gov.ar', '1142420569', 'Ministerio de EconomÃ­a de la NaciÃ³n'),
(11, 'Ignacio Maza', 'Masculino', '34789456', 'nacho@mecon.gov.ar', '1142420569', 'Agencia Nacional del Deporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismos`
--

CREATE TABLE `organismos` (
  `id` int(11) NOT NULL,
  `cod_org` varchar(2) NOT NULL,
  `saf` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `organismos`
--

INSERT INTO `organismos` (`id`, `cod_org`, `saf`, `descripcion`) VALUES
(1, 'AE', 106, 'ComisiÃ³n Nacional de Actividades Espaciales'),
(3, 'AG', 0, 'Agencia Nacional del Deporte'),
(4, 'ME', 0, 'Ministerio de EconomÃ­a de la NaciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `user` varchar(11) DEFAULT NULL,
  `password` varchar(11) DEFAULT NULL,
  `permisos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `password`, `permisos`) VALUES
(1, 'administrador', 'root', 'proteo601', 1),
(3, 'Augusto Maza', 'DNI24283493', 'DNI24283493', 1),
(4, 'Florentina Maza', 'DNI50722015', 'DNI50722015', 1),
(5, 'Ignacio Maza', 'DNI34789456', 'DNI34789456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `liquidadores`
--
ALTER TABLE `liquidadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organismos`
--
ALTER TABLE `organismos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `liquidadores`
--
ALTER TABLE `liquidadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `organismos`
--
ALTER TABLE `organismos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
