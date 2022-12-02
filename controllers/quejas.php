<?php

//Define al php que vamos a utilizar objetos JSON
header('Content-Type: application/json');
//Es el archivo del controlador que utilizara para 
//acceder al modelo a traves de un endpoint y traer los datos en JSON
require_once("../config/conection.php");
require_once("../models/Quejas.php");

//Crear un objeto para utilizar la categoria del models
$queja = new Quejas();

//decodifique los parametros que enviamos y los acepte en tipo JSON
$body = json_decode(file_get_contents("php://input"), true);

//Crear los servicios a utilizar en los endpoint

switch ($_GET["op"]) {
        //Case para traer todos los registros de la tabla categorias
    case "selectall":
        $datos = $queja->getQuejas();
        echo json_encode($datos);
        break;
        //Case para obtener un registro en particular
    case "selectid":
        $datos = $queja->getQueja($body["id_queja"]);
        echo json_encode($datos);
        break;
    case "insert":
        $datos = $queja->postQueja($body["nombre"], $body["email"], $body['telefono'], $body['queja']);
        echo json_encode("Registro insertado con exito");
        break;
    case "update":
        $datos = $queja->putQueja($body["queja"], $body["tel"], $body["id_queja"]);
        echo json_encode("Registro actualizado con exito");
        break;
    case "delete":
        $datos = $queja->deleteQueja($body["id"]);
        echo json_encode("Registro eliminado con exito");
        break;
}