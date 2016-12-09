<?php 

function cantidad_comentarios_video($ID_Video,$Seccion){

    
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;


$resultado = mysqli_query($con,"SELECT ID_Seccion FROM Seccion WHERE (Nombre_Seccion = '$Seccion')");
$rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

$ID_Seccion = $rows["ID_Seccion"];

$results = mysqli_query($con,"SELECT count(ID_Comentario_Video) as 'Cantidad_Comentarios' FROM Comentario_Video WHERE ((ID_Video = '$ID_Video') and (Estado_Comentario_Video = 'Activo'))");

$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

$Cantidad_Comentarios = $consult["Cantidad_Comentarios"];

if(!empty($Cantidad_Comentarios)){

    if($Cantidad_Comentarios < 1){
      echo "<h5>SIN COMENTARIOS</h5> \n";
    }
    if($Cantidad_Comentarios == 1){
      echo "<h5>".$Cantidad_Comentarios." COMENTARIO</h5> \n";
    }
    else{
      echo "<h5>".$Cantidad_Comentarios." COMENTARIOS</h5> \n";
    }
}
else{
     echo "<h5>SIN COMENTARIOS</h5> \n";
}

mysqli_close($con);

}

 ?>