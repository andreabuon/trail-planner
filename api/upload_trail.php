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
		header('Location: ../carica.php?error=formato-sigla-errato');
		exit();
	}
	if(!preg_match("/\A[a-zA-Z0-9 ]{1,80}\Z/", $_POST['parco'])){
        header('Location: ../carica.php?error=formato-parco-errato');
		exit();
	}
    //controllare altri inputs con regex! %%
    
    
    $rel_path = NULL;
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $dir = "../uploads/";
        $park = basename($_POST['parco']);
        $name = basename($_POST['sigla']);
        $rel_path = $park . '/'. $name . '.geojson' ;
        $path = $dir . $rel_path;

        if (file_exists($path)) {
            $_SESSION['last_error'] = "File già presente nel sistema";
            header('Location: ../carica.php?error=1');
            exit();
        }
        
        if (!file_exists($dir.$park)) {
            mkdir($dir.$park, 0777, false);
        }

        $res = move_uploaded_file($_FILES['file']['tmp_name'], $path);
        if($res==false){
            $_SESSION['last_error'] = "Errore Caricamento File";
            header('Location: ../carica.php?error=1');
            exit();
        }
    }

    require_once 'database.php';
    $dbconn = Database::connect();
    $query = 'INSERT INTO sentieri VALUES ($1, $2, $3, $4, $5, $6, $7, $8)';
    $array = array($_POST['sigla'], $_POST['nome'], $_POST['descrizione'], $_POST['lunghezza'], $_POST['dislivello'], $_POST['difficolta'], $_POST['parco'], $rel_path);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        //se è stato caricato il file ma l'inserimento nel db è fallito, elimina il file
        if(isset($path)){
            unlink($path);
        }
        $_SESSION['last_error'] = 'Errore DB';
        header('Location: ../carica.php?error=1');
        exit();
	}
    header('Location: ../carica.php?upload=1');
    exit();
?>