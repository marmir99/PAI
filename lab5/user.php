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
		echo "Zalogowano <br>";
		if (!isset($_SESSION["zalogowany"]) or $_SESSION["zalogowany"] != 1)
		{
			header("Location: index1.php");
		}
		echo "Zalogowany/a " . $_SESSION["zalogowanyImie"] . "<br>" ;
	?>
	<form action="index1.php" method="post">
		<fieldset>
			<legend>Wyloguj</legend>
			<input type="submit" value="Wyloguj" name="wyloguj" >
		</fieldset>	
	</form>
	
	<form action="user.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Upload plikow</legend>
			<input name="myfile" type="file">
			<input type="submit" value="Przeslij" name="przeslij"/>
		</fieldset>
	</form>
	
	<?php
		if (isSet($_POST["przeslij"]))
		{
			$currentDir = getcwd();
			$uploadDirectory = "\\zdjeciaUzytkownikow\\";
			$fileName = $_FILES["myfile"]["name"];
			$fileSize= $_FILES["myfile"]["size"];
			$fileTmpName = $_FILES["myfile"]["tmp_name"];
			$fileType = $_FILES["myfile"]["type"];
			if ($fileName != "" and
				($fileType == "image/png" or $fileType == "image/jpeg"
				or $fileType == "image/JPEG" or $fileType == "image/PNG"))
				{
					$uploadPath = $currentDir . $uploadDirectory . $fileName;
					if (move_uploaded_file($fileTmpName, $uploadPath))
						echo "Zdjecie zostalo zaladowane na serwer FTP<br>";
				}
		}
	?>
	
	<img src="zdjeciaUzytkownikow\photo.jpg" alt="tu powinien byc obrazek">
	<a href="index1.php">Index</a>
	</body>
</html>