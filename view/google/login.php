<?php

session_start();

if (isset($_SESSION))
{
	session_destroy();
}



if ($_SERVER["REQUEST_METHOD"]=="POST")
{
   $email=$_POST['email'];
   $ps=$_POST['psw'];

   include_once('../conexion.php');

   $consulta="select email, psw from usuarios where email='$email' and psw='$ps'";

   $resultado=mysqli_query($con,$consulta);
	
   if (mysqli_num_rows($resultado)>0)
   {
	   if ($fila=mysqli_fetch_assoc($resultado))
	   {
		   

		   session_start();
		   $_SESSION['email']=$email;
		   $_SESSION['psw']=$ps;
		   

		     echo "<script>
		         alert('-Bienvenido-');
		         location.href='../AdminQuejas.php';
		      </script>";

	   }
   }
   else
   {
	   echo "Usuario y contraseña incorrectas por favor verifique ...";
	  echo "<script>
	          alert('Usuario y contraseña incorrectas por favor verifique ...');
	          location.href='login.php';
	        </script>";
   }

}




    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();

    

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
	
	</div>
	<div class="form-container sign-in-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<h1>Iniciar sesion</h1>
			<span>Ingrese las credenciales de acceso </span>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="psw" placeholder="Contraseña" />
			<a href="#">Olvide mi contraseña</a>
			<button>Iniciar</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Inicia con Google!</h1>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Inicia con Google!</h1>
				<p>Utilice su cuenta de Google para iniciar sesion</p>
                <button onclick="window.location = '<?php echo $loginURL ?>';"  id="signUp" class="ghost">Google</button>
			</div>
		</div>
	</div>
</div>

<a href="../index.php">Regresar</a>
            </div>
        </div>
    </div>
</body>
<script src="accion.js"></script>
</html>