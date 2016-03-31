<?php
//make sure the file is actually embedded within another page
if (!defined('EMBEDDED')) 
{
	die ('Error: file must be embedded within another page');
}
//print out the login form
echo '<form action="loginUser.php" method="post">';
echo '<input type="hidden" name="referer" value="'.$referer.'" >';
echo '<table style="padding: 10px; padding-left: 0; margin-left: 0;">';
echo '<tr>';
echo '<td>Username: </td><td><input type="text" name="Username" /></td></tr>';
echo '<tr><td>Password: </td><td><input type="password" name="Password" /></td></tr>';
echo '<tr><td><input type="submit" value="Login" /></td></tr>';
echo '</table></form>';
?>