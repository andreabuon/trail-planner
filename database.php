<?php
    $conn_string = "host=localhost port=5432 dbname=progettoLTW_db user=andrea password=password";
    /*
    $host = 'localhost';
    $port = 5432;
    $dbname = 'progettoLTW_db';
    $user = 'andrea';
    $password = 'password';
    
    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

    */
    
    $dbconn = pg_connect($conn_string) or die(pg_last_error());
?>
