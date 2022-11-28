<?php
include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	public static $count;
	
	public static function &domain()
	{
		return($_SESSION);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		return(Model::$count);
	}
	
	public static function U($query = "")
	{
		Model::$count = isset(Model::domain()['count']) ? Model::domain()['count'] : 0;
		++Model::$count;
		$_SESSION['count'] = Model::$count;
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
		echo Model::R();
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		ini_set('session.gc_maxlifetime', 5);
		session_start();
		Model::U();
		View::display();
	}
}

Controller::control();
?>