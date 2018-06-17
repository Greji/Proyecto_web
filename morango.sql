-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2018 a las 06:16:10
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `morango`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_descuento` int(11) NOT NULL,
  `cantidad_articulo` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id_descuento`, `cantidad_articulo`, `porcentaje`) VALUES
(1, 5, 10),
(2, 10, 15),
(3, 20, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `codigo_postal` tinyint(5) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `ext` tinyint(4) NOT NULL,
  `inte` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `id_usuario`, `estado`, `ciudad`, `codigo_postal`, `colonia`, `calle`, `ext`, `inte`) VALUES
(1, 1, 'a', 'a', 127, 'a', 'a', 124, 0),
(2, 1, 'a', 'a', 127, 'a', 'a', 124, 0),
(3, 2, 'Jalisco', 'Guadalajara', 127, 'Jardines del Country', 'Patria', 127, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` varchar(1) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
('F', 'Femenino'),
('M', 'Masculino'),
('O', 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_tipo`, `nombre`, `descripcion`, `precio`, `direccion`) VALUES
(1, 1, 'Aretes dorados flores', '', 60, 'Mujer/accesorios/aretes_flor.jpg'),
(2, 1, 'Aretes bohemios mandala', '', 70, 'Mujer/accesorios/aretes_mandala.jpg'),
(3, 1, 'Bufanda de lino rosada', '', 240, 'Mujer/accesorios/bufanda_lino_rosa.jpg'),
(4, 1, 'Diadema de flores', '', 80, 'Mujer/accesorios/diadema_flores.jpg'),
(5, 1, 'Diadema trenzada azul', '', 80, 'Mujer/accesorios/diadema_trenzada_azul.jpg'),
(6, 1, 'Lentes de sol rosados', '', 280, 'Mujer/accesorios/lentes_sol_rosas.jpg'),
(7, 1, 'Set de arracadas', '', 180, 'Mujer/accesorios/set_arracadas.jpg'),
(8, 1, 'Sombrero de paja con liston', '', 150, 'Mujer/accesorios/sombrero_paja.jpg'),
(9, 2, 'Blusa blanca bohemia', '', 260, 'Mujer/blusas/blusa_blanca_bohemia.jpg'),
(10, 2, 'Blusa bohemia mangas de campana', '', 340, 'Mujer/blusas/blusa_bohemia_campana.jpg'),
(11, 2, 'Blusa blanca floreada manga tres cuartos', '', 380, 'Mujer/blusas/blusa_blanca_floreada.jpg'),
(12, 2, 'Blusa amarilla floreada tie', '', 400, 'Mujer/blusas/blusa_floreada_con_mono.jpg'),
(13, 2, 'Blusa floreada cuello halter', '', 290, 'Mujer/blusas/blusa_floreada_halter.jpg'),
(14, 2, 'Blusa floreada sin hombros', '', 390, 'Mujer/blusas/blusa_floreada_sin_hombros.jpg'),
(15, 2, 'Blusa floreada azul manga tres cuartos', '', 430, 'Mujer/blusas/blusa_floreada_tres_cuartos.jpg'),
(16, 2, 'Blusa blanca manga bomb tres cuartos', '', 390, 'Mujer/blusas/blusa_blanca_manga_larga.jpg'),
(17, 2, 'Blusa blanca manga campana larga', '', 350, 'Mujer/blusas/blusa_blanca_mangas_campana.jpg'),
(18, 2, 'Blusa blanca hombros descubiertos', '', 310, 'Mujer/blusas/blusa_blanca_sin_hombros.jpg'),
(19, 2, 'Blusa rosa de tirantes', '', 170, 'Mujer/blusas/blusa_rosa_tirantes.jpg'),
(20, 3, 'Falda beige tie', '', 260, 'Mujer/faldas/falda_beige.jpg'),
(21, 3, 'Falda negra corta floral', '', 240, 'Mujer/faldas/falda_corta_floral.jpg'),
(22, 3, 'Falda negra larga floral', '', 230, 'Mujer/faldas/falda_larga_floral.jpg'),
(23, 3, 'Falda larga azul marino', '', 250, 'Mujer/faldas/falda_larga_marino.jpg'),
(24, 3, 'Falda de mezclilla a la rodilla', '', 230, 'Mujer/faldas/falda_mezclilla.jpg'),
(25, 3, 'Falda negra', '', 190, 'Mujer/faldas/falda_negra.jpg'),
(26, 3, 'Falda blanca plisada', '', 320, 'Mujer/faldas/falda_plisada_blanca.jpg'),
(27, 3, 'Falda negra plisada', '', 310, 'Mujer/faldas/falda_plisada_negra.jpg'),
(28, 3, 'Falda rosa asimetrica', '', 360, 'Mujer/faldas/falda_rosa.jpg'),
(29, 4, 'Leggins rosados Kappa', '', 290, 'Mujer/pantalones/leggins_kappa.jpg'),
(30, 4, 'Pantalon ancho con cadena', '', 390, 'Mujer/pantalones/pantalon_ancho_cadena.jpg'),
(31, 4, 'Pantalon ancho a rayas', '', 290, 'Mujer/pantalones/pantalon_ancho_rayas.jpg'),
(32, 4, 'Pantalon a cuadros blanco y negro', '', 390, 'Mujer/pantalones/pantalon_cuadros.jpg'),
(33, 4, 'Pantalon deportivo Puma', '', 240, 'Mujer/pantalones/pantalon_dep_puma.jpg'),
(34, 4, 'Pantalon lila', '', 310, 'Mujer/pantalones/pantalon_lila.jpg'),
(35, 4, 'Pantalon modelo revolver', '', 350, 'Mujer/pantalones/pantalon_revolver.jpg'),
(36, 4, 'Pantalon modelo Screptum', '', 390, 'Mujer/pantalones/pantalon_screptum.jpg'),
(37, 4, 'Pantalon Slim Kappa', '', 290, 'Mujer/pantalones/pantalon_slim_kappa.jpg'),
(38, 5, 'Chamarra deportiva Puma', '', 240, 'Mujer/pullovers/chamarra_dep_puma.jpg'),
(39, 5, 'Chamarra negra con arcoiris', '', 350, 'Mujer/pullovers/chamarra_negra_arcoiris.jpg'),
(40, 5, 'Sudadera amarilla con agujeros', '', 380, 'Mujer/pullovers/sudadera_amarilla_rota.jpg'),
(41, 5, 'Sudadera deportiva Puma', '', 290, 'Mujer/pullovers/sudadera_dep_puma.jpg'),
(42, 5, 'Sueter negro oversized con flamas', '', 390, 'Mujer/pullovers/sueter_oversized_flamas.jpg'),
(43, 5, 'Sueter negro con pentagrama', '', 270, 'Mujer/pullovers/Sueter_pentagrama.jpg'),
(44, 5, 'Sueter blanco y negro tejido a rayas', '', 270, 'Mujer/pullovers/sueter_rayas_tejido_bn.jpg'),
(45, 5, 'Sueter tejido colores por mitad', '', 270, 'Mujer/pullovers/sueter_tejido_mitad.jpg'),
(46, 5, 'Sueter negro tejido con rosas', '', 300, 'Mujer/pullovers/sueter_tejido_rosas.jpg'),
(47, 6, 'Vestido blanco con escote bajo', '', 280, 'Mujer/vestidos/vestido_blanco_escote_bajo.jpg'),
(48, 6, 'Vestido negro con cerezas', '', 290, 'Mujer/vestidos/vestido_cerezas.jpg'),
(49, 6, 'Vestido a cuadros colores', '', 290, 'Mujer/vestidos/vestido_cuadros.jpg'),
(50, 6, 'Vestido tipo Jersey', '', 270, 'Mujer/vestidos/vestido_jersey.jpg'),
(51, 6, 'Vestido negro Ballerina con transparencia', '', 300, 'Mujer/vestidos/vestido_negro_ballerina.jpg'),
(52, 6, 'Vestido Notch mostaza', '', 290, 'Mujer/vestidos/vestido_notch.jpg'),
(53, 6, 'Vestido polka dot blanco', '', 320, 'Mujer/vestidos/vestido_polka_dot.jpg'),
(54, 6, 'Vestido rosa Cami', '', 350, 'Mujer/vestidos/vestido_rosa_cami.jpg'),
(55, 6, 'Vestido azul estilo tie dye', '', 290, 'Mujer/vestidos/vestido_tie_dye.jpg'),
(56, 6, 'Vestido verde Plaid', '', 390, 'Mujer/vestidos/vestido_verde_plaid.jpg'),
(57, 7, 'Bolsa con estampado militar', '', 290, 'Hombre/accesorios/bolsa_militar.jpg'),
(58, 7, 'Cinturon tejido azul con rojo ', '', 230, 'Hombre/accesorios/cinturon_azul_rojo.jpg'),
(59, 7, 'Cinturon tejido blanco con azul', '', 230, 'Hombre/accesorios/cinturon_blanco_azul.jpg'),
(60, 7, 'Cinturon negro con hebilla rectangular', '', 240, 'Hombre/accesorios/cinturon_placa.jpg'),
(61, 7, 'Cinturon trenzado cafe', '', 220, 'Hombre/accesorios/cinturon_trenzado_cafe.jpg'),
(62, 7, 'Cinturon trenzado negro', '', 220, 'Hombre/accesorios/cinturon_trenzado_negro.jpg'),
(63, 7, 'Lentes de sol claros redondos', '', 290, 'Hombre/accesorios/lentes_claros_redondos.jpg'),
(64, 7, 'Lentes de sol cuadrados color cafe', '', 290, 'Hombre/accesorios/lentes_oscuros_cuadrados.jpg'),
(65, 7, 'Lentes de sol negros redondos', '', 290, 'Hombre/accesorios/lentes_oscuros_redondos.jpg'),
(66, 8, 'Camiseta estampada Marvel Avengers', '', 270, 'Hombre/camisetas/camiseta_avengers.jpg'),
(67, 8, 'Camiseta estampada Combi', '', 290, 'Hombre/camisetas/camiseta_combi.jpg'),
(68, 7, 'Camiseta estampada Looney Toons Correcaminos', '', 290, 'Hombre/camisetas/camiseta_correcaminos.jpg'),
(69, 8, 'Camiseta estampada Play Station retro', '', 290, 'Hombre/camisetas/camiseta_play_station.jpg'),
(70, 8, 'Camiseta estampada Popeye', '', 290, 'Hombre/camisetas/camiseta_popeye.jpg'),
(71, 8, 'Camiseta estampada Rick y Morty', '', 280, 'Hombre/camisetas/camiseta_rick_morty.jpg'),
(72, 8, 'Camiseta estampada Street Fighter II Retro', '', 290, 'Hombre/camisetas/camiseta_street_fighter.jpg'),
(73, 8, 'Camiseta estampada Looney Toons Taz', '', 290, 'Hombre/camisetas/camiseta_tazmania.jpg'),
(74, 8, 'Camiseta estampada Tom y Jerry', '', 290, 'Hombre/camisetas/camiseta_tom_jerry.jpg'),
(75, 9, 'Pantalon Skinny azul cielo', '', 300, 'Hombre/pantalones/pantalon_skinny_azul_cielo.jpg'),
(76, 9, 'Pantalon Skinny Gris', '', 300, 'Hombre/pantalones/pantalon_skinny_gris.jpg'),
(77, 9, 'Pantalon Skinny turquesa', '', 300, 'Hombre/pantalones/pantalon_skinny_turquesa.jpg'),
(78, 9, 'Pantalon Slim caqui', '', 290, 'Hombre/pantalones/pantalon_slim_caqui.jpg'),
(79, 9, 'Pantalon Slim gris', '', 290, 'Hombre/pantalones/pantalon_slim_gris.jpg'),
(80, 9, 'Pantalon Slim maple', '', 290, 'Hombre/pantalones/pantalon_slim_maple.jpg'),
(81, 9, 'Pantalon Slim palmeras', '', 310, 'Hombre/pantalones/pantalon_slim_palmeras.jpg'),
(82, 9, 'Pantalon Slim playa', '', 310, 'Hombre/pantalones/pantalon_slim_playa.jpg'),
(83, 10, 'Sudadera deslavada azul', '', 280, 'Hombre/pullovers/sudadera_deslavada_azul.jpg'),
(84, 10, 'Sueter cardado azul', '', 290, 'Hombre/pullovers/sueter_cardado_azul.jpg'),
(85, 10, 'Sueter cardado gris', '', 280, 'Hombre/pullovers/sueter_cardado_gris.jpg'),
(86, 10, 'Sueter cardado rojo', '', 280, 'Hombre/pullovers/sueter_cardado_rojo.jpg'),
(87, 10, 'Sueter cardado verde', '', 280, 'Hombre/pullovers/sueter_cardado_verde.jpg'),
(88, 10, 'Sueter cuello v crema', '', 280, 'Hombre/pullovers/sueter_cuello_v_crema.jpg'),
(89, 10, 'Sueter cuello v azul marino', '', 280, 'Hombre/pullovers/sueter_cuello_v_marino.jpg'),
(90, 10, 'Sueter cuello v rosa', '', 280, 'Hombre/pullovers/sueter_cuello_v_rosa.jpg'),
(91, 10, 'Sueter tejido azul marino', '', 290, 'Hombre/pullovers/sueter_tejido_marino.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`) VALUES
(1, 'Accesorios fem'),
(2, 'Blusas'),
(3, 'Faldas'),
(4, 'Pantalones fem'),
(5, 'Topwear fem'),
(6, 'Vestidos'),
(7, 'Accesorios masc'),
(8, 'Camisetas'),
(9, 'Pantalones masc'),
(10, 'Topwear');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `tarjeta` bigint(20) DEFAULT NULL,
  `mes_exp` varchar(12) NOT NULL,
  `ano_exp` varchar(4) NOT NULL,
  `cvv` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_genero`, `nombre`, `telefono`, `email`, `contrasena`, `tarjeta`, `mes_exp`, `ano_exp`, `cvv`) VALUES
(1, 'F', 'h', 123336789, 'a', 'a', 1111111111111111, 'enero', '2018', 111),
(2, 'F', 'Greta Jimena', 3311941290, 'gretygarcia99@gmail.com', '12345', 6565121211111111, 'septiembre', '2018', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_genero` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
