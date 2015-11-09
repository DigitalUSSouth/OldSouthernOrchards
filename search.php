<?php
define('EMBEDDED',true);
#require('validateUser.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<link rel="stylesheet" href="mm_lodging1.css" type="text/css" />-->
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
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
</head>
<body onLoad="calcHeight();">
<?php
echo '<div id="container">';
require('navBar.php');
echo '<div id="content"><br />';
if (isset($_GET['Item']))
{
}
else
{
	echo '<h2>Old Southern Orchards</h2>
			<table>
				<tr>
					<td class="pageName">
						Search';
	echo 			'</td>
				</tr>
			</table>';
}
if (isset($_GET['Item']))
{
}
else
{
	echo '<form action="search.php" method="get">
	<table>
		<tr>
			<td style="width: 100px">
				Search for: 
			</td>
			<td style="width: 350px; height=50px; padding:10px;" colspan="3">
				<input type="text" name="Item" />
			</td>
		</tr>
		<tr>
			<td><input checked type="radio" name="Type" value="2" /> &nbsp;</td>
			<td><input type="radio" name="Type" value="4" /> &nbsp;</td>
			<td><input type="radio" name="Type" value="1" /> &nbsp;</td>
			<td align="left"><input type="radio" name="Type" value="3" />Any</td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" value="Search" />
			</td>
		</tr>
		<tr>
			<td id="spacer" style="height: 500px;">
				&nbsp;
			</td>
		</tr>
   </table>
   </form>';
}
echo '</div></div>';
?>
</body>
</html>
