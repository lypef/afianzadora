-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2019 a las 01:26:00
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servi175_db`
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
(1, 'ALBERTO LOPEZ CRUZ', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
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
(85, 'LILIANA PEREZ GUTIERREZ', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(86, 'ADIB SAADE VALDESPINO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(87, 'JULIAN TURISO', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(88, 'KORAIMA PEREZ YO NO FUI', 'LIC. TERE / ING. ALEX', 'administracion1@adibsa.com.mx', '771-748-8752   /  771-191-7906', 'aaaaadministracion1@adibsa.com.mx'),
(89, 'Miguel Ramirez Pantiga', 'Pantiga', 'cp_pantiga@hotmail.com', '7441324811', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fianzas`
--

CREATE TABLE `fianzas` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fiador` int(11) NOT NULL,
  `contrato` varchar(254) NOT NULL,
  `tipo_fianza` int(11) NOT NULL,
  `folio_fianza` varchar(254) NOT NULL,
  `afianzadora` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `folio_factura` varchar(254) NOT NULL,
  `monto_factura` double NOT NULL DEFAULT '0',
  `fecha_pago` date NOT NULL,
  `entrega` varchar(254) NOT NULL,
  `pdf_contrato_obra` varchar(254) NOT NULL,
  `pdf_constancia_situacion_fiscal` varchar(254) NOT NULL,
  `pdf_estados_financiero` varchar(254) NOT NULL,
  `pdf_comprobante_domicilio` varchar(254) NOT NULL,
  `pdf_ife_representante_legal` varchar(254) NOT NULL,
  `pdf_curp` varchar(254) NOT NULL,
  `comentarios` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fianzas`
--

INSERT INTO `fianzas` (`id`, `active`, `fiador`, `contrato`, `tipo_fianza`, `folio_fianza`, `afianzadora`, `fecha_emision`, `folio_factura`, `monto_factura`, `fecha_pago`, `entrega`, `pdf_contrato_obra`, `pdf_constancia_situacion_fiscal`, `pdf_estados_financiero`, `pdf_comprobante_domicilio`, `pdf_ife_representante_legal`, `pdf_curp`, `comentarios`) VALUES
(2, 1, 73, 'A84D58485D_Actualizado', 5, 'aaaaaaa', 6, '2001-01-12', '54W154158', 245000000.123, '2001-01-12', 'ENTREGADO', '', '././documentos/situacion_fiscal20190315195208.pdf', '././documentos/estados_financieros20190315195208.pdf', '././documentos/comprobante_domicilio20190315195208.pdf', '././documentos/ife_r_legal20190315195208.pdf', '././documentos/curp20190315195208.pdf', 'Se conoce como texto al conjunto de frases y palabras coherentes y ordenadas que permiten ser interpretadas y transmiten las ideas de un autor (emisor o locutor). La palabra texto es de origen latín textos que significa ´tejido´.\r\n\r\nLos textos pueden ser cortos, únicamente con una palabra, o más largos por medio de un conjunto de ellas; pero es de aclarar que el texto no son maraña de frases, así que para que sea efectivo existen dos criterios fundamentales para su existencia: coherencia y cohesión.\r\n\r\nLa cohesión y la coherencia son recursos fundamentales utilizados en la formación de un texto. De esta forma, la cohesión establece la conexión armoniosa entre las diversas partes del texto, en la composición de parágrafos, frases. Por su parte, la coherencia es fundamental para establecer la relación lógica entre las ideas de un texto, logrando que se complementen unas con otras.\r\n\r\nLa estructura de los textos, comprende, una introducción, donde se presenta el tema que se tratara y los aspectos más relevantes del mismo; un desarrollo, donde se expone, de manera clara, precisa, ordenada y coherente la información relativa al tema que se indicó en la introducción; y una conclusión, síntesis y valoración de la información presentada donde se destaca las ideas principales del tema.\r\n\r\nEl objetivo del texto es comunicar un mensaje claro y preciso, bien sea romántico, descriptivo, científico, informativo, entre otros, para ser comprendido por el destinatario. En este sentido, es de aclarar que el Texto Sagrado son los diferentes textos o libros de las diferentes religiones, por ejemplo: la Biblia es del cristianismo, el Corán es del islamismo, la Biblia hebrea es del judaísmo, etc.\r\n\r\nPor el momento, es todo. Gracias'),
(3, 1, 84, 'A84D58485Dactualizado', 4, '6D546WD45', 3, '2018-03-11', '54W154158update', 154759, '2019-03-09', 'WE5241EW65F56EWupdate', '', '', '', '', '', '', ''),
(4, 0, 85, 'A84D58485D', 3, '6D546WD45', 2, '2019-03-11', '6d541d541d', 1456151, '2019-03-11', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(5, 1, 85, '15032019', 6, '6D546WD45', 1, '2026-01-05', '54W154158', 125000.56, '2019-03-22', 'CORRECTO', '../../documentos/finza_5_20190315211513.pdf', '../../documentos/finza_5_201903152115131.pdf', '../../documentos/finza_5_201903152115132.pdf', '../../documentos/finza_5_201903152115133.pdf', '../../documentos/finza_5_201903152115134.pdf', '../../documentos/finza_5_201903152115135.pdf', ':D\r\n:D'),
(6, 1, 84, 'A84D58485Da', 3, '6D546WD45', 6, '2019-03-12', '54W154158', 1456151, '2019-03-12', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(7, 1, 84, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-11', '54W154158', 1456151, '2019-03-11', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(8, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(9, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(10, 0, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(12, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(13, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-09', '54W154158', 1456150, '2019-03-09', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(14, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(15, 0, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(16, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(17, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(18, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(19, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(20, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(21, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(22, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(23, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(24, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(25, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(26, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(27, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(28, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(29, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(30, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(31, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(32, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(33, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(34, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(35, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(36, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(37, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(38, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(39, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(40, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(41, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(42, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(43, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(44, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(45, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(46, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(47, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(48, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(49, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(50, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(51, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(52, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(53, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(54, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(55, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(56, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(57, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(58, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(59, 1, 85, 'A84D58485D', 3, '6D546WD45', 4, '2019-03-10', '54W154158', 1456151, '2019-03-10', 'WE5241EW65F56EW', '', '', '', '', '', '', ''),
(61, 1, 84, 'asc151514', 3, 'a51a515a1', 6, '2019-03-18', '14aa565a', 154.5, '2019-03-18', '151515', '', '', '', '', '', '', ''),
(62, 1, 84, 'AEDF9201', 2, 'D-SSOFD88', 3, '2019-03-15', 'F-33MD', 145000.5, '2019-03-19', 'CORRECTO', '', '', '', '', '', '', ''),
(63, 1, 1, 'fghjk', 3, 'sss', 4, '2019-03-19', 'ghjk', 154.5, '2019-03-19', 'ghjnmk', '', '', '', '', '', '', '');

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
(1, 'FRANCISCO EDUARDO ASCENCIO DOMINGUEZ', 'root', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(3, 'FRANCISCO EDUARDO ASCENCIO DOMINGUEZ', 'new', 'MjJhZjY0NWQxODU5Y2I1Y2E2ZGEwYzQ4NGYxZjM3ZWE='),
(4, 'FRANCISCO EDURDO ASCENCIO DOMINGUEZ', 'root1', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(5, 'FRANCISCO EDURDO ASCENCIO DOMINGUEZ', 'root2', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(6, 'FRANCISCO EDURDO ASCENCIO DOMINGUEZ', 'root3', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(7, 'FRANCISCO EDURDO ASCENCIO DOMINGUEZ', 'root4', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(8, 'FRANCISCO EDURDO ASCENCIO DOMINGUEZ', 'root5', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(9, 'FRANCISCO EDURDO ASCENCIO DOMINGUEZ', 'root6', 'NjNhOWYwZWE3YmI5ODA1MDc5NmI2NDllODU0ODE4NDU='),
(11, 'ARLENE GARCIA AGUILAR', 'lene', 'YTYyOTA1NmZmNDA5ZTFiMjYwYjY2YmY2ZDJiNTQxYWU=');

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
-- Indices de la tabla `fianzas`
--
ALTER TABLE `fianzas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiador_fianza` (`fiador`),
  ADD KEY `tipo_fianza` (`tipo_fianza`),
  ADD KEY `afianzadora_fianza` (`afianzadora`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afianzadoras`
--
ALTER TABLE `afianzadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `afianzadores_tipos`
--
ALTER TABLE `afianzadores_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `fiadores`
--
ALTER TABLE `fiadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `fianzas`
--
ALTER TABLE `fianzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fianzas`
--
ALTER TABLE `fianzas`
  ADD CONSTRAINT `afianzadora_fianza` FOREIGN KEY (`afianzadora`) REFERENCES `afianzadoras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fiador_fianza` FOREIGN KEY (`fiador`) REFERENCES `fiadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_fianza` FOREIGN KEY (`tipo_fianza`) REFERENCES `afianzadores_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
