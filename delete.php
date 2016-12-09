<?php session_start();

if ( (empty($_SESSION["Usuario"])) OR ($_SESSION["Rol"]=='Public') ){
    echo"<script type=\"text/javascript\">
   window.location='index.php';
  //location.href = 'index.php'; 
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

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");	
}

if(isset($_POST['btn-act']))
{
    $id = $_GET['delete_id'];
    $crud->active($id);
    header("Location: delete.php?actived"); 
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

    <title>InfoNica - Activar/Desactivar usuario</title>


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

      float: none;
    margin-left: auto;
    margin-right: auto;
}

.input-group .icon-addon .form-control {
    border-radius: 0;
}

.icon-addon {
    position: relative;
    color: #555;
    display: block;
}

.icon-addon:after,
.icon-addon:before {
    display: table;
    content: " ";
}

.icon-addon:after {
    clear: both;
}

.icon-addon.addon-md .glyphicon,
.icon-addon .glyphicon, 
.icon-addon.addon-md .fa,
.icon-addon .fa {
    position: absolute;
    z-index: 2;
    left: 10px;
    font-size: 14px;
    width: 20px;
    margin-left: -2.5px;
    text-align: center;
    padding: 10px 0;
    top: 1px
}

.icon-addon.addon-lg .form-control {
    line-height: 1.33;
    height: 46px;
    font-size: 18px;
    padding: 10px 16px 10px 40px;
}

.icon-addon.addon-sm .form-control {
    height: 30px;
    padding: 5px 10px 5px 28px;
    font-size: 12px;
    line-height: 1.5;
}

.icon-addon.addon-lg .fa,
.icon-addon.addon-lg .glyphicon {
    font-size: 18px;
    margin-left: 0;
    left: 11px;
    top: 4px;
}

.icon-addon.addon-md .form-control,
.icon-addon .form-control {
    padding-left: 30px;
    float: left;
    font-weight: normal;
}

.icon-addon.addon-sm .fa,
.icon-addon.addon-sm .glyphicon {
    margin-left: 0;
    font-size: 12px;
    left: 5px;
    top: -1px
}

.icon-addon .form-control:focus + .glyphicon,
.icon-addon:hover .glyphicon,
.icon-addon .form-control:focus + .fa,
.icon-addon:hover .fa {
    color: #2580db;
}

@media only screen and (max-width: 1200px) {
        /* Force table to not be like tables anymore */
        #no-more-tables table,
        #no-more-tables thead,
        #no-more-tables tbody,
        #no-more-tables th,
        #no-more-tables td,
        #no-more-tables tr {
        display: block;
        }

 #no-more-tables thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
        }
         
        #no-more-tables tr { border: 1px solid #ccc; }
          
        #no-more-tables td {
        /* Behave like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
        white-space: normal;
        text-align:left;
        }
         
        #no-more-tables td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align:left;
        font-weight: bold;
        }
         
        /*
        Label the data
        */
        #no-more-tables td:before { content: attr(data-title); }
        
        }


.table td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;

}

#table td, #table th, #table { border-color: #778899; }

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
                   <h1 class="main_tittle">Activar/Desactivar usuario</h1>
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
       if(isset($_GET['deleted']))
       {
          ?>
          <div class="alert alert-danger">
           <strong>Listo!</strong> usuario desacivado... 
       </div>
       <?php
   }
  
   if(isset($_GET['actived'])){

?>

<div class="alert alert-success">
           <strong>Listo!</strong> usuario activado... 
       </div>

  <?php
   }
if(!empty($_GET['deleted'])){   
   ?>
     <div class="alert alert-danger">
       <strong>Seguro !</strong> que desea activar/desactivar al usuario? 
   </div>
   <?php } ?>

</div>

<div class="clearfix"></div>

<div class="container">

  <?php
  if(isset($_GET['delete_id']))
  {
     ?>
   <div class="table-responsive" id="no-more-tables">
   <table id="table" class='table col-sm-12 table-bordered table-striped table-condensed cf'>
  <thead class="cf">
     <tr class="header">
           <th>ID</th>
           <th>Fotografía</th>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Correo</th>
           <th>Contraseña</th>
           <th>Fecha registro</th>
           <th>ID activación</th>
           <th>Rol</th>
           <th>Estado</th>
       </tr>

      </thead>
      <tbody>
       <?php
       $stmt= mysqli_prepare($con,"SELECT * FROM Usuario WHERE ID_Usuario=?");
       mysqli_stmt_bind_param($stmt, 'i', $_GET['delete_id']);
       mysqli_stmt_execute($stmt);
       $stmt->bind_result(
        $row['ID_Usuario'],
        $row['Nombre_Usuario'], 
        $row['Apellido_Usuario'],
        $row['Correo_Usuario'],
        $row['Contrasena_Usuario'],
        $row['Fecha_Registro'],
        $row['ID_Activacion_Usuario'],
        $row['Rol'],
        $row['Foto_Usuario'],
        $row['Estado_Usuario']);
       while($stmt->fetch())
       {
           ?>

           <?php if($row['Estado_Usuario'] == 'Inactivo') {?>
           <tr class="danger">
           <?php } 
           else{?>
           <tr class="success">
           <?php } ?>
               <td data-title="No."><?php print($row['ID_Usuario']); ?></td>
               <td data-title="Fotografía"> <img id="ingresar-img" src=<?php echo($row['Foto_Usuario']); ?> class="pics" alt="iniciar" height="32px" width="32px"></td>
               <td data-title="Nombre"><?php print($row['Nombre_Usuario']); ?></td>,
               <td data-title="Apellido"><?php print($row['Apellido_Usuario']); ?></td>
               <td data-title="Correo"><?php print($row['Correo_Usuario']); ?></td>
               <td data-title="Contraseña"><?php print(base64_decode($row['Contrasena_Usuario'])); ?></td>
               <td data-title="Fecha registro"><?php print($row['Fecha_Registro']); ?></td>
               <td data-title="ID activación"><?php print($row['ID_Activacion_Usuario']); ?></td>
               <td data-title="Rol"><?php print($row['Rol']); ?></td> 
               <td data-title="Estado"><?php print($row['Estado_Usuario']); ?></td>

           </tr>

  </tbody>
           <?php
       }
       ?>
   </table>
   </div>
   <?php
}
?>
</div>

<div class="container">
    <p>
        <?php
        if(isset($_GET['delete_id']))
        {
           ?>
           <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['ID_Usuario']; ?>" />
            <a href="administrar.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
            <?php 
            if($row['Estado_Usuario']=='Activo'){ ?>
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-remove-sign"></i> &nbsp; SI</button>
            <?php }
            else{ ?>
             <button class="btn btn-large btn-primary" type="submit" name="btn-act"><i class="glyphicon glyphicon-ok-sign"></i> &nbsp; SI</button>
            <?php } ?>
        </form>  
        <?php
    }
    else
    {
       ?>
       <a href="administrar.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Volver a registros</a>
       <?php
   }
   ?>
</p>
</div>	
