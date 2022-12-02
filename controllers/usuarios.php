<?php 
header('Content-Type: application/json');
//Es el archivo del controlador que utilizara para 
//acceder al modelo a traves de un endpoint y traer los datos en JSON
require_once("../config/conection.php");
require_once("../models/Usuarios.php");
$user = new Users();

//decodifique los parametros que enviamos y los acepte en tipo JSON
$body = json_decode(file_get_contents("php://input"), true);

//Crear los servicios a utilizar en los endpoint

switch ($_GET["op"]) {
        //Case para traer todos los registros de la tabla categorias
    case "selectall":
        $datos = $user->getUsers();
        echo json_encode($datos);
        break;
        //Case para obtener un registro en particular
    case "selectid":
        $datos = $user->getUser($body["id_queja"]);
        echo json_encode($datos);
        break;
    case "insert":
        $datos = $user->postUser($body["id"],$body["nombre"], $body["apellidos"], $body['email'], $body['genero']);
        echo json_encode("Registro insertado con exito");
        break;
    case "update":
        $datos = $user->putUser($body["nombre"], $body["apellidos"], $body["email"], $body["genero"], $body["id"]);
        echo json_encode("Registro actualizado con exito");
        break;
    case "delete":
        $datos = $user->deleteUser($body["id"]);
        echo json_encode("Registro eliminado con exito");
        break;
}
?>