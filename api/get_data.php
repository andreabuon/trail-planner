<?php
	require_once 'database.php';

	function getParks(){
		$dbconn = Database::connect();
		$query = 'SELECT nome FROM parchi ORDER BY nome';
		$result = pg_query($dbconn, $query) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}
	
	function getParkTrails($parco){
		$dbconn = Database::connect();
		$query = 'SELECT sigla, nome FROM sentieri WHERE parco_nome=$1 ORDER BY sigla';
		$result = pg_query_params($dbconn, $query, array($parco)) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}

	function getTrails(){
		$dbconn = Database::connect();
		$query = 'SELECT * FROM sentieri ORDER BY (parco_nome, sigla)';
    	$result = pg_query($dbconn, $query) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}

	function getEvents(){
		$dbconn = Database::connect();
		if(!isset($_SESSION['username'])){
			$res = pg_query($dbconn, 'SELECT *, 0 as iscritto FROM escursioni ORDER BY data') or die('Query Failed: ' . pg_last_error());
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
		$rows = pg_fetch_all($res, PGSQL_ASSOC);
		$elencoEscursioni = array();
		include 'escursione.php';
		foreach($rows as $el){
			$elencoEscursioni[] = new Escursione($el);
		}
		return $elencoEscursioni;
	}
?>