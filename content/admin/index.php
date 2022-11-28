<html lang="en">
<?php
include "/var/www/html/baseMVC.php";

class UsersModel implements IModel
{
	private static $mysqli;
	
	public static function &domain()
	{
		if (!isset(UsersModel::$mysqli))
			UsersModel::$mysqli = new mysqli("mysql", "user", "password", "appDB");
		return(UsersModel::$mysqli);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		return(UsersModel::domain()->query("SELECT * FROM users"));
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

class UsersView implements IView
{
	public static function display($query = "")
	{
		$result = UsersModel::R();
		foreach ($result as $row)
			echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
	}
}

class UsersController implements IController
{
	public static function control($query = "")
	{
		UsersView::display();
	}
}

class AdminsModel implements IModel
{
	private static $mysqli;
	
	public static function &domain()
	{
		if (!isset(AdminsModel::$mysqli))
			AdminsModel::$mysqli = new mysqli("mysql", "admin", "Franklin5", "userDB");
		return(AdminsModel::$mysqli);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		return(AdminsModel::domain()->query("SELECT * FROM auth"));
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

class AdminsView implements IView
{
	public static function display($query = "")
	{
		$result = AdminsModel::R();
		foreach ($result as $row)
			echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['actual']}</td><td>{$row['pass']}</td></tr>";
	}
}

class AdminsController implements IController
{
	public static function control($query = "")
	{
		AdminsView::display();
	}
}
?>
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Таблица пользователей данного продукта</h1>
<table>
    <tr><th>ID</th><th>Name</th><th>Surname</th></tr>
<?php
UsersController::control()
?>
<table>
    <tr><th>ID</th><th>Name</th><th>Actual</th><th>Pass</th></tr>
<?php
AdminsController::control();
?>
</table>
<?php
phpinfo();
?>
</body>
</html>