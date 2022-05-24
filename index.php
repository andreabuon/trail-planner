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

	<div id='content container'>
		<div id='sfondo'>
			<img src="assets/img/1.jpg" class="d-block w-100">
			<div class="centered">
				<h5 class='text-center'>TrailPlanner</h5>
				<p class='text-center'>Organizza le tue escursioni con TrailPlanner.</p>
				<div class='d-flex flex-row justify-content-evenly'>
					<a class='btn btn-success' href='esplora.php'>Esplora</a>
					<a class='btn btn-success' href='partecipa.php'>Partecipa</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script src='js/popper.min.js'></script>

</html>