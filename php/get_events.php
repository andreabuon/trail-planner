<?php
	include 'escursione.php';
	include 'database.php';


	if(!isset($_SESSION['username'])){
		$res = pg_query('SELECT * FROM escursioni ORDER BY data') or die('Query Failed: ' . pg_last_error());
	}else{
		$query = '(select *, 1 as iscritto
				from escursioni e1
				where e1.id in (select escursione from partecipa where username=$1)
				union 
				select *, 0 as iscritto
				from escursioni e2
				where e2.id not in (select escursione from partecipa where username=$1))
				order by data';
		$res = pg_query_params($dbconn, $query, array($_SESSION['username']));
		if(!$res) die("query fallita");
	}

	$elencoEscursioni = array();
	while($row = pg_fetch_assoc($res)){
		$elencoEscursioni[$row['id']] = new Escursione($row['id'], $row['sentiero_parco'], $row['sentiero_sigla'], $row['data'], $row['organizzatore'], $row['note'], $row['iscritto']);
	}
	pg_free_result($res);

	foreach($elencoEscursioni as $e){
		$e->stampa();
	}
	
	pg_close($dbconn);
?>