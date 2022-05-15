<?php
    include 'database.php';
    $query = 'SELECT json_agg(e.*) AS lista FROM (SELECT * FROM escursioni ORDER BY (data)) AS e';
    $result = pg_query($query) or die('Query Failed: '.pg_last_error());

    $line = pg_fetch_result($result, 0, 'lista');
    echo $line;
    
    pg_free_result($result);
    pg_close($dbconn);
?>