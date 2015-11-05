<?php
session_start();
define('OSO_DB',true);
//set login information
require('db_info.php');
$dbUser = getUserName();
$dbPass = getPassword();
//get the current date
$curDate = date('F jS, Y');

//make sure the file is actually embedded within another page
if (!defined('EMBEDDED')) 
{
   die ('Error: file must be embedded within another page');
}

//initiate variables
$isLoggedIn = 0;
//if appropriate cookie values are set, let's make sure they are legitimate
if ((isset($_SESSION['UU']) && $_SESSION['UU']!='') && (isset($_SESSION['UP']) && $_SESSION['UP']!=''))
{	
   //connect to the database
   $con = mysql_connect("localhost",$dbUser,$dbPass);
   if (!$con)
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db(getDB(),$con);

   //setup up our query
   $query = "SELECT IsAdmin FROM `Users` WHERE Username = '$_SESSION[UU]' AND Password = '$_SESSION[UP]'";
   $result = mysql_query($query);

   //if no rows are returned, this username/password combination does not exist
   if (mysql_numrows($result) == 0)
   {
      $isLoggedIn = 0;
   }

   //if there is 1 row returned, log in the user by creating a cookie of their passhash
   if (mysql_numrows($result) == 1)
   {
      //let's store the username and password
      while ($row = mysql_fetch_array($result))
      {
         $_SESSION['ISADMIN'] = $row['IsAdmin'];
         $isLoggedIn = 1;
      }
   }
   
   //if the page requires the user to be an admin
   if (defined('ADMIN'))
   {
      //if they are not an admin
      if ($isAdmin == 0)
      {
         header('Location: index.php');
      }
   }
   
   //close the connection with database
   mysql_close($con);
}
else {

   //if the page requires the user to be an admin
   if (defined('ADMIN'))
   {
      die('You must be logged in as an admin to access this page.');
   }
   
   //if the page requires the user to be logged in
   if (defined('USER'))
   {
      die('You must be logged in to access this page.');
   }
}

function resizeImage($originalImage,$toWidth,$toHeight){

    // Get the original geometry and calculate scales
    list($width, $height) = getimagesize($originalImage);
    $xscale=$width/$toWidth;
    $yscale=$height/$toHeight;

    // Recalculate new size with default ratio
    if ($yscale>$xscale){
        $new_width = round($width * (1/$yscale));
        $new_height = round($height * (1/$yscale));
    }
    else {
        $new_width = round($width * (1/$xscale));
        $new_height = round($height * (1/$xscale));
    }

    // Resize the original image
    $imageResized = imagecreatetruecolor($new_width, $new_height);
    $imageTmp     = imagecreatefromjpeg ($originalImage);
    imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    return $imageResized;
}
?>
