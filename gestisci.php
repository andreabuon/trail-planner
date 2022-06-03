<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: accedi.php?enforcelogin=1');
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
	<div id='top-bar'>
		<h1>Gestione Escursioni</h1>
		<a class='btn btn-lg btn-outline-primary me-auto' href='organizza.php'> + Organizza Escursione</a>
	</div>
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
				$string =  "
							<div class='card' id='card-{$escursione['id']}'>
								<div class='card-body'>
									<h5>Data: {$escursione['data']}</h5>
									<h5 class='card-title'>Sentiero: {$escursione['sentiero_sigla']}</h5>
									<h6 class='card-subtitle text-muted'> {$escursione['sentiero_parco']}</h6>
									
								</div>
								<a class='btn btn-outline-info stretched-link' href='report.php?id={$escursione['id']}' target='_blank'>Seleziona</a>
							</div>
							";
				echo $string;
			}
		?>
	</div>
</body>
</html>