-- Base de datos inicial para Bienes Raices MVC
-- Proyecto redisenado por Nathan de Barros.
--
-- Admin inicial:
-- Email: admin@bienesraices.test
-- Password: admin123
--
-- Importar con:
-- mysql -u root -p < database/bienesraices.sql

CREATE DATABASE IF NOT EXISTS bienesraices_crud
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE bienesraices_crud;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS propiedades;
DROP TABLE IF EXISTS vendedores;
DROP TABLE IF EXISTS usuarios;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE vendedores (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60) NOT NULL,
  apellido VARCHAR(60) NOT NULL,
  telefono VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE propiedades (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(120) NOT NULL,
  precio DECIMAL(12,2) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL,
  habitaciones TINYINT UNSIGNED NOT NULL,
  wc TINYINT UNSIGNED NOT NULL,
  estacionamiento TINYINT UNSIGNED NOT NULL,
  creado DATE NOT NULL,
  vendedorId INT UNSIGNED NOT NULL,
  CONSTRAINT fk_propiedades_vendedores
    FOREIGN KEY (vendedorId)
    REFERENCES vendedores(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE usuarios (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(120) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO vendedores (id, nombre, apellido, telefono) VALUES
  (1, 'Nathan', 'de Barros', '099123456'),
  (2, 'Sofia', 'Martinez', '098456789'),
  (3, 'Mateo', 'Rodriguez', '097321654');

INSERT INTO propiedades
  (id, titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)
VALUES
  (
    1,
    'Casa moderna con jardin privado',
    285000.00,
    '505416adca7adb84e33c005bab96ca41.jpg',
    'Propiedad luminosa con ambientes amplios, jardin privado y una distribucion pensada para vivir con comodidad. Ideal para familias que buscan una casa moderna cerca de servicios y zonas verdes.',
    4,
    3,
    2,
    '2026-06-17',
    1
  ),
  (
    2,
    'Apartamento premium cerca de la costa',
    195000.00,
    '67f7983fd0e080ca7a4258c4b4ad6a3f.jpg',
    'Apartamento con excelente luz natural, terminaciones modernas y ubicacion estrategica cerca de la costa. Cuenta con espacios integrados, dormitorios comodos y acceso rapido a comercios.',
    3,
    2,
    1,
    '2026-06-17',
    2
  ),
  (
    3,
    'Residencia familiar en zona tranquila',
    340000.00,
    'afc880e622eeee0060f0b4a06873f9b9.jpg',
    'Residencia de gran presencia con espacios sociales generosos, dormitorios bien distribuidos y entorno tranquilo. Una opcion solida para quienes priorizan privacidad, comodidad y calidad.',
    5,
    4,
    3,
    '2026-06-17',
    3
  ),
  (
    4,
    'Casa luminosa con espacios integrados',
    225000.00,
    'bc38da85743cf456d6973524cbac4768.jpg',
    'Casa con diseno funcional, cocina integrada, estar amplio y buena conexion con el exterior. Una propiedad equilibrada para disfrutar el dia a dia con estilo y bajo mantenimiento.',
    3,
    2,
    2,
    '2026-06-17',
    1
  );

INSERT INTO usuarios (id, email, password) VALUES
  (1, 'admin@bienesraices.test', '$2y$10$UfCAf/q0TeoT2dNfAO.pHeDkEV6bdKGIxj3lMH74odvB6dvYDChvu');
