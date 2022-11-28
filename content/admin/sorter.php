<?php

include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	private static $A = array();
	
	public static function &domain()
	{
		return(Model::$A);
	}
	
	public static function C($query = "")
	{
		array_push(Model::domain(), $query);
	}
	
	public static function R($query = "")
	{
		return(Model::domain()[$query]);
	}
	
	public static function U($query = "")
	{
		$tmp = Model::domain()[$query[0]];
		Model::domain()[$query[0]] = Model::domain()[$query[1]];
		Model::domain()[$query[1]] = $tmp;
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
		foreach(Model::domain() as &$num)
			echo "$num ";
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		$url = $_SERVER['REQUEST_URI'];
		$i = 1;
		for (; $url[$i] != '?'; ++$i);
		++$i;
		$l = 0;
		$length = strlen($url);
		for (; $i < $length; ++$i)
		{
			if ($url[$i] == ',')
			{
				Model::C(substr($url, $i-$l, $l));
				$l = 0;
			}
				else
					++$l;
		}
		Model::C(substr($url, $i-$l, $l));
		$size = count(Model::domain());
		$min = PHP_INT_MAX;
		$minin = 0;
		for ($i = 0; $i < $size; ++$i)
		{
			for ($j = $i; $j < $size; ++$j)
				if (Model::R($j) <= $min)
				{	
					$min = Model::R($j);
					$minin = $j;
				}
			Model::U(array($i, $minin));
			$min = PHP_INT_MAX;
		}		
		View::Display();
	}
}

?>

<html lang="en">
<head>
<title>Сортач</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
Controller::control();
?>
</body>
</html>