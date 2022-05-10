<?php
	include 'database.php';
	$query = 'SELECT sigla, nome FROM sentieri WHERE parco_nome=$1 ORDER BY sigla';
	$result = pg_query_params($query, array($_GET['parco'])) or die('Query Failed: '.pg_last_error());
	while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
		echo "<option value=$line[sigla]>$line[sigla]: $line[nome]</option>";
	}
	pg_free_result($result);
	pg_close($dbconn);
?>