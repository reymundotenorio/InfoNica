<?php


header ('Content-type: text/html; charset=utf-8; lang="es"');
date_default_timezone_set("America/Managua");

$time = 900; //15 mins en segundos= 900

session_start();

// verificamos si existe la sesión 
// el nombre es como ejemplo 

if( (!empty($_SESSION["Expire"])) ){
if( (!empty($_SESSION["Usuario"])) )
{ 
      // verificamos si existe la sesión que se encarga del tiempo 
      // si existe, y el tiempo es mayor que una hora, expiramos la sesión  
      if(isset($_SESSION["Expire"]) && time() > $_SESSION["Expire"] + $time) 
      { 

        
    if (empty($_SESSION["Usuario"]) ){
  echo"<script type=\"text/javascript\">
   window.location='index.php';
  //location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php');
    }

if (!empty($_SESSION["Usuario"]) ){


 unset($_SESSION["Usuario"]); 
 unset($_SESSION["ID_Usuario"]); 
 unset($_SESSION["Expire"]);
 
 if(!empty($_SESSION["Rol"])){
  unset($_SESSION["Rol"]);
 }

//$Salida = date('Y-m-d h:i:s');


  session_destroy();

  echo"<script type=\"text/javascript\">
 // alert('Su sesión ha expirado'); 
   window.location='index.php?session=expire';
 // location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php');
  exit;

           
      } 
  }
      // si no existe la creamos 
      else 
      { 
        // echo "<script languaje='javascript'>alert('Sigue')</script>";
           $_SESSION["Expire"] = time(); 
           
         
       } 

}
}

?>
