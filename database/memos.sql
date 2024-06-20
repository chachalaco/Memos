-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 10:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memos`
--

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `idNota` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaAgendada` date NOT NULL,
  `Color` varchar(7) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`idNota`, `Descripcion`, `fechaCreacion`, `fechaAgendada`, `Color`, `idUsuario`, `imagen`) VALUES
(11, 'Hacer la tarea.', '2023-05-20 18:35:46', '2023-05-11', '#3c41bd', 2, NULL),
(15, 'Graduacion', '2024-06-20 02:30:02', '2024-06-27', '#3c41bd', 10, 'http://localhost:81/trabajocolaborativo/memos%20con%20funciones/Memos-main/img/graduacion.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `correo`, `contrasena`) VALUES
(2, 'Sergio', 'pru@gmail.com', '$2y$10$N85NQvjPU/vP88xnrwlLSe1uaqy0BImHMU.P0wKTlZRNKyzoe2vx.'),
(4, 'test', 'test@gmail.com', '$2y$10$p9JUCjknilGPzubz0WbwleC0CO/rWHeLWZ5.qWlj451hkSeYXF4p2'),
(6, 'test', 'test3@gmail.com', '$2y$10$JPJjUsjNY3ZOw860.jquTOnblJ91MhcuebadvFKO2vXqlWVxCXeSO'),
(8, 'artt', 'secondtest@gmail.com', '$2y$10$HnbL1rDPNTLluLHDC2E2TOdmqPAtMeV9FQ28iDxBE8CfnUQZWCNjC'),
(9, 'testt', 'test5@gmail.com', '$2y$10$Ntte7Ncl.NQHeOmM0I83LeuURPeZ0DCsn5fbd6TTagKvZsIQvE6/i'),
(10, 'testtt', 'test6@gmail.com', '$2y$10$JCCjCHAXeMoYTXov2wQzJeDqMUtnN1Niki2QzMmiXHDxu3HfVuZJS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idNota`,`idUsuario`),
  ADD KEY `fk_Nota_Usuario_idx` (`idUsuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_Nota_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
