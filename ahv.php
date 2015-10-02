<?php
define('EMBEDDED',true);
require('validateUser.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>American Cookery & A History of Its Ingredients</title>
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

<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body onload="MM_preloadImages('images/artichoke_over.jpg','images/asparagus_over.jpg','images/beets_over.jpg','images/broadbean_over.jpg','images/brusselsprouts_over.jpg','images/bushbeans_over.jpg','images/cabbage_over.jpg','images/carrot_over.jpg','images/cauliflower_over.jpg','images/celery_over.jpg','images/corn_over.jpg','images/cucumber_over.jpg')">
<?php


 echo '<div id="container">';


 require('navBar.php');
 echo '<div id="content"><br />

			<h2>Vegetables <span class="subtitle">Growing and Cooking pre-1900 American Garden Vegetables</span></h2>';
            
echo '<table border="0" cellspacing="0" cellpadding="0" width="440">';

echo    '<tr>
   <td class="bodyText">
            <table> 
            	<tr>
					<td><a href="vegetable.php?vegName=Arrow Root" alt="Arrow Root"><img src="images/veggies/arrowroot.jpg"  id="Image1" onmouseover="MM_swapImage(\'Image1\',\'\',\'images/veggies/arrowroot_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Artichoke" alt="Artichoke"><img src="images/veggies/artichoke.jpg"  id="Image2" onmouseover="MM_swapImage(\'Image2\',\'\',\'images/veggies/artichoke_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Asparagus" alt="Asparagus"><img src="images/veggies/asparagus.jpg"  id="Image3" onmouseover="MM_swapImage(\'Image3\',\'\',\'images/veggies/asparagus_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Beans" alt="Beans"><img src="images/veggies/broadbean.jpg" id="Image4" onmouseover="MM_swapImage(\'Image4\',\'\',\'images/veggies/broadbean_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
              </tr>                                        
                <tr>
   					<td><a href="vegetable.php?vegName=Beets" alt="Beets"><img src="images/veggies/beets.jpg" id="Image5" onmouseover="MM_swapImage(\'Image5\',\'\',\'images/veggies/beets_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Broccoli" alt="Broccoli"><img src="images/veggies/broccoli.jpg" id="Image6" onmouseover="MM_swapImage(\'Image6\',\'\',\'images/veggies/broccoli_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Brussel Sprouts" alt="Brussel Sprouts"><img src="images/veggies/brusselsprouts.jpg" id="Image7" onmouseover="MM_swapImage(\'Image7\',\'\',\'images/veggies/brusselsprouts_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Cabbage" alt="Cabbage"><img src="images/veggies/cabbage.jpg" id="Image8" onmouseover="MM_swapImage(\'Image8\',\'\',\'images/veggies/cabbage_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  </tr>                                                             
                <tr>
   					<td><a href="vegetable.php?vegName=Cardoon" alt="Cardoon"><img src="images/veggies/cardoon.jpg" id="Image9" onmouseover="MM_swapImage(\'Image9\',\'\',\'images/veggies/cardoon_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   			 		<td><a href="vegetable.php?vegName=Carrot" alt="Carrot"><img src="images/veggies/carrot.jpg" id="Image10" onmouseover="MM_swapImage(\'Image10\',\'\',\'images/veggies/carrot_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Cauliflower" alt="Cauliflower"><img src="images/veggies/cauliflower.jpg" id="Image11" onmouseover="MM_swapImage(\'Image11\',\'\',\'images/veggies/cauliflower_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Celeriac" alt="Celeriac"><img src="images/veggies/celeriac.jpg" id="Image12" onmouseover="MM_swapImage(\'Image12\',\'\',\'images/veggies/celeriac_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   										              
   				</tr>
                <tr>
   					<td><a href="vegetable.php?vegName=Celery" alt="Celery"><img src="images/veggies/celery.jpg" id="Image13" onmouseover="MM_swapImage(\'Image13\',\'\',\'images/veggies/celery_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Collards" alt="Collards"><img src="images/veggies/collards.jpg" id="Image14" onmouseover="MM_swapImage(\'Image14\',\'\',\'images/veggies/collards_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   				
   					<td><a href="vegetable.php?vegName=Cress" alt="Cress"><img src="images/veggies/cress.jpg" id="Image15" onmouseover="MM_swapImage(\'Image15\',\'\',\'images/veggies/cress_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Cucumber" alt="Cucumber"><img src="images/veggies/cucumber.jpg" id="Image16" onmouseover="MM_swapImage(\'Image16\',\'\',\'images/veggies/cucumber_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  </tr>
                <tr>
   					<td><a href="vegetable.php?vegName=Dandelion" alt="Dandelion"><img src="images/veggies/dandelion.jpg" id="Image17" onmouseover="MM_swapImage(\'Image17\',\'\',\'images/veggies/dandelion_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Eggplant" alt="Egg Plant"><img src="images/veggies/eggplant.jpg" id="Image18" onmouseover="MM_swapImage(\'Image18\',\'\',\'images/veggies/eggplant_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Endive" alt="Endive"><img src="images/veggies/endive.jpg" id="Image19" onmouseover="MM_swapImage(\'Image19\',\'\',\'images/veggies/endive_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Fennel" alt="Fennel"><img src="images/veggies/fennel.jpg" id="Image20" onmouseover="MM_swapImage(\'Image20\',\'\',\'images/veggies/fennel_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   								                </tr>                  
                <tr>
   					<td><a href="vegetable.php?vegName=Garlic" alt="Garlic"><img src="images/veggies/garlic.jpg" id="Image21" onmouseover="MM_swapImage(\'Image21\',\'\',\'images/veggies/garlic_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Jerusalem Artichoke" alt="Jerusalem Artichoke"><img src="images/veggies/jerart.jpg" id="Image22" onmouseover="MM_swapImage(\'Image22\',\'\',\'images/veggies/jerart_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Kale" alt="Kale"><img src="images/veggies/kale.jpg" id="Image23" onmouseover="MM_swapImage(\'Image23\',\'\',\'images/veggies/kale_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Kohl Rabi" alt="Kohl Rabi"><img src="images/veggies/kohlrabi.jpg" id="Image24" onmouseover="MM_swapImage(\'Image24\',\'\',\'images/veggies/kohlrabi_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                </tr>                                                                  
                <tr>
   					<td><a href="vegetable.php?vegName=Leeks" alt="Leeks"><img src="images/veggies/leeks.jpg" id="Image25" onmouseover="MM_swapImage(\'Image25\',\'\',\'images/veggies/leeks_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Lettuce" alt="Lettuce"><img src="images/veggies/lettuce.jpg" id="Image26" onmouseover="MM_swapImage(\'Image26\',\'\',\'images/veggies/lettuce_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Muskmelon" alt="Muskmelon"><img src="images/veggies/muskmellon.jpg" id="Image27" onmouseover="MM_swapImage(\'Image27\',\'\',\'images/veggies/muskmellon_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Mustard" alt="Mustard"><img src="images/veggies/mustard.jpg" id="Image28" onmouseover="MM_swapImage(\'Image28\',\'\',\'images/veggies/mustard_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   									                </tr>               
                <tr>
   					<td><a href="vegetable.php?vegName=Okra" alt="Okra"><img src="images/veggies/okra.jpg" id="Image29" onmouseover="MM_swapImage(\'Image29\',\'\',\'images/veggies/okra_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Onion" alt="Onion"><img src="images/veggies/onion.jpg" id="Image30" onmouseover="MM_swapImage(\'Image30\',\'\',\'images/veggies/onion_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Parsnip" alt="Parsnip"><img src="images/veggies/parsnip.jpg" id="Image31" onmouseover="MM_swapImage(\'Image31\',\'\',\'images/veggies/parsnip_over.png\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Peanuts" alt="Peanuts"><img src="images/veggies/peanut.jpg" id="Image32" onmouseover="MM_swapImage(\'Image32\',\'\',\'images/veggies/peanut_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  </tr>                             
                <tr>
                	<td><a href="vegetable.php?vegName=Peas and Lentils" alt="Peas"><img src="images/veggies/peas.jpg" id="Image33" onmouseover="MM_swapImage(\'Image33\',\'\',\'images/veggies/peas_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Peppers" alt="Peppers"><img src="images/veggies/pepper.jpg" id="Image34" onmouseover="MM_swapImage(\'Image34\',\'\',\'images/veggies/pepper_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Potatoes" alt="Potatoes"><img src="images/veggies/potato.jpg" id="Image35" onmouseover="MM_swapImage(\'Image35\',\'\',\'images/veggies/potato_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Pumpkin" alt="Pumpkin"><img src="images/veggies/pumpkin.jpg" id="Image36" onmouseover="MM_swapImage(\'Image36\',\'\',\'images/veggies/pumpkin_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   				</tr>                      
                <tr>	
                	<td><a href="vegetable.php?vegName=Radish" alt="Radish"><img src="images/veggies/radish.jpg" id="Image37" onmouseover="MM_swapImage(\'Image37\',\'\',\'images/veggies/radish_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  
   					<td><a href="vegetable.php?vegName=Rhubarb" alt="Rhubarb"><img src="images/veggies/rhubarb.jpg" id="Image38" onmouseover="MM_swapImage(\'Image38\',\'\',\'images/veggies/rhubarb_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Rutabaga" alt="Rutabaga"><img src="images/veggies/rutabaga.jpg" id="Image39" onmouseover="MM_swapImage(\'Image39\',\'\',\'images/veggies/rutabaga_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Salsify" alt="Salsify"><img src="images/veggies/salsify.jpg" id="Image40" onmouseover="MM_swapImage(\'Image40\',\'\',\'images/veggies/salsify_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					
   					</tr> 
                <tr>
                	<td><a href="vegetable.php?vegName=Shallot" alt="Shallot"><img src="images/veggies/shallot.jpg" id="Image41" onmouseover="MM_swapImage(\'Image41\',\'\',\'images/veggies/shallot_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  
   					<td><a href="vegetable.php?vegName=Skirrit" alt="Skirrit"><img src="images/veggies/skirret.jpg"  id="Image42" onmouseover="MM_swapImage(\'Image42\',\'\',\'images/veggies/skirret_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  
   					<td><a href="vegetable.php?vegName=Sorrel" alt="Sorrel"><img src="images/veggies/sorrel.jpg" id="Image43" onmouseover="MM_swapImage(\'Image43\',\'\',\'images/veggies/sorrel_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  
   					<td><a href="vegetable.php?vegName=Spinach" alt="Spinach"><img src="images/veggies/spinach.jpg" id="Image44" onmouseover="MM_swapImage(\'Image44\',\'\',\'images/veggies/spinach_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					</tr>                                           
                <tr>
                
                	<td><a href="vegetable.php?vegName=Squash" alt="Squash"><img src="images/veggies/squash.jpg" id="Image45" onmouseover="MM_swapImage(\'Image45\',\'\',\'images/veggies/squash_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  
   					<td><a href="vegetable.php?vegName=Sweet Potatoes" alt="Sweet Potatoes"><img src="images/veggies/sweetpotato.jpg" id="Image46" onmouseover="MM_swapImage(\'Image46\',\'\',\'images/veggies/sweetpotato_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Swiss Chard" alt="Swiss Chard"><img src="images/veggies/swisschard.jpg" id="Image47" onmouseover="MM_swapImage(\'Image47\',\'\',\'images/veggies/swisschard_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Tanya" alt="Tanya"><img src="images/veggies/tanya.jpg" id="Image48" onmouseover="MM_swapImage(\'Image48\',\'\',\'images/veggies/tanya_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					
   					</tr>                      
                <tr>
                	<td><a href="vegetable.php?vegName=Tomatoes" alt="Tomatoes"><img src="images/veggies/tomato.jpg" id="Image49" onmouseover="MM_swapImage(\'Image49\',\'\',\'images/veggies/tomato_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>					                
			  
   					<td><a href="vegetable.php?vegName=Turnips" alt="Turnips"><img src="images/veggies/turnip.jpg" id="Image50" onmouseover="MM_swapImage(\'Image50\',\'\',\'images/veggies/turnip_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
   					<td><a href="vegetable.php?vegName=Watermelon" alt="Watermelon"><img src="images/veggies/watermelon.jpg" id="Image51" onmouseover="MM_swapImage(\'Image51\',\'\',\'images/veggies/watermelon_over.jpg\',1)" onmouseout="MM_swapImgRestore()" /></a></td>
              </tr>                      
</table> </td>
<td width="12">&nbsp;</td>
<td width="138">&nbsp;</td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="6"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
</tr>
<tr>
<td width="23">&nbsp;</td>
<td width="207">&nbsp;</td>
<td width="50">&nbsp;</td>
<td width="1230">&nbsp;</td>
<td width="12">&nbsp;</td>
<td width="138">&nbsp;</td>
</tr>
</table>';
?>
</body>
</html>
