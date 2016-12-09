<?php 

function comentarios_recientes_foto($Nombre_Foto,$Seccion){

  
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

  $results = mysqli_query($con,"SELECT Comentario_Foto, Fecha_Comentario_Foto, Foto_Usuario
   FROM Comentario_FotoV WHERE ((ID_Foto = '$ID_Foto') and (Estado_Comentario_Foto = 'Activo')) ORDER BY (Fecha_Comentario_Foto) DESC LIMIT 3 ");

//$consult = mysqli_fetch_array($results,MYSQLI_BOTH);

  while($consult = mysqli_fetch_array($results,MYSQLI_BOTH)){


    $Fecha_Comentario = $consult["Fecha_Comentario_Foto"];
    $Comentario_Foto = $consult["Comentario_Foto"];
    $Foto_Usuario = $consult["Foto_Usuario"];

    $Fecha = formato_Fecha($Fecha_Comentario);


    echo("<div class=\"gravatar\"> \n");
    echo(" <img width=64px; height=64px; src=".$Foto_Usuario." alt=\"\">\n");
    echo("</div> \n");
    echo("<div style=\"word-wrap: break-word;\"> \n");
    echo("<p> \n");
    echo($Comentario_Foto);
    echo("</p> \n");
    echo("</div> \n");
    echo("<br class=\"clear\"/> \n");
  }

  mysqli_close($con);

}

function formato_Fecha($Fecha_Sin_Formato){

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