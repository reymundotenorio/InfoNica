
<?php session_start();

if ( (empty($_SESSION["Usuario"])) OR ($_SESSION["Rol"]=='Public') ){
    echo"<script type=\"text/javascript\">
   window.location='index.php';
 // location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php'); 
    }
 ?>






<?php

include_once("conectar.php");
$conexion = new Conexion();
$conexion->Conectarmysql();
$con = $conexion->Conectar;

include_once 'class.crud.php';

$crud = new crud($con);


if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    
    if($crud->update($id,$nombre, $apellido, $correo, $contrasena, $rol))
    {
      $msg = "<div class='alert alert-info'>
      <strong>Woow!</strong> Registro actualizado con exito!!! <a href='administrar.php'> Volver a Registros</a>!
  </div>";
}
else
{
  $msg = "<div class='alert alert-warning'>
  <strong>Lo Lamentamos!</strong> Error al actualizar registro!
</div>";
}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>


<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width"/>

    <link rel="shortcut icon" href="images/infonica_logo.png" />

    <title>InfoNica - Modificar usuario</title>


<!-- 
    skin color -->
    <link rel="stylesheet" href="stylesheets/skins/blue.css">



    <style type="text/css">

        .subheader { line-height: 1.3; color: #6f6f6f; font-weight: 300; margin-bottom: 17px; }
        .columns {min-height: 1px; padding: 0 15px; position: relative; }
        .columns.centered { float: none; margin: 0 auto; }
        .left { float: left;}
        .right { float: right }
        .rows {padding-bottom: 100px; margin-bottom: 100px;}
        .main_tittle{ margin-right: 20px; float: right;}
        .go_home{padding-right: 80px; font-size: 18px;}
        .body{width: 100%; float: none;}

    </style>

    <link href="javascripts/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="body">


<!-- SUBHEADER
    ================================================== -->
    <div id="subheader">
        <div class="rows"
        <div class="twelve columns">
            <p class="left">
                <a class="go_home" href="index.php"><img 
                    src="images/infonica_logo.png" width="88px" height="83px" alt="Logo">InfoNica</a>

                </p>
                <p class="right">
                 <h1 class="main_tittle">Modificar usuario</h1>
             </p> 
         </div>
     </div>
 </div>
 <div class="hr">
 </div>
 <!-- CONTENT ================================================== -->


 <div class="clearfix"></div>

 <div class="container">

    <?php
    if(isset($msg))
    {
       echo $msg;
   }
   ?>
</div>

<div class="clearfix"></div><br />

<div class="container">
  
   <form method='post'>
       
    <table class='table table-bordered'>

       <tr>
        <td>Fotografía</td>
        <td><img id="ingresar-img" src="<?php echo $Foto_Usuario; ?>" class="pics" alt="iniciar" height="48px" width="48px"></td>
    </tr>
    
    <tr>
        <td>Nombre</td>
        <td><input type='text' name='nombre' class='form-control' value="<?php echo $Nombre_Usuario; ?>" required></td>
    </tr>
    
    <tr>
        <td>Apellido</td>
        <td><input type='text' name='apellido' class='form-control' value="<?php echo $Apellido_Usuario; ?>" required></td>
    </tr>
    
    <tr>
        <td>Correo</td>
        <td><input type='email' name='correo' class='form-control' value="<?php echo $Correo_Usuario; ?>" required></td>
    </tr>
    
    <tr>
        <td>Contraseña</td>
        <td><input type='password' name='contrasena' class='form-control' value="<?php echo base64_decode($Contrasena_Usuario); ?>" required></td>
    </tr>

    <tr>
        <td>Fecha registro</td>
        <td><input type='date' name='fecha' class='form-control' value="<?php $time = strtotime($Fecha_Registro);
            $newformat = date('Y-m-d',$time);
            echo $newformat; ?>" readonly></td>
        </tr>

        <tr>
            <td>Código activación</td>
            <td><input type='text' name='codigo' class='form-control' value="<?php echo $ID_Activacion_Usuario; ?>" readonly></td>
        </tr>

        <tr>
            <td>Rol</td>

            <td>
                <select name="rol" class='form-control' required>
                    <?php if($Rol == 'Admin'){ ?>
                    <option value="Public">Public</option>
                    <option value="Admin" selected="selected">Admin</option>
                    <?php }
                    else{ ?>
                    <option value="Public" selected="selected">Public</option>
                    <option value="Admin">Admin</option>

                    <?php } ?>
                </select>

            </tr>

            <tr>
                <td>Estado</td>
                <td><input type='text' name='estado' class='form-control' value="<?php echo $Estado_Usuario; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="administrar.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancelar</a>
                    <button type="submit" class="btn btn-primary" name="btn-update">
                     <span class="glyphicon glyphicon-edit"></span>  Actualizar este registro
                 </button>
             </td>
         </tr>
         
     </table>
 </form>
 
 
</div>

<script src="javascripts/bootstrap/js/bootstrap.min.js"></script>
<script src="javascripts/jquery.min.js"></script>

</body>
</html>