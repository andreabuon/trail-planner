<!doctype html>
<html lang='it'>
<head>
	<title>Partecipa</title>
	<?php 
		include 'head.php';
	?>
	<link href='css/partecipa.css' rel='stylesheet'>
</head>
<body>
	<?php 
		include 'navbar.php';
		include 'alerts.php';
	?>
	<div id='div_events'>
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