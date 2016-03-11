<?php
define('EMBEDDED',true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
}
?>
</head>
<body onLoad="calcHeight();">
<?php
echo '<div id="container">';
require('navBar.php');
echo '<div id="content"><br />';
	echo '<h2>Old Southern Orchards</h2>
			<table>
				<tr>
					<td>
						<span class="search_style">Search</span>';
	echo 			'</td>
				</tr>
			</table>';
	echo '<form method="get" action="searchHandler.php">';
	echo '<table>
		<tr>
			<td>
				Search for: 
			</td>
			<td style="height:75px;">
				<input type="text" name="searchTerm" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align:center;"><input checked type="radio" name="searchType" value="1" />Fruits</td>
			<td style="text-align:center;"><input type="radio" name="searchType" value="2" />Recipes</td>
			<td style="text-align:center;"><input type="radio" name="searchType" value="3" />Any</td>
		</tr>
		<tr>
			<td colspan="3" style="height:75px;"><input type="submit" value="Search" />
			</td>
		</tr>
		<tr>
			<td id="spacer" colspan="3">
				&nbsp;
			</td>
		</tr>
   </table>
   </form>';
echo '</div></div>';
?>
</body>
</html>
