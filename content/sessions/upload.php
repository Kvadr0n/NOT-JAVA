<?php
include "/var/www/html/baseMVC.php";

class Model implements IModel
{
	public static function &domain()
	{
		return($_FILES['fileToUpload']);
	}
	
	public static function C($query = "")
	{
		move_uploaded_file(Model::domain()['tmp_name'], "/var/www/html/files/".basename(Model::domain()["name"]));
	}
	
	public static function R($query = "")
	{
		return(Model::domain()["tmp_name"]);
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
		if ($query)
			header('Location: index.html');
		else
			echo "ERROR: File is not PDF.";
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		if (file_get_contents(Model::R(), false, null, 0, 5) == "%PDF-")
		{
			Model::C();
			View::Display(true);
		}
		else
			View::Display(false);
	}
}

Controller::control();
?>