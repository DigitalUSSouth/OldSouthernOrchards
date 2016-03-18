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
<div class="container-fluid">
<div class="row">
    <div class="col-xs-4">
		<a href="subindex.php?fruitName=Apple" rel="tooltip" title="Apple">
		<img src="images/Apple-CarolinaBeauty-thumb.png" id="Apple-CarolinaBeauty-Image" />

		<a href="subindex.php?fruitName=Apricot" rel="tooltip" title="Apricot">
					<img src="images/Apricot-Stanford-thumb.png" id="Apricot-Stanford-Image" />
	
	<a href="subindex.php?fruitName=Cherry" rel="tooltip" title="Cherry">
					<img src="images/Cherry-Bigarreau-thumb.png" id="Cherry-Bigarreau-Image" />

		<a href="subindex.php?fruitName=Crab Apple" rel="tooltip" title="Crab Apple">
					<img src="images/CrabApple-Hewes-thumb.png" id="CrabApple-Hewes-Image" />
</div>
</div>
</body>
</html>