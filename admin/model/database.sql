CREATE DATABASE IF NOT EXISTS MacaBlue;

USE MacaBlue;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('Admin', 'Empleado', 'Cliente') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `password`, `rol`, `created_at`) VALUES
(1, 'Juan', 'Quinto', 'juan@gmail.com', 'Juanse123', 'Admin', '2024-10-29 23:36:49'),
(2, 'Brandon', 'Bernal', 'brandon@gamil.com', 'brandon123', 'Empleado', '2024-10-29 23:53:40');