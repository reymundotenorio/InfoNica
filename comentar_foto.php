<?php 

session_start();

if (empty($_SESSION["ID_Usuario"]) ){
   header('Location:index.php');
   exit;    
    }

  // echo("<script src=\"javascripts/sweetalert-dev.js\"></script>");
  // echo("<link rel=\"stylesheet\" href=\"stylesheets/sweetalert.css\">)");

$Nombre_Foto = $_POST["Nombre_Foto"];
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

$result = mysqli_query($con,"SELECT ID_Foto FROM Foto WHERE ((Nombre_Foto = '$Nombre_Foto') and (ID_Seccion = '$ID_Seccion'))");

$row = mysqli_fetch_array($result,MYSQLI_BOTH);

$ID_Foto = $row["ID_Foto"];


$results = mysqli_query($con,"INSERT INTO Comentario_Foto (ID_Foto, ID_Usuario, Comentario_Foto, Estado_Comentario_Foto)
  VALUES ('$ID_Foto', '$ID_Usuario', '$Comentario', 'Activo')");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

if($results){

     
      /*     
     swal({
    title: \"Perfecto!\",
    text: \"Comentario guardado correctamente!\",
    type: \"success\",
    closeOnConfirm: false
  },
  function(){
        window.location='$Ruta';
  });*/



$Ruta.='&save=success';

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