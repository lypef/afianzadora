-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-03-2019 a las 15:23:40
-- Versión del servidor: 10.2.17-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fastener`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afianzadoras`
--

CREATE TABLE `afianzadoras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `razon_social` varchar(254) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `telefono` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afianzadoras`
--

INSERT INTO `afianzadoras` (`id`, `nombre`, `razon_social`, `direccion`, `telefono`, `email`) VALUES
(1, 'ZURICH', 'ZURICH SUIZA', 'DIRECCION DE PRUEBA', '6545645', 'reportes@zurich.com'),
(2, 'DORAMA\r\n\r\n', 'ZURICHZURICHZURICHZURICHZURICHZURICH', 'DIRECCION DE PRUEBA', '6545645', 'A@A.COM'),
(3, 'BERKLEY\r\n\r\n', 'ZURICHZURICHZURICHZURICHZURICHZURICH', 'DIRECCION DE PRUEBA', '6545645', 'A@A.COM'),
(4, 'ACE\r\n\r\n', 'ZURICHZURICHZURICHZURICHZURICHZURICH', 'DIRECCION DE PRUEBA', '6545645', 'A@A.COM'),
(5, 'ASERTA\r\n\r\n', 'ZURICHZURICHZURICHZURICHZURICHZURICH', 'DIRECCION DE PRUEBA', '6545645', 'A@A.COM'),
(6, 'SEG POTOSI\r\n\r\n', 'ZURICHZURICHZURICHZURICHZURICHZURICH', 'DIRECCION DE PRUEBA', '6545645', 'A@A.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afianzadores_tipos`
--

CREATE TABLE `afianzadores_tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afianzadores_tipos`
--

INSERT INTO `afianzadores_tipos` (`id`, `nombre`) VALUES
(1, 'V.O.'),
(2, 'CUMP'),
(3, 'ANT\r\n'),
(4, 'B.C.\r\n'),
(5, 'ENDOSO AMP $\r\n'),
(6, 'CONT. LAB\r\n'),
(10, 'NUEVA FIANZA ACTUALIZADA'),
(11, 'SEGUNDA FIANZA'),
(31, 'NUEVO TIPO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiadores`
--

CREATE TABLE `fiadores` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(254) NOT NULL,
  `contactos` varchar(254) NOT NULL,
  `correo1` varchar(254) NOT NULL,
  `telefonos` varchar(254) NOT NULL,
  `correo2` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fiadores`
--

INSERT INTO `fiadores` (`id`, `razon_social`, `contactos`, `correo1`, `telefonos`, `correo2`) VALUES
(1, 'ADIB SAADE VALDESPINO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(2, 'FRANCISCO EDUARDO ASCENCIO  DOMINGUEZ', 'LIC. TERE / ING. ALEX', 'CONTACTO@CYBERCHOAPAS.COM', '012484854092', 'CONTACTO@CYBERCHOAPAS.COM'),
(6, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(7, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(8, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(9, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(10, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(11, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(12, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(13, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(14, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(15, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(16, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(17, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(18, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(19, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(20, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(21, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(22, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(23, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(24, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(25, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(26, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(27, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(28, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(29, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(30, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(31, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(32, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(33, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(34, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(35, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(36, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(37, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(38, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(39, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(40, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(41, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(42, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(43, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(44, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(45, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(46, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(47, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(48, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(49, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(50, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(51, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(52, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(53, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(54, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(55, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(56, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(57, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(58, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(59, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(60, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(61, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(62, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(63, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(64, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(65, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(66, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(67, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(68, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(69, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(70, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(71, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(72, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(73, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(74, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(75, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(76, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(77, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(78, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(79, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(80, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(81, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(82, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(83, 'ALEJANDRO SOTELO CABALLERO\r\n', '41d564d564d5d45', '5dws5d5w4dw54', '5454545454', '5454\r\n'),
(84, 'FRANCISCO EDUARDO ASCENCIO  DOMINGUEZ', 'FRANCISCO EDUARDO ASCENCIO  DOMINGUEZ', 'CONTACTO@CYBERCHOAPAS.COM', '2122', 'CONTACTO@CYBERCHOAPAS.COM'),
(85, 'ADIB SAADE VALDESPINO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(86, 'ADIB SAADE VALDESPINO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(87, 'ADIB SAADE VALDESPINO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(88, 'ADIB SAADE VALDESPINO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'NOMBRE DE USUARIO', 'root', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU=');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afianzadoras`
--
ALTER TABLE `afianzadoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `afianzadores_tipos`
--
ALTER TABLE `afianzadores_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fiadores`
--
ALTER TABLE `fiadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afianzadoras`
--
ALTER TABLE `afianzadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `afianzadores_tipos`
--
ALTER TABLE `afianzadores_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `fiadores`
--
ALTER TABLE `fiadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
