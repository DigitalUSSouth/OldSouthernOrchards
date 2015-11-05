<?php
session_start();
define('EMBEDDED',true);
define('OSO_DB', true);
require('validateUser.php');
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
<script type="text/javascript" src="OSO.js"></script>
</head>
<body>
<?php
 echo '<div id="container">';
 #echo '<div style="visibility: hidden;">';
 require('navBar.php');
 #echo '</div>';
 echo '<div id="content"><br /><h2 id="oso_header" style="text-align: center">Old Southern Orchards<span class="subtitle"></span></h2>';
 echo '<table id="orchardTable">';
 echo    '<tr>
				<td rowspan="5" style="vertical-align: top;">
					<nav id="fruitMenu" style="width:175px;">
					<a href="blank.htm" class="recipe-links" alt="Apple Recipes">Apple Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Apricot Recipes">Apricot Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Cherry Recipes">Cherry Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Crab Apple Recipes">Crab Apple Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Grape Recipes">Grape Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Grapefruit Recipes">Grapefruit Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Kumquat Recipes">Kumquat Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Lemon Recipes">Lemon Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Lime Recipes">Lime Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Loquat Recipes">Loquat Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Mango Recipes">Mango Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Mulberry Recipes">Mulberry Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Orange Recipes">Orange Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Pawpaw Recipes">Pawpaw Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Peach Recipes">Peach Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Pear Recipes">Pear Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Persimmon Recipes">Persimmon Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Plum Recipes">Plum Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Quince Recipes">Quince Recipes</a>
					<a href="blank.htm" class="recipe-links" alt="Tangerine Recipes">Tangerine Recipes</a>
					</nav>
				</td>
				<td class="bodyText" id="fruitTableStart">
					<a href="orchard.php?orcName=Apple" alt="Apple"><img src="images/Apple-CarolinaBeauty-thumb.png" id="Apple-CarolinaBeauty-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Apricot" alt="Apricot"><img src="images/Apricot-Stanford-thumb.png" id="Apricot-Stanford-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Cherry" alt="Cherry"><img src="images/Cherry-Bigarreau-thumb.png" id="Cherry-Bigarreau-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Crab Apple" alt="Crab Apple"><img src="images/CrabApple-Hewes-thumb.png" id="CrabApple-Hewes-Image" /></a>
				</td> 
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="orchard.php?orcName=Grape" alt="Grape"><img src="images/Grape-Muscadine-thumb.png" id="Grape-Muscadine-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Grapefruit" alt="Grapefruit"><img src="images/Grapefruit-Royal-thumb.png" id="Grapefruit-Royal-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Kumquat" alt="Kumquat"><img src="images/Kumquat-Passmore-thumb.png" id="Kumquat-Passmore-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Lemon" alt="Lemon"><img src="images/Lemon-Sport-thumb.png" id="Lemon-Sport-Image" /></a>
				</td>			
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="orchard.php?orcName=Lime" alt="Lime"><img src="images/Lime-Lisbon-thumb.png" id="Lime-Lisbon-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Loquat" alt="Loquat"><img src="images/Loquat-Oliver-thumb.png" id="Loquat-Oliver-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Mango" alt="Mango"><img src="images/Mango-Johnson-thumb.png" id="Mango-Johnson-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="orchard.php?orcName=Mulberry" alt="Mulberry"><img src="images/Mulberry-Travis-thumb.png" id="Mulberry-Travis-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="orchard.php?orcName=Orange" alt="Orange"><img src="images/Orange-Fausta-thumb.png" id="Orange-Fausta-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Pawpaw" alt="Pawpaw"><img src="images/Pawpaw-1924-thumb.png" id="Pawpaw-1924-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Peach" alt="Peach"><img src="images/Peach-RedCheek-thumb.png" id="Peach-RedCheek-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Pear" alt="Pear"><img src="images/Pear-Read-thumb.png" id="Pear-Read-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="orchard.php?orcName=Persimmon" alt="Persimmon"><img src="images/Persimmon-Fuyu-thumb.png" id="Persimmon-Fuyu-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Plum" alt="Plum"><img src="images/Plum-Lafayette-thumb.png" id="Plum-Lafayette-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Quince" alt="Quince"><img src="images/Quince-Champion-thumb.png" id="Quince-Champion-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="orchard.php?orcName=Tangerine" alt="Tangerine"><img src="images/Tangerine-Dancy-thumb.png" id="Tangerine-Dancy-Image" /></a>
				</td>
		</tr>';
echo '<tr>
			<td colspan="4" style="width: 1px; height: 10px; border: 0px;">
				<img src="images/CDH_Logo_spot_outlines.png" style="width: auto; height: auto; max-width: 300px; max-height: 150px; padding-left: 80px;" />
				<img src="images/ISS_logo_cmyk.png" style="width: auto; height: auto; max-width: 266px; max-height: 133px; padding-top: 10px;"/>
			</td>
		</tr>';
?>
</body>