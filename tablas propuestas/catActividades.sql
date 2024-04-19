-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.11.255.88
-- Tiempo de generación: 06-11-2023 a las 18:09:29
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
-- Base de datos: `plantilla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catActividades`
--

CREATE TABLE `catActividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `catActividades`
--

INSERT INTO `catActividades` (`id`, `nombre`, `descripcion`, `status`, `created_at`, `updated_at`, `id_actividad`) VALUES
(1, 'Presentación de cara al público', NULL, 1, NULL, NULL, 1),
(2, 'Taller', NULL, 1, NULL, NULL, 1),
(3, 'Conferencia', NULL, 1, NULL, NULL, 1),
(4, 'Concierto', NULL, 1, NULL, NULL, 2),
(5, 'Taller', NULL, 1, NULL, NULL, 2),
(6, 'Conferencia', NULL, 1, NULL, NULL, 2),
(7, 'Taller', NULL, 1, NULL, NULL, 3),
(8, 'Conferencia', NULL, 1, NULL, NULL, 3),
(9, 'Taller', NULL, 1, NULL, NULL, 4),
(10, 'Conferencia', NULL, 1, NULL, NULL, 4),
(11, 'Video testimonial', NULL, 1, NULL, NULL, 5),
(12, ' Plática sobre proceso de elaboración', NULL, 1, NULL, NULL, 5),
(13, 'Taller', NULL, 1, NULL, NULL, 5),
(14, 'Audiovisual', NULL, 1, NULL, NULL, 1),
(15, 'Audiovisual', NULL, 1, NULL, NULL, 2),
(16, 'Audiovisual', NULL, 1, NULL, NULL, 3),
(17, 'Acción artística', NULL, 1, NULL, NULL, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
