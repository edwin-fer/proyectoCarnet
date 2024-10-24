-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 01:48:16
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
-- Base de datos: `carnetizacion2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `usuario`, `contrasena`, `estado`) VALUES
(4, 'sandra vera', 'sandravera', '147258', 'Activo'),
(5, 'yull', 'yull', '987654', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_admision`
--

CREATE TABLE `departamento_admision` (
  `id_departamento_admision` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_usuario_admision` int(11) NOT NULL,
  `nombre_admision` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_ti`
--

CREATE TABLE `departamento_ti` (
  `id_departamento_ti` int(11) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `contrasena` varchar(60) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `id_TI` int(11) NOT NULL,
  `nombre_ti` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duplicados`
--

CREATE TABLE `duplicados` (
  `id_duplicado` int(11) NOT NULL,
  `cantidad` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresado`
--

CREATE TABLE `egresado` (
  `id_egresado` int(11) NOT NULL,
  `ano_grado_aplica` varchar(10) DEFAULT NULL,
  `numero_recibo` varchar(20) DEFAULT NULL,
  `codigo_tarjeta` varchar(30) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `acciones` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreEstado` varchar(60) DEFAULT NULL,
  `nombre_ti` varchar(80) DEFAULT NULL,
  `nombre_admision` varchar(60) DEFAULT NULL,
  `departamento` varchar(40) DEFAULT NULL,
  `fecha_inicio` varchar(30) DEFAULT NULL,
  `fecha_fin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `codigo_tarjeta` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefatura`
--

CREATE TABLE `jefatura` (
  `id_jefatura` int(11) NOT NULL,
  `verificado_jefe` varchar(60) DEFAULT NULL,
  `nombre_jefe` varchar(80) DEFAULT NULL,
  `codigotarjeta` varchar(20) DEFAULT NULL,
  `estadopago` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario_admision` varchar(90) NOT NULL,
  `observacion` varchar(250) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregrado_postgrado`
--

CREATE TABLE `pregrado_postgrado` (
  `id_pre_post` int(11) NOT NULL,
  `codigo_tarjeta` varchar(30) DEFAULT NULL,
  `correo_institucional` varchar(60) DEFAULT NULL,
  `estado_pago` varchar(20) DEFAULT NULL,
  `usuario_nuevo_institucion` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `fechaso` varchar(30) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `programaAcademicoOCargo` varchar(100) NOT NULL,
  `foto` varchar(25) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  `tipo_usuario` varchar(80) NOT NULL,
  `nombre_usuario_TI` varchar(80) DEFAULT NULL,
  `fecha_impresion` varchar(30) DEFAULT NULL,
  `nombre_usuario_admision` varchar(80) DEFAULT NULL,
  `fecha_recepcion` varchar(30) DEFAULT NULL,
  `duplicado` varchar(4) DEFAULT NULL,
  `cantidad` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_administradores`
--

CREATE TABLE `usuarios_administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `movil` varchar(15) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `departamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `departamento_admision`
--
ALTER TABLE `departamento_admision`
  ADD PRIMARY KEY (`id_departamento_admision`),
  ADD KEY `id_usuario_admision` (`id_usuario_admision`) USING BTREE,
  ADD KEY `fk_nombre_admision` (`nombre_admision`) USING BTREE;

--
-- Indices de la tabla `departamento_ti`
--
ALTER TABLE `departamento_ti`
  ADD PRIMARY KEY (`id_departamento_ti`),
  ADD KEY `id_TI` (`id_TI`) USING BTREE,
  ADD KEY `FK_nombre_ti` (`nombre_ti`);

--
-- Indices de la tabla `egresado`
--
ALTER TABLE `egresado`
  ADD KEY `id_egresado` (`id_egresado`) USING BTREE;

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `fk_usuario` (`id_usuario`),
  ADD KEY `fk_nombre_admision` (`nombre_admision`) USING BTREE,
  ADD KEY `FK_nombre_ti` (`nombre_ti`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD KEY `id_grado` (`id_grado`) USING BTREE;

--
-- Indices de la tabla `jefatura`
--
ALTER TABLE `jefatura`
  ADD KEY `id_jefatura` (`id_jefatura`) USING BTREE;

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `nombre_usuario_admision` (`nombre_usuario_admision`);

--
-- Indices de la tabla `pregrado_postgrado`
--
ALTER TABLE `pregrado_postgrado`
  ADD KEY `id_pre_post` (`id_pre_post`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD KEY `fk_nombre_ti` (`nombre_usuario_TI`) USING BTREE,
  ADD KEY `fk_nombre_admision` (`nombre_usuario_admision`) USING BTREE;

--
-- Indices de la tabla `usuarios_administradores`
--
ALTER TABLE `usuarios_administradores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamento_admision`
--
ALTER TABLE `departamento_admision`
  MODIFY `id_departamento_admision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departamento_ti`
--
ALTER TABLE `departamento_ti`
  MODIFY `id_departamento_ti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `egresado`
--
ALTER TABLE `egresado`
  MODIFY `id_egresado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1901;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1314;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1900;

--
-- AUTO_INCREMENT de la tabla `jefatura`
--
ALTER TABLE `jefatura`
  MODIFY `id_jefatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1902;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `pregrado_postgrado`
--
ALTER TABLE `pregrado_postgrado`
  MODIFY `id_pre_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1895;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1902;

--
-- AUTO_INCREMENT de la tabla `usuarios_administradores`
--
ALTER TABLE `usuarios_administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento_admision`
--
ALTER TABLE `departamento_admision`
  ADD CONSTRAINT `departamento_admision_ibfk_1` FOREIGN KEY (`id_usuario_admision`) REFERENCES `usuarios_administradores` (`id`);

--
-- Filtros para la tabla `departamento_ti`
--
ALTER TABLE `departamento_ti`
  ADD CONSTRAINT `departamento_ti_ibfk_1` FOREIGN KEY (`id_TI`) REFERENCES `usuarios_administradores` (`id`);

--
-- Filtros para la tabla `egresado`
--
ALTER TABLE `egresado`
  ADD CONSTRAINT `egresado_ibfk_1` FOREIGN KEY (`id_egresado`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `estados_ibfk_4` FOREIGN KEY (`nombre_admision`) REFERENCES `departamento_admision` (`nombre_admision`),
  ADD CONSTRAINT `estados_ibfk_5` FOREIGN KEY (`nombre_ti`) REFERENCES `departamento_ti` (`nombre_ti`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `jefatura`
--
ALTER TABLE `jefatura`
  ADD CONSTRAINT `jefatura_ibfk_1` FOREIGN KEY (`id_jefatura`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `pregrado_postgrado`
--
ALTER TABLE `pregrado_postgrado`
  ADD CONSTRAINT `pregrado_postgrado_ibfk_1` FOREIGN KEY (`id_pre_post`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nombre_usuario_TI`) REFERENCES `departamento_ti` (`nombre_ti`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`nombre_usuario_admision`) REFERENCES `departamento_admision` (`nombre_admision`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
