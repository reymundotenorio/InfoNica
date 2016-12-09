<?php 

function cantidad_comentarios_foto($Nombre_Foto,$Seccion){

    
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

$results = mysqli_query($con,"SELECT count(ID_Comentario_Foto) as 'Cantidad_Comentarios' FROM Comentario_Foto WHERE ((ID_Foto = '$ID_Foto') and (Estado_Comentario_Foto = 'Activo'))");

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