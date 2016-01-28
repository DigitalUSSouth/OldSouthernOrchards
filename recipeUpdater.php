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
$fruitName = $_GET['name'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
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
	
	foreach($_POST as $x)
	{
		$content .= htmlspecialchars(stripslashes($x));
	}
	$sql = "UPDATE recipes SET content = '".$content."' WHERE fruit = '".$fruitName."'";
	if ($con2->query($sql) === TRUE) 
	{
		echo "Record updated successfully";
		# create link to return to subsubindex.php
		$previous = "javascript:history.go(-1)";
		if(isset($_SERVER['HTTP_REFERER'])) 
			$previous = $_SERVER['HTTP_REFERER'];
		echo '<br><a href='.$previous.'>Return to previous page</a>';
	} 
	else 
	{
		echo "Error updating record: " . $con2->error . '\n';
		echo $sql;
	}
	$query->close();
}
?>
</body>
</html>