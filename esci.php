<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: index.php');
		exit();
	}
    $_SESSION = array();
	session_destroy();
    header('Location: index.php?logout=1');
    exit();
?>