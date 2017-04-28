-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 03:40 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aplicaciones`
--

CREATE TABLE `tbl_aplicaciones` (
  `codigo_aplicacion` int(11) NOT NULL,
  `nombre` varchar(455) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `calificacion` float DEFAULT NULL,
  `url` varchar(500) NOT NULL,
  `tamanio_archivo` double NOT NULL,
  `url_icono` varchar(45) NOT NULL,
  `version` int(11) NOT NULL,
  `codigo_desarrollador` int(11) NOT NULL,
  `codigo_pais` int(11) DEFAULT NULL,
  `codigo_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aplicaciones`
--

INSERT INTO `tbl_aplicaciones` (`codigo_aplicacion`, `nombre`, `descripcion`, `fecha_actualizacion`, `fecha_publicacion`, `calificacion`, `url`, `tamanio_archivo`, `url_icono`, `version`, `codigo_desarrollador`, `codigo_pais`, `codigo_empresa`) VALUES
(14, 'Facebook', 'Alli pasa Ana y Levi todo el dia', '2012-12-12', '2012-12-12', 4, 'ada', 123, 'img/icono1.png', 2, 1, NULL, NULL),
(15, 'Youtube', 'Para ver videotutoriales de como hacer casitas de perritos', '2012-12-12', '2012-12-12', 2, '4sdfs', 12, 'img/icono2.png', 12, 2, NULL, NULL),
(16, 'Clash of Clans', 'Nunca lo he jugado', '2012-12-12', '2012-12-12', 2, '4sdfs', 12, 'img/icono3.png', 12, 2, NULL, NULL),
(17, 'Nueva aplicacion', 'Nueva aplicacion', '2017-04-14', '2017-04-14', 4, 'fdssdf', 234, 'img/icono4.png', 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `codigo_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`codigo_categoria`, `nombre_categoria`) VALUES
(1, 'Redes sociales'),
(2, 'Entretenimiento'),
(3, 'Juegos');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias_x_aplicacion`
--

CREATE TABLE `tbl_categorias_x_aplicacion` (
  `codigo_aplicacion` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desarrolladores`
--

CREATE TABLE `tbl_desarrolladores` (
  `codigo_desarrollador` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `correo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_desarrolladores`
--

INSERT INTO `tbl_desarrolladores` (`codigo_desarrollador`, `nombre`, `apellido`, `correo`) VALUES
(1, 'Juan', 'Perez', 'jperez@gmail.com'),
(2, 'Pedro', 'Martinez', 'pmartinez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empresas`
--

CREATE TABLE `tbl_empresas` (
  `codigo_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `pagina_web` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_empresas`
--

INSERT INTO `tbl_empresas` (`codigo_empresa`, `nombre_empresa`, `direccion`, `correo`, `pagina_web`) VALUES
(1, 'Google', 'Palo alto', 'dfg', 'dfgdfg'),
(2, 'Amazon', 'sfdsf', 'rter', 'jkl');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paises`
--

CREATE TABLE `tbl_paises` (
  `codigo_pais` int(11) NOT NULL,
  `nombre_pais` varchar(150) NOT NULL,
  `longitud` double DEFAULT NULL,
  `latitud` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_paises`
--

INSERT INTO `tbl_paises` (`codigo_pais`, `nombre_pais`, `longitud`, `latitud`) VALUES
(1, 'Honduras', 456, 789),
(2, 'Nicaragua', 123, 123),
(3, 'Costa Rica', 123, 123),
(4, 'Panama', 123, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aplicaciones`
--
ALTER TABLE `tbl_aplicaciones`
  ADD PRIMARY KEY (`codigo_aplicacion`),
  ADD KEY `fk_tbl_aplicaciones_tbl_desarrolladores_idx` (`codigo_desarrollador`),
  ADD KEY `fk_tbl_aplicaciones_tbl_paises1_idx` (`codigo_pais`),
  ADD KEY `fk_tbl_aplicaciones_tbl_empresas1_idx` (`codigo_empresa`);

--
-- Indexes for table `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Indexes for table `tbl_categorias_x_aplicacion`
--
ALTER TABLE `tbl_categorias_x_aplicacion`
  ADD PRIMARY KEY (`codigo_aplicacion`,`codigo_categoria`),
  ADD KEY `fk_tbl_aplicaciones_has_tbl_categorias_tbl_categorias1_idx` (`codigo_categoria`),
  ADD KEY `fk_tbl_aplicaciones_has_tbl_categorias_tbl_aplicaciones1_idx` (`codigo_aplicacion`);

--
-- Indexes for table `tbl_desarrolladores`
--
ALTER TABLE `tbl_desarrolladores`
  ADD PRIMARY KEY (`codigo_desarrollador`);

--
-- Indexes for table `tbl_empresas`
--
ALTER TABLE `tbl_empresas`
  ADD PRIMARY KEY (`codigo_empresa`);

--
-- Indexes for table `tbl_paises`
--
ALTER TABLE `tbl_paises`
  ADD PRIMARY KEY (`codigo_pais`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aplicaciones`
--
ALTER TABLE `tbl_aplicaciones`
  MODIFY `codigo_aplicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `codigo_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_desarrolladores`
--
ALTER TABLE `tbl_desarrolladores`
  MODIFY `codigo_desarrollador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_empresas`
--
ALTER TABLE `tbl_empresas`
  MODIFY `codigo_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_paises`
--
ALTER TABLE `tbl_paises`
  MODIFY `codigo_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_aplicaciones`
--
ALTER TABLE `tbl_aplicaciones`
  ADD CONSTRAINT `fk_tbl_aplicaciones_tbl_desarrolladores` FOREIGN KEY (`codigo_desarrollador`) REFERENCES `tbl_desarrolladores` (`codigo_desarrollador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_aplicaciones_tbl_empresas1` FOREIGN KEY (`codigo_empresa`) REFERENCES `tbl_empresas` (`codigo_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_aplicaciones_tbl_paises1` FOREIGN KEY (`codigo_pais`) REFERENCES `tbl_paises` (`codigo_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_categorias_x_aplicacion`
--
ALTER TABLE `tbl_categorias_x_aplicacion`
  ADD CONSTRAINT `fk_tbl_aplicaciones_has_tbl_categorias_tbl_aplicaciones1` FOREIGN KEY (`codigo_aplicacion`) REFERENCES `tbl_aplicaciones` (`codigo_aplicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_aplicaciones_has_tbl_categorias_tbl_categorias1` FOREIGN KEY (`codigo_categoria`) REFERENCES `tbl_categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
