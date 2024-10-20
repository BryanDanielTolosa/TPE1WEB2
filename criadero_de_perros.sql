-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2024 a las 09:54:54
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
-- Base de datos: `criadero_de_perros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criadero`
--

CREATE TABLE `criadero` (
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `id_criadero` int(11) NOT NULL,
  `Localidad` varchar(45) NOT NULL,
  `Raza` varchar(45) NOT NULL,
  `Imagen` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `criadero`
--

INSERT INTO `criadero` (`Nombre`, `Direccion`, `id_criadero`, `Localidad`, `Raza`, `Imagen`) VALUES
('El Bosque', 'Yrigoyen 423', 1, 'Tandil', 'Boyero de Berna', 'https://img.freepik.com/foto-gratis/amor-romance-perforado-corazon-papel_53876-87.jpg?semt=ais_hybrid'),
('f', 'f', 3, 'f', 'f', ''),
('skkkkkk', 's', 4, 's', 's', 's'),
('s', 's', 5, 's', 's', 's'),
('akkkkkkkkk', 'a', 6, 'a', 'a', 'a'),
('sd', 'fgggg', 9, 'f', 'fgggg', 'f'),
('sd', 'fgggg', 10, 'f', 'fgggg', 'rrrrr'),
('sd', 'fgggg', 11, 'f', 'fgggg', 'rrrrr'),
('sd', 'fgggg', 12, 'f', 'fgggg', 'rrrrr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perro`
--

CREATE TABLE `perro` (
  `nombre` varchar(45) NOT NULL,
  `nacimiento` date NOT NULL,
  `padre` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `id_perro` int(11) NOT NULL,
  `madre` varchar(45) NOT NULL,
  `id_criadero_fk` int(11) NOT NULL,
  `Imagen` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perro`
--

INSERT INTO `perro` (`nombre`, `nacimiento`, `padre`, `sexo`, `id_perro`, `madre`, `id_criadero_fk`, `Imagen`) VALUES
('31231', '0001-03-11', 'ya cambiooo', 'sdaasd', 9, 'puta madre', 4, ''),
('dsada', '0431-03-12', 'sdad', 'Femenino', 12, 'dasda', 1, ''),
('SANDRA MABEL', '2024-10-08', 'gg', 'masculino', 14, 'ggg', 3, ''),
('SANDRA MABEL', '2024-10-16', 'gg', 'femenino', 15, 'ggg', 1, ''),
('SANDRA MABEL', '2024-10-18', 'gg', 'masculino', 16, 'que tal como va', 6, ''),
('sd', '2024-10-08', 'gg', 'masculino', 17, 'mañana es el dia', 1, ''),
('sd', '2024-10-08', 'gg', 'masculino', 18, 'mañana es el dia', 1, ''),
('sd', '2024-10-08', 'gg', 'masculino', 19, 'ya no doy mas jaja', 1, ''),
('sd', '2024-10-08', 'gg', 'masculino', 20, 'ya no doy mas jaja', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `Usuario`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$.cgeRjA95UxLT5/Oc2hbb.cZ9KPc4bYx.0k0i3ENTFxGNLIIxQFnS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `criadero`
--
ALTER TABLE `criadero`
  ADD PRIMARY KEY (`id_criadero`);

--
-- Indices de la tabla `perro`
--
ALTER TABLE `perro`
  ADD PRIMARY KEY (`id_perro`),
  ADD KEY `id_criadero_fk` (`id_criadero_fk`) USING BTREE;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `criadero`
--
ALTER TABLE `criadero`
  MODIFY `id_criadero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `perro`
--
ALTER TABLE `perro`
  MODIFY `id_perro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perro`
--
ALTER TABLE `perro`
  ADD CONSTRAINT `perro_ibfk_1` FOREIGN KEY (`id_criadero_fk`) REFERENCES `criadero` (`id_criadero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
