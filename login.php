<?php
define('EMBEDDED',true);
define('OSO_DB', true);
require('validateUser.php');
if ($isLoggedIn == 1)
{
   header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
      echo '<link rel="stylesheet" href="style_firefox.css" type="text/css">';
}
else
{
	echo '<link rel="stylesheet" href="style.css" type="text/css">';
	
}

?>
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
</head>
<body onLoad="calcHeight()">
<?php
echo '<div id="container">';
require('navBar.php');
echo '<div id="content"><br />
	<h2>Old Southern Orchards</h2>';
echo '<table>
		<tr>
			<td class="bodyText" style="padding-top:0; padding-left: 0;">Log In</td>
		</tr>
		<tr>
			<td>';
				require('loginField.php');
echo '		</td>
		</tr>
		<tr>
			<td id="spacer" style="height: 500px">
				&nbsp;
			</td>
		</tr>
	</table';
?>
</body>
</html>
