<?php

include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	public static function &domain()
	{
		return($_GET);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		switch ($query)
		{
			case "b":
				return(isset(Model::domain()["bhwRGB"]) ? (Model::domain()["bhwRGB"] & 0xff0000000000) >> 40 : 0);
			case "h":
				return(isset(Model::domain()["bhwRGB"]) ? (Model::domain()["bhwRGB"] & 0x00ff00000000) >> 32 : 0);
			case "w":
				return(isset(Model::domain()["bhwRGB"]) ? (Model::domain()["bhwRGB"] & 0x0000ff000000) >> 24 : 0);
			case "R":
				return(isset(Model::domain()["bhwRGB"]) ? (Model::domain()["bhwRGB"] & 0x000000ff0000) >> 16 : 0);
			case "G":
				return(isset(Model::domain()["bhwRGB"]) ? (Model::domain()["bhwRGB"] & 0x00000000ff00) >> 8 : 0);	
			case "B":
				return(isset(Model::domain()["bhwRGB"]) ? Model::domain()["bhwRGB"] & 0x0000000000ff : 0);				
		}
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
		$b = Model::R('b');
		$h = Model::R('h');
		$w = Model::R('w');
		$R = Model::R('R');
		$G = Model::R('G');
		$B = Model::R('B');
		echo 
		"
		<div style=
			'
			border-radius: {$b}px; height: {$h}px; width: {$w}px;
			background-color: rgb($R, $G, $B)
			'>
		</div>
		";
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		View::Display();
	}
}

?>

<html lang="en">
<head>
<title>Рисовач</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
Controller::control();
//140733176545280 = 7ffefeff0000 - красный круг
//140187698987263 = 7f7ffe0000ff - синяя пилюля
//  1099494850560 = 00ffff000000 - что-то про негров
?>
</body>
</html>