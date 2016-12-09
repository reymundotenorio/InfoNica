<?php
 
 date_default_timezone_set("America/Managua");

 header ('Content-type: text/html; charset=utf-8; lang="es"');


 function Actualizar_Foto_Perfil($ID_Usuario, $Ruta_Foto){

    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;


          
$Query = "UPDATE Usuario SET Foto_Usuario = '$Ruta_Foto'
WHERE ID_Usuario = '$ID_Usuario'";


$sql = mysqli_query($con,$Query);


if($sql){
   echo"<script type=\"text/javascript\">
  //alert('Foto de perfil actualizada'); 
  window.location='datos_usuario.php?data=pic_success';</script>"; // window.location='index.php';</script>
  mysqli_close($con); 
  exit;
}
else{
   echo"<script type=\"text/javascript\">
  //alert('Foto de perfil no se puedo actualizar'); 
  window.location='datos_usuario.php?data=pic_error';</script>"; 
  mysqli_close($con); 
  exit;
}

 
//set_time_limit(0);
}


?>
