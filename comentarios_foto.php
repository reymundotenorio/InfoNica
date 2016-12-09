<?php 

function comentarios_foto($Nombre_Foto,$Seccion, $Modo, $ID_User, $Rol, $ID_Reply){

  include_once("conectar.php");
  $conexion = new Conexion();
  $conexion->Conectarmysql();
  $con = $conexion->Conectar;


  $resultado = mysqli_query($con,"SELECT ID_Seccion FROM Seccion WHERE (Nombre_Seccion = '$Seccion')");
  $rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

  $ID_Seccion = $rows["ID_Seccion"];

  $result = mysqli_query($con,"SELECT ID_Foto FROM Foto WHERE ((Nombre_Foto = '$Nombre_Foto') and (ID_Seccion = '$ID_Seccion'))");

  $row = mysqli_fetch_array($result,MYSQLI_BOTH);

  $ID_Foto = $row["ID_Foto"];

  if($Modo == "todo"){

    $results = mysqli_query($con,"SELECT ID_Comentario_Foto, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Comentario_Foto, Fecha_Comentario_Foto, Foto_Usuario
     FROM Comentario_FotoV WHERE ((ID_Foto = '$ID_Foto') and (Estado_Comentario_Foto = 'Activo'))");

  }
  else{

    $results = mysqli_query($con,"SELECT ID_Comentario_Foto, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Comentario_Foto, Fecha_Comentario_Foto, Foto_Usuario
     FROM Comentario_FotoV WHERE ((ID_Foto = '$ID_Foto') and (Estado_Comentario_Foto = 'Activo')) LIMIT 5");

  }

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

  while($consult = mysqli_fetch_array($results,MYSQLI_BOTH)){


    $ID_Comentario_Foto = $consult["ID_Comentario_Foto"];
    $Nombre_Usuario = $consult["Nombre_Usuario"];
    $Apellido_Usuario = $consult["Apellido_Usuario"];
    $Fecha_Comentario = $consult["Fecha_Comentario_Foto"];
    $Comentario_Foto = $consult["Comentario_Foto"];
    $Foto_Usuario = $consult["Foto_Usuario"];
    $ID_Usuario = $consult["ID_Usuario"];
    

    $Fecha = formatoFecha($Fecha_Comentario);



    echo("<hr> \n");
    echo("<div class=\"gravatar\"> \n");
    echo("<img width=80px; height=80px; src=".$Foto_Usuario." alt=\"\"> \n");
    echo("</div> \n");

    echo("<h5>".$Nombre_Usuario." ".$Apellido_Usuario." \n");
    echo("<span class=\"commentdate\">- ".$Fecha." \n");
    echo("</span> \n");
    echo("</h5> \n"); 


    if(($ID_Usuario==$ID_User) OR ($Rol == 'Admin')){
//boton eliminar

      echo("<form id=\"Form_".$ID_Comentario_Foto."\" method=\"post\" action=\"borrar_comentario_foto.php\"> \n");
      echo("<input type=\"hidden\" value=".$ID_Comentario_Foto." name=\"ID_Comentario_Foto\" /> \n");
      echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");

      echo("</form> \n");

      echo("<button name=\"btn-del\" onclick=\"OnDelete('Form_".$ID_Comentario_Foto."');\" 
        style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-4px;\" title=\"Borrar comentario\"><img  width=16px; 
        src=\"images/borrar.png\"></img></button>\n");


     //boton editar
      echo("<button  onclick=\"Editar_Comentario_".$ID_Comentario_Foto."()\"  id=\"btnEditar".$ID_Comentario_Foto."\" 
        style=\"float:right; cursor: pointer; margin-right: 20px; margin-top:-5.6px; border: none; background: none;\" title=\"Editar\"><img 
        src=\"images/edit.png\"></img></button>\n");
    }

    if($ID_User!=0){
//boton responder
      echo("<button  id=\"btnResponder".$ID_Comentario_Foto."\"  onclick=\"Responder_Comentario_".$ID_Comentario_Foto."()\"
       style=\"float:right; cursor: pointer; margin-right: 20px; margin-top:-5.6px; border: none; background: none;\" title=\"Responder\"><img 
       src=\"images/reply.png\"></img></button>\n");
    }

    echo("<div id=\"coment_".$ID_Comentario_Foto."\" style=\"word-wrap: break-word;\"> \n");
    echo("<p > \n");
    echo($Comentario_Foto);
    echo("</p> \n");
    echo("</div> \n");

//RESPONDER

    $resultsR = mysqli_query($con,"SELECT  Foto_Usuario FROM  Usuario WHERE (ID_Usuario = '$ID_User')");


    while($consultR = mysqli_fetch_array($resultsR,MYSQLI_BOTH)){

     $Foto_UsuarioR = $consultR["Foto_Usuario"];

   }


   echo("<div id=\"responder_coment_".$ID_Comentario_Foto."\"  class=\"panel\"
     style=\"word-wrap: break-word; display:none; width:85%; margin:0 auto;margin-left:90px; margin-top:30px;\"> \n");


   echo("<div class=\"gravatar\" style=\"float: left; width: 50px; height: 50px; margin-right: 10px;\"> \n");

   echo("<img width=48px; height=48px; src=".$Foto_UsuarioR." alt=\"\"> \n");

   echo("</div> \n");
   
   echo("<div style=\"overflow: hidden; \"> \n");

   echo("<form id=\"Form_Responder_".$ID_Comentario_Foto."\" method=\"post\" action=\"responder_comentario_foto.php\"> \n");
   echo("<input type=\"hidden\" value=".$ID_Comentario_Foto." name=\"ID_Comentario_Foto\" /> \n");
   echo("<input type=\"hidden\" value=".$ID_User." name=\"ID_Usuario\" /> \n");
   echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");
   echo("<textarea  maxlength=\"500\" id=\"resp_coment_".$ID_Comentario_Foto."\" placeholder=\"Escribe una respuesta\" type=\"\"  name=\"Comentario\"></textarea> \n");
   echo("</form> \n");

   echo("</div> \n");


//boton Aceptar Responder comentario
   echo("<button  onclick=\"OnResponder('Form_Responder_".$ID_Comentario_Foto."');\" style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-7px;\" 
    title=\"Guardar\"><img  src=\"images/ok.png\"></img></button>\n");

   echo("<button onclick=\"Cancelar_Responder_".$ID_Comentario_Foto."()\"  style=\"border: none; background: none; float:right; cursor: pointer;
     margin-right: 20px; margin-top:-7px;\" title=\"Cancelar\"><img src=\"images/cancel.png\"></img></button>\n");

   echo("</div> \n");

   echo ("<script> \n");

   echo ("function Responder_Comentario_".$ID_Comentario_Foto."(){ \n");
   echo("var Respdiv".$ID_Comentario_Foto." = document.getElementById('responder_coment_".$ID_Comentario_Foto."');\n");
   echo("Respdiv".$ID_Comentario_Foto.".style.display = 'block';\n");


   echo("var Respbutton".$ID_Comentario_Foto." = document.getElementById('btnResponder".$ID_Comentario_Foto."');\n");
       echo("Respbutton".$ID_Comentario_Foto.".style.display = 'none';\n"); //btnResponder, 

       echo("var button".$ID_Comentario_Foto." = document.getElementById('btnEditar".$ID_Comentario_Foto."');\n");
       echo("button".$ID_Comentario_Foto.".style.display = 'none';\n"); //btnResponder, 

       echo("}");


       echo ("function Cancelar_Responder_".$ID_Comentario_Foto."(){ \n");

       echo("var Respdiv".$ID_Comentario_Foto." = document.getElementById('responder_coment_".$ID_Comentario_Foto."');\n");
       echo("Respdiv".$ID_Comentario_Foto.".style.display = 'none';\n");

       echo("var Respbutton".$ID_Comentario_Foto." = document.getElementById('btnResponder".$ID_Comentario_Foto."');\n");
       echo("Respbutton".$ID_Comentario_Foto.".style.display = 'block';\n");

       echo("var button".$ID_Comentario_Foto." = document.getElementById('btnEditar".$ID_Comentario_Foto."');\n");
       echo("button".$ID_Comentario_Foto.".style.display = 'block';\n"); //btnResponder, 

       echo("}");

       echo ("</script> \n");



//=================== FIN RESPONDER

//EDITAR COMENTARIO

       if($ID_Usuario == $ID_User OR ($Rol == 'Admin')){

        echo("<div id=\"edit_coment_".$ID_Comentario_Foto."\"  style=\"word-wrap: break-word; display:none; margin-bottom:40px;\"> \n");

        echo("<form id=\"Form_Edit_".$ID_Comentario_Foto."\" method=\"post\" action=\"editar_comentario_foto.php\"> \n");
        echo("<input type=\"hidden\" value=".$ID_Comentario_Foto." name=\"ID_Comentario_Foto\" /> \n");
        echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");
        echo("<textarea maxlength=\"500\" id=\"text_coment_".$ID_Comentario_Foto."\" type=\"\"  name=\"Comentario\">".$Comentario_Foto."</textarea> \n");
        echo("</form> \n");

//boton Aceptar editar comentario
        echo("<button  onclick=\"OnEdit('Form_Edit_".$ID_Comentario_Foto."');\" style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-7px;\" 
          title=\"Guardar\"><img  src=\"images/ok.png\"></img></button>\n");

        echo("<button onclick=\"Cancelar_Editar_".$ID_Comentario_Foto."()\"  style=\"border: none; background: none; float:right; cursor: pointer;
         margin-right: 20px; margin-top:-7px;\" title=\"Cancelar\"><img src=\"images/cancel.png\"></img></button>\n");
        echo("</div> \n");


        echo ("<script> \n");

        echo ("function Editar_Comentario_".$ID_Comentario_Foto."(){ \n");
        echo("var div".$ID_Comentario_Foto." = document.getElementById('edit_coment_".$ID_Comentario_Foto."');\n");
        echo("div".$ID_Comentario_Foto.".style.display = 'block';\n");

        echo("var p".$ID_Comentario_Foto." = document.getElementById('coment_".$ID_Comentario_Foto."');\n");
        echo("p".$ID_Comentario_Foto.".style.display = 'none';\n");

        echo("var select_text".$ID_Comentario_Foto." = document.getElementById('text_coment_".$ID_Comentario_Foto."');\n");
        echo("select_text".$ID_Comentario_Foto.".select();\n");


        echo("var button".$ID_Comentario_Foto." = document.getElementById('btnEditar".$ID_Comentario_Foto."');\n");
        echo("button".$ID_Comentario_Foto.".style.display = 'none';\n");

        echo("var buttonR".$ID_Comentario_Foto." = document.getElementById('btnResponder".$ID_Comentario_Foto."');\n");
        echo("buttonR".$ID_Comentario_Foto.".style.display = 'none';\n");

        echo("}");


        echo ("function Cancelar_Editar_".$ID_Comentario_Foto."(){ \n");

        echo("var div".$ID_Comentario_Foto." = document.getElementById('edit_coment_".$ID_Comentario_Foto."');\n");
        echo("div".$ID_Comentario_Foto.".style.display = 'none';\n");

        echo("var p".$ID_Comentario_Foto." = document.getElementById('coment_".$ID_Comentario_Foto."');\n");
        echo("p".$ID_Comentario_Foto.".style.display = 'block';\n");

        echo("var button".$ID_Comentario_Foto." = document.getElementById('btnEditar".$ID_Comentario_Foto."');\n");
        echo("button".$ID_Comentario_Foto.".style.display = 'block';\n");

        echo("var buttonR".$ID_Comentario_Foto." = document.getElementById('btnResponder".$ID_Comentario_Foto."');\n");
        echo("buttonR".$ID_Comentario_Foto.".style.display = 'block';\n");

        echo("}");

        echo ("</script> \n");

      }

//Ver respuestas

      if($ID_Reply == $ID_Comentario_Foto){

        $resultsR = mysqli_query($con,"SELECT ID_Respuesta_Comentario_Foto, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Respuesta_Comentario_Foto,
          Fecha_Comentario_Foto, Foto_Usuario FROM Respuesta_Comentario_FotoV WHERE ((ID_Comentario_Foto = '$ID_Comentario_Foto') 
            and (Estado_Respuesta_Comentario_Foto = 'Activo'))");
      }
      else{
       $resultsR = mysqli_query($con,"SELECT ID_Respuesta_Comentario_Foto, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Respuesta_Comentario_Foto,
        Fecha_Comentario_Foto, Foto_Usuario FROM Respuesta_Comentario_FotoV WHERE ((ID_Comentario_Foto = '$ID_Comentario_Foto') 
          and (Estado_Respuesta_Comentario_Foto = 'Activo')) LIMIT 5");
     }

     while($consultR = mysqli_fetch_array($resultsR,MYSQLI_BOTH)){


      $ID_R_Comentario_Foto = $consultR["ID_Respuesta_Comentario_Foto"];
      $Nombre_Usuario = $consultR["Nombre_Usuario"];
      $Apellido_Usuario = $consultR["Apellido_Usuario"];
      $Fecha_R_Comentario = $consultR["Fecha_Comentario_Foto"];
      $R_Comentario_Foto = $consultR["Respuesta_Comentario_Foto"];
      $Foto_Usuario = $consultR["Foto_Usuario"];
      $ID_Usuario = $consultR["ID_Usuario"];


      $FechaR = formatoFecha($Fecha_R_Comentario);



      echo("<div  class=\"panel\" style=\"word-wrap: break-word;  width:85%; margin:0 auto;margin-left:90px;  
        border-style: outset; border-width: 1px; border-bottom-color:white; border-right-color:white; \"> \n");

      echo("<div class=\"gravatar\" style=\"float: left; width: 50px; height: 50px; margin-right: 10px;\"> \n");

   //echo("<img width=48px; height=48px; src=".$Foto_UsuarioR." alt=\"\"> \n");



      echo("<img width=48px; height=48px; src=\"".$Foto_Usuario."\" alt=\"\"> \n");

      echo("</div> \n");

      echo("<h6 style=\"font-size:14px;\">".$Nombre_Usuario." ".$Apellido_Usuario."\n");
      echo("<span class=\"commentdate\">- ".$FechaR." \n");
      echo("</span> \n");

    //EDITAR RESPUESTA

      if(($ID_Usuario==$ID_User) OR ($Rol == 'Admin')){
//boton eliminar

        echo("<form id=\"Form_R".$ID_R_Comentario_Foto."\" method=\"post\" action=\"borrar_respuesta_comentario_foto.php\"> \n");
        echo("<input type=\"hidden\" value=".$ID_R_Comentario_Foto." name=\"ID_RComentario_Foto\" /> \n");
        echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");

        echo("</form> \n");

        echo("<button name=\"btn-delR\" onclick=\"OnDelete('Form_R".$ID_R_Comentario_Foto."');\" 
          style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-4px;\" title=\"Borrar comentario\"><img  width=16px; 
          src=\"images/borrar.png\"></img></button>\n");


     //boton editar
        echo("<button  onclick=\"Editar_Comentario_R".$ID_R_Comentario_Foto."()\"  id=\"btnEditarR".$ID_R_Comentario_Foto."\" 
          style=\"float:right; cursor: pointer; margin-right: 20px; margin-top:-5.6px; border: none; background: none;\" title=\"Editar\"><img 
          src=\"images/edit.png\"></img></button>\n");
      }

      echo("</h6> \n"); 

      echo("<div style=\"overflow: hidden; \"> \n");

      echo("<p id=\"coment_R".$ID_R_Comentario_Foto."\"> \n");
      echo($R_Comentario_Foto);
      echo("</p> \n");

      echo("</div> \n");



//Editar respuesta
      if($ID_Usuario == $ID_User OR ($Rol == 'Admin')){

        echo("<div id=\"edit_coment_R".$ID_R_Comentario_Foto."\"  style=\"word-wrap: break-word; display:none;\"> \n");

        echo("<form id=\"Form_Edit_R".$ID_R_Comentario_Foto."\" method=\"post\" action=\"editar_respuesta_comentario_foto.php\"> \n");
        echo("<input type=\"hidden\" value=".$ID_R_Comentario_Foto." name=\"ID_RComentario_Foto\" /> \n");
        echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");
        echo("<textarea maxlength=\"500\" id=\"text_coment_R".$ID_R_Comentario_Foto."\" type=\"\"  name=\"Comentario\">".$R_Comentario_Foto."</textarea> \n");
        echo("</form> \n");

//boton Aceptar editar comentario
        echo("<button  onclick=\"OnEdit('Form_Edit_R".$ID_R_Comentario_Foto."');\" style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-7px;\" 
          title=\"Guardar\"><img  src=\"images/ok.png\"></img></button>\n");

        echo("<button onclick=\"Cancelar_Editar_R".$ID_R_Comentario_Foto."()\"  style=\"border: none; background: none; float:right; cursor: pointer;
         margin-right: 20px; margin-top:-7px;\" title=\"Cancelar\"><img src=\"images/cancel.png\"></img></button>\n");
        echo("</div> \n");


        echo ("<script> \n");

        echo ("function Editar_Comentario_R".$ID_R_Comentario_Foto."(){ \n");
        echo("var divRRR".$ID_R_Comentario_Foto." = document.getElementById('edit_coment_R".$ID_R_Comentario_Foto."');\n");
        echo("divRRR".$ID_R_Comentario_Foto.".style.display = 'block';\n");

        echo("var pRRR".$ID_R_Comentario_Foto." = document.getElementById('coment_R".$ID_R_Comentario_Foto."');\n");
        echo("pRRR".$ID_R_Comentario_Foto.".style.display = 'none';\n");


        echo("var select_textRRR".$ID_R_Comentario_Foto." = document.getElementById('text_coment_R".$ID_R_Comentario_Foto."');\n");
        echo("select_textRRR".$ID_R_Comentario_Foto.".select();\n");


        echo("var buttonEditR".$ID_R_Comentario_Foto." = document.getElementById('btnEditarR".$ID_R_Comentario_Foto."');\n");
        echo("buttonEditR".$ID_R_Comentario_Foto.".style.display = 'none';\n");

        echo("} \n");


        echo ("function Cancelar_Editar_R".$ID_R_Comentario_Foto."(){ \n");

        echo("var divRR".$ID_R_Comentario_Foto." = document.getElementById('edit_coment_R".$ID_R_Comentario_Foto."');\n");
        echo("divRR".$ID_R_Comentario_Foto.".style.display = 'none';\n");

        echo("var pRR".$ID_R_Comentario_Foto." = document.getElementById('coment_R".$ID_R_Comentario_Foto."');\n");
        echo("pRR".$ID_R_Comentario_Foto.".style.display = 'block';\n");

        echo("var buttonRR".$ID_R_Comentario_Foto." = document.getElementById('btnEditarR".$ID_R_Comentario_Foto."');\n");
        echo("buttonRR".$ID_R_Comentario_Foto.".style.display = 'block';\n");

        echo("}");

        echo ("</script> \n");

      }


      echo("</div> \n");


   // echo("<br class=\"clear\"> \n");

    }


    if(!empty($_GET['comentarios'])){
      $RutaR = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?".$Seccion."=".$_GET[$Seccion]."&comentarios=".$_GET['comentarios']."&reply=".$ID_Comentario_Foto;
    }else{
      $RutaR = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?".$Seccion."=".$_GET[$Seccion]."&reply=".$ID_Comentario_Foto;
    }

    if(!empty($_GET['comentarios'])){
      $RutaO = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?".$Seccion."=".$_GET[$Seccion]."&comentarios=".$_GET['comentarios'];
    }else{
      $RutaO = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?".$Seccion."=".$_GET[$Seccion];
    }

    $resultsRR = mysqli_query($con,"SELECT ID_Respuesta_Comentario_Foto, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Respuesta_Comentario_Foto,
      Fecha_Comentario_Foto, Foto_Usuario FROM Respuesta_Comentario_FotoV WHERE ((ID_Comentario_Foto = '$ID_Comentario_Foto') 
        and (Estado_Respuesta_Comentario_Foto = 'Activo'))");

    if(mysqli_num_rows($resultsRR)>5){

      if($ID_Reply!=$ID_Comentario_Foto){

       echo("<a style=\"float:right; margin-top:10px; margin-right:15px; padding-right:15px; \" href=\"".$RutaR."\">Ver más respuestas</a>");
     }
     else{

      echo("<a style=\"float:right; margin-top:10px; margin-right:15px; padding-right:15px; \" href=\"".$RutaO."\">Ver menos respuestas</a>");
    }

  }


  echo("<br class=\"clear\"> \n");

}

echo("<br class=\"clear\"> \n");


$resultsT = mysqli_query($con,"SELECT ID_Comentario_Foto, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Comentario_Foto, Fecha_Comentario_Foto, Foto_Usuario
 FROM Comentario_FotoV WHERE ((ID_Foto = '$ID_Foto') and (Estado_Comentario_Foto = 'Activo'))");


if(mysqli_num_rows($resultsT)>5){

 if(empty($_GET['comentarios'])){
  echo("<h6><a style=\"float:right;\" 
    href=\"mostrar_todo.php?ruta=".substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?ElCastillo=".$_GET['ElCastillo']."\">
    Ver más comentarios</a></h6> \n");
  }
  else{
  echo("<h6><a style=\"float:right;\" 
      href=\"".substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?ElCastillo=".$_GET['ElCastillo']."\">
      Ver menos comentarios</a></h6> \n");
    }
  } 




  mysqli_close($con);

}

function formatoFecha($Fecha_Sin_Formato){

  $diae = date("w", strtotime($Fecha_Sin_Formato)); 
  $dias = array ("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado",); 
  $ndia = $dias[$diae]; 
  $dia = date ("d",strtotime($Fecha_Sin_Formato)); 
  $mese = date ("n",strtotime($Fecha_Sin_Formato)); 
  $meses = array (1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
  $mes = $meses[$mese]; 
  $año = date ("Y",strtotime($Fecha_Sin_Formato)); 
  $Hora = date("h:m:s A" ,strtotime($Fecha_Sin_Formato));
  $fecha = $ndia.", ".$dia." de ".$mes." del ".$año." - ".$Hora; 

  return $fecha; 
}

?>