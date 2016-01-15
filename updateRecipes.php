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
	
	$sql = "TRUNCATE recipes"; 
	if ($con2->query($sql) === FALSE) 
	{
		die 'Error: Unable to truncate old recipe table. Please contact the administrator.';
	}
	$firstOrigin = TRUE;
	foreach($_POST as $x)
	{
		if(strpos($x, 'class="origin"') === FALSE)
			$desc_content .= htmlspecialchars(stripslashes($x));
		else
		{
			$orig_content = htmlspecialchars(stripslashes($x));
			if($firstOrigin === TRUE)
			{
				$firstOrigin = FALSE;
			}
			else
			{
				$sql = 'INSERT INTO recipes VALUES('.$orig_content.','.$fruitName.','.$desc_content.')';
				if ($con2->query($sql) === TRUE) 
				{
					echo "Recipe updated successfully";
					#echo '<a href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name="'.$fruitName.'>Return to previous page</a>';
				} 
				else 
				{
					echo "Error updating recipe: " . $con2->error . '\n';
					echo $sql;
				}
				$desc_content = '';
			}
		}
	}
	$query->close();
}
?>
</body>
</html>