// JavaScript functions to be used on OldSouthernOrchards web site
function calcHeight()
{
	var td = document.getElementById("spacer");	// get element to be displayed down to the bottom of the window
	if(td==null || td==undefined)
		return;
	var rect = td.getBoundingClientRect();	// to find the distance from the top of the element to the top of the window
	var offset = window.innerHeight - rect.top;	// the length that the space will be displayed down
	var h = offset + "px";	// to convert offset to pixels 
	td.style.height = h;	// assign the height
}
function test(name)
{
	alert(name);
}
function findTop(obj)	// finds an element's y position from top of visible screen
{
	var top = 0;
	if(obj.offsetParent)
	{
		do
		{
			top += obj.offsetTop;
		} while (obj = obj.offsetParent);
	}
	return top;
}
function findLeft(obj) // finds an element's x position from left of visible screen
{
	var left = obj.offsetLeft;
	if(obj.offsetParent)
	{
		do
		{
			left += obj.offsetLeft;
		} while (obj = obj.offsetParent);
	}
	return left;
}
// JQuery function used to create tooltips for mobile phones
/*
$( function()
{
    var targets = $( '[rel~=tooltip]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function()
    {
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="tooltip"></div>' );
 
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
});*/
