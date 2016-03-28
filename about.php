<?php
define('EMBEDDED',true);
define('OSO_DB', true);
?>
<!DOCTYPE html>
<head lang="en">
<title>Old Southern Orchards</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="scripts/OSO.js"></script>
<?php
if(stripos($_SERVER['HTTP_USER_AGENT'],'Android') || stripos($_SERVER['HTTP_USER_AGENT'],'iPhone') || stripos($_SERVER['HTTP_USER_AGENT'],'iPad') 
	|| stripos($_SERVER['HTTP_USER_AGENT'],'blackberry') || stripos($_SERVER['HTTP_USER_AGENT'],'Windows Phone') || stripos($_SERVER['HTTP_USER_AGENT'],'webOS')
	|| stripos($_SERVER['HTTP_USER_AGENT'],'Opera Mini') || (stripos($_SERVER['HTTP_USER_AGENT'],'Windows')&& stripos($_SERVER['HTTP_USER_AGENT'],'Touch')))
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
<script type="text/javascript">
$(document).ready(function() {
	$("p:empty").remove();
});
</script>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
 echo '<div id="container">';
 require('navBar.php');
 require('db_info.php');
 // tinymce editor
	if(isset($_SESSION['ISLOGGEDIN']) && $_SESSION['ISLOGGEDIN']=='1' && isset($_SESSION['ISADMIN']) && $_SESSION['ISADMIN']=='1')
	{
		echo '<script type="text/javascript">
		tinymce.init({
		forced_root_block : false,
		fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 36pt",
		font_formats: "Agency FB=agency fb,sans-serif;"+
					"Andale Mono=andale mono,times;"+
					"Arial=arial,helvetica,sans-serif;"+
					"Arial Black=arial black,avant garde;"+
					"Arial Narrow=arial narrow,sans-serif;"+
					"Bodoni MT=bodoni mt,times new roman,sans-serif;"+
					"Book Antiqua=book antiqua,palatino;"+
					"Calibri=calibri,sans-serif;"+
					"Cambria=cambria,serif;"+
					"Century Gothic=century gothic,sans-serif;"+
					"Comic Sans MS=comic sans ms,sans-serif;"+
					"Consolas=consolas,monaco,monospace;"+
					"Copperplate=copperplate gothic light,sans-serif;"+
					"Courier New=courier new,courier;"+
					"Garamond=garamond,serif;"+
					"Georgia=georgia,palatino;"+
					"Helvetica=helvetica;"+
					"Impact=impact,chicago;"+
					"Lucida Console=lucida console,monaco,monospace;"+
					"Lucida Sans Unicode=lucida sans unicode,lucida grande,sans-serif;"+
					"Palatino Linotype=palatino linotype,book antiqua,palatino,serif;"+
					"Rockwell=rockwell,times new roman,serif;"+
					"Symbol=symbol;"+
					"Tahoma=tahoma,arial,helvetica,sans-serif;"+
					"Terminal=terminal,monaco;"+
					"Times New Roman=times new roman,times;"+
					"Trebuchet MS=trebuchet ms,geneva;"+
					"Verdana=verdana,geneva;"+
					"Webdings=webdings;"+
					"Wingdings=wingdings,zapf dingbats",
		selector: ".tabcontent",
		plugins:  ["advlist autolink autoresize lists link image charmap print hr preview anchor pagebreak",
			"searchreplace wordcount visualchars visualblocks code fullscreen",
			"insertdatetime nonbreaking media table contextmenu paste textcolor colorpicker textpattern imagetools"
		],
		toolbar: "undo redo | styleselect | bold italic | fontsizeselect | fontselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});</script>';
	}
// end tinymce editor
echo '<div id="contentcontainer">';
// connect to the database
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

$query = $con2->prepare("SELECT content FROM about_site WHERE title = 'About'");
$query->execute();
$query->store_result();
$query->bind_result($content);
while($query->fetch())
	$about .= $content;
$query->close();

$query = $con2->prepare("SELECT content FROM about_site WHERE title = 'Contributors'");
$query->execute();
$query->store_result();
$query->bind_result($content);
while($query->fetch())
	$contrib .= $content;

echo '<form method="post" action="aboutHandler.php">
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
  							'<p class=”description”>'.htmlspecialchars_decode($about, ENT_QUOTES | ENT_HTML5).'</div>
  							<div class="tabcontent hide" id="cont-2-1"> ';
  							echo 
  							'<p class=”description”>'.htmlspecialchars_decode($contrib, ENT_QUOTES | ENT_HTML5);
  							echo '</div>';
					echo '</div>
                	</td>
                	<td valign="top">
                	 <table border="0" cellspacing="0" cellpadding="0" width="30" height="650">
                	<tr><td></td></tr>
                	</table>	
                	</td>
                </tr>
                </table>
			</div>
        </div>';
		if(isset($_SESSION['ISLOGGEDIN']) && $_SESSION['ISLOGGEDIN']=='1' && isset($_SESSION['ISADMIN']) && $_SESSION['ISADMIN']=='1')
		{
			echo '<input type="submit">';
			echo '<input type="reset">';
			echo '<input type="button" value="Return to index page" onClick="window.location.href=\'index.php\';">';
		}
	echo '</form>
</div>';
$query->close();
$con2->close();				
?>
</body>
</html>
