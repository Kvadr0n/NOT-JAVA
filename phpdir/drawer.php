<html lang="en">
<head>
<title>Рисовач</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
if ($_GET["num"] == 0)
	echo "<div style='background-color: red; height: 250px; width: 250px'></div>";
		elseif ($_GET["num"] == 1)
			echo "<div style='background-color: green; height: 250px; width: 500px'></div>";
				else 
					echo "<div style='background-color: blue; height: 250px; width: 250px; border-radius: 125px'></div>";
?>
</body>
</html>