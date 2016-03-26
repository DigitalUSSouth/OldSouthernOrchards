<?php
define('EMBEDDED',true);
define('OSO_DB', true);
if ($_SESSION['ISLOGGEDIN']=='1' && $_SESSION['ISADMIN']=='1')
{
   header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<?php
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
      echo '<link rel="stylesheet" href="styles/style_firefox.css" type="text/css">';
}
else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
	echo '<link rel="stylesheet" href="styles/bootstrap.css" type="text/css">';
	echo '<script type="text/javascript" src="scripts/bootstrap.js"></script>';
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
	
}

?>
</head>
<body onLoad="calcHeight()">
<?php
echo '<div id="container">';
require('navBar.php');
echo '<div id="content"><br />
	<h2>Orchard</h2>';
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
