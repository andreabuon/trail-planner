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
	<h1>Gestisci Escursioni</h1>
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
									<ul class='list-group list-group-flush'>
										<li class='list-group-item'>Data: {$escursione['data']}</li>
									</ul>
									<div class='card-btns'>
										<ul class='list-group list-group-flush'>
											<a class='btn btn-outline-info' href='report.php?id={$escursione['id']}' target='_blank'>Resoconto</a>
										</ul>
										<ul class='list-group list-group-flush'>
											<a class='btn btn-outline-danger btn-delete' href='api/delete_event.php?id={$escursione['id']}' onclick='return chiediConferma()'>Cancella Escursione</a>
										</ul>
									</div>
								</div>
							</div>
							";
				echo $string;
			}
		?>
	</div>
</body>

<script>
	function chiediConferma(){
		return confirm("Sei sicuro?");
	}
</script>