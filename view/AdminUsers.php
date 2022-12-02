<?php
include_once("sesiones.php");
//Crear la vista para mostrar en pantalla todos los registros de la tabla categoria.


//consumir el API_RESTFUL 

$endpoint = "http://localhost/proyectoparcial2/api/controllers/usuarios.php?op=selectall";
//Convertir el json a un objeto de tipo array asociativo 
$datos = json_decode(file_get_contents($endpoint), true);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/api_restful/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Administrar usuarios</title>
   
</head>
<style>
    body{
        background: #CB9FB0;
    }
</style>
<script src="http://localhost/api_restful/assets/js/bootstrap.min.js"></script>
<body>
    <div class="container">
        <h1 class="text-center">Usuarios</h1>
       <table id= "tblCategorias" class="table table-dark table-striped">
  <thead>
    <tr>
            <th scope="col">Id usuario</th>
            <th scope="col">nombre</th>
            <th scope="col">apellidos</th>
            <th scope="col">email</th>
            <th scope="col">genero</th>

            <th colspan="2" class="text-center">Acciones</th>
    </tr>
  </thead>
            <tbody>
        <tr>
             <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        echo "<tr>";
                        echo "<td>" . $datos[$i]["id"] . "</td>";
                        echo "<td>" . $datos[$i]["nombre"] . "</td>";
                        echo "<td>" . $datos[$i]["apellidos"] . "</td>";
                        echo "<td>" . $datos[$i]["email"] . "</td>";
                        echo "<td>" . $datos[$i]["genero"] . "</td>";
                        echo "<td><a href='Resolverqueja.php?id=".$datos[$i]["id"]."'><i class='fa-solid fa-pen'></i></a></td>";
                        echo "<td><a href='EliminarQueja.php?id=". $datos[$i]["id"]."'><i class='fa-solid fa-trash'></i></a></td>";
                        echo "</tr>";
   
                    } ?>
                    
    </tr>
    </tbody>
        <tfoot> 
           
            
            <tr class="text-center">        <td colspan="4"><a href="AdminQuejas.php" type="button" class="btn btn-outline-primary ">Ir a quejas</a></td>
                   <td colspan="3"><a href="google/login.php" type="button" class="btn btn-outline-primary ">Cerrar sesion</a></td>
                   </tr>
</tfoot>
</table>
    </div>
</body>
</html>