<?php
//make sure the appropriate values are actually set

if ((!isset($_POST['Username'])) || (!isset($_POST['Password']))) 
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
?>
