<!--This file is the equivalent of scratch paper-->
<?php
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	foreach($_POST as $x)
	{
		echo htmlspecialchars(stripslashes($x), ENT_QUOTES | ENT_HTML5);
	}
}
*/?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/bootstrap.js"></script>
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css">
<link rel="stylesheet" href="styles/style.css" type="text/css">

<script type="text/javascript">
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
</script>
</head>
<body>
<div class="container-fluid" id="content">
	<div class="row">
		<div class="col-xs-3">
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Apple" rel="tooltip" title="Apple">
				<img src="images/Apple-CarolinaBeauty-thumb.png" class="img-thumbnail" id="Apple-CarolinaBeauty-Image" />
			</div>
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Apricot" rel="tooltip" title="Apricot">
				<img src="images/Apricot-Stanford-thumb.png" class="img-thumbnail" id="Apricot-Stanford-Image" />
			</div>
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Cherry" rel="tooltip" title="Cherry">
				<img src="images/Cherry-Bigarreau-thumb.png" class="img-thumbnail" id="Cherry-Bigarreau-Image" />
			</div>
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Crab Apple" rel="tooltip" title="Crab Apple">
				<img src="images/CrabApple-Hewes-thumb.png" class="img-thumbnail" id="CrabApple-Hewes-Image" />
			</div>
		</div>
		<div class="col-xs-3">
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Grape" rel="tooltip" title="Grape">
				<img src="images/Grape-Muscadine-thumb.png" class="img-thumbnail" id="Grape-Muscadine-Image" />
			</div>
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Grapefruit" rel="tooltip" title="Grapefruit">
				<img src="images/Grapefruit-Royal-thumb.png" class="img-thumbnail" id="Grapefruit-Royal-Image" />
			</div>
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Kumquat" rel="tooltip" title="Kumquat">
				<img src="images/Kumquat-Passmore-thumb.png" class="img-thumbnail" id="Kumquat-Passmore-Image" />
			</div>
			<div class="hasRollover">
			<a href="subindex.php?fruitName=Lemon" rel="tooltip" title="Lemon">
				<img src="images/Lemon-Sport-thumb.png" class="img-thumbnail" id="Lemon-Sport-Image" />
			</div>
		</div>
		<div class="col-xs-3">
		</div>
		<div class="col-xs-3">
		</div>
	</div>
</div>
</body>
</html>