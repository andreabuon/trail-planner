<?php
    session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../accedi.php?enforcelogin=1');
		exit();
	}
    if(!(isset($_POST['submit']))){
        header('Location: ../index.php?error=1');
        exit();
    }
    
    //sistemare! controllare esistenza file prima di fare upload

    $uploadfile = '../uploads/null';

    if(isset($_FILES['file'])){
        $uploaddir = "../uploads/";
        //
        // VULNERABILE!!! SISTEMARE
        $uploadfile = $uploaddir . $_POST['parco'] . '-'. $_POST['sigla'] . '.json';//basename($_FILES['file']['name']);

        if(!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
            error_log('Errore: move uploaded file', 0);
            header('Location: ../carica.php?error=1');
            exit();
        }
    }

    include '../php/database.php';
    $query = 'insert into sentieri values ($1, $2, $3, $4, $5, $6, $7, $8)';
    $array = array($_POST['sigla'], $_POST['nome'], $_POST['descrizione'], $_POST['lunghezza'], $_POST['dislivello'], $_POST['difficolta'], $_POST['parco'], $uploadfile);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        error_log('Errore:' . pg_last_error(), 0);
        header('Location ../carica.php?error=1');
        exit();
	}
    header('Location ../carica.php?upload=1');
    exit();
?>