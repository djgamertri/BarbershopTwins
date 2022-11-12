create DATABASE BarberShopTwins;
USE BarberShopTwins;

CREATE TABLE roles (
    id tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(200) NOT NULL
);

CREATE TABLE usuario (
    id tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(200) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    imagen varchar(200),
    Estado INT Default 1,
    id_rol tinyint Default 3,
    FOREIGN KEY (id_rol)
        REFERENCES roles (id)
);

CREATE TABLE servicio (
    id tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_s VARCHAR(200) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    precio INT NOT NULL,
    Estado INT DEFAULT 1
);

CREATE TABLE reserva (
    id tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_user tinyint,
    FOREIGN KEY (id_user)
        REFERENCES usuario (id),
    id_servicio tinyint,
    FOREIGN KEY (id_servicio)
        REFERENCES servicio (id),
    auxiliar tinyint,
    FOREIGN KEY (auxiliar)
        REFERENCES usuario (id),
    Fecha DATE NOT NULL,
    Hora TIME NOT NULL,
    Fecha_r DATETIME NOT NULL,
    Estado INT DEFAULT 1
);

#procedimientos

# usuario --------------------------------------------------------------------------------------------------------------------------------------------------------------

# registrar usuario

create procedure Register(
in user VARCHAR(100),
in email VARCHAR(200),
in pass VARCHAR(100)
)
insert into usuario (nombre,correo,contraseña) values (user,email,pass);

# validacion login

create procedure Login(
in email VARCHAR(200),
in pass VARCHAR(100)
)
SELECT*FROM usuario WHERE correo=email and contraseña=pass and Estado = 1;

#consulta roles

create procedure ConsultaRol(
in email VARCHAR(200)
)
SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id where correo = email;

#cosulta Rol

create procedure ConsultaRoles()
select * from roles;

#consulta usuarios

create procedure ConsultaUsuarios()
SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE Estado = 1 order by u.id;

create procedure ConsultaEditar(
in id_user tinyint
)
SELECT u.id, u.nombre, u.correo, u.contraseña, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE Estado = 1 and u.id = id_user order by u.id;

#consulta un usuario

create procedure ConsultaUsuario(
in username VARCHAR(100),
in email VARCHAR(200)
)
select * from usuario where nombre = username or correo = email ;

create procedure ConsultarAuxiliares()
SELECT * FROM usuario where id_rol = 2 and Estado = 1;

# actualizar usuario

create procedure ActualizarUsuario(
in id_user tinyint,
in user VARCHAR(100),
in email VARCHAR(200),
in rol tinyint
)
UPDATE `usuario` SET `nombre` = user, `correo` = email, id_rol = rol WHERE id = id_user;

create procedure EditarUsuario(
in id_user tinyint,
in user VARCHAR(100),
in email VARCHAR(200),
in pass VARCHAR(100)
)
UPDATE `usuario` SET `nombre` = user, `correo` = email, contraseña = pass WHERE id = id_user;

# eliminar usuario

create procedure EliminarUsuario(
in id_user tinyint
)
UPDATE `usuario` SET `Estado`= 2 WHERE id = id_user;

# reserva -------------------------------------------------------------------------------------------------------------------------------------------------------

#registro reserva

create procedure RegistroReserva(
in id_user tinyint,
in id_service tinyint,
in aux tinyint,
in fecha_reserva date,
in hora_reserva time,
in registro_reserva datetime 
)
INSERT INTO reserva ( id_user, id_servicio, auxiliar, Fecha, Hora, Fecha_r) VALUES ( id_user , id_service, aux , fecha_reserva , hora_reserva, registro_reserva );

#consultar reserva

create procedure ConsultaReserva(
in dates date,
in aux tinyint
)
SELECT Hora  FROM reserva WHERE (Fecha between dates and dates) and auxiliar = aux;

create procedure ConsultaReservaU(
in id_user tinyint
)
SELECT r.id, u.nombre, s.nombre_s, r.Fecha, r.Hora FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 and u.id = id_user ORDER BY u.id ASC;

create procedure ConsultaReservas()
SELECT r.id, u.nombre, s.nombre_s, r.Fecha, r.Hora FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 ORDER BY u.id ASC;

create procedure ConsultaReservaID(
in id_reserva tinyint
)
SELECT r.id, u.nombre, s.nombre_s, r.Fecha, r.Hora FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 and r.id = id_reserva ORDER BY u.id ASC;

#Consulta auxiliar

create procedure ConsultaAuxiliar(
in id_user tinyint
)
SELECT u.nombre FROM reserva r INNER join usuario u on u.id = r.auxiliar WHERE r.Estado = 1 AND r.id = id_user ORDER BY u.nombre ASC;


#eliminar reserva 

create procedure EliminarReserva(
in id_reserva tinyint
)
UPDATE reserva SET Estado= 2 WHERE id = id_reserva;



# servicio ------------------------------------------------------------------------------------------------------------------------------------------------------------

#registrar servicio 

create procedure RegistarServicio(
in nombre varchar(200),
in descrip varchar(200),
in price int
)
insert into servicio (nombre_s,descripcion,precio) values (nombre,descrip,price);

#consulta servicios

create procedure ConsultaServicios()
select*from servicio where Estado = 1;

create procedure ConsultaServicio(
in id_reserva tinyint
)
select * from servicio where id = id_reserva;

#actualizar servicio

create procedure ActualizarServicio(
in id_reserva tinyint,
in nombre varchar(200),
in descrip varchar(200),
in price int
)
UPDATE `servicio` SET `nombre_s`= nombre,  `descripcion` = descrip, `precio` = price WHERE `servicio`.`id` = id_reserva;

#Inactivar servicio

create procedure EliminarServicio(
in id_reserva tinyint
)
UPDATE `servicio` SET `Estado`= 2 WHERE id = id_reserva;

#inserciones ----------------------------------------------------------------------------------------------------------------------------------------------------------

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'Usuario');

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `contraseña`, `imagen`, `Estado`, `id_rol`) VALUES
(1, 'Erick Rodriguez', 'dragonerick1@gmail.com', '182e8dc14f64f235e34cb242f326b784', NULL, 1, 1),
(2, 'Axl Rodriguez', 'Bluaxl102@gmail.com', '230d88a96f660bd68074372c07b48495', NULL, 1, 1),
(3, 'Laura Valentina', 'lauravalentina@gmail.com', 'c102b441e1238dcffecea3c6a223e16f', NULL, 1, 1),
(4, 'Andrey Camilo', 'Camilo@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 1),
(5, 'Baldion velazques', 'baldi@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 2, 3),
(6, 'lopez Ramirez', 'lopez@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(7, 'kevin Gomez', 'kevin@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(8, 'Peralta Muñoz', 'julian@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(9, 'Leal Banquet', 'Leal@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(10, 'Juan Rojas', 'Flaco@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(11, 'Carlos Alberto', 'Carlos@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(12, 'Alexander Martínez', 'Alex@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(13, 'Paulino Aguado', 'Paulino@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(14, 'Gemma Montes', 'Gemma@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(15, 'Victoria Diego', 'Victoria@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(16, 'Aroa Afonso', 'Aroa@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(17, 'Aroa Afonso', 'Camilo@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(18, 'Maria Lucia', 'Maria@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 1, 3),
(19, 'Maria Aranzazu', 'MariaAranza@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 2, 3),
(20, 'Maria Aranzazu', 'Camilo@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 2, 2),
(21, 'Lion Rodriguez', 'lion@gmail.com', '6e7bc035c10d6d628e9067ae9b034d41', NULL, 2, 3);

INSERT INTO `servicio` (`id`, `nombre_s`, `descripcion`, `precio`) VALUES
(1, 'Manicure', NULL, 10000),
(2, 'Pedicure', NULL, 10000),
(3, 'Tintura', NULL, 25000),
(4, 'Depilacion de Cejas', NULL, 5000),
(5, 'Depilacion de Bigote', NULL, 5000),
(6, 'Depilacion de Axilas', NULL, 7000),
(7, 'Cepillado matrimonial', NULL, 20000),
(8, 'Peinado para niñas', NULL, 10000),
(9, 'Trenzas Californianas', NULL, 10000),
(10, 'Maquillaje', NULL, 15000),
(11, 'Corte para dama', NULL, 15000),
(12, 'Corte para caballero', NULL, 10000),
(13, 'Masajes', NULL, 30000);


#consultas

SELECT Fecha, Hora FROM reserva where (Fecha between "2022-10-17" and "2022-10-17") and auxiliar = 12;
SELECT r.id, u.nombre, s.nombre_s, (SELECT u.nombre FROM reserva r INNER join usuario u on u.id = r.auxiliar WHERE r.Estado = 1 AND r.id = 14 ORDER BY u.nombre ASC), r.Fecha FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 AND u.id = 1 ORDER BY u.nombre ASC;
SELECT u.nombre FROM reserva r INNER join usuario u on u.id = r.auxiliar WHERE r.Estado = 1 AND r.id = 14 ORDER BY u.nombre ASC;
SELECT r.id, u.nombre, (SELECT u.nombre FROM reserva INNER join usuario on usuario.id = reserva.auxiliar WHERE reserva.Estado = 1 AND u.id = 1 and reserva.id = 20), s.nombre_s, r.Fecha FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 AND u.id = 1 ORDER BY u.nombre ASC;



/*
SELECT r.id, u.nombre, s.nombre_s, r.Fecha FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 AND u.id = 1 ORDER BY u.nombre ASC;
SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id;
SELECT u.id, u.nombre, u.correo, u.id_rol, r.rol FROM usuario u INNER JOIN roles r ON u.id_rol = r.id WHERE u.id = 1;
SELECT r.id, u.nombre, s.nombre_s, r.Fecha FROM reserva r INNER join usuario u INNER join servicio s on u.id = r.id_user and s.id = r.id_servicio WHERE r.Estado = 1 ORDER BY u.id ASC
*/