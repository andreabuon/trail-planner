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

	if(!preg_match('/\A[0-9a-zA-Z]{1,25}\z/', $username)){
		header('Location: ../registrati.php?error=Formato-username-errato');
		exit();
	}
	if(!preg_match('/\A.{3,25}\z/', $password)){
		header('Location: ../registrati.php?error=Formato-password-errato');
		exit();
	}

	require_once 'database.php';
	$dbconn = Database::connect();
	$query = 'INSERT INTO utenti VALUES ($1, $2)';
	$data = pg_query_params($dbconn, $query, array($username, password_hash($password, PASSWORD_DEFAULT)));
	
	if(!$data){
		$_SESSION['last-error'] = 'Nome utente già registrato.';
		header('Location: ../registrati.php?error=2');
		exit();
	}
	header('Location: ../accedi.php?signup=1');
	exit();
?>