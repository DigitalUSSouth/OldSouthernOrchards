<?php
define('EMBEDDED',true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '
 <div id="container">';
 require('navBar.php');
?>
<?php
 $vegName = $_GET['vegName'];
 $vegId = $_GET['Id'];
 
//connect to the database
$host = "localhost";
$username = "whgoss";
$password = "Braveheart05";
$database = "FoodStudies";

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
?>
</body>
</html>
