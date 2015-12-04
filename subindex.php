<?php
define('EMBEDDED',true);
define('OSO_DB', true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
      echo '<link rel="stylesheet" href="style_firefox.css" type="text/css">';
}
else
{
	echo '<link rel="stylesheet" href="style.css" type="text/css">';	
}
?>
<link rel="stylesheet" href="jquery.qtip.min.css" type="text/css">
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery.qtip.min.js"></script>
</script>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '
 <div id="container">';
 require('navBar.php');
 require('db_info.php');
?>
<?php
 $fruitName = $_GET['fruitName'];
 
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
if (isset($_GET['fruitName']))
{
	if(!is_numeric($_GET['fruitName']))
	{
 		$fruitName = $_GET['fruitName'];
 	}
 	else
 	{
 		header('Location: http://lichen.csd.sc.edu/oldsouthernorchards/');
 	}

	$query = $con2->prepare("SELECT filename, name, thumbname FROM sub_orc_images WHERE fruitName = ? ORDER BY filename");
	$query->bind_param('s', $fruitName);
}
$query->execute();
$query->store_result();
$query->bind_result($fileName, $name, $thumbName);
/*echo '<div id="content">';
echo '<div style="padding-top: 20px; padding-bottom: 0;"><a href="index.php">&lt; Back to Home</a></div>';
echo '<div style="line-height: 0; padding-bottom: 15px; margin-bottom: 15px;"><h1>'.$_GET['fruitName'].'</h1></div>';*/
$rowcount = 0;
echo '<table style="margin-left:auto; margin-right:auto;"><tr>';
while ($query->fetch())
{
	if($rowcount % 5 == 0 && $rowcount != 0)
		echo '</td><tr>';
		echo '<td class="hasToolTip">
			<span class="tooltip"><p><b>Complex HTML</b> for your tooltip <i>here</i>!</p></span>
			<a href="subsubindex.php?name='.$name.'">';
		if($fruitName=="Cherry")	
			echo '<img src="images/subimages/'.$fileName.'" id="'.$name.'" alt="'.$name.'" style="margin-left:auto; margin-right:auto;width:170px;height:306px;" />';
		else
			echo '<img src="images/subimages/'.$fruitName.'/'.$thumbName.'" id="'.$name.'" alt="'.$name.'" style="margin-left:auto; margin-right:auto;" />';
		echo '</a></td>';
	$rowcount++;
}
echo '</tr></table></div>';
?>
</body>
</html>
