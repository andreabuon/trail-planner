<?php
	if(!(isset($_POST['signup_button']))) {
		header('Location: ./index.php');
		exit;
	}
	
	/*
	$err |= !isset($_POST['username']);
	$err |= !isset($_POST['password']);
	if($err){
		header('Location: ./index.php');
		exit;
	}
	*/

	$username = $_POST['username'];
	$password = $_POST['password'];

	//DA SISTEMARE
	//controllo se esiste già
	
	include 'database.php';
	$query = 'insert into utenti values ($1, $2)';
	$data = pg_query_params($dbconn, $query, array($username, $password));

	if($data){
		echo 'Ti sei registrato!';
		echo '<a href=./accedi.php>Premi qui per accedere.</a>';
	}
	else{
		echo 'Errore';
		echo '<a href=./registrati.php>Premi qui per ritentare</a>';
	}

?>