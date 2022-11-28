<?php
require_once('jpgraph/src/jpgraph.php');
require_once('jpgraph/src/jpgraph_scatter.php');

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
		return(ClientsModel::domain()->query("SELECT id, cvc FROM Clients"));
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
		$datax = array();
		$datay = array();

		$i = 0;
		$result = ClientsModel::R();
		foreach ($result as $row)
		{
			$datax[$i] = $row['id'];
			$datay[$i] = $row['cvc'];
			++$i;
		} 

		$graph = new Graph(400,400);
		$graph->SetScale("linlin");
		 
		$graph->img->SetMargin(40,40,40,40);        
		$graph->SetShadow();
		 
		$graph->title->Set("f(id) = CVC");
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		 
		$sp1 = new ScatterPlot($datay,$datax);
		 
		$graph->Add($sp1);
		$graph->Stroke("graph1.png");

		$watermark = imagecreatefrompng('watermark.png');
		$image = imagecreatefrompng('graph1.png');
		imagecopymerge($image, $watermark, (imagesx($image) - imagesx($watermark)) / 2, (imagesy($image) - imagesy($watermark)) / 2 - 10, 0, 0, imagesx($watermark), imagesy($watermark), 50);
		ClientsView::display($image);
		imagedestroy($image);
		unlink("graph1.png");
	}
}

ClientsController::control();
?>