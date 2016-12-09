<?php 

session_start();

if (empty($_SESSION["ID_Usuario"]) ){
   header('Location:index.php');
   exit;    
    }

$ID_Video = $_POST["ID_Video"];
$Seccion = $_POST["Seccion"];
$ID_Usuario = $_SESSION["ID_Usuario"];
$Comentario = $_POST["Comentario"];
$Ruta = $_POST["Ruta"];
    
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;


$resultado = mysqli_query($con,"SELECT ID_Seccion FROM Seccion WHERE (Nombre_Seccion = '$Seccion')");
$rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

$ID_Seccion = $rows["ID_Seccion"];



$results = mysqli_query($con,"INSERT INTO Comentario_Video (ID_Video, ID_Usuario, Comentario_Video, Estado_Comentario_Video)
  VALUES ('$ID_Video', '$ID_Usuario', '$Comentario', 'Activo')");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){
  $Ruta.='&save=success';
  echo "<script type=\"text/javascript\">

        //   alert('Comentario guardado correctamente');
           window.location='$Ruta';
          </script>";

}
else{
$Ruta.='&save=error';
echo "<script type=\"text/javascript\">

         //  alert('No se pudo guardar el comentario');
           window.location='$Ruta';
          // history.go(-1);
          </script>";     
}

mysqli_close($con);



 ?>