<?php
 
 date_default_timezone_set("America/Managua");

 header ('Content-type: text/html; charset=utf-8; lang="es"');

    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;



$Email = $_POST["user-email"];
$Contrasena = $_POST["user-pw"];

$UserName = trim(strtolower($Email));


//mysql_real_escape_string
 //  print "jaja".$Check;
    
 $EmailF = mysqli_real_escape_string($con, $UserName);
 $ContrasenaF= mysqli_real_escape_string($con, $Contrasena);
 $ContrasenaFMD5 =  base64_encode($ContrasenaF);


 /*$consulta = sprintf("SELECT * FROM users WHERE user='%s' AND password='%s'",
            mysql_real_escape_string($usuario),
            mysql_real_escape_string($contraseña));
            mysql_real_escape_string($contraseña));*/



$result = mysqli_query($con,"SELECT ID_Usuario, Nombre_Usuario, Apellido_Usuario, Correo_Usuario, Contrasena_Usuario, Rol , Estado_Usuario FROM Usuario
 WHERE (Correo_Usuario = '$Email')");

$row = mysqli_fetch_array($result, MYSQLI_BOTH);

$rowcount=mysqli_num_rows($result);

if($rowcount<=0){

  echo"<script type=\"text/javascript\">
 // alert('Correo electrónico no encontrado, registresé para iniciar sesión'); 
 // history.go(-1);
 window.location='ingresar.php?session=email_not_exist';
  </script>";  
 
  mysqli_close($con);
  exit;

}


if(($row["Correo_Usuario"]==$Email)  && ($row["Contrasena_Usuario"]==$ContrasenaFMD5) && ($row["Estado_Usuario"]=="Inactivo")){

 echo"<script type=\"text/javascript\">
  //alert('Revise su correo electrónico para activar su cuenta'); 
  window.location='index.php?session=confirm';
 // location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php');
  mysqli_close($con);
  exit;
 
}


if(($row["Correo_Usuario"]==$Email) && ($row["Contrasena_Usuario"]==$ContrasenaFMD5) && ($row["Estado_Usuario"]=="Activo")){

//if($row["Email"]==$UserName && $row["Contrasena"]==$Contra){
   

   session_start();

   $UsuarioSesion = $row["Nombre_Usuario"];
   $IDSesion = $row["ID_Usuario"];

   $_SESSION["ID_Usuario"] = $IDSesion;
       
		//configurar un elemento usuario dentro del arreglo global $_SESSION

   $Nombre_User = $row["Nombre_Usuario"];
  $Apellido_User = $row["Apellido_Usuario"];

		$_SESSION["Usuario"]=$UsuarioSesion;
    $_SESSION["Usuario_Name"]=$Nombre_User." ". $Apellido_User;
       
         /*if(isset($_POST['Keeplog'])){ 
             unset($_SESSION["expire"]); 
            }   
            else{  */

            $_SESSION["Expire"] = time();       
          

          if(($row["Rol"]=='Admin')){
             $_SESSION["Rol"]='Admin'; 
          }
          else{
             $_SESSION["Rol"]='Public'; 
          }
       

          
$Query = "INSERT INTO Registro_Sesion
(
ID_Usuario,
Estado_Registro_Sesion)
VALUES
('$IDSesion', 'Activo')";


$sql = mysqli_query($con,$Query);
/*

$result3 = mysql_query("Select Max(ID_InicioSesion) as Last from Inicio_Sesion");

$row3 = mysql_fetch_array($result3);

$LastSesion = $row3["Last"];
$_SESSION["Last_Sesion"] = $LastSesion;

*/

   echo"<script type=\"text/javascript\">
  //alert('Bienvenido $Nombre_User $Apellido_User a InfoNica'); 
   window.location='index.php?session=start';
  //location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php');
  mysqli_close($con); 
  exit;

 
//set_time_limit(0);
}

else{
     
      

       echo"<script type=\"text/javascript\">
  //alert('Correo electrónico y/o Contraseña Erronea'); 
  //history.go(-1);
   window.location='ingresar.php?session=email_pass_not_found';
   </script>"; 
  mysqli_close($con); 
  exit;

    
    // header('Location:Formulario.php');
    // echo "<script languaje='javascript'>alert('Usuario y/o Contraseña Erronea')</script>"; 
    
}


?>
