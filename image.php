<?php
function php_image($imagefolder,$thumbfolder)
    {
    //Get image and thumbnail folder from function
    $images = "fotos/" . $imagefolder; //The folder that contains your images. This folder must contain ONLY ".jpg files"!
    $thumbnails = "fotos/" . $thumbfolder; // the folder that contains all created thumbnails.
    //Load Images
	//load images into an array and sort them alphabeticall:
	$files = array();
	if ($handle = opendir($images))
		{
		while (false !== ($file = readdir($handle)))
			{
			//only do JPG's
			if(preg_match("/((.jpeg|.jpg)$)/i", $file))

				{
				$files[] = array("name" => $file);
				}
			}
		closedir($handle);
		}
	//Obtain a list of columns

	foreach ($files as $key => $row)
		{

		$name[$key]  = $row['name'];
		}
	//Put images in order:
    $order = "reverse";

	if ($order == "reverse")
		{
		array_multisort($name, SORT_DESC, $files);
		}
	else
		{
		array_multisort($name, SORT_ASC, $files);
		}
	//set the GET variable name
	$pic = $imagefolder;
	// if term PIC is defined in the URL (=image is loaded):
	if(isset($_GET[$pic]))
		{
		$addy = $_GET[$pic];
		$imgsrc = $images . "/" . $addy;

		//does image exist:

		if (file_exists($imgsrc))

			{

			//Get image size:
			$size = getimagesize( $imgsrc );
			$width = $size[0];
			$height = $size[1];
			
			// define the link to the next picture
			$lastpicarray = end($files);
			$lastpic = $lastpicarray['name'];
			reset($files);
			$firstpicarray = current($files);
			$firstpic = $firstpicarray['name'];
			while ($pointer = current($files))
				{				
				if ($pointer['name'] == $addy && $pointer['name'] != $firstpic) {
					$prevpicarray = prev($files);
					$prevpic = $prevpicarray['name'];
					next($files);
					}
				else if ($pointer['name'] == $addy && $pointer['name'] == $firstpic) {
					$prevpicarray = end($files);
					$prevpic = $prevpicarray['name'];
					reset($files);
					}
				if ($pointer['name'] == $addy && $pointer['name'] != $lastpic) {
					$nextpicarray = next($files);
					$nextpic = $nextpicarray['name'];
					break;
					}
				else if ($pointer['name'] == $addy && $pointer['name'] == $lastpic) {
					reset($files);
					$nextpicarray = current($files);
					$nextpic = $nextpicarray['name'];
					break;
					}
				next($files);
				}
			//Include the opened photo to the document.
           

           		
    include_once("conectar.php");
    $conexion = new Conexion();
    $conexion->ConectarMySql();
    $con = $conexion->Conectar;

				$Nombre_Foto= $_GET[$imagefolder];


			$result = mysqli_query($con,"SELECT Latitud_Foto, Longitud_Foto FROM Foto WHERE (Nombre_Foto = '$Nombre_Foto')");

			$row = mysqli_fetch_array($result,MYSQLI_BOTH);

			$Latitud = $row["Latitud_Foto"];
			$Longitud = $row["Longitud_Foto"];

			mysqli_close($con);

           
           //ESTILOOO DE HOVER

echo("<style type=\"text/css\">
.image_container:hover .overlay{opacity:1;}
.image_container:hover .imagenGaleria{opacity:0.3;}

.image_container{position:relative;}

/*Centering size and color shenenigans*/
.overlay {
  bottom: 0;left: 0; top: 0; right: 0;
  height: 150px;
  width: 150px;
  margin: auto;
  position: absolute;
  /*  background-color:#3f3f3f;
  border-radius: 50%; */
  opacity:0;
}

</style>");

       

//echo "<div class=\"image_container\" style=\"width: " . $width . "px; height: " . $height . "px; background-image: url(" . $imgsrc . ")\">\n";
			
		
			echo "<div class=\"image_container\" >\n";
		//	echo "<a class=\"various fancybox.iframe\" href=\"https://maps.google.com/maps?q=11.928220239725587,-85.95672022405084&hl=es;z=14&amp;output=embed\"> \n";
		
		//t is the map type ("m" map, "k" satellite, "h" hybrid, "p" terrain, "e" GoogleEarth)

		
			 if(empty($Latitud)){

            	if(empty($Longitud)){
				$Latitud = "12.83563891738159";
				$Longitud = "-84.91596982343748";
			    echo "<a class=\"various fancybox.iframe\" href=\"https://maps.google.com/maps?q=".$Latitud.",".$Longitud."&hl=es;&t=m&z=6&amp;output=embed\"> \n";

            	}
            }
            else{		
			echo "<a class=\"various fancybox.iframe\" href=\"https://maps.google.com/maps?q=".$Latitud.",".$Longitud."&hl=es;&t=m&z=14&amp;output=embed\"> \n";
			}
 			echo("<div class=\"overlay\"><img src=\"images/map.png\" /></div>");

			echo "<img class=\"imagenGaleria\" src=".$imgsrc." width:\"100%\"  />\n";
			echo " </a> \n";

		/*	echo "<a class=\"prev\" href=\"?" . $pic . "=" . $prevpic . "\" style=\"height: " . $height . "px; width: " . $width*0.49 . "px;\">";
			$name = $prevpic;
			$splitname = explode (".", $name);
			echo "<div class=\"prev_thumb\"  style=\"height: " . $height . "px; width: 100px; background-image: url(" . $thumbnails . "/$splitname[0]_thumb.jpg); background-repeat: no-repeat;
			background-position: center left;\"></div></a>\n";	
			
			echo "<a class=\"next\" href=\"?" . $pic . "=" . $nextpic . "\" style=\"height: " . $height . "px; width: " . $width*0.49 . "px;\">";
			$name = $nextpic;
			$splitname = explode (".", $name);
			echo "<div class=\"next_thumb\" style=\"height: " . $height . "px; width: 100px; background-image: url(" . $thumbnails . "/$splitname[0]_thumb.jpg); background-repeat: no-repeat;
	        background-position: center right; padding-left:10px;\"></div></a>\n";	
	        */
	
			echo "</div>\n";
			
			echo "<a class=\"readmore atras\" href=\"?" . $pic . "=" . $prevpic . " \" >ANTERIOR</a>\n";
			$name = $prevpic;
			$splitname = explode (".", $name);

			echo "<a class=\"readmore siguiente\" href=\"?" . $pic . "=" . $nextpic . "\">SIGUIENTE</a>\n";
			
      	  
			$name = $nextpic;
			$splitname = explode (".", $name);

			}	
		else 

			{
			//do nothing

			echo "File does not exist";
			}
		}
	else
		{	
		$addy1 = current($files);
		$addy = $addy1['name'];
		$imgsrc = $images . "/" . $addy;
		//Get image size:
		$size = getimagesize( $imgsrc );
		$width = $size[0];
		$height = $size[1];
		// define the link to the next picture
		$lastpicarray = end($files);
		$lastpic = $lastpicarray['name'];
		reset($files);
		$prevpic = $lastpic;
		while ($pointer = current($files)) 

			{
			if ($pointer['name'] == $addy && $pointer['name'] != $lastpic)

				{
				$nextpicarray = next($files);
				$nextpic = $nextpicarray['name'];
				break;
				}
			else if ($pointer['name'] == $addy && $pointer['name'] == $lastpic)

				{
				reset($files);
				$nextpicarray = current($files);
				$nextpic = $nextpicarray['name'];
				break;
				}
			next($files);
			}
		//Include the first photo in the foder to the document.
			//Include the opened photo to the document.
			echo "<div class=\"image_container\" style=\"width: " . $width . "px; height: " . $height . "px; background-image: url(" . $imgsrc . ")\">\n";
			echo "<a class=\"prev\" href=\"?" . $pic . "=" . $prevpic . "\" style=\"height: " . $height . "px; width: " . $width*0.49 . "px;\">";
			$name = $prevpic;
			$splitname = explode (".", $name);
			echo "<div class=\"prev_thumb\"  style=\"height: " . $height . "px; width: 100px; background-image: url(" . $thumbnails . "/$splitname[0]_thumb.jpg); background-repeat: no-repeat;
	background-position: center left;\"></div></a>\n";	
			echo "<a class=\"next\" href=\"?" . $pic . "=" . $nextpic . "\" style=\"height: " . $height . "px; width: " . $width*0.49 . "px;\">";
			$name = $nextpic;
			$splitname = explode (".", $name);
			echo "<div class=\"next_thumb\" style=\"height: " . $height . "px; width: 100px; background-image: url(" . $thumbnails . "/$splitname[0]_thumb.jpg); background-repeat: no-repeat;
	background-position: center right;\"></div></a>\n";	
			echo "</div>\n";

		}
	reset($files);
	}
?>