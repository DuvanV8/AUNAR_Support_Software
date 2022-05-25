-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2022 a las 02:18:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soporte_ti_infraestructura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(5) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `nombre`) VALUES
(1, 'Excelente'),
(2, 'Aceptable'),
(3, 'Deficiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_incidente`
--

CREATE TABLE `categoria_incidente` (
  `id` int(5) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_incidente`
--

INSERT INTO `categoria_incidente` (`id`, `nombre`) VALUES
(1, 'Software'),
(2, 'Hardware');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `contenido` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_soporte`
--

CREATE TABLE `departamento_soporte` (
  `id` int(5) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `departamento_soporte`
--

INSERT INTO `departamento_soporte` (`id`, `nombre`) VALUES
(1, 'Gestión Tecnológica'),
(2, 'Infraestructura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ticket`
--

CREATE TABLE `estado_ticket` (
  `id` int(8) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_ticket`
--

INSERT INTO `estado_ticket` (`id`, `descripcion`) VALUES
(1, 'Sin asignar'),
(2, 'Asignado'),
(3, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_urgencia`
--

CREATE TABLE `nivel_urgencia` (
  `id` int(5) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `nivel_urgencia`
--

INSERT INTO `nivel_urgencia` (`id`, `nombre`) VALUES
(1, 'Alto'),
(2, 'Medio'),
(3, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(5) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `categoria_incidente_id` int(5) NOT NULL,
  `asunto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `id_nivel_urgencia` int(5) NOT NULL,
  `id_departamento_soporte` int(5) NOT NULL,
  `id_calificacion` int(5) DEFAULT NULL,
  `id_estado_ticket` int(8) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_cierre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `usuario_id`, `categoria_incidente_id`, `asunto`, `descripcion`, `id_nivel_urgencia`, `id_departamento_soporte`, `id_calificacion`, `id_estado_ticket`, `fecha_creacion`, `fecha_cierre`) VALUES
(1, 1, 1, 'SO Dañado', 'El sistema operativo no inicia.', 1, 1, NULL, 1, '2022-04-26', NULL),
(2, 2, 2, 'TV Dañado', 'TV no enciende', 2, 2, NULL, 1, '2022-04-26', NULL),
(3, 2, 1, 'Antivirus sin licencia', 'Error en  la licencia del antivirus', 3, 1, NULL, 1, '2022-04-26', NULL),
(4, 2, 1, 'Antivirus sin licencia', 'Error', 3, 1, NULL, 1, '2022-04-26', NULL),
(5, 2, 2, 'PC no da imagen', 'Mi equipo no da vídeo', 3, 1, NULL, 1, '2022-04-26', NULL),
(6, 1, 2, 'Falla en red', 'El equipo no se conecta a internet', 3, 1, NULL, 1, '2022-04-26', NULL),
(7, 7, 2, 'Falla internet', 'No me conecta el wifi!!', 3, 1, NULL, 1, '2022-05-23', NULL),
(8, 7, 1, 'Cable HDMI roto', 'Se encuentra dañada una de las puntas del cable HDMI del salon 101', 3, 1, NULL, 1, '2022-05-23', NULL),
(9, 7, 2, 'Salon 202 Aire no enciende', 'No enciende el aire', 3, 1, NULL, 1, '2022-05-23', NULL),
(10, 7, 2, 'Salón 205 Lampara no enciende', 'Lampara no enciende', 3, 1, NULL, 1, '2022-05-23', NULL),
(11, 2, 2, 'Falla internet', 'No conecta el wifiiiii', 3, 1, NULL, 1, '2022-05-23', NULL),
(12, 2, 2, 'Salon 202 Aire no enciende', 'Falla en el aire del salón 202', 3, 1, NULL, 1, '2022-05-23', NULL),
(13, 7, 1, 'Antivirus sin licencia', 'Error de licencia', 3, 1, NULL, 1, '2022-05-24', NULL),
(14, 7, 2, 'PC no da imagen', 'Falla en pantalla', 3, 1, NULL, 1, '2022-05-24', NULL),
(15, 7, 2, 'Salon 205 TV no enciende', 'Problemas con el tv', 3, 1, NULL, 1, '2022-05-24', NULL),
(16, 7, 2, 'Teclado dañado sala 2', 'El teclado dek equipo 12 no funciona', 3, 1, NULL, 1, '2022-05-24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol_id` int(5) NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `rol_id`, `cargo`, `email`, `password`, `fecha_alta`) VALUES
(1, 'Juan Perez', 2, 'Docente', 'juanperez@gmail.com', '$2y$04$vScvvf1eF9JtdAhGwxuB7uzOiubIyDMHM53Tq0H/ly55H2ZYDS8Oi', '2022-04-26'),
(2, 'Duvang Varon', 2, 'Docente', 'duvanvaron99@gmail.com', '$2y$04$vScvvf1eF9JtdAhGwxuB7uzOiubIyDMHM53Tq0H/ly55H2ZYDS8Oi', '2022-04-26'),
(3, 'Administrador', 1, 'Administrativo', 'ticketsaunar@gmail.com', '$2y$04$vScvvf1eF9JtdAhGwxuB7uzOiubIyDMHM53Tq0H/ly55H2ZYDS8Oi', '2022-05-22'),
(4, 'Brayan C', 2, 'Docente', 'brayan@gmail.com', '$2y$04$vScvvf1eF9JtdAhGwxuB7uzOiubIyDMHM53Tq0H/ly55H2ZYDS8Oi', '2022-05-22'),
(5, 'Juan Pablo Perez', 2, 'Docente', 'juan@gmail.com', '$2y$04$rb1gTWPax64FZBfBWPseVeTFiL30KR4Pl0vr319oZz7aURB75lP7K', '2022-05-22'),
(6, 'Andres Lopez', 2, 'Docente', 'andres_lopez@gmail.com', '$2y$04$5hreeZmkIL.i.lWYrBiJ6OBjRQwOVDIRYOgnLMFCh8I4P7WuCm3sy', '2022-05-22'),
(7, 'Benito Camelo', 2, 'Docente', 'brayan.cantor22@gmail.com', '$2y$04$E1KqQD2y.kIBDEl91WoTNuLc7JJpt0cRgmjcbpBoBfn0FNuSOILoS', '2022-05-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_incidente`
--
ALTER TABLE `categoria_incidente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indices de la tabla `departamento_soporte`
--
ALTER TABLE `departamento_soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_ticket`
--
ALTER TABLE `estado_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel_urgencia`
--
ALTER TABLE `nivel_urgencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id2` (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `categoria_incidente_id` (`categoria_incidente_id`),
  ADD KEY `id_departamento_soporte` (`id_departamento_soporte`),
  ADD KEY `id_nivel_urgencia` (`id_nivel_urgencia`),
  ADD KEY `id_calificacion` (`id_calificacion`),
  ADD KEY `id_estado_ticket` (`id_estado_ticket`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_calificacion`) REFERENCES `calificacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`id_departamento_soporte`) REFERENCES `departamento_soporte` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`id_nivel_urgencia`) REFERENCES `nivel_urgencia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`categoria_incidente_id`) REFERENCES `categoria_incidente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_6` FOREIGN KEY (`id_estado_ticket`) REFERENCES `estado_ticket` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
