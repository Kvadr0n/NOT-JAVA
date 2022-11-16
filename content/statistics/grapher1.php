<?php
require_once('jpgraph/src/jpgraph.php');
require_once('jpgraph/src/jpgraph_scatter.php');

$datax = array();
$datay = array();

$i = 0;
$mysqli = new mysqli("mysql", "admin", "Franklin5", "fixtures");
$result = $mysqli->query("SELECT id, cvc FROM Clients");
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
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
unlink("graph1.png");
?>