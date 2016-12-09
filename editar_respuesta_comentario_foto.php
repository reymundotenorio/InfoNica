<?php 

session_start();

if (empty($_SESSION["ID_Usuario"]) ){
   header('Location:index.php');
   exit;    
    }

$ID_RComentario_Foto = $_POST["ID_RComentario_Foto"];
$Comentario = $_POST["Comentario"];
$Ruta = $_POST["Ruta"];
    
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;


$results = mysqli_query($con,"UPDATE Respuesta_Comentario_Foto SET Respuesta_Comentario_Foto = '$Comentario' 
    WHERE ID_Respuesta_Comentario_Foto = '$ID_RComentario_Foto'");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){

  echo "<script type=\"text/javascript\">
       //    alert('Comentario modificado correctamente');
           window.location='$Ruta';
          </script>";

}
else{

echo "<script type=\"text/javascript\">
           alert('No se pudo modificar el comentario');
           history.go(-1);
          </script>";     
}

mysqli_close($con);



 ?>