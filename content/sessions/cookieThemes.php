<?php
if (!isset($_COOKIE['logged']))
{
	header('Location: cookieLogin.php');
	exit;
}

function cook($options, $i) 
{
	echo $options[$_COOKIE[$_COOKIE['logged']][$i]];
}
?>
<html>

<style>
#white
{
	background-color: white;
}
#grey
{
	background-color: grey;
}
</style>

<body id=<?php cook(array('"white"', '"grey"'), 1);?>>

<div id="hi"><?php echo cook(array("Hi, ", "Привет, "), 0).$_COOKIE['logged'];?>!</div>

<div>
	<div id="lang"><?php cook(array("Language", "Язык"), 0);?></div>
	<input type="radio" name="lang" id="lang0" onclick="lang0Click(event)" <?php cook(array("checked", ""), 0);?>>
	<label for="lang0"><?php cook(array("English", "Английский"), 0);?></label>
	<input type="radio" name="lang" id="lang1" onclick="lang1Click(event)" <?php cook(array("", "checked"), 0);?>>
	<label for="lang1"><?php cook(array("Russian", "Русский"), 0);?></label>
</div>

<div>
	<div id="theme"><?php cook(array("Theme", "Тема"), 0);?></div>
	<input type="radio" name="theme" id="theme0" onclick="theme0Click(event)" <?php cook(array("checked", ""), 1);?>>
	<label for="theme0"><?php cook(array("Light", "Светлая"), 0);?></label>
	<input type="radio" name="theme" id="theme1" onclick="theme1Click(event)" <?php cook(array("", "checked"), 1);?>>
	<label for="theme1"><?php cook(array("Dark", "Тёмная"), 0);?></label>
</div>

<input type="button" id="logout" value=<?php cook(array('"Logout"', '"Выход"'), 0);?> onclick="logoutClick(event)">

</body>

<script>
var hi = document.getElementById("hi");

var body = document.getElementsByTagName("body")[0];
var labels = document.getElementsByTagName("label");

var lang  = document.getElementById("lang");
var lang0 = document.getElementById("lang0");


var theme  = document.getElementById("theme");
var theme0 = document.getElementById("theme0");

var button = document.getElementById("logout");

var logout = new XMLHttpRequest();
logout.onload = function()
{
	window.location.href = "http://localhost/sessions/cookieLogin.php";
}

function logoutClick(e)
{	
	logout.open("GET", "cookieLogouter.php?lang=" + (lang0.checked ? 0 : 1) + "&theme=" + (theme0.checked ? 0 : 1));
	logout.send();
}

function theme0Click(e)
{
	body.id = "white";
}

function theme1Click(e)
{
	body.id = "grey";
}

function lang0Click(e)
{
	console.log("norm");
	hi.innerText = "Hi, " + hi.innerText.substr(7);
	lang.innerText = "Language";
	theme.innerText = "Theme";
	labels[0].innerText = "English";
	labels[1].innerText = "Russian";
	labels[2].innerText = "Light";
	labels[3].innerText = "Dark";
	button.value = "Logout";
}

function lang1Click(e)
{
	hi.innerText = "Привет, " + hi.innerText.substr(4);
	lang.innerText = "Язык";
	theme.innerText = "Тема";
	labels[0].innerText = "Английский";
	labels[1].innerText = "Русский";
	labels[2].innerText = "Светлая";
	labels[3].innerText = "Тёмная";
	button.value = "Выход";
}

</script>

</html>