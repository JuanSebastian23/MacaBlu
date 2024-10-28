-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 03:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre_C` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre_C`) VALUES
(1, 'Zapatilla deportiva'),
(2, 'Tacon Alto');

-- --------------------------------------------------------

--
-- Table structure for table `detallesventas`
--

CREATE TABLE `detallesventas` (
  `Id_Dventas` int(11) NOT NULL,
  `Id_Productos` int(11) NOT NULL,
  `Id_Ventas` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `Id_Productos` int(11) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Id_Proveedor` int(11) NOT NULL,
  `Nombre_p` varchar(255) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Existencia` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`Id_Productos`, `Id_Categoria`, `Id_Proveedor`, `Nombre_p`, `Precio`, `Existencia`, `imagen`, `Descripcion`) VALUES
(1, 1, 1, 'Tenis Nike', 254689, 3, NULL, 'Tenis Nike 24 Color Blanco con Verde '),
(2, 2, 2, 'Tacon ZARA', 360000, 0, 'images/671abc1e2248c.jpeg', 'Tacones Zara talla 38 Color Verde');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `Id_Proveedor` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`Id_Proveedor`, `Nombre`, `Telefono`) VALUES
(1, 'Nike', '325484662'),
(2, 'Zara', '3187589632');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id_Rol` int(10) NOT NULL,
  `Rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id_Rol`, `Rol`) VALUES
(1, 'Admin'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usarios`
--

CREATE TABLE `usarios` (
  `Id_Usuario` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passw` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Id_Rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usarios`
--

INSERT INTO `usarios` (`Id_Usuario`, `Email`, `Passw`, `Nombre`, `Telefono`, `Direccion`, `Id_Rol`) VALUES
(1, 'admin1@macablue.com', '2024macablue', 'BrandonB', '366522000', 'Cra 75 # 10 - 62', 1),
(4, 'kevin@macablue.com', '123456789', 'Kevin', '365895000', 'Calle 71 # 69 J 91 ', 3),
(6, 'Santiago@macablue.com', '7894561', 'Santiago', '317897000', 'Cra 12 # 20 - 41', 3),
(7, 'Vanesa@macablue.com', '78945612', 'Vanessa', '3219056464', 'Cra 87 # 21 - 63', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `Id_Ventas` int(11) NOT NULL,
  `Id_Usuario` int(255) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indexes for table `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD PRIMARY KEY (`Id_Dventas`),
  ADD KEY `Id_Productos(FK)` (`Id_Productos`),
  ADD KEY `Id_Ventas(FK)` (`Id_Ventas`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_Productos`),
  ADD KEY `Id_Categoria` (`Id_Categoria`),
  ADD KEY `Id_Proveedor` (`Id_Proveedor`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_Proveedor`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indexes for table `usarios`
--
ALTER TABLE `usarios`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `Id_Rol` (`Id_Rol`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_Ventas`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detallesventas`
--
ALTER TABLE `detallesventas`
  MODIFY `Id_Dventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_Productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Id_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usarios`
--
ALTER TABLE `usarios`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_Ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detallesventas`
--
ALTER TABLE `detallesventas`
  ADD CONSTRAINT `Id_Productos(FK)` FOREIGN KEY (`Id_Productos`) REFERENCES `productos` (`Id_Productos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Id_Ventas(FK)` FOREIGN KEY (`Id_Ventas`) REFERENCES `ventas` (`Id_Ventas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `Id_Categoria(FK)` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`),
  ADD CONSTRAINT `Id_Proveedor(FK)` FOREIGN KEY (`Id_Proveedor`) REFERENCES `proveedor` (`Id_Proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usarios`
--
ALTER TABLE `usarios`
  ADD CONSTRAINT `Id_Rol(FK)` FOREIGN KEY (`Id_Rol`) REFERENCES `roles` (`Id_Rol`) ON DELETE CASCADE;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `Id_Usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `usarios` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
