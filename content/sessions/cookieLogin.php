<html lang="ru">

<head>
	<title>coks</title>
</head>

<?php
if (isset($_COOKIE['logged']))
{
	header('Location: cookieThemes.php');
	exit;
}
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