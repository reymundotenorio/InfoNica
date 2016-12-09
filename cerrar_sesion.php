<?php

//date_default_timezone_set("America/Managua");

 header ('Content-type: text/html; charset=utf-8; lang="es"');
 session_start();

	//comprobar la existencia del usuario
	if (empty($_SESSION["Usuario"]) ){
  echo"<script type=\"text/javascript\">
   window.location='index.php';
 // location.href = 'index.php'; 
  </script>"; 
//  header('Location:index.php');
    }

if (!empty($_SESSION["Usuario"]) ){

 

 unset($_SESSION["Usuario"]); 
  unset($_SESSION["Usuario_Name"]); 
 unset($_SESSION["ID_Usuario"]); 
 unset($_SESSION["Expire"]);
 
 if(!empty($_SESSION["Rol"])){
  unset($_SESSION["Rol"]);
 }

//$Salida = date('Y-m-d h:i:s');



session_destroy();

  echo"<script type=\"text/javascript\">
  //alert('Ha cerrado sesión correctamente'); 
   window.location='index.php?session=exit';
 // location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php');
  
 exit;


}
?>
