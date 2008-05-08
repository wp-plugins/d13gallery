<?php
// Get data from querystring...
$filename = $_GET["path"];
$maxWidth = $_GET["w"];
$maxHeight = $_GET["h"];
$quality = $_GET["q"];
if(isset($_GET["s"])){
	$savePath = $_GET["s"];
}else{
	$savePath = "null";
}
// Is the image a JPEG?
if(substr($filename,-3,3)=="jpg" || substr($filename,-3,3)=="JPG" || substr($filename,-3,3)=="peg" || substr($filename,-3,3)=="PEG"){
	// Send out the headers...
	header('Content-type: image/jpeg');
	// Get the size of the full size image...
	list($width, $height) = getimagesize($filename);
	// Work out the size for the thumbnail image...
	if($width > $height){
		$newWidth = $maxWidth;
		$newHeight = $height*($maxWidth/$width);
	}else{
		$newHeight = $maxHeight;
		$newWidth = $width*($maxHeight/$height);
	}
	// Load in the full size image...
	$thumb = imagecreatetruecolor($newWidth, $newHeight);
	$source = imagecreatefromjpeg($filename);
	// Resize the thumbnail...
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	// Output the thumbnail...
	if($savePath == "null"){
		imagejpeg($thumb,"",$quality);
	}else{
		imagejpeg($thumb,$savePath,$quality);
		chmod($savePath,0777);
	}
}
// Is the image a GIF?
if(substr($filename,-3,3)=="gif" || substr($filename,-3,3)=="GIF"){
	// Send out the headers...
	header('Content-type: image/gif');
	// Get the size of the full size image...
	list($width, $height) = getimagesize($filename);
	// Work out the size for the thumbnail image...
	if($width > $height){
		$newWidth = $maxWidth;
		$newHeight = $height*($maxWidth/$width);
	}else{
		$newHeight = $maxHeight;
		$newWidth = $width*($maxHeight/$height);
	}
	// Load in the full size image...
	$thumb = imagecreatetruecolor($newWidth, $newHeight);
	$source = imagecreatefromgif($filename);
	// Resize the thumbnail...
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	// Output the thumbnail...
	if($savePath == "null"){
		imagegif($thumb);
	}else{
		imagegif($thumb,$savePath);
		chmod($savePath,0777);
	}
}
// Is the image a PNG?
if(substr($filename,-3,3)=="png" || substr($filename,-3,3)=="PNG"){
	// Send out the headers...
	header('Content-type: image/png');
	// Get the size of the full size image...
	list($width, $height) = getimagesize($filename);
	// Work out the size for the thumbnail image...
	if($width > $height){
		$newWidth = $maxWidth;
		$newHeight = $height*($maxWidth/$width);
	}else{
		$newHeight = $maxHeight;
		$newWidth = $width*($maxHeight/$height);
	}
	// Load in the full size image...
	$thumb = imagecreatetruecolor($newWidth, $newHeight);
	$source = imagecreatefrompng($filename);
	// Resize the thumbnail...
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	// Output the thumbnail...
	if($savePath == "null"){
		imagepng($thumb);
	}else{
		imagepng($thumb,$savePath);
		chmod($savePath,0777);
	}
}
?> 