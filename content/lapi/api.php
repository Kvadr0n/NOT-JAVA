<?php
$query = urldecode($_SERVER['REQUEST_URI']);
$len = strlen($query);
$slash = 6;
for ($slash; ($query[$slash] != '?') && ($slash < $len); ++$slash);
$entity = substr($query, 6, $slash - 6);

switch ($_SERVER['REQUEST_METHOD'])
{
	case "PUT":
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data == null)
		{
			http_response_code(400);
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
					http_response_code(400);
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["name"] == null)
				{
					http_response_code(400);
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["surname"] == null)
				{
					http_response_code(400);
					echo "API ERROR: surname Missing";
					break;
				}
				$mysqli = new mysqli("db", "user", "password", "appDB");
				$result = $mysqli->query("SELECT * FROM users WHERE name = \"".$data["name"]."\" AND surname = \"".$data["surname"]."\"");
				if ($result->num_rows == 1)
				{
					http_response_code(409);
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
					http_response_code(400);
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["name"] == null)
				{
					http_response_code(400);
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["actual"] == null)
				{
					http_response_code(400);
					echo "API ERROR: actual Missing";
					break;
				}
				if ($data["pass"] == null)
				{
					http_response_code(400);
					echo "API ERROR: pass Missing";
					break;
				}
				$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
				$result = $mysqli->query('SELECT * FROM auth WHERE name = "'.$data["name"].'"');
				if ($result->num_rows == 1)
				{
					http_response_code(409);
					echo "API ERROR: Record already exists";
					break;
				}
				$result = $mysqli->query('INSERT INTO auth (name, actual, pass) values ("'.$data["name"].'", "'.$data["actual"].'", "'.$data["pass"].'")');
				echo "PUT Success";
				break;
			}
			default:
			{
				http_response_code(400);
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
	case "GET":
	{
		$id = $_GET["id"];
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
						http_response_code(404);
						echo "API ERROR: Record does not exist";
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
					http_response_code(404);
					echo "API ERROR: Record does not exist";
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
						http_response_code(404);
						echo "API ERROR: Record does not exist";
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
					http_response_code(404);
					echo "API ERROR: Record does not exist";
					break;
				}
				foreach ($result as $row)
					echo json_encode($row);
				break;
			}
			default:
			{
				http_response_code(400);
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
	case "POST":
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data == null)
		{
			http_response_code(400);
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
				if ($size != 3)
				{
					http_response_code(400);
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["id"] == null)
				{
					http_response_code(400);
					echo "API ERROR: id Missing";
					break;
				}
				if ($data["name"] == null)
				{
					http_response_code(400);
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["surname"] == null)
				{
					http_response_code(400);
					echo "API ERROR: surname Missing";
					break;
				}
				$mysqli = new mysqli("db", "user", "password", "appDB");
				$result = $mysqli->query("SELECT * FROM users WHERE name = \"".$data["name"]."\" AND surname = \"".$data["surname"]."\"");
				if ($result->num_rows == 1)
				{
					http_response_code(409);
					echo "API ERROR: New record already exists";
					break;
				}
				$result = $mysqli->query("SELECT * FROM users WHERE ID = ".$data["id"]);
				if ($result->num_rows == 0)
				{
					http_response_code(404);
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("UPDATE users SET name = \"".$data["name"]."\", surname = \"".$data["surname"]."\" WHERE ID = ".$data["id"]);
				echo "POST Success";
				break;
			}
			case "admins":
			{
				if ($size != 4)
				{
					http_response_code(400);
					echo "API ERROR: Invalid Data Size";
					break;
				}
				if ($data["id"] == null)
				{
					http_response_code(400);
					echo "API ERROR: id Missing";
					break;
				}
				if ($data["name"] == null)
				{
					http_response_code(400);
					echo "API ERROR: name Missing";
					break;
				}
				if ($data["actual"] == null)
				{
					http_response_code(400);
					echo "API ERROR: actual Missing";
					break;
				}
				if ($data["pass"] == null)
				{
					http_response_code(400);
					echo "API ERROR: pass Missing";
					break;
				}
				$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
				$result = $mysqli->query('SELECT * FROM auth WHERE name = "'.$data["name"].'"');
				if ($result->num_rows == 1)
				{
					http_response_code(409);
					echo "API ERROR: New record already exists";
					break;
				}
				$result = $mysqli->query("SELECT * FROM auth WHERE ID = ".$data["id"]);
				if ($result->num_rows == 0)
				{
					http_response_code(404);
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("UPDATE auth SET name = \"".$data["name"]."\", actual = \"".$data["actual"]."\", pass = \"".$data["pass"]."\" WHERE ID = ".$data["id"]);
				echo "POST Success";
				break;
			}
			default:
			{
				http_response_code(400);
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
	case "DELETE":
	{
		$id = $_GET["id"];
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
					http_response_code(404);
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
					http_response_code(404);
					echo "API ERROR: Record does not exist";
					break;
				}
				$result = $mysqli->query("DELETE FROM auth WHERE ID = ".$id);
				echo "DELETE Success";
				break;
			}
			default:
			{
				http_response_code(400);
				echo "API ERROR: Invalid Entity";
				break;
			}
		}
		break;
	}
}
?>