<?php
    
//$url = $_REQUEST["Ver"];
$url = $_GET["ruta"];
$enlace = $url."&comentarios=todo";

   header("location: $enlace");
   exit;
?>
