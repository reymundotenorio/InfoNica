<?php 
//Thumbnail save settings, feel free to change these. Pre-existing thumbnails need to be deeted for the changes to take effect!!!
$thumbsize = "120"; // Thumbnail size.
$thumbquality = "130"; //the thumbnail JPEG quality.

// Image folder

$images = $_GET['imagefolder'];

// Thumbnail folder

$thumbnails = $_GET['thumbfolder'];

// The file you are resizing 
$file = $_GET['im'];

//image name:
$tn_name = $_GET['name'];

// This sets it to a .jpg, but you can change this to png or gif 
header('Content-type: image/jpeg'); 

// Setting the resize parameters 
list($width, $height) = getimagesize($file);

if ($width == $height) {
	$modwidth = $thumbsize;
	$modheight = $thumbsize;
}
else if ($width < $height) {
	$zoom = $thumbsize / $width;
	$modwidth = $thumbsize;
	$modheight = $height * $zoom;
	$dstx = 0;
	$dsty = ($thumbsize - $modheight)/2;

}
else {
	$zoom = $thumbsize / $height;
	$modheight = $thumbsize;
	$modwidth = $width * $zoom;
	$dstx = ($thumbsize - $modwidth)/2;
	$dsty = 0;
}

// Resizing the Image
$tn = imagecreatetruecolor($thumbsize, $thumbsize);
$image = imagecreatefromjpeg($file);
imagecopyresampled($tn, $image, $dstx, $dsty, 0, 0, $modwidth, $modheight, $width, $height); 


// preparing name for the thumbnail
$splitname = explode (".", $tn_name);     

// check if thumbs directory already exists, if not: make one

if (!is_dir("$thumbnails")) {
	mkdir($thumbnails, 0755);
}

	// if it exists, check if directory is writeable, if not: chmod

elseif(!is_writeable("$thumbnails")) {
	chmod($thumbnails, 0755);
}

// copying thumbnail with _tn before extension to server
ImageJPEG($tn, $thumbnails . "/$splitname[0]_thumb.jpg", $thumbquality); 
// Outputting a .jpg, you can make this gif or png if you want 
imagejpeg($tn, null, $thumbquality); 

chmod($thumbnails . "/$splitname[0]_thumb.jpg", 0755);
?>