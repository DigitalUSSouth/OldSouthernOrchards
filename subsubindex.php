<?php
define('EMBEDDED',true);
define('OSO_DB', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/tinymce/tinymce.min.js"></script>
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
	echo '<link rel="stylesheet" href="styles/bootstrap.css" type="text/css">';
	echo '<script type="text/javascript" src="scripts/bootstrap.js"></script>';
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
     echo '<link rel="stylesheet" href="styles/style_firefox.css" type="text/css">';
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';	
}
?>
</head>
<body onLoad="calcHeight();">
<?php
header("Content-type: text/html; charset=utf-8");
 echo '<div id="container">';
 require('navBar.php');
 require('db_info.php');
 // tinymce editor
if(isset($_SESSION['ISLOGGEDIN']) && $_SESSION['ISLOGGEDIN']=='1' && isset($_SESSION['ISADMIN']) && $_SESSION['ISADMIN']=='1')
{
	echo '<script type="text/javascript">
	tinymce.init({
	forced_root_block : false,
	fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 36pt",
	font_formats: "Agency FB=agency fb,sans-serif;"+
				"Andale Mono=andale mono,times;"+
                "Arial=arial,helvetica,sans-serif;"+
                "Arial Black=arial black,avant garde;"+
				"Arial Narrow=arial narrow,sans-serif;"+
				"Bodoni MT=bodoni mt,times new roman,sans-serif;"+
                "Book Antiqua=book antiqua,palatino;"+
				"Calibri=calibri,sans-serif;"+
				"Cambria=cambria,serif;"+
				"Century Gothic=century gothic,sans-serif;"+
                "Comic Sans MS=comic sans ms,sans-serif;"+
				"Consolas=consolas,monaco,monospace;"+
				"Copperplate=copperplate gothic light,sans-serif;"+
                "Courier New=courier new,courier;"+
				"Garamond=garamond,serif;"+
                "Georgia=georgia,palatino;"+
                "Helvetica=helvetica;"+
                "Impact=impact,chicago;"+
				"Lucida Console=lucida console,monaco,monospace;"+
				"Lucida Sans Unicode=lucida sans unicode,lucida grande,sans-serif;"+
				"Palatino Linotype=palatino linotype,book antiqua,palatino,serif;"+
				"Rockwell=rockwell,times new roman,serif;"+
                "Symbol=symbol;"+
                "Tahoma=tahoma,arial,helvetica,sans-serif;"+
                "Terminal=terminal,monaco;"+
                "Times New Roman=times new roman,times;"+
                "Trebuchet MS=trebuchet ms,geneva;"+
                "Verdana=verdana,geneva;"+
                "Webdings=webdings;"+
                "Wingdings=wingdings,zapf dingbats",
	selector: "section",
    plugins:  ["advlist autolink autoresize lists link image charmap print hr preview anchor pagebreak",
        "searchreplace wordcount visualchars visualblocks code fullscreen",
        "insertdatetime nonbreaking media table contextmenu paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar: "undo redo | styleselect | bold italic | fontsizeselect | fontselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});</script>';
}
// end tinymce editor
echo '<div id="subsubcontent">';
//connect to the database
$host = "localhost";
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
//setup up our query
if (isset($_GET['name']))
{
	if(!is_numeric($_GET['name']))
	{
 		$fruitName = $_GET['name'];
 	}
 	else
 	{
 		header('Location: http://lichen.csd.sc.edu/oldsouthernorchards/');
 	}

	$query = $con2->prepare("SELECT filename, description FROM sub_orc_data WHERE name = ?");
	$query->bind_param('s', $fruitName);
}
$query->execute();
$query->store_result();
$query->bind_result($fileName, $desc);
echo '<form method="post" action="subsubindexUpdater.php?name='.$fruitName.'">';
#echo '<form method="post" action="test.php">';
echo '<section style="background-color:white;padding-left:27px;" id="spacer">';
while ($query->fetch())
{
		$fruitName = preg_replace("/\s\d$/", sprintf(''), $fruitName);	# if fruit image name end with number, get rid of it
		$pieces = explode(" ", $fruitName);
		$fruitType = array_pop($pieces);
		if ($fruitType==='Apple')
		{
			$isCrab = array_pop($pieces);
			if($isCrab==='Crab')
				$fruitType = 'Crab Apple';
		}
		if(strstr($desc, 'img')===FALSE)
			echo '<img src="images/subimages/'.$fruitType.'/'.$fileName.'" alt="'.$fruitName.'" id="'.$fruitName.'" draggable="false" style="max-width:340px;max-height:612px;padding-right:25px;display:inline;float:left;" />';
	echo htmlspecialchars_decode($desc, ENT_QUOTES | ENT_HTML5);
}
echo '</section>';
$query->close();
if($_SESSION['ISLOGGEDIN']=='1' && $_SESSION['ISADMIN']=='1')
{
	echo '<input type="submit" />';
	echo '<input type="reset" />';
	# add button to subindex page
	$subind = 'http://lichen.csd.sc.edu/oldsouthernorchards/subindex.php?fruitName='.$fruitType;
	echo '<input type="button" value="Return to subindex page" onClick="window.location.href=\''.$subind.'\'">';
	# add previous image button
	$query = $con2->prepare("SELECT MAX(name) FROM sub_orc_data WHERE name < ? AND fruitname = ? AND display = 1");
	$query->bind_param('ss', $fruitName, $fruitType);
	$query->execute();
	$query->store_result();
	$query->bind_result($pnname);
	while($query->fetch())
	{
		if($pnname)
		{
			$pnname = str_ireplace("'", "\'", $pnname);	#escape any apostrophes in fruit's name
			echo '<input type="button" value="Previous fruit" 
				onClick="window.location.href=\'http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$pnname.'\'">';
		}
	}
	# add next image button
	$query = $con2->prepare("SELECT MIN(name) FROM sub_orc_data WHERE name > ? AND fruitname = ? AND display = 1");
	$query->bind_param('ss', $fruitName, $fruitType);
	$query->execute();
	$query->store_result();
	$query->bind_result($pnname);
	while($query->fetch())
	{
		if($pnname)
		{
			$pnname = str_ireplace("'", "\'", $pnname);	#escape any apostrophes in fruit's name
			echo '<input type="button" value="Next fruit" 
				onClick="window.location.href=\'http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name='.$pnname.'\'">';
		}
	}
}
echo '</form>';
echo '</div></div>';
$query->close();
$con2->close();
?>
</body>
</html>