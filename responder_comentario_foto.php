<?php 

session_start();

if (empty($_SESSION["ID_Usuario"]) ){
   header('Location:index.php');
   exit;    
    }

  // echo("<script src=\"javascripts/sweetalert-dev.js\"></script>");
  // echo("<link rel=\"stylesheet\" href=\"stylesheets/sweetalert.css\">)");

$ID_Comentario = $_POST["ID_Comentario_Foto"];
$ID_Usuario = $_SESSION["ID_Usuario"];
$Comentario = $_POST["Comentario"];
$Ruta = $_POST["Ruta"];
    
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;



$results = mysqli_query($con,"INSERT INTO Respuesta_Comentario_Foto (ID_Comentario_Foto, ID_Usuario, Respuesta_Comentario_Foto, Estado_Respuesta_Comentario_Foto)
  VALUES ('$ID_Comentario', '$ID_Usuario', '$Comentario', 'Activo')");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){

//$Ruta.='&save=success';     
echo "<script type=\"text/javascript\">

 //alert('Comentario guardado correctamente');
  window.location='$Ruta';

          </script>";

}
else{


$Ruta.='&save=error';
echo "<script type=\"text/javascript\">

//alert('No se pudo guardar el comentario');
window.location='$Ruta';
//history.go(-1);
</script>";     
}

mysqli_close($con);



 ?>