<?php 

if(empty($_GET["id"])) { 
	header('location: video_castillo.php?id=1');
}

?>


<!DOCTYPE html>


<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8"/>
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width"/>

<link rel="shortcut icon" href="images/infonica_logo.png" />

<title>Videos - InfoNica</title>
<!-- CSS Files-->
<link rel="stylesheet" href="stylesheets/style.css">

<link rel="stylesheet" href="stylesheets/skins/red.css">
<!-- skin color -->
<link rel="stylesheet" href="stylesheets/responsive.css">
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

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
<div id="subheader" class="blogstyle">
	<div class="row">
		<div class="eight columns">
			<p class="bread leftalign" style="font-family: 'Comic Sans MS' ">
				 Está aquí: <a href="index.php"> Inicio</a> / <a href="video_castillo.php">Videos del Castillo</a>
			</p>
		</div>
		
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT 
================================================== -->

	
	<div class="row">
		<hr>
		<!-- VIDEOS-->
		<div class="seven columns" style="width:100%;">

		<div class="sectiontitle">
<!-- Titulo Foto-->

		<?php 

                $Departamento = "ElCastillo";
                $ID_Video = $_GET["id"];
                include_once("titulo_video.php");
                titulo_video($ID_Video, $Departamento);
                 ?>




		</div>
			
			<ul class="tabs-content contained">

				

				<?php 

			if($_GET["id"] == '1'){ 

				?>

				<li  id="video1Tab" style="display: block; ">
				<div class="flex-video">
					<iframe width="560"  height="315" src="https://www.youtube.com/embed/1UyYY-mbnB8" style="border:0px;" allowfullscreen> <!--width="420"-->
					</iframe>
				</div>
				</li>


			

				<?php 

			}
			if($_GET["id"] == '2'){ 

				?>
				<li id="video2Tab" style="display: block; ">
				<div class="flex-video widescreen">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/IHifuSeDCmo" style="border:0px;" allowfullscreen>
					</iframe>
				</div>
				</li>

				<?php 
			}
			if($_GET["id"] == '3'){ 

				?>
				<li id="video3Tab" style="display: block; ">
				<div class="flex-video widescreen vimeo">
					<iframe src="http://player.vimeo.com/video/21762736?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" style="border:0px;">
					</iframe>
				</div>
				</li>

				<?php 
				} ?>
			</ul>
		</div>


<div style="margin-left: 20px; margin-right: 20px;">

<p style="padding-top: 40px;">
				 <!-- Descripcion Foto -->
                 <?php 
                $Departamento = "ElCastillo";
                $ID_Video = $_GET["id"];
                include_once("descripcion_video.php");
                descripcion_video($ID_Video, $Departamento);
                 ?>
			</p>

				 <!--  Cantidad Comentarios -->
	
			    <?php 
                $Departamento = "ElCastillo";
                $ID_Video = $_GET["id"];
                include_once("cantidad_comentarios_video.php");
                cantidad_comentarios_video($ID_Video, $Departamento);
                 ?>


			   <?php 
                if(!empty($_GET["comentarios"])){

                $Departamento = "ElCastillo";
                $ID_Video = $_GET["id"];
               
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

               
                include_once("comentarios_video.php");
                comentarios_video($ID_Video, $Departamento, "todo", $ID_User,$Rol, $ID_reply);
                 
                 }
                else{

                $Departamento = "ElCastillo";
                $ID_Video = $_GET["id"];
                
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

               
                include_once("comentarios_video.php");
                comentarios_video($ID_Video, $Departamento, "no_todo", $ID_User,$Rol, $ID_reply);
                 }
                 ?>

              

              <br class="clear">

            


              <?php  if (!empty($_SESSION["Usuario"]) ){
               ?>

			<h5>Haz un Comentario</h5>		
			
			<form action="comentar_video.php" method ="post" accept-charset="utf-8">
			<textarea style="width:100%" maxlength="500" class="six smoothborder" rows="7" name="Comentario" placeholder="Haz un comentario..." title="Ingrese un comentario" required="required"></textarea>
			<input type="hidden" value="<?php echo $_GET["id"];?>" name="ID_Video" />
            <input type="hidden" value="ElCastillo" name="Seccion" />
            <input type="hidden" value="<?php echo $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI'];?>" name="Ruta" />

            <button type="submit" class="readmore">Publicar</button>
			</form>	

			  <?php 
            } else{
            ?>
            <br class="clear">
            <br class="clear">
            <h5><a style="margin-left: 20px;" href="ingresar.php">Registrese o inicie sesión para comentar <i class="fa fa-sign-in"></i></a></h5>

            <?php 
            }
            ?>	

			<br class="clear">
            <br class="clear">

		<h5>Página</h5>

		<ul class="pagination">

		<?php 

			if($_GET["id"] == '1'){ 

				?>


			
				<li class="current"><a href="video_castillo.php?id=1">1</a></li>
				<li><a href="video_castillo.php?id=2">2</a></li>
				<li><a href="video_castillo.php?id=3">3</a></li>
				<li class="arrow"><a href="video_castillo.php?id=2">&raquo;</a></li>

					<?php 

			}
			if($_GET["id"] == '2'){ 

				?>

				<li class="arrow unavailable"><a href="video_castillo.php?id=1">&laquo;</a></li>
				<li><a href="video_castillo.php?id=1">1</a></li>
				<li class="current"><a href="video_castillo.php?id=2">2</a></li>
				<li><a href="video_castillo.php?id=3">3</a></li>
				<li class="arrow"><a href="video_castillo.php?id=3">&raquo;</a></li>

				<?php 
			}
			if($_GET["id"] == '3'){ 

				?>

				<li class="arrow unavailable"><a href="video_castillo.php?id=2">&laquo;</a></li>
				<li><a href="video_castillo.php?id=1">1</a></li>
				<li><a href="video_castillo.php?id=2">2</a></li>
				<li class="current"><a href="video_castillo.php?id=3">3</a></li>
				

				<?php 
				} ?>
			
			
			</ul>

      </div>
		
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




<script type="text/javascript">

<?php 

if(!empty($_GET['comentarios'])){
  $RutaF = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id']."&comentarios=".$_GET['comentarios'];
}else{
$RutaF = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id'];
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