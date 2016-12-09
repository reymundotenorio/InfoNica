<?php 

function comentarios_video($ID_Video,$Seccion, $Modo, $ID_User, $Rol, $ID_Reply){

  
  include_once("conectar.php");
  $conexion = new Conexion();
  $conexion->Conectarmysql();
  $con = $conexion->Conectar;


  $resultado = mysqli_query($con,"SELECT ID_Seccion FROM Seccion WHERE (Nombre_Seccion = '$Seccion')");
  $rows = mysqli_fetch_array($resultado, MYSQLI_BOTH);

  $ID_Seccion = $rows["ID_Seccion"];


  if($Modo == "todo"){

    $results = mysqli_query($con,"SELECT ID_Comentario_Video, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Comentario_Video, Fecha_Comentario_Video, Foto_Usuario
     FROM Comentario_VideoV WHERE ((ID_Video = '$ID_Video') and (Estado_Comentario_Video = 'Activo'))");

  }
  else{

    $results = mysqli_query($con,"SELECT ID_Comentario_Video, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Comentario_Video, Fecha_Comentario_Video, Foto_Usuario
     FROM Comentario_VideoV WHERE ((ID_Video = '$ID_Video') and (Estado_Comentario_Video = 'Activo')) LIMIT 5");

  }

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

  while($consult = mysqli_fetch_array($results,MYSQLI_BOTH)){
    $ID_Comentario_Video = $consult["ID_Comentario_Video"];
    $Nombre_Usuario = $consult["Nombre_Usuario"];
    $Apellido_Usuario = $consult["Apellido_Usuario"];
    $Fecha_Comentario = $consult["Fecha_Comentario_Video"];
    $Comentario_Video = $consult["Comentario_Video"];
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
  //  echo("<form  onSubmit=\"return confirm('Seguro que desea borrar el comentario?');\"  method=\"post\" action=\"borrar_comentario_Video.php\"> \n");
   echo("<form id=\"Form_".$ID_Comentario_Video."\" method=\"post\" action=\"borrar_comentario_video.php\"> \n");
    echo("<input type=\"hidden\" value=".$ID_Comentario_Video." name=\"ID_Comentario_Video\" /> \n");
    echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");

    echo("</form> \n");


  echo("<button name=\"btn-del\" onclick=\"OnDelete('Form_".$ID_Comentario_Video."');\" 
    style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-4px;\" title=\"Borrar comentario\"><img  width=16px; 
      src=\"images/borrar.png\"></img></button>\n");

     //boton editar
    echo("<button  onclick=\"Editar_Comentario_".$ID_Comentario_Video."()\"  id=\"btnEditar".$ID_Comentario_Video."\" 
      style=\"float:right; cursor: pointer; margin-right: 20px; margin-top:-5.6px; border: none; background: none;\" title=\"Editar\"><img 
      src=\"images/edit.png\"></img></button>\n");

  }


if($ID_User!=0){
//boton responder
    echo("<button  id=\"btnResponder".$ID_Comentario_Video."\"  onclick=\"Responder_Comentario_".$ID_Comentario_Video."()\"
      style=\"float:right; cursor: pointer; margin-right: 20px; margin-top:-5.6px; border: none; background: none;\" title=\"Responder\"><img 
      src=\"images/reply.png\"></img></button>\n");
}

    echo("<div id=\"coment_".$ID_Comentario_Video."\" style=\"word-wrap: break-word;\"> \n");
    echo("<p > \n");
    echo($Comentario_Video);
    echo("</p> \n");
    echo("</div> \n");


//RESPONDER

    $resultsR = mysqli_query($con,"SELECT  Foto_Usuario FROM  Usuario WHERE (ID_Usuario = '$ID_User')");


    while($consultR = mysqli_fetch_array($resultsR,MYSQLI_BOTH)){

     $Foto_UsuarioR = $consultR["Foto_Usuario"];

   }


   echo("<div id=\"responder_coment_".$ID_Comentario_Video."\"  class=\"panel\"
     style=\"word-wrap: break-word; display:none; width:90%; margin:0 auto;margin-left:90px; margin-top:30px;\"> \n");


   echo("<div class=\"gravatar\" style=\"float: left; width: 50px; height: 50px; margin-right: 10px;\"> \n");

   echo("<img width=48px; height=48px; src=".$Foto_UsuarioR." alt=\"\"> \n");

   echo("</div> \n");
   
   echo("<div style=\"overflow: hidden; \"> \n");

   echo("<form id=\"Form_Responder_".$ID_Comentario_Video."\" method=\"post\" action=\"responder_comentario_video.php\"> \n");
   echo("<input type=\"hidden\" value=".$ID_Comentario_Video." name=\"ID_Comentario_Video\" /> \n");
   echo("<input type=\"hidden\" value=".$ID_User." name=\"ID_Usuario\" /> \n");
   echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");
   echo("<textarea  maxlength=\"500\" id=\"resp_coment_".$ID_Comentario_Video."\" placeholder=\"Escribe una respuesta\" type=\"\"  name=\"Comentario\"></textarea> \n");
   echo("</form> \n");

   echo("</div> \n");


//boton Aceptar Responder comentario
   echo("<button  onclick=\"OnResponder('Form_Responder_".$ID_Comentario_Video."');\" style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-7px;\" 
    title=\"Guardar\"><img  src=\"images/ok.png\"></img></button>\n");

   echo("<button onclick=\"Cancelar_Responder_".$ID_Comentario_Video."()\"  style=\"border: none; background: none; float:right; cursor: pointer;
     margin-right: 20px; margin-top:-7px;\" title=\"Cancelar\"><img src=\"images/cancel.png\"></img></button>\n");

   echo("</div> \n");

   echo ("<script> \n");

   echo ("function Responder_Comentario_".$ID_Comentario_Video."(){ \n");
   echo("var Respdiv".$ID_Comentario_Video." = document.getElementById('responder_coment_".$ID_Comentario_Video."');\n");
   echo("Respdiv".$ID_Comentario_Video.".style.display = 'block';\n");


   echo("var Respbutton".$ID_Comentario_Video." = document.getElementById('btnResponder".$ID_Comentario_Video."');\n");
       echo("Respbutton".$ID_Comentario_Video.".style.display = 'none';\n"); //btnResponder, 

       echo("var button".$ID_Comentario_Video." = document.getElementById('btnEditar".$ID_Comentario_Video."');\n");
       echo("button".$ID_Comentario_Video.".style.display = 'none';\n"); //btnResponder, 

       echo("}");


       echo ("function Cancelar_Responder_".$ID_Comentario_Video."(){ \n");

       echo("var Respdiv".$ID_Comentario_Video." = document.getElementById('responder_coment_".$ID_Comentario_Video."');\n");
       echo("Respdiv".$ID_Comentario_Video.".style.display = 'none';\n");

       echo("var Respbutton".$ID_Comentario_Video." = document.getElementById('btnResponder".$ID_Comentario_Video."');\n");
       echo("Respbutton".$ID_Comentario_Video.".style.display = 'block';\n");

       echo("var button".$ID_Comentario_Video." = document.getElementById('btnEditar".$ID_Comentario_Video."');\n");
       echo("button".$ID_Comentario_Video.".style.display = 'block';\n"); //btnResponder, 

       echo("}");

       echo ("</script> \n");



//=================== FIN RESPONDER

//EDITAR COMENTARIO

    if(($ID_Usuario==$ID_User) OR ($Rol == 'Admin')){

    echo("<div id=\"edit_coment_".$ID_Comentario_Video."\"  style=\"word-wrap: break-word; display:none; margin-bottom:40px;\"> \n");

    echo("<form id=\"Form_Edit_".$ID_Comentario_Video."\" method=\"post\" action=\"editar_comentario_video.php\"> \n");
    echo("<input type=\"hidden\" value=".$ID_Comentario_Video." name=\"ID_Comentario_Video\" /> \n");
    echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");
    echo("<textarea maxlength=\"500\" id=\"text_coment_".$ID_Comentario_Video."\" type=\"\"  name=\"Comentario\">".$Comentario_Video."</textarea> \n");
    echo("</form> \n");


//boton Aceptar editar comentario
 echo("<button  onclick=\"OnEdit('Form_Edit_".$ID_Comentario_Video."');\" style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-7px;\" 
  title=\"Guardar\"><img  src=\"images/ok.png\"></img></button>\n");

    echo("<button onclick=\"Cancelar_Editar_".$ID_Comentario_Video."()\"  style=\"border: none; background: none; float:right; cursor: pointer; margin-right: 20px; margin-top:-7px;\" title=\"Cancelar\"><img 
      src=\"images/cancel.png\"></img></button>\n");
    echo("</div> \n");



       echo ("<script> \n");

       echo ("function Editar_Comentario_".$ID_Comentario_Video."(){ \n");
       echo("var div".$ID_Comentario_Video." = document.getElementById('edit_coment_".$ID_Comentario_Video."');\n");
       echo("div".$ID_Comentario_Video.".style.display = 'block';\n");

       echo("var p".$ID_Comentario_Video." = document.getElementById('coment_".$ID_Comentario_Video."');\n");
       echo("p".$ID_Comentario_Video.".style.display = 'none';\n");

       echo("var select_text".$ID_Comentario_Video." = document.getElementById('text_coment_".$ID_Comentario_Video."');\n");
       echo("select_text".$ID_Comentario_Video.".select();\n");


       echo("var button".$ID_Comentario_Video." = document.getElementById('btnEditar".$ID_Comentario_Video."');\n");
       echo("button".$ID_Comentario_Video.".style.display = 'none';\n");

       echo("}");


       echo ("function Cancelar_Editar_".$ID_Comentario_Video."(){ \n");

       echo("var div".$ID_Comentario_Video." = document.getElementById('edit_coment_".$ID_Comentario_Video."');\n");
       echo("div".$ID_Comentario_Video.".style.display = 'none';\n");

       echo("var p".$ID_Comentario_Video." = document.getElementById('coment_".$ID_Comentario_Video."');\n");
       echo("p".$ID_Comentario_Video.".style.display = 'block';\n");

       echo("var button".$ID_Comentario_Video." = document.getElementById('btnEditar".$ID_Comentario_Video."');\n");
       echo("button".$ID_Comentario_Video.".style.display = 'block';\n");

       echo("}");

       echo ("</script> \n");

     }

     
//Ver respuestas


if($ID_Reply == $ID_Comentario_Video){
$resultsR = mysqli_query($con,"SELECT ID_Respuesta_Comentario_Video, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Respuesta_Comentario_Video,
  Fecha_Comentario_Video, Foto_Usuario FROM Respuesta_Comentario_VideoV WHERE ((ID_Comentario_Video = '$ID_Comentario_Video') 
    and (Estado_Respuesta_Comentario_Video = 'Activo'))");
}
else{
 $resultsR = mysqli_query($con,"SELECT ID_Respuesta_Comentario_Video, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Respuesta_Comentario_Video,
  Fecha_Comentario_Video, Foto_Usuario FROM Respuesta_Comentario_VideoV WHERE ((ID_Comentario_Video = '$ID_Comentario_Video') 
    and (Estado_Respuesta_Comentario_Video = 'Activo'))  LIMIT 5");
}

  
  while($consultR = mysqli_fetch_array($resultsR,MYSQLI_BOTH)){


    $ID_R_Comentario_Video = $consultR["ID_Respuesta_Comentario_Video"];
    $Nombre_Usuario = $consultR["Nombre_Usuario"];
    $Apellido_Usuario = $consultR["Apellido_Usuario"];
    $Fecha_R_Comentario = $consultR["Fecha_Comentario_Video"];
    $R_Comentario_Video = $consultR["Respuesta_Comentario_Video"];
    $Foto_Usuario = $consultR["Foto_Usuario"];
    $ID_Usuario = $consultR["ID_Usuario"];
    

    $FechaR = formatoFecha($Fecha_R_Comentario);



       echo("<div  class=\"panel\" style=\"word-wrap: break-word;  width:80%; margin:0 auto;margin-left:90px;  
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
    
      echo("<form id=\"Form_R".$ID_R_Comentario_Video."\" method=\"post\" action=\"borrar_respuesta_comentario_Video.php\"> \n");
      echo("<input type=\"hidden\" value=".$ID_R_Comentario_Video." name=\"ID_Comentario_Video\" /> \n");
      echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");

      echo("</form> \n");

      echo("<button name=\"btn-delR\" onclick=\"OnDelete('Form_R".$ID_R_Comentario_Video."');\" 
        style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-4px;\" title=\"Borrar comentario\"><img  width=16px; 
        src=\"images/borrar.png\"></img></button>\n");


     //boton editar
      echo("<button  onclick=\"Editar_Comentario_R".$ID_R_Comentario_Video."()\"  id=\"btnEditarR".$ID_R_Comentario_Video."\" 
        style=\"float:right; cursor: pointer; margin-right: 20px; margin-top:-5.6px; border: none; background: none;\" title=\"Editar\"><img 
        src=\"images/edit.png\"></img></button>\n");
    }

    echo("</h6> \n"); 
   
   echo("<div style=\"overflow: hidden; \"> \n");

  echo("<p id=\"coment_R".$ID_R_Comentario_Video."\"> \n");
  echo($R_Comentario_Video);
  echo("</p> \n");

   echo("</div> \n");



//Editar respuesta
   if($ID_Usuario == $ID_User OR ($Rol == 'Admin')){

        echo("<div id=\"edit_coment_R".$ID_R_Comentario_Video."\"  style=\"word-wrap: break-word; display:none;\"> \n");

        echo("<form id=\"Form_Edit_R".$ID_R_Comentario_Video."\" method=\"post\" action=\"editar_respuesta_comentario_video.php\"> \n");
        echo("<input type=\"hidden\" value=".$ID_R_Comentario_Video." name=\"ID_RComentario_Video\" /> \n");
        echo("<input type=\"hidden\" value=".$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['REQUEST_URI']." name=\"Ruta\" /> \n");
        echo("<textarea maxlength=\"500\" id=\"text_coment_R".$ID_R_Comentario_Video."\" type=\"\"  name=\"Comentario\">".$R_Comentario_Video."</textarea> \n");
        echo("</form> \n");

//boton Aceptar editar comentario
        echo("<button  onclick=\"OnEdit('Form_Edit_R".$ID_R_Comentario_Video."');\" style=\"float:right; cursor: pointer;border: none; background: none; margin-top:-7px;\" 
          title=\"Guardar\"><img  src=\"images/ok.png\"></img></button>\n");

        echo("<button onclick=\"Cancelar_Editar_R".$ID_R_Comentario_Video."()\"  style=\"border: none; background: none; float:right; cursor: pointer;
         margin-right: 20px; margin-top:-7px;\" title=\"Cancelar\"><img src=\"images/cancel.png\"></img></button>\n");
        echo("</div> \n");


       echo ("<script> \n");

       echo ("function Editar_Comentario_R".$ID_R_Comentario_Video."(){ \n");
       echo("var divRRR".$ID_R_Comentario_Video." = document.getElementById('edit_coment_R".$ID_R_Comentario_Video."');\n");
       echo("divRRR".$ID_R_Comentario_Video.".style.display = 'block';\n");

       echo("var pRRR".$ID_R_Comentario_Video." = document.getElementById('coment_R".$ID_R_Comentario_Video."');\n");
       echo("pRRR".$ID_R_Comentario_Video.".style.display = 'none';\n");


       echo("var select_textRRR".$ID_R_Comentario_Video." = document.getElementById('text_coment_R".$ID_R_Comentario_Video."');\n");
       echo("select_textRRR".$ID_R_Comentario_Video.".select();\n");


       echo("var buttonEditR".$ID_R_Comentario_Video." = document.getElementById('btnEditarR".$ID_R_Comentario_Video."');\n");
       echo("buttonEditR".$ID_R_Comentario_Video.".style.display = 'none';\n");

       echo("} \n");


       echo ("function Cancelar_Editar_R".$ID_R_Comentario_Video."(){ \n");

       echo("var divRR".$ID_R_Comentario_Video." = document.getElementById('edit_coment_R".$ID_R_Comentario_Video."');\n");
       echo("divRR".$ID_R_Comentario_Video.".style.display = 'none';\n");

       echo("var pRR".$ID_R_Comentario_Video." = document.getElementById('coment_R".$ID_R_Comentario_Video."');\n");
       echo("pRR".$ID_R_Comentario_Video.".style.display = 'block';\n");

       echo("var buttonRR".$ID_R_Comentario_Video." = document.getElementById('btnEditarR".$ID_R_Comentario_Video."');\n");
       echo("buttonRR".$ID_R_Comentario_Video.".style.display = 'block';\n");

       echo("}");

       echo ("</script> \n");

     }


   echo("</div> \n");
   // echo("<br class=\"clear\"> \n");

}


if(!empty($_GET['comentarios'])){
  $RutaR = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id']."&comentarios=".$_GET['comentarios']."&reply=".$ID_Comentario_Video;
}else{
$RutaR = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id']."&reply=".$ID_Comentario_Video;
}

if(!empty($_GET['comentarios'])){
 $RutaO = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id']."&comentarios=".$_GET['comentarios'];
}else{
$RutaO = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id'];
}


$resultsRR = mysqli_query($con,"SELECT ID_Respuesta_Comentario_Video, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Respuesta_Comentario_Video,
  Fecha_Comentario_Video, Foto_Usuario FROM Respuesta_Comentario_VideoV WHERE ((ID_Comentario_Video = '$ID_Comentario_Video') 
    and (Estado_Respuesta_Comentario_Video = 'Activo'))");

if(mysqli_num_rows($resultsRR)>5){

if($ID_Reply!=$ID_Comentario_Video){
       echo("<a style=\"float:right; margin-top:10px; margin-right:50px; padding-right:50px;  \" href=\"".$RutaR."\">Ver más respuestas</a>");
}
       else{

  echo("<a style=\"float:right; margin-top:10px; margin-right:50px; padding-right:50px; \" href=\"".$RutaO."\">Ver menos respuestas</a>");
}
}



       echo("<br class=\"clear\"> \n");


  }


echo("<br class=\"clear\"> \n");


$resultsT = mysqli_query($con,"SELECT ID_Comentario_Video, ID_Usuario, Nombre_Usuario, Apellido_Usuario, Comentario_Video, Fecha_Comentario_Video, Foto_Usuario
     FROM Comentario_VideoV WHERE ((ID_Video = '$ID_Video') and (Estado_Comentario_Video = 'Activo'))");

if(mysqli_num_rows($resultsT)>5){

 if(empty($_GET['comentarios'])){
  echo("<h6><a style=\"float:right; margin-right:20px;  padding-right:20px;\" 
    href=\"mostrar_todo.php?ruta=".substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id']."\">
    Ver más comentarios</a></h6> \n");
  }
  else{
  echo("<h6><a style=\"float:right; margin-right:20px;  padding-right:20px;\" 
      href=\"".substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?id=".$_GET['id']."\">
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