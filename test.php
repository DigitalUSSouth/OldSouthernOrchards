<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	foreach($_POST as $x)
	{
		echo htmlspecialchars(stripslashes($x));
		/*$dom = new DOMDocument();
		@$dom->loadHTML($value);
		foreach($dom->getElementsByTagName('*') as $tag) 
		{
			$tagName = strtolower(trim($tag->tagName));
			if($tagName == "img" || $tagName == "body" || $tagName == "head" || $tagName == "html")
				continue;
			echo $tag->textContent;
			$children = $tag->childNodes;
			foreach ($children as $child) 
			{
				$subTagName = strtolower(trim($child->tagName));
				if($subTagName == "img" || $subTagName == "body" || $subTagName == "head" || $subTagName == "html")
					continue;
				$content = htmlspecialchars(stripslashes($child->c14n()));
				echo "*****";
				echo $content;			
			}
		}*/
	}
}
?>