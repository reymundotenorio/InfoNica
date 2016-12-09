


<?php 

include_once("expirar_sesion.php");

if (empty($_SESSION["Usuario"]) ){
  echo"<script type=\"text/javascript\">
  window.location='index.php';
 // location.href = 'index.php'; 
</script>"; 
 // header('Location:index.php'); 


}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8" lang="es">


  <title>InfoNica - Modificar datos</title>


  <link rel="shortcut icon" href="images/infonica_logo.png" />


  <link rel="stylesheet" href="stylesheets/normalize_singup.css">

  <link rel='stylesheet prefetch' href='stylesheets/font-awesome.min.css'>

  <link rel="stylesheet" href="stylesheets/style_singup.css">

  <link rel="stylesheet" href="stylesheets/vegas.css">

  <!-- CSS -->
  <link rel="stylesheet" href="stylesheets/fancybox/jquery.fancybox-buttons.css">
  <link rel="stylesheet" href="stylesheets/fancybox/jquery.fancybox-thumbs.css">
  <link rel="stylesheet" href="stylesheets/fancybox/jquery.fancybox.css">

  <!--webfonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,800,400' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
  <!--//webfonts-->

  <script src='javascripts/jquery.min.js'></script>


  <script src="javascripts/jquery.vegas.js"></script>

  <style type="text/css">
    .demo-pricing {
      margin-top: 10px;
      margin-right: 10px;
      padding: 14px 26px;
      font-size: 14px;
      line-height: 100%;
      text-shadow: 0 1px rgba(0, 0, 0, 0.4);
      color: #fff;
      display:inline-block;
      vertical-align: middle;
      text-align: center;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.1s ease-in-out;
      -webkit-transition: background 0.1s ease-in-out;
      -moz-transition: background 0.1s ease-in-out;
      -ms-transition: background 0.1s ease-in-out;
      -o-transition: background 0.1s ease-in-out;
      text-shadow: 0 1px rgba(0, 0, 0, 0.3);
      color: #fff;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      font-family: 'Helvetica Neue', Helvetica, sans-serif;
    }
    .demo-pricing:active {
      padding-top: 15px;
      margin-bottom: -1px;
    }
    .demo-pricing, .demo-pricing:hover, .demo-pricing:active {
      outline: 0 none;
      text-decoration: none;
      color: #fff;
    }

    .demo-pricing-1 {
      background-color: #3fb8e8;
      box-shadow: 0px 3px 0px 0px #3293ba;
    }


    .demo-pricing-1:hover {
      background-color: #1baae3;
    }
    .demo-pricing-1:active {
      box-shadow: 0px 1px 0px 0px #3293ba;
    }


    .demo-pricing-2 {
      background-color: #f06060;
      box-shadow: 0px 3px 0px 0px #cd1313;
    }
    .demo-pricing-2:hover {
      background-color: #ed4444;
    }
    .demo-pricing-2:active {
      box-shadow: 0px 1px 0px 0px #cd1313;
    }

    .demo-pricing-3 {
      background-color: #ff6a80;
      box-shadow: 0px 3px 0px 0px #da0020;
    }
    .demo-pricing-3:hover {
      background-color: #ff566f;
    }
    .demo-pricing-3:active {
      box-shadow: 0px 1px 0px 0px #da0020;
    }

  </style>




  <!-- -->
  <script src="javascripts/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="stylesheets/sweetalert.css">
  <!--.......................-->

</head>

<body>

 <script src="javascripts/demo_vegas.js"></script>

 <div class="logmod">
  <div class="logmod__wrapper">
   <a href="index.php"><span class="logmod__close">Cerrar</span></a>
   <div class="logmod__container">

     <?php 

     include_once("conectar.php");
     $conexion = new Conexion();
     $conexion->Conectarmysql();
     $con = $conexion->Conectar;

     $IDUsuario = $_SESSION["ID_Usuario"];

     $resultado = mysqli_query($con,"SELECT Nombre_Usuario, Apellido_Usuario, Correo_Usuario, Foto_Usuario FROM Usuario WHERE (ID_Usuario = '$IDUsuario')");
     $rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

     $Nombre = $rows["Nombre_Usuario"];
     $Apellido = $rows["Apellido_Usuario"];
     $Correo = $rows["Correo_Usuario"];
     $Foto = $rows["Foto_Usuario"];


     ?>

     <ul class="logmod__tabs">
      <li data-tabtar="lgm-1"><h2 style="margin-left: 20px;">Cuenta personal</h2></li>
      <div class="gravatar">
        <img  id="blah" width=128px; height=128px; style="float: left; margin-left: 20px; margin-bottom: 20px;" src=<?php echo $Foto?> alt="">
      </div>
    </ul>


    <form enctype='multipart/form-data' action='' method='post'>
      <input  onchange="readURL(this);" name='perfilusFile'  type='file' style="margin-left: 20px; float: left; background-color:gray; color:white;
      border: 2px solid #4CAF50; outline:none; display:block;"><br>
      <input  type='submit'  value='Guardar foto' style="margin-top: 10px; margin-right: 10px; 
      margin-bottom: 10px; margin-left: 20px; float:right; padding: 10px; color:#FFFFFF; border: none; background: none; background-color: #4CAF50;">
    </form>

    <?php


    if(!empty($_FILES['perfilusFile'])){

      $NFoto = uniqid();

      $target_path = "perfilus/";

      if ($_FILES['perfilusFile']['type'] =="image/jpeg" ){
        $NFoto.=".jpg";
      }
      if($_FILES['perfilusFile']['type'] =="image/gif"){
        $NFoto.=".gif";
      }
      if($_FILES['perfilusFile']['type'] =="image/png"){
        $NFoto.=".png";
      }

    //  $target_path = $target_path . basename( $_FILES['perfilusFile']['name']); 
      $target_path = $target_path . basename($NFoto); 
      $perfilusFileload="true";

      if (!($_FILES['perfilusFile']['type'] =="image/jpeg" OR $_FILES['perfilusFile']['type'] =="image/gif" OR $_FILES['perfilusFile']['type'] =="image/png"))
      {
         echo "<script type=\"text/javascript\">
      window.location='datos_usuario.php?data=pic_format';
          </script>";
        $perfilusFileload="false";
                exit;
      }


      if ($_FILES['perfilusFile']['size']>2097152)
      {
        echo "<script type=\"text/javascript\">
      window.location='datos_usuario.php?data=pic_size';
          </script>";
        $perfilusFileload="false";
                exit;
      }


      if($perfilusFileload=="true"){

        if(move_uploaded_file($_FILES['perfilusFile']['tmp_name'], $target_path)) 
        { 
          unset($_FILES['perfilusFile']);
          include_once("actualizar_foto.php");
          $ID_Usuario = $_SESSION["ID_Usuario"];
          Actualizar_Foto_Perfil($ID_Usuario,$target_path);
          echo "<span style='color:green;'>El archivo ". basename($NFoto). " ha sido subido</span><br>";

        }else{
          unset($_FILES['perfilusFile']);
          unset($_FILES['perfilusFile']);
          echo "Ha ocurrido un error, trate de nuevo!";
        } 
      }
    }
    ?>


    <!--REGISTRAR-->



    <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">
        <div class="logmod__heading">
          <!--  <span class="logmod__heading-subtitle">Datos personales <strong>de tu cuenta en InfoNica</strong></span> -->
        </div>
        <div class="logmod__form">
          <form accept-charset="utf-8"  id="Modificar_Cuenta" action="modificar_cuenta.php"  method ="post" class="simform">

            <input type="hidden" name="ID_Usuario" value=<?php echo $IDUsuario; ?> >

            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Nombre </label>
                <input class="string optional" value=<?php echo $Nombre; ?> maxlength="50" id="user-name" name="user-name" placeholder="Nombre" type="text"  size="50" required="required" title="Ingrese Nombre" />
              </div>
            </div>


            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Apellido </label>
                <input class="string optional" value=<?php echo $Apellido; ?>  maxlength="50" id="user-lastname" name="user-lastname" placeholder="Apellido"  type="text" size="50" required="required" title="Ingrese Apellido"/>
              </div>
            </div>

            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Correo Electrónico</label>
                <input class="string optional" value=<?php echo $Correo; ?> maxlength="100" id="user-email" name="user-email" placeholder="Correo Electrónico" type="email" size="50" required="required" title="Ingrese Correo Electrónico"
                readonly/>
              </div>
            </div>

          </form>

          <div class="simform__actions">

           <button class="sumbit" onclick="ModificarCuenta();" >Modificar Datos</button>

         </div>

         <div class="simform__actions">
           <span class="simform__actions-sidetext">
            <button class="special" onclick="DesactivarCuenta();" style="border: none; background: none;" >Desactivar cuenta</button>
          </span>
          <span class="simform__actions-sidetext"><a class="special" role="link"
            id="MostrarFormulario" title="Cambiar contraseña" href="#login_form">Cambiar contraseña</a>
          </span>
        </div> 

        <form id="Desactivar_Cuenta" method="post" action="desactivar_cuenta.php">
          <input type="hidden" name="ID_Usuario" value=<?php echo $IDUsuario; ?> >
        </form>


      </div> 
    </div>

    <script src="javascripts/index_singup.js"></script>

    <div style="display:none">

      <form id="login_form" method="post" action="cambiar_contrasena.php" style="background-color: #4CAF50; border:30px; padding: 30px;">
        <!-- text-decoration: underline; -->
        <h3 style="color:#FFFFFF; padding-bottom: 20px;">CAMBIAR CONTRASEÑA</h3>
        <label style="font-weight: bold; color:#FFFFFF;">Contraseña actual:</label>
        <p><input type="password" class="Password" placeholder="Contraseña actual" name="OldPass" required/></p> 
        <label style="font-weight: bold; color:#FFFFFF;">Nueva contraseña:</label>
        <p> <input type="password" class="Password" placeholder="Nueva contraseña" name="NewPass" required/></p> 
        <label style="font-weight: bold; color:#FFFFFF;">Repetir contraseña:</label>
        <p>  <input type="password" class="Password" placeholder="Confirmar contraseña" name="ConfirmPass" required/></p>
        <input type="hidden" name="ID_Usuario" value=<?php echo $IDUsuario; ?> >
        <p>  <div class="btn"><input class="demo-pricing demo-pricing-1" type="submit" value="Aceptar" ></div></p>

      </form> 
      <div class="clear"> </div>
    </div>

    <!-- JavaScript at the bottom for fast page loading -->
    <!-- ********************************************** -->

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





    <!-- FORMULARIO FANCY -->


    <script type="text/javascript">
      $("#MostrarFormulario").fancybox({
        'scrolling'   : 'auto',
        'titleShow'   : false,
        'onClosed'    : function() {
          $("#login_error").hide();
        }
      });
    </script>

    <!-- FORMULARIO FANCY --> 

    <script type="text/javascript">

      <?php 


      $RutaF = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);


      ?>

      <?php 
      if(!empty($_GET["data"])){
        ?>
        swal({

          <?php if($_GET["data"] == 'pic_success'){?>
            title: "Foto de perfil actualizada!",
            text: "Su fotografía de perfil ha sido actualizada con exito!",
            type: "success",
            <?php } ?>

            <?php if($_GET["data"] == 'pic_error'){?>
              title: "Foto de perfil no actualizada!",
              text: "Su fotografía de perfil no pudo ser actualizada, inténtelo nuevamente más tarde!",
              type: "error",
              <?php } ?>

               <?php if($_GET["data"] == 'pic_format'){?>
              title: "Formato de imágen inválido!",
              text: "Su archivo seleccionado tiene que ser JPG, GIF o PNG. Otros archivos no son permitidos!",
              type: "error",
              <?php } ?>

               <?php if($_GET["data"] == 'pic_size'){?>
              title: "Tamaño de fotografía muy grande!",
              text: "Su archivo es mayor que 2MB, debes reduzcirlo antes de subirlo, inténtelo nuevamente más tarde!",
              type: "error",
              <?php } ?>

              <?php if($_GET["data"] == 'data_success'){?>
                title: "Perfecto!",
                text: "Sus datos de usuario han sido actualizados con exito!",
                type: "success",
                <?php } ?>

                <?php if($_GET["data"] == 'data_error'){?>
                  title: "Lo sentimos!",
                  text: "Sus datos de usuario no pudieron actualizarse, inténtelo nuevamente más tarde!",
                  type: "error",
                  <?php } ?>

                  <?php if($_GET["data"] == 'pass_success'){?>
                    title: "Perfecto!",
                    text: "Su contraseña ha sido actualizada con exito!",
                    type: "success",
                    <?php } ?>

                    <?php if($_GET["data"] == 'pass_error'){?>
                      title: "Lo sentimos!",
                      text: "Su contraseña no pudo actualizarse, inténtelo nuevamente más tarde!",
                      type: "error",
                      <?php } ?>

                      <?php if($_GET["data"] == 'pass_old_error'){?>
                        title: "Su contraseña actual no coincide!",
                        text: "Debe ingresar su contraseña actual correctamente!",
                        type: "error",
                        <?php } ?>

                        <?php if($_GET["data"] == 'pass_new_not_equals'){?>
                          title: "Contraseña nueva no coincide con su confimación!",
                          text: "Debe coincidir su nueva contraseña con la contraseña de confimación!",
                          type: "warning",
                          <?php } ?>

                          closeOnConfirm: false
                        },
                        function(){
                         window.location='<?php echo $RutaF  ?>';
                       });

<?php } ?>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah')
      .attr('src', e.target.result)
      .width(128)
      .height(128);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function DesactivarCuenta(){
 swal({
  title: "Está seguro que desea desactivar su cuenta?",
  text: "No será capaz de restaurarla en el futuro!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Si, desactivar mi cuenta!',
  cancelButtonText: "No, cancelar por favor!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm){
    swal("Cancelada!", "Tu cuenta ha sido cancelada!", "success");
    document.forms['Desactivar_Cuenta'].submit();
  } else {
    swal("Cancelado", "Tu cuenta está a salvo :)", "error");
  }
});
};


function ModificarCuenta(){
 swal({
  title: "Está seguro que desea modificar sus datos?",
  text: "Solamente su Nombre y Apellido serán actualizados!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Si, modificar mis datos!',
  cancelButtonText: "No, cancelar por favor!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm){
    swal("Listo!", "Los datos de tu cuenta han sido modificados con exito!", "success");
    document.forms['Modificar_Cuenta'].submit();
  } else {
    swal("Cancelado", "Tus datos están a salvo :)", "error");
  }
});
};


</script>


</body>
</html>
