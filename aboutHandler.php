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

	$count = 0;
	foreach($_POST as $x)
	{
		$content = htmlspecialchars(stripslashes($x), ENT_QUOTES | ENT_HTML5);
		if($count == 0)
		{
			$asql = "UPDATE about_site SET content = '".$content."' WHERE title = 'About'";
			$count++;
		}
		else
		{
			$csql = "UPDATE about_site SET content = '".$content."' WHERE title = 'Contributors'";
		}
			
	}
	if ($con2->query($asql) === TRUE) 
	{
		echo "'About' Record updated successfully.";
		echo '<br>';
	} 
	else 
	{
		echo "Error updating 'About' record: " . $con2->error . '\n';
		echo '<br>';
		echo $asql;
	}
	if ($con2->query($csql) === TRUE) 
	{
		echo "'Contributors' Record updated successfully.";
		echo '<br>';
	} 
	else 
	{
		echo "Error updating 'Contributors' record: " . $con2->error . '\n';
		echo '<br>';
		echo $csql;
	}
	# create link to return to subsubindex.php
	$previous = "javascript:history.go(-1)";
	if(isset($_SERVER['HTTP_REFERER'])) 
		$previous = $_SERVER['HTTP_REFERER'];
	echo '<br><a href='.$previous.'>Return to previous page</a>';
	$query->close();
	$con2->close();
}
?>
</body>
</html>