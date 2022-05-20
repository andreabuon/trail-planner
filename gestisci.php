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
	<link href='css/form.css' rel='stylesheet'>
</head>
<body>
	<?php 
		include 'navbar.php'; 
		include 'alerts.php';
	?>

	<div class='container-fluid d-flex flex-row bg-light justify-content-between align-self-center'>
		<?php 
			require 'api/get_data.php';
			$escursioni = getEventsByOrganizer($_SESSION['username']);
			foreach($escursioni as $escursione){
				echo '<div class="align-text-center">';
				echo '<br>ESCURSIONE ' . $escursione['data'] . '<br>';
				echo $escursione['sentiero_parco'] . ': '. $escursione['sentiero_sigla'];
				echo '<br>';
				echo '<br>PARTECIPANTI:<br>';
				$partecipanti = getEventReservations($escursione['id']);
				foreach($partecipanti as $p){
					echo $p['username'];
					echo '<br>';
				}
				echo '<button class="btn btn-info" onclick="print();">Stampa</button>';
				echo '</div>';
			}
		?>
	</div>
</body>