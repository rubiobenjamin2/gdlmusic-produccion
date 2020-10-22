-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 22-10-2020 a las 04:01:42
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlmusic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(34, 'adm', 'andres', '$2y$12$PtuCFzirNeRah3o.tDu/7ud3Q5t3jBjRFjsrq5e1/2g8PutYys1aG', '2017-11-06 22:26:59', 0),
(35, 'admin', 'benjamin', '$2y$12$lHcrW0zESdGLopYmrO4eA.b4BG.bEPRu0Q81UQb449WcwPizJoYIG', '0000-00-00 00:00:00', 1),
(38, 'admin8', 'Toño', '$2y$12$V1tMkistZ47tyzh1/YqT3.EmW6h1vhoTdAAdpaUfEQ4PY2qHHmRkq', '2020-06-02 15:37:06', 1),
(41, 'admin10', 'Alicia Perez Rubio', '$2y$12$z26.bLlU6zlrujNPIKpByOA4ubPyzkVkaYGjlbx49nhUHOeTTeWJu', '2020-10-20 17:02:32', 0),
(42, 'admin11', 'Rosa Lara', '$2y$12$Ua6pbOXVKIh28OOiqgrELumMZ.AWCmJXK/qM8zEM3yDknqxLbkg3e', '2020-06-02 15:48:54', 0),
(43, 'admin12', 'Tania', '$2y$12$NueVjMhLMqnsf7cfCWMaKewA5Te/71c3JILsa8g/RtbmliR3tgrSq', '2020-06-02 15:52:08', 1),
(49, 'admin18', 'admin', '$2y$12$UdiQ0TRTHJQjgO79EZPHHOtNsdFmHHmQcnbZk2MBPkGLGyxDUQTzq', '2020-10-20 13:01:43', 1),
(55, 'admin19', 'Lulu', '$2y$12$z7ublED1EiyPq3dVFpc80OqBg9kzqRlXj7SbhYRAr.cvLmJjQyPbq', '2020-10-20 13:49:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL,
  `nombre_artista` varchar(50) NOT NULL,
  `url_img` varchar(50) NOT NULL,
  `url_pdf` varchar(50) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id_artista`, `nombre_artista`, `url_img`, `url_pdf`, `editado`) VALUES
(1, 'Yuridia', 'invitado1.jpg', 'Amigos no por favor_gm.pdf', '2020-06-19 14:42:04'),
(3, 'Angeles Azules ft. Belinda', 'invitado2.jpg', 'Amor a primera vista_gm.pdf', '2020-06-19 16:55:38'),
(5, 'Ed Sheeran', 'invitado3.jpg', 'Perfect_gm.pdf', '2020-06-19 15:59:52'),
(6, 'Chicago', 'invitado4.jpg', 'Colour my world_gm.pdf', '2020-06-19 16:04:39'),
(7, 'Enrique Nery', 'invitado5.jpg', 'Even So_gm.pdf', '2020-06-19 16:06:30'),
(8, 'Grover Washington', 'invitado6.jpg', 'Just the two of us_gm.pdf', '2020-06-19 16:08:24'),
(9, 'Bruno Mars', 'invitado7.jpg', 'When i was your man_gm.pdf', '2020-06-19 16:10:52'),
(10, 'Herbie Hancock', 'invitado8.jpeg', 'Cantaloupe Island_gm.pdf', '2020-06-19 16:11:59'),
(11, 'Johan Sebastian Bach', 'invitado9.jpg', 'Invenciones Bach_gm.pdf', '2020-06-19 16:12:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `editado` datetime NOT NULL,
  `icono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `editado`, `icono`) VALUES
(1, 'Seminario', '2020-06-02 21:42:12', 'fa-university'),
(2, 'Conferencia', '2017-11-06 17:50:04', 'fa-address-book'),
(3, 'Talleres', '2020-06-02 18:49:55', 'fa-code'),
(5, 'Mentoria', '2017-11-06 18:30:41', 'fa-align-center');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `id_descargas` int(11) NOT NULL,
  `id_descarga_partitura` int(11) NOT NULL,
  `id_descarga_usuario` int(11) NOT NULL,
  `fecha_descarga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descargas`
--

INSERT INTO `descargas` (`id_descargas`, `id_descarga_partitura`, `id_descarga_usuario`, `fecha_descarga`) VALUES
(2, 1, 1, '2020-10-21 15:51:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilo`
--

CREATE TABLE `estilo` (
  `id_estilo` int(11) NOT NULL,
  `nombre_estilo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estilo`
--

INSERT INTO `estilo` (`id_estilo`, `nombre_estilo`) VALUES
(1, 'Soft Rock'),
(2, 'Latin Jazz'),
(3, 'Modal Jazz'),
(4, 'Barroco'),
(5, 'Balada Pop Latino'),
(6, 'Regional Mexicano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` varchar(10) NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime NOT NULL DEFAULT '2017-11-06 17:50:04'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(4, 'HTML5 y CSS3', '2016-12-09', '02:00 PM', 3, 3, 'taller_01', '2017-11-06 17:50:04'),
(6, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_13', '2017-11-06 17:50:04'),
(8, 'Tecnologías del Futuro PHP', '2016-12-09', '05:00 PM', 2, 3, 'conf_02', '2017-11-06 17:50:04'),
(9, 'Seguridad en la Web', '2016-12-09', '07:00 PM', 2, 2, 'conf_03', '2017-11-06 17:50:04'),
(10, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', '2017-11-06 17:50:04'),
(11, 'Angular 25', '2016-12-10', '10:00', 1, 4, 'taller_03', '2020-06-02 22:02:18'),
(12, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_03', '2017-11-06 17:50:04'),
(13, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_04', '2017-11-06 17:50:04'),
(14, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_05', '2017-11-06 17:50:04'),
(15, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_06', '2017-11-06 17:50:04'),
(16, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_07', '2017-11-06 17:50:04'),
(17, 'Como crear una tienda online que venda millones en pocos día', '2016-12-10', '10:00:00', 2, 6, 'conf_04', '2017-11-06 17:50:04'),
(18, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', '2017-11-06 17:50:04'),
(19, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', '2017-11-06 17:50:04'),
(20, 'Aprende a Programar en una mañana', '2016-12-10', '10:00:00', 1, 3, 'sem_02', '2017-11-06 17:50:04'),
(21, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03', '2017-11-06 17:50:04'),
(22, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_08', '2017-11-06 17:50:04'),
(23, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_09', '2017-11-06 17:50:04'),
(24, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_10', '2017-11-06 17:50:04'),
(25, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_11', '2017-11-06 17:50:04'),
(26, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_12', '2017-11-06 17:50:04'),
(30, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', '2017-11-06 17:50:04'),
(31, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05', '2017-11-06 17:50:04'),
(32, 'Flexbox para principiantes', '2016-12-10', '11:00:00', 2, 4, 'conf_07', '2017-11-06 17:50:04'),
(33, 'Spring', '2020-06-30', '19:30', 1, 2, 'taller_03', '2020-06-02 20:21:54'),
(34, 'Angular 9', '2020-07-23', '20:00', 5, 5, '', '2020-06-02 20:24:03'),
(35, 'Docker', '2020-06-30', '22:30', 1, 1, ' ', '2020-06-02 21:25:23'),
(36, 'Node Js', '2020-08-30', '22:00', 2, 4, ' ', '2020-06-02 21:34:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  `url_pdf` varchar(50) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`, `url_pdf`, `editado`) VALUES
(1, 'Rafael ', 'Bautista', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado1.jpg', 'Amigos no por favor_gm.pdf', '0000-00-00 00:00:00'),
(2, 'Shari', 'Herrera', 'Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado2.jpg', '', '0000-00-00 00:00:00'),
(3, 'Gregorio', 'Sanchez', 'placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado3.jpg', '', '0000-00-00 00:00:00'),
(4, 'Susana', 'Rivera', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus', 'invitado4.jpg', '', '0000-00-00 00:00:00'),
(5, 'Harold', 'Garcia', 'placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado5.jpg', '', '0000-00-00 00:00:00'),
(6, 'Susan', 'Sanchez', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado6.jpg', '', '0000-00-00 00:00:00'),
(7, 'Juan Pablo', 'De la torre', '1o2i12', 'invitado7.jpg', '', '2020-06-18 20:28:10'),
(8, 'herbie ', 'hancock', 'efvedfvefefefvefefvefvefvef', 'invitado8.jpeg', '', '2020-06-18 20:31:13'),
(9, 'Johan Sebastian', 'Bach', 'gbsgbgwbwrgb\r\nwrgb\r\nwrgbwrgbrwgbrwgbwrgbwrgb', 'invitado9.jpg', 'Invenciones Bach_gm.pdf', '2020-06-18 20:49:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partituras`
--

CREATE TABLE `partituras` (
  `id_partitura` int(11) NOT NULL,
  `nombre_partitura` varchar(60) NOT NULL,
  `nombre_artista` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `id_estilo` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `no_descargas` int(10) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partituras`
--

INSERT INTO `partituras` (`id_partitura`, `nombre_partitura`, `nombre_artista`, `album`, `id_estilo`, `fecha_carga`, `no_descargas`, `editado`) VALUES
(1, 'Amigos no por favor_gm.pdf', 'Yuridia', 'Primera Fila', 5, '2020-06-19 21:36:17', 0, '2020-06-19 21:36:18'),
(2, 'Amor a primera vista_gm.pdf', 'Los Angeles Azules ft. Belinda', 'Amor a primera vista', 1, '2020-06-19 21:36:17', 0, '2020-06-19 21:36:18'),
(3, 'Cantaloupe Island_gm.pdf', 'Herbie Hancock', ' Empyrean Isles', 3, '2020-06-19 21:45:03', 0, '2020-06-19 21:45:03'),
(4, 'Colour my world_gm.pdf', 'Chicago', 'Chicago II ', 1, '2020-06-19 21:48:51', 0, '2020-06-19 21:48:51'),
(5, 'Invenciones Bach_gm.pdf', 'Johan Sebastian Bach', 'Fuegas e Invenciones', 4, '2020-06-19 21:48:51', 0, '2020-06-19 21:48:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`ID_Registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(24, 'Juan Pablo De la', 'Valdez', 'blackmaxgdl18@hotmail.com', '2017-01-15 06:55:24', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":3,\"etiquetas\":3}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_07\",\"taller_08\",\"taller_09\",\"taller_12\",\"conf_07\"]}', 2, '298.9', 1),
(25, 'Juan Pablo', 'De la torre', 'jpdelatorrevaldez@gmail.com', '2017-01-17 05:33:31', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":2,\"etiquetas\":5}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\",\"taller_05\",\"taller_06\",\"taller_07\",\"taller_11\",\"taller_12\",\"taller_13\",\"taller_14\",\"taller_15\"]}', 3, '243.6', 1),
(26, '', '', '', '2017-11-12 19:37:32', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"22\",\"23\"]}', 2, '61.3', 1),
(27, 'Juan Pablo', 'De la torre', 'blackmaxxgdl18@hotmail.com', '2017-11-12 19:37:32', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"1\"},\"camisas\":2,\"etiquetas\":1}', '{\"eventos\":[\"8\",\"9\",\"7\",\"4\",\"6\",\"23\",\"24\"]}', 1, '145.6', 1),
(29, 'Juan Pablo', 'De la t', 'jpdelatorrevaldez@gmail.com', '2018-10-22 01:51:44', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":2,\"etiquetas\":1}', '{\"eventos\":[\"10\",\"6\"]}', 1, '50.6', 1),
(30, 'juan', 'ad', 'correo@correo.com', '2018-10-22 02:11:26', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":2}', '{\"eventos\":[\"7\"]}', 1, '43.3', 1),
(31, 'juan', 'de la t', 'correo@correo.com', '2018-10-22 02:27:21', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":2}', '{\"eventos\":[\"8\"]}', 2, '43.3', 1),
(32, '1', '2', 'correo@correo.com', '2018-10-22 02:35:09', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '[]', 2, '30', 1),
(33, 'correo', '1', 'correo@correo.com', '2018-10-22 02:36:47', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '[]', 2, '30', 1),
(34, 'juan', 'v', 'correo@correo.com', '2018-10-22 02:48:24', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"7\"]}', 2, '30', 0),
(35, 'juan', 'de la ', 'correo@correo.com', '2018-10-22 02:57:36', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"8\"]}', 2, '30', 0),
(36, 'Juan', 'De la torre', 'correo@correo.com', '2018-10-22 03:01:10', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1}', '{\"eventos\":[\"9\"]}', 2, '39.3', 0),
(37, '1', '2', 'correo@correo.com', '2018-10-22 03:02:09', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"6\"]}', 1, '30', 0),
(38, 'jua', 'c', 'correo@correo.com', '2018-10-22 03:02:55', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"7\"]}', 2, '30', 0),
(39, 'Juan Pablo', 'ca', 'correo@correo.com', '2018-10-22 03:04:08', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"8\"]}', 1, '30', 0),
(40, 'juan', 'co', 'correo@correo.com', '2018-10-22 03:07:14', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"7\"]}', 2, '30', 0),
(41, 'Juan', 'de ', 'correo@correo.com', '2018-10-22 05:00:13', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":10,\"etiquetas\":20}', '{\"eventos\":[\"8\"]}', 2, '163', 0),
(42, 'Juan Pablo', 'De la torre', 'correo@correo.com', '2018-10-22 05:01:09', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":2}', '{\"eventos\":[\"6\"]}', 2, '43.3', 0),
(43, 'Juan Pablo', 'De la torre', 'correo@correo.com', '2018-10-22 05:02:22', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":2}', '{\"eventos\":[\"6\"]}', 1, '43.3', 0),
(44, 'Juan', 'De la t', 'correo@correo.com', '2018-10-22 05:04:18', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1}', '{\"eventos\":[\"8\"]}', 2, '39.3', 1),
(45, 'Juan Pablo', 'DE', 'correo@correo.com', '2018-10-22 05:13:39', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1}', '{\"eventos\":[\"6\"]}', 2, '39.3', 1),
(46, 'ca', 'ju', 'correo@correo.com', '2018-10-22 06:19:41', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"etiquetas\":1}', '{\"eventos\":[\"8\"]}', 1, '32', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `pagado` tinyint(5) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email_usuario`, `password`, `pagado`, `fecha_registro`, `editado`) VALUES
(1, 'Benjamin Rubio', 'rubiobenjamin2@gmail.com', '$2y$12$Xksa39r4MRbtlSyDRkJNwesErFvi6deL9EKen7oLdgK61NdI/ff/y', 0, '2020-10-16 19:29:17', '2020-10-20 16:43:23'),
(2, 'Benjamin2', 'rubiobenjamin2@gmail.com', '$2y$12$vokeQhqUbTS4CeXtumvZ0.bu5ENj8q5yPvNEXplvNZGLVwdHP32Ay', 0, '2020-10-16 19:34:51', '2020-10-16 19:34:51'),
(3, 'Benjamin3', 'rubiobenjamin2@gmail.com', '$2y$12$eL7XufUr43fS2BgOspmuUev4lgYpJkQ/8czljWfgun3q4jiZ7G6UO', 0, '2020-10-16 19:36:42', '2020-10-16 19:36:42'),
(4, 'Benjamin3', 'rubiobenjamin2@gmail.com', '$2y$12$yxOrMsIEm61WapjpIzL.P.xnR/nPpniYeieZAi8qYxNGdBzI8PMam', 0, '2020-10-16 19:37:00', '2020-10-16 19:37:00'),
(5, 'Benjamin4', 'rubiobenjamin2@gmail.com', '$2y$12$nrMBg4BQDhGZqcU5OL.qkeH1tzw2BOdeM4pWV48f3U/pcj/Pqbr5S', 0, '2020-10-16 19:38:46', '2020-10-16 19:38:46'),
(6, 'Benjamin5', 'rubiobenjamin2@gmail.com', '$2y$12$1DPk76T0N6UGlL3B8K5/k.Ay.ri84OTT9bIYaACf0fgHEI6oyeSEW', 0, '2020-10-16 19:49:53', '2020-10-16 19:49:53'),
(7, 'Benjamin6', 'rubiobenjamin2@gmail.com', '$2y$12$Kf1eth9YyPBjCBvfRyGeeOd2Dek0.2n9QeRoZu/08YO9fd374ZooW', 0, '2020-10-16 19:51:18', '2020-10-16 19:51:18'),
(8, 'Benjamin7', 'rubiobenjamin2@gmail.com', '$2y$12$42vyz.OXMMaybxuHt70ekuQRDUumbw3IHMEGmEUHI5JCa8X0wi1fG', 0, '2020-10-16 19:59:42', '2020-10-16 19:59:42'),
(9, 'Benjamin8', 'rubiobenjamin2@gmail.com', '$2y$12$um8SqgyboBTA50WOpWmJ..drPIb9IF7XTcxj6m8C5BKiJI7H.Af8i', 0, '2020-10-16 20:01:23', '2020-10-16 20:01:23'),
(10, 'Benjamin9', 'rubiobenjamin2@gmail.com', '$2y$12$ruBKJWyd3qQ2B8sSC/l7o.n.TBijVDozaBKxaUwrOa8udH0tBC7oi', 0, '2020-10-16 20:14:45', '2020-10-16 20:14:45'),
(13, 'Benjamin10  Madrid', '12@12', '$2y$12$Seb1wDQ1yDbAXViWMPCzlOlAXTPDGLSy2PDWx/05GuypEP5qe6qgq', 0, '2020-10-19 21:44:55', '2020-10-20 16:48:46'),
(14, 'Benjamin11', '12@12', '$2y$12$3WLPtr8MAdUJ/rc4//cL1..hj9P6bxIOlyaQrnMG4ASPLobSQWX4K', 0, '2020-10-19 23:36:44', '2020-10-19 23:36:44'),
(15, 'Benjamin12', '1', '$2y$12$mTn6oDNpcwYJPwCpAdOFMeBS3qpcoD80u.4z2fBEiOhmA.pCEcWmy', 0, '2020-10-20 00:45:27', '2020-10-20 00:45:27'),
(16, 'Benjamin12', '1', '$2y$12$bPd6g33MOg4E6QzLrJe7Du5GyT0bpKKcs7fAZyZGTmbLAOqxSqnly', 0, '2020-10-20 00:45:27', '2020-10-20 00:45:27'),
(17, 'Benjamin13', 'rubiobenjamin2@gmail.com', '$2y$12$MeWYFWwDVaRIf5lMKTP/veo4shmHpyVtJTkRtjgMaCtM8ca/poPru', 0, '2020-10-20 00:50:49', '2020-10-20 00:50:49'),
(18, 'Benjamin13', 'rubiobenjamin2@gmail.com', '$2y$12$HugARUeg9HEXDHS2FAJKx.fpHayaYE44Q4mbA9Z6dnv3EO004tYdG', 0, '2020-10-20 00:50:49', '2020-10-20 00:50:49'),
(19, 'Benjamin14', 'rubiobenjamin2@gmail.com', '$2y$12$Y9h6CHX0fq/5Wy8SIMq/ouC9VwseElRbUSnEh7wDYi7OU4PXow4zK', 0, '2020-10-20 13:52:48', '2020-10-20 13:52:48'),
(20, 'Benjamin15', 'rubiobenjamin2@gmail.com', '$2y$12$pTckkpiMzQ7et0A9kxsIHutMfzesfQ7.I9pSAC87EPl.NyL4tZ.NC', 0, '2020-10-20 14:01:20', '2020-10-20 14:01:20'),
(21, 'Benjamin16', 'rubiobenjamin2@gmail.com', '$2y$12$/YOtgo17bGZZPboBfbM7L.l9KAOyiJAgGt/.Gg/2lSluKHie4MTWy', 0, '2020-10-20 14:05:02', '2020-10-20 14:05:02'),
(22, 'Benjamin17', 'rubiobenjamin2@gmail.com', '$2y$12$gHhGzuFhluBU/e1FI8t1Tun07rNBV24ryx7udYitLjJpDQsgF8Byy', 0, '2020-10-20 17:18:32', '2020-10-20 17:18:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY (`id_descargas`),
  ADD KEY `id_descarga_partitura` (`id_descarga_partitura`),
  ADD KEY `id_descarga_usuario` (`id_descarga_usuario`);

--
-- Indices de la tabla `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`id_estilo`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `partituras`
--
ALTER TABLE `partituras`
  ADD PRIMARY KEY (`id_partitura`),
  ADD KEY `id_estilo` (`id_estilo`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_Registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `descargas`
--
ALTER TABLE `descargas`
  MODIFY `id_descargas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estilo`
--
ALTER TABLE `estilo`
  MODIFY `id_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `partituras`
--
ALTER TABLE `partituras`
  MODIFY `id_partitura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_Registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD CONSTRAINT `descargas_ibfk_1` FOREIGN KEY (`id_descarga_partitura`) REFERENCES `partituras` (`id_partitura`),
  ADD CONSTRAINT `descargas_ibfk_2` FOREIGN KEY (`id_descarga_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `partituras`
--
ALTER TABLE `partituras`
  ADD CONSTRAINT `partituras_ibfk_1` FOREIGN KEY (`id_estilo`) REFERENCES `estilo` (`id_estilo`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
