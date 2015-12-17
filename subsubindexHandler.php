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
	foreach($_POST as $x)
	{
		$content .= htmlspecialchars(stripslashes($x));
	}
	/*foreach ($_POST AS $key=>$value) 
	{
		$dom = new DOMDocument();
		@$dom->loadHTML($value);
		foreach($dom->getElementsByTagName('*') as $tag)
		{
			$tagName = strtolower(trim($tag->tagName));
			if($tagName == "img" || $tagName == "body" || $tagName == "head")
				continue;
			if($article->hasAttribute('id') && $article->getAttribute('id') == 'main_content')
			{
			$children = $tag->childNodes;
			foreach ($children as $child) 
			{ 
				$content .= htmlspecialchars(stripslashes($child->c14n()));
				#echo $content;
			}
			}
		}
	}*/
	$sql = "UPDATE sub_orc_images SET description = '".$content."' WHERE name = '".$fruitName."'";
	if ($con2->query($sql) === TRUE) 
	{
		echo "Record updated successfully";
		#echo '<a href="http://lichen.csd.sc.edu/oldsouthernorchards/subsubindex.php?name="'.$fruitName.'>Return to previous page</a>';
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