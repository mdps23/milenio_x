-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2024 a las 23:01:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `milenio_x`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `threads` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`, `threads`) VALUES
(3, 'Avistamientos', 1),
(4, 'Teorías', 1),
(5, 'Noticias y Vídeos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `id_thread`, `id_user`, `content`, `post_date`) VALUES
(1, 3, 3, 'Hace varios días que se ven luces policromáticas en el cielo nocturno...', '2024-02-02 22:55:31'),
(2, 4, 4, 'Aquí tenéis la rueda de prensa que ha dado ayer el general de cuatro estrellas...', '2024-02-02 22:56:42'),
(3, 5, 5, 'Me siento mal, tengo lagunas en mi memoria. Juraría que nací en la Edad Media...', '2024-02-02 22:58:27'),
(4, 5, 3, 'Pero qué tontería. No-muerto? Venga no me jodas.', '2024-02-02 22:59:42'),
(5, 4, 3, 'Noticias frescas!!', '2024-02-02 23:00:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threads`
--

CREATE TABLE `threads` (
  `id_thread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `threads`
--

INSERT INTO `threads` (`id_thread`, `id_user`, `id_category`, `title`, `date_created`, `date_updated`, `posts`) VALUES
(3, 3, 3, 'Algo huele a podrido en Huesca', '2024-02-02 22:55:31', '2024-02-02 22:55:31', 1),
(4, 4, 5, 'Oficial del Pentágono confiesa todo', '2024-02-02 22:56:42', '2024-02-02 23:00:35', 2),
(5, 5, 4, 'Creo que soy un no-muerto', '2024-02-02 22:58:27', '2024-02-02 22:59:42', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `date_joined`, `role`) VALUES
(3, 'greenman', 'zoo93rroo', 'greenman01@hotmail.com', '2024-02-02 22:52:42', 'usuario'),
(4, 'Indiscreto', 'omooamooa', 'camreflex@gmail.com', '2024-02-02 22:53:35', 'usuario'),
(5, 'Carlomagno', 'francia768', 'carlousrex@gmail.com', '2024-02-02 22:53:59', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_thread` (`id_thread`);

--
-- Indices de la tabla `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id_thread`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `threads`
--
ALTER TABLE `threads`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_thread`) REFERENCES `threads` (`id_thread`);

--
-- Filtros para la tabla `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
