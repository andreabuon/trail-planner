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
	<h1>Gestione Escursioni</h1>
	<h5>Selezione Escursione</h5>
	<a class='btn btn-lg btn-outline-primary' href='organizza.php'> + Organizza Escursione</a>
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
									<h5 class='card-title'>Sentiero: {$escursione['sentiero_sigla']}</h5>
									<h6 class='card-subtitle text-muted'> {$escursione['sentiero_parco']}</h6>
									<h5>{$escursione['data']}</h5>
								</div>
								<a class='btn btn-outline-info' href='report.php?id={$escursione['id']}' target='_blank'>Seleziona</a>
							</div>
							";
				echo $string;
			}
		?>
	</div>
</body>