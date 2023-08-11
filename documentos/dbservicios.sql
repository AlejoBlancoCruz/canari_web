-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2023 a las 21:50:18
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
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `title`, `created`) VALUES
(1, 'John Doe', 'johndoe@example.com', '2026550143', 'Lawyer', '2019-05-08 17:32:00'),
(2, 'David Deacon', 'daviddeacon@example.com', '2025550121', 'Employee', '2019-05-08 17:28:44'),
(3, 'Sam White', 'samwhite@example.com', '2004550121', 'Employee', '2019-05-08 17:29:27'),
(4, 'Colin Chaplin', 'colinchaplin@example.com', '2022550178', 'Supervisor', '2019-05-08 17:29:27'),
(5, 'Ricky Waltz', 'rickywaltz@example.com', '7862342390', '', '2019-05-09 19:16:00'),
(6, 'Arnold Hall', 'arnoldhall@example.com', '5089573579', 'Manager', '2019-05-09 19:17:00'),
(7, 'Toni Adams', 'alvah1981@example.com', '2603668738', '', '2019-05-09 19:19:00'),
(8, 'Donald Perry', 'donald1983@example.com', '7019007916', 'Employee', '2019-05-09 19:20:00'),
(9, 'Joe McKinney', 'nadia.doole0@example.com', '6153353674', 'Employee', '2019-05-09 19:20:00'),
(10, 'Angela Horst', 'angela1977@example.com', '3094234980', 'Assistant', '2019-05-09 19:21:00'),
(11, 'James Jameson', 'james1965@example.com', '4002349823', 'Assistant', '2019-05-09 19:32:00'),
(12, 'Daniel Deacon', 'danieldeacon@example.com', '5003423549', 'Manager', '2019-05-09 19:33:00'),
(13, 'Alejo Manuel Blanco Cruz', 'blancoalejo@gmail.com', '625153789', 'Manager', '2023-08-04 14:48:00'),
(14, 'Norma Avolio', 'normaavolio@gmail.com', '682331278', 'Administrador', '2023-08-04 14:49:00'),
(15, 'Daniel Alexander Blanco Avolio', 'dani', '807842323', 'Tecnical Manager', '2023-08-04 15:27:00');

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
  `serv_descripcion` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `serv_imagen` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `serv_creacion_fecha` date NOT NULL,
  `serv_actualiz_fecha` date NOT NULL,
  `serv_categ` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `tbservicios`
--

INSERT INTO `tbservicios` (`serv_id`, `serv_nombre`, `serv_descripcion`, `serv_imagen`, `serv_creacion_fecha`, `serv_actualiz_fecha`, `serv_categ`) VALUES
(1, 'Abrillantado y Decapado de Pisos', 'El abrillantado de suelos es una técnica que mejora el aspecto y la durabilidad de los pavimentos, eliminando manchas, arañazos y suciedad, y devolviéndoles el brillo y la suavidad originales.\r\nAdemás, contribuye a crear un ambiente más higiénico y saludable, ya que reduce la acumulación de polvo y ácaros.\r\nJ.C. Coello les brindará un servicio a todo lujo.', 'a03.jpg', '2023-07-31', '2023-07-31', 2),
(2, 'Pintura de Inmuebles', 'Tener las paredes y los techos bien pintados es una forma de mejorar el aspecto y la calidad de nuestro hogar. Algunas de las ventajas que nos ofrece son:\r\nProtege las superficies de la humedad, el moho, las grietas y otros agentes externos que pueden deteriorarlas.\r\nAporta luminosidad, amplitud y sensación de limpieza al ambiente, lo que influye positivamente en nuestro estado de ánimo.\r\nPermite personalizar el estilo y la decoración de cada espacio, eligiendo los colores y los acabados.', 'pintura1.jpg', '2023-08-09', '2023-08-09', 2),
(3, 'Servicio de Limpieza de Pisos Privados', 'Este tipo de servicio se caracteriza por tener un alto grado de responsabilidad. Nuestros agentes están debidamente preparados para afrontar esos retos.\r\n\r\nSi desea contratar nuestros servicios o solicitar más información, puede contactarnos a través de los teléfonos (661-04-44-07 / 611-60-26-43) o del correo electrónico serviciosjccoello@gmail.com.', 'limpieza3.jfif', '2023-07-23', '2023-07-23', 3),
(4, 'Limpieza de Oficinas', 'En J.C. Coello, somos expertos en la limpieza y desinfección de todo tipo de espacios de trabajo. Contamos con un equipo de profesionales cualificados y experimentados, que utilizan los mejores productos y maquinarias del mercado para garantizar un resultado óptimo. Nuestro servicio de limpieza de oficina se adapta a las necesidades y horarios de cada cliente, ofreciendo una atención personalizada y un presupuesto a medida. No dude en contactarnos y solicitar una visita gratuita para evaluar el estado de su oficina y ofrecerle la mejor solución.', 'limpieza4.jfif', '2023-07-31', '2023-07-31', 3),
(7, 'Lavado de muebles y alfombras', 'El lavado de muebles y alfombras es un servicio que ofrece limpieza profesional y profunda de estos elementos del hogar. El objetivo es eliminar la suciedad, las manchas, los ácaros, los malos olores y las bacterias que se acumulan con el uso y el paso del tiempo. El lavado de muebles y alfombras se realiza con equipos especializados y productos de calidad que garantizan un resultado óptimo y duradero. El lavado de muebles y alfombras no solo mejora la apariencia y el confort de los espacios, si', 'limpieza5.jfif', '2023-08-11', '2023-08-11', 3),
(8, 'Lavado de tapicerias', '¿Está buscando una empresa de limpieza de tapicerías profesional y confiable? No busque más, en Limpieza Express tenemos la solución para usted. Ofrecemos un servicio de limpieza de tapicerías a domicilio, con maquinaria especializada y productos ecológicos que garantizan la eliminación de manchas, ácaros, bacterias y malos olores. Nuestros técnicos están capacitados y certificados para limpiar todo tipo de tapicerías, desde sofás y sillones hasta alfombras y cortinas. Contamos con más de 10 año', 'limpieza2.jpg', '2023-08-11', '2023-08-11', 3);

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
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbcategorias`
--
ALTER TABLE `tbcategorias`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indices de la tabla `tbservicios`
--
ALTER TABLE `tbservicios`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
