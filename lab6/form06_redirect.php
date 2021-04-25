<?php session_start(); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
	$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
	if (!$link) {
		$_SESSION["err"] = "Brak połączenia z bazą";
		header("Location: form06_post.php");
	}
	
	if(isset($_POST['id_prac']) && is_numeric($_POST['id_prac']) && is_string($_POST['nazwisko']))
	{
		$sql = "INSERT INTO pracownicy(id_prac, nazwisko) VALUES(?, ?)";
		$stmt = $link->prepare($sql);
		$stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
		$result = $stmt->execute();
		if (!$result) {
			$_SESSION["err"] = "Nie udało się wstawić";
			header("Location: form06_post.php");
		}
		else {
			$_SESSION["ready"] = "Zakonczono sukcesem";
			header("Location: form06_get.php");
		}
		$stmt->close();
	}
	else 
	{
		$_SESSION["err"] = "Brak poprawnych danych";
		header("Location: form06_post.php");
	}
?>
</body>
</html>