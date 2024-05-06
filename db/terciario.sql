-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2024 a las 20:15:12
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
-- Base de datos: `terciario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Id_Alumno` int(10) NOT NULL,
  `DNI` int(10) DEFAULT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL,
  `Nacionalidad` varchar(20) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `Localidad` varchar(30) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`Id_Alumno`, `DNI`, `Nombre`, `Apellido`, `Email`, `Telefono`, `Genero`, `Fecha_Nac`, `Nacionalidad`, `Direccion`, `Localidad`, `Pass`) VALUES
(1, 36523713, 'Nicolas', 'Coria', 'nicolasmc464@gmail.com', '2147483647', 'Masculino', '2022-07-05', 'Argentina', 'Italia 5781', 'Rosario', '$2y$10$Snm9od9t1kEc4/FarHTUj.zYAmYrC102cTtB.WzNqhZT3gELXEdjq'),
(2, 36526498, 'Rodrigo', 'Martinez', 'rm@gmail.com', '2147483647', 'Masculino', '2023-06-07', 'Argentina', 'Tucuman 1000', 'Rosario', '$2y$10$hbFYMkBKwhuaxfVd4VIP/eqCo8c9jmhx2Q0mmcZcPse7kMUqM7kd6'),
(3, 30251436, 'Agustin', 'Seisas', 'as@gmail.com', '354158712', 'Masculino', '2023-01-12', 'Argentina', 'Salta 1000', 'Rosario', '$2y$10$D080gWEB8WZFpLAV94foEOVIfo5ekWXLs0Kpd/KwhaDuYkNOkz7IG'),
(4, 30256745, 'Mirko', 'Padovan', 'mp@gmail.com', '341589671', 'Masculino', '2022-12-14', 'Argentina', 'España 1000', 'Rosario', '$2y$10$ztBraVxeQAxybBo15VHa6eX2pgH/ewdmbzsXcKhjQR0bCsh3D1cPO'),
(5, 45123456, 'Segundo', 'Mondonio', 'sm@gmail.com', '123456789', 'Masculino', '2023-12-01', 'Argentina', 'Santa Fe 1000', 'Rosario', '$2y$10$vB7Os2MZoAFNX19TKE9vA.MeFZ6gzAKSvwqQ.OA1uPRMwzytnNQi2'),
(6, 36523123, 'Nicolas', 'Coria', 'nicolasmc464@gmail.com', '03415968700', 'Masculino', '2023-12-01', 'Argentina', 'Italia 5781', 'Rosario', '$2y$10$KD9e0cQSZO1fuBF9KOkWx.rQgqflaCgDcNaPqWGGQDx8H3qnMxLA2'),
(7, 12345678, 'Pepito', 'Lopez', 'pepito@gmail.com', '4561237978', 'Masculino', '2020-02-09', 'Argentina', 'Salta 1285', 'Rosario', '$2y$10$qwpliKk16t2exjPxKK9Z.O/MTt2nnMxU0Js64qOu5/F.eTnHA21N.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_carrera`
--

CREATE TABLE `alumno_carrera` (
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno_carrera`
--

INSERT INTO `alumno_carrera` (`Id_Alumno`, `Id_Carrera`) VALUES
(1, 2),
(2, 3),
(3, 1),
(4, 2),
(5, 3),
(6, 3),
(7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_grado`
--

CREATE TABLE `alumno_grado` (
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Grado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno_grado`
--

INSERT INTO `alumno_grado` (`Id_Alumno`, `Id_Grado`) VALUES
(1, 1),
(2, 3),
(3, 2),
(4, 5),
(5, 7),
(6, 3),
(7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Id_Carrera` int(10) NOT NULL,
  `Carrera` varchar(70) DEFAULT NULL,
  `Cupo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Id_Carrera`, `Carrera`, `Cupo`) VALUES
(1, 'Técnico Superior en Análisis Funcional de Sistemas Informáticos', 120),
(2, 'Técnico Superior en Desarrollo de Software', 120),
(3, 'Técnico Superior en Infraestructura de Tecnología de la Información', 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_uc`
--

CREATE TABLE `carrera_uc` (
  `Id_Carrera` int(10) DEFAULT NULL,
  `Id_UC` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera_uc`
--

INSERT INTO `carrera_uc` (`Id_Carrera`, `Id_UC`) VALUES
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 14),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(2, 1),
(2, 2),
(2, 3),
(2, 10),
(2, 5),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 19),
(2, 20),
(2, 27),
(2, 22),
(2, 21),
(2, 28),
(2, 29),
(2, 30),
(2, 26),
(2, 34),
(2, 35),
(2, 41),
(2, 42),
(2, 43),
(2, 40),
(2, 44),
(1, 1),
(1, 2),
(1, 3),
(1, 10),
(1, 15),
(1, 16),
(1, 7),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 27),
(1, 21),
(1, 22),
(1, 31),
(1, 32),
(1, 33),
(1, 26),
(1, 34),
(1, 35),
(1, 41),
(1, 37),
(1, 24),
(1, 45),
(1, 46),
(1, 40),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlatividades`
--

CREATE TABLE `correlatividades` (
  `Id_Correlativa` int(10) NOT NULL,
  `Id_UC` int(10) DEFAULT NULL,
  `Correlativa` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `correlatividades`
--

INSERT INTO `correlatividades` (`Id_Correlativa`, `Id_UC`, `Correlativa`, `Id_Carrera`) VALUES
(1, 23, 3, 3),
(2, 23, 8, 3),
(3, 24, 7, 3),
(4, 25, 9, 3),
(5, 36, 24, 3),
(6, 39, 25, 3),
(7, 39, 14, 3),
(8, 37, 14, 3),
(9, 38, 25, 3),
(10, 38, 5, 3),
(11, 40, 26, 3),
(12, 40, 22, 3),
(13, 27, 10, 2),
(14, 28, 12, 2),
(15, 29, 13, 2),
(16, 41, 11, 2),
(17, 41, 14, 2),
(18, 42, 28, 2),
(19, 44, 30, 2),
(20, 44, 14, 2),
(21, 43, 29, 2),
(22, 40, 26, 2),
(23, 40, 5, 2),
(24, 40, 22, 2),
(25, 27, 10, 1),
(26, 31, 17, 1),
(27, 33, 18, 1),
(28, 46, 33, 1),
(29, 32, 16, 1),
(30, 45, 16, 1),
(31, 40, 26, 1),
(32, 40, 22, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos`
--

CREATE TABLE `cupos` (
  `Id_Cupos` int(10) NOT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Ano_Lectivo` year(4) DEFAULT NULL,
  `Cupos_Disp` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`Id_Cupos`, `Id_Carrera`, `Ano_Lectivo`, `Cupos_Disp`) VALUES
(1, 1, '2022', 24),
(2, 2, '2022', 28),
(3, 3, '2022', 17),
(4, 1, '2023', 118),
(5, 2, '2023', 115),
(6, 3, '2023', 110),
(7, 1, '2024', 120),
(8, 2, '2024', 118),
(9, 3, '2024', 118),
(10, 1, '2025', 55),
(11, 2, '2025', 60),
(12, 3, '2025', 111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `Id_Grado` int(10) NOT NULL,
  `Grado` int(10) DEFAULT NULL,
  `Division` int(10) DEFAULT NULL,
  `Detalle` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`Id_Grado`, `Grado`, `Division`, `Detalle`) VALUES
(1, 1, 1, 'Primero Primera'),
(2, 1, 2, 'Primero Segunda'),
(3, 1, 3, 'Primero Tercera'),
(4, 2, 1, 'Segundo Primera'),
(5, 2, 2, 'Segundo Segunda'),
(6, 2, 3, 'Segundo Tercera'),
(7, 3, 1, 'Tercero Primera'),
(8, 3, 2, 'Tercero Segunda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_uc`
--

CREATE TABLE `grado_uc` (
  `Id_Grado` int(10) DEFAULT NULL,
  `Id_UC` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_uc`
--

INSERT INTO `grado_uc` (`Id_Grado`, `Id_UC`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(4, 33),
(7, 34),
(7, 35),
(7, 36),
(7, 37),
(7, 38),
(7, 39),
(7, 40),
(7, 41),
(7, 42),
(7, 43),
(7, 44),
(7, 45),
(7, 46),
(4, 14),
(7, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `Id_Inscripcion` int(10) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Id_Grado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`Id_Inscripcion`, `FechaHora`, `Id_Alumno`, `Id_Carrera`, `Id_Grado`) VALUES
(1, '2024-01-10 16:07:56', 1, 2, 1),
(2, '2024-01-16 00:21:06', 1, 2, 1),
(3, '2024-01-16 00:45:08', 1, 2, 1),
(4, '2024-01-16 11:45:40', 1, 2, 1),
(5, '2024-01-16 11:49:05', 1, 2, 1),
(6, '2024-01-16 11:59:14', 1, 2, 1),
(7, '2024-01-16 11:59:28', 1, 2, 1),
(8, '2024-01-16 12:01:41', 1, 2, 1),
(9, '2024-01-16 12:03:19', 1, 2, 1),
(10, '2024-01-16 12:08:58', 1, 2, 1),
(11, '2024-01-16 12:09:30', 1, 2, 1),
(12, '2024-01-16 12:26:08', 1, 2, 1),
(13, '2024-01-16 16:34:33', 5, 3, 3),
(14, '2024-01-16 16:58:14', 4, 2, 2),
(15, '2024-01-16 19:27:09', 1, 2, 1),
(16, '2024-01-16 20:14:54', 1, 2, 1),
(17, '2024-01-17 00:30:59', 1, 2, 1),
(18, '2024-01-17 16:08:33', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_uc`
--

CREATE TABLE `inscripcion_uc` (
  `Id_Inscripcion` int(10) DEFAULT NULL,
  `Id_UC` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcion_uc`
--

INSERT INTO `inscripcion_uc` (`Id_Inscripcion`, `Id_UC`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 10),
(1, 15),
(1, 16),
(1, 7),
(1, 17),
(1, 18),
(2, 2),
(2, 3),
(2, 5),
(3, 3),
(3, 5),
(3, 10),
(4, 2),
(4, 10),
(4, 11),
(5, 2),
(5, 10),
(5, 11),
(6, 2),
(6, 10),
(6, 11),
(7, 2),
(7, 10),
(7, 11),
(8, 2),
(8, 10),
(8, 11),
(9, 1),
(9, 3),
(9, 5),
(10, 10),
(10, 11),
(10, 12),
(11, 12),
(11, 14),
(11, 19),
(12, 10),
(12, 11),
(12, 13),
(13, 14),
(13, 20),
(14, 2),
(14, 5),
(14, 19),
(15, 3),
(15, 5),
(15, 10),
(16, 12),
(16, 14),
(17, 11),
(17, 12),
(17, 13),
(18, 10),
(18, 11),
(18, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `Id_Nota` int(10) NOT NULL,
  `Id_UC` int(10) DEFAULT NULL,
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`Id_Nota`, `Id_UC`, `Id_Alumno`, `Id_Carrera`, `Nota`) VALUES
(1, 1, 4, 2, 8.3),
(2, 2, 4, 2, 7.6),
(3, 3, 4, 2, 9.1),
(4, 10, 4, 2, 8),
(5, 5, 4, 2, 7.8),
(6, 11, 4, 2, 9.2),
(7, 12, 4, 2, 8.7),
(8, 13, 4, 2, 7.9),
(9, 14, 4, 2, 8.5),
(10, 1, 5, 3, 8),
(11, 2, 5, 3, 7.5),
(12, 3, 5, 3, 9.2),
(13, 4, 5, 3, 8.6),
(14, 5, 5, 3, 7.9),
(15, 6, 5, 3, 9.5),
(16, 7, 5, 3, 8.3),
(17, 8, 5, 3, 7.8),
(18, 9, 5, 3, 8.9),
(19, 19, 5, 3, 8.2),
(20, 20, 5, 3, 7.7),
(21, 21, 5, 3, 9.1),
(22, 22, 5, 3, 8.5),
(23, 14, 5, 3, 7.8),
(24, 23, 5, 3, 9.3),
(25, 24, 5, 3, 8.8),
(26, 25, 5, 3, 7.9),
(27, 26, 5, 3, 8.7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_curricular`
--

CREATE TABLE `unidad_curricular` (
  `Id_UC` int(10) NOT NULL,
  `Unidad_Curricular` varchar(60) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `HorasSem` int(10) DEFAULT NULL,
  `HorasAnual` int(10) DEFAULT NULL,
  `Formato` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidad_curricular`
--

INSERT INTO `unidad_curricular` (`Id_UC`, `Unidad_Curricular`, `Tipo`, `HorasSem`, `HorasAnual`, `Formato`) VALUES
(1, 'Comunicación', 'Cuatrimestral', 3, 48, 'Taller'),
(2, 'UDI 1', 'Cuatrimestral', 3, 48, 'Materia'),
(3, 'Matemática', 'Anual', 3, 96, 'Materia'),
(4, 'Física Aplicada a las Tecnologías de la Información', 'Anual', 3, 96, 'Taller'),
(5, 'Administración', 'Anual', 3, 96, 'Materia'),
(6, 'InglésTécnico', 'Anual', 4, 128, 'Materia'),
(7, 'Arquitectura de las computadoras', 'Anual', 4, 128, 'Taller'),
(8, 'Lógica y Programación', 'Anual', 4, 128, 'Materia'),
(9, 'Infraestructura de Redes 1', 'Anual', 4, 128, 'Taller'),
(10, 'Inglés Técnico 1', 'Anual', 3, 96, 'Materia'),
(11, 'Tecnología de la Información', 'Anual', 3, 96, 'Materia'),
(12, 'Lógica y Estructura de Datos', 'Anual', 4, 128, 'Taller'),
(13, 'Ingeniería de Software 1', 'Anual', 4, 128, 'Materia'),
(14, 'Sistemas Operativos', 'Anual', 4, 128, 'Materia'),
(15, 'Psicosociología de las Organizaciones', 'Anual', 3, 96, 'Materia'),
(16, 'Modelos de Negocios', 'Anual', 3, 96, 'Taller'),
(17, 'Gestión de Software 1', 'Anual', 4, 128, 'Taller'),
(18, 'Análisis de Sistemas Organizacionales', 'Anual', 5, 160, 'Taller'),
(19, 'Problemáticas Socio Contemporáneas', 'Cuatrimestral', 3, 48, 'Materia'),
(20, 'UDI 2', 'Cuatrimestral', 3, 48, 'Materia'),
(21, 'Estadística', 'Anual', 3, 96, 'Materia'),
(22, 'Innovación y Desarrollo Emprendedor', 'Anual', 3, 96, 'Taller'),
(23, 'Algoritmos y Estructura de Datos', 'Anual', 4, 128, 'Materia'),
(24, 'Base de Datos', 'Anual', 4, 128, 'Taller'),
(25, 'Infraestructura de Redes 2', 'Anual', 4, 128, 'Laboratorio'),
(26, 'Práctica Profesionalizante 1', 'Anual', 4, 128, 'Proyecto'),
(27, 'Inglés Técnico 2', 'Anual', 3, 96, 'Materia'),
(28, 'Programación 1', 'Anual', 6, 192, 'Taller'),
(29, 'Ingeniería de Software 2', 'Anual', 4, 128, 'Materia'),
(30, 'Bases de Datos 1', 'Anual', 4, 128, 'Materia'),
(31, 'Gestión de Software 2', 'Anual', 4, 128, 'Materia'),
(32, 'Estrategias de Negocios', 'Anual', 2, 128, 'Proyecto'),
(33, 'Desarrollo de Sistemas', 'Anual', 5, 160, 'Taller'),
(34, 'Ética y Responsabilidad Social', 'Cuatrimestral', 3, 48, 'Materia'),
(35, 'Derecho y Legislación laboral', 'Cuatrimestral', 3, 48, 'Materia'),
(36, 'Administración de Bases de Datos', 'Anual', 4, 128, 'Materia'),
(37, 'Seguridad de los Sistemas', 'Anual', 5, 160, 'Materia'),
(38, 'Integridad y Migración de Datos', 'Anual', 4, 128, 'Proyecto'),
(39, 'Administración de Sistemas Operativos y Red', 'Anual', 4, 128, 'Taller'),
(40, 'Práctica Profesionalizante 2', 'Anual', 8, 256, 'Proyecto'),
(41, 'Redes y Comunicación', 'Anual', 4, 128, 'Laboratorio'),
(42, 'Programación 2', 'Anual', 6, 192, 'Taller'),
(43, 'Gestión de Proyectos de Software', 'Anual', 4, 128, 'Materia'),
(44, 'Bases de Datos 2', 'Anual', 4, 128, 'Taller'),
(45, 'Sistema de Información Organizacional', 'Anual', 4, 128, 'Taller'),
(46, 'Desarrollo de Sistemas Web', 'Anual', 5, 160, 'Taller');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Id_Alumno`);

--
-- Indices de la tabla `alumno_carrera`
--
ALTER TABLE `alumno_carrera`
  ADD KEY `fk_alumno_carrera_alumno` (`Id_Alumno`),
  ADD KEY `fk_alumno_carrera_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `alumno_grado`
--
ALTER TABLE `alumno_grado`
  ADD KEY `fk_alumno_grado_alumno` (`Id_Alumno`),
  ADD KEY `fk_alumno_grado_grado` (`Id_Grado`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Id_Carrera`);

--
-- Indices de la tabla `carrera_uc`
--
ALTER TABLE `carrera_uc`
  ADD KEY `fk_carrera_uc_uc` (`Id_UC`),
  ADD KEY `fk_carrera_uc_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `correlatividades`
--
ALTER TABLE `correlatividades`
  ADD PRIMARY KEY (`Id_Correlativa`),
  ADD KEY `fk_correlatividades_uc` (`Id_UC`),
  ADD KEY `fk_correlatividades_carrera` (`Id_Carrera`),
  ADD KEY `fk_correlatividades_correlativa` (`Correlativa`);

--
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD PRIMARY KEY (`Id_Cupos`),
  ADD KEY `fk_cupos_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`Id_Grado`);

--
-- Indices de la tabla `grado_uc`
--
ALTER TABLE `grado_uc`
  ADD KEY `fk_grado_uc_uc` (`Id_UC`),
  ADD KEY `grado_uc_FK` (`Id_Grado`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`Id_Inscripcion`),
  ADD KEY `fk_inscripcion_alumno` (`Id_Alumno`),
  ADD KEY `fk_inscripcion_carrera` (`Id_Carrera`),
  ADD KEY `fk_inscripcion_grado` (`Id_Grado`);

--
-- Indices de la tabla `inscripcion_uc`
--
ALTER TABLE `inscripcion_uc`
  ADD KEY `Id_Inscripcion` (`Id_Inscripcion`),
  ADD KEY `Id_UC` (`Id_UC`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`Id_Nota`),
  ADD KEY `fk_notas_uc` (`Id_UC`),
  ADD KEY `fk_notas_alumno` (`Id_Alumno`),
  ADD KEY `fk_notas_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `unidad_curricular`
--
ALTER TABLE `unidad_curricular`
  ADD PRIMARY KEY (`Id_UC`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `Id_Alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Id_Carrera` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `correlatividades`
--
ALTER TABLE `correlatividades`
  MODIFY `Id_Correlativa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cupos`
--
ALTER TABLE `cupos`
  MODIFY `Id_Cupos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `Id_Grado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `Id_Inscripcion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `Id_Nota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `unidad_curricular`
--
ALTER TABLE `unidad_curricular`
  MODIFY `Id_UC` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_carrera`
--
ALTER TABLE `alumno_carrera`
  ADD CONSTRAINT `fk_alumno_carrera_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_alumno_carrera_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alumno_grado`
--
ALTER TABLE `alumno_grado`
  ADD CONSTRAINT `fk_alumno_grado_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_alumno_grado_grado` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrera_uc`
--
ALTER TABLE `carrera_uc`
  ADD CONSTRAINT `fk_carrera_uc_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_carrera_uc_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `correlatividades`
--
ALTER TABLE `correlatividades`
  ADD CONSTRAINT `fk_correlatividades_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_correlatividades_correlativa` FOREIGN KEY (`Correlativa`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_correlatividades_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD CONSTRAINT `fk_cupos_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grado_uc`
--
ALTER TABLE `grado_uc`
  ADD CONSTRAINT `fk_grado_uc_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `grado_uc_FK` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inscripcion_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inscripcion_grado` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion_uc`
--
ALTER TABLE `inscripcion_uc`
  ADD CONSTRAINT `inscripcion_uc_ibfk_1` FOREIGN KEY (`Id_Inscripcion`) REFERENCES `inscripcion` (`Id_Inscripcion`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripcion_uc_ibfk_2` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_notas_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_notas_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_notas_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
