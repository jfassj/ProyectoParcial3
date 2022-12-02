<?php 


$id = array("id_queja" => $_GET["id"]);
$endpoint = "http://localhost/proyectoparcial2/api/controllers/quejas.php?op=selectid";
$ch = curl_init($endpoint);
$payload = json_encode($id);
//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
$datos = curl_exec($ch);
//close cURL resource
curl_close($ch);

$datos = json_decode($datos, true);
for ($i = 0; $i < count($datos); $i++) {
  $id = $datos[$i]["id_queja"];
  $nombre = $datos[$i]["nombre"];
  $email = $datos[$i]["email"];
  $telefono = $datos[$i]["telefono"];
  $queja = $datos[$i]["queja"];


}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Twilio</title>
	<link rel="stylesheet" href="estilos.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->

<div class="container contact">
	
		<div class="col-md-9">
			<h1>Envia un mensaje</h1>
		<form action="send.php" method="POST">
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">Nombre:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Ingrese su nombre" name="fname" value= "<?php echo $nombre ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Email:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="lname" placeholder="Ingrese su apellido" name="lname" value= "<?php echo $email ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="number">Telefono:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="number" placeholder="Ex. +521234567896" name="number" value= "<?php echo $telefono ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="message">Mensaje:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" name="message" id="message"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="submit" class="btn btn-default">Enviar</button>
				  </div>
				</div>
			</div>
        </form>
		<?php
		if(isset($_GET['sent'])) {
			echo "<script>
			alert('Mensaje enviado');
		</script>";
		}
	?>
		</div>
	</div>
</div>	
</body>
</html>