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
	if(!preg_match('/\A[A-Z0-9]{1,4}\Z/', $_POST['sigla'])){
        error_log('Errore: regex test sigla failed', 0);
		header('Location: ../carica.php?error=formato-sigla-errato');
		exit();
	}
	if(!preg_match("/\A[a-zA-Z0-9 ]{1,80}\Z/", $_POST['parco'])){
		error_log('Errore: regex test parco failed', 0);
        header('Location: ../carica.php?error=formato-parco-errato');
		exit();
	}
    //controllare altri inputs con regex!
    
    //sistemare! controllare esistenza file prima di fare upload
    $rel_path = NULL;
    
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $dir = "../uploads/";
        $park = basename($_POST['parco']);
        $name = basename($_POST['sigla']);
        $rel_path = $park . '/'. $name . '.geojson' ;
        $path = $dir . $rel_path;

        if (file_exists($path)) {
            header('Location: ../carica.php?error=File-esiste');
            exit();
        }
        
        if (!file_exists($dir.$park)) {
            mkdir($dir.$park, 0777, false);
        }

        $res = move_uploaded_file($_FILES['file']['tmp_name'], $path);
        if($res==false){
            header('Location: ../carica.php?error=Caricamento-File');
            exit();
        }
    }

    include '../php/database.php';
    $query = 'insert into sentieri values ($1, $2, $3, $4, $5, $6, $7, $8)';
    $array = array($_POST['sigla'], $_POST['nome'], $_POST['descrizione'], $_POST['lunghezza'], $_POST['dislivello'], $_POST['difficolta'], $_POST['parco'], $rel_path);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        if(isset($path)){
            unlink($path);
        }
        $_SESSION['last-error'] = pg_last_error();
        header('Location: ../carica.php?error=Errore-DB');
        exit();
	}
    header('Location: ../carica.php?upload=1');
    exit();
?>