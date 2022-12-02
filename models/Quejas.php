<?php
//Clase que se utilizara para crear el modelo que interactua con la base de datos

class Quejas extends Conectar
{
    //funcion para traer todas las categorias 
    public function getQuejas()
    {
        //llamar la cadena de conexion de la BD
        $conectar = parent::conexion();
        //String a ejecutar
        $sql = "select * from quejas";
        //Se prepara la conexion
        $sql = $conectar->prepare($sql);
        //Ejecutar la conexion
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion para traer un registro en particular
    public function getQueja($id)
    {
        $conectar = parent::conexion();
        $sql = "select * from quejas where id_queja = ?";
        $sql = $conectar->prepare($sql);
        // para indicar en el string el parametro que utilizara 
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function postQueja($nombre,$email,$telefono, $queja)
    {
        $conectar = parent::Conexion();
        $sql = "insert into quejas values (null,?,?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $telefono);
        $sql->bindValue(4, $queja);


        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function putQueja($queja, $tel)
    {
        $conectar = parent::Conexion();
        $sql = "update quejas set queja = ?, tel =? where id_queja=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $queja);
        $sql->bindValue(2, $tel);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteQueja($cat_id)
    {
        $conectar = parent::Conexion();
        $sql = "delete from queja where id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
