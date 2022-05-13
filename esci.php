<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: index.php');
		exit();
	}
    unset($_SESSION['username']);
    session_destroy();
    header('Location: index.php?logout=1');
    exit();
?>