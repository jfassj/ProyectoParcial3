<?php
   session_start();

   if (!isset($_SESSION['email'])){
       header("location:google/login.php");
   }
   else{
    $email=$_SESSION['email'];
   }

?>