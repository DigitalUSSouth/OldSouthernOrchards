<?php
session_start();
define('EMBEDDED',true);
define('OSO_DB', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
      echo '<link rel="stylesheet" href="styles/style_firefox.css" type="text/css">';
}
else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
}
?>
<script type="text/javascript" src="scripts/OSO.js"></script>
<!--<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>-->
</script>
</head>
<body>
<?php
 echo '<div id="container">';
 echo '<div style="visibility: hidden;">';
 require('navBar.php');
 echo '</div>';
 echo '<div id="content"><br /><h2 id="oso_header" style="text-align: center">Old Southern Orchards<span class="subtitle"></span></h2>';
 echo '<table id="orchardTable">';
 echo    '<tr>
				<td rowspan="6" style="vertical-align: top;">
					<nav id="fruitMenu">
					<a href="recipe.php?fruitName=Apple" class="recipe-links" title="Apple Recipes">Apple Recipes</a><br />
					<a href="recipe.php?fruitName=Apricot" class="recipe-links" title="Apricot Recipes">Apricot Recipes</a><br />
					<a href="recipe.php?fruitName=Cherry" class="recipe-links" title="Cherry Recipes">Cherry Recipes</a><br />
					<a href="recipe.php?fruitName=Crab Apple" class="recipe-links" title="Crab Apple Recipes">Crab Apple Recipes</a><br />
					<a href="recipe.php?fruitName=Grape" class="recipe-links" title="Grape Recipes">Grape Recipes</a><br />
					<a href="recipe.php?fruitName=Grapefruit" class="recipe-links" title="Grapefruit Recipes">Grapefruit Recipes</a><br />
					<a href="recipe.php?fruitName=Kumquat" class="recipe-links" title="Kumquat Recipes">Kumquat Recipes</a><br />
					<a href="recipe.php?fruitName=Lemon" class="recipe-links" title="Lemon Recipes">Lemon Recipes</a><br />
					<a href="recipe.php?fruitName=Lime" class="recipe-links" title="Lime Recipes">Lime Recipes</a><br />
					<a href="recipe.php?fruitName=Loquat" class="recipe-links" title="Loquat Recipes">Loquat Recipes</a><br />
					<a href="recipe.php?fruitName=Mango" class="recipe-links" title="Mango Recipes">Mango Recipes</a><br />
					<a href="recipe.php?fruitName=Mulberry" class="recipe-links" title="Mulberry Recipes">Mulberry Recipes</a><br />
					<a href="recipe.php?fruitName=Orange" class="recipe-links" title="Orange Recipes">Orange Recipes</a><br />
					<a href="recipe.php?fruitName=Pawpaw" class="recipe-links" title="Pawpaw Recipes">Pawpaw Recipes</a><br />
					<a href="recipe.php?fruitName=Peach" class="recipe-links" title="Peach Recipes">Peach Recipes</a><br />
					<a href="recipe.php?fruitName=Pear" class="recipe-links" title="Pear Recipes">Pear Recipes</a><br />
					<a href="recipe.php?fruitName=Persimmon" class="recipe-links" title="Persimmon Recipes">Persimmon Recipes</a><br />
					<a href="recipe.php?fruitName=Plum" class="recipe-links" title="Plum Recipes">Plum Recipes</a><br />
					<a href="recipe.php?fruitName=Quince" class="recipe-links" title="Quince Recipes">Quince Recipes</a><br />
					<a href="recipe.php?fruitName=Tangerine" class="recipe-links" title="Tangerine Recipes">Tangerine Recipes</a><br />
					</nav>
				</td>
				<td class="bodyText" id="fruitTableStart">
					<a href="subindex.php?fruitName=Apple" title="Apple"><img src="images/Apple-CarolinaBeauty-thumb.png" id="Apple-CarolinaBeauty-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Apricot" title="Apricot"><img src="images/Apricot-Stanford-thumb.png" id="Apricot-Stanford-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Cherry" title="Cherry"><img src="images/Cherry-Bigarreau-thumb.png" id="Cherry-Bigarreau-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Crab Apple" title="Crab Apple"><img src="images/CrabApple-Hewes-thumb.png" id="CrabApple-Hewes-Image" /></a>
				</td> 
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Grape" title="Grape"><img src="images/Grape-Muscadine-thumb.png" id="Grape-Muscadine-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Grapefruit" title="Grapefruit"><img src="images/Grapefruit-Royal-thumb.png" id="Grapefruit-Royal-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Kumquat" title="Kumquat"><img src="images/Kumquat-Passmore-thumb.png" id="Kumquat-Passmore-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Lemon" title="Lemon"><img src="images/Lemon-Sport-thumb.png" id="Lemon-Sport-Image" /></a>
				</td>			
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Lime" title="Lime"><img src="images/Lime-Lisbon-thumb.png" id="Lime-Lisbon-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Loquat" title="Loquat"><img src="images/Loquat-Oliver-thumb.png" id="Loquat-Oliver-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Mango" title="Mango"><img src="images/Mango-Johnson-thumb.png" id="Mango-Johnson-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="subindex.php?fruitName=Mulberry" title="Mulberry"><img src="images/Mulberry-Travis-thumb.png" id="Mulberry-Travis-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Orange" title="Orange"><img src="images/Orange-Fausta-thumb.png" id="Orange-Fausta-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Pawpaw" title="Pawpaw"><img src="images/Pawpaw-1924-thumb.png" id="Pawpaw-1924-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Peach" title="Peach"><img src="images/Peach-RedCheek-thumb.png" id="Peach-RedCheek-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Pear" title="Pear"><img src="images/Pear-Read-thumb.png" id="Pear-Read-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Persimmon" title="Persimmon"><img src="images/Persimmon-Fuyu-thumb.png" id="Persimmon-Fuyu-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Plum" title="Plum"><img src="images/Plum-Lafayette-thumb.png" id="Plum-Lafayette-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Quince" title="Quince"><img src="images/Quince-Champion-thumb.png" id="Quince-Champion-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="subindex.php?fruitName=Tangerine" title="Tangerine"><img src="images/Tangerine-Dancy-thumb.png" id="Tangerine-Dancy-Image" /></a>
				</td>
		</tr>';
echo '<tr>
			<th colspan="2" style="width:1px; height:10px; border:0px; padding:10px;">
				<img src="images/CDH_Logo_spot_outlines.png" id="cdhLogo" style="width: auto; height: auto; max-width: 300px; max-height: 150px;" />
			</th>
			<th colspan="2" style="width:1px; height:10px; border:0px; padding:35px;">
				<img src="images/ISS_logo_cmyk.png" id="issLogo" style="width: auto; height: auto; max-width: 266px; max-height: 133px;"/>
			</th>
		</tr>';
?>
</body>