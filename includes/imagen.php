<?php

function makeThumbnail($sourcefile,$max_width, $max_height, $endfile, $type){
// Takes the sourcefile (path/to/image.jpg) and makes a thumbnail from it
// and places it at endfile (path/to/thumb.jpg).

// Load image and get image size.

//
switch($type){
	case'image/png':
		$img = imagecreatefrompng($sourcefile);
		break;
		case'image/jpeg':
		$img = imagecreatefromjpeg($sourcefile);
		break;
		case'image/gif':
		$img = imagecreatefromgif($sourcefile);
		break;
		default :
		return 'Un supported format';
}

$width = imagesx( $img );
$height = imagesy( $img );

if ($width > $height) {
    if($width < $max_width)
		$newwidth = $width;

	else

    $newwidth = $max_width;


    $divisor = $width / $newwidth;
    $newheight = floor( $height / $divisor);
}
else {

	 if($height < $max_height)
         $newheight = $height;
     else
		 $newheight =  $max_height;

    $divisor = $height / $newheight;
    $newwidth = floor( $width / $divisor );
}

// Create a new temporary image.
$tmpimg = imagecreatetruecolor( $newwidth, $newheight );

    imagealphablending($tmpimg, false);
    imagesavealpha($tmpimg, true);

// Copy and resize old image into new image.
imagecopyresampled( $tmpimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Save thumbnail into a file.

//compressing the file


switch($type){
	case'image/png':
		imagepng($tmpimg, $endfile, 0);
		break;
	case'image/jpeg':
		imagejpeg($tmpimg, $endfile, 100);
		break;
	case'image/gif':
		imagegif($tmpimg, $endfile, 0);
		break;

}

// release the memory
   imagedestroy($tmpimg);
   imagedestroy($img);
}



?>
