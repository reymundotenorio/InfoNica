<?php 
include_once("expirar_sesion.php");
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

<title>Galería - InfoNica</title>
<!-- CSS Files-->
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/skins/green.css">
<!-- skin color -->
<link rel="stylesheet" href="stylesheets/responsive.css">
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

    <!-- CSS -->
        <link rel="stylesheet" href="stylesheets/fancybox/jquery.fancybox-buttons.css">
        <link rel="stylesheet" href="stylesheets/fancybox/jquery.fancybox-thumbs.css">
        <link rel="stylesheet" href="stylesheets/fancybox/jquery.fancybox.css">

<!-- -->
  <script src="javascripts/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="stylesheets/sweetalert.css">
  <!--.......................-->

</head>
<body>


<?php 
include_once("header.php");
 ?>


<!-- SUBHEADER
================================================== -->
<div id="subheader">
	<div class="row" >
		<div class="eight columns">
			<p class="bread leftalign" style="font-family: 'Comic Sans MS'">
				 Está aquí: <a href="index.php"> Inicio</a> /<a href="seleccion_tipo_imagenes.php"> Galería /<a href="galeria_fauna.php"> Fauna de El Castillo</a>
			</p>
		</div>
	<!--	<div class="four columns">
			<div class="row collapse">
				<div class="ten mobile-three columns">
					<input type="text" class="nomargin" placeholder="Search...">
				</div>
				<div class="two mobile-one columns">
					<a href="#" class="postfix button expand">Go</a>
				</div>
			</div>
		</div> -->
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT 
================================================== -->
<div class="row gallery">

<?php if (isset($_GET["Fauna"]) ){ ?>
	<div class="twelve columns noleftmargin">
	     <!-- MAIN CONTENT -->
		<div class="eight columns">
<?php } ?>
			<div class="sectiontitle">

<?php if (isset($_GET["Fauna"]) ){ ?>


				<!-- Titulo Foto-->
                <?php 
                $Departamento = "Fauna";
                $Nombre_Foto = $_GET["Fauna"];
                include_once("titulo_foto.php");
                titulo_foto($Nombre_Foto, $Departamento);
                 ?>

<?php } ?>

<?php if (!isset($_GET["Fauna"]) ){ ?>

				<h4>Fauna El Castillo</h4>

<?php } ?>

			</div>
			
			<!--	<img src="images/temp/post.jpg" class="blogimage grayscale" alt=""> -->

	<?php
	if (!isset($_GET["Fauna"]) ){ ?>


	<?php
	//Include the Thumbnails, example: 
	//include_once("thumbnails.php"); php_thumbnails(IMAGES_FOLDER_NAME, THUMBNAILS_FOLDER_NAME, LIHGHTBOX OPTION: lb-on/lb-off;
	include_once("thumbnails.php"); 
	php_thumbnails("Fauna","FaunaThumbs","lb-off");
	?>

	<?php } ?>
  

	<!-- Image -->
	<?php

	if (isset($_GET["Fauna"]) ){ ?>
	<p>
    <?php
	//Include the Image, example:
	//include_once("thumbnails.php"); php_thumbnails("IMAGES_FOLDER_NAME","THUMBNAILS_FOLDER_NAME;
	//If you want to use Lightbox, do not include the image at all!!
	include_once("image.php"); 
	php_image("Fauna","FaunaThumbs");
	?>
	</p>
	<?php } ?>

	

	
	<?php
	if (isset($_GET["Fauna"]) ){ ?>
	

			<p style="padding-top: 40px;">
				 <!-- Descripcion Foto -->
                 <?php 
                $Departamento = "Fauna";
                $Nombre_Foto = $_GET["Fauna"];
                include_once("descripcion_foto.php");
                descripcion_foto($Nombre_Foto, $Departamento);
                 ?>
			</p>
	 	


	       <!--  Cantidad Comentarios -->
	
			    <?php 
                $Departamento = "Fauna";
                $Nombre_Foto = $_GET["Fauna"];
                include_once("cantidad_comentarios_foto.php");
                cantidad_comentarios_foto($Nombre_Foto, $Departamento);
                 ?>


			   <?php 
                if(!empty($_GET["comentarios"])){

                $Departamento = "Fauna";
                $Nombre_Foto = $_GET["Fauna"];
               
               if(!empty($_SESSION["ID_Usuario"])){
                $ID_User = $_SESSION["ID_Usuario"];
                $Rol = $_SESSION["Rol"];
                }
                else{
                 $ID_User = 0;
                 $Rol = 'Public';
                }
               
                 if(!empty($_GET["reply"])){
                $ID_reply = $_GET["reply"];
                }
                else{
                 $ID_reply = 0;
                }

                include_once("comentarios_foto.php");
                comentarios_foto($Nombre_Foto, $Departamento, "todo", $ID_User,$Rol, $ID_reply);
                 
                 }
                else{

                $Departamento = "Fauna";
                $Nombre_Foto = $_GET["Fauna"];
               
               if(!empty($_SESSION["ID_Usuario"])){
                $ID_User = $_SESSION["ID_Usuario"];
                $Rol = $_SESSION["Rol"];
                }
                else{
                 $ID_User = 0;
                 $Rol = 'Public';
                }
               
                 if(!empty($_GET["reply"])){
                $ID_reply = $_GET["reply"];
                }
                else{
                 $ID_reply = 0;
                }
                include_once("comentarios_foto.php");
                comentarios_foto($Nombre_Foto, $Departamento, "no_todo", $ID_User,$Rol, $ID_reply);
                 }
                 ?>


              <br class="clear">

              <?php  if (!empty($_SESSION["Usuario"]) ){
               ?>

			<h5>Haz un Comentario</h5>		
			
			<form action="comentar_foto.php" method ="post" accept-charset="utf-8">
			<textarea style="width:100%" maxlength="500" class="six smoothborder" rows="7" name="Comentario" placeholder="Haz un comentario..." title="Ingrese un comentario" required="required"></textarea>
			<input type="hidden" value="<?php echo $_GET["Fauna"];?>" name="Nombre_Foto" />
            <input type="hidden" value="Fauna" name="Seccion" />
            <input type="hidden" value="<?php echo $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI'];?>" name="Ruta" />

            <button type="submit" class="readmore">Publicar</button>
			</form>	

            <?php 
            } else{
            ?>
            <br class="clear">
            <br class="clear">
            <h5><a href="ingresar.php">Registrese o inicie sesión para comentar <i class="fa fa-sign-in"></i></a></h5>

            <?php 
            }
            ?>

		</div>
		 <!-- SIDEBAR -->
		<div class="four columns">
			<h6 class="sidebartitle">COMENTARIOS RECIENTES</h6>
			
			<?php 
                $Departamento = "Fauna";
                $Nombre_Foto = $_GET["Fauna"];
                include_once("comentarios_recientes_foto.php");
                comentarios_recientes_foto($Nombre_Foto, $Departamento);
                 ?>
			
			<br class="clear"/>
			<h6 class="sidebartitle">El Clima en El Castillo</h6>

			<!-- www.TuTiempo.net - Ancho:145px - Alto:277px -->
<div id="TT_RyD111kEknlaKesK7fzzDDDDj6llLKSFrt1t1cyIK1jo3oG53">
<a href="http://www.tutiempo.net/nicaragua/san-carlos.html">El Tiempo en San Carlos</a>
</div>
<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_RyD111kEknlaKesK7fzzDDDDj6llLKSFrt1t1cyIK1jo3oG53">
</script>
			<!--<a href="#" class="tags">Photography</a>
			<a href="#" class="tags">Vintage</a>
			<a href="#" class="tags">Nature</a>
			<a href="#" class="tags">Design</a>
			<a href="#" class="tags">Printing</a>
			<a href="#" class="tags">Contemporary</a>
			<a href="#" class="tags">Classic</a>
			<a href="#" class="tags">Elegant</a>
			<a href="#" class="tags">Graphics</a>
			<br class="clear"/>-->
			<br/><br/>
	    	
	    	<?php } ?>

		</div>
  
	<?php if (isset($_GET["Fauna"]) ){ ?>				
	</div>
	<?php } ?>
</div>
<div class="hr">
</div>

 

<?php 
include_once("footer.php");
 ?>
<!-- JAVASCRIPTS 
================================================== -->
<!-- Javascript files placed here for faster loading -->
<script src="javascripts/foundation.min.js"></script>
<script src="javascripts/jquery.easing.1.3.js"></script>
<script src="javascripts/elasticslideshow.js"></script>
<script src="javascripts/jquery.carouFredSel-6.0.5-packed.js"></script>
<script src="javascripts/jquery.cycle.js"></script>
<script src="javascripts/app.js"></script>
<script src="javascripts/modernizr.foundation.js"></script>
<script src="javascripts/slidepanel.js"></script>
<script src="javascripts/scrolltotop.js"></script>
<script src="javascripts/hoverIntent.js"></script>
<script src="javascripts/superfish.js"></script>
<script src="javascripts/responsivemenu.js"></script>
<script src="javascripts/bootstrap/js/bootstrap.min.js"></script>
<script src="javascripts/jquery.min.js"></script>


<!-- Grab Google CDN's jQuery, fall back to local if offline -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="javascripts/libs/jquery-1.7.1.min.js"><\/script>')</script>

    <!-- FancyBox -->
        <script src="javascripts/fancybox/jquery.fancybox.js"></script>
        <script src="javascripts/fancybox/jquery.fancybox-buttons.js"></script>
        <script src="javascripts/fancybox/jquery.fancybox-thumbs.js"></script>
        <script src="javascripts/fancybox/jquery.easing-1.3.pack.js"></script>
        <script src="javascripts/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        
        <script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
        

        
        <script type="text/javascript">
            $(document).ready(function() {
                $(".various").fancybox({
                    maxWidth    : 800,
                    maxHeight   : 600,
                    minWidth    : 100,
                    scrolling   : 'no',
                    fitToView   : true,
                    width       : '70%',
                    height      : '70%',
                    autoSize    : true,
                    closeClick  : false,
                    openEffect  : 'elastic',
                    closeEffect : 'fade'
                });
            });
        </script>



<script type="text/javascript">

<?php 

if(!empty($_GET['comentarios'])){
  $RutaF = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?Fauna=".$_GET['Fauna']."&comentarios=".$_GET['comentarios'];
}else{
$RutaF = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?Fauna=".$_GET['Fauna'];
}

 ?>

      <?php 
       if(!empty($_GET["save"])){
        ?>
  swal({
    <?php if($_GET["save"] == 'success'){?>
    title: "Perfecto!",
    text: "Comentario guardado correctamente!",
    type: "success",
    <?php } ?>

     <?php if($_GET["save"] == 'error'){?>
    title: "Lo sentimos!",
    text: "Comentario no se logró guardar!",
    type: "error",
    <?php } ?>
    closeOnConfirm: false
  },
  function(){
  window.location='<?php echo $RutaF  ?>';
  });

<?php } ?>

function OnDelete(idFormulario){
 swal({
    title: "Está seguro que desea eliminar su comentario?",
    text: "No será capaz de restaurar su comentario!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Si, elimínelo!',
    cancelButtonText: "No, cancelar por favor!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm){
      swal("Eliminado!", "Tu comentario ha sido eliminado con exito!", "success");
      document.forms[idFormulario].submit();
    } else {
      swal("Cancelado", "Tu comentario está a salvo :)", "error");
    }
  });
};

function OnEdit(idFormulario){
 swal({
    title: "Está seguro que desea modificar su comentario?",
    text: "No será capaz de restaurar su comentario!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Si, modifíquelo!',
    cancelButtonText: "No, cancelar por favor!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm){
      swal("Modificado!", "Tu comentario ha sido modificado con exito!", "success");
      document.forms[idFormulario].submit();
    } else {
      swal("Cancelado", "Tu comentario está a salvo :)", "error");
    }
  });
};


function OnResponder(idFormulario){

      document.forms[idFormulario].submit();
   
};

</script>
</body>
</html>