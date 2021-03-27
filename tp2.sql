-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 10:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Busquedaproductofiltros` (IN `_nom` VARCHAR(100), IN `_mc` VARCHAR(100), IN `_cat` VARCHAR(100), IN `_subcat` VARCHAR(100), IN `_desh` BOOLEAN)  SELECT 
		  p.id_producto id_producto , 
		  p.nombre nombre,
		  p.precio precio,
		  p.descripcion descripcion,
		  p.deshabilitado deshabilitado,
		  m.id_marca id_marca,
		  m.descripcion descmarca,      
		  cat.id_categoria id_categoria,
		  cat.nombre descrpcategoria,
		  Subcat.id_categoria id_subcategoria,
		  Subcat.nombre descrpSubcategoria
		  
	FROM 
		 prod p 
	INNER JOIN 
		 categ Subcat ON Subcat.id_categoria = p.id_categoria 
	LEFT JOIN 
		 categ cat ON  cat.id_categoria = Subcat.id_padre
	INNER JOIN 
		  marc m on m.id_marca = p.id_marca 
	WHERE 
		  p.nombre LIKE CONCAT('%', _nom , '%')
	AND
		 m.id_marca = (CASE WHEN _mc = '' THEN m.id_marca else _mc END )
	AND
		cat.id_categoria = (CASE WHEN _cat = '' THEN cat.id_categoria else _cat END )
	AND
		Subcat.id_categoria =(CASE WHEN _subcat = '' THEN Subcat.id_categoria else  _subcat END )
	AND
		p.deshabilitado = _desh$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Busquedaproductofiltros2` (IN `_nom` VARCHAR(100), IN `_mc` VARCHAR(100), IN `_cat` VARCHAR(100), IN `_subcat` VARCHAR(100), IN `_desh` BOOLEAN)  SELECT 
		  p.id_producto id_producto , 
		  p.nombre nombre,
		  p.precio precio,
		  p.descripcion descripcion,
		  p.deshabilitado deshabilitado,
		  m.id_marca id_marca,
		  m.descripcion descmarca,      
		  cat.id_categoria id_categoria,
		  cat.nombre descrpcategoria,
		  Subcat.id_categoria id_subcategoria,
		  Subcat.nombre descrpSubcategoria
		  
	FROM 
		 prod p 
	INNER JOIN 
		 categ Subcat ON Subcat.id_categoria = p.id_categoria 
	LEFT JOIN 
		 categ cat ON  cat.id_categoria = Subcat.id_padre
	INNER JOIN 
		  marc m on m.id_marca = p.id_marca 
	WHERE 
		  p.nombre LIKE CONCAT('%', _nom , '%')
	AND
		 m.id_marca = (CASE WHEN _mc = '' THEN m.id_marca else _mc END )
	AND
		cat.id_categoria = (CASE WHEN _cat = '' THEN cat.id_categoria else _cat END )
	AND
		Subcat.id_categoria =(CASE WHEN _subcat = '' THEN Subcat.id_categoria else  _subcat END )
	AND
		p.deshabilitado = _desh$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `categ`
-- (See below for the actual view)
--
CREATE TABLE `categ` (
`id_categoria` int(11)
,`nombre` varchar(250)
,`id_padre` int(11)
,`deshabilitado` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `coment`
-- (See below for the actual view)
--
CREATE TABLE `coment` (
`id_comentario` int(11)
,`nombre` varchar(100)
,`mail` varchar(100)
,`telefono` varchar(20)
,`mensaje` varchar(255)
,`estado` int(11)
,`fechalta` datetime
,`id_producto` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `marc`
-- (See below for the actual view)
--
CREATE TABLE `marc` (
`id_marca` int(11)
,`descripcion` varchar(100)
,`deshabilitado` char(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Ventas'),
(3, 'Marketing'),
(12, 'Sistem'),
(13, 'Nuevo perfil');

-- --------------------------------------------------------

--
-- Table structure for table `perfil_permisos`
--

CREATE TABLE `perfil_permisos` (
  `id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfil_permisos`
--

INSERT INTO `perfil_permisos` (`id`, `perfil_id`, `permiso_id`) VALUES
(29, 1, 1),
(30, 1, 2),
(31, 1, 4),
(32, 1, 3),
(33, 1, 5),
(34, 1, 6),
(35, 1, 7),
(58, 2, 1),
(59, 2, 2),
(60, 2, 3),
(65, 3, 1),
(66, 3, 4),
(67, 12, 5),
(68, 12, 6),
(71, 13, 1),
(72, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cod` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `cod`) VALUES
(1, 'Agregar usuarios', 'user.add'),
(2, 'Modificar usuarios', 'user.edit'),
(3, 'Borrar Usuarios', 'user.del'),
(4, 'Ver Usuarios', 'user.see'),
(5, 'Agregar Tareas', 'tarea.add');

-- --------------------------------------------------------

--
-- Table structure for table `permisos2`
--

CREATE TABLE `permisos2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permisos2`
--

INSERT INTO `permisos2` (`id`, `nombre`) VALUES
(1, 'productos'),
(2, 'categorias'),
(3, 'marcas'),
(4, 'comentarios'),
(5, 'usuarios'),
(6, 'perfiles'),
(7, 'subcategorias');

-- --------------------------------------------------------

--
-- Stand-in structure for view `prod`
-- (See below for the actual view)
--
CREATE TABLE `prod` (
`id_producto` int(11)
,`nombre` varchar(100)
,`descripcion` varchar(1000)
,`imagen` varchar(200)
,`id_marca` int(11)
,`id_categoria` int(11)
,`precio` varchar(100)
,`deshabilitado` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `salt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `email`, `tipo`, `activo`, `salt`) VALUES
(1, 'Admin', 'Sistema', 'admin', '0dde5185db7da5c81f0fa71696506e4f', 'admin@carrito.com', 1, 1, 'salt'),
(20, 'adrian', 'balquinta', 'adrian.balquinta', 'd0e1c75ebb04e671cd5d0d224a570e90', 'adrian@gmail.com', 0, 1, '5eed717ba1e55'),
(21, 'juan', 'perez', 'juan.perez', '0d2846c41a4cdc8bbd704042f4a1f9e0', '', 0, 0, '5eedb9b04f111'),
(22, 'juan', 'perez', 'juan.perez', '6d16c598a274ba27fd491d94b578dbc5', 'adrian@gmail.com', 0, 1, '5eedb9ddf3af2'),
(27, 'a2', 'a2', 'a2', '5818b774bcb59491ed4d7e9d5adfbc80', 'adrian@gmail.com', 0, 0, '5eefc53f7300c'),
(28, 'Sistem', 'sistem', 'sistem', 'caa386aecd176190d94d49e529a6e063', 'sistem@gmail', 0, 1, '5eefd1c25ddfd'),
(29, 'pepe', 'perez', 'pepe.perez', 'f0c99ce3d1600abcff606f2af6c0c115', 'pepe@gmail.com', 0, 1, '5ef130ffbb935');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_perfiles`
--

CREATE TABLE `usuarios_perfiles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`id`, `usuario_id`, `perfil_id`) VALUES
(29, 20, 2),
(32, 26, 1),
(34, 22, 3),
(38, 28, 12),
(39, 27, 3),
(41, 29, 13),
(42, 1, 1),
(43, 1, 2),
(44, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_tipos`
--

CREATE TABLE `usuarios_tipos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_tipos`
--

INSERT INTO `usuarios_tipos` (`id_tipo`, `tipo`) VALUES
(1, 'admin'),
(2, 'ventas'),
(3, 'entregas');

-- --------------------------------------------------------

--
-- Structure for view `categ`
--
DROP TABLE IF EXISTS `categ`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categ`  AS  select `produccion`.`categorias`.`id_categoria` AS `id_categoria`,`produccion`.`categorias`.`nombre` AS `nombre`,`produccion`.`categorias`.`id_padre` AS `id_padre`,`produccion`.`categorias`.`deshabilitado` AS `deshabilitado` from `produccion`.`categorias` ;

-- --------------------------------------------------------

--
-- Structure for view `coment`
--
DROP TABLE IF EXISTS `coment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coment`  AS  select `produccion`.`comentarios`.`id_comentario` AS `id_comentario`,`produccion`.`comentarios`.`nombre` AS `nombre`,`produccion`.`comentarios`.`mail` AS `mail`,`produccion`.`comentarios`.`telefono` AS `telefono`,`produccion`.`comentarios`.`mensaje` AS `mensaje`,`produccion`.`comentarios`.`estado` AS `estado`,`produccion`.`comentarios`.`fechalta` AS `fechalta`,`produccion`.`comentarios`.`id_producto` AS `id_producto` from `produccion`.`comentarios` ;

-- --------------------------------------------------------

--
-- Structure for view `marc`
--
DROP TABLE IF EXISTS `marc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marc`  AS  select `produccion`.`marcas`.`id_marca` AS `id_marca`,`produccion`.`marcas`.`descripcion` AS `descripcion`,`produccion`.`marcas`.`deshabilitado` AS `deshabilitado` from `produccion`.`marcas` ;

-- --------------------------------------------------------

--
-- Structure for view `prod`
--
DROP TABLE IF EXISTS `prod`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prod`  AS  select `produccion`.`productos`.`id_producto` AS `id_producto`,`produccion`.`productos`.`nombre` AS `nombre`,`produccion`.`productos`.`descripcion` AS `descripcion`,`produccion`.`productos`.`imagen` AS `imagen`,`produccion`.`productos`.`id_marca` AS `id_marca`,`produccion`.`productos`.`id_categoria` AS `id_categoria`,`produccion`.`productos`.`precio` AS `precio`,`produccion`.`productos`.`deshabilitado` AS `deshabilitado` from `produccion`.`productos` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permisos2`
--
ALTER TABLE `permisos2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permisos2`
--
ALTER TABLE `permisos2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
