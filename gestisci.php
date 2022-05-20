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

			if(!$escursioni){
				echo 'Nessun evento trovato';
				exit();
			}

			foreach($escursioni as $escursione){
				//sistemare
				$string = "<div class='card container-sm' id='card-{$escursione['id']}'>
						<h5 class='card-title'>Escursione: sentiero {$escursione['sentiero_sigla']} - {$escursione['data']}</h5>
						<div class='card-body'> Partecipanti: <div id='div_partecipanti'>";
				//echo "<a class='btn btn-outline-info' onclick=''>Mostra Partecipanti</a>";
				$partecipanti = getEventReservations($escursione['id']);
				foreach($partecipanti as $p){
					//sistemare 
					$string .= $p['username'] . ' ';
				}
				$string .= "</div><a class='btn btn-outline-danger' href='api/delete_event.php?id={$escursione['id']}'>Cancella Escursione</a></div></div>";
				echo $string;
			}
		?>
	</div>
</body>