<?php
function enviar_correo_remember($NombreUsuario, $ApellidoUsuario, $CorreoUsuario, $ContrasenaUsuario){


header ('Content-type: text/html; charset=utf-8; lang="es"');

/*  echo"<script type=\"text/javascript\">
  alert('$CorreoUsuario'); </script>"; */


$mensaje = '<head>
<!-- If you delete this meta tag, the ground will open and swallow you. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<style type="text/css">
/* ------------------------------------- 
        GLOBAL 
------------------------------------- */
* { 
    margin:0;
    padding:0;
}
* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

img { 
    max-width: 100%; 
}
.collapse {
    margin:0;
    padding:0;
    font-family: "Comic Sans MS";
}
body {
    -webkit-font-smoothing:antialiased; 
    -webkit-text-size-adjust:none; 
    width: 100%!important; 
    height: 100%;
}


/* ------------------------------------- 
        ELEMENTS 
------------------------------------- */
a { color: #2BA6CB;}

.btn {
    text-decoration:none;
    color: #FFF;
    background-color: #666;
    padding:10px 16px;
    font-weight:bold;
    margin-right:10px;
    text-align:center;
    cursor:pointer;
    display: inline-block;
}

p.callout {
    padding:15px;
    background-color:#ECF8FF;
    margin-bottom: 15px;
}
.callout a {
    font-weight:bold;
    color: #2BA6CB;
}

table.social {
/*  padding:15px; */
    background-color: #ebebeb;
    
}
.social .soc-btn {
    padding: 3px 7px;
    font-size:12px;
    margin-bottom:10px;
    text-decoration:none;
    color: #FFF;font-weight:bold;
    display:block;
    text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.gp { background-color: #DB4A39!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
    display:block;
    width:100%;
}

/* ------------------------------------- 
        HEADER 
------------------------------------- */
table.head-wrap { width: 100%;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}


/* ------------------------------------- 
        BODY 
------------------------------------- */
table.body-wrap { width: 100%;}


/* ------------------------------------- 
        FOOTER 
------------------------------------- */
table.footer-wrap { width: 100%;    clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
    font-size:10px;
    font-weight: bold;
    
}


/* ------------------------------------- 
        TYPOGRAPHY 
------------------------------------- */
h1,h2,h3,h4,h5,h6 {
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;}
h4 { font-weight:500; font-size: 23px;}
h5 { font-weight:900; font-size: 17px;}
h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

.collapse { margin:0!important;}

p, ul { 
    margin-bottom: 10px; 
    font-weight: normal; 
    font-size:14px; 
    line-height:1.6;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
    margin-left:5px;
    list-style-position: inside;
}

/* ------------------------------------- 
        SIDEBAR 
------------------------------------- */
ul.sidebar {
    background:#ebebeb;
    display:block;
    list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
    text-decoration:none;
    color: #666;
    padding:10px 16px;
/*  font-weight:bold; */
    margin-right:10px;
/*  text-align:center; */
    cursor:pointer;
    border-bottom: 1px solid #777777;
    border-top: 1px solid #FFFFFF;
    display:block;
    margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}


/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
.container {
    display:block!important;
    max-width:600px!important;
    margin:0 auto!important; /* makes it centered */
    clear:both!important;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
    padding:15px;
    max-width:600px;
    margin:0 auto;
    display:block; 
}

.content table { width: 100%; }


/* Odds and ends */
.column {
    width: 300px;
    float:left;
}
.column tr td { padding: 15px; }
.column-wrap { 
    padding:0!important; 
    margin:0 auto; 
    max-width:600px!important;
}
.column table { width:100%;}
.social .column {
    width: 280px;
    min-width: 279px;
    float:left;
}

/* Be sure to place a .clear element after each set of columns, just to be safe */
.clear { display: block; clear: both; }


/* ------------------------------------------- 
        PHONE
        For clients that support media queries.
        Nothing fancy. 
-------------------------------------------- */
@media only screen and (max-width: 600px) {
    
    a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

    div[class="column"] { width: auto!important; float:none!important;}
    
    table.social div[class="column"] {
        width:auto!important;
    }

}
       
        </style>

</head>
 
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#FFFFFF">
    <tr>
        <td></td>
        <td class="header container" align="">
            
            <!-- /content -->
            <div class="content">
                <table bgcolor="#999999" >
                    <tr>
                        <td><img src="http://infonica.tk/images/infonica_logo.png" width="100px"/></td>
                        <td align="left"><h1 class="collapse">InfoNica</h1></td>
                    </tr>
                </table>
            </div><!-- /content -->
            
        </td>
        <td></td>
    </tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table class="body-wrap" bgcolor="">
    <tr>
        <td></td>
        <td class="container" align="" bgcolor="#FFFFFF">
            
            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td>
                            
                            <h1>Excelente Usuario!</h1>
                            <p class="lead">Bienvenid@ a InfoNica, esperamos que todo el contenido disponible en nuestro sitio web sea 
                            de su completo agrado</p>
                            
                            <!-- A Real Hero (and a real human being) -->
                         <!--    <p><img src="http://infonica.tk/images/Castillo.jpg" /></p>/hero -->
                            <p>InfoNica es un sitio web donde podrá encontrar información, fotografías, videos y enlaces de interés sobre el
                            municipio de El Castillo</p>
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->
            
            <!-- content -->
            <div class="content">
                
                <table bgcolor="">
                    <tr>
                        <td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="http://infonica.tk/images/login.png" /></td>
                        <td>
                            <h4>Estos son sus datos de usuario de <strong><a href="#">InfoNica</a></strong></h4>';

                  $mensaje.="<p class=\"\"><strong>Nombre: </strong>".$NombreUsuario."</p>
                            <p class=\"\"><strong>Apellido: </strong>".$ApellidoUsuario."</p>
                            <p class=\"\"><strong>Correo Electrónico*: </strong>".$CorreoUsuario."</p>
                            <p class=\"\"><strong>Contreseña: </strong>".$ContrasenaUsuario."</p>";
                    
                    $mensaje.='</td>
                    </tr>
                </table>
            
            </div><!-- /content -->
            
            
            
            <!-- content -->
            <div class="content">
                <table bgcolor="">
                    <tr>
                        <td>
                            
                            <!-- social & contact -->
                            <table bgcolor="" class="social" width="100%">
                                <tr>
                                    <td>
                                        
                                        <!--- column 1 -->
                                        <div class="column">
                                            <table bgcolor="" cellpadding="" align="left">
                                        <tr>
                                            <td>                
                                                
                                                <h5 class="">Encuéntranos en las redes sociales:</h5>
                                                <p class=""><a href="https://www.facebook.com/InfoNica" class="soc-btn fb">Facebook</a> 
                                               <!-- <a href="#" class="soc-btn tw">Twitter</a> -->
                                                <a href="https://www.youtube.com/channel/UC_DLrtR8w5_t-_zn9fVeOUQ" class="soc-btn gp">Youtube</a></p>
                        
                                                
                                            </td>
                                        </tr>
                                    </table><!-- /column 1 -->
                                        </div>
                                        
                                        <!--- column 2 -->
                                        <div class="column">
                                            <table bgcolor="" cellpadding="" align="left">
                                        <tr>
                                            <td>                
                                                                            
                                                <h5 class="">También puede contactarnos a:</h5>                                             
                                                <p>Teléfono: <strong>(+505) 8888 8888</strong><br/>
                                                Correo Electrónico: <strong><a href="emailto:admin@infonica.">admin@infonica.tk</a></strong></p>
                
                                            </td>
                                        </tr>
                                    </table><!-- /column 2 -->  
                                        </div>
                                        
                                        <div class="clear"></div>
    
                                    </td>
                                </tr>
                            </table><!-- /social & contact -->
                            
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->
            

        </td>
        <td></td>
    </tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">
            
                <!-- content -->
                <div class="content">
                    <table>
                        <tr>
                            <td align="center">
                                <p>
                                    <a href="#">Terminos</a> |
                                    <a href="#">Privacidad</a> |
                                    <a href="#"><unsubscribe>Dejar de seguirnos</unsubscribe></a>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div><!-- /content -->
                
        </td>
        <td></td>
    </tr>
</table><!-- /FOOTER -->

</body>
</html>'; 


$para      =  $CorreoUsuario;
$asunto    = 'Datos cuenta InfoNica';
$cabeceras = 'From: admin@infonica.tk' . "\r\n" .
             'Reply-To: admin@infonica.tk' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
//$cabeceras .= 'Content-Type: text/html; charset=ISO 8859-1' . "\r\n";
$cabeceras .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

 
  
if(mail($para, $asunto, $mensaje, $cabeceras)) {

          echo("ingresar.php?remember=success"); 
           exit;
} else {
   echo("ingresar.php?remember=error"); 
           exit;
}

}



?>





