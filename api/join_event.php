<?php
    session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../accedi.php?enforcelogin=1');
		exit();
	}

	require_once 'database.php';
	$dbconn = Database::connect();
    $query = 'INSERT INTO partecipa VALUES ($1, $2)';
    $array = array($_SESSION['username'], $_GET['escursione']);
    $res = pg_query_params($dbconn, $query, $array);
    if(!$res){
		$_SESSION['last_error'] = 'Errore DB';
		header('Location: ../partecipa.php?error=1');
        exit();
	}
	header('Location: ../partecipa.php?success=1');
    exit();
?>


