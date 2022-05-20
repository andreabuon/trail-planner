<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../accedi.php?enforcelogin=1');
		exit();
	}
	require_once 'database.php';
	$dbconn = Database::connect();
    $query = 'SELECT * FROM escursioni WHERE id=$1';
    $array = array($_GET['id']);
    $res = pg_query_params($dbconn, $query, $array);
    if(!$res){
		$_SESSION['last_error'] = 'Errore DB';
		header('Location: ../gestisci.php?error=1');
        exit();
	}
	$escursione = pg_fetch_array($res);
	if(!$escursione){
		$_SESSION['last_error'] = 'Evento non trovato';
		header('Location: ../gestisci.php?error=1');
		exit();
	}
	
	if($_SESSION['username'] != $escursione['organizzatore']){
		$_SESSION['last_error'] = 'Azione non consentita';
		header('Location: ../gestisci.php?error=1');
		exit();
	}

	$query = 'DELETE FROM escursioni WHERE id=$1';
    $array = array($_GET['id']);
	$res = pg_query_params($dbconn, $query, $array);
	if(!$res){
		$_SESSION['last_error'] = 'Errore DB';
		header('Location: ../gestisci.php?error=1');
        exit();
	}

	header('Location: ../gestisci.php?success=1');
    exit();
?>