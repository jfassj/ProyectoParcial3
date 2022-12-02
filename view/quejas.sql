CREATE DATABASE quejas;
use quejas;

CREATE TABLE clientes(
    id varchar (100) PRIMARY KEY,
    nombre varchar (50),
    apellidos varchar (50),
    correo varchar (50),
    genero VARCHAR (50)
    );

CREATE TABLE quejas(
 id_queja int (10) PRIMARY KEY,
 queja varchar (100), 
 telefono varchar (10),
 id_cliente varchar (100),
 FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);


ALTER TABLE "quejas" CHANGE "id_queja" "id_queja" INT(10) NOT NULL AUTO_INCREMENT;
