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
	$escursione = $_GET['id'];
	$organizzatore = getOrganizerByEvent($escursione);

	if($_SESSION['username'] != $organizzatore){
		$_SESSION['last_error'] = 'Permessi insufficienti';
		header('Location: index.php?error=1');
		exit();
	}
?>

<!doctype html>
<html lang='it'>

<head>
	<title>Elenco Partecipanti</title>
	<?php include 'head.php';?>

</head>
<style>
	table, th, td {
		border:1px solid black;
	}
	@media print {
  		button {
    		display: none;
		}
  	}
</style>
<body>
<?php
	echo '<button class="btn btn-primary" onclick="window.print();">Stampa</button><br>';
	echo "Elenco Prenotati Escursione. Trovate ";

	$prenotati = getEventReservations($escursione);
	if(!$prenotati){
		echo 'Nessuna prenotazione trovata.';
		exit();
	}
	//print_r($prenotati);
	echo count($prenotati) . " prenotazioni <br>";
	echo '<table>';
	echo '<tr><th>Username</th></tr>';
	foreach($prenotati as $utente){
		echo "<tr><td>$utente</td></tr>";
	}
	echo '</table>';

?>

</body>