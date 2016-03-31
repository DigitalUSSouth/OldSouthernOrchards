<?php
session_start();
define('OSO_DB', true);

//make sure the appropriate values are actually set
if ((!isset($_POST['Username'])) || (!isset($_POST['Password'])) || $_POST['Username'] == '' || $_POST['Password'] == '') 
{
	echo 'Error: No information provided.<br />';
	die('<a href="login.php">Return</a>');
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
$query = "SELECT Id, Username, Password, IsAdmin FROM `Users` 
WHERE (Username = '$userName' AND Password = '$userPass')";
$result = mysql_query($query);

//if no rows are returned, this username/password combination does not exist
if (mysql_numrows($result) == 0)
{
	$_SESSION['ISLOGGEDIN']='0';
	echo 'Error: Provided username/password combination does not exist.<br />';
	die('<a href="login.php">Return</a>');
}
//if there is 1 row returned, log in the user by creating a session of their passhash
if (mysql_numrows($result) == 1)
{
	//let's store the username and password
	while ($row = mysql_fetch_array($result))
	{
		$userId = $row['Id'];
		$userName = $row['Username'];
		$userPass = $row['Password'];
		$_SESSION['UU']=$userId;
		$_SESSION['UP']=$userPass;
		$_SESSION['ISADMIN']=$row['IsAdmin'];
		$_SESSION['ISLOGGEDIN']='1';
	}	
	//successful login, let the user know
	if(isset($_POST['referer']) && $_POST['referer'] !='')
		header('Location: '.$_POST['referer']);
	else
		header('Location: index.php'); 
}
//close connection with database
mysql_close($con);
?>
