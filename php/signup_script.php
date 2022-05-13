<?php
	session_start();
	if(isset($_SESSION['username'])) {
		header('Location: ../index.php');
		exit();
	}
	if(!(isset($_POST['signup_button']))) {
		header('Location: ../index.php');
		exit();
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$match = preg_match('/\A[0-9a-zA-Z]{1,25}\z/', $username);
	if(!$match | $match==false){
		header('Location: ../registrati.php?error=1');
		exit();
	}
	$match = preg_match('/\A.{3,25}\z/', $password);
	if(!$match | $match==false){
		header('Location: ../registrati.php?error=1');
		exit();
	}

	include 'database.php';
	$query = 'insert into utenti values ($1, $2)';
	$data = pg_query_params($dbconn, $query, array($username, $password));
	
	if(!$data){
		header('Location: ../registrati.php?error=1');
		exit();
	}
	header('Location: ../accedi.php?signup=1');
	exit();
?>