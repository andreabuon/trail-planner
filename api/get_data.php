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
			$query = '(select e1.*, s1.nome, 1 as iscritto
						from escursioni e1 join (select nome, sigla, parco_nome from sentieri) s1 on (e1.sentiero_sigla=s1.sigla and e1.sentiero_parco=s1.parco_nome)
						where e1.id in (select escursione from partecipa where username=$1))
						
						union
						
						(select e2.*, s2.nome, 0 as iscritto
						from escursioni e2 join (select nome, sigla, parco_nome from sentieri) s2 on (e2.sentiero_sigla=s2.sigla and e2.sentiero_parco=s2.parco_nome)
						where e2.id not in (select escursione from partecipa where username=$1))
						
						order by data';
			$res = pg_query_params($dbconn, $query, array($_SESSION['username'])) or die('Query Failed: ' . pg_last_error());
		}
		return pg_fetch_all($res, PGSQL_ASSOC);
	}

	function getEventsByOrganizer($username){
		$dbconn = Database::connect();
		$query = 'SELECT * FROM escursioni WHERE organizzatore=$1 ORDER BY data';
		$res = pg_query_params($dbconn, $query, array($username)) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($res, PGSQL_ASSOC);
	}

	function getEventReservations($event_id){
		$dbconn = Database::connect();
		$query = 'SELECT username FROM partecipa WHERE escursione=$1 ORDER BY username';
		$res = pg_query_params($dbconn, $query, array($event_id)) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($res, PGSQL_ASSOC);
	}
?>