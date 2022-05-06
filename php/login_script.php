<?php
	session_start();
	if(isset($_SESSION['username'])) {
		header('Location: ../index.php');
		return;
	}

	if(!(isset($_POST['login_button']))) {
		header('Location: ../index.php');
		return;
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	include 'database.php';
	$query = 'select * from utenti where username=$1 and password=$2';
	$result = pg_query_params($dbconn, $query, array($username, $password));

	if(pg_fetch_array($result, null, PGSQL_ASSOC)){
		session_start();
		$_SESSION['username'] = $username;
		echo '<a href="../index.php">Premi qui per procedere</a>';
		header('Location: ../index.php');
		
	}
	else{
		echo 'Errore: ';
		echo '<a href="../accedi.php">Premi qui per ritentare</a>';
	}

	pg_free_result($result);
	pg_close($dbconn);
?>