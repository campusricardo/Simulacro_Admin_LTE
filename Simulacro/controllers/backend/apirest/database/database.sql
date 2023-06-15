CREATE DATABASE alquilartemis;

USE alquilartemis;

CREATE TABLE users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    username VARCHAR(60) NOT NULL,
    password VARCHAR(60) NOT NULL,
    FOREIGN KEY(id_empleado) REFERENCES empleados(id_empleado)
);

DROP TABLE users;

CREATE TABLE empleados (
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    nombre_empleado VARCHAR (60) NOT NULL,
    telefono_empleado INT NOT NULL
);
DROP TABLE empleados;
CREATE TABLE constructoras(
    id_constructora INT PRIMARY KEY AUTO_INCREMENT,
    nombre_constructora VARCHAR(60),
    telefono_constructora INT NOT NULL
);
CREATE TABLE cotizaciones (
    id_cotizacion INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    id_constructora INT NOT NULL,
    id_producto INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    duracion INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY(id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY(id_constructora) REFERENCES constructoras(id_constructora),
    FOREIGN KEY(id_producto) REFERENCES productos(id_producto)
);


CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(100) NOT NULL,
    precio_dia INT NOT NULL
);




DROP TABLE cotizaciones;
DROP TABLE productos;
