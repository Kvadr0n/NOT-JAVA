<html lang="ru">

<head>
	<title>coks</title>
</head>

<?php
include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	public static function &domain()
	{
		return($_COOKIE);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		return(isset(Model::domain()["logged"]));
	}
	
	public static function U($query = "")
	{
		die;
	}
	
	public static function D($query = "")
	{
		die;
	}
}

class View implements IView
{
	public static function display($query = "")
	{
		if (Model::R())
		{
			header('Location: cookieThemes.php');
			exit;
		}
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		View::display();
	}
}

Controller::control();
?>

<style>
main
{
	display: flex;
	gap: 25px;
}
div
{
	border: 2px solid lightblue;
}
</style>

<body>
	<main>
		<div>
			<p>LOGIN</p>
			<input id="username" placeholder="username" onkeypress="UsernameEnter(event)"></input>
		</div>
	</main>
</body>

<script>
var username = document.getElementById("username");
var login = new XMLHttpRequest();
login.onload = function()
{
	window.location.href = "http://localhost/sessions/cookieThemes.php";
}
function UsernameEnter(e)
{	
	if (e.keyCode == 13)
	{
		login.open("GET", "cookieLoginer.php?username=" + username.value);
		login.send();
	}
}
</script>

</html>