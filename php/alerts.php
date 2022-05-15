<?php
if(isset($_GET['login']))
		echo '<div class="alert alert-info" role="alert">Accesso eseguito.</div>';
else if(isset($_GET['logout']))
		echo '<div class="alert alert-info" role="alert">Disconnessione eseguita.</div>';
else if(isset($_GET['signup']))
			echo '<div class="alert alert-success" role="alert">Registrazione completata. Adesso puoi procedere con il login.</div>';
else if(isset($_GET['logged']))
	echo '<div class="alert alert-warning" role="alert">Hai già effettuato il login.</div>';
if(isset($_GET['error']))
			echo "<div class='alert alert-danger' role='alert'> Errore server: $_GET[error]</div>";
if(isset($_GET['enforcelogin']))
	echo '<div class="alert alert-warning" role="alert">Per visualizzare la pagina devi effettuare il login</div>';
if(isset($_GET['upload']))
	echo '<div class="alert alert-info" role="alert">Caricamento completato.</div>';
if(isset($_GET['success']))
	echo '<div class="alert alert-success" role="alert">Azione completata.</div>';
?>