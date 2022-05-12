<?php
	session_start();
	if(!(isset($_POST['signup_button']))) {
		header('Location: ../index.php');
		return;
	}

	if(isset($_SESSION['username'])) {
		header('Location: ../index.php');
		return;
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!preg_match('[0-9a-zA-Z]+', $username)){
		header('Location: ../registrati.php');
		return;
	}
	
	include 'database.php';
	$query = 'insert into utenti values ($1, $2)';
	$data = pg_query_params($dbconn, $query, array($username, $password));
	
	if($data){
		echo 'Ti sei registrato!';
		echo '<a href="../accedi.php">Premi qui per accedere.</a>';
	}
	else{
		echo 'Errore';
		echo '<a href="../registrati.php">Premi qui per ritentare</a>';
	}

?>