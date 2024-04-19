-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.11.255.88
-- Tiempo de generación: 31-10-2023 a las 21:17:43
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
-- Estructura de tabla para la tabla `preguntas_frecuentes`
--

CREATE TABLE `preguntas_frecuentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `convocatorias_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregunta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respuesta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas_frecuentes`
--

INSERT INTO `preguntas_frecuentes` (`id`, `status`, `convocatorias_id`, `slug`, `pregunta`, `respuesta`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'vnyitsjmPregunta-prueba', 'Pregunta prueba', 'Respuesta prueba', '2020-03-25 06:11:29', '2021-01-27 16:10:31'),
(3, 1, 1, 'lpawrgkdPregunta-prueba', 'Prueba del edit 2', 'prueba del edit2', '2020-03-25 18:13:38', '2020-03-26 01:34:50'),
(4, 1, 1, 'kqgbnfrl¿Qué-documentos-son-probatorios-para-demostrar-la-residencia-continua-en-México-por-un-mínimo-de-tres-años?', '¿Qué documentos son probatorios para demostrar la residencia continua en México por un mínimo de tres años?', 'Además de enviar copia de la visa de residencia temporal o permanente indicada en las bases, la residencia continua en el país se puede demostrar presentando:\r\n   	- Carta institucional (museo, casa de cultura, universidad).\r\n    	-Contratos de renta o de algún servicio a nombre de la persona postulante (arrendamiento o subarrendamiento).', '2021-01-27 17:42:27', '2021-01-27 17:42:27'),
(5, 1, 1, 'ixhkfsmjPRUEBA', 'PRUEBA', 'PRUEBA\r\nPREUBA\r\nPRUEBA', '2021-01-27 17:43:45', '2021-01-27 17:45:06'),
(6, 1, 1, 'vqlwkdtp¿Qué-documentos-son-probatorios-para-demostrar-la-residencia-continua-en-México-por-un-mínimo-de-tres-años?', '¿Qué documentos son probatorios para demostrar la residencia continua en México por un mínimo de tres años?', 'Además de enviar copia de la visa de residencia temporal o permanente indicada en las bases, la residencia continua en el país se puede demostrar presentando:', '2021-01-27 17:49:00', '2021-01-27 17:49:00'),
(7, 1, 1, 'mdyblkpj¿Cómo-determinar-la-categoría-en-la-que-se-va-a-postular?', '¿Cómo determinar la categoría en la que se va a postular?', 'Para participar en la Categoría A, la persona postulante o al menos el 60% de los(las) integrantes, en caso de postulaciones de colectivos, deberán tener entre 18 y 30 años cumplidos al cierre de la convocatoria, el jueves 8 de abril de 2021.', '2021-01-27 17:49:25', '2021-01-27 17:49:25'),
(8, 1, 1, 'ybtdnukf¿Qué-temática-deben-abordar-las-obras?', '¿Qué temática deben abordar las obras?', 'El tema queda a elección de cada postulante. La intención es que las obras reflejen el presente de la fotografía detonando la reflexión sobre las distintas formas de lo fotográfico y las cualidades de la imagen, ya sea a través de la incidencia de nuevas tecnologías, la transdisciplinariedad y las exploraciones que trascienden el carácter bidimensional del papel.', '2021-01-27 17:49:41', '2021-01-27 17:49:41'),
(9, 1, 1, 'rkzbiqod¿Cuál-es-el-número-mínimo-y-máximo-de-piezas-que-se-pueden-presentar?', '¿Cuál es el número mínimo y máximo de piezas que se pueden presentar?', 'No existe un mínimo ni máximo de piezas. Sólo se debe considerar que la obra propuesta, sea pieza única o serie, no exceda el espacio máximo de exhibición de dos metros y medio en su lado más largo como medida final, indicado en el numeral 5.e de la convocatoria.', '2021-01-27 17:49:58', '2021-01-27 17:49:58'),
(10, 1, 1, 'mpbroujh¿A-qué-se-refieren-con-materiales-que-permitan-su-adecuada-conservación,-transportación-y-montaje-futuros?', '¿A qué se refieren con materiales que permitan su adecuada conservación, transportación y montaje futuros?', 'La materialidad de la obra y/o sus características de producción deben considerar calidad, peso, dimensiones, estabilidad y soportes que permitan y garanticen a largo plazo su adecuado resguardo y preservación, así como manipulación, exhibición, embalaje, reprografía y traslado para futuros montajes.', '2021-01-27 17:50:14', '2021-01-27 17:50:14'),
(11, 1, 1, 'wpyscoqj¿Qué-es-un-esquema-de-montaje?', '¿Qué es un esquema de montaje?', 'Es la representación gráfica que describe de manera clara y concisa la disposición de los elementos que componen la obra (número de piezas, dimensiones, textos, aditamentos, etcétera), en el espacio a exhibir. El esquema de montaje debe considerar el espacio máximo de exhibición de dos metros y medio en su lado más largo como medida final, indicado en el numeral 5.e de la convocatoria.', '2021-01-27 17:50:28', '2021-01-27 17:50:28'),
(12, 1, 1, 'sprhvtgd¿En-qué-consisten-los-Premios-de-Producción?', '¿En qué consisten los Premios de Producción?', 'En un estímulo de $10,000 (diez mil pesos mexicanos) para cubrir total o parcialmente el costo de producción de las obras seleccionadas por el Jurado para integrar la muestra de la XIX Bienal de Fotografía. Se otorgarán hasta veinticinco Premios de Producción.', '2021-01-27 17:50:42', '2021-01-27 17:50:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `preguntas_frecuentes_convocatorias_id_foreign` (`convocatorias_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD CONSTRAINT `preguntas_frecuentes_convocatorias_id_foreign` FOREIGN KEY (`convocatorias_id`) REFERENCES `convocatorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
