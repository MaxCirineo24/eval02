CREATE DATABASE Eval02

USE Eval02

CREATE TABLE Producto(Producto_id INT PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR (80),
Descripcion VARCHAR (250),
Stock INT NOT NULL,
PrecioVenta DECIMAL(8,2));

INSERT INTO Producto(Nombre,Descripcion,Stock,PrecioVenta)

VALUES ('BWM X6' ,'Modelo de BMW', 2, 357.964);

SELECT * FROM Producto
