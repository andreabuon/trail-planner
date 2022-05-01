<?php
    session_start();
    echo "Logout Successfully ";
    echo "<a href='index.php'>Clicca qui</a>";
    unset($_SESSION['username']);
    session_destroy();
?>