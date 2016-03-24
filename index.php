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
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<?php
$isMobile=0;
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
      echo '<link rel="stylesheet" href="styles/style_firefox.css" type="text/css">';
	  $isFirefox=1;
	  $isMobile=0;
}
else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
	echo '<link rel="stylesheet" href="styles/bootstrap.css" type="text/css">';
	echo '<script type="text/javascript" src="scripts/bootstrap.js"></script>';
	$isMobile=1;
	$isFirefox=0;
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
	$isMobile=0;
	$isFirefox=0;
}
if($isMobile===1)
	echo '<script type="text/javascript"> //for mobile tooltops
	$( function()
	{
	var targets = $( "[rel~=tooltip]" ),
		target  = false,
		tooltip = false,
		title   = false;

	targets.bind( "mouseenter", function()
	{
		target  = $( this );
		tip     = target.attr( "title" );
		tooltip = $( "<div id=\"tooltip\"></div>" );

		if( !tip || tip == "" )
			return false;

		target.removeAttr( "title" );
		tooltip.css( "opacity", 0.5 )
			   .html( tip )
			   .appendTo( "body" );

		var init_tooltip = function()
		{
			if( $( window ).width() < tooltip.outerWidth() * 1.5 )
				tooltip.css( "max-width", $( window ).width() / 2 );
			else
				tooltip.css( "max-width", 340 );

			var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
				pos_top  = target.offset().top - tooltip.outerHeight() - 20;

			if( pos_left < 0 )
			{
				pos_left = target.offset().left + target.outerWidth() / 2 - 20;
				tooltip.addClass( "left" );
			}
			else
				tooltip.removeClass( "left" );

			if( pos_left + tooltip.outerWidth() > $( window ).width() )
			{
				pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
				tooltip.addClass( "right" );
			}
			else
				tooltip.removeClass( "right" );

			if( pos_top < 0 )
			{
				var pos_top  = target.offset().top + target.outerHeight();
				tooltip.addClass( "top" );
			}
			else
				tooltip.removeClass( "top" );

			tooltip.css( { left: pos_left, top: pos_top } )
				   //.animate( { top: "-=10", opacity: 1 }, 50 );
			tooltip.css( "opacity", 0.8 )
			   .html( tip )
			   .appendTo( "body" );
		};

		init_tooltip();
		$( window ).resize( init_tooltip );

		var remove_tooltip = function()
		{
			tooltip.animate( { top: "-=10", opacity: 0 }, 50, function()
			{
				$( this ).remove();
			});

			target.attr( "title", tip );
		};

		target.bind( "mouseleave", remove_tooltip );
		tooltip.bind( "click", remove_tooltip );
	});
	});
	</script>';
?>
</head>
<body>
<?php
 echo '<div id="container">';
 require('navBar.php');
 echo '<div id="content">
		<table id="orchardTable" style="padding-left:10px;">
			<caption style="text-align:left;padding-top:15px;padding-bottom:10px;">
			<span style="color:#dd2e03;font-size:16pt;">&nbsp;&nbsp;Orchard </span>
					<span class="subtitle" style="font-size:12pt;color:#646b47;font-family;font-family:Times New Roman,serif;">
						A guide to the most important fruit grown in southern orchards prior to 1920.
					</span>
			</caption>';
 echo    '<tr>
				<td class="bodyText" id="fruitTableStart">
					<div class="hasRollover">
					<a href="subindex.php?fruitName=Apple" rel="tooltip" title="Apple">
					<img src="images/Apple-CarolinaBeauty-thumb.png" id="Apple-CarolinaBeauty-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Apple</span></div></a>
				</div>
				</td>
				<td class="bodyText">
					<div class="hasRollover">
					<a href="subindex.php?fruitName=Apricot" rel="tooltip" title="Apricot">
					<img src="images/Apricot-Stanford-thumb.png" id="Apricot-Stanford-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Apricot</span></div></a>
				</div>
				</td>
				<td class="bodyText">
					<div class="hasRollover">
					<a href="subindex.php?fruitName=Cherry" rel="tooltip" title="Cherry">
					<img src="images/Cherry-Bigarreau-thumb.png" id="Cherry-Bigarreau-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Cherry</span></div></a>
				</div>
				</td>
				<td class="bodyText">
					<div class="hasRollover">
					<a href="subindex.php?fruitName=Crab Apple" rel="tooltip" title="Crab Apple">
					<img src="images/CrabApple-Hewes-thumb.png" id="CrabApple-Hewes-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Crab Apple</span></div></a>
				</div>
				</td> 
				<!--<td rowspan="6" style="vertical-align: top;">
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
				</td>-->
		</tr>';
echo '<tr>
				<td class="bodyText">
					<div class="hasRollover">
					<a href="subindex.php?fruitName=Grape" rel="tooltip" title="Grape">
					<img src="images/Grape-Muscadine-thumb.png" id="Grape-Muscadine-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Grape</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Grapefruit" rel="tooltip" title="Grapefruit">
					<img src="images/Grapefruit-Royal-thumb.png" id="Grapefruit-Royal-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Grapefruit</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Kumquat" rel="tooltip" title="Kumquat">
					<img src="images/Kumquat-Passmore-thumb.png" id="Kumquat-Passmore-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Kumquat</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Lemon" rel="tooltip" title="Lemon">
					<img src="images/Lemon-Sport-thumb.png" id="Lemon-Sport-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Lemon</span></div></a>
				</div>
				</td>			
		</tr>';
echo '<tr>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Lime" rel="tooltip" title="Lime">
					<img src="images/Lime-Lisbon-thumb.png" id="Lime-Lisbon-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Lime</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Loquat" rel="tooltip" title="Loquat">
					<img src="images/Loquat-Oliver-thumb.png" id="Loquat-Oliver-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Loquat</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Mango" rel="tooltip" title="Mango">
					<img src="images/Mango-Johnson-thumb.png" id="Mango-Johnson-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Mango</span></div></a>
				</div>
				</td>
   				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Mulberry" rel="tooltip" title="Mulberry">
					<img src="images/Mulberry-Travis-thumb.png" id="Mulberry-Travis-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Mulberry</span></div></a>
				</div>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Orange" rel="tooltip" title="Orange">
					<img src="images/Orange-Fausta-thumb.png" id="Orange-Fausta-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Orange</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Pawpaw" rel="tooltip" title="Pawpaw">
					<img src="images/Pawpaw-1924-thumb.png" id="Pawpaw-1924-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Pawpaw</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Peach" rel="tooltip" title="Peach">
					<img src="images/Peach-RedCheek-thumb.png" id="Peach-RedCheek-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Peach</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Pear" rel="tooltip" title="Pear">
					<img src="images/Pear-Read-thumb.png" id="Pear-Read-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Pear</span></div></a>
				</div>
				</td>
		</tr>';
echo '<tr>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Persimmon" rel="tooltip" title="Persimmon">
					<img src="images/Persimmon-Fuyu-thumb.png" id="Persimmon-Fuyu-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Persimmon</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Plum" rel="tooltip" title="Plum">
					<img src="images/Plum-Lafayette-thumb.png" id="Plum-Lafayette-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Plum</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Quince" rel="tooltip" title="Quince">
					<img src="images/Quince-Champion-thumb.png" id="Quince-Champion-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Quince</span></div></a>
				</div>
				</td>
				<td class="bodyText">
				<div class="hasRollover">
					<a href="subindex.php?fruitName=Tangerine" rel="tooltip" title="Tangerine">
					<img src="images/Tangerine-Dancy-thumb.png" id="Tangerine-Dancy-Image" />
					<div class="text-content" style="padding-top:76px;"><span>Tangerine</span></div></a>
				</div>
				</td>
		</tr>';
echo '<tr>
			<th colspan="2" style="width:1px; height:10px; border:0px; padding:10px;">
				<img src="images/CDH_Logo_spot_outlines.png" id="cdhLogo" style="width: auto; height: auto; max-width: 300px; max-height: 150px;" />
			</th>
			<th colspan="2" style="width:1px; height:10px; border:0px; padding:35px;">
				<img src="images/ISS_logo_cmyk.png" id="issLogo" style="width: auto; height: auto; max-width: 266px; max-height: 133px;"/>
			</th>
		</tr>
		</table>
	</div>
</div>';
?>
</body>
</html>