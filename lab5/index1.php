<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP</title>
		<meta charset='UTF-8' />
	</head>
	<body>
		<?php
			require("funkcje.php");
			echo "<h1> Nasz system </h1>" ;
			if (isSet($_POST["wyloguj"]))
			{
				$_SESSION["zalogowany"] = 0;
			}
		?>
		<form action="logowanie.php" method="post">
			<fieldset>
				<legend>Dane logowania:</legend>
				Login: <input type="text" name="login"> <br>
				Haslo: <input type="password" name="haslo"> <br>
				<input type="submit" value="Zaloguj" name="zaloguj" >
			</fieldset>
		</form>
		<form action="cookie.php" method="get">
			<fieldset>
				<legend>Tworzenie cookie:</legend>
				Czas: <input type="number" name="czas"> <br>
				<input type="submit" value="utworz cookie" name="utworzCookie" >
			</fieldset>
		</form>
		<a href="user.php">User</a>
			
		<?php
			if (isSet($_COOKIE["cookie"]))
			{
				echo "Ciasteczko " . $_COOKIE["cookie"] . "<br>";
			}
			else 
			{
				echo "Nie ma ciasteczka";
			}
		?>
	</body>
</html>