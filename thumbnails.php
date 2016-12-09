<?php
    
error_reporting(E_ALL ^ E_NOTICE);

function php_thumbnails($imagefolder,$thumbfolder,$lightbox)
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
			//Only do JPG's
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
	array_multisort($name, SORT_ASC, $files);
	//set the GET variable name
	$pic = $imagefolder;
	//Thumbnails
	//Recursively go trough the array of images and add thmubnails to the page:
	foreach ($files as $file)
		{

        //    if (isset($_GET[$pic]))   {    
      $addy = $_GET[$pic];
          // Instructions if $_POST['value'] exist    

//}
       


	//	$addy = $_GET[$pic];

		$string = $file['name'];
		// Print the currently viewed thumbnail

		if( $addy == $file['name'] AND $lightbox == "lb-off")
			{
			$name = $file['name'];

			$splitname = explode (".", $name);

			$pictitle = str_replace("_"," ",$splitname[0]);

			echo("<img class=\"thumb_active\" src=\"" . $thumbnails . "/$splitname[0]_thumb.jpg\" alt=\"$pictitle\"> \n");

			}
		// Print thumbnails with link
	
		else

			{

			// Check if thumbnail already created

			$name = $file['name'];

			$splitname = explode (".", $name);

			$pictitle = str_replace("_"," ",$splitname[0]);
			if( $lightbox == "lb-on")
				{
				$link = "<a rel=\"lightbox[" . $images . "]\" title=\"$splitname[0]\" href=\"" . $images . "/" . $name . "\">";
				}
			else
				{
				$link = "<a href=\"?" . $pic . "=" . $file['name'] . "\">";
				}

			if (file_exists("$thumbnails/$splitname[0]_thumb.jpg"))

				{

				// Load the thumbnail image
				echo($link);
				echo("<img class=\"thumb\" src=\"" . $thumbnails . "/$splitname[0]_thumb.jpg\" alt=\"$pictitle\"></a> \n");

				}

			else
				{

				// Create a thumbnail image
				echo($link);
				echo("<img class=\"thumb\" src=\"thumbnail.php?imagefolder=" . $images . "&amp;thumbfolder=" . $thumbnails . "&amp;name=" . $file['name'] . "&amp;im=" . $images .  "/" . $file['name'] . "\" alt=\"$pictitle\"></a> \n");

				}

			}
		}
	reset($files);
    //    }
	}


    

function dameURL(){

$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}

function damePosicion(){
$pos1 = stripos($_SERVER['REQUEST_URI'], "=");
return $pos1;
}

function dameNombre(){
$pos1 = stripos($_SERVER['REQUEST_URI'], "=");
$pos1++;
$Nombre = substr($_SERVER['REQUEST_URI'], $pos1);  
return $Nombre;
}

?>