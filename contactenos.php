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

<title>InfoNica - Contáctenos</title>
<!-- CSS Files-->
<link rel="stylesheet" href="stylesheets/style.css">

<link rel="stylesheet" href="stylesheets/skins/lilac1.css">
<!-- skin color -->
<link rel="stylesheet" href="stylesheets/responsive.css">
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>

<?php 
include_once("header.php"); 
?>


<!-- SUBHEADER
================================================== -->
<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p class="left">
				 Acerca de Nosotros
			</p>
			<!--<p class="right">
				 Conozca nuestro equipo
			</p> -->
		</div>
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT 
================================================== -->
<div class="row">
    <!-- MAIN CONTENT-->
	<div class="eight columns">
	    <!-- Our History-->
		<div class="sectiontitle">
			<h4>Nuestra historia</h4>
		</div>
		<p>
			 Está humilde página web surgió como proyecto de la clase de <b> Aplicación Gráfica y Multimedia</b>
		</p>
		<p>
			Ahora ya finalizado el proyecto estoy orgullosa de que nos visite y conozca más sobre nuestra bella Nicaragua, sobre todo El Castillo Río San Juan
			el cual ofrece una belleza natural, histórica y cultural....
		</p>
		<div class="panel">
			<p>
				<b>InfoNica es una pagina web que provee de información y una galería multimedia completa, obteniendo así toda la información necesaria
				para que usted pueda visitar, conocer y comprobar lo hermoso que tiene Nicaragua, sobre todo cuando se trata de naturaleza y medio ambiente</b>
			</p>
			<p class="text-right">
				<i>Nuvia Sánchez</i>
			</p>
		</div>
		<p>
			 Espero goze de todo el contenido, y queda invitado a que continue visitando InfoNica
		</p>
		<br/>
		<!-- Accordion-->
		<dl class="tabs">
		<!--	<dd class="active"><a href="#simple1">Why choose us</a></dd> -->
			<dd class="active"><a href="#nuvia">Nuvia Sánchez</a></dd>
			
		</dl>
		<ul class="tabs-content">
		<!--	<li class="active" id="simple1Tab">
			<p>
				 This is simple tab 1's content. Pretty neat, huh? Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et non ex maxima parte de tota iudicabis? Item de contrariis, a quibus ad genera formasque generum.
			</p>
			<p>
				 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et non ex maxima parte de tota iudicabis? Item de contrariis, a quibus ad genera formasque generum venerunt. Sit enim idem caecus, debilis. Duo Reges: constructio interrete.
			</p>
			<p>
				 Sit enim idem caecus, debilis. Duo Reges: constructio interrete.
			</p>
			</li> -->
			<li class="active" id="nuviaTab">Soy una chica de 20 años, estudiante de la carrera Ingeniería de Sistemas en la Univesidad Nacional de Ingeniería, 
				nacida en Nicaragua habitante del municipio de El Castillo.</li>
			
		</ul>
	</div><!-- end main content-->

	<!-- SIDEBAR-->
	<div class="four columns">
		<div class="teamwrap teambox">
			<img src="images/temp/Nuvia1.jpg" width="299px" heigth="200px" alt="">
			<div class="mask">
				<h2>Nuvia Sánchez</h2>
				<p>
					Desarrolladora de InfoNica
					<div class="social socialteam facebook">
						<a href="https://www.facebook.com/nuvi.saul1"></a>
					</div>
				<!--	<div class="social socialteam twitter">
						<a href="#"></a>
					</div>
					<div class="social socialteam deviantart">
						<a href="#"></a>
					</div>
					<div class="social socialteam flickr">
						<a href="#"></a>
					</div>
					<div class="social socialteam dribbble">
						<a href="#"></a>
					</div> -->
				</div>
			</div>
			
			</div>
	</div><!-- end sidebar -->
</div>
<div class="hr">
</div>


<!-- SUBHEADER
================================================== -->
<!--
<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p class="left">
				 CONTÁCTENOS
			</p>
			<p class="right">
				 Comuníquese con nosotros hoy mismo!
			</p>
		</div>
	</div>
</div>
<div class="hr">
</div> -->
<!-- CONTENT 
================================================== -->
<div class="row">
    <!-- GOOGLE MAP IFRAME -->
	<div class="twelve columns">
		<iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.6450719640407!2d-86.2241069!3d12.1364195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f73fe7867ce5fad%3A0x842c4aeae5cf3cda!2sUniversidad+Nacional+de+Ingenier%C3%ADa!5e0!3m2!1ses!2ses!4v1433993799125">
		</iframe>
	</div>
</div>
<div class="row">
	<!-- CONTACT FORM -->
	<div id="enviarMensaje" class="twelve columns">
		<div class="wrapcontact">
			<h5>ENVÍENOS UN MENSAJE</h5>
			<div class="done">
				<div class="alert-box success">
				 Mensaje ha sido enviado! <a href="" class="close">x</a>
				</div>
			</div>			
				<form method="post" action="contact.php" id="contactform">
				<div class="form">
				    <div class="six columns noleftmargin">
					<label>Nombre</label>
					<input type="text" name="name" class="smoothborder" placeholder="Tu nombre *"/>
					</div>
					<div class="six columns">
					<label>Correo electrónico</label>
					<input type="text" name="email" class="smoothborder" placeholder="Tu dirección de correo electrónico *"/>
					</div>
					<label>Mensaje</label>
					<textarea name="comment" class="smoothborder ctextarea" rows="14" placeholder="Mensaje, opinión, comentario, crítica *"></textarea>
					<input type="submit" id="submit" class="readmore" value="Enviar">
				</div>
				</form>			
		</div>
	</div>
												
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

</body>
</html>