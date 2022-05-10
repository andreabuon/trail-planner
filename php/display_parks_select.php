<?php
	include 'database.php';
	$query = 'SELECT nome FROM parchi ORDER BY nome';
	$result = pg_query($query) or die('Query Failed: '.pg_last_error());
	while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
		echo "<option>$line[nome]</option>";
	}
	pg_free_result($result);
	pg_close($dbconn);
?>