<?php
define('EMBEDDED',true);
define('OSO_DB',true);
require('validateUser.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Old Southern Orchard</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<link rel="stylesheet" href="mm_lodging1.css" type="text/css" />-->
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
</script>

<script type="text/javascript">
function confirmAction()
{
   var go = confirm("Are you sure? This action is permanent.");
   return go;
}
</script>
</head>
<body>
<?php
//print the header
//require('header.php');
header("Content-type: text/html; charset=utf-8");
//print this page's content

//if no vegetable id is set, we let the user know we need one to view its information
 echo '<div id="container">';


 require('navBar.php');
 echo '<div id="content"><br />

			<h2>Orchards</h2>';
            


if ((!isset($_GET['orcName']))&&(!isset($_GET['Id'])))
{
   die('Please enter a vegetable name or a vegetable ID.');
}

//connect to the database
$con = mysql_connect("localhost",$dbUser,$dbPass);
if (!$con)
{
   die('Could not connect: ' . mysql_error());
}
mysql_select_db("FoodStudies",$con);

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");

//setup up our query

if (isset($_GET['orcName']))
{
	//$query = "SELECT * FROM `Vegetables` WHERE Name LIKE '%".$_GET[vegName]."%'";
	$query = "SELECT * FROM `Vegetables` WHERE Name = '$_GET[vegName]'";
}
else if (isset($_GET['Id']))
{
	$query = "SELECT * FROM `Vegetables` WHERE Id = '$_GET[Id]'";
}
$result = mysql_query($query);

//if no rows are returned, vegetable does not exist
if (mysql_numrows($result) == 0)
{
   die('Error: Vegetable does not exist');
}

//is this an edit, or are they loading this page without editing?
if (!isset($_POST['Name'])) 
{
   //let's store the vegetable's information
   while ($row = mysql_fetch_array($result))
   {
      $vegId = $row['Id'];
      $vegName = $row['Name'];
      $vegDescription = $row['Description'];
      $vegSource = $row['Source'];
      $vegCurrentImage = $row['CurrentImage'];
      $vegHistoryImage = $row['HistoryImage'];
   }
}

//print out vegetable information
echo '<table border="0" cellspacing="0" cellpadding="0" width="440">
   <tr>
   <td class="pageName">' . $vegName;
if ($isAdmin)
   {
   echo ' <small>(<a href="editVegetable.php?Id=' . $vegId . '">Edit</a>)&nbsp;';
  // echo '(<a onClick="return confirmAction()" href="deleteItem.php?Id=' . $vegId . '&Type=1">Delete</a>)</small>';
   }
echo '<p></p></td>
   </tr>
   <tr>
   <td class="bodyText">';
echo '<table border="0" width="700">';

echo '<tr><td colspan="2"><h3>Description:</h3>' . $vegDescription . '</td></tr>';
echo '<tr><td colspan="2"><h3>Source:</h3>' . $vegSource . '</td></tr>';
echo '<tr><td colspan="2"><hr></td></tr>';

echo '<tr><td colspan="2"><br />';

$query = "SELECT * FROM `Varieties` WHERE VegetableId = ". $vegId . " ORDER BY `Id` ASC";
$result = mysql_query($query);

//print out variety information, if it exists
if ($isAdmin) { echo '<h3>Varieties: <small>(<a href="addVariety.php?Id=' . $vegId . '">Add Variety</a>)</small></h3>'; 
				// (<a href="editVariety.php?Id=' . $vegId . '">Edit Variety</a>)
				}
else { echo '<h3>Varieties:</h3>'; }

echo '<br /><br />';

if (mysql_numrows($result) == 0)
{
   echo 'No varieties available.';
}
else
{
   while ($row = mysql_fetch_array($result))
   {
      
      echo '<strong>'.$row['Name'].'</strong>&nbsp;&nbsp;';
      if ($isAdmin)
      {
         echo '(<a href="deleteItem.php?Id=' . $row['Id'] . '&Type=3" onClick="return confirmAction()">Delete</a>)&nbsp;&nbsp;';
         echo  '(<a href="editVariety.php?Id=' . $row['Id'] . '&vegName='.$vegName.'">Edit</a>)';
      }
      //echo '<div id="' . $row['Id'] . '" style="width: 680px; background: #FFFFFF; display:none">';
      echo '<table border="0">';
      echo '<tr><td valign="top" align="left" width="150">Description:</td><td>' . $row['Description'] . '</td></tr>';
      echo '<tr><td valign="top" align="left" width="150">Source:</td><td>' . $row['Source'] . '</td></tr>';
      echo '<tr><td valignn="top" align="left" width="150">History Image File Name:</td><td>' . $row['HistoryImage'] . '</td></tr>';
     
      echo '<tr><td><hr></td><td></td></tr></table><br />';
     
      $numVar = $row['Id'];
   }
}

echo '<br />';


$query = "SELECT * FROM `Recipes` WHERE VegetableId = ". $vegId;
$result = mysql_query($query);

//print out recipes
if ($isAdmin) { echo '<h3>Recipes: <small>(<a href="addRecipe.php?Id=' . $vegId . '">Add Recipe</a>) </small></h3>'; }
else { echo '<h3>Recipes: </h3>'; }
echo '<br /><br />';
if (mysql_numrows($result) == 0)
{
   echo 'No recipes available.';
}
else 
{

  
   while ($row = mysql_fetch_array($result))
   {
   	 $numRep = $row['Id'] + $numVar;
   	 
      echo '<strong>'.$row['Name'].'</strong>&nbsp;&nbsp;';
      if ($isAdmin)
      {
         echo '(<a href="deleteItem.php?Id=' . $row['Id'] . '&Type=2" onClick="return confirmAction()">Delete</a>)&nbsp;&nbsp;';
         echo '(<a href="editRecipe.php?Id=' . $row['Id'] . '&vegName='.$vegName.'">Edit</a>)';
      }
     // echo '<div id="' . $numRep . '" style="width: 680px; background: #FFFFFF; display:none">';
      echo '<table border="0">';
      echo '<tr><td valign="top" align="left" width="150" >Directions:</td><td>' . $row['Directions'] . '</td></tr>';
     // echo '<tr><td><strong>Date:</strong></td><td>' . $row['Date'] . '</td></tr>';
      echo '<tr><td valign="top" align="left" width="150">Source:</td><td>' . $row['Source'] . '</td></tr>';
    //  echo '<tr><td valign="top"><strong>Region:</strong></td><td>' . $row['Region'];
     echo '<tr><td><hr></td><td></td></tr></table><br/>';
     
   }

}

echo '</td></tr>';
echo '<tr><td colspan="2"><br /><a href="updateVegetables.php">Back</a></td></tr>';
echo '</table>';
   
echo '</td>
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

//close connection with database
mysql_close($con);
?>
</body>
</html>
