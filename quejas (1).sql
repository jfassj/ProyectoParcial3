-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2023 a las 21:27:08
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quejas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas`
--

CREATE TABLE `quejas` (
  `id_queja` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `queja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quejas`
--

INSERT INTO `quejas` (`id_queja`, `nombre`, `email`, `telefono`, `queja`) VALUES
(9, 'sdasda 23131 24143', 'samuel.reyna.56@hotmail.com', '+526183101616', 'soy una queja'),
(11, 'Jared Portilla', 'jaredpor36@gmail.com', '+526183046186', 'Hola'),
(12, 'Jared Portilla', 'jaredpor36@gmail.com', '+526183046186', 'No se'),
(13, 'Jared Portilla', 'jaredpor36@gmail.com', '+526183046186', 'Otra queja'),
(14, 'Jared', 'jfassj@gmail.com', '+526182288046', 'soy una queja como no'),
(15, 'Jared', 'jfassj@gmail.com', '+526182288046', 'soy una queja como no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `psw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `genero`, `psw`) VALUES
('103444014437916083602', 'Jared', 'Portilla', 'jaredpor36@gmail.com', 'masculino', 'portilla36'),
('12', 'Jared', 'Aguilar', 'jared_3041210021@utd.edu.mx', 'masculino', '1234'),
('124512', 'jose samuel', 'reyna gonzalez', 'samuel@hotmail.com', 'masculino', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `quejas`
--
ALTER TABLE `quejas`
  ADD PRIMARY KEY (`id_queja`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `quejas`
--
ALTER TABLE `quejas`
  MODIFY `id_queja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
