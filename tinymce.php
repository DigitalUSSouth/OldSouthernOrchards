<html>
<head>
<title>TinyMCE</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$result = htmlspecialchars(stripslashes(trim($_POST['content'])));
	echo $result;
}
?>
</body>
</html>