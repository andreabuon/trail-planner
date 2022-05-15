<?php
	function newOption($label, $value=NULL){
		if($value!=NULL)
			return "<option value='$value'>$label</option>";
		return "<option>$label</option>";
	}

	function getParks(){
		$query = 'SELECT nome FROM parchi ORDER BY nome';
		$result = pg_query($query) or die('Query Failed: '.pg_last_error());
		while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
			echo newOption($line['nome']);
		}
	}
	
	function getParkTrails(){
		$query = 'SELECT sigla, nome FROM sentieri WHERE parco_nome=$1 ORDER BY sigla';
		$result = pg_query_params($query, array($_GET['parco'])) or die('Query Failed: '.pg_last_error());
		while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
			echo "<option value='$line[sigla]'>$line[sigla]: $line[nome]</option>";
		}
	}

	include 'database.php';
	if(isset($_GET['arg']) & $_GET['arg']=='parks')
		getParks();
	else if(isset($_GET['parco']))
		getParkTrails();
	else{
		console.log('errore');
		exit();
	}

	pg_free_result($result);
	pg_close($dbconn);
?>	
