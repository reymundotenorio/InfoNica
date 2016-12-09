<?php 

session_start();

header ('Content-type: text/html; charset=utf-8; lang="es"');

if (empty($_SESSION["ID_Usuario"]) ){
 header('Location:index.php');
 exit;    
}


$ID_Usuario = $_POST["ID_Usuario"];



include_once("conectar.php");
$conexion = new Conexion();
$conexion->Conectarmysql();
$con = $conexion->Conectar;


$results = mysqli_query($con,"UPDATE Usuario SET Estado_Usuario = 'Inactivo' Where (ID_Usuario = '$ID_Usuario')");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){


if (!empty($_SESSION["Usuario"]) ){

 unset($_SESSION["Usuario"]); 
 unset($_SESSION["Usuario_Name"]); 
 unset($_SESSION["ID_Usuario"]); 
 unset($_SESSION["Expire"]);
 
 if(!empty($_SESSION["Rol"])){
unset($_SESSION["Rol"]);
}

session_destroy();

echo "<script type=\"text/javascript\">
// alert('Usuario desactivado');
window.location='index.php?session=finished';
</script>";
}
}

else{
  echo "<script type=\"text/javascript\">
  alert('No se pudo desactivar al usuario');
  history.go(-1);
</script>";     
}

mysqli_close($con);



?>