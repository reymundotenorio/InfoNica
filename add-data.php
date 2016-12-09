
<?php session_start();

if ( (empty($_SESSION["Usuario"])) OR ($_SESSION["Rol"]=='Public') ){
    echo"<script type=\"text/javascript\">
   window.location='index.php';
//  location.href = 'index.php'; 
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


if(isset($_POST['btn-save']))
{
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
	$rol = $_POST['rol'];
    $codigo = $_POST['codigo'];
    $estado = $_POST['estado'];
	
	if($crud->create($nombre,$apellido,$correo,$contrasena, $codigo, $rol, $estado))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
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

    <title>InfoNica - Agregar usuario</title>


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
                 <h1 class="main_tittle">Agregar usuario</h1>
             </p> 
         </div>
     </div>
 </div>
 <div class="hr">
 </div>
 <!-- CONTENT ================================================== -->


<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Woow!</strong> Registro guardado correctamente!!! <a href="administrar.php">Volver a Registros</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>Lo sentimos!</strong> Error al guardar registro !
	</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Apellido</td>
            <td><input type='text' name='apellido' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Correo</td>
            <td><input type='email' name='correo' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Contraseña</td>
            <td><input type='password' name='contrasena' class='form-control' required></td>
        </tr>

          <tr>
            <td>Rol</td>
            <td>
                  <select name="rol" class='form-control' required>
                    <option value="Public" selected="selected">Public</option>
                    <option value="Admin">Admin</option>
                </select>

            </td>
        </tr>

            <tr>
            <td>Código</td>
            <td><input type='text' name='codigo' class='form-control' value="000X000" readonly></td>
           </tr> 

           <tr>
            <td>Estado</td>
            <td><input type='text' name='estado' class='form-control' value="Activo" readonly></td>
           </tr> 
 
        <tr>
            <td colspan="2">
            <a href="administrar.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Volver a registros</a>
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Crear nuevo registro
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