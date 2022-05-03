<!doctype html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TrailPlanner: Partecipa</title>
</head>
<body>
	<?php
		include 'navbar.php';
	?>
	<h1>Partecipa</h1>
	
	<?php
		if(isset($_SESSION['username'])){
			echo 'ciao '.$_SESSION['username'];
			echo '<br>';
			include "display_events.php";
		}
		else{
			echo 'hey, devi accedere';
			echo "<a href='accedi.php'>clicca qui</a>";
		}
	?>
</body>
</html>