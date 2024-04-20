-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2024 a las 18:25:54
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
(3, 'Avistamientos', 2),
(4, 'Teorías', 2),
(5, 'Noticias y Vídeos', 1),
(6, 'Otro', 3);

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
(5, 4, 3, 'Noticias frescas!!', '2024-02-02 23:00:35'),
(6, 6, 7, 'No puedo despegar a mi querido hijo de la pantalla de su ordenador. No hace más que ver vídeos de un youtuber que conoció hace poco llamado Dross, con un acento como muy sospechoso', '2024-04-05 11:17:19'),
(7, 7, 10, 'Soy investigador independiente y estas últimas semanas he estado siguiendo la pista de lo que muy probablemente sea el legendario Chupacabra en el pueblo de Springfield', '2024-04-05 11:19:07'),
(8, 8, 6, 'Soy doctor, sé de lo que hablo...', '2024-04-05 11:22:05'),
(9, 9, 9, '...la mayoría de los líderes mundiales están poseídos por fuerzas del averno', '2024-04-05 11:24:28'),
(10, 10, 8, 'El problema de los tres cuerpos. No os parece que los aliens son muy idiotas??? Sus planes no tienen ningún sentido! Por qué avisan a los humanos de que les van a invadir??? Qué mal...', '2024-04-05 11:26:43');

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
(5, 5, 4, 'Creo que soy un no-muerto', '2024-02-02 22:58:27', '2024-02-02 22:59:42', 2),
(6, 7, 6, 'Mi hijo no deja de ver vídeos perturbadores', '2024-04-05 11:17:19', '2024-04-05 11:17:19', 1),
(7, 10, 3, 'El Chupacabra ataca de nuevo', '2024-04-05 11:19:07', '2024-04-05 11:19:07', 1),
(8, 6, 4, 'Han inventado un gas letal para eliminarnos', '2024-04-05 11:22:05', '2024-04-05 11:22:05', 1),
(9, 9, 6, 'El establishment no quiere que sepas esto...', '2024-04-05 11:24:28', '2024-04-05 11:24:28', 1),
(10, 8, 6, 'Qué opináis de la nueva serie de Netflix??', '2024-04-05 11:26:43', '2024-04-05 11:26:43', 1);

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
(5, 'Carlomagno', 'francia768', 'carlousrex@gmail.com', '2024-02-02 22:53:59', 'usuario'),
(6, 'doc_martin', 'arquimnedes', 'drmartin@hotmail.com', '2024-04-05 11:07:43', 'usuario'),
(7, 'CatLover67', 'gervasio', 'aaaaaaah@gmail.com', '2024-04-05 11:09:13', 'usuario'),
(8, 'Weirdo', 'camisetas9', 'justweirdo@hotmail.com', '2024-04-05 11:09:52', 'usuario'),
(9, 'Diabolo', 'dant3', 'coolguy666@hotmail.com', '2024-04-05 11:10:28', 'usuario'),
(10, 'Mr-X', 'mosquis', 'hsimpson@gmail.com', '2024-04-05 11:11:24', 'usuario');

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `threads`
--
ALTER TABLE `threads`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
