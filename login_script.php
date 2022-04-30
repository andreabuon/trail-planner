<?php
	if(!(isset($_POST['login_button']))) {
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
	
	include 'database.php';
	$query = 'select * from utenti where username=$1 and password=$2';
	$result = pg_query_params($dbconn, $query, array($username, $password));

	if(pg_fetch_array($result, null, PGSQL_ASSOC)){
		session_start();
		$_SESSION['username'] = $username;
		echo '<a href=./partecipa.php>Premi qui</a>';
	}
	else{
		echo 'Errore';
		echo '<a href=./accedi.php>Premi qui per ritentare</a>';
	}

?>