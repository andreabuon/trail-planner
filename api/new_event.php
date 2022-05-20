<?php    
    session_start();
    if(!(isset($_SESSION['username']))){
        header('Location: ../accedi.php?enforcelogin=1');
        exit();
    }
    if(!(isset($_POST['btn_submit']))){
        header('Location: ../organizza.php?error=1');
        exit();
    }
    require_once 'database.php';
    $dbconn = Database::connect();
    $query = 'INSERT INTO escursioni ("sentiero_parco", "sentiero_sigla", "data", "organizzatore", "note") VALUES ($1,$2,$3,$4,$5)';
    $array = array($_POST['parco'], $_POST['sigla'], $_POST['data'], $_SESSION['username'], $_POST['note']);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        $_SESSION['last-error'] = 'Errore DB';
        header('Location: ../organizza.php?error=1');
        exit();
	}
    header('Location: ../organizza.php?upload=1');
    exit();
?>