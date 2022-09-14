<html lang="en">
<head>
<title>Сортач</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
$url = $_SERVER['REQUEST_URI'];
$i = 1;
for (; $url[$i] != '?'; ++$i);
++$i;
$A = array();
$l = 0;
$length = strlen($url);
for (; $i < $length; ++$i)
{
	if ($url[$i] == ',')
	{
		array_push($A, (int)(substr($url, $i-$l, $l)));
		$l = 0;
	}
		else
			++$l;
}
array_push($A, (int)(substr($url, $i-$l, $l)));
$size = count($A);
$min = PHP_INT_MAX;
$minin = 0;
for ($i = 0; $i < $size; ++$i)
{
	for ($j = $i; $j < $size; ++$j)
		if ($A[$j] <= $min)
		{	
			$min = $A[$j];
			$minin = $j;
		}
	$tmp = $A[$i];
	$A[$i] = $A[$minin];
	$A[$minin] = $tmp;
	$min = PHP_INT_MAX;
}
foreach($A as &$num)
	echo "{$num} ";
?>
</body>
</html>