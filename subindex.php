<?php
define('EMBEDDED',true);
define('OSO_DB', true);
function extractFruitName($name, $fruitName)
{
	$pieces = explode(' ',$name);
	foreach($pieces as $word)
	{
		if($word == $fruitName || $word == 'Crab')
			break;
		$result = $result . $word . ' ' ;
	}
	return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/OSO.js"></script>
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad'))
{
	echo '<link rel="stylesheet" href="styles/style_mobile.css" type="text/css">';
	echo '<link rel="stylesheet" href="styles/bootstrap.css" type="text/css">';
	echo '<script type="text/javascript" src="scripts/bootstrap.js"></script>';
	$isMobile = 1;
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
     echo '<link rel="stylesheet" href="styles/style_firefox.css" type="text/css">';
	 $isMobile = 0;
}
else
{
	echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
	$isMobile = 0;
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
				   //.animate( { top: "+=10", opacity: 1 }, 50 );
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
header("Content-type: text/html; charset=utf-8");
 echo '<div id="container">';
 require('navBar.php');
 require('db_info.php');
 echo '<div id="subcontent">'
?>
<?php
 $fruitName = $_GET['fruitName'];
 
//connect to the database
$host = "localhost";
$username = getUserName();
$password = getPassword();
$database = getDB();

$con2 = new mysqli($host, $username, $password, $database);

if (!$con2)
	die('Could not connect: ' . mysql_error());

$query = $con2->prepare("SET NAMES 'utf8'");
$query->execute();
$query->close();

$query = $con2->prepare("SET CHARACTER SET 'utf8'");
$query->execute();
$query->close();

$query = $con2->prepare("SET COLLATION_CONNECTION='utf8_general_ci'");
$query->execute();
$query->close();
//setup up our query
if (isset($_GET['fruitName']))
{
	if(!is_numeric($_GET['fruitName']))
	{
 		$fruitName = $_GET['fruitName'];
 	}
 	else
 	{
 		header('Location: http://lichen.csd.sc.edu/oldsouthernorchards/');
 	}

	$query = $con2->prepare("SELECT filename, name, thumbname, display, rollover FROM sub_orc_data WHERE fruitName = ? ORDER BY name");
	$query->bind_param('s', $fruitName);
}
$query->execute();
$query->store_result();
$query->bind_result($fileName, $name, $thumbName, $disp, $ro);
$rowcount = 0;
echo '<table style="padding-left:32px;">';
echo '<caption id="fruitHeader">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$fruitName.'</caption><tbody><tr>';
while ($query->fetch())
{
	if($disp==0)
		continue;
	if($rowcount % 5 == 0 && $rowcount != 0)
		echo '</td><tr>';
		echo '<td><div class="hasRollover">';
		#if(!$isMobile)	# if page is view on desktop, add hidden tooltip information
			#echo '<span class="tooltip">'.$ttip.'</span>';
		echo '<a href="subsubindex.php?name='.$name.'"';
		if($isMobile)	# if page is view in mobile phone, add title and rel attributes to link
			echo ' title="'.extractFruitName($name,$fruitName).'" rel="tooltip" >';
		else
			echo '>';
			echo '<img src="images/subimages/'.$fruitName.'/'.$thumbName.'" id="'.$name.'" alt="'.$name.'" style="margin-left:auto; margin-right:auto;" />';
			echo '<div class="text-content" style="padding-top:'.$ro.'px;';
			if($ro==63)
				echo ' height:117px;">';
			else
				echo '">';
			echo '<span>'.extractFruitName($name,$fruitName).'</span></div>';
		echo '</a></div></td>';
	$rowcount++;
}
echo '</tr></tbody></table></div></div>';
$query->close();
$con2->close();
?>
</body>
</html>
