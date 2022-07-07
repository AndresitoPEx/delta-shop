-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2022 a las 23:43:28
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(4, 'UNIFORMES'),
(5, 'MUSLERAS'),
(6, 'BOINAS'),
(7, 'CHALECOS'),
(8, 'MOCHILAS'),
(9, 'CASCOS'),
(10, 'MASCARAS'),
(11, 'chupetines');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `comentario`) VALUES
(17, 'JUAN ALBERTO', 'ZORRILLA MONTES', 'jal@hotmail.com', '996562355', 'jr. Esperanza NÂ°560', 'Cliente Frecuente'),
(18, 'MANUEL', 'ALVAREZ MURGA', 'murga_14@hotmail.com', '945558457', 'zv. 28 de mayo NÂ° 561', 'Cliente frecuente'),
(19, 'FRANK ', 'LOPEZ OSORIO', 'lopez@hotmail.com', '984568789', 'jr. 3 cruces sin numero', 'cliente frecuente'),
(20, 'IRMA', 'FIGUEROA SIFUENTES', 'fisifu@hotmail.com', '956845211', 'av. 28 de julio NÂ° 234', 'Cliente Frecuente'),
(21, 'GABRIELA', 'CORNEJO ROMERO', 'gabi_69@hotmail.com', '989656325', 'av. Santa cruz NÂ° 450', 'cliente'),
(22, 'CRISTINA', 'ALIAGA SARRIN', 'sarrin@hotmail.com', '956845215', 'av. Santa cruz NÂ° 560', 'cliente no frecuente'),
(23, 'lkasdjasdjk', 'alksdjaksdj', 'kjsdkfjsdkfj@gmail.com', '987654321', 'sdlÃ±kÃ±alsdkas', 'Ã±alsdkalÃ±sdka'),
(25, 'aksdjk', 'alksdj', 'askdjaks@te', '18237665', 'aksjdkalsjdkaj', 'slkdjaslkdjasldj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedidos_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedidos_id`, `productos_id`, `precio`, `cantidad`, `estado`) VALUES
(15, 13, 43, '456.00', 44, '213'),
(18, 15, 45, '123.00', 45, '123'),
(19, 13, 42, '123.00', 23, 'aea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `total`, `fecha`, `estado`) VALUES
(13, 18, '200.00', '2022-05-26', 'activo'),
(14, 21, '200.00', '2022-05-26', 'pendiente'),
(15, 17, '300.00', '2022-05-31', 'pendiente'),
(19, 17, '200.00', '2022-05-12', 'act'),
(20, 17, '900.00', '2022-05-12', 'act'),
(21, 17, '5000.00', '0000-00-00', 'act');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `modelo`, `id_categoria`, `color`, `precio`) VALUES
(42, '#MA-126-T', 'MASCARA TAC', 'MASCARA TAC', 10, 'azul', '3000.00'),
(43, 'GT45-L1', 'MOCHILA TACTICA K-MIL', 'MOCHILA', 8, 'NEGRO', '280.00'),
(44, 'G4-5TY', 'CACERINA DE PECHO', 'EQUIPO LIGER M-4', 7, 'CAMUFLADO', '350.00'),
(45, 'MC-4A', 'MUSLERA', 'MUSLERA CON CACERINA', 5, 'NEGRO', '90.00'),
(46, '4TP-A6', 'MORRAL', 'P-A', 7, 'VERDE MILITAR', '85.00'),
(48, 'asd', 'asd', 'ads', 8, 'asd', '20.00'),
(51, '5678', '                              ', 'x2', 4, 'verde', '125.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productox`
--

CREATE TABLE `productox` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(5) NOT NULL,
  `composition` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `talla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigobarra` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productox`
--

INSERT INTO `productox` (`id`, `name`, `categoria`, `precio`, `composition`, `color`, `talla`, `codigobarra`) VALUES
(1, 'camisa', 'verano', 100, 'tela', 'negro', 'XL', '1231asdas'),
(2, 'pantalon', 'Jean', 200, 'Jean', 'azul', 'L', 'sdjkfh7we6'),
(3, 'Chompa', 'Uniforme', 50, 'Lana', 'Verde', 'S', 'sdjf987'),
(4, 'Polera', 'Urbano', 450, 'Sintetico', 'Multicolores', 'XL', 'uodfiy878'),
(5, 'Zapatos', 'Vestir', 340, 'Cuero', 'Negro', '44', 'dlifuws9867f6'),
(6, 'Gorro', 'Urbano', 120, 'Algodon', 'Amarillo', 'M', 'dsoif7s9873'),
(7, 'short', 'verano', 70, 'algodon', 'verde y blanco', 'XL', 'aksjdfhasi77'),
(8, 'polo', 'urbano', 85, 'algodon', 'blanco y negro', 'L', 'oidr987h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `estado`) VALUES
(26, 'asdasdasd', 'sadasdasd', 'adasd'),
(27, 'sdasdasd', '123123123', 'activo'),
(28, 'asdajshd', 'jashdjsdg', 'activo'),
(30, 'Fulgencio', 'pipipipipipipii', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_id` (`pedidos_id`),
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `productox`
--
ALTER TABLE `productox`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `productox`
--
ALTER TABLE `productox`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `pedidos_id` FOREIGN KEY (`pedidos_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `productos_id` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
