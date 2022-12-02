<?php

	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

  if (isset($_SESSION['access_token']))
{
   $email=$_SESSION['email'];

   include_once('../conexion.php');

   $consulta="select email, psw from usuarios where email='$email'";

   $resultado=mysqli_query($con,$consulta);
	
   if (mysqli_num_rows($resultado)>0)
   {
	   if ($fila=mysqli_fetch_assoc($resultado))
	   {
		    

		     echo "<script>
		         alert('-Bienvenido-');
		         location.href='index.php';
		      </script>";

	   }
   }
   else
   {
	  echo "<script>
	          alert('El correo electronico no existe en el sistema');
	          location.href='login.php';
	        </script>";
   }

}


 
	
	
?>