-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 00:53:34
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
(19, 27, 'Pablo', 'Gaione', '1621190565_b18f97cd6f1f6aa49e40.jpg', 'Soy un autor muy dedicado a escribir libros', '2021-05-16 16:42:45', '2021-05-16 16:42:45'),
(20, 28, 'bruno', 'rodriguez', '1621190710_d9295e6a01b561966a5a.jpg', 'me conocen todos', '2021-05-16 16:45:10', '2021-05-16 16:45:10');

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
(19, 9),
(19, 10);

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
(16, 0, 'Accion', '1621435723_0bc42170a0e43ad2bc76.png', '2021-05-19 12:48:43', '2021-05-19 12:48:43'),
(17, 0, 'Estrategia', '1621436981_03922a96cecd83c268f1.png', '2021-05-19 13:09:41', '2021-05-19 13:09:41'),
(25, 17, 'Susana', '1621441658_5bbf407138ad4877689d.png', '2021-05-19 14:27:38', '2021-05-19 14:27:38'),
(26, 25, 'Lucia', '1621442171_96d8aa00a242023b7a49.png', '2021-05-19 14:36:11', '2021-05-19 14:36:11'),
(27, 17, 'Adam', '1621442278_a97c6cf051a160bb506e.png', '2021-05-19 14:37:58', '2021-05-19 14:37:58');

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
(27, 27);

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
(10, 32, 'joselo', 'garcia', '1621282440_8aa34b37278460c98ad2.png', '1982-05-04', 1, '2021-05-18 20:53:55', '2021-05-18 18:53:55');

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
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rutaImg` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descargable` int(11) NOT NULL,
  `suscripcion` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `autor_id`, `nombre`, `descripcion`, `rutaImg`, `tipo`, `descargable`, `suscripcion`, `created_at`, `updated_at`) VALUES
(15, 19, 'una historia maravillosa', 'libro de arte', '1621198428_17f50e87ecd26607da00.jpg', 'audio-libro', 1, 0, '2021-05-16 18:53:48', '2021-05-16 18:53:48'),
(16, 19, 'Video Juegos', 'te ayudo si me pagas bien ', '1621199086_02f72ba0597a9c97a267.jpg', 'podcast', 1, 0, '2021-05-16 19:04:46', '2021-05-16 19:04:46'),
(17, 19, 'La historia de Pi', 'Audio libro sobre la pelicual de un indio en un barco con un tigre y otros animales', '1621272218_79f90b7f2fd7f0cf91a0.jpg', 'audio-libro', 1, 0, '2021-05-17 15:23:38', '2021-05-17 15:23:38'),
(18, 19, 'mi vida es muy buena', 'la historia de un tipo que se comio un perro crudo', '1621290011_f5cd51d0681d28d80499.jpg', 'revista', 2, 1, '2021-05-17 20:20:11', '2021-05-17 20:20:11'),
(19, 19, 'Las rosas rojas', 'Lasrosas rojas', '1621450663_320bbb4faadbfdda0f4c.png', 'revista', 2, 1, '2021-05-19 16:57:43', '2021-05-19 16:57:43'),
(20, 19, 'Marta', 'De todo', '1621451052_441b3c794299adbabf1c.png', 'documento', 1, 1, '2021-05-19 17:04:12', '2021-05-19 17:04:12'),
(21, 19, 'Biblia', 'Biblia catolica', '1621451554_840e822a4b7d36ca0ad6.png', 'audio-libro', 1, 1, '2021-05-19 17:12:34', '2021-05-19 17:12:34'),
(23, 19, 'Documentos x', 'Confidencial', '1621453118_a17ecfede5a2071da6a5.png', 'podcast', 1, 1, '2021-05-19 17:38:38', '2021-05-19 17:38:38'),
(24, 19, 'Locura y fama', 'Fama', '1621454195_35c03fe0cb0207b156b0.png', 'audio-libro', 1, 0, '2021-05-19 17:56:35', '2021-05-19 17:56:35'),
(25, 19, 'Biografia de goku', 'Dragon ball z', '1621454453_f6ede35acb3a80da1782.png', 'revista', 1, 1, '2021-05-19 18:00:53', '2021-05-19 18:00:53'),
(26, 19, 'Biografia de goha', 'Gohan', '1621454673_012d661e19776cea4136.png', 'podcast', 1, 1, '2021-05-19 18:04:33', '2021-05-19 18:04:33'),
(27, 19, 'Biografia de vegueta', 'Vegueta', '1621454970_414b49f7b4fb88be7cb2.jpg', 'documento', 1, 1, '2021-05-19 18:09:30', '2021-05-19 18:09:30');

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
(32, 'josegarcia@gmail.com', 'morcilla', '1234', 'cliente', '2021-05-17 18:14:00', '2021-05-17 18:14:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
