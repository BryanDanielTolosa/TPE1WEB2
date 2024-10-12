-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 01:36:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `criadero de perros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criadero`
--

CREATE TABLE `criadero` (
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `id_criadero` int(10) NOT NULL,
  `Localidad` varchar(45) NOT NULL,
  `Raza` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `criadero`
--

INSERT INTO `criadero` (`Nombre`, `Direccion`, `id_criadero`, `Localidad`, `Raza`) VALUES
('El Bosque', 'Yrigoyen 423', 1, 'Tandil', 'Boyero de Berna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perro`
--

CREATE TABLE `perro` (
  `nombre` varchar(45) NOT NULL,
  `Nacimiento` date NOT NULL,
  `padre` varchar(45) NOT NULL,
  `Sexo` varchar(45) NOT NULL,
  `id` int(10) NOT NULL,
  `madre` varchar(45) NOT NULL,
  `id_criadero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perro`
--

INSERT INTO `perro` (`nombre`, `Nacimiento`, `padre`, `Sexo`, `id`, `madre`, `id_criadero`) VALUES
('El Bosque', '2024-09-11', 'Yrigoyen 423', 'Tandil', 1, 'Boyero de Berna', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criadero` (`id_criadero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `criadero`
--
ALTER TABLE `criadero`
  MODIFY `id_criadero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perro`
--
ALTER TABLE `perro`
  ADD CONSTRAINT `fk_criadero` FOREIGN KEY (`id_criadero`) REFERENCES `criadero` (`id_criadero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
