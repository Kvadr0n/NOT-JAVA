<html>
<head>
<style>
/* внешние границы таблицы серого цвета толщиной 1px */
table {
    border: 1px solid grey;
    margin-left: auto;
    margin-right: auto;
}
/* границы ячеек первого ряда таблицы */
th {
    border: 1px solid grey;
    font-size: 250%;
}
/* границы ячеек тела таблицы */
td {
    border: 1px solid grey;
    font-size: 250%;
}
</style>
</head>
<?php
require_once('/var/www/vendor/autoload.php');

include "/var/www/html/baseMVC.php";

class ClientsModel implements IModel
{
	private static $mysqli;
	private static $faker;
	
	public static function &domain()
	{
		if (!isset(ClientsModel::$mysqli))
			ClientsModel::$mysqli = new mysqli("mysql", "admin", "Franklin5", "fixtures");
		if (!isset(ClientsModel::$faker))
			ClientsModel::$faker = Faker\Factory::create('ru_RU');
		return(ClientsModel::$mysqli);
	}
	
	public static function C($query = "")
	{
		ClientsModel::domain()->query
		("
		CREATE TABLE Clients
		(
			id INT NOT NULL AUTO_INCREMENT,
			name VARCHAR(100) NOT NULL,
			type VARCHAR(20) NOT NULL,
			number VARCHAR(20) NOT NULL,
			expiration VARCHAR(5) NOT NULL,
			cvc INT NOT NULL,
			PRIMARY KEY (id)
		)
		");
	}
	
	public static function R($query = "")
	{
		return(ClientsModel::domain()->query("SELECT * FROM Clients"));
	}
	
	public static function U($query = "")
	{
		$faker = ClientsModel::$faker;
		ClientsModel::domain()->query("INSERT INTO Clients (name, type, number, expiration, cvc)
					VALUES ('{$faker->name()}', '{$faker->creditCardType()}', '{$faker->creditCardNumber()}', '{$faker->creditCardExpirationDateString()}', {$faker->randomNumber(3, true)})");
	}
	
	public static function D($query = "")
	{
		ClientsModel::domain()->query("DROP TABLE Clients");
	}
}

class ClientsView implements IView
{
	public static function display($query = "")
	{
		$result = ClientsModel::R();
		foreach ($result as $row)
			echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['type']}</td><td>{$row['number']}</td><td>{$row['expiration']}</td><td>{$row['cvc']}</td></tr>";
	}
}

class ClientsController implements IController
{
	public static function control($query = "")
	{
		ClientsModel::D();
		ClientsModel::C();
		for ($i = 0; $i < 50; ++$i)
			ClientsModel::U();
		ClientsView::display();
	}
}
?>
	<body>
		<table>
			<tr><th>ID</th><th>ФИО</th><th>Тип карты</th><th>Номер карты</th><th>Срок действия</th><th>CVC</th></tr>
			<?php
			ClientsController::Control();
			?>
		</table>
	<img src="grapher1.php">
	<img src="grapher2.php">	
	<img src="grapher3.php">	
	</body>
</html>