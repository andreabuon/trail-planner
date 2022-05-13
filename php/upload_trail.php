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
    $match = preg_match('/\A[A-Z0-9]{1,4}\z/', $_POST['sigla']);
	if(!$match | $match==false){
		header('Location: ../carica.php?error=1');
		exit();
	}
    /*
    $match = preg_match('/\A[a-zA-Z']{1,80}\z/', $_POST['parco']);
	if(!$match | $match==false){
		header('Location: ../carica.php?error=1');
		exit();
	}
    */
    //controllare inputs con regex!
    
    //sistemare! controllare esistenza file prima di fare upload

    $uploadfile = NULL;
    
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $uploaddir = "../uploads/";
        $park = basename($_POST['parco']);
        $dir = $uploaddir . '/'. $park;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, false);
        }

        // VULNERABILE!!! SISTEMARE
        $uploadfile = $uploaddir . $park . '/'. basename($_POST['sigla']) . '.json'; //basename($_FILES['file']['name']);

        $res = move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

        if($res==false){
            error_log('Errore caricamento file: '.$res, 0);
            header('Location: ../carica.php?error=Caricamento file');
            exit();
        }
    }

    include '../php/database.php';
    $query = 'insert into sentieri values ($1, $2, $3, $4, $5, $6, $7, $8)';
    $array = array($_POST['sigla'], $_POST['nome'], $_POST['descrizione'], $_POST['lunghezza'], $_POST['dislivello'], $_POST['difficolta'], $_POST['parco'], $uploadfile);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        error_log('Errore:' . pg_last_error(), 0);
        header('Location: ../carica.php?error=1');
        exit();
	}
    header('Location: ../carica.php?upload=1');
    exit();
?>