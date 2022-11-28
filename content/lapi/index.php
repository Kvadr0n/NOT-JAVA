<?php
include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	public static function &domain()
	{
		die;
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		die;
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
		echo "API ERROR: Empty Query";
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