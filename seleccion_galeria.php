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

<title>InfoNica - Galería</title>
<!-- CSS Files-->
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/skins/green2.css">
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
			<p>
				 Galería InfoNica
			</p>
		</div>
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT 
================================================== -->

<div class="row">
	<div id="portofolio">
		<!-- Project 1-->
		<div class="four columns threeportofolio category trains">
			<h5>Imagenes</h5>
			<p>
				 Visite la galería de fotos del Castillo...
			</p>
			<div class="portofoliothumb">
				<div class="portofoliothumboverlay threeoverlay">
					<div class="viewgallery threegallery">
						
					</div>
					<div class="inner threedetail">
						<a class="projectdetail" href="seleccion_tipo_imagenes.php">+ Ver Galería</a>
					</div>
				</div>
				
				<img src="images/temp/ubicacion.jpg" class="threeimage" alt=""/>
			</div>
		</div>
		<!--Project 2-->
		<div class="four columns threeportofolio category trains">
			<h5>Videos</h5>
			<p>
				 Visite la galería de videos de El Castillo...
			</p>
			<div class="portofoliothumb">
				<div class="portofoliothumboverlay threeoverlay">
					<div class="viewgallery threegallery">
						
					</div>
					<div class="inner threedetail">
						<a class="projectdetail" href="video_castillo.php">+ Ver videos</a>
					</div>
				</div>
				
				<img src="images/temp/ubicacion.jpg" class="threeimage" alt=""/>
			</div>
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
<script src="javascripts/jquery.isotope.min.js"></script>
<script src="javascripts/jquery.prettyPhoto.js"></script>
<script src="javascripts/custom.js"></script>
</body>
</html>