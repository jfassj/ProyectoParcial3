<?php
//Clase que se utilizara para crear el modelo que interactua con la base de datos

class Users extends Conectar
{
    //funcion para traer todas las categorias 
    public function getUsers()
    {
        //llamar la cadena de conexion de la BD
        $conectar = parent::conexion();
        //String a ejecutar
        $sql = "select * from usuarios";
        //Se prepara la conexion
        $sql = $conectar->prepare($sql);
        //Ejecutar la conexion
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para traer un registro en particular
    public function getUser($id)
    {
        $conectar = parent::conexion();
        $sql = "select * from usuarios where id = ?";
        $sql = $conectar->prepare($sql);
        // para indicar en el string el parametro que utilizara 
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function postUser($id,$nombre,$apellidos, $email, $genero)
    {
        $conectar = parent::Conexion();
        $sql = "insert into usuarios values (?,?,?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $apellidos);
        $sql ->bindValue(4, $email);
        $sql ->bindValue(5, $genero);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function putUser($nombre,$apellidos, $email, $genero, $id)
    {
        $conectar = parent::Conexion();
        $sql = "update usuarios set nombre = ?, apellidos =?, email = ?, genero = ?  where id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql ->bindValue(2, $apellidos);
        $sql->bindValue(3, $email);
        $sql ->bindValue(4, $genero);
        $sql ->bindValue(5, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteUser($id)
    {
        $conectar = parent::Conexion();
        $sql = "delete from usuarios where id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}