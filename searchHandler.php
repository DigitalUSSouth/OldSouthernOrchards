<?php
define('OSO_DB', true);
define('EMBEDDED',true);
function trim_result($needle, $haystack)
{
	$pos = strpos($haystack, $needle);
	$start = (($pos - 50) >= 0) ? $pos - 50 : 0;
	$result = substr($haystack, $start, 100);
	$rep = '<mark>' . $needle . '</mark>';
	$result = str_ireplace($needle, $rep , $result);
	return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<?php
$isMobile=0;
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
      echo '<link rel="stylesheet" href="styles/style_firefox.css" type="text/css">';
}
else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
	echo '<link rel="stylesheet" href="styles/bootstrap.css" type="text/css">';
	echo '<script type="text/javascript" src="scripts/bootstrap.js"></script>';
	$isMobile=1;
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
}
?>
<style>
/*img { width:89px; height:178px;}*/
</style>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
echo '<div id="container">';
require('navBar.php');
echo '<div id="content">';
$isValid = preg_match("/^[a-zA-Z]+/", $_GET['searchTerm']);
if($isValid===FALSE) 
	die ('<p>An unexpected error has occured. Unable to complete your request.</p>');
else if($isValid==0)
	die ('<mark>Please enter a valid search query.</mark>');
else
	$term = $_GET['searchTerm'];
$type = $_GET['searchType'];
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

$numresults = 0;	// total number of search terms found

if($type==1)	// search fruits
{
	$allresults .= search_fruits();
}
else if($type==2)	// search recipes
{
	$allresults .= search_recipes();
}
else if($type==3)	// search all
{
	$allresults .= search_fruits();
	$allresults .=search_recipes();
}
echo "<span>Search Results (".$numresults.") for '".$term."'</span>";
echo $allresults;
$numresults=0;
echo 'Not what you were looking for? <a href="search.php">Search again</a>';
$query->close();
echo '</div></div></body></html>';
function search_fruits()
{
	$sql = "SELECT name, fruitname, description, display FROM sub_orc_data WHERE fruitname LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['name'], $GLOBALS['fruitname'], $GLOBALS['description'], $GLOBALS['display']);
	while ($query->fetch())
	{
		if($GLOBALS['display']==0)
			continue;
		$GLOBALS['numresults']++;
		$results .= '<p style="clear:both">Fruit <a href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$GLOBALS['name'].'">'.$GLOBALS['name'].'</a>';
		#$results .= htmlspecialchars_decode($GLOBALS['description']);
		$results .= '</p>';
	}
	$sql = "SELECT name, fruitname, description, display FROM sub_orc_data WHERE description LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['name'], $GLOBALS['fruitname'], $GLOBALS['description'], $GLOBALS['display']);
	while ($query->fetch())
	{
		if($GLOBALS['display']==0)
			continue;
		$GLOBALS['numresults']++;
		$results .= '<p style="clear:both">Fruit <a href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$GLOBALS['name'].'">'.$GLOBALS['name'].'</a><br>';
		$results .= trim_result($GLOBALS['term'], htmlspecialchars_decode($GLOBALS['description']));
		$results .= '</p>';
	}
	return $results;
}

function search_recipes()
{
	$sql = "SELECT fruit, content FROM recipes WHERE content LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['fruit'], $GLOBALS['content']);
	while ($query->fetch())
	{
		$GLOBALS['numresults']++;
		$results .= '<a href="http://lichen.csd.sc.edu/oldsouthernorchards/recipe.php?fruitName='.$GLOBALS['fruit'].'">'.$GLOBALS['fruit'].' Recipes</a><br>';
		$results .= htmlspecialchars_decode($GLOBALS['content']);
		$results .= '<br>';
	}
	return $results;
}
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
