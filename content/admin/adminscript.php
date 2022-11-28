<?php
include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	public static function &domain()
	{
		return($_REQUEST);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		return(isset(Model::domain()["text"]) ? Model::domain()["text"] : "");
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
		echo $query;
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		View::Display(shell_exec(Model::R()));
	}
}

Controller::control();
?>