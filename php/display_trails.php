<?php
    function new_Card($sentiero){
        echo "
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'> $sentiero[sigla] - $sentiero[nome]</h5>
                    <p class='card-text'> Lunghezza: $sentiero[lunghezza] Km; Dislivello: $sentiero[dislivello]m </p>
                    <button class='btn btn-outline-info' onclick='scaricaSentiero();'>Scarica</button>
                    <button class='btn btn-outline-info' onclick='disegnaSentiero(sentiero);'>Visualizza</button>
                </div>
            </div>";
    }
    
    include 'database.php';
    $query = 'SELECT parco_nome, sigla, nome, dislivello, lunghezza, difficolta  FROM sentieri';
    $result = pg_query($query) or die('Query Failed: '.pg_last_error());
    
    while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
        new_Card($line);
    }

    pg_free_result($result);
    pg_close($dbconn);
    
?>