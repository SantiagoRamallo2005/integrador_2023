-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 23:35:07
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `integrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bans`
--

CREATE TABLE `bans` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `razon` varchar(300) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `visibilidad` varchar(50) NOT NULL,
  `contenido` varchar(2000) DEFAULT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valoracionesPos` int(50) NOT NULL,
  `valoracionesNeg` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentscomments`
--

CREATE TABLE `commentscomments` (
  `id` int(11) NOT NULL,
  `id_comments` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `contenido` varchar(2000) DEFAULT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valoracionesPos` int(50) NOT NULL,
  `valoracionesNeg` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `tabla` varchar(20) DEFAULT NULL,
  `id_cosa` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `registro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nombreVisible` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `adminValue` int(1) DEFAULT NULL,
  `condicion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones1`
--

CREATE TABLE `valoraciones1` (
  `id` int(11) NOT NULL,
  `id_comments` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones2`
--

CREATE TABLE `valoraciones2` (
  `id` int(11) NOT NULL,
  `id_commentsComments` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `commentscomments`
--
ALTER TABLE `commentscomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comments` (`id_comments`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_cosa` (`id_cosa`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones1`
--
ALTER TABLE `valoraciones1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comments` (`id_comments`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `valoraciones2`
--
ALTER TABLE `valoraciones2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commentsComments` (`id_commentsComments`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bans`
--
ALTER TABLE `bans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `commentscomments`
--
ALTER TABLE `commentscomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones1`
--
ALTER TABLE `valoraciones1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones2`
--
ALTER TABLE `valoraciones2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `commentscomments`
--
ALTER TABLE `commentscomments`
  ADD CONSTRAINT `commentscomments_ibfk_1` FOREIGN KEY (`id_comments`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `commentscomments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentscomments_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `valoraciones2` (`id`);

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_cosa`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`id_cosa`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logs_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `logs_ibfk_4` FOREIGN KEY (`id_cosa`) REFERENCES `commentscomments` (`id`),
  ADD CONSTRAINT `logs_ibfk_5` FOREIGN KEY (`id_cosa`) REFERENCES `bans` (`id`);

--
-- Filtros para la tabla `valoraciones1`
--
ALTER TABLE `valoraciones1`
  ADD CONSTRAINT `valoraciones1_ibfk_1` FOREIGN KEY (`id_comments`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `valoraciones1_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `valoraciones2`
--
ALTER TABLE `valoraciones2`
  ADD CONSTRAINT `valoraciones2_ibfk_1` FOREIGN KEY (`id_commentsComments`) REFERENCES `commentscomments` (`id`),
  ADD CONSTRAINT `valoraciones2_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
