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

    <title>InfoNica - Inicio</title>
    <!-- CSS Files-->
    <link rel="stylesheet" href="stylesheets/style.css">

    <link rel="stylesheet" href="stylesheets/skins/yellow.css">
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
<!-- <body oncontextmenu="return false" onkeydown="return false"> -->
<body>

    <!-- Include Header -->
    <?php
    include_once("header.php");
    ?>


<!-- SLIDER
    ================================================== -->
    <div id="ei-slider" class="ei-slider">
       <ul class="ei-slider-large">
          <li>
              <img src="images/temp/castillo.jpg" alt="El Castillo" class="responsiveslide">
              <div class="ei-title">
                 <h2>El Castillo</h2>
                 <h3>Río San Juan, Nicaragua</h3>
             </div>
         </li>
         <li>
          <img src="images/temp/castillo2.jpg" alt="El Castillo2" class="responsiveslide">
          <div class="ei-title">
             <h2>Historia</h2>
             <h3>El Castillo Río San Juan</h3>
         </div>
     </li>
     <li>
      <img src="images/temp/castillo3.jpg" alt="El Castillo3" class="responsiveslide">
      <div class="ei-title">
         <h2>Paisaje natural</h2>
         <h3>El Castillo, Río San Juan</h3>
     </div>
 </li>
</ul>
<!-- slider-thumbs -->
<ul class="ei-slider-thumbs">
  <li class="ei-slider-element">Current</li>
  <li><a href="#">Slide 1</a><img src="images/temp/castillo.jpg" class="slideshowthumb" alt="Ubicación"/></li>
  <li><a href="#">Slide 2</a><img src="images/temp/castillo2.jpg" class="slideshowthumb" alt=" Historia"/></li>
  <li><a href="#">Slide 3</a><img src="images/temp/castillo3.jpg" class="slideshowthumb" alt="Clima"/></li>
</ul>
</div>
<div class="minipause">
</div>
<!-- SUBHEADER
    ================================================== -->
    <div id="subheader">
       <div class="row">
          <div class="twelve columns">
             <p class="text-center">
               "La historia en presente puede hablar"
           </p>
           <p class="text-center">
            <audio controls style="margin: 0 auto; max-width: 200px;">

                  <source src="audio/CorridoRS.M4A" type="audio/mp4">
                   Tu navegador no soporta reproducción de audio
                </audio>
            </p>
        </div>
    </div>
</div>
<!-- ANIMATED COLUMNS
    ================================================== -->
    <div class="row">
       <div class="twelve columns">
          <ul class="ca-menu">

            <li>
             <a href="contactenos.php#enviarMensaje">
                 <span class="ca-icon"><i class="fa fa-home"></i></span>
                 <div class="ca-content">
                    <h2 class="ca-main">Descubre<br/> ¿Qué te parece nuestra página?</h2>
                    <h3 class="ca-sub" style="font-family: 'Comic Sans MS'">Es una buena opción?, comenta  </h3>
                </div>
            </a>
        </li>

        <li>
         <a href="seleccion_tipo_imagenes.php">
             <span class="ca-icon"><i class="fa fa-camera-retro"></i></span>
             <div class="ca-content">
                <h2 class="ca-main">Observa<br/> nuestra bella naturaleza</h2>
                <h3 class="ca-sub" style="font-family: 'Comic Sans MS'">Mira en nuestra galería</h3>
            </div>
        </a>
    </li>


    <li>
     <a href="video_castillo.php">
         <span class="ca-icon"><i class="fa fa-film"></i></span>
         <div class="ca-content">
            <h2 class="ca-main">Vive<br/> la experiencia de visitarnos</h2>
            <h3 class="ca-sub" style="font-family: 'Comic Sans MS'">Reproduce los mejores videos</h3>
        </div>
    </a>
</li>

<li>
 <a href="seleccion_informacion.php">
     <span class="ca-icon"><i class="fa fa-location-arrow"></i></span>
     <div class="ca-content">
        <h2 class="ca-main">Visita<br/> y sorpréndete de la riqueza de Nicaragua</h2>
        <h3 class="ca-sub" style="font-family: 'Comic Sans MS'">Localiza nuestros bellos destinos</h3>
    </div>
</a>
</li>
</ul>
</div>
</div>
<!-- CONTENT
    ================================================== -->
    <div class="row">
       <div class="twelve columns">
          <div class="centersectiontitle">
             <h4>Conócenos</h4>
         </div>
     </div>
     <div class="four columns">


     <img src="images/temp/ubicacion.jpg" width="100%" height="100%"  class="threeimage" alt=""/>


      <h5>El Castillo- Ubicación</h5>
      <p> <b> El Castillo está ubicado en las orillas del Río San Juan</b><br>
        Si sale desde Managua o Granada, el trayecto se hace en avión, carro o barco hasta San Carlos,
        y desde San Carlos se toma una de las lanchas que diariamente llegan hasta El Castillo....</p>
        <p>
         <a href="info_castillo.php#ubicacion" class="readmore">Leer más</a>
     </p>
 </div>
 <div class="four columns">

   <img src="images/temp/historia.jpg" width="100%" height="100%"  class="threeimage" alt=""/>

  <h5>El castillo - Historia</h5>
  <p>
     <b> El Castillo además de belleza natural también es rica en historia</b> <br>
     El Castillo de la Inmaculada Concepción es una fortaleza de la época colonial,
     fue construida a finales del siglo XVII sobre las ruinas de una antigua fortaleza de la época del rey Felipe II de España....
 </p>
 <p>
     <a href="info_historia.php" class="readmore">Leer más</a>
 </p>
</div>
<div class="four columns">


   <img src="images/temp/turismo.jpg" width="100%" height="100%" class="threeimage" alt=""/>


  <h5>El Castillo - Atractivos turísticos</h5>
  <p>
      <b> El Castillo posee abundantes atractivos turísticos</b> <br>
      Un pueblo pintoresco, con su antigua fortaleza colonial y sus locales de servicios turísticos, los cuales ofrecen TOURS a las personas
      que los visitan frecuentemente, sean estos nacionales o extranjeros...
  </p>
  <p>
     <a href="info_managua.php" class="readmore">Leer más</a>
 </p>
</div>
</div>
<div class="hr">
</div>
<!-- TESTIMONIALS
    ================================================== -->
    <div class="row">
       <div class="twelve columns">
          <div id="testimonials">
             <blockquote>
                <p>
                    "Hemos aprendido a volar como los pájaros, a nadar como los peces; pero no hemos aprendido el sencillo arte de vivir como hermanos."<cite>Martín Luther King</cite>
                </p>
            </blockquote>
            <blockquote>
                <p>
                    "El modo de valorar el grado de educación de un pueblo y de un hombre es la forma como tratan los animales."<cite>Berthold Averbach</cite>
                </p>
            </blockquote>
            <blockquote>
                <p>
                  "Produce una inmensa tristeza pensar que la naturaleza habla mientras el género humano no escucha." <cite>Hugo, Victor</cite>
              </p>
          </blockquote>
          <blockquote>
            <p>
              "Si supiera que el mundo se acaba mañana, yo, hoy todavía, plantaría un árbol." <cite>Martín Luther King</cite>
          </p>
      </blockquote>
  </div>
  <!--end testimonials-->
</div>
</div>


<div class="powr-hit-counter" label="Visitas"></div>

<!--<div class="powr-weather" label="1563681"></div> -->

<!-- Include Header -->
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


        $RutaF = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);


        ?>

        <?php
        if(!empty($_GET["session"])){
            ?>
            swal({
                <?php if($_GET["session"] == 'start' AND !empty($_SESSION["Usuario"])) { ?>
                    title: "Bienvenido a Infonica!",
                    text: "<?php echo $_SESSION["Usuario_Name"]; ?>",
                    imageUrl: 'images/thumbs-up.jpg',
                    timer: 2000,
                    showConfirmButton: false,
                    <?php } ?>

                    <?php if($_GET["session"] == 'exit' AND empty($_SESSION["Usuario"])){?>
                        title: "Hasta pronto!",
                        text: "Muchas gracias por su visita!",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        <?php } ?>

                        <?php if($_GET["session"] == 'confirm' AND empty($_SESSION["Usuario"])){?>
                            title: "Lo sentimos!",
                            text: "Usted aun no ha activado su cuenta desde su correo electrónico!",
                            imageUrl: 'images/email.png',
                            <?php } ?>

                            <?php if($_GET["session"] == 'email' AND empty($_SESSION["Usuario"])){?>
                                title: "A sólo un paso!",
                                text: "Revise su correo electrónico para activar su cuenta!",
                                imageUrl: 'images/email.png',
                                <?php } ?>

                                <?php if($_GET["session"] == 'expire' AND empty($_SESSION["Usuario"])){?>
                                    title: "Su sesión a expirado!",
                                    text: "Inicie sesión nuevamente!",
                                    imageUrl: 'images/time.png',
                                    <?php } ?>

                                         <?php if($_GET["session"] == 'finished' AND empty($_SESSION["Usuario"])){?>
                                    title: "Lamentamos que nos hayas abandonado!",
                                    text: "Puedes seguir visitándonos cuando desees!",
                                    imageUrl: 'images/sad.png',
                                    <?php } ?>

                                    closeOnConfirm: false
                                },
                                function(){
                                  window.location='<?php echo $RutaF  ?>';
                              });

<?php } ?>


</script>

</body>
</html>
