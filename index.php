<?php
#define('EMBEDDED',true);
#require('validateUser.php');
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
</head>
<body>
<?php
 echo '<div id="container">';
 echo '<div id="content"><br /><h2 style="text-align: center">Old Southern Orchard <span class="subtitle"></span></h2>';
 echo '<table width="440" id="orchardTable">';
 echo    '<tr>
				<td class="bodyText">
					<a href="images/CrabApple-Hewes.jpg" alt="Crab Apple"><img src="images/CrabApple-Hewes-thumb.png" id="CrabApple-Hewes-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="images/Plum-Lafayette.jpg" alt="Plum"><img src="images/Plum-Lafayette-thumb.png" id="Plum-Lafayette-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Lime-Lisbon.jpg" alt="Lime"><img src="images/Lime-Lisbon-thumb.png" id="Lime-Lisbon-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Grapefruit-Royal.jpg" alt="Grapefruit"><img src="images/Grapefruit-Royal-thumb.png" id="Grapefruit-Royal-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="images/Orange-Fausta.jpg" alt="Orange"><img src="images/Orange-Fausta-thumb.png" id="Orange-Fausta-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="images/Apricot-Stanford.jpg" alt="Apricot"><img src="images/Apricot-Stanford-thumb.png" id="Apricot-Stanford-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Quince-Champion.jpg" alt="Quince"><img src="images/Quince-Champion-thumb.png" id="Quince-Champion-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Cherry-Bigarreau.jpg" alt="Cherry"><img src="images/Cherry-Bigarreau-thumb.png" id="Cherry-Bigarreau-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="images/Lemon-Sport.jpg" alt="Lemon"><img src="images/Lemon-Sport-thumb.png" id="Lemon-Sport-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="images/Mulberry-Travis.jpg" alt="Mulberry"><img src="images/Mulberry-Travis-thumb.png" id="Mulberry-Travis-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Peach-RedCheek.jpg" alt="Peach"><img src="images/Peach-RedCheek-thumb.png" id="Peach-RedCheek-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Pear-Read.jpg" alt="Pear"><img src="images/Pear-Read-thumb.png" id="Pear-Read-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="images/Grape-Muscadine.jpg" alt="Grape"><img src="images/Grape-Muscadine-thumb.png" id="Grape-Muscadine-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="images/Apple-CarolinaBeauty.jpg" alt="Apple"><img src="images/Apple-CarolinaBeauty-thumb.png" id="Apple-CarolinaBeauty-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Persimmon-Fuyu.jpg" alt="Persimmon"><img src="images/Persimmon-Fuyu-thumb.png" id="Persimmon-Fuyu-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Kumquat-Passmore.jpg" alt="Kumquat"><img src="images/Kumquat-Passmore-thumb.png" id="Kumquat-Passmore-Image" /></a>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
					<a href="images/Pawpaw-1924.jpg" alt="Pawpaw"><img src="images/Pawpaw-1924-thumb.png" id="Pawpaw-1924-Image" /></a>
				</td>
   				<td class="bodyText">
					<a href="images/Mango-Johnson.jpg" alt="Mango"><img src="images/Mango-Johnson-thumb.png" id="Mango-Johnson-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Tangerine-Dancy.jpg" alt="Tangerine"><img src="images/Tangerine-Dancy-thumb.png" id="Tangerine-Dancy-Image" /></a>
				</td>
				<td class="bodyText">
					<a href="images/Loquat-Oliver.jpg" alt="Loquat"><img src="images/Loquat-Oliver-thumb.png" id="Loquat-Oliver-Image" /></a>
				</td>
		</tr>';
?>
</body>