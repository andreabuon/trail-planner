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
		<div class="row">
			<img src="assets/img/1.jpg" class="w-100">
		</div>
		<div class="row">
			<h5 class='text-center'>TrailPlanner</h5>
			<p class='text-center'>Organizza le tue escursioni con TrailPlanner.</p>
		</div>
		<div class='row d-flex'>
			<a class='btn btn-success col' href='esplora.php'>Esplora</a>
			<a class='btn btn-success col' href='partecipa.php'>Partecipa</a>
		</div>
	</div>
</body>
<script src='js/popper.min.js'></script>

</html>