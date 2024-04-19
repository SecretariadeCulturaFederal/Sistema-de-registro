-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.11.255.88
-- Tiempo de generación: 31-10-2023 a las 21:00:15
-- Versión del servidor: 10.3.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `memorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `id_pais`, `nombre`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'No aplica', 1, NULL, NULL),
(2, 118, 'Aguascalientes', 1, NULL, NULL),
(3, 118, 'Baja California', 1, NULL, NULL),
(4, 118, 'Baja California Sur', 1, NULL, NULL),
(5, 118, 'Campeche', 1, NULL, NULL),
(6, 118, 'Chiapas', 1, NULL, NULL),
(7, 118, 'Chihuahua', 1, NULL, NULL),
(8, 118, 'Ciudad de México', 1, NULL, NULL),
(9, 118, 'Coahuila de Zaragoza', 1, NULL, NULL),
(10, 118, 'Colima', 1, NULL, NULL),
(11, 118, 'Durango', 1, NULL, NULL),
(12, 118, 'Guanajuato', 1, NULL, NULL),
(13, 118, 'Guerrero', 1, NULL, NULL),
(14, 118, 'Hidalgo', 1, NULL, NULL),
(15, 118, 'Jalisco', 1, NULL, NULL),
(16, 118, 'México', 1, NULL, NULL),
(17, 118, 'Michoacán de Ocampo', 1, NULL, NULL),
(18, 118, 'Morelos', 1, NULL, NULL),
(19, 118, 'Nayarit', 1, NULL, NULL),
(20, 118, 'Nuevo León', 1, NULL, NULL),
(21, 118, 'Oaxaca', 1, NULL, NULL),
(22, 118, 'Puebla', 1, NULL, NULL),
(23, 118, 'Querétaro de Arteaga', 1, NULL, NULL),
(24, 118, 'Quintana Roo', 1, NULL, NULL),
(25, 118, 'San Luis Potosí', 1, NULL, NULL),
(26, 118, 'Sinaloa', 1, NULL, NULL),
(27, 118, 'Sonora', 1, NULL, NULL),
(28, 118, 'Tabasco', 1, NULL, NULL),
(29, 118, 'Tamaulipas', 1, NULL, NULL),
(30, 118, 'Tlaxcala', 1, NULL, NULL),
(31, 118, 'Veracruz', 1, NULL, NULL),
(32, 118, 'Yucatán', 1, NULL, NULL),
(33, 118, 'Zacatecas', 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
