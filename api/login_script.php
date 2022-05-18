<?php
	session_start();
	if(isset($_SESSION['username'])) {
		header('Location: ../index.php?logged=1');
		exit();
	}

	if(!(isset($_POST['login_button']))) {
		header('Location: ../index.php');
		exit();
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$match = preg_match('/\A[0-9a-zA-Z]{1,25}\z/', $username);
	if(!$match | $match==false){
		$_SESSION['last_error'] = 'Formato username errato';
		header('Location: ../accedi.php?error=1');
		exit();
	}

	require_once 'database.php';
	$dbconn = Database::connect();
	$query = 'SELECT password FROM utenti WHERE username=$1';
	$result = pg_query_params($dbconn, $query, array($username));
	$hashed_password = pg_fetch_row($result, null, PGSQL_ASSOC);

	if(!$hashed_password){
		$_SESSION['last-error'] = 'Username inesistente';
		header('Location: ../accedi.php?error=1');
		exit();
	}
	if(password_verify($password, $hashed_password['password'])){
		$_SESSION['username'] = $username;
		header('Location: ../index.php?login=1');
		exit();
	}
	else{
		$_SESSION['last-error'] = 'Username/Password errati';
		header('Location: ../accedi.php?error=1');
		exit();
	}
?>