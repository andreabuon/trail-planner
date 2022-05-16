<!doctype html>
<html lang='it'>
<head>
	<title>Partecipa</title>
	<?php 
		include 'head.php';
	?>
</head>
<body>
	<?php 
		include 'navbar.php';
		include 'alerts.php';
	?>
	<h1>Partecipa</h1>
	<div class='container' id='div_events'>
	<?php
		include 'api/get_data.php';
		$elencoEscursioni = getEvents();
		foreach($elencoEscursioni as $e){
			echo $e;
		}
	?>
	</div>
</body>
</html>