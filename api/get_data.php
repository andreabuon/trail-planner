<?php
	function getParks(){
		include 'database.php'; //sistemare
		$query = 'SELECT nome FROM parchi ORDER BY nome';
		$result = pg_query($query) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}
	
	function getParkTrails($parco){
		include 'database.php'; //sistemare
		$query = 'SELECT sigla, nome FROM sentieri WHERE parco_nome=$1 ORDER BY sigla';
		$result = pg_query_params($query, array($parco)) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}

	function getTrails(){
		include 'database.php'; //sistemare
		$query = 'SELECT * FROM sentieri ORDER BY (parco_nome, sigla)';
    	$result = pg_query($query) or die('Query Failed: ' . pg_last_error());
		return pg_fetch_all($result, PGSQL_ASSOC);
	}
?>