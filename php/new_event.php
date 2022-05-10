<?php    
    if(!(isset($_POST['btn_submit']))){
        header('Location ../organizza.php');
    }
    session_start();
    if($_POST['organizzatore'] != $_SESSION['username']){
        header('Location ../organizza.php');
    }

    include 'database.php';
    $query = 'insert into escursioni values ($1,$2,$3,$4,$5)';
    $array = array($_POST['parco'], $_POST['sigla'], $_POST['data'], $_POST['organizzatore'], $_POST['note']);
    $data = pg_query_params($dbconn, $query, $array);

    if($data){
		echo 'Escursione caricata!';
		echo '<a href="../partecipa.php">Premi qui per continuare.</a>';
	}
	else{
		echo 'Errore: ' . pg_last_error() . ' <br>';
		echo '<a href="../organizza.php">Premi qui per ritentare</a>';
	}
?>