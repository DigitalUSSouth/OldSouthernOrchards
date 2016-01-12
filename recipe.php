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
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
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
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '
 <div id="container">';
 require('navBar.php');
 require('db_info.php');
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

mysql_select_db("recipes",$con2);
//setup up our query
$query = "SELECT * FROM `recipes` WHERE Id = $fruitName";
$result = mysql_query($query);

//if no rows are returned, recipe does not exist
if (mysql_numrows($result) == 0)
{
   die('Error: Recipes for ' .$fruitName. ' do not exist');
}
require('header.php');
//close connection with database
mysql_close($con2);
?>
</body>
</html>