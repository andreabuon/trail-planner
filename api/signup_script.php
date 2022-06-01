<?php
	session_start();
	if(isset($_SESSION['username'])) {
		header('Location: ../index.php?logged=1');
		exit();
	}
	if(!(isset($_POST['signup_button']))) {
		header('Location: ../index.php?error=1');
		exit();
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];

	if(!preg_match('/\A[0-9a-zA-Z]{1,25}\z/', $username)){
		header('Location: ../registrati.php?error=Formato-username-errato');
		exit();
	}
	if(!preg_match('/\A.{3,25}\z/', $password)){
		header('Location: ../registrati.php?error=Formato-password-errato');
		exit();
	}

	if(!preg_match('/\A[0-9]{1,25}\z/', $mobile)){
		header('Location: ../registrati.php?error=Formato-cellulare-errato');
		exit();
	}

	require_once 'database.php';
	$dbconn = Database::connect();
	$query = 'INSERT INTO utenti VALUES ($1, $2, $3)';
	$data = pg_query_params($dbconn, $query, array($username, password_hash($password, PASSWORD_DEFAULT), $mobile));
	
	if(!$data){
		$_SESSION['last_error'] = 'Nome utente già registrato.';
		header('Location: ../registrati.php?error=1');
		exit();
	}
	header('Location: ../accedi.php?signup=1');
	exit();
?>