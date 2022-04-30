<!doctype html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TrailPlanner</title>
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php
		include 'navbar.php';
	?>
	<h1>Partecipa</h1>
	<script src="js/bootstrap.bundle.min.js"></script>
	
	<?php
		if(isset($_SESSION['username'])){
			echo 'sei loggato';
		}
		else{
			echo 'hey, devi accedere';
		}
	?>
</body>
</html>