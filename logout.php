<?php

//gather required information via validateUser.php
define('EMBEDDED',true);
define('OSO_DB',true);
#require('validateUser.php');

//if they are logged in, log them out
if ($isLoggedIn == 1)
{
	$user=$_COOKIE['UU'];
	$pw=$_COOKIE['UP'];
	setcookie('UU',$user,-1,'/');
	setcookie('UP',$pw,-1,'/');
}
echo '<script type="text/javascript">alert("'.$_COOKIE['UU'].'")</script>';
header('Location: index.php');
?>