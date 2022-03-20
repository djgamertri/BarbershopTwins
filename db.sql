create DATABASE BarberShopTwins;
USE BarberShopTwins;

CREATE TABLE roles (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(200) NOT NULL
);

CREATE TABLE usuario (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(200) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    Estado INT Default 1,
    id_rol INT Default 3,
    FOREIGN KEY (id_rol)
        REFERENCES roles (id)
);

CREATE PROCEDURE register (
IN username VARCHAR(100), 
IN email VARCHAR(200), 
IN password VARCHAR(100)
)

insert into usuario (nombre, correo, contraseña) values (username, email, password);

INSERT INTO roles (id, rol) VALUES ('1', 'Administrador'), ('2', 'Colaborador'), ('3', 'Usuario');
INSERT INTO usuario (nombre, correo, contraseña, id_rol) VALUES ('Erick Rodriguez', 'dragonerick1@gmail.com', 'Codigo34', '1'), ('Axl Rodriguez', 'Bluaxl102@gmail.com', 'Creador34', '2');

select u.id, u.nombre, u.correo, u.id_rol, r.rol from usuario u inner join roles r on u.id_rol = r.id;

select u.id, u.nombre, u.correo, u.id_rol, r.rol from usuario u inner join roles r on u.id_rol = r.id WHERE u.id = 4;

