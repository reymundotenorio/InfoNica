<?php 



session_start();


if (empty($_SESSION["ID_Usuario"]) ){
   header('Location:index.php');
   exit;    
    }


$ID_Comentario = $_POST["ID_RComentario_Foto"];
$Ruta = $_POST["Ruta"];

    
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;


$results = mysqli_query($con,"UPDATE Respuesta_Comentario_Foto SET Estado_Respuesta_Comentario_Foto = 'Inactivo' Where (ID_Respuesta_Comentario_Foto = '$ID_Comentario')");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){

  echo "<script type=\"text/javascript\">
          // alert('Comentario eliminado correctamente');
           window.location='$Ruta';
          </script>";

}
else{

echo "<script type=\"text/javascript\">
           alert('No se pudo eliminar el comentario');
           history.go(-1);
          </script>";     
}

mysqli_close($con);



 ?>