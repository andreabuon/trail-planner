<?php
    $host = 'localhost';
    $port = 5432;
    $dbname = 'progettoLTW_db';
    $user = 'andrea';
    $password = 'password';

    $dbconn = pg_connect($host, $port, $dbname, $user, $andrea, $password) or die("Could not connect: " . pg_last_error());

?>