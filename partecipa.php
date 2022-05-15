<!doctype html>
<html lang='it'>
<head>
	<title>Partecipa</title>
	<?php 
		include 'php/head.php';
	?>
	<!-- <script src='js/events.js'></script> -->
</head>
<body>
	<?php 
		include 'php/navbar.php';
		include 'php/alerts.php';
	?>
	<h1>Partecipa</h1>
	<div class='container' id='div_events'>
		<?php 
			include 'php/get_events.php';
		?>
	</div>
	<?php 
		include 'html/event.html';
	?>
</body>
</html>