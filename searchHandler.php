<?php
define('OSO_DB', true);
define('EMBEDDED',true);
function trim_result($needle, $haystack, $isRecipe)
{
	$pos = stripos($haystack, $needle);
	if($pos===FALSE)
		return 0;
	while($pos!==FALSE)
	{
		$start = (($pos - 50) >= 0) ? $pos - 50 : 0;
		$temp = substr($haystack, $start, 100);
		#$temp = strip_tags($temp);
		$temp = substr($temp, strpos($temp,">")+1, 100);
		#$result = substr($temp, 0, strpos($temp,"<")-1);
		$pos = stripos($haystack, $needle, $pos+1);
		if(stripos($temp,$needle)===FALSE)
			continue;
		$rep = '<mark>' . $needle . '</mark>';
		$temp = str_ireplace($needle, $rep , $temp);
		if(!$isRecipe)
		{
			$result .= '<span style="font-size:9pt;"><p style="clear:both"><span class="fruit_label">Fruit </span>
			<a style="font-weight:bold;" 
			href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$GLOBALS['name'].'">'.$GLOBALS['name'].'</a><br>'.$temp.'</p></span>';
		}
		else
		{
			$result .= '<span style="font-size:9pt;"><p style="clear:both"><span class="fruit_label">Recipe </span>
			<a style="font-weight:bold;" 
			href="http://lichen.csd.sc.edu/oldsouthernorchards/recipe.php?name='.$GLOBALS['fruit'].'">'.$GLOBALS['fruit'].'</a><br>'.$temp.'</p></span>';
		}
		$GLOBALS['numresults']++;
	}
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
body {color:black;font-size:12pt;}
a {text-decoration:none;font-size:14pt;color:#dd2e03;}
a:hover {text-decoration:underline;}
.fruit_label {font-size:16pt;padding-left:20px;}
.recipe_label {font-size:16pt;padding-left:20px;}
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
	$allresults .= '<hr>';
	$allresults .= search_recipes();
}
echo '<br><span style="color:#dd2e03;font-size:16pt;">Old Southern Orchards</span><br>';
echo '<br><span class="search_style">Search Results ('.$numresults.') for \''.$term.'\'</span><br><br>';
echo $allresults;
$numresults=0;
echo '<br><span>Not what you were looking for? </span><a href="search.php">Search again</a>';
$query->close();
echo '</div></div></body></html>';
function search_fruits()
{
	# First, we search the name of the fruits for the search term
	$sql = "SELECT name, fruitname, description, thumbname, display FROM sub_orc_data WHERE fruitname LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['name'], $GLOBALS['fruitname'], $GLOBALS['description'], $GLOBALS['thumbname'], $GLOBALS['display']);
	while ($query->fetch())
	{
		# if fruit is not being displayed on OSO, skip it
		if($GLOBALS['display']==0)
			continue;
		$GLOBALS['numresults']++;
		$results .= '<table><tr><td><img src="images/subimages/'.$GLOBALS['fruitname'].'/'.$GLOBALS['thumbname'].'" id="'.$GLOBALS['name'].'" 
			alt="'.$GLOBALS['name'].'" style="width:100px;height:100px;"></td>';
		$results .= '<td><span class="fruit_label">Fruit </span>
			<a style="font-weight:bold;" href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$GLOBALS['name'].'">'.$GLOBALS['name'].'</a>';
		$results .= '</td></tr></table>';
	}
	# Now, we search the description on the subsubindex pages
	$sql = "SELECT name, fruitname, description, display FROM sub_orc_data WHERE description LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['name'], $GLOBALS['fruitname'], $GLOBALS['description'], $GLOBALS['display']);
	while ($query->fetch())
	{
		# if fruit is not being displayed on OSO, skip it
		if($GLOBALS['display']==0)
			continue;
		# remove image tag from start of description
		$desc = substr($GLOBALS['description'], strpos($GLOBALS['description'],"/&gt;")+1);
		# extract term and sample text to be displayed in search results
		$trimmed = trim_result($GLOBALS['term'], htmlspecialchars_decode($desc), FALSE);
		# test if description does not actually have the search term
		if($trimmed===0)
			continue;
		$results .= $trimmed;
	}
	return $results;
}

function search_recipes()
{
	$sql = "SELECT fruit FROM recipes WHERE fruit LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['fruit']);
	while ($query->fetch())
	{
		$GLOBALS['numresults']++;
		$results .= '<span class="recipe_label">Recipes </span>
				<a style="font-weight:bold;" href="http://lichen.csd.sc.edu/oldsouthernorchards/recipe.php?fruitName='.$GLOBALS['fruit'].'">'.$GLOBALS['fruit'].'</a><br>';
	}
	$sql = "SELECT fruit, content FROM recipes WHERE content LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['fruit'], $GLOBALS['content']);
	while ($query->fetch())
	{
		$GLOBALS['numresults']++;
		$results .= trim_result($GLOBALS['term'], htmlspecialchars_decode($GLOBALS['content']),TRUE);
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
