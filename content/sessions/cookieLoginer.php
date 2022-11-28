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
		setcookie($query[0], $query[1], $query[2], '/');
	}
	
	public static function R($query = "")
	{
		return(isset(Model::domain()[$_GET["username"]]));
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
		die;
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		Model::C(array('logged', $_GET["username"], time() + 60));
		if (!Model::R())
			Model::C(array($_GET["username"], '00', time() + 300));
		View::display();
	}
}

Controller::control();
?>