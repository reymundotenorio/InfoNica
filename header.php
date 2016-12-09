<!--
 <script type="text/javascript" src="javascripts/jquery.min.js"></script>

<script type="text/javascript">
jQuery.noConflict();
jQuery(function (){
jQuery(".slide_likebox").hover(function(){
jQuery(".slide_likebox").stop(true, false).animate({right:"0"},"medium");
},function(){
jQuery(".slide_likebox").stop(true, false).animate({right:"-250"},"medium");
},500);
return false;
});
</script>


<style type="text/css">
    .slide_likebox {
float:right;
width:288px;
height:345px; 
background: url(https://lh6.googleusercontent.com/-VW_GzzYnZJ0/TkiZQFcBc2I/AAAAAAAABmg/fa9_qWV8Cu4/fb_bg.png) no-repeat !important;
display:block;
right:-250px;
padding:0;
position:fixed;
top: 130px;
z-index:1002;
border-radius:10px;
-moz-border-radius:10px; 
-webkit-border-radius:10px; 
}
div.likeboxwrap {
margin-top:2px;
margin-left:-5px;
width:238px; 
height:325px;
background-color:#fff;
overflow:hidden;
border-radius:10px;
-moz-border-radius:10px; 
-webkit-border-radius:10px; 
}
div.likeboxwrap iframe {margin:-1px}

</style>


<div class="slide_likebox"> <div style="color: rgb(255, 255, 255); padding: 8px 5px 0pt 50px;">
<span><div class='likeboxwrap'><iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Finfonica
&amp;width=240&amp;colorscheme=light&amp;connections=15&amp;stream=false&amp;header=false&amp;height=350" scrolling="no" frameborder="0" 
style="border:none; overflow:hidden; width:240px; height:320px;" allowtransparency="true"></iframe></div></span></div></div>

-->

<?php 
include_once("expirar_sesion.php");
?>


<!-- HIDDEN PANEL 
    ================================================== -->
    <div id="panel">
        <div class="row">
            <div class="twelve columns">
                <img src="images/world.png" class="pics" alt="info" width="48px" height="48px" style="margin-top: -8px;">
                <div class="infotext">


                    <?php 
                    include_once("pais.php");
                    $pais = ip_info("Visitor", "Country");
                    $ciudad = ip_info("Visitor", "City");
                    echo ("Usted nos visita desde ".$ciudad.", ".$pais."\n");
                    ?>

                   

                </div>
            </div>
        </div>
    </div>
    <p class="slide">
        <a href="#" class="btn-slide"></a>
    </p>
<!-- HEADER
    ================================================== -->
    <div class="row" style=" min-width: 100%">
        <div class="headerlogo four columns">
            <div class="logo">
                <a href="index.php">
                    <img id="logo-img" style="margin-top: -22px;" src="images/infonica_logo.png" width="88px" height="83px"  class="pics" alt="Logo">
                    <h2  style="font-family: 'Comic Sans MS'">InfoNica</h2>
                </a>


                <ul class="nav-bar sf-menu menu-ingresar" id="ingre-nav">


                    <li>
                       <?php 
                       if (!empty($_SESSION["Usuario"]) ){
                        echo "<a id=\"ingresar-f\" href=\"#\">";
                    }
                    else{ 
                       echo "<a id=\"ingresar-f\" href=\"ingresar.php\">";
                   } ?>

                   <?php 
                   include_once("conectar.php");
                   $conexion = new Conexion();
                   $conexion->Conectarmysql();
                   $con = $conexion->Conectar;

                   $IDUsuario = $_SESSION["ID_Usuario"];

                   $resultado = mysqli_query($con,"SELECT Foto_Usuario FROM Usuario WHERE (ID_Usuario = '$IDUsuario')");
                   $rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

                   $Foto = $rows["Foto_Usuario"]; ?>




                   
                   <?php 
                   if (!empty($_SESSION["Usuario"]) ){
                    ?>

                    <img id="ingresar-img" src=<?php echo $Foto; ?> class="pics" alt="iniciar" height="32px" width="32px">

                    <?php 

                    $NombreUsuario = $_SESSION["Usuario"];
                    echo "$NombreUsuario";
                }
                else{
                    ?>

                    <img id="ingresar-img" src="images/avatar.png" class="pics" alt="iniciar" height="22px" width="22px">

                    <?php 
                    echo "Ingresar";
                }
                ?>
            </a>
            <ul>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                <li><a href="datos_usuario.php">Cuenta</a></li>
                <?php if($_SESSION["Rol"] == 'Admin'){?>
             <li><a href="administrar.php">Administrar</a></li>
             <?php } ?>
            </ul>
            </ul>
        </li>
    </ul>
</div>
</div>
<div class="headermenu eight columns noleftmarg">
    <nav id="nav-wrap">
        <ul id="main-menu" class="nav-bar sf-menu">
            <li class="current">
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="seleccion_informacion.php">Información</a>
                <ul>
                    <li><a href="info_atractivostours.php">Atractivos turísticos</a></li>
                    <li><a href="info_historia.php">Historia</a></li>
                    <li><a href="info_castillo.php">Ubicación</a></li>
                </ul>
            </li>
            <li>
                <a href="seleccion_galeria.php">Galería</a>
                <ul>
                    <li><a href="seleccion_tipo_imagenes.php">Imagenes</a></li>
                    <li><a href="video_castillo.php">Videos</a></li>             
                </ul>
            </li>
            <!--<li>
            <a href="seleccion_videos.php">Videos</a>
            <ul>
                <li><a href="video_castillo.php">El Castillo</a></li>
            </ul>
        </li> -->

        <li>
            <a href="contactenos.php">Contacto</a>
        </li>  
        <li style ="margin-left: 25px;" id="ingresar">
            <?php 
            if (!empty($_SESSION["Usuario"]) ){
                echo "<a  href=\"#\">";
            }
            else{ 
               echo "<a href=\"ingresar.php\">";
           } ?>


           <?php 
           if (!empty($_SESSION["Usuario"]) ){

            ?>

            <img id="ing" src=<?php echo $Foto; ?> style="margin-top: 5px;" class="pics" alt="login" height="32px" width="32px">
            <?php 
            $NombreUsuario = $_SESSION["Usuario"];
            echo "$NombreUsuario";
        }
        else{
            ?>
            <img id="ingresar-img" src="images/avatar.png" class="pics" alt="iniciar" height="22px" width="22px">
            <?php 

            echo "Ingresar";
        }
        ?>
    </a> 

    <?php  if (!empty($_SESSION["Usuario"]) ){
        ?>

        <ul>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
            <li><a href="datos_usuario.php">Cuenta</a></li>
            <?php if($_SESSION["Rol"] == 'Admin'){ ?>
             <li><a href="administrar.php">Administrar</a></li>
             <?php } ?>

        </ul>

        <?php } ?>

    </li>  
</ul>
</nav>

</div>
</div>
<div class="clear">
</div>



