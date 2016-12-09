 <?php

    if(!empty($_FILES['perfilusFile'])){ç

      $ID_Usuario = 

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

      if ($_FILES['perfilusFile']['size']>2097152)
      {
      echo("El archivo es mayor que 2MB, debes reduzcirlo antes de subirlo<BR>");
      $perfilusFileload="false";
    }


    if (!($_FILES['perfilusFile']['type'] =="image/jpeg" OR $_FILES['perfilusFile']['type'] =="image/gif" OR $_FILES['perfilusFile']['type'] =="image/png"))
    {
      echo("Tu archivo tiene que ser JPG, GIF o PNG. Otros archivos no son permitidos<BR>");
      $perfilusFileload="false";
    }

    if($perfilusFileload=="true"){

      if(move_uploaded_file($_FILES['perfilusFile']['tmp_name'], $target_path)) 
      { 
        unset($_FILES['perfilusFile']);
        include_once("actualizar_foto.php");ç
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
