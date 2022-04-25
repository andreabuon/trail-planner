<?php

    function new_Card($sentiero){
        echo "
            <div class=\"card\" style=\"width: 100%;\">
                <img class=\"card-img-top\" src=\"...\" alt=\"Card image cap\">
                <div class=card-body\">
                    <h5 class=\"card-title\">$sentiero[sigla] : $sentiero[nome]</h5>
                    <p class=\"card-text\"> Lunghezza: $sentiero[lunghezza] Km; Dislivello: $sentiero[dislivello]m </p>
                    <a href=\"#\" class=\"btn btn-info\">Visualizza</a>
                </div>
            </div>
            <br>";
    }
    
    include 'database.php';

    $query = 'SELECT * FROM sentieri';
    $result = pg_query($query) or die('Query Failed: '.pg_last_error());

    while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
        new_Card($line);
    }

    pg_free_result($result);
    pg_close($dbconn);
    
?>