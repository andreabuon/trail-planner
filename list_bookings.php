<?php
	session_start();
	if(!isset($_SESSION['username'])){
	header('Location: accedi.php?enforcelogin=1');
		exit();
	}

	if(!isset($_GET['id'])){
		header('Location: index.php?error=1');
		exit();
	}
	require_once 'api/get_data.php';
	$id = $_GET['id'];
	$organizzatore = getOrganizerByEvent($id);

	if($_SESSION['username'] != $organizzatore){
		$_SESSION['last_error'] = 'Errore o Permessi insufficienti';
		header('Location: index.php?error=1');
		exit();
	}
?>

<!doctype html>
<html lang='it'>

<head>
	<title>Resoconto Escursione</title>
	<?php include 'head.php';?>

</head>

<style>
	body{
		display: flex;
		flex-direction: column;
		justify-content: space-evenly;
		gap: 1em;
		padding: 1em;
	}
	@media print {
  		.noprint{
			display: none;
		}
  	}
</style>

<body>
	<h3>Resoconto Escursione</h3>
	<h5>aggiornato alle: 
		<?php 
			date_default_timezone_set("Europe/Rome");
			echo date("H:i") . ' del ' . date("d-m-Y");
		?> 
	</h5>

	<div id='info'>
	  	<h5>Escursione</h5>
	 	<?php
			$info_escursione = getEventById($id);
	  		echo "
				<ul class='list-group list-group-flush'>
				<li class='list-group-item'>Data: {$info_escursione['data']} </li>
				<li class='list-group-item'>Parco: {$info_escursione['sentiero_parco']} </li>
				<li class='list-group-item'>Sentiero: {$info_escursione['sentiero_sigla']} </li>
				<li class='list-group-item'>Referente: {$info_escursione['organizzatore']} </li>
				<li class='list-group-item'>Note escursione: {$info_escursione['note']} </li>
				</ul>";
		?>
	</div>

	<h5>Elenco Prenotazioni</h5>
	<?php
		$prenotati = getEventReservations($id);
		if(!$prenotati){
			echo 'Nessuna prenotazione trovata.';
			exit();
		}
		echo count($prenotati) . " prenotazioni <br>";
	?>
	<table class='table table-striped'>
		<tr>
			<th class='col'>Username</th>
			<th class='col'>Cellulare</th>
		</tr>
		<?php
			foreach($prenotati as $utente){
				echo	"<tr>
							<td>{$utente['username']}</td>
							<td>{$utente['mobile']}</td>
						</tr>";
			}
		?>
	</table>

	<div class='noprint'>
		<button class='btn btn-primary' onclick='window.print();'>Stampa</button>
	</div>

</body>