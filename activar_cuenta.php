<?php 

function activar_cuenta($id){
      
    
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;


$resultado = mysqli_query($con,"SELECT ID_Usuario, Nombre_Usuario, Apellido_Usuario FROM Usuario WHERE (ID_Activacion_Usuario = '$id')");
$rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

$ID_Usuario = $rows["ID_Usuario"];
$NombreUsuario = $rows["Nombre_Usuario"];
$ApellidoUsuario = $rows["Apellido_Usuario"];

if(empty($ID_Usuario)){

 header('Location:index.php');

}

$results = mysqli_query($con,"UPDATE Usuario SET Estado_Usuario ='Activo' WHERE (ID_Activacion_Usuario = '$id')");



if($results){

      echo("<h1>Su cuenta en InfoNica ha sido activada exitosamente, Gracias por preferirnos</h1> \n");
      echo(" <h3><strong>".$NombreUsuario." ".$ApellidoUsuario."</strong> ahora puede disfrutar de nuestro contenido, con toda la información, 
        fotografías y videos de El Castillo </h3> \n");
      echo("<div class=\"minipause\"></div><br/> \n");
      echo(" <a href=\"ingresar.php\" class=\"clear actbutton\">Empezar</a> \n");

}
else{

 header('Location:index.php');
 
}

mysqli_close($con);

}

 ?>