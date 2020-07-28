-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 12-06-2020 a las 00:55:00
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
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
(40, 'admin9', 'Jesús', '$2y$12$hJ2OXfcab/hME6zK8D.cbuv/ta4KpxZYGIgm/gzfUxP5eUiSiMgFy', '2020-06-02 16:23:54', 1),
(41, 'admin10', 'Alicia Perez', '$2y$12$z26.bLlU6zlrujNPIKpByOA4ubPyzkVkaYGjlbx49nhUHOeTTeWJu', '2020-06-02 15:46:13', 0),
(42, 'admin11', 'Rosa Lara', '$2y$12$Ua6pbOXVKIh28OOiqgrELumMZ.AWCmJXK/qM8zEM3yDknqxLbkg3e', '2020-06-02 15:48:54', 0),
(43, 'admin12', 'Tania', '$2y$12$NueVjMhLMqnsf7cfCWMaKewA5Te/71c3JILsa8g/RtbmliR3tgrSq', '2020-06-02 15:52:08', 1),
(44, 'admin17', 'M Jordan', '$2y$12$sRxjYO1jz0h8aPsECQWwYO4FzGIwCyKmgLc4ACS1UVL2/FMSXhZPK', '2020-06-02 21:46:14', 1);

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
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`, `editado`) VALUES
(1, 'Rafael ', 'Bautista', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.', 'invitado1.jpg', '0000-00-00 00:00:00'),
(2, 'Shari', 'Herrera', 'Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado2.jpg', '0000-00-00 00:00:00'),
(3, 'Gregorio', 'Sanchez', 'placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado3.jpg', '0000-00-00 00:00:00'),
(4, 'Susana', 'Rivera', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus', 'invitado4.jpg', '0000-00-00 00:00:00'),
(5, 'Harold', 'Garcia', 'placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado5.jpg', '0000-00-00 00:00:00'),
(6, 'Susan', 'Sanchez', 'Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.', 'invitado6.jpg', '0000-00-00 00:00:00'),
(7, 'Juan Pablo', 'De la torre', '1o2i12', 'invitado1.jpg', '0000-00-00 00:00:00');

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
(28, 'ju', 'daa', 'jpdelatorrevaldez@gmail.com', '2018-10-22 01:51:03', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":2}', '{\"eventos\":[\"9\",\"7\"]}', 1, '43.3', 0),
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
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
