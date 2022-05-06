<?php
    session_start();
    echo 'Disconnessione eseguita. ';
    echo '<a href="index.php">Clicca qui per tornare alla homepage</a>';
    unset($_SESSION['username']);
    session_destroy();
    header('Location index.php');
?>