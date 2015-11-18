<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	//connect to the database
	/*$host = "localhost";
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
*/
	foreach ($_POST AS $key=>$value) 
	{
		#$html = htmlspecialchars(stripslashes(trim($value)));
		$dom = new DOMDocument();
		@$dom->loadHTML($value);
		foreach($dom->getElementsByTagName('article') as $article) 
		{
			$children = $article->childNodes;
			foreach ($children as $child) 
			{ 
				echo $child->nodeValue;
				#$innerHTML .= $article->ownerDocument->saveHTML($child);
			}
			#echo $innerHTML;
		}
	}
}
?>
</body>
</html>