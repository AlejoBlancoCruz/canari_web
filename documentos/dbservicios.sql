-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2023 a las 20:31:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbservicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategorias`
--

CREATE TABLE `tbcategorias` (
  `categ_id` int(10) UNSIGNED NOT NULL,
  `categ_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Categorías de Servicios';

--
-- Volcado de datos para la tabla `tbcategorias`
--

INSERT INTO `tbcategorias` (`categ_id`, `categ_nombre`) VALUES
(1, 'Abrillantado de Pisos (Marmol)'),
(2, 'Pintura'),
(3, 'Limpieza'),
(4, 'Carpintería ligera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicios`
--

CREATE TABLE `tbservicios` (
  `serv_id` int(10) UNSIGNED NOT NULL,
  `serv_nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `serv_descripcion` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `serv_imagen` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `serv_creacion_fecha` date NOT NULL,
  `serv_actualiz_fecha` date NOT NULL,
  `serv_categ` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `tbservicios`
--

INSERT INTO `tbservicios` (`serv_id`, `serv_nombre`, `serv_descripcion`, `serv_imagen`, `serv_creacion_fecha`, `serv_actualiz_fecha`, `serv_categ`) VALUES
(1, 'Abrillantado y Decapado de Pisos', ' El abrillantado de suelos es una técnica que mejora el aspecto y la\r\n            durabilidad de los pavimentos, eliminando manchas, arañazos y\r\n            suciedad, y devolviéndoles el brillo y la suavidad originales.\r\n            Además, contribuye a crear un ambiente más higiénico y saludable, ya\r\n            que reduce la acumulación de polvo y ácaros.', 'a04.jpg', '2023-07-22', '2023-07-22', 1),
(2, 'No se Pintura', ' ¿Estás buscando un servicio de pintura para hogares, locales o\r\n            negocios?<br />\r\n            Te ofrecemos pintores profesionales con experiencia y garantía de\r\n            calidad. Podemos pintar cualquier superficie, desde paredes y techos\r\n            hasta puertas y muebles. Nos adaptamos a tus gustos y necesidades, y\r\n            te ofrecemos presupuestos gratuitos y sin compromiso. Contacta con\r\n            nosotros para renovar el aspecto de tu casa o local.', 'a02.jpg', '2023-07-24', '2023-07-24', 2),
(3, 'Servicio de Limpieza de Pisos Privados', 'Este tipo de servicio se caracteriza por tener un alto grado de responsabilidad. Nuestros agentes están debidamente preparados para afrontar esos retos.\r\n\r\nSi desea contratar nuestros servicios o solicitar más información,\r\n            puede contactarnos a través de los teléfonos (661-04-44-07 /\r\n            611-60-26-43) o del correo electrónico carlosmanamo@gmail.com.', 'a01.jpg', '2023-07-23', '2023-07-23', 3),
(4, 'Limpieza de Oficinas', 'Nuestros trabajos, realizados con ética y responsabilidad, se\r\n            esfuerzan por mantener los plazos acordados y cuidando cada\r\n            detalle. Nuestros clientes nos avalan con su confianza y\r\n            fidelidad.', 'a03.jpg', '2023-07-31', '2023-07-31', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(120) NOT NULL,
  `nivel` varchar(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `clave`, `nivel`, `fecha`) VALUES
(5, 'Alejo', 'Blanco Cruz', 'blancoalejo@gmail.com', '$2y$10$hCXOLZWJ0jwpeyM7P7tU..WPIc71LQsUPKEOU.hBTJWj.TuLMgwUi', 'adm', '2023-07-23 17:57:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcategorias`
--
ALTER TABLE `tbcategorias`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indices de la tabla `tbservicios`
--
ALTER TABLE `tbservicios`
  ADD PRIMARY KEY (`serv_id`),
  ADD KEY `serv_categ` (`serv_categ`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbservicios`
--
ALTER TABLE `tbservicios`
  ADD CONSTRAINT `tbservicios_ibfk_1` FOREIGN KEY (`serv_categ`) REFERENCES `tbcategorias` (`categ_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
