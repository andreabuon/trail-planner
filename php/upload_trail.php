<?php    
    if(!(isset($_POST['btn_submit']))){
        header('Location ../index.php');
    }
    
    include '../common/database.php';
    $query = 'insert into sentieri values ($1, $2, $3, $4, $5, $6, $7)';
    $array = array($_POST['form_sigla'], $_POST['form_nome'], $_POST['descrizione'], $_POST['form_lunghezza'], $_POST['form_dislivello'], $_POST['form_difficolta'], $_POST['form_parco']);
    $data = pg_query_params($dbconn, $query, $array);

    if($data){
		echo 'Sentiero caricato!';
		echo '<a href="../esplora.php">Premi qui per continuare.</a>';
	}
	else{
		echo 'Errore: ';
        echo '<br>';
        echo pg_last_error();
        echo '<br>';
		echo '<a href="../carica.php">Premi qui per ritentare</a>';
	}
?>