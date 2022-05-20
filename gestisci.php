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
				echo "<div class='card container-sm' id='card-{$escursione['id']}'>
						<h5 class='card-title'>Escursione: sentiero {$escursione['sentiero_sigla']} - {$escursione['data']}</h5>
						<div class='card-body'>";
				echo 'Partecipanti: ';
				//echo "<a class='btn btn-outline-info' onclick=''>Mostra Partecipanti</a>";
				echo '<div id=div_partecipanti>';
				$partecipanti = getEventReservations($escursione['id']);
				foreach($partecipanti as $p){
					//sistemare 
					echo $p['username'];
					echo ' ';
				}
				echo '</div>';
				echo "<a class='btn btn-outline-danger' href='api/delete_event.php?id={$escursione['id']}'>Cancella Escursione</a></div></div>";
			}
		?>
	</div>
</body>