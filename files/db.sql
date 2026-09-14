-- 1) creacion de DB 
CREATE DATABASE  IF NOT EXISTS crud_pdo
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
-- 2) usar la DB
USE crud_pdo;

-- 3) crear una tabla 
CREATE TABLE IF NOT EXISTS alumnos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    email VARCHAR (120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

