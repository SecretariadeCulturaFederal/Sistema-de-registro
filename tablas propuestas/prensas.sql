-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.11.255.88
-- Tiempo de generación: 31-10-2023 a las 21:18:00
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
-- Estructura de tabla para la tabla `prensas`
--

CREATE TABLE `prensas` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_kit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_publica` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuarios_id` int(15) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prensas`
--

INSERT INTO `prensas` (`id`, `status`, `slug`, `titulo`, `subtitulo`, `descripcion`, `imagen`, `link_kit`, `fecha_publica`, `usuarios_id`, `created_at`, `updated_at`) VALUES
(5, 1, 'snqpycixprueba-de-prensa', 'prueba de prensa', 'subtítulo', '<h2>descripci&oacute;n editada</h2>', 'prueba-de-prensadcybkuja.JPG', 'https://www.facebook.com/', '2020-04-15 20:00', 10, '2020-03-25 00:10:18', '2020-04-07 21:01:35'),
(6, 1, 'sbrqdvjhPrueba-en-site', 'Prueba en site', 'Sección de prensa', '<p>Recorridos virtuales por museos y recintos catalogados como patrimonio art&iacute;stico, expresiones de la danza con puestas en escena y coreograf&iacute;as, visitas a exposiciones, entrevistas, mesas de reflexi&oacute;n, lectura de obras literarias y clases magistrales forman parte de las actividades que la Secretar&iacute;a de Cultura, a trav&eacute;s del Instituto Nacional de Bellas Artes y Literatura (INBAL), ofrece en la plataforma &ldquo;Contigo en la distancia&rdquo; dirigidas al p&uacute;blico para su disfrute desde casa.</p>', 'Prueba-en-siteslpibjqd.jpg', 'https://www.gob.mx/cultura/prensa/contigo-en-la-distancia-desde-el-inbal', '2020-07-22 15:35', 10, '2020-04-06 19:16:21', '2020-04-07 21:01:39'),
(7, 1, 'pyzumqdvNoticia-importante.', 'Noticia importante.', 'Este texto es el que se verá en la lista.', '<h1>Este es un t&iacute;tulo</h1>\r\n\r\n<p>Esto no es un t&iacute;tulo, pero s&iacute; est&aacute;n en <strong>negritas</strong>, <em>it&aacute;licas </em>y <s>tachado</s>.</p>\r\n\r\n<h3>Y este texto es un poco m&aacute;s grande.</h3>', 'Noticia-importante.qwzcjrla.png', 'http://bienaldefotografia.com.mx/', '2015-02-21 15:35', 10, '2020-04-07 18:31:24', '2020-04-07 21:01:43'),
(8, 1, 'ayjzgvlncrear-sin-t', 'crear sin t', 'crear sin t', '<p>creaci&oacute;n sin T editada</p>', 'crear-sin-tvgrhnxqa.jpg', 'https://laravel.com/docs/7.x/requests#storing-uploaded-files', '2015-02-21 15:35', 10, '2020-04-07 19:56:49', '2020-04-07 21:01:06'),
(9, 1, 'zfplqugnLorem-ipsum-dolor-sit-amet,-consectetur-adipiscing-elit.-Sed-eget-tincidunt-mi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget tincidunt mi', 'Vestibulum lacinia viverra enim sit amet malesuada. Sed varius, neque tempus vehicula mollis, ex odio sodales nulla, consequat volutpat magna libero scelerisque ligula. Duis fermentum enim eu enim accumsan, sit amet scelerisque sapien accumsan.', '<p>Donec nec tellus ut sem viverra pellentesque sed ut tortor. Praesent non vulputate ligula. Duis fermentum enim vitae turpis pretium, eleifend luctus ante convallis. Proin nec pretium ipsum. Integer ac vehicula lorem.</p>\r\n\r\n<p>Sed sit amet quam commodo, tempor urna quis, accumsan lacus. Sed eu mauris eu libero dignissim sollicitudin in id ante. In nibh tellus, imperdiet nec feugiat vitae, posuere at risus. Nam ipsum nibh, viverra in leo vitae, hendrerit semper magna. Nulla elementum a lectus nec pulvinar. Nam maximus placerat dui, sit amet vestibulum arcu varius porta. Fusce et molestie leo. Mauris condimentum tortor a velit luctus, a molestie arcu imperdiet. Phasellus ornare sapien sed justo consequat commodo. Pellentesque est turpis, auctor a tempor nec, gravida non ex. Aenean molestie urna sit amet est vulputate, vel viverra massa placerat.</p>\r\n\r\n<p>Fusce sit amet justo diam. Pellentesque fermentum orci eros, in eleifend nunc congue eu. Ut at vulputate turpis. Nam non iaculis risus. Quisque at orci ac mi cursus molestie. Nunc suscipit orci in porttitor dictum. Nulla finibus rutrum diam a euismod. Sed sit amet magna quis ipsum mollis dapibus. Sed vel cursus magna. Nam eu elementum urna, et semper ligula. Maecenas molestie metus ut ipsum finibus, vel efficitur dolor auctor. Etiam facilisis, purus non molestie aliquet, purus augue rhoncus ipsum, eget lacinia est tortor consequat nulla.</p>\r\n\r\n<p>Curabitur imperdiet lorem ante. Sed varius urna sit amet nisi vestibulum gravida. Pellentesque facilisis, risus eu mattis pretium, lorem nulla rutrum nisi, quis commodo arcu neque quis purus. Aliquam nec porttitor velit. Donec rutrum efficitur rhoncus. Maecenas pharetra ligula tincidunt vulputate consequat. Fusce mattis purus tortor, vel pulvinar risus gravida in. Mauris a dolor vel metus pretium dignissim. Donec elementum fringilla lectus sit amet elementum. Nulla ac lectus risus. Vivamus vestibulum ipsum et dignissim tincidunt. Suspendisse nec semper dui, et iaculis dui. Phasellus ultricies libero nunc, ut sollicitudin dui lobortis eget.</p>\r\n\r\n<p>Vestibulum ac aliquam tellus. Mauris sodales felis nec neque molestie varius. Phasellus sed dui convallis, porta sapien a, vulputate massa. Duis vestibulum tellus id blandit sollicitudin. Vestibulum laoreet, augue id venenatis eleifend, purus odio tincidunt felis, id molestie libero orci eget nisl. In ut finibus nisl, ut dignissim odio. Curabitur iaculis pharetra lectus, tempor molestie sem eleifend ut. Sed vestibulum risus ut leo lacinia, et ullamcorper dolor molestie. Mauris commodo sed lorem vitae lobortis. Morbi venenatis tempor nisi, eget pharetra ligula placerat ac. Maecenas feugiat enim dapibus nulla accumsan lobortis. Mauris ut sapien ac magna pellentesque dignissim vel eu ex. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>', 'Lorem-ipsum-dolor-sit-amet,-consectetur-adipiscing-elit.-Sed-eget-tincidunt-mizfplqugn.jpg', NULL, '08/04/220', 6, '2020-04-08 21:28:58', '2020-04-08 21:28:58'),
(10, 0, 'lqbhpgzvprueba-30-abril', 'prueba 30 abril', 'prensa 30 abril', '<p>Aqu&iacute; hay una prueba de prensa que estar&aacute; disponible a partir del 30 de abirl del 2020</p>', 'prueba-30-abrilfpwcgnrl.jpg', 'https://laravel.com/docs/7.x/requests#storing-uploaded-files', '2020-04-16 18:31:56', 10, '2020-04-27 23:33:43', '2020-04-27 23:37:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prensas`
--
ALTER TABLE `prensas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prensas`
--
ALTER TABLE `prensas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
