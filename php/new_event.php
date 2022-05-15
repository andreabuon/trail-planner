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
    include 'database.php';
    $query = 'insert into escursioni ("sentiero_parco", "sentiero_sigla", "data", "organizzatore", "note") values ($1,$2,$3,$4,$5)';
    $array = array($_POST['parco'], $_POST['sigla'], $_POST['data'], $_SESSION['username'], $_POST['note']);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        $_SESSION['last-error'] = pg_last_error();
        header('Location: ../organizza.php?error=1');
        exit();
	}
    header('Location: ../organizza.php?upload=1');
    exit();
?>