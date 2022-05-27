<!doctype html>
<html lang='it'>

<head>
	<title>Home</title>
	<link href='css/index.css' rel='stylesheet'>
	<?php include 'head.php';?>

</head>

<body>
	<?php 
		include 'navbar.php';
		include 'alerts.php';
	?>

	<div id='content' class='container-fluid'>
		<div class='card text-center'>
			<h1 class='card-title'>TrailPlanner</h1>
			<h4 class='card-subtitle'>Scopri nuovi percorsi e organizza le tue escursioni</h4>
			<div class='btn-wrapper'>
				<a class='btn btn-lg btn-success' href='esplora.php'>Esplora Percorsi</a>
				<a class='btn btn-lg btn-success' href='partecipa.php'>Prenota Escursioni</a>
			</div>
		</div>
	</div>
</body>
</html>