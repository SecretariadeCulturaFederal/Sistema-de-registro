-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.11.255.88
-- Tiempo de generación: 06-11-2023 a las 18:11:57
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
-- Estructura de tabla para la tabla `cat_rechazo_motivo_cualitativo`
--

CREATE TABLE `cat_rechazo_motivo_cualitativo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_rechazo_motivo_cualitativo`
--

INSERT INTO `cat_rechazo_motivo_cualitativo` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Aceptado', NULL, NULL, NULL, 1),
(2, 'Incumplimiento en las Bases de participación', 'Rechazado: El postulante no cumple con la experiencia necesaria para el perfil. (bienal)', NULL, NULL, 1),
(3, 'Documentación incompleta o incorrecta', 'Rechazado: La experiencia del postulante no coincide con el perfil solicitado.(bienal)', NULL, NULL, 0),
(4, 'Otros', NULL, NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
