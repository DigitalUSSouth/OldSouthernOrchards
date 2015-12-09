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
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '<div id="container">';
 require('navBar.php');
 require('db_info.php');
 $fruitName = $_GET['name'];
if($_SESSION['ISLOGGEDIN']=='1' && $_SESSION['ISADMIN']=='1')
{
	echo '<script type="text/javascript">
	tinymce.init({
	fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 36pt",
	selector: "section",
    plugins:  ["advlist autolink autoresize lists link image charmap print hr preview anchor pagebreak",
        "searchreplace wordcount visualchars visualblocks code fullscreen",
        "insertdatetime nonbreaking media table contextmenu paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar: "undo redo | styleselect | bold italic | fontsizeselect | fontselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});</script>';
}
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

	$query = $con2->prepare("SELECT filename, description FROM sub_orc_images WHERE name = ?");
	$query->bind_param('s', $fruitName);
}
$query->execute();
$query->store_result();
$query->bind_result($fileName, $desc);
echo '<form method="post" action="subsubindexHandler.php?name='.$fruitName.'">';
#echo '<form method="post" action="test.php">';
echo '<section>';
while ($query->fetch())
{
	if(strstr($desc, 'img')===FALSE)
	{
		$pieces = explode(" ", $fruitName);
		//$fruitType = trim(strrchr(trim($fruitName), ' '));
		$fruitType = array_pop($pieces);
		if(is_numeric($fruitType))
		{
			$fruitType = array_pop($pieces);
		}
		if($fruitType=='Cherry')
			echo '<img src="images/subimages/'.$fileName.'" alt="'.$fruitName.'" id="'.$fruitName.'" style="width:340px;height:612px;padding-right:25px;display:inline" />';
		else
			echo '<img src="images/subimages/'.$fruitType.'/'.$fileName.'" alt="'.$fruitName.'" id="'.$fruitName.'" style="width:340px;height:612px;padding-right:25px;display:inline" />';
	}
	echo htmlspecialchars_decode($desc);
}
echo '</section>';
if($_SESSION['ISLOGGEDIN']=='1' && $_SESSION['ISADMIN']=='1')
{
	echo '<input type="submit" />';
}
echo '</form>';
echo '</div>';
$query->close();
?>
</body>
</html>