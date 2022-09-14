<html lang="en">
<head>
<title>одмен</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<input id="com" onkeypress="call(event)">
<div class="res"></div>
</body>
<script>
function call(e)
{
	if (e.keyCode == 13)
	{
		$.ajax
		({
			method: "POST",
			url: "adminscript.php",
			data: { text: $("input:text").val() }
		}).done
		(function(response)
		{
			$("div.res").html(response);
		}
		);
		var input = document.getElementById("com");
		input.value = '';
	}
}
</script>
</html>