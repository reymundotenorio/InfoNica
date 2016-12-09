<?php 

function titulo_video($ID_Video,$Seccion){

    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;

$resultado = mysqli_query($con,"SELECT ID_Seccion FROM Seccion WHERE (Nombre_Seccion = '$Seccion')");
$rows = mysqli_fetch_array($resultado,MYSQLI_BOTH);

$ID_Seccion = $rows["ID_Seccion"];

$result = mysqli_query($con,"SELECT Titulo_Video FROM Video WHERE ((ID_Video = '$ID_Video') and (ID_Seccion = '$ID_Seccion'))");

$row = mysqli_fetch_array($result,MYSQLI_BOTH);

$Titulo_Foto = $row["Titulo_Video"];

if(!empty($Titulo_Foto)){
    echo "<h4>".$Titulo_Foto."</h4>\n";
}
else{
    echo "<h4> Video #".$ID_Video."</h4>\n"; 
}

mysqli_close($con);
}

 ?>