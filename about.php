<?php
define('EMBEDDED',true);
?>
<!DOCTYPE html>
<head lang="en">
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
?>
<style>
a {
   color: #cc0000;
   text-decoration:none;
   }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $(".tabLink").each(function(){
      $(this).click(function(){
        tabeId = $(this).attr('id');
        $(".tabLink").removeClass("activeLink");
        $(this).addClass("activeLink");
        $(".tabcontent").addClass("hide");
        $("#"+tabeId+"-1").removeClass("hide")   
        return false;	  
      });
    });  
  });
</script>

<script type="text/javascript">
function MM_setTextOfLayer(objId,x,newText) { //v9.0
  with (document) if (getElementById && ((obj=getElementById(objId))!=null))
    with (obj) innerHTML = unescape(newText);
}
</script>
<script type="text/javascript">
x = 20;
y = 70;
function setVisible(obj)
{
	obj = document.getElementById(obj);
	obj.style.visibility = (obj.style.visibility == 'visible') ? 'hidden' : 'visible';
}
function placeIt(obj)
{
	obj = document.getElementById(obj);
	if (document.documentElement)
	{
		theLeft = document.documentElement.scrollLeft;
		theTop = document.documentElement.scrollTop;
	}
	else if (document.body)
	{
		theLeft = document.body.scrollLeft;
		theTop = document.body.scrollTop;
	}
	theLeft += x;
	theTop += y;
	obj.style.left = theLeft + 'px' ;
	obj.style.top = theTop + 'px' ;
}
</script>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '
 <div id="container">';
 require('navBar.php');
?>
<?php
echo '
		<div id="contentcontainer">
        	<div id="content"><br />
    			<table width="754">
    			<tr><td colspan="2"></td></tr>
    			<tr>
                	<td valign="top">
			      	<div id="rotate">';
                      echo '<div class="tab-box"> 
    							<a href="javascript:;" class="tabLink activeLink" id="cont-1">About</a> 
    							<a href="javascript:;" class="tabLink " id="cont-2">Contributors</a> 	
  							</div>
  							<div class="tabcontent" id="cont-1-1"> ';
  							echo 
  							'<p class=”description”> 
							Coming soon...
  							</div>
  							<div class="tabcontent hide" id="cont-2-1"> ';
  							echo 
  							'<p class=”description”> Old Southern Orchards was written and compiled by David S. Shields, McClintock Professor of Southern Letters, at the University of South Carolina.  It was constructed by Harry Ferguson of the Center for Digital Humanities of the University of South Carolina.
<p class=”description”> David S. Shields, is Chair of the Carolina Gold Rice Foundation, and publishes in the areas of early American culture, the history of performing arts photography, and pre-industrial food studies.  
<a href="http://www.cas.sc.edu/engl/people/pages/personal/davidsshields/">http://www.cas.sc.edu/engl/people/pages/personal/davidsshields/</a>';
  							echo '</div>';
					echo '
					</div>
                	</td>
                	<td valign="top">
                	 <table border="0" cellspacing="0" cellpadding="0" width="30" height="650">
                	<tr><td></td></tr>
                	</table>	
                	</td>
                </tr>
                </table>
			</div>
        </div>
</div>';				
?>
</body>
</html>
