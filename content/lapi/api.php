<?php
$query = urldecode($_SERVER['REQUEST_URI']);
$len = strlen($query);
$slash = 6;
for ($slash; ($query[$slash] != '/') && ($slash < $len); ++$slash);
$entity = substr($query, 6, $slash - 6);

switch ($_SERVER['REQUEST_METHOD'])
{
	case "PUT":
	{
		$start = ++$slash;
		for ($slash; $slash < $len; ++$slash);
		$data = json_decode(substr($query, $start, $slash - $start), true);
		if (!is_array($data))
		{
			echo "API ERROR: Invalid JSON";
			break;
		}
		$size = 0;
		foreach ($data as $key => $value)
			++$size;
		switch ($entity)
		{
			case "users":
			{
				if ($size != 2)
				{
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["name"] == null)
				{
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["surname"] == null)
				{
					echo "API ERROR: surname Missing";
					break;
				}
				$mysqli = new mysqli("db", "user", "password", "appDB");
				$result = $mysqli->query("SELECT * FROM users WHERE name = \"".$data["name"]."\" AND surname = \"".$data["surname"]."\"");
				if ($result->num_rows == 1)
				{
					echo "API ERROR: Record already exists";
					break;
				}
				$result = $mysqli->query("INSERT INTO users (name, surname) values (\"".$data["name"]."\", \"".$data["surname"]."\")");
				echo "PUT Success";
				break;
			}
			case "admins":
			{
				if ($size != 3)
				{
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["name"] == null)
				{
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["actual"] == null)
				{
					echo "API ERROR: actual Missing";
					break;
				}
				if ($data["pass"] == null)
				{
					echo "API ERROR: pass Missing";
					break;
				}
				$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
				$result = $mysqli->query('SELECT * FROM auth WHERE name = "'.$data["name"].'"');
				if ($result->num_rows == 1)
				{
					echo "API ERROR: Record already exists";
					break;
				}
				$result = $mysqli->query('INSERT INTO auth (name, actual, pass) values ("'.$data["name"].'", "'.$data["actual"].'", "'.$data["pass"].'")');
				echo "PUT Success";
				break;
			}
			default:
			{
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
	case "GET":
	{
		$start = ++$slash;
		for ($slash; $slash < $len; ++$slash);
		$id = substr($query, $start, $slash - $start);
		switch ($entity)
		{
			case "users":
			{
				if ($id == "")
				{
					$mysqli = new mysqli("db", "user", "password", "appDB");
					$result = $mysqli->query("SELECT * FROM users");
					if ($result->num_rows == 0)
					{
						echo "";
						break;
					}
					$json = "";
					foreach ($result as $row)
						$json = $json.",".json_encode($row);
					$json[0] = '[';
					$json .= "]";
					echo $json;
					break;
				}
				$mysqli = new mysqli("db", "user", "password", "appDB");
				$result = $mysqli->query("SELECT * FROM users WHERE ID = ".$id);
				if ($result->num_rows == 0)
				{
					echo "";
					break;
				}
				foreach ($result as $row)
					echo json_encode($row);
				break;
			}
			case "admins":
			{
				if ($id == "")
				{
					$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
					$result = $mysqli->query("SELECT * FROM auth");
					if ($result->num_rows == 0)
					{
						echo "";
						break;
					}
					$json = "";
					foreach ($result as $row)
						$json = $json.",".json_encode($row);
					$json[0] = '[';
					$json .= "]";
					echo $json;
					break;
				}
				$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
				$result = $mysqli->query("SELECT * FROM auth WHERE ID = ".$id);
				if ($result->num_rows == 0)
				{
					echo "";
					break;
				}
				foreach ($result as $row)
					echo json_encode($row);
				break;
			}
			default:
			{
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
	case "POST":
	{
		$start = ++$slash;
		for ($slash; ($query[$slash] != '/') && ($slash < $len); ++$slash);
		$id = substr($query, $start, $slash - $start);
		$start = ++$slash;
		for ($slash; $slash < $len; ++$slash);
		$data = json_decode(substr($query, $start, $slash - $start), true);
		if (substr($query, $start, $slash - $start) == "")
		{
			echo "API ERROR: id Missing";
			break;
		}
		if (!is_array($data))
		{
			echo "API ERROR: Invalid JSON";
			break;
		}
		$size = 0;
		foreach ($data as $key => $value)
			++$size;
		switch ($entity)
		{
			case "users":
			{
				if ($size != 2)
				{
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["name"] == null)
				{
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["surname"] == null)
				{
					echo "API ERROR: surname Missing";
					break;
				}
				$mysqli = new mysqli("db", "user", "password", "appDB");
				$result = $mysqli->query("SELECT * FROM users WHERE name = \"".$data["name"]."\" AND surname = \"".$data["surname"]."\"");
				if ($result->num_rows == 1)
				{
					echo "API ERROR: New record already exists";
					break;
				}
				$result = $mysqli->query("SELECT * FROM users WHERE ID = ".$id);
				if ($result->num_rows == 0)
				{
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("UPDATE users SET name = \"".$data["name"]."\", surname = \"".$data["surname"]."\" WHERE ID = ".$id);
				echo "POST Success";
				break;
			}
			case "admins":
			{
				if ($size != 3)
				{
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["name"] == null)
				{
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["actual"] == null)
				{
					echo "API ERROR: actual Missing";
					break;
				}
				if ($data["pass"] == null)
				{
					echo "API ERROR: pass Missing";
					break;
				}
				$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
				$result = $mysqli->query('SELECT * FROM auth WHERE name = "'.$data["name"].'"');
				if ($result->num_rows == 1)
				{
					echo "API ERROR: New record already exists";
					break;
				}
				$result = $mysqli->query("SELECT * FROM auth WHERE ID = ".$id);
				if ($result->num_rows == 0)
				{
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("UPDATE auth SET name = \"".$data["name"]."\", actual = \"".$data["actual"]."\", pass = \"".$data["pass"]."\" WHERE ID = ".$id);
				echo "POST Success";
				break;
			}
			default:
			{
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
	case "DELETE":
	{
		$start = ++$slash;
		for ($slash; $slash < $len; ++$slash);
		$id = substr($query, $start, $slash - $start);
		switch ($entity)
		{
			case "users":
			{
				$mysqli = new mysqli("db", "user", "password", "appDB");
				if ($id == "")
				{
					$result = $mysqli->query("DELETE FROM users");
					echo "DELETE Success";
					break;
				}
				$result = $mysqli->query("SELECT * FROM users WHERE ID = ".$id);
				if ($result->num_rows == 0)
				{
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("DELETE FROM users WHERE ID = ".$id);
				echo "DELETE Success";
				break;
			}
			case "admins":
			{
				$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
				if ($id == "")
				{
					$result = $mysqli->query("DELETE FROM auth");
					echo "DELETE Success";
					break;
				}
				$result = $mysqli->query("SELECT * FROM auth WHERE ID = ".$id);
				if ($result->num_rows == 0)
				{
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("DELETE FROM auth WHERE ID = ".$id);
				echo "DELETE Success";
				break;
			}
			default:
			{
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
}
?>