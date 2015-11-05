<?php
session_start();
//make sure the file is actually embedded within another page
if (!defined('EMBEDDED')) 
{
   die ('Error: file must be embedded within another page');
}
echo '   <img src="images/header.png" style="padding-left: 15px;" />
    
        <div id="navigation" class="nav">
		
            <a class="nav" href="index.php">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;
           
            <a class="nav" href="search.php">SEARCH</a>&nbsp;&nbsp;&nbsp;&nbsp;
           ';

if ((isset($_SESSION['ISLOGGEDIN']) && $_SESSION['ISLOGGEDIN']=='1') && (isset($_SESSION['ISADMIN']) && $_SESSION['ISADMIN']=='1'))
{
   echo '<a class="nav" href="updateOrchard.php">UPDATE ORCHARD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
   
}
if (!isset($_SESSION['ISLOGGEDIN']) || $_SESSION['ISLOGGEDIN']=='0')
{
   echo '<a class="nav" href="login.php">LOG IN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
   echo '<a class="nav" href="logoutUser.php">LOG OUT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}

echo '<a class="nav" href="about.php">ABOUT</a> ';
echo '</div>';
?>
