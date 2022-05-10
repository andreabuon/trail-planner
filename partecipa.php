<!doctype html>
<html lang='it'>
<head>
	<title>Partecipa</title>
	<?php include 'php/head.php';?>
</head>
<body>
	<?php include 'php/navbar.php';?>
	<h1>Partecipa</h1>
	
	<?php
		if(isset($_SESSION['username'])){
			include "php/display_events.php";
		}
		else{
			echo "Per visualizzare questa pagina devi effettuare l'accesso.<br>";
			echo '<a href="accedi.php">Clicca qui per accedere</a>';
		}
	?>
</body>
</html>