<?php
	function getParks(){
		include 'database.php';
		$query = 'SELECT nome FROM parchi ORDER BY nome';
		$result = pg_query($query) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}
	
	function getParkTrails($parco){
		include 'database.php';
		$query = 'SELECT sigla, nome FROM sentieri WHERE parco_nome=$1 ORDER BY sigla';
		$result = pg_query_params($query, array($parco)) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}

	function getTrails(){
		include 'database.php';
		$query = 'SELECT * FROM sentieri ORDER BY (parco_nome, sigla)';
    	$result = pg_query($query) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}

	function getEvents(){
		include 'database.php';
		if(!isset($_SESSION['username'])){
			$res = pg_query('SELECT *, 0 as iscritto FROM escursioni ORDER BY data') or die('Query Failed: ' . pg_last_error());
		}else{
			$query = '(select *, 1 as iscritto
					from escursioni e1
					where e1.id in (select escursione from partecipa where username=$1)
					union 
					select *, 0 as iscritto
					from escursioni e2
					where e2.id not in (select escursione from partecipa where username=$1))
					order by data';
			$res = pg_query_params($dbconn, $query, array($_SESSION['username'])) or die('Query Failed: ' . pg_last_error());
		}
		/*
		$elencoEscursioni = array();
		include 'escursione.php'; //sistemare
		while($row = pg_fetch_assoc($res)){
			$elencoEscursioni[$row['id']] = new Escursione($row['id'], $row['sentiero_parco'], $row['sentiero_sigla'], $row['data'], $row['organizzatore'], $row['note'], $row['iscritto']);
		}
		pg_free_result($res);*/
		$rows = pg_fetch_all($res, PGSQL_ASSOC);
		$elencoEscursioni = array();
		include 'escursione.php';
		foreach($rows as $el){
			$elencoEscursioni[] = new Escursione($el);
		}
		return $elencoEscursioni;
	}
?>