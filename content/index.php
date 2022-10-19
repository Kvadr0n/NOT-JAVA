<html lang="en">
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Таблица пользователей данного продукта</h1>
<table>
    <tr><th>ID</th><th>Name</th><th>Surname</th></tr>
<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM users");
foreach ($result as $row){
	echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
}
?>
<table>
    <tr><th>ID</th><th>Name</th><th>Actual</th><th>Pass</th></tr>
<?php
$mysqli = new mysqli("db", "admin", "Franklin5", "userDB");
$result = $mysqli->query("SELECT * FROM auth");
foreach ($result as $row){
	echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['actual']}</td><td>{$row['pass']}</td></tr>";
}
?>
</table>
<?php
phpinfo();
?>
</body>
</html>