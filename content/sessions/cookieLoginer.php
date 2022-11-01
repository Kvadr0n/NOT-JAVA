<?php
setcookie('logged', $_GET["username"], time() + 60, '/');
if (!isset($_COOKIE[$_GET["username"]]))
	setcookie($_GET["username"], '00', time() + 300, '/');
?>