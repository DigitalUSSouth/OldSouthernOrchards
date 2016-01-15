<!--This file is the equivalent of scratch paper-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	foreach($_POST as $x)
	{
		echo htmlspecialchars(stripslashes($x));
	}
}
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
<title>Old Southern Orchards</title>
<style>
#TOOLTIP
{
    text-align: center;
    color: #fff;
    background: #f00;
    position: absolute;
    z-index: 100;
    padding: 15px;
	font-size: 50px;
}
 
#TOOLTIP:after /* triangle decoration */
{
	width: 0;
	height: 0;
	border-left: 10px solid transparent;
	border-right: 10px solid transparent;
	border-top: 10px solid #111;
	content: '';
	position: absolute;
	left: 50%;
	bottom: -10px;
	margin-left: -10px;
}

#TOOLTIP.top:after
{
	border-top-color: transparent;
	border-bottom: 10px solid #111;
	top: -20px;
	bottom: auto;
}

#TOOLTIP.left:after
{
	left: 10px;
	margin: 0;
}

#TOOLTIP.right:after
{
	right: 10px;
	left: auto;
	margin: 0;
}
</style>
<script type="text/javascript" src="scripts/OSO.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$( function()
{
    var targets = $( '[rel~=TOOLTIP]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function()
    {
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="TOOLTIP"></div>' );
 
        if( !tip || tip == '' )
            return false;
 
        target.removeAttr( 'title' );
        tooltip.css( 'opacity', 0 )
               .html( tip )
               .appendTo( 'body' );
 
        var init_tooltip = function()
        {
            if( $( window ).width() < tooltip.outerWidth() * 1.5 )
                tooltip.css( 'max-width', $( window ).width() / 2 );
            else
                tooltip.css( 'max-width', 340 );
 
            var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
                pos_top  = target.offset().top - tooltip.outerHeight() - 20;
 
            if( pos_left < 0 )
            {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass( 'left' );
            }
            else
                tooltip.removeClass( 'left' );
 
            if( pos_left + tooltip.outerWidth() > $( window ).width() )
            {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass( 'right' );
            }
            else
                tooltip.removeClass( 'right' );
 
            if( pos_top < 0 )
            {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass( 'top' );
            }
            else
                tooltip.removeClass( 'top' );
 
            tooltip.css( { left: pos_left, top: pos_top } )
                   .animate( { top: '+=10', opacity: 1 }, 50 );
        };
 
        init_tooltip();
        $( window ).resize( init_tooltip );
 
        var remove_tooltip = function()
        {
            tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
            {
                $( this ).remove();
            });
 
            target.attr( 'title', tip );
        };
 
        target.bind( 'mouseleave', remove_tooltip );
        tooltip.bind( 'click', remove_tooltip );
    });
});
</script>
</head>
<body>
<table>
	<tr>
		<td><a href="http://www.google.com" title="User Experience" rel="TOOLTIP">Click Me</a></td>
		<td><p title="Here is some text" rel="TOOLTIP">Here is some text</p></td>
	</tr>
</table>
</body>
</html>-->