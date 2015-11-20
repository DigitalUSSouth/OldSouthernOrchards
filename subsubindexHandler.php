<?php
define('OSO_DB', true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
$fruitName = $_GET['name'];
#echo $fruitName;
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
	foreach ($_POST AS $key=>$value) 
	{
		$dom = new DOMDocument();
		@$dom->loadHTML($value);
		foreach($dom->getElementsByTagName('article') as $article) 
		{
			#if($article->hasAttribute('id') && $article->getAttribute('id') == 'main_content')
			#{
				$children = $article->childNodes;
				foreach ($children as $child) 
				{ 
					$content .= htmlspecialchars(stripslashes($child->c14n()));
					#echo $content;
				}
			#}
		}
	}
	$sql = "UPDATE sub_orc_images SET description = '".$content."' WHERE name = '".$fruitName."'";
	if ($con2->query($sql) === TRUE) 
	{
		echo "Record updated successfully";
	} 
	else 
	{
		echo "Error updating record: " . $conn->error;
	}
	$query->close();
}
?>
</body>
</html>