<?php
    $host = 'localhost';
    $port = 5432;
    $dbname = 'progettoLTW_db';
    $user = 'andrea';
    $password = 'password';

    echo 'non fatto';
    $conn_string = "host=localhost port=5342 dbname=progettoLTW_db user=andrea password=password";
    $dbconn = pg_connect($conn_string) or die("fallito conn db");
    echo "yes fatto";
?>
