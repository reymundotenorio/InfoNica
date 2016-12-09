<?php 

session_start();

header ('Content-type: text/html; charset=utf-8; lang="es"');

if (empty($_SESSION["ID_Usuario"]) ){
 header('Location:index.php');
 exit;    
}


$ID_Usuario = $_POST["ID_Usuario"];
$Nombre = $_POST["user-name"];
$Apellido = $_POST["user-lastname"];


include_once("conectar.php");
$conexion = new Conexion();
$conexion->Conectarmysql();
$con = $conexion->Conectar;


$results = mysqli_query($con,"UPDATE Usuario SET Nombre_Usuario = '$Nombre', Apellido_Usuario = '$Apellido' Where (ID_Usuario = '$ID_Usuario')");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){


$_SESSION["Usuario"]=$Nombre;
$_SESSION["Usuario_Name"]=$Nombre." ". $Apellido;

echo "<script type=\"text/javascript\">
// alert('Usuario desactivado');
window.location='datos_usuario.php?data=data_success';
</script>";
}


else{
  echo "<script type=\"text/javascript\">
//alert('No se pudo desactivar al usuario');
window.location='datos_usuario.php?data=data_error';
</script>";     
}

mysqli_close($con);



?>