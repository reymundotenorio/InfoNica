<?php

header ('Content-type: text/html; charset=utf-8; lang="es"');

    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;

$Nombre = $_POST["user-name"];
$Apellido = $_POST["user-lastname"];
$Email = $_POST["user-email"];
$Contrasena = $_POST["user-pw"];
$Confirm = $_POST["user-pw-repeat"];

$Email = strtolower($Email);

$Nombre = trim($Nombre);
$Apellido = trim($Apellido);
$Email = trim($Email);

if(empty($Nombre) or empty($Apellido) or empty($Email) or empty($Contrasena) or empty($Confirm)){

           mysqli_close($con);
            exit;
               
}


$sql1= mysqli_query($con, "SELECT Correo_Usuario FROM Usuario WHERE (Correo_Usuario = '$Email')");
              
            $contar = mysqli_num_rows($sql1);
             
            if($contar == 0){
               
            }
            else{

          echo "<script type=\"text/javascript\">
         //  alert('Correo ya registrado');
             window.location='ingresar.php?session=email_exist';
           </script>";
           mysqli_close($con);
            exit;
               
                }


            if($Confirm!=$Contrasena){
    
    echo "<script type=\"text/javascript\">
        //   alert('Contraseñas no coinciden');
        //   history.go(-1);
      window.location='ingresar.php?session=pass';
          </script>";
       
}else{

$Pass = base64_encode($Contrasena);

$Confirmacion = uniqid();


$Query = "INSERT INTO Usuario
(Nombre_Usuario,
Apellido_Usuario,
Correo_Usuario,
Contrasena_Usuario,
ID_Activacion_Usuario,
Rol,
Estado_Usuario)
VALUES
('$Nombre', '$Apellido', '$Email', '$Pass', '$Confirmacion', 'Public', 'Inactivo')";


$sql = mysqli_query($con, $Query);


if ($sql){

include_once("correo.php"); 
enviar_correo($Nombre, $Apellido, $Email, $Contrasena, $Confirmacion);
  
  echo"<script type=\"text/javascript\">
  //alert('Usuario registrado correctamente, revise su correo electrónico para activar su cuenta'); 
  window.location='index.php?session=email';
  //location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php');

  mysqli_close($con);
  exit;
 
}
else{
echo "<script type=\"text/javascript\">
       //    alert('Error Al Registrar Usuario');
       //    history.go(-1);
 window.location='ingresar.php?session=error';
       </script>";
       mysqli_close($con);
        exit;
}

}

  


?>

