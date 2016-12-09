<?php

header ('Content-type: text/html; charset=utf-8; lang="es"');

    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;

$OldPass = $_POST["OldPass"];
$NewPass = $_POST["NewPass"];
$ConfirmPass = $_POST["ConfirmPass"];
$IDUsuario = $_POST["ID_Usuario"];


if(empty($OldPass) or empty($NewPass) or empty($ConfirmPass)){

           mysqli_close($con);
            exit;
               
}



     $resultado = mysqli_query($con,"SELECT Contrasena_Usuario FROM Usuario WHERE (ID_Usuario = '$IDUsuario')");
     $rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

     $Contrasena = $rows["Contrasena_Usuario"];
    

    $PassVieja = base64_encode($OldPass);

    if($PassVieja!=$Contrasena){

        echo "<script type=\"text/javascript\">
        //   alert('Contraseñas no coinciden');
        //   history.go(-1);
      window.location='datos_usuario.php?data=pass_old_error';
          </script>";
 mysqli_close($con);
        exit;
    }

if($ConfirmPass!=$NewPass){
    
echo "<script type=\"text/javascript\">
        //   alert('Contraseñas no coinciden');
        //   history.go(-1);
      window.location='datos_usuario.php?data=pass_new_not_equals';
          </script>";
           mysqli_close($con);
          exit;
       
}else{

$NuevaContrasena = base64_encode($NewPass);

$Query = "UPDATE Usuario SET Contrasena_Usuario = '$NuevaContrasena' WHERE ID_Usuario = '$IDUsuario'";

$sql = mysqli_query($con, $Query);


if ($sql){

  
  echo"<script type=\"text/javascript\">
  //alert('Usuario registrado correctamente, revise su correo electrónico para activar su cuenta'); 
  window.location='datos_usuario.php?data=pass_success';
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
 window.location='datos_usuario.php?data=pass_error';
       </script>";
       mysqli_close($con);
        exit;
}

}

  


?>

