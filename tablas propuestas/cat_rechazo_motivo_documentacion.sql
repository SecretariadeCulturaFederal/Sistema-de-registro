-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.11.255.88
-- Tiempo de generación: 06-11-2023 a las 18:12:17
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
-- Estructura de tabla para la tabla `cat_rechazo_motivo_documentacion`
--

CREATE TABLE `cat_rechazo_motivo_documentacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_rechazo_motivo_documentacion`
--

INSERT INTO `cat_rechazo_motivo_documentacion` (`id`, `nombre`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aceptado', 'Documentación correcta', 1, NULL, NULL),
(2, 'Rechazado: documentación incompleta.', 'Rechazo 1', 1, NULL, NULL),
(3, 'Rechazado: no hay coincidencia de nombre entre los documentos (CURP, INE, identificación oficial, documentos aprobatorios en currículum).', 'Rechazo 2', 1, NULL, NULL),
(8, 'Rechazado: no es vigente alguno de los documentos de identidad.', NULL, 1, NULL, NULL),
(9, 'Rechazado: no cumple con la trayectoria necesaria o no se comprueba.', NULL, 1, NULL, NULL),
(10, 'Rechazado: la función por la que está dado de alta en el SAT no corresponde con la actividad.', NULL, 1, NULL, NULL),
(11, 'Rechazado:  no es legible alguno de los documentos o está alterado.', NULL, 1, NULL, NULL),
(12, 'Rechazado: no especifica la función que desempeñó.', NULL, 1, NULL, NULL),
(13, 'Rechazado: no abre el archivo', NULL, 1, NULL, NULL),
(14, 'Rechazado:  no son los documentos solicitados', NULL, 1, NULL, NULL),
(15, 'Rechazado:  documentos incompletos', NULL, 1, NULL, NULL),
(16, 'Rechazado:  otro', NULL, 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
