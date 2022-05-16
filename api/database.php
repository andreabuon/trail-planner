<?php
    //sistemare!!!!
    $conn_string = 'host=localhost port=5432 dbname=progettoLTW_db user=andrea password=password';    
    $dbconn = pg_connect($conn_string) or die("DB Connection Failed: " . pg_last_error());
?>
