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
	<title>Report</title>
	<?php include 'head.php';?>
	<link href='css/report.css' rel='stylesheet'>
</head>

<body>
	<div class='noprint'>
		<?php 
			include 'navbar.php'; 
			include 'alerts.php';
		?>
	</div>
	<div id='report'>
		<h3>Report Escursione</h3>
		<div class='noprint'>
			<?php
			?>
			<button class='btn btn-outline-primary' onclick='window.print();'>Stampa</button>
			<button class='btn btn-outline-secondary' onclick='window.close();'>Chiudi</button>
			<a class='btn btn-outline-danger' href='api/delete_event.php?id=<?php echo $id;?>' onclick='return chiediConferma()'>Cancella Escursione</a>
		</div>
		<hr>
		<div id='info'>
			<h5>Escursione</h5>
			<?php
				$e = getEventById($id);
				echo "
					<ul class='list-group list-group-flush'>
					<li class='list-group-item'>Data: {$e['data']} </li>
					<li class='list-group-item'>Parco: {$e['sentiero_parco']} </li>
					<li class='list-group-item'>Sentiero: {$e['sentiero_sigla']}  <a class='btn btn-outline-primary noprint' target='_blank' href='trail.php?parco={$e['sentiero_parco']}&sigla={$e['sentiero_sigla']}'>Vedi Percorso</a></li>
					<li class='list-group-item'>Referente: {$e['organizzatore']} </li>
					<li class='list-group-item'>Note escursione: {$e['note']} </li>
					</ul>";
			?>
		</div>
		<hr>
		<h5>Elenco Prenotazioni</h5>
		<h6>aggiornato alle: 
			<?php 
				date_default_timezone_set("Europe/Rome");
				echo date("H:i") . ' del ' . date("d-m-Y");
			?> 
		</h6>
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
	</div>
</body>

<script>
	function chiediConferma(){
		return confirm("Sei sicuro?");
	}
</script>