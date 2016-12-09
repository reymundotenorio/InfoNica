<?php session_start();

if ( !empty($_SESSION["Usuario"]) ){
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
<!--
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
-->

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width"/>

  <title>InfoNica - Iniciar sesión | Registrarse</title>


  <link rel="shortcut icon" href="images/infonica_logo.png" />


  <link rel="stylesheet" href="stylesheets/normalize_singup.css">

  <link rel='stylesheet prefetch' href='stylesheets/font-awesome.min.css'>

  <link rel="stylesheet" href="stylesheets/style_singup.css">

  <link rel="stylesheet" href="stylesheets/vegas.css">

  <script src='javascripts/jquery.min.js'></script>


  <script src="javascripts/jquery.vegas.js"></script>


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
    <ul class="logmod__tabs">
      <li data-tabtar="lgm-2"><a href="#">Iniciar Sesión</a></li>
      <li data-tabtar="lgm-1"><a href="#">Registrarse</a></li>
    </ul>


    <!--REGISTRAR-->

    <div class="logmod__tab-wrapper">
      <div  class="logmod__tab lgm-1">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Ingrese sus datos personales <strong>para crear una cuenta</strong></span>
        </div>
        <div class="logmod__form">
          <form accept-charset="utf-8" action="registrar.php"  method ="post" class="simform">

           <div class="sminputs">
            <div class="input full">
              <label class="string optional" for="user-name">Nombre *</label>
              <input class="string optional" maxlength="50" id="user-name" name="user-name" placeholder="Nombre" type="text"  size="50" required="required" title="Ingrese Nombre" />
            </div>
          </div>


          <div class="sminputs">
            <div class="input full">
              <label class="string optional" for="user-name">Apellido *</label>
              <input class="string optional" maxlength="50" id="user-lastname" name="user-lastname" placeholder="Apellido"  type="text" size="50" required="required" title="Ingrese Apellido"/>
            </div>
          </div>

          <div class="sminputs">
            <div class="input full">
              <label class="string optional" for="user-name">Correo Electrónico *</label>
              <input class="string optional" maxlength="100" id="user-email" name="user-email" placeholder="Correo Electrónico" type="email" size="50" required="required" title="Ingrese Correo Electrónico"/>
            </div>
          </div>
          <div class="sminputs">
            <div class="input string optional">
              <label class="string optional" for="user-pw">Contraseña *</label>
              <input class="string optional" maxlength="100" id="user-pw" name="user-pw" placeholder="Contraseña" type="password" size="50" required="required" title="Ingrese Contraseña"/>
            </div>
            <div class="input string optional">
              <label class="string optional" for="user-pw-repeat">Repetir Contraseña *</label>
              <input class="string optional" maxlength="100" id="user-pw-repeat" name="user-pw-repeat" placeholder="Repetir Contraseña" type="password" size="50" required="required" title="Repita Contraseña"/>
            </div>
          </div>
          <div class="simform__actions">

            <button class="sumbit" type="submit" name="commit" >Crear Cuenta</button>
            <span class="simform__actions-sidetext">Al crear una cuenta estás de acuerdo con nuestros <a class="special" href="#" target="_blank" role="link">Términos y Políticas</a></span>
          </div> 
        </form>
      </div> 
    </div>

    <!--INICIAR SESION -->

    <div class="logmod__tab lgm-2">
      <div class="logmod__heading">
        <span class="logmod__heading-subtitle">Ingrese su Correo y Contraseña <strong>para Iniciar Sesión</strong></span>
      </div> 
      <div class="logmod__form">
        <form accept-charset="utf-8" action="iniciar_sesion.php" method="post" class="simform">
          <div class="sminputs">
            <div class="input full">
              <label class="string optional" for="user-name">Correo Electrónico *</label>
              <input class="string optional" maxlength="100" id="user-email" name="user-email" placeholder="Correo Electrónico" type="email" size="50" required="required"
              title="Ingrese Correo Electrónico"/>
            </div>
          </div>
          <div class="sminputs">
            <div class="input full">
              <label class="string optional" for="user-pw">Contraseña *</label>
              <input class="string optional" maxlength="100" id="user-pw" name="user-pw" placeholder="Contraseña" type="password" size="50" required="required" title="Ingrese Contraseña" />
              <span class="hide-password">Mostrar</span>
            </div>
          </div>

          <div class="simform__actions">
            <button class="sumbit" type="submit" name="commit" >Iniciar Sesión</button>
            <span class="simform__actions-sidetext">
              <a class="special" role="link" href="#" 
              onclick="Remember()">Olvidaste tu Contraseña?<br>Haz Click Aquí</a>
            </span>
          </div> 
        </form>


      </div> 



    </div>
  </div>
</div>
</div>
</div>


<script type="text/javascript">


  <?php 
  if(!empty($_GET["remember"])){
    ?>
    swal({

      <?php if($_GET["remember"] == 'not_found'){?>
        title: "Correo electrónico no encontrado!",
        text: "Tu correo electrónico no se encuentra en nuestros registro, verifica nuevamente tu correo!",
        type: "warning",
        <?php } ?>

        <?php if($_GET["remember"] == 'success'){?>
          title: "Excelente!",
          text: "Te hemos enviado los datos de tu cuenta a tu correo electrónico!",
          type: "success",
          <?php } ?>

          <?php if($_GET["remember"] == 'error'){?>
            title: "Lo sentimos!",
            text: "No se ha podido enviar tus datos a tu correo para recuperar tu contraseña, inténtelo nuevamente más tarde!",
            type: "error",
            <?php } ?>

            closeOnConfirm: false
          },
          function(){
           history.go(-1);
         });

    <?php } ?>



    <?php 
    if(!empty($_GET["session"])){
      ?>
      swal({

        <?php if($_GET["session"] == 'email_exist'){?>
          title: "Dirección de correo electrónico no disponible!",
          text: "Su correo ya ha sido registrado anteriormente, inténtelo nuevamente con uno nuevo correo electrónico!",
          type: "error",
          <?php } ?>

          <?php if($_GET["session"] == 'pass'){?>
            title: "Contraseñas no coincides!",
            text: "La contraseña que ingresó no coinciden, inténtelo nuevamente!",
            type: "warning",
            <?php } ?>

            <?php if($_GET["session"] == 'error'){?>
              title: "Lo sentimos!",
              text: "No se ha podido registrar su usuario, inténtelo nuevamente más tarde!",
              type: "error",
              <?php } ?>

              <?php if($_GET["session"] == 'email_not_exist'){?>
                title: "Dirección de correo electrónico no encontrada!",
                text: "Regístrese para iniciar sesión!",
                type: "error",
                <?php } ?>

                <?php if($_GET["session"] == 'email_pass_not_found'){?>
                  title: "Dirección de correo electrónico y/o contraseña no coinciden!",
                  text: "Inténtelo nuevamente!",
                  type: "warning",
                  <?php } ?>

                  closeOnConfirm: false
                },
                function(){
                 history.go(-1);
               });

<?php } ?>


function Remember(){
  swal({   
    title: "Ha olvidado su contraseña?",   
    text: "Ingrese su correo electrónico con el cual se registró en InfoNica:",   
    type: "input",   
    showCancelButton: true,   
    closeOnConfirm: false,   
    animation: "slide-from-top",   
    inputPlaceholder: "Escriba su correo electrónico" }, 

    function(inputValue){   
      if (inputValue === false){
        return false } 
        if (inputValue === "") {     
          swal.showInputError("Necesita escribir algo!");    
          return false }      
          if (inputValue.indexOf("@")===-1 || inputValue.indexOf(".")===-1) {     
            swal.showInputError("Escriba un correo electrónico válido!");    
            return false }


            myAjax(inputValue);

          });

}

function myAjax(correo) {


  $.ajax({
   type: "POST",
   url: 'olvidar_contrasena_ajax.php',
   data:{Email:correo},
   success:function(html) {

    location.href=html;
  }

});
}

</script>

<script src="javascripts/index_singup.js"></script>


</body>
</html>
