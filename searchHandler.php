<?php
define('OSO_DB', true);
define('EMBEDDED',true);
function trim_result($needle, $haystack, $isRecipe)
{
	$pos = stripos($haystack, $needle);
	if($pos===FALSE)	# if search term is not in the data returned from the database, no need to continue
		return 0;
	$skip = 0;
	while($pos!==FALSE)	# while at least 1 search term is in the data
	{
		$start = (($pos - 50) >= 0) ? $pos - 50 : 0;		# extract fifty characters before and after search term, 
		$temp = substr($haystack, $start, 100);				# while not going before start of data
		$temp = strip_tags($temp);							# remove all HTML tags
		$temp = substr($temp, strpos($temp,">")+1, 100);	# remove partial HTML tag at start of substring, if it should exist
		$pos = stripos($haystack, $needle, $pos+1);
		if(stripos($temp,$needle)===FALSE)
			continue;
		if($skip > 1)	# if substring contains multiple occurances of search term, make sure only one substring is generated
		{
			$skip--;
			$GLOBALS['numresults']++;
			continue;
		}
		$temp = preg_replace("/($needle)/i", sprintf('<mark>$1</mark>'), $temp, -1, $skip);	# highlight search terms
		$GLOBALS['name'] = preg_replace("/\s\d$/", sprintf(''), $GLOBALS['name']);	# if fruit image name end with number, get rid of it
		if(!$isRecipe)
		{
			$result .= '<table class="in_text"><tr><td><span class="fruit_label">Fruit </span>
			<a href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$GLOBALS['name'].'">'.$GLOBALS['name'].'</a>
			</td></tr><tr><td>'.$temp.'</td></tr></table>';
		}
		else
		{
			$result .= '<table class="in_text"><tr><td><span class="fruit_label"><span class="fruit_label">Recipe </span>
			<a href="http://lichen.csd.sc.edu/oldsouthernorchards/recipe.php?name='.$GLOBALS['fruit'].'">'.$GLOBALS['fruit'].'</a>
			</td></tr><tr><td>'.$temp.'</td></tr></table>';
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
else if(stripos($_SERVER['HTTP_USER_AGENT'],'Android') || stripos($_SERVER['HTTP_USER_AGENT'],'iPhone') || stripos($_SERVER['HTTP_USER_AGENT'],'iPad') 
	|| stripos($_SERVER['HTTP_USER_AGENT'],'blackberry') || stripos($_SERVER['HTTP_USER_AGENT'],'Windows Phone') || stripos($_SERVER['HTTP_USER_AGENT'],'webOS')
	|| stripos($_SERVER['HTTP_USER_AGENT'],'Opera Mini') || (stripos($_SERVER['HTTP_USER_AGENT'],'Windows')&& stripos($_SERVER['HTTP_USER_AGENT'],'Touch')))
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
a {text-decoration:none;font-size:14pt;color:#dd2e03;font-weight:bold;}
a:hover {text-decoration:underline;}
/*table {padding-left:20px;}*/
.in_text {padding-top:20px;}
.in_text td {font-size:9pt;padding-top:5px;}
.fruit_label {font-size:16pt;}
.recipe_label {font-size:16pt;}
.nav {font-weight:normal;}
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
echo '<br><span style="color:#dd2e03;font-size:16pt;">Orchards</span><br>';
echo '<br><span class="search_style">Search Results ('.$numresults.') for \''.$term.'\'</span><br><hr>';
echo $allresults;
$numresults=0;
echo '<br><br><span>Not what you were looking for? </span><a href="search.php">Search again</a>';
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
		$GLOBALS['name'] = preg_replace("/\s\d$/", sprintf(''), $GLOBALS['name']);	# if fruit image name end with number, get rid of it
		$results .= '<table><tr><td><img src="images/subimages/'.$GLOBALS['fruitname'].'/'.$GLOBALS['thumbname'].'" id="'.$GLOBALS['name'].'" 
			alt="'.$GLOBALS['name'].'" style="width:100px;height:100px;"></td>';
		$results .= '<td><span class="fruit_label">&nbsp;&nbsp;&nbsp;&nbsp;Fruit </span>
			<a href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$GLOBALS['name'].'">'.$GLOBALS['name'].'</a>';
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
		$results .= '<table style="padding-bottom:20px;"><tr><td><span class="recipe_label">Recipes </span>
			<a href="http://lichen.csd.sc.edu/oldsouthernorchards/recipe.php?fruitName='.$GLOBALS['fruit'].'">'.$GLOBALS['fruit'].'</a></td></tr></table>';
	}
	$sql = "SELECT fruit, content FROM recipes WHERE content LIKE '%".$GLOBALS['term']."%'";
	$query = $GLOBALS['con2']->prepare($sql);
	$query->execute();
	$query->store_result();
	$query->bind_result($GLOBALS['fruit'], $GLOBALS['content']);
	while ($query->fetch())
	{
		$results .= trim_result($GLOBALS['term'], htmlspecialchars_decode($GLOBALS['content']),TRUE);
		#$results .= '<br>';
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
