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
	
	<div id='content container-md'>
		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
			  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<img src="assets/img/1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
				  <h5>TrailPlanner</h5>
				  <p>Organizza le tue escursioni con TrailPlanner.</p>
				</div>
			  </div>
			  <div class="carousel-item">
				<img src="assets/img/2.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>TrailPlanner</h5>
				  <p>Organizza le tue escursioni con TrailPlanner.</p>
				</div>
			  </div>
			  <div class="carousel-item">
				<img src="assets/img/3.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>TrailPlanner</h5>
				  <p>Organizza le tue escursioni con TrailPlanner.</p>
				</div>
			  </div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Next</span>
			</button>
		</div>
		<!--
		<div class="d-inline-flex justify-content-evenly flex-row">			
			<a class='btn-lg btn-info' href='esplora.php'>Esplora</button>
			<a class='btn-lg btn-success' href='partecipa.php'>Partecipa</button>
		</div>
		-->
	</div>
</body>
<script src='js/popper.min.js'></script>

</html>