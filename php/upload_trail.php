<?php    
    if(!(isset($_POST['submit']))){
        header('Location ../index.php');
    }
    
    //sistemare! controllare prima di fare upload

    $uploadfile = '';

    if(isset($_FILES['file'])){
        $uploaddir = "../uploads/";
        //VULNERABILE!!! SISTEMARE
        $uploadfile = $uploaddir . $_POST['parco'] . '-'. $_POST['sigla'] . '.json';//basename($_FILES['file']['name']);

        if(!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
            echo 'Errore: file non caricato\n';
            return;
        }
        echo "File valid and uploaded\n";
    }

    include '../php/database.php';
    $query = 'insert into sentieri values ($1, $2, $3, $4, $5, $6, $7, $8)';
    $array = array($_POST['sigla'], $_POST['nome'], $_POST['descrizione'], $_POST['lunghezza'], $_POST['dislivello'], $_POST['difficolta'], $_POST['parco'], $uploadfile);
    $data = pg_query_params($dbconn, $query, $array);

    if(!$data){
        echo 'Errore: ' . pg_last_error();
		echo '<a href="../carica.php">Premi qui per ritentare</a>';
        return;   
	}
    echo 'Sentiero caricato!\n';
	echo '<a href="../esplora.php">Premi qui per continuare.</a>';
?>