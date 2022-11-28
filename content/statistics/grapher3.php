<?php
require_once('jpgraph/src/jpgraph.php');
require_once('jpgraph/src/jpgraph_pie.php');

include "/var/www/html/baseMVC.php";

class ClientsModel implements IModel
{
	private static $mysqli;
	
	public static function &domain()
	{
		if (!isset(ClientsModel::$mysqli))
			ClientsModel::$mysqli = new mysqli("mysql", "admin", "Franklin5", "fixtures");
		return(ClientsModel::$mysqli);
	}
	
	public static function C($query = "")
	{
		die;
	}
	
	public static function R($query = "")
	{
		return(ClientsModel::domain()->query("SELECT type FROM Clients"));
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

class ClientsView implements IView
{
	public static function display($query = "")
	{
		header('Content-type: image/png');
		imagepng($query);
	}
}

class ClientsController implements IController
{
	public static function control($query = "")
	{
		$data = array(0,0,0,0,0,0);

		$result = ClientsModel::R();
		foreach ($result as $row)
			switch ($row['type'])
			{
				case "Visa Retired":
				{
					++$data[0];
					break;
				}
				case "American Express":
				{
					++$data[1];
					break;
				}
				case "Visa":
				{
					++$data[2];
					break;
				}
				case "Discover Card":
				{
					++$data[3];
					break;
				}
				case "MasterCard":
				{
					++$data[4];
					break;
				}
				case "JCB":
				{
					++$data[5];
					break;
				}
			}

		$graph = new PieGraph(600,400);

		$theme_class="DefaultTheme";

		$graph->title->Set("Type Distribution");
		$graph->SetBox(true);

		$p1 = new PiePlot($data);
		$graph->Add($p1);

		$p1->ShowBorder();
		$p1->SetColor('black');

		$graph->legend->SetFrameWeight(1);
		$graph->legend->SetColumns(6);
		$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3', '#AD564F'));
		$p1->SetLegends(array("Visa Retired", "American Express", "Visa", "Discover Card", "MasterCard", "JCB"));

		$graph->Stroke('graph3.png');

		$watermark = imagecreatefrompng('watermark.png');
		$image = imagecreatefrompng('graph3.png');
		imagecopymerge($image, $watermark, (imagesx($image) - imagesx($watermark)) / 2, (imagesy($image) - imagesy($watermark)) / 2 - 20, 0, 0, imagesx($watermark), imagesy($watermark), 50);
		ClientsView::display($image);
		imagedestroy($image);
		unlink("graph3.png");
	}
}

ClientsController::control();
?>