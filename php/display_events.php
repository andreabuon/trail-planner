<?php
    include 'database.php';

    $query = 'SELECT * FROM escursioni';
    $result = pg_query($query) or die('Query Failed: '.pg_last_error());

    while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
        print_r($line);
        echo '<button class="btn btn-secondary">Altre informazioni</button>';
        echo '<button class="btn btn-primary">Partecipa</button>';
        echo '<br>';
    }

    pg_free_result($result);
    pg_close($dbconn);

?>