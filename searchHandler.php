<?php
define('OSO_DB', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
$isValid = preg_match("/^[a-zA-Z]+/", $_GET['searchTerm']);
if($isValid===FALSE) 
	die ('<p>An unexpected error has occured. Unable to complete your request.</p>');
else if($isValid==0)
	die ('<mark>Please enter a valid search query.</mark>');
else
	$term = $_GET['searchTerm'];
$type = $_GET['searchType'];
//if ($_SERVER['REQUEST_METHOD'] == 'POST') 
//{
	 require('db_info.php'); 
	//connect to the database
	$host = 'localhost'; 
	$username = getUserName(); 
	$password = getPassword(); 
	$database = getDB();

	$con2 = new mysqli($host, $username, $password, $database);

	if (!$con2)
		die('Could not connect: ' . mysql_error());

	$query = $con2->prepare("SET NAMES 'utf8'");
	$query->execute();
	$query->close();

	$query = $con2->prepare("SET CHARACTER SET 'utf8'");
	$query->execute();
	$query->close();

	$query = $con2->prepare("SET COLLATION_CONNECTION='utf8_general_ci'");
	$query->execute();
	$query->close();
	
	if($type==2)	// search recipes
	{
		/*$sql = "SELECT COUNT(*) FROM recipes WHERE content LIKE '%".$term."%'";
		$query = $con2->prepare($sql);
		$query->execute();
		$query->store_result();
		$query->bind_result($numrows);*/
		$sql = "SELECT fruit, content FROM recipes WHERE content LIKE '%".$term."%'";
		$query = $con2->prepare($sql);
		$query->execute();
		$query->store_result();
		$query->bind_result($fruit, $content);
		//echo "Search results ( ".$numrows." ) for '".$term."'";
		while ($query->fetch())
		{
			echo '<a href="http://lichen.csd.sc.edu/oldsouthernorchards/recipe.php?fruitName='.$fruit.'">'.$fruit.' Recipes</a><br>';
			echo htmlspecialchars_decode($content);
			echo '<br>';
		}
	}
	echo 'Not what you were looking for? <a href="search.php">Search again</a>';
	$query->close();
//}
/*function resizeImage($originalImage,$toWidth,$toHeight){

    // Get the original geometry and calculate scales
    list($width, $height) = getimagesize($originalImage);
    $xscale=$width/$toWidth;
    $yscale=$height/$toHeight;

    // Recalculate new size with default ratio
    if ($yscale>$xscale){
        $new_width = round($width * (1/$yscale));
        $new_height = round($height * (1/$yscale));
    }
    else {
        $new_width = round($width * (1/$xscale));
        $new_height = round($height * (1/$xscale));
    }

    // Resize the original image
    $imageResized = imagecreatetruecolor($new_width, $new_height);
    $imageTmp     = imagecreatefromjpeg ($originalImage);
    imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    return $imageResized;
}*/
?>
