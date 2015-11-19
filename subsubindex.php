<?php
#define('EMBEDDED',true);
define('OSO_DB', true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="jquery.qtip.min.css" type="text/css">
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	selector: "section",
    plugins:  ["advlist autolink autoresize lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '<div id="container">';
 #require('navBar.php');
 require('db_info.php');
 $fruitName = $_GET['name'];
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
if((!isset($desc)) || ctype_space($desc))
{
	$desc = 'No content currently in database';
}
echo '<form method="post" action="subsubindexHandler.php?name='.$fruitName.'">';
echo '<section>';
while ($query->fetch())
	{
		echo '<img src="images/subimages/'.$fileName.'" alt="'.$fruitName.'" id="'.$fruitName.'" "style="width:340px;height:612px;float:left;padding-right:25px" />';
		echo '<article id="main_content">'.$desc.'</article>';
	}
echo '</section>';
echo '<input type="submit" />';
echo '</form>';
echo '</div>';
$query->close();
?>
</body>
</html>