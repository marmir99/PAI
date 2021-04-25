<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP</title>
		<meta charset='UTF-8' />
	</head>
	<body>
	<?php 
		require_once("funkcje.php");
		echo "zalogowano <br>";
		
		if (isSet($_GET["utworzCookie"]) and isset($_GET["czas"]))
		{
			$czas = $_GET["czas"];
			setcookie("cookie", "mniam", time() + $czas, "/");
			echo "Cookie utworzone <br>";
			echo "<a href=\"index1.php\">Wstecz</a><br>";
		}
	?>
	</body>
</html>