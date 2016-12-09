<?php 

$Correo = $_POST['Email'];

$Correo = strtolower($Correo);

if($Correo!="" AND !empty($Correo)){
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;



    $result = mysqli_query($con,"SELECT ID_Usuario, Nombre_Usuario, Apellido_Usuario, Correo_Usuario, Contrasena_Usuario 
      FROM Usuario WHERE (Correo_Usuario = '$Correo')");

    $row = mysqli_fetch_array($result, MYSQLI_BOTH);

    $rowcount=mysqli_num_rows($result);

    if($rowcount==0){

     echo("ingresar.php?remember=not_found"); 

   mysqli_close($con);

   exit;

}

else{

   $Nombre = $row["Nombre_Usuario"];
   $Apellido = $row["Apellido_Usuario"];
   $Email = $row["Correo_Usuario"];
   $Contrasena = $row["Contrasena_Usuario"];

   mysqli_close($con);

   $ContrasenaF = base64_decode($Contrasena);

   include_once("correo_remember.php");
   enviar_correo_remember($Nombre, $Apellido, $Email, $ContrasenaF);


}



}


?>