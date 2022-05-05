<!doctype html>
<html lang='it'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>TrailPlanner: Partecipa</title>
</head>
<body>
	<?php
		include 'navbar.php';
	?>
	<h1>Partecipa</h1>
	
	<?php
		if(isset($_SESSION['username'])){
			echo 'Benvenuto '.$_SESSION['username'];
			echo '<br>';
			include "display_events.php";
		}
		else{
			echo "Per visualizzare questa pagina devi effettuare l'accesso.<br>";
			echo '<a href="accedi.php">Clicca qui per accedere</a>';
		}
	?>
</body>
</html>