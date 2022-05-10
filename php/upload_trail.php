<?php    
    if(!(isset($_POST['submit']))){
        header('Location ../index.php');
    }
    
    include '../php/database.php';
    echo $_POST['file'];
    $query = 'insert into sentieri values ($1, $2, $3, $4, $5, $6, $7, $8)';
    $array = array($_POST['sigla'], $_POST['nome'], $_POST['descrizione'], $_POST['lunghezza'], $_POST['dislivello'], $_POST['difficolta'], $_POST['parco'], $_POST['file']);
    $data = pg_query_params($dbconn, $query, $array);

    if($data){
		echo 'Sentiero caricato!';
		echo '<a href="../esplora.php">Premi qui per continuare.</a>';
	}
	else{
		echo 'Errore: ';
        echo pg_last_error();
        echo '<br>';
		echo '<a href="../carica.php">Premi qui per ritentare</a>';
	}
?>