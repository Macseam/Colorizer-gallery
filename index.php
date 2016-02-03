<html>

<head>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/colorizer.css">

<link href='http://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/colorizer.js" type="text/javascript"></script>

</head>

<body>

<?php

// Includes class to get the most common colors in an image

include_once("colors.inc.php");
$ex=new GetMostCommonColors();

// Looks through the folder ('gallery' by default) to find images and push them to array

$dir = "gallery/";

$needed_pictures = array();

$needed_pictures_exif = array();

if (is_dir($dir)){
	
	if ($dh = opendir($dir)){
		
		while (($file = readdir($dh)) !== false){
			
			if ($file !== ".." && $file !== ".") {
				
				array_push($needed_pictures,$dir.$file);
				
			}
			
		}
		
		sort($needed_pictures);
		
		closedir($dh);
		
	}
	
}

// Gets dominant color for every received image and outputs images with mix-blend-mode property

for ($loop_i = 0; $loop_i < count($needed_pictures); $loop_i++) {

$ex->image=$needed_pictures[$loop_i];
$colors=$ex->Get_Color();
$colors_key=array_keys($colors);

// If dominant color is pure black or white, gets second dominant color for that image

if (($colors_key[0] == '000000' || $colors_key[0] == 'ffffff') && $colors_key[1]) {
	
	$dominant_color = $colors_key[1];
	
}

else {
	
	$dominant_color = $colors_key[0];
	
}

// Output code follows

?>

<div class="pictures_container" style="border-bottom:10px solid #<?php echo $dominant_color; ?>;">

<div class="picture_source">
<img width="100%" height="auto" src="<?php echo $needed_pictures[$loop_i]; ?>" />
</div>

<div class="picture_colorizer" style="background-color:#<?php echo $dominant_color; ?>;"></div>

<div class="pictures_description_container">
<div class="pictures_description"><p>Заголовок</p><span>Описание картинки</span></div>
</div>

</div>

<?php

}

//Output is finished

?>

<body>

</html>