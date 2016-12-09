<?php session_start();

if ( (empty($_SESSION["Usuario"])) OR ($_SESSION["Rol"]=='Public') ){
    echo"<script type=\"text/javascript\">
   window.location='index.php';
 // location.href = 'index.php'; 
  </script>"; 
 // header('Location:index.php'); 
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

<title>InfoNica - Administra usuarios</title>
 

<!-- 
skin color -->
<link rel="stylesheet" href="stylesheets/skins/blue.css">

  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

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

<link rel="stylesheet" type="text/css" href="stylesheets/font-awesome.css">
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body class="body" onload="myFunction()">




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
				 <h1 class="main_tittle">Administrar usuarios</h1>
			</p> 
		</div>
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT ================================================== -->

<?php 

  
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->Conectarmysql();
    $con = $conexion->Conectar;

    include_once 'class.crud.php';

    $crud = new crud($con);


 ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Agregar registro</a>
</div>

<div class="clearfix"></div><br />


<div class="icon-addon addon-lg" style="width:80%; display:block; margin-left: auto; margin-right: auto; margin-top: 10px; margin-bottom: 20px;">
<input  type="text" id="search" 
class="form-control" placeholder="Buscar registro...">
<label for="search" class="glyphicon glyphicon-search" rel="tooltip" title="buscar"></label>
</div>

 



<div class="table-responsive" id="no-more-tables">
	 <table id="table" class='table col-sm-12 table-bordered table-striped table-condensed cf'>
	 <thead class="cf">
     <tr class="header">
     <th>No.</th>
     <th>Fotografía</th>
     <th>Nombre</th>
     <th>Apellido</th>
     <th>Correo</th>
     <th>Contraseña</th>
     <th>Fecha registro</th>
     <th>Código activación</th>
     <th>Rol</th>
     <th>Estado</th>
     <th colspan="2" align="center">Acciones</th>
     </tr>
     	</thead>
     	<tbody>
     <?php
		$query = "SELECT * FROM Usuario";       
		$records_per_page=3;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    <tr>
        <td colspan="12" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 
 	</tbody>

</table>

</div>

   

   <div class="alert alert-info">


<script type="text/javascript">
function myFunction() {
	var $rows = $('#table tr');
$('#search').keyup(function() {


    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
   

 
   
        $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();



        return !~text.indexOf(val);

    }).hide();


    	var header = $rows.filter('.header');
    	header.show();
 	
});
}
</script>
  
     


<!-- JAVASCRIPTS 
================================================== -->
<!-- Javascript files placed here for faster loading

<script src="javascripts/foundation.min.js"></script>
<script src="javascripts/formvalidation.js"></script>
<script src="javascripts/jquery.cycle.js"></script>
<script src="javascripts/app.js"></script>
<script src="javascripts/modernizr.foundation.js"></script>
<script src="javascripts/slidepanel.js"></script>
<script src="javascripts/scrolltotop.js"></script>
<script src="javascripts/hoverIntent.js"></script>
<script src="javascripts/superfish.js"></script>
<script src="javascripts/responsivemenu.js"></script>
<script src="javascripts/jquery.tweet.js"></script>
<script src="javascripts/twitterusername.js"></script>

 -->

 <script src="javascripts/bootstrap/js/bootstrap.min.js"></script>
 <script src="javascripts/jquery.min.js"></script>

</body>
</html>