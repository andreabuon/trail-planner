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
		header('Location: ../accedi.php?error=1');
		exit();
	}

	require_once 'database.php';
	$dbconn = Database::connect();
	$query = 'SELECT * FROM utenti WHERE username=$1 AND password=$2';
	$result = pg_query_params($dbconn, $query, array($username, $password));

	if(pg_fetch_array($result, null, PGSQL_ASSOC)){
		$_SESSION['username'] = $username;
		header('Location: ../index.php?login=1');
		exit();
	}
	else{
		$_SESSION['last-error'] = pg_last_error();
		header('Location: ../accedi.php?error=1');
		exit();
	}
	pg_free_result($result);
	pg_close($dbconn);
?>