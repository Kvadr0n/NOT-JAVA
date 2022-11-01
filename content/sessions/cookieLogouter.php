<?php
setcookie($_COOKIE['logged'], $_GET['lang'].$_GET['theme'], time() + 300, '/');
setcookie('logged', "", time() - 1, '/');
?>