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
    imagen varchar(200),
    Estado INT Default 1,
    id_rol INT Default 3,
    FOREIGN KEY (id_rol)
        REFERENCES roles (id)
);

CREATE TABLE servicio (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_s VARCHAR(200) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    precio INT NOT NULL
);

CREATE TABLE reserva (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    FOREIGN KEY (id_user)
        REFERENCES usuario (id),
    id_servicio INT,
    FOREIGN KEY (id_servicio)
        REFERENCES servicio (id),
	Fecha datetime not null,
	Estado INT Default 1
);

CREATE PROCEDURE register (
IN username VARCHAR(100), 
IN email VARCHAR(200), 
IN password VARCHAR(100)
)

insert into usuario (nombre, correo, contraseña) values (username, email, password);
INSERT INTO roles (rol) VALUES ('Administrador'), ('Colaborador'), ('Usuario');
INSERT INTO usuario (nombre, correo, contraseña, id_rol) VALUES ('Erick Rodriguez', 'dragonerick1@gmail.com', 'Codigo34', '1'), ('Axl Rodriguez', 'Bluaxl102@gmail.com', 'Creador34', '2'), ('Laura Valentina', 'lauravalentina@gmail.com', 'Teamo :3', '1');

SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id;
SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id = 4;
SELECT r.id, u.nombre, s.nombre_s, r.Fecha FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 ORDER BY u.id ASC