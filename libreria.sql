-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 05:22:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID_Autor` int(11) NOT NULL,
  `Nombre_Autor` varchar(250) NOT NULL,
  `Nacionalidad` varchar(100) NOT NULL,
  `Biografia` text NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID_Autor`, `Nombre_Autor`, `Nacionalidad`, `Biografia`, `Estado`) VALUES
(0, 'J. K. Rowling', 'Britanica', 'Joanne Rowling1​ (Yate, 31 de julio de 1965), quien escribe bajo los seudónimos de J. K. Rowling​ y Robert Galbraith, es una escritora, productora de cine y guionista británica, conocida por ser la autora de la serie de libros Harry Potter, que han superado los quinientos millones de ejemplares vendidos.', 1),
(1, 'Brandon Sanderson', 'Estado Unidense', 'Brandon Sanderson es un renombrado autor de novelas de fantasía y ciencia ficción, conocido por su estilo prolífico y sus obras épicas. Nacido en 1975 en Nebraska, es famoso por su contribución a la serie \"La Rueda del Tiempo\" de Robert Jordan y por sus propias series, como \"El Archivo de las Tormentas\".', 0),
(2, 'Pablo Neruda', 'Chileno', 'Pablo Neruda (1904 - 1973) fue uno de los poetas más importantes del siglo XX. A continuación, se realiza un breve recorrido por algunos de los poemas más populares de su producción, desde sus inicios (1923) hasta sus últimas publicaciones (1970).', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` int(11) NOT NULL,
  `Titulo` varchar(250) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `ID_Autor` int(11) NOT NULL,
  `Stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `Titulo`, `Genero`, `ID_Autor`, `Stock`) VALUES
(0, 'Harry Potter and the philosopher\'s stone', 'Fantasia.', 0, 1),
(1, 'The christmas pig', 'Fantasia', 0, 0),
(2, 'El camino de los reyes', 'Alta Fantasia', 1, 1),
(3, 'Juramentada', 'Alta Fantasia', 1, 1),
(4, 'Cien sonetos de amor', 'Poesia', 2, 0),
(5, 'Veinte poemas de amor y una canción desesperada', 'Poesia', 2, 1),
(13, 'Nuevo Libro JK', 'Prueba', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre_Usuario` varchar(26) NOT NULL,
  `Pass_Usuario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre_Usuario`, `Pass_Usuario`) VALUES
('Usuario 2', '1234'),
('webadmin', '$2y$10$qzWix3SOIb4xL3L.G95ewO.5bmvakZeCV5nu05krjGsnylQfQ/thW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID_Autor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `ID_Autor` (`ID_Autor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `ID_Autor` FOREIGN KEY (`ID_Autor`) REFERENCES `autores` (`ID_Autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
