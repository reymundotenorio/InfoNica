<?php 

function descripcion_video($ID_Video,$Seccion){

    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;

$resultado = mysqli_query($con,"SELECT ID_Seccion FROM Seccion WHERE (Nombre_Seccion = '$Seccion')");
$rows = mysqli_fetch_array($resultado,MYSQLI_BOTH);

$ID_Seccion = $rows["ID_Seccion"];

$result = mysqli_query($con,"SELECT descripcion_video FROM Video WHERE ((ID_Video = '$ID_Video') and (ID_Seccion = '$ID_Seccion'))");

$row = mysqli_fetch_array($result,MYSQLI_BOTH);

$descripcion_foto = $row["descripcion_video"];

if(!empty($descripcion_foto)){
    echo $descripcion_foto;
}
else{
    echo "";
}

mysqli_close($con);
}

 ?>