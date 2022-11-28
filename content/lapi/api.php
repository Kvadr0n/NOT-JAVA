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
		$result = UsersModel::domain()->query("SELECT * FROM users WHERE name = \"".$query["name"]."\" AND surname = \"".$query["surname"]."\"");
		if ($result->num_rows == 1)
			return("409 API ERROR: Record already exists");
		$result = UsersModel::domain()->query("INSERT INTO users (name, surname) values (\"".$query["name"]."\", \"".$query["surname"]."\")");
		return("PUT Success");
	}
	
	public static function R($query = "")
	{
		if ($query == "")
		{
			$result = UsersModel::domain()->query("SELECT * FROM users");
			if ($result->num_rows == 0)
				return("404 API ERROR: Record does not exist");
			$json = "";
			foreach ($result as $row)
				$json = $json.",".json_encode($row);
			$json[0] = '[';
			$json .= "]";
			return($json);
		}
		$result = (object)array("num_rows" => 0);
		if (is_string($query))
			$result = UsersModel::domain()->query("SELECT * FROM users WHERE ID = ".$query);
		if (is_array($query))
			$result = UsersModel::domain()->query("SELECT * FROM users WHERE name = \"".$query["name"]."\" AND surname = \"".$query["surname"]."\"");
		if ($result->num_rows == 0)
			return("404 API ERROR: Record does not exist");
		foreach ($result as $row)
			return(json_encode($row));
	}
	
	public static function U($query = "")
	{
		$result = (object)array("num_rows" => 0);
		if (is_array($query))
			$result = UsersModel::domain()->query("SELECT * FROM users WHERE name = \"".$query["name"]."\" AND surname = \"".$query["surname"]."\"");
		if ($result->num_rows == 1)
			return("409 API ERROR: New record already exists");
		if (is_array($query))
			$result = UsersModel::domain()->query("SELECT * FROM users WHERE ID = ".$query["id"]);
		if ($result->num_rows == 0)
			return("404 API ERROR: Record does not exist");
		if (is_array($query))
			$result = UsersModel::domain()->query("UPDATE users SET name = \"".$query["name"]."\", surname = \"".$query["surname"]."\" WHERE ID = ".$query["id"]);
		return("POST Success");
	}
	
	public static function D($query = "")
	{
		if ($query == "")
		{
			$result = UsersModel::domain()->query("DELETE FROM users");
			return("DELETE Success");
		}
		$result = UsersModel::domain()->query("SELECT * FROM users WHERE ID = ".$query);
		if ($result->num_rows == 0)
			return("404 API ERROR: Record does not exist");
		$result = UsersModel::domain()->query("DELETE FROM users WHERE ID = ".$query);
		return("DELETE Success");
	}
}

class UsersView implements IView
{
	public static function display($query = "")
	{
		if (substr($query, 0, 3) != "API")
			http_response_code(intval(substr($query, 0, 3)));
		echo($query);
		exit;
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
		$result = AdminsModel::domain()->query("SELECT * FROM auth WHERE name = \"".$query["name"]."\"");
		if ($result->num_rows == 1)
			return("409 API ERROR: Record already exists");
		$result = AdminsModel::domain()->query('INSERT INTO auth (name, actual, pass) values ("'.$query["name"].'", "'.$query["actual"].'", "'.$query["pass"].'")');
		return("PUT Success");
	}
	
	public static function R($query = "")
	{
		if ($query == "")
		{
			$result = AdminsModel::domain()->query("SELECT * FROM auth");
			if ($result->num_rows == 0)
				return("404 API ERROR: Record does not exist");
			$json = "";
			foreach ($result as $row)
				$json = $json.",".json_encode($row);
			$json[0] = '[';
			$json .= "]";
			return($json);
		}
		$result = (object)array("num_rows" => 0);
		if (is_string($query))
			$result = AdminsModel::domain()->query("SELECT * FROM auth WHERE ID = ".$query);
		if (is_array($query))
			$result = AdminsModel::domain()->query("SELECT * FROM auth WHERE name = \"".$query["name"]."\"");
		if ($result->num_rows == 0)
			return("404 API ERROR: Record does not exist");
		foreach ($result as $row)
			return(json_encode($row));
	}
	
	public static function U($query = "")
	{
		$result = (object)array("num_rows" => 0);
		if (is_array($query))
			$result = AdminsModel::domain()->query("SELECT * FROM auth WHERE name = \"".$query["name"]."\"");
		if ($result->num_rows == 1)
			return("409 API ERROR: New record already exists");
		if (is_array($query))
			$result = AdminsModel::domain()->query("SELECT * FROM auth WHERE ID = ".$query["id"]);
		if ($result->num_rows == 0)
			return("404 API ERROR: Record does not exist");
		if (is_array($query))
			$result = AdminsModel::domain()->query("UPDATE auth SET name = \"".$query["name"]."\", actual = \"".$query["actual"]."\", pass = \"".$query["pass"]."\" WHERE ID = ".$query["id"]);
		return("POST Success");
	}
	
	public static function D($query = "")
	{
		if ($query == "")
		{
			$result = AdminsModel::domain()->query("DELETE FROM auth");
			return("DELETE Success");
		}
		$result = AdminsModel::domain()->query("SELECT * FROM auth WHERE ID = ".$query);
		if ($result->num_rows == 0)
			return("404 API ERROR: Record does not exist");
		$result = AdminsModel::domain()->query("DELETE FROM auth WHERE ID = ".$query);
		return("DELETE Success");
	}
}

class AdminsView implements IView
{
	public static function display($query = "")
	{
		if (substr($query, 0, 3) != "API")
			http_response_code(intval(substr($query, 0, 3)));
		echo($query);
		exit;
	}
}

class Controller implements IController
{
	public static function control($query = "")
	{
		$query = urldecode($_SERVER['REQUEST_URI']);
		$len = strlen($query);
		for ($slash = 6; ($slash < $len) && ($query[$slash] != '?'); ++$slash);
		$entity = substr($query, 6, $slash - 6);
		switch ($_SERVER['REQUEST_METHOD'])
		{
			case "PUT":
			{
				$query = json_decode(file_get_contents('php://input'), true);
				if ($query == null)
					UsersView::Display("400 API ERROR: Invalid JSON");
				$size = 0;
				foreach ($query as $key => $value)
					++$size;
				switch ($entity)
				{
					case "users":
					{
						if ($size != 2)
							UsersView::Display("400 API ERROR: Invalid query Size");
						if ($query["name"] == null)
							UsersView::Display("400 API ERROR: name Missing");
						if ($query["surname"] == null)
							UsersView::Display("400 API ERROR: surname Missing");
						UsersView::Display(UsersModel::C($query));
					}
					case "admins":
					{
						if ($size != 3)
							AdminsView::Display("400 API ERROR: Invalid query Size");
						if ($query["name"] == null)
							AdminsView::Display("400 API ERROR: name Missing");
						if ($query["actual"] == null)
							AdminsView::Display("400 API ERROR: actual Missing");
						if ($query["pass"] == null)
							AdminsView::Display("400 API ERROR: pass Missing");
						AdminsView::Display(AdminsModel::C($query));
					}
					default:
					{
						UsersView::Display("400 API ERROR: Invalid Entity");
					}
				}
				break;
			}
			case "GET":
			{
				$id = "";
				if (isset($_GET["id"]))
					$id = $_GET["id"];
				switch ($entity)
				{
					case "users":
					{
						UsersView::Display(UsersModel::R($id));
					}
					case "admins":
					{
						AdminsView::Display(AdminsModel::R($id));
					}
					default:
					{
						UsersView::Display("400 API ERROR: Invalid Entity");
					}
				}
				break;
			}
			case "POST":
			{
				$query = json_decode(file_get_contents('php://input'), true);
				if ($query == null)
					UsersView::Display("400 API ERROR: Invalid JSON");
				$size = 0;
				foreach ($query as $key => $value)
					++$size;
				switch ($entity)
				{
					case "users":
					{
						if ($size != 3)
							UsersView::Display("400 API ERROR: Invalid query Size");
						if ($query["id"] == null)
							UsersView::Display("400 API ERROR: id Missing");
						if ($query["name"] == null)
							UsersView::Display("400 API ERROR: name Missing");
						if ($query["surname"] == null)
							UsersView::Display("400 API ERROR: surname Missing");
						UsersView::Display(UsersModel::U($query));
					}
					case "admins":
					{
						if ($size != 4)
							AdminsView::Display("400 API ERROR: Invalid query Size");
						if ($query["id"] == null)
							AdminsView::Display("400 API ERROR: id Missing");
						if ($query["name"] == null)
							AdminsView::Display("400 API ERROR: name Missing");
						if ($query["actual"] == null)
							AdminsView::Display("400 API ERROR: actual Missing");
						if ($query["pass"] == null)
							AdminsView::Display("400 API ERROR: pass Missing");
						AdminsView::Display(AdminsModel::U($query));
					}
					default:
					{
						UsersView::Display("400 API ERROR: Invalid Entity");
					}
				}
				break;
			}
			case "DELETE":
			{
				$id = "";
				if (isset($_GET["id"]))
					$id = $_GET["id"];
				switch ($entity)
				{
					case "users":
					{
						UsersView::Display(UsersModel::D($id));
					}
					case "admins":
					{
						AdminsView::Display(AdminsModel::D($id));
					}
					default:
					{
						UsersView::Display("400 API ERROR: Invalid Entity");
					}
				}
				break;
			}
		}
	}
}

Controller::control();
?>