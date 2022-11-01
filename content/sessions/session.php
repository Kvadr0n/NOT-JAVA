<?php
ini_set('session.gc_maxlifetime', 5);
session_start();
$count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;
echo $count;
$_SESSION['count'] = ++$count;
?>