<?php
    /*
    $host = 'localhost';
    $port = 5432;
    $dbname = 'progettoLTW_db';
    $user = 'andrea';
    $password = 'password';
    */
    $conn_string = "host=localhost port=5432 dbname=progettoLTW_db user=andrea password=password";
    $dbconn = pg_connect($conn_string) or die(pg_last_error());

?>
