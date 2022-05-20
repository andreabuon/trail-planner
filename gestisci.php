<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: index.php?enforcelogin=1');
		exit();
	}
?>
<!doctype html>
<html lang="it">
<head>
	<title>Gestisci Escursioni</title>
	<?php include 'head.php'; ?>
	<link href='css/gestisci.css' rel='stylesheet'>
</head>
<body>
	<?php 
		include 'navbar.php'; 
		include 'alerts.php';
	?>

	<div id='div_events'>
		<?php 
			require_once 'api/get_data.php';
			$escursioni = getEventsByOrganizer($_SESSION['username']);
			foreach($escursioni as $escursione){
				//sistemare
				$partecipanti = getEventReservations($escursione['id']);
				foreach($partecipanti as $p){
					//sistemare 
				}
			}
		?>
	</div>
</body>