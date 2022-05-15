<?php
    session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../accedi.php?enforcelogin=1');
		exit();
	}

	include '../php/database.php';
    $query = 'DELETE FROM partecipa WHERE username=$1 AND escursione=$2';
    $array = array($_SESSION['username'], $_GET['escursione']);
    $res = pg_query_params($dbconn, $query, $array);
    if(!$res){
		$_SESSION['last_error'] = pg_last_error();
		header('Location: ../partecipa.php?error=1');
        exit();
	}
	header('Location: ../partecipa.php?success=1');
    exit();
?>


