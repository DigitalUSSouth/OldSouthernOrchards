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
