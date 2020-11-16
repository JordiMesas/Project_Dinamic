CREATE DATABASE torneo_pingpong;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 09:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torneo_pingpong`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre_categoria`) VALUES
(2, 'Adultas'),
(4, 'jovenes-hombres');

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_dorsal` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`id_dorsal`, `id_comp`, `id_part`, `pagado`, `id_cat`) VALUES
(2, 2, 3, 1, 2),
(4, 4, 7, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_competicion`
--

CREATE TABLE `tbl_competicion` (
  `id_comp` int(11) NOT NULL,
  `fecha_comp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_competicion`
--

INSERT INTO `tbl_competicion` (`id_comp`, `fecha_comp`) VALUES
(2, '2020-11-13'),
(4, '2020-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participantes`
--

CREATE TABLE `tbl_participantes` (
  `id_part` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `primer_apellido` varchar(255) NOT NULL,
  `segundo_apellido` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_participantes`
--

INSERT INTO `tbl_participantes` (`id_part`, `nombre`, `primer_apellido`, `segundo_apellido`, `dni`, `fecha_nacimiento`, `genero`, `email`) VALUES
(3, 'Montse', 'del Rio', 'Vizcaya', '38421614E', '1960-07-07', 'femenino', 'montse60@hotmail.com'),
(7, 'Jordi', 'Mesas', 'del Rio', '47716279L', '1990-03-04', 'masculino', 'jordi_mr90@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_dorsal`),
  ADD KEY `foreign_key_id_comp` (`id_comp`),
  ADD KEY `foreign_key_id_part` (`id_part`),
  ADD KEY `foreign_key_id_cat` (`id_cat`);

--
-- Indexes for table `tbl_competicion`
--
ALTER TABLE `tbl_competicion`
  ADD PRIMARY KEY (`id_comp`);

--
-- Indexes for table `tbl_participantes`
--
ALTER TABLE `tbl_participantes`
  ADD PRIMARY KEY (`id_part`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_dorsal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_competicion`
--
ALTER TABLE `tbl_competicion`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_participantes`
--
ALTER TABLE `tbl_participantes`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `foreign_key_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `foreign_key_id_comp` FOREIGN KEY (`id_comp`) REFERENCES `tbl_competicion` (`id_comp`),
  ADD CONSTRAINT `foreign_key_id_part` FOREIGN KEY (`id_part`) REFERENCES `tbl_participantes` (`id_part`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
