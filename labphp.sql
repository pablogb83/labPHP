-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2021 a las 20:25:26
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(5) UNSIGNED NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rutaImg` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `biografia` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `usuario_id`, `nombre`, `apellido`, `rutaImg`, `biografia`, `created_at`, `updated_at`) VALUES
(19, 27, 'Dan ', 'Brown', '1622829657_d0bdfb9a8e09b4504668.jpg', 'Hijo de un matemático y una compositora de música sacra. Estudió secundaria en el instituto Phillips Exeter Academy, Class of 1982, y sus estudios universitarios en Amherst College. Como estudiante residió en Gijón (España) en el año de 1980, este traslado a España fue su primer viaje al extranjero estudiando en un instituto de dicha ciudad. Brown afirma que en 1985, un año antes de graduarse, estudió Historia del Arte en la Universidad de Sevilla, pero esta universidad declaró que no existen registros de que él hubiese sido estudiante en sus instalaciones, y que en caso de haberlo sido es probable que lo haya hecho como un estudiante itinerante en un simple curso de verano. Diplomado por el Amherst College, se dedicó a la música: produjo una grabación con canciones infantiles y fundó la empresa Dalliance, con la que grabó Perspective. Su hermano Gregory W. Brown también estudió secundaria en Phillips Exeter Academy y realizó los estudios de música y composición en Amherst College, al igual que Dan.', '2021-06-04 18:00:57', '2021-06-04 16:00:57'),
(20, 28, 'bruno', 'rodriguez', '1621190710_d9295e6a01b561966a5a.jpg', 'me conocen todos', '2021-05-16 16:45:10', '2021-05-16 16:45:10'),
(21, 36, 'Danilo', 'Castallaneta', '1622818918_11118f66c31627f02f7f.jpg', 'Me confunden con el de los Simpsons, pero no se por que ', '2021-06-04 15:01:58', '2021-06-04 13:01:58'),
(22, 41, 'sdfsdfsdf', 'dsfsdfsdf', '1622063086_43d00100ce211d9ade08.jpg', 'me conocen todos', '2021-05-26 19:04:46', '2021-05-26 19:04:46'),
(23, 43, 'Pablo', 'casas', '1622587912_af25367c6ce270041dd7.jpg', 'me conocen todos', '2021-06-01 20:51:52', '2021-06-01 20:51:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_cliente`
--

CREATE TABLE `autor_cliente` (
  `autor_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor_cliente`
--

INSERT INTO `autor_cliente` (`autor_id`, `cliente_id`) VALUES
(19, 10),
(19, 12),
(19, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rutaImg` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria_id`, `nombre`, `rutaImg`, `created_at`, `updated_at`) VALUES
(12, 0, 'Ciencias', 'ciencia.jpg', '2021-05-17 01:51:30', '2021-05-16 23:51:30'),
(14, 0, 'Video Juegos', '1621205199_71ce83b27cc9f5cd6bf6.jpeg', '2021-05-16 23:46:39', '2021-05-16 23:46:39'),
(15, 0, 'Viajes', '1621205514_3e963ed66e45102d5a6a.jpg', '2021-05-16 23:51:54', '2021-05-16 23:51:54'),
(16, 0, 'Deportes', '1622666283_444c3259152a36b09860.jpg', '2021-06-04 17:10:16', '2021-06-04 15:10:16'),
(25, 17, 'Naturaleza', '1622666307_4ad892341c7afbeee94e.jpg', '2021-06-02 20:38:27', '2021-06-02 18:38:27'),
(33, 0, 'Gente y sociedad', '1622069947_bf778ac4e7b3c94be616.jpg', '2021-06-04 17:10:37', '2021-06-04 15:10:37'),
(34, 0, 'Exótico', '1622070520_d4c82aee7a63b52e0ecc.jpg', '2021-06-04 17:11:12', '2021-06-04 15:11:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_recurso`
--

CREATE TABLE `categoria_recurso` (
  `categoria_id` int(11) NOT NULL,
  `recurso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_recurso`
--

INSERT INTO `categoria_recurso` (`categoria_id`, `recurso_id`) VALUES
(12, 15),
(13, 15),
(15, 17),
(12, 18),
(14, 18),
(26, 19),
(14, 20),
(25, 21),
(26, 22),
(26, 23),
(25, 23),
(25, 24),
(17, 24),
(26, 25),
(25, 25),
(17, 25),
(12, 26),
(25, 26),
(17, 26),
(26, 26),
(27, 26),
(12, 27),
(25, 27),
(17, 27),
(26, 27),
(27, 27),
(26, 28),
(25, 28),
(17, 28),
(12, 29),
(17, 29),
(26, 29),
(27, 29),
(15, 30),
(14, 31),
(17, 32),
(17, 33),
(15, 34),
(15, 35),
(12, 36),
(15, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rutaImg` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `suscripto` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario_id`, `nombre`, `apellido`, `rutaImg`, `fechaNac`, `suscripto`, `created_at`, `updated_at`) VALUES
(9, 31, 'jose', 'perez', '1621192587_c2c2f032f2551eadfdad.jpg', '1989-02-15', 1, '2021-05-17 22:59:25', '2021-05-17 20:59:25'),
(10, 32, 'Lio Edgardo', 'Essi Silva', '1622818806_28f8734612e11957084b.jfif', '1982-05-05', 1, '2021-06-04 17:22:19', '2021-06-04 15:22:19'),
(11, 33, 'marcelo', 'Arena', '1621617233_62597bbbbfbe54cf837e.jpg', '1963-02-12', 1, '2021-05-21 17:14:51', '2021-05-21 15:14:51'),
(12, 34, 'jose', 'gomez', '1621628413_1421684bd8d20280aa0f.jpg', '1986-05-12', 1, '2021-05-21 20:23:05', '2021-05-21 18:23:05'),
(13, 35, 'gonzalo', 'martinez', '1621695658_0e3d03ea5d90d3b3d744.jfif', '1983-05-04', 1, '2021-05-28 20:20:31', '2021-05-28 18:20:31'),
(15, 38, 'marcos', 'trombola', '1622059263_2865b7b1a4572ba66173.jpg', '1978-04-15', 1, '2021-05-28 20:50:36', '2021-05-28 18:50:36'),
(18, 42, 'Usuario', 'Prueba', 'default.png', '1983-05-04', 0, '2021-06-03 16:16:01', '2021-06-03 14:16:01'),
(19, 44, 'sdfsdfsdf', 'dsfsdfsdf', 'default.png', '1996-06-05', 0, '2021-06-01 20:54:20', '2021-06-01 20:54:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_recurso`
--

CREATE TABLE `cliente_recurso` (
  `cliente_id` int(11) NOT NULL,
  `recurso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente_recurso`
--

INSERT INTO `cliente_recurso` (`cliente_id`, `recurso_id`) VALUES
(9, 25),
(10, 27),
(9, 27),
(9, 26),
(10, 24),
(9, 21),
(12, 28),
(10, 29),
(10, 32),
(13, 15),
(10, 23),
(18, 18),
(10, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `recurso_id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `texto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `cliente_id`, `recurso_id`, `nota`, `texto`, `created_at`, `updated_at`) VALUES
(1, 10, 24, 4, 'me parece muy interesante', '2021-05-21 22:11:54', '2021-05-21 22:11:54'),
(2, 10, 23, 4, 'buenisimo', '2021-05-21 22:22:28', '2021-05-21 22:22:28'),
(3, 10, 28, 1, 'malo', '2021-05-21 22:23:44', '2021-05-21 22:23:44'),
(4, 12, 28, 3, 'bueno', '2021-05-21 22:24:53', '2021-05-21 22:24:53'),
(5, 13, 28, 5, 'me parece una maravilla', '2021-05-22 13:01:34', '2021-05-22 13:01:34'),
(6, 10, 24, 2, 'cambie de opinion, es una porqueria', '2021-05-22 16:55:22', '2021-05-22 16:55:22'),
(7, 10, 20, 3, 'El nombre no ayuda para lo que es el contenido', '2021-05-24 18:17:46', '2021-05-24 18:17:46'),
(8, 10, 18, 4, 'me parece muy interesante', '2021-05-24 21:57:16', '2021-05-24 21:57:16'),
(9, 10, 18, 1, 'me arrepenti me parece una mierda', '2021-05-24 21:57:41', '2021-05-24 21:57:41'),
(10, 10, 32, 1, 'aburrido', '2021-05-24 21:59:00', '2021-05-24 21:59:00'),
(11, 12, 32, 5, 'pienso que no esta mal, al menos podemos sentirnos mas cercanos a el', '2021-05-25 17:35:27', '2021-05-25 17:35:27'),
(12, 10, 33, 1, 'jodido', '2021-05-25 20:24:30', '2021-05-25 18:24:00'),
(14, 10, 21, 3, 'la portada es diablolica', '2021-05-25 19:33:53', '2021-05-25 19:33:53'),
(15, 13, 15, 4, 'me parece muy interesante', '2021-05-26 20:15:56', '2021-05-26 20:15:56'),
(16, 13, 32, 4, 'me parece muy interesante', '2021-05-28 18:47:44', '2021-05-28 18:47:44'),
(17, 9, 32, 4, 'es barbaro', '2021-05-29 16:18:49', '2021-05-29 16:18:49'),
(18, 10, 17, 2, 'la pelicula es conmovedora, esto no tiene ni pie ni cabeza', '2021-05-29 17:34:41', '2021-05-29 17:34:41'),
(19, 13, 17, 4, 'es un fiel reflejo de la pelicula, solo que el tigre es mas viejo', '2021-05-29 17:35:59', '2021-05-29 17:35:59'),
(29, 9, 17, 1, 'me parece muy interesante', '2021-05-29 17:59:23', '2021-05-29 17:59:23'),
(30, 9, 17, 3, 'interesante dije? perdon queria decir intedezante', '2021-05-29 18:00:23', '2021-05-29 18:00:23'),
(31, 11, 17, 3, 'es delirante, sobre todo el final, que no lo entendi', '2021-05-29 18:04:48', '2021-05-29 18:04:48'),
(32, 10, 35, 3, 'no sabia que las langostas tenian una vida tan interesante', '2021-06-01 17:09:02', '2021-06-01 17:09:02'),
(33, 10, 19, 2, 'me parece muy interesante', '2021-06-02 19:55:40', '2021-06-02 19:55:40'),
(34, 10, 16, 2, 'El autor sabe muy poco de videojuegos', '2021-06-04 13:13:34', '2021-06-04 13:13:34'),
(35, 10, 36, 4, 'No la entendi, pero me dijeron que esta muy buena', '2021-06-04 16:08:25', '2021-06-04 16:08:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `cliente_id`, `nombre`, `tipo`, `created_at`, `updated_at`) VALUES
(2, 10, 'mi lista 1', 1, '2021-05-22 19:55:30', '2021-05-22 19:55:30'),
(3, 10, 'mi lista 2', 2, '2021-05-23 12:40:59', '2021-05-23 12:40:59'),
(4, 10, 'la lista definitiva', 1, '2021-05-23 13:27:47', '2021-05-23 13:27:47'),
(5, 10, 'Post de ciencia', 2, '2021-05-24 18:59:39', '2021-05-24 18:59:39'),
(6, 10, 'otra lista mas ', 1, '2021-05-25 19:53:30', '2021-05-25 19:53:30'),
(7, 13, 'mi lista principal', 1, '2021-05-26 20:17:05', '2021-05-26 20:17:05'),
(8, 10, 'nueva lista', 2, '2021-05-28 18:44:14', '2021-05-28 18:44:14'),
(9, 19, 'nueva', 2, '2021-06-01 20:55:39', '2021-06-01 20:55:39'),
(10, 19, 'nueva2', 1, '2021-06-01 20:55:52', '2021-06-01 20:55:52'),
(11, 18, 'prueba1', 2, '2021-06-03 14:18:05', '2021-06-03 14:18:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_recurso`
--

CREATE TABLE `lista_recurso` (
  `lista_id` int(11) NOT NULL,
  `recurso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lista_recurso`
--

INSERT INTO `lista_recurso` (`lista_id`, `recurso_id`) VALUES
(2, 24),
(2, 28),
(2, 28),
(3, 28),
(4, 24),
(4, 29),
(4, 18),
(5, 15),
(5, 18),
(5, 29),
(3, 32),
(7, 33),
(8, 24),
(8, 29),
(8, 32),
(6, 35),
(9, 21),
(10, 21),
(11, 18),
(11, 34),
(4, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-09-192530', 'App\\Database\\Migrations\\Tablausuarios', 'default', 'App', 1620611028, 1),
(2, '2021-05-09-233039', 'App\\Database\\Migrations\\Tablaadmin', 'default', 'App', 1620611028, 1),
(3, '2021-05-09-233325', 'App\\Database\\Migrations\\Tablacategorias', 'default', 'App', 1620611028, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `rutaImg` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rutaArch` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descargable` int(11) NOT NULL,
  `suscripcion` tinyint(1) NOT NULL,
  `nota` float NOT NULL DEFAULT 0,
  `visitas` int(11) NOT NULL,
  `descargas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `autor_id`, `nombre`, `descripcion`, `rutaImg`, `rutaArch`, `tipo`, `descargable`, `suscripcion`, `nota`, `visitas`, `descargas`, `created_at`, `updated_at`) VALUES
(15, 19, 'una historia maravillosa y linda', 'libro de arte buenisimo', '1622819150_a1d47ea049f42146c95b.jpg', '', 'audio-libro', 1, 0, 4, 1, 0, '2021-05-16 18:53:48', '2021-06-04 13:05:50'),
(16, 19, 'Video Juegos', 'te ayudo si me pagas bien ', '1622819243_d3c44a5de6b39067266c.jpg', '', 'podcast', 1, 0, 2, 9, 2, '2021-05-16 19:04:46', '2021-06-04 13:14:18'),
(18, 19, 'mi vida es muy buena', 'la historia de un tipo que se comio un perro crudo', '1621290011_f5cd51d0681d28d80499.jpg', '', 'revista', 2, 1, 2.5, 7, 0, '2021-05-17 20:20:11', '2021-06-03 14:18:20'),
(19, 19, 'Las rosas rojas', 'Lasrosas rojas', '1621450663_320bbb4faadbfdda0f4c.png', '', 'revista', 2, 1, 2, 10, 0, '2021-05-19 16:57:43', '2021-06-02 20:19:20'),
(20, 19, 'Marta', 'De todo', '1621451052_441b3c794299adbabf1c.png', '', 'documento', 2, 0, 3, 14, 0, '2021-05-19 17:04:12', '2021-06-04 15:45:24'),
(21, 19, 'Los pajaros', 'Recopilación de imágenes y documentos acerca de variadas aves exóticas que recopile por mi viaje por', '1622820419_f6f7ba53a8d324b07200.jpg', '', 'audio-libro', 1, 1, 3, 8, 1, '2021-05-19 17:12:34', '2021-06-04 13:33:12'),
(23, 19, 'Documentos x', 'Confidencial', '1621453118_a17ecfede5a2071da6a5.png', '', 'podcast', 1, 1, 4, 4, 0, '2021-05-19 17:38:38', '2021-06-01 16:49:08'),
(28, 19, 'La moto rota', 'historia de una moto que se rompio y ta', '1621625103_3fd4f5e428e8b4ae5766.jpg', '', 'audio-libro', 1, 0, 2.33333, 0, 0, '2021-05-21 17:25:03', '2021-05-22 13:01:34'),
(29, 21, 'Historia reciente de la manzana verde', 'Este libro trata sobre la historia mas reciente de una manzana verde pepino', '1621720974_544230faa8c9913e376c.jpeg', '', 'libro', 1, 0, 0, 3, 0, '2021-05-22 20:02:55', '2021-06-01 16:11:21'),
(30, 19, 'probando descarga', 'archivo de prueba ', '1621897178_b73682e18dfd9180f974.png', NULL, 'libro', 1, 0, 0, 0, 0, '2021-05-24 20:59:38', '2021-05-24 20:59:38'),
(31, 19, 'recurso de prueba 2', 'es una prueba para subir y bajar archivos', '1621897344_cda60553e0c645457d78.jfif', '1621897344_a01c64d0b90fcac6bf48.pdf', 'libro', 1, 0, 0, 0, 0, '2021-05-24 21:02:24', '2021-05-24 21:02:24'),
(32, 19, 'hola hola hola', 'una genialidad del autor donde podemos escuchar su vos por primera vez', '1621900108_e9104c65a0a5b5d10851.jpg', '1621900108_55246fa3bbe7c9bfa1db.m4a', 'audio-libro', 1, 0, 1.58333, 27, 0, '2021-05-24 21:48:28', '2021-06-02 21:07:02'),
(33, 21, 'Una vida dedicada al doblaje', 'Cuento mis experiencias doblando personajes de series animadas, pero no de los Simpsons', '1621971625_af015760dc81a755238a.jpg', '1621971625_f02daa03d86b919f45fc.pdf', 'revista', 1, 0, 1, 25, 0, '2021-05-25 17:40:25', '2021-06-04 15:43:11'),
(34, 21, 'archivo cifrado', 'este es un archivo pdf con clave ', '1622410582_a144c6275e415875f437.png', '1622410582_3e215c91c586360c6372.pdf', 'revista', 1, 1, 0, 10, 0, '2021-05-30 19:36:22', '2021-06-04 15:45:17'),
(35, 21, 'la vida de una langosta', 'historia de la vida de una langosta en primavera', '1622574467_3b714389109013f4a41d.jpg', '1622574467_7f2e6f617ada31e7e88d.pdf', 'revista', 0, 0, 3, 96, 2, '2021-06-01 17:07:47', '2021-06-04 15:45:13'),
(36, 19, 'Codigo da Vinci', 'El código Da Vinci es una novela de misterio escrita por Dan Brown y publicada por primera vez por Random House en 2003 (ISBN 0-385-50420-9). Se ha convertido en un superventas mundial, con más de 80 millones de ejemplares vendidos y traducido a 44 idiomas.  Al combinar los géneros de suspenso detectivesco y esoterismo Nueva Era, con una teoría de conspiración relativa al Santo Grial y al papel de María Magdalena en el cristianismo, la novela espoleó el difundido interés (sobre todo en los Estad', '1622829883_d50e60dc5a0f4ce2522c.jpg', '1622829883_060e7e71a9c1a46b7519.pdf', 'libro', 2, 1, 4, 6, 0, '2021-06-04 16:04:43', '2021-06-04 16:23:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id` int(11) NOT NULL,
  `valor` float NOT NULL DEFAULT 20,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Suscripcion a Truchameo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id`, `valor`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 20, 'Suscripcion a Truchameo', '2021-06-03 18:37:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'indefinido',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nick`, `password`, `tipo`, `created_at`, `updated_at`) VALUES
(27, 'pablo@gmail.com', 'pablogb83', '1234', 'autor', '2021-05-16 16:42:45', '2021-05-16 16:42:45'),
(31, 'toto@gmail.com', 'jose89', '1234', 'cliente', '2021-05-16 17:16:27', '2021-05-16 17:16:27'),
(32, 'josegarcia@gmail.com', 'morcilla', '1234', 'cliente', '2021-05-17 18:14:00', '2021-05-17 18:14:00'),
(33, 'marcelo@gmail.com', 'garka', '1234', 'cliente', '2021-05-21 15:13:53', '2021-05-21 15:13:53'),
(34, 'jose@gomez.com', 'totom', '1234', 'cliente', '2021-05-21 18:20:13', '2021-05-21 18:20:13'),
(35, 'gonzalo@gmail.com', 'elCabeza', '1234', 'cliente', '2021-05-22 13:00:58', '2021-05-22 13:00:58'),
(36, 'danCastala@gmail.com', 'dan_castalla', '1234', 'autor', '2021-05-22 15:41:23', '2021-05-22 15:41:23'),
(38, 'marquitosTrombola@gmail.com', 'elTrombo', '1234', 'cliente', '2021-05-26 18:01:03', '2021-05-26 18:01:03'),
(41, 'sdfsdfsdfsdf@gmail.com', 'dfsdfsdf', '1234', 'autor', '2021-05-26 19:04:46', '2021-05-26 19:04:46'),
(42, 'usuario@prueba.com', 'usuarioPrueba', '1234', 'cliente', '2021-06-01 19:02:56', '2021-06-01 19:02:56'),
(43, 'sdsadasd@gmail.com', 'autor1', '1234', 'autor', '2021-06-01 20:51:52', '2021-06-01 20:51:52'),
(44, 'nuevo@gmail.com', 'gsdgsdgsdg', '1234', 'cliente', '2021-06-01 20:54:20', '2021-06-01 20:54:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autor_cliente`
--
ALTER TABLE `autor_cliente`
  ADD PRIMARY KEY (`autor_id`,`cliente_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
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
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
