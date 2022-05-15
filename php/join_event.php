<?php
    session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../accedi.php?enforcelogin=1');
		exit();
	}

	include '../php/database.php';
    $query = 'insert into partecipa values ($1, $2, $3, $4, $5)';
	//aggiungere id a tabella escursione
    $array = array($_SESSION['username'], $_POST['parco'], $_POST['sigla'], $_POST['data'], $_POST['organizzatore'],);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
		header('Location: ../partecipa.php?error=1');
        exit();
	}
	header('Location: ../partecipa.php?success=1');
    exit();
?>


