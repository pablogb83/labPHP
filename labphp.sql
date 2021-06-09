-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2021 a las 19:14:52
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
(22, 41, 'William ', 'Shakespeare', '1622834740_e7fdc981979c08dc03b0.jpeg', 'William Shakespeare ​ fue un dramaturgo, poeta y actor inglés. Conocido en ocasiones como el Bardo de Avon, Shakespeare es considerado el escritor más importante en lengua inglesa y uno de los más célebres de la literatura universal.​', '2021-06-04 19:25:40', '2021-06-04 17:25:40'),
(23, 43, 'Miguel ', 'Cervantes', '1622834885_871f9ed98e563e6bfaaa.jpg', 'Miguel de Cervantes Saavedra fue un novelista, poeta, dramaturgo y soldado español. Está considerado la máxima figura de la literatura española y es universalmente conocido por haber escrito El ingenioso ', '2021-06-04 19:28:05', '2021-06-04 17:28:05'),
(24, 52, 'Adrián Maximiliano ', 'Nario', '1623202097_f6410baa1ad0ab60f27f.jpeg', 'Adrián Maximiliano Nario, también conocido como El Bananero, es un productor estadounidense y fenómeno de Internet conocido por subir vídeos de clase B con humor irreverente y lenguaje obsceno a su sitio web y luego a YouTube.​ ', '2021-06-08 23:28:17', '2021-06-08 23:28:17'),
(26, 54, 'Nick', 'Heidfield', '1623258691_41361415a1d0f1dcb1bc.jpg', 'Nick Lars Heidfeld (Mönchengladbach, Alemania; 10 de mayo de 1977) es un piloto de automovilismo de velocidad alemán. Ha competido en Fórmula 1 para varios equipos durante los años 2000, incluyendo Prost, Sauber, Jordan, Williams y BMW Sauber. En la temporada 2010, fue piloto de pruebas en Mercedes1​ y piloto oficial de BMW Sauber.2​3​ El 16 de febrero de 2011, fue confirmado por Renault GP como piloto oficial de la escudería para la temporada 2011, sustituyendo así a Robert Kubica.4​ Sin embargo, el 2 de septiembre, el equipo confirmó a Bruno Senna como su sustituto para el resto de la temporada.5​  Sus mejores resultados de campeonato fueron quinto en 2007, sexto en 2008, y octavo en 2001. El alemán logró 13 podios en Fórmula 1, la mayor cantidad entre los pilotos sin victorias.  Entre 2012 y 2016, Heidfeld participó en la clase LMP1 del Campeonato Mundial de Resistencia con Rebellion Racing.6​ Finalizó 4º en las 24 Horas de Le Mans 2012.', '2021-06-09 15:11:31', '2021-06-09 15:11:31');

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
(19, 15),
(19, 18),
(21, 10),
(21, 15),
(22, 15),
(24, 26),
(25, 10);

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
(34, 0, 'Exótico', '1622070520_d4c82aee7a63b52e0ecc.jpg', '2021-06-04 17:11:12', '2021-06-04 15:11:12'),
(35, 12, 'ciencias fisicas', '1622840267_0ebf1487cf466a6905bf.jpg', '2021-06-04 18:57:47', '2021-06-04 18:57:47');

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
(15, 36),
(14, 37),
(15, 37),
(33, 37),
(25, 38),
(34, 38),
(15, 39),
(25, 39),
(33, 39),
(34, 39),
(15, 40),
(25, 40),
(33, 40),
(15, 41),
(25, 41),
(34, 41),
(16, 42),
(33, 42);

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
(10, 32, 'Lio Edgardo', 'Essi Silva', '1622818806_28f8734612e11957084b.jfif', '1982-05-06', 1, '2021-06-04 19:33:13', '2021-06-04 17:33:13'),
(11, 33, 'marcelo', 'Arena', '1621617233_62597bbbbfbe54cf837e.jpg', '1963-02-12', 1, '2021-05-21 17:14:51', '2021-05-21 15:14:51'),
(12, 34, 'jose', 'gomez', '1621628413_1421684bd8d20280aa0f.jpg', '1986-05-12', 1, '2021-05-21 20:23:05', '2021-05-21 18:23:05'),
(13, 35, 'gonzalo', 'martinez', '1621695658_0e3d03ea5d90d3b3d744.jfif', '1983-05-04', 1, '2021-05-28 20:20:31', '2021-05-28 18:20:31'),
(15, 38, 'marcos', 'trombola', '1622926977_757596845f1191db5947.jpg', '1978-04-15', 1, '2021-06-05 21:02:57', '2021-06-05 19:02:57'),
(18, 42, 'Usuario', 'Prueba', 'default.png', '1983-05-04', 1, '2021-06-04 20:20:28', '2021-06-03 14:16:01'),
(19, 44, 'sdfsdfsdf', 'dsfsdfsdf', 'default.png', '1996-06-05', 0, '2021-06-01 20:54:20', '2021-06-01 20:54:20'),
(20, 45, 'jose', 'perez', '1622839279_ee18e3b23c9766672ab7.jpg', '1985-03-05', 0, '2021-06-04 20:41:19', '2021-06-04 18:41:19'),
(23, 48, 'Marcos', 'Antonio', 'default.png', '1998-11-02', 0, '2021-06-05 17:50:03', '2021-06-05 17:50:03'),
(24, 49, 'Alberto ', 'Perez del Puerto', 'default.png', '1986-12-05', 0, '2021-06-05 18:12:46', '2021-06-05 18:12:46'),
(26, 51, 'Luis Alberto', 'Suarez', '1623203300_1eb16b8e506bbf808a90.jpg', '1989-02-15', 0, '2021-06-09 01:48:20', '2021-06-08 23:48:20');

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
(10, 36),
(20, 36),
(15, 35),
(15, 38),
(15, 37),
(10, 40),
(26, 40),
(10, 42);

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
(16, 13, 32, 3, 'me parece muy interesante', '2021-06-06 02:37:39', '2021-05-28 18:47:44'),
(17, 9, 32, 4, 'es barbaro', '2021-05-29 16:18:49', '2021-05-29 16:18:49'),
(18, 10, 17, 2, 'la pelicula es conmovedora, esto no tiene ni pie ni cabeza', '2021-05-29 17:34:41', '2021-05-29 17:34:41'),
(19, 13, 17, 4, 'es un fiel reflejo de la pelicula, solo que el tigre es mas viejo', '2021-05-29 17:35:59', '2021-05-29 17:35:59'),
(29, 9, 17, 1, 'me parece muy interesante', '2021-05-29 17:59:23', '2021-05-29 17:59:23'),
(30, 9, 17, 3, 'interesante dije? perdon queria decir intedezante', '2021-05-29 18:00:23', '2021-05-29 18:00:23'),
(31, 11, 17, 3, 'es delirante, sobre todo el final, que no lo entendi', '2021-05-29 18:04:48', '2021-05-29 18:04:48'),
(32, 10, 35, 3, 'no sabia que las langostas tenian una vida tan interesante', '2021-06-01 17:09:02', '2021-06-01 17:09:02'),
(33, 10, 19, 2, 'me parece muy interesante', '2021-06-02 19:55:40', '2021-06-02 19:55:40'),
(34, 10, 16, 2, 'El autor sabe muy poco de videojuegos', '2021-06-04 13:13:34', '2021-06-04 13:13:34'),
(35, 10, 36, 4, 'No la entendi, pero me dijeron que esta muy buena', '2021-06-04 16:08:25', '2021-06-04 16:08:25'),
(36, 18, 20, 3, 'Esta bien, pero lo del patriarcado esta mal enfocado', '2021-06-04 18:21:00', '2021-06-04 18:21:00'),
(37, 10, 29, 4, 'me parece muy interesante', '2021-06-04 18:47:42', '2021-06-04 18:47:42'),
(38, 15, 35, 1, 'Esto es un plagio, en la portada dice el nombre de otro autor', '2021-06-05 19:01:19', '2021-06-05 19:01:19'),
(39, 10, 39, 4, 'Este autor esta robando obras, fijense en las portadas, nunca sale su nombre, estoy indignado!. Igual me gusto', '2021-06-06 00:01:56', '2021-06-06 00:01:56'),
(40, 15, 32, 1, 'un robo, no paguen por esto porque no vale la pena', '2021-06-06 00:39:52', '2021-06-06 00:39:52'),
(41, 15, 38, 3, 'habla solo sobre perros, asi que el titulo no estaria bien', '2021-06-06 00:43:16', '2021-06-06 00:43:16'),
(42, 15, 37, 5, 'el juego esta bien, la revista... tambien!!!', '2021-06-06 00:45:56', '2021-06-06 00:45:56'),
(43, 10, 40, 4, 'Conmovedor', '2021-06-08 23:44:46', '2021-06-08 23:44:46'),
(44, 10, 41, 3, 'me dormi a la media hora, pero... es para eso no? ', '2021-06-09 14:58:18', '2021-06-09 14:58:18'),
(45, 10, 42, 1, 'fracasado', '2021-06-09 15:07:04', '2021-06-09 15:07:04');

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
(11, 18, 'prueba1', 2, '2021-06-03 14:18:05', '2021-06-03 14:18:05'),
(12, 20, 'lista1', 2, '2021-06-04 18:41:44', '2021-06-04 18:41:44'),
(13, 15, 'todo sobre langostas', 1, '2021-06-05 19:04:51', '2021-06-05 19:04:51'),
(14, 26, 'lista nueva', 2, '2021-06-08 23:49:09', '2021-06-08 23:49:09');

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
(4, 36),
(12, 36),
(13, 35),
(13, 38),
(8, 40),
(14, 40),
(8, 42);

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
(15, 19, 'una historia maravillosa y linda', 'libro de arte buenisimo', '1622819150_a1d47ea049f42146c95b.jpg', '', 'audio-libro', 1, 0, 4, 2, 0, '2021-05-16 18:53:48', '2021-06-05 16:22:09'),
(16, 19, 'Video Juegos', 'te ayudo si me pagas bien ', '1622819243_d3c44a5de6b39067266c.jpg', '', 'podcast', 1, 0, 2, 13, 3, '2021-05-16 19:04:46', '2021-06-06 00:07:49'),
(18, 19, 'mi vida es muy buena', 'la historia de un tipo que se comio un perro crudo', '1621290011_f5cd51d0681d28d80499.jpg', '', 'revista', 2, 1, 2.5, 7, 0, '2021-05-17 20:20:11', '2021-06-03 14:18:20'),
(19, 19, 'Las rosas rojas', 'Lasrosas rojas', '1621450663_320bbb4faadbfdda0f4c.png', '', 'revista', 2, 1, 2, 10, 0, '2021-05-19 16:57:43', '2021-06-02 20:19:20'),
(20, 19, 'Marta', 'La historia de una mujer en tiempos del patriarcado', '1622837924_f8c4be5d136b15a929d8.jpg', '', 'documento', 2, 0, 3, 17, 0, '2021-05-19 17:04:12', '2021-06-04 18:21:00'),
(21, 19, 'Los pajaros', 'Recopilación de imágenes y documentos acerca de variadas aves exóticas que recopile por mi viaje por', '1622820419_f6f7ba53a8d324b07200.jpg', '', 'audio-libro', 1, 1, 3, 10, 1, '2021-05-19 17:12:34', '2021-06-09 14:59:35'),
(23, 19, 'Documentos x', 'Confidencial', '1621453118_a17ecfede5a2071da6a5.png', '', 'podcast', 1, 1, 4, 6, 0, '2021-05-19 17:38:38', '2021-06-05 19:06:28'),
(29, 21, 'Historia reciente de la manzana', 'Este libro trata sobre la historia mas reciente de una manzana verde pepino', '1622925960_0ec0bf3a59fc51bc1904.jpg', '', 'libro', 1, 0, 4, 8, 0, '2021-05-22 20:02:55', '2021-06-06 00:22:14'),
(30, 19, 'probando descarga', 'archivo de prueba ', '1621897178_b73682e18dfd9180f974.png', NULL, 'libro', 1, 0, 0, 0, 0, '2021-05-24 20:59:38', '2021-05-24 20:59:38'),
(31, 19, 'recurso de prueba 2', 'es una prueba para subir y bajar archivos', '1621897344_cda60553e0c645457d78.jfif', '1621897344_a01c64d0b90fcac6bf48.pdf', 'libro', 1, 0, 0, 0, 0, '2021-05-24 21:02:24', '2021-05-24 21:02:24'),
(32, 19, 'hola hola hola', 'una genialidad del autor donde podemos escuchar su vos por primera vez', '1621900108_e9104c65a0a5b5d10851.jpg', '1621900108_55246fa3bbe7c9bfa1db.m4a', 'audio-libro', 1, 0, 2.8, 40, 1, '2021-05-24 21:48:28', '2021-06-06 00:39:52'),
(33, 21, 'Una vida dedicada al doblaje', 'Cuento mis experiencias doblando personajes de series animadas, pero no de los Simpsons', '1622926637_d4723f8ff352f2aca52b.jpg', '1621971625_f02daa03d86b919f45fc.pdf', 'revista', 1, 0, 1, 25, 0, '2021-05-25 17:40:25', '2021-06-05 18:57:17'),
(34, 21, 'archivo cifrado', 'este es un archivo pdf con clave ', '1622410582_a144c6275e415875f437.png', '1622410582_3e215c91c586360c6372.pdf', 'revista', 1, 1, 0, 11, 0, '2021-05-30 19:36:22', '2021-06-05 16:25:41'),
(35, 21, 'la vida de una langosta', 'historia de la vida de una langosta en primavera y verano', '1622926747_4d22410a8118b3eff8ed.jpg', '1622574467_7f2e6f617ada31e7e88d.pdf', 'revista', 1, 0, 2, 107, 3, '2021-06-01 17:07:47', '2021-06-08 17:25:31'),
(36, 19, 'Codigo da Vinci', 'El código Da Vinci es una novela de misterio escrita por Dan Brown y publicada por primera vez por Random House en 2003 (ISBN 0-385-50420-9). Se ha convertido en un superventas mundial, con más de 80 millones de ejemplares vendidos y traducido a 44 idiomas.  Al combinar los géneros de suspenso detectivesco y esoterismo Nueva Era, con una teoría de conspiración relativa al Santo Grial y al papel de María Magdalena en el cristianismo, la novela espoleó el difundido interés (sobre todo en los Estad', '1622829883_d50e60dc5a0f4ce2522c.jpg', '1622829883_060e7e71a9c1a46b7519.pdf', 'libro', 2, 1, 4, 23, 0, '2021-06-04 16:04:43', '2021-06-05 18:36:21'),
(37, 19, 'The Division', 'Manual del juego, todas sus trucos y ademas una guia compleata del mismo.', '1622942809_b2a55f7e2460bc1589fb.jpg', '1622942809_6e15e43bfde3921eca63.pdf', 'documento', 1, 1, 5, 3, 1, '2021-06-05 23:26:49', '2021-06-06 00:46:07'),
(38, 19, 'Todo sobre las mascotas', 'Te cuento todo lo que se de las mascotas tradicionales', '1622943591_79195c9a5d5d54ee2923.jpg', '1622943591_442e6a5e959efd5b3e26.pdf', 'documento', 2, 0, 3, 6, 0, '2021-06-05 23:39:51', '2021-06-08 17:23:49'),
(39, 19, 'Madrid Secreto', 'Madrid es la capital central de España con elegantes bulevares y amplios parques muy cuidados, como el Buen Retiro. Es famosa por sus ricas colecciones de arte europeo, con obras de Goya, Velázquez y otros maestros españoles en el Museo del Prado. El corazón del antiguo Madrid de los Habsburgo es la Plaza Mayor bordeada de pórticos y cerca se encuentra el Palacio Real y la Armería, que exhiben arsenales históricos.', '1622944650_2ead55109475b4ab191a.jpg', '1622944650_fd7b779bb9cc46423532.pdf', 'revista', 1, 0, 4, 5, 1, '2021-06-05 23:57:30', '2021-06-06 00:08:52'),
(40, 24, 'El enclave bananero en la historia de Honduras', 'Fue un periodo en el cual Honduras inició la explotación del banano. ... En ese momento Honduras dependía mucho de la agricultura y ganadería (actualmente también) y uno de esos cultivos era el banano.', '1623202606_d0f732dcb145a11dc9ce.jpg', '1623202606_93df315903039015de9e.pdf', 'libro', 2, 1, 4, 16, 0, '2021-06-08 23:36:46', '2021-06-08 23:57:27'),
(41, 21, 'El sendero del Mago', 'Siguiendo las huellas del bestseller Las siete leyes espirituales del éxito, este nuevo libro de Chopra presenta veinte lecciones espirituales que le ayudarán al lector a crear una vida nueva y mejor, una vida donde es posible alcanzar el amor y la realización personal y espiritual que todos vivimos buscando. Esta obra propone la aventura de trascender la realidad ordinaria y emprender el viaje hacia el ámbito de lo ilimitado, donde siguiendo las enseñanzas del mago que todos llevamos dentro, de', '1623257650_6a03972445a5e9bfd260.jpg', '1623257650_3d9ac8b3630e0127e724.mp3', 'audio-libro', 2, 0, 3, 3, 0, '2021-06-09 14:54:10', '2021-06-09 14:58:19'),
(42, 26, 'Mi paso por la Formula 1', 'En este libro cuento todo sobre mi paso por la formula 1, las intimidades, las peleas, la corrupcion.', '1623258348_0de36ca9729cfef30398.jpg', '1623258348_f21c035848c609a5c6d2.pdf', 'libro', 2, 1, 1, 6, 0, '2021-06-09 15:05:48', '2021-06-09 15:12:37');

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
(27, 'pablo@gmail.com', 'pablogb83', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'autor', '2021-06-09 01:19:17', '2021-05-16 16:42:45'),
(31, 'toto@gmail.com', 'jose89', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:22', '2021-05-16 17:16:27'),
(32, 'josegarcia@gmail.com', 'morcilla', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:18:15', '2021-05-17 18:14:00'),
(33, 'marcelo@gmail.com', 'garka', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:25', '2021-05-21 15:13:53'),
(34, 'jose@gomez.com', 'totom', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:28', '2021-05-21 18:20:13'),
(35, 'gonzalo@gmail.com', 'elCabeza', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:32', '2021-05-22 13:00:58'),
(36, 'danCastala@gmail.com', 'dan_castalla', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'autor', '2021-06-09 01:19:34', '2021-05-22 15:41:23'),
(38, 'marquitosTrombola@gmail.com', 'elTrombo', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:37', '2021-05-26 18:01:03'),
(41, 'william34@gmail.com', 'william34', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'autor', '2021-06-09 01:19:40', '2021-06-04 17:29:35'),
(42, 'usuario@prueba.com', 'usuarioPrueba', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:43', '2021-06-01 19:02:56'),
(43, 'migueCer456@gmail.com', 'migueCer456', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'autor', '2021-06-09 01:19:45', '2021-06-04 17:29:54'),
(44, 'nuevo@gmail.com', 'gsdgsdgsdg', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:47', '2021-06-01 20:54:20'),
(45, 'jose@perez.com', 'usuario2', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:49', '2021-06-04 18:40:40'),
(48, 'marcosantonio@gmail.com', 'marcoTr234', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:52', '2021-06-05 17:50:03'),
(49, 'locomotion123@gmail.com', 'locomotion123', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-09 01:19:55', '2021-06-05 18:12:46'),
(51, 'luisuarez@gmail.com', 'luchoSuarez9', '$argon2i$v=19$m=65536,t=4,p=1$TnNudk9tZm1hMFluaWFMLw$8sGxobALKezOKaKBSmIurS/TSY43B8mqiKg+Vp/NJA4', 'cliente', '2021-06-08 23:11:00', '2021-06-08 23:11:00'),
(52, 'bananero@gmail.com', 'elbananero', '$argon2i$v=19$m=65536,t=4,p=1$QWRkeG8wbUdIRU5vTm1HTw$AU1BkEBzAGq/6VnjxWfKN0mZzHEA3jRxnU9K8wN0wRs', 'autor', '2021-06-08 23:28:17', '2021-06-08 23:28:17'),
(54, 'nickheidfield@fia.com', 'elnickheidfiel23', '$argon2i$v=19$m=65536,t=4,p=1$RWxNSU05RkhqaGRIeHQwdg$bAOFgqLNfASanaB6EeaW+/7DFBxWUhGQ/Wz7Uy5NGqs', 'autor', '2021-06-09 15:11:31', '2021-06-09 15:11:31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
