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
			<h4 class='card-subtitle'>Organizza le tue escursioni con noi</h4>
			<div class='btn-wrapper'>
				<a class='btn btn-lg btn-outline-success' href='esplora.php'>Esplora Percorsi</a>
				<a class='btn btn-lg btn-outline-success' href='partecipa.php'>Prenota Escursioni</a>
			</div>
		</div>
	</div>
</body>
</html>