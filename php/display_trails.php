<?php
    include 'database.php';
    $query = 'select json_agg(s.*) as lista from (select * from sentieri order by (parco_nome, sigla)) as s';
    $result = pg_query($query) or die('Query Failed: '.pg_last_error());
    
    $line = pg_fetch_result($result, 0, 'lista');
    echo $line;
    
    pg_free_result($result);
    pg_close($dbconn);  
?>