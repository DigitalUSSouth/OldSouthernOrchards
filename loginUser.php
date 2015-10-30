<?php
define('OSO_DB', true);
//make sure the appropriate values are actually set
if ((!isset($_POST['Username'])) || (!isset($_POST['Password'])) || $_POST['Username'] == '' || $_POST['Password'] == '') 
{
	echo 'Error: No information provided.<br />';
	die('<a href="index.php">Return</a>');
}
else
{
	//initialize variables
	$userName = $_POST['Username'];
	$userPass = md5($_POST['Password']);
}
require('db_info.php');
$con = mysql_connect("localhost",getUserName(),getPassword());
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db(getDB(),$con);
//setup up our query
$query = "SELECT Id, Username, Password FROM `Users` 
WHERE (Username = '$userName' AND Password = '$userPass')";
$result = mysql_query($query);

//if no rows are returned, this username/password combination does not exist
if (mysql_numrows($result) == 0)
{
	echo 'Error: Provided username/password combination does not exist.<br />';
	die('<a href="index.php">Return</a>');
}
//if there is 1 row returned, log in the user by creating a cookie of their passhash
if (mysql_numrows($result) == 1)
{
	//let's store the username and password
	while ($row = mysql_fetch_array($result))
	{
		$userId = $row['Id'];
		$userName = $row['Username'];
		$userPass = $row['Password'];
	}
	
	//create cookie
	setcookie('UU',$userId,time()+3600);
	setcookie('UP',$userPass,time()+3600);
	
	//successful login, let the user know
	header('Location: index.php'); 
}

//close connection with database
mysql_close($con);
?>
