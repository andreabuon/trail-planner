<?php    
    session_start();
    if(!(isset($_SESSION['username']))){
        header('Location: ../accedi.php?enforcelogin=1');
        exit();
    }
    if(!(isset($_POST['submit']))){
        header('Location: ../index.php?error=1');
        exit();
    }

	require_once 'database.php';
    $dbconn = Database::connect();
    $query = 'INSERT INTO commenti ("parco", "sigla", "username", "testo") VALUES ($1,$2,$3,$4)';
    $array = array($_POST['parco'], $_POST['sigla'], $_SESSION['username'], $_POST['testo']);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        $_SESSION['last_error'] = 'Errore DB';
        header('Location: ../index.php?error=1');
        exit();
	}
    header('Location: ../index.php?upload=1');
    exit();
?>