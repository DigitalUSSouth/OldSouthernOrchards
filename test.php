<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	foreach($_POST as $x)
	{
		echo htmlspecialchars(stripslashes(trim($x)));
	}
}
?>