<?php
session_start();
//gather required information via validateUser.php
define('EMBEDDED',true);
define('OSO_DB', true);
//if they are logged in, log them out
if (isset($_SESSION['ISLOGGEDIN']))
{
	if($_SESSION['ISLOGGEDIN']=='1')
		$_SESSION['ISLOGGEDIN']='0';
}
if (isset($_SESSION['ISADMIN']))
{
	if($_SESSION['ISADMIN']=='1')
		$_SESSION['ISADMIN']='0';
}
unset($_SESSION['UU']);
unset($_SESSION['UP']);
unset($_SESSION['ISADMIN']);
unset($_SESSION['ISLOGGEDIN']);
/*
if ($isLoggedIn == 1)
{
	$user=$_COOKIE['UU'];
	$pw=$_COOKIE['UP'];
	unset($_COOKIE['UU']);
	unset($_COOKIE['UP']);
	setcookie('UU',FALSE,time()-3600);
	setcookie('UP',FALSE,time()-3600);
	$isLoggedIn=0;
}
*/
header('Location: index.php');
?>