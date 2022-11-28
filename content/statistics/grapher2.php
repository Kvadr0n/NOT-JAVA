<?php
require_once('jpgraph/src/jpgraph.php');
require_once('jpgraph/src/jpgraph_bar.php');

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
		return(ClientsModel::domain()->query("SELECT expiration FROM Clients"));
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
		$datay=array(0,0,0,0);

		$mysqli = new mysqli("mysql", "admin", "Franklin5", "fixtures");
		$result = ClientsModel::R();
		foreach ($result as $row)
			switch (substr($row['expiration'], 3, 2))
			{
				case "22":
				{
					++$datay[0];
					break;
				}
				case "23":
				{
					++$datay[1];
					break;
				}
				case "24":
				{
					++$datay[2];
					break;
				}
				case "25":
				{
					++$datay[3];
					break;
				}
			}

		$graph = new Graph(400,400,'auto');
		$graph->SetScale("textlin");

		$graph->yaxis->SetTickPositions(array(5,10,15,20,25,30), array(2.5,7.5,12.5,17.5,22.5,27.5));
		$graph->SetBox(false);

		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels(array('22','23','24','25'));
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		$b1plot = new BarPlot($datay);

		$graph->Add($b1plot);


		$b1plot->SetColor("white");
		$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
		$b1plot->SetWidth(45);
		$graph->title->Set("Expiration Distribution");

		$graph->Stroke('graph2.png');

		$watermark = imagecreatefrompng('watermark.png');
		$image = imagecreatefrompng('graph2.png');
		imagecopymerge($image, $watermark, (imagesx($image) - imagesx($watermark)) / 2, (imagesy($image) - imagesy($watermark)) / 2 - 10, 0, 0, imagesx($watermark), imagesy($watermark), 50);
		ClientsView::display($image);
		imagedestroy($image);
		unlink("graph2.png");
	}
}

ClientsController::control();
?>