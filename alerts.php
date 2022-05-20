<?php
$debug = 1;

function newAlert($type, $message){
	echo '<div class="alert alert-' . $type . '" role="alert" onclick="this.hidden=1">' . $message . '<button class="btn-close float-end"></button></div>';
}



if(isset($_GET['login']))
	newAlert('info', 'Accesso eseguito');
else if(isset($_GET['logout']))
	newAlert('info', 'Disconnessione eseguita.');
else if(isset($_GET['signup']))
	newAlert('success', 'Registrazione completata. Adesso puoi procedere con il login.');
else if(isset($_GET['enforcelogin']))
	newAlert('warning', 'Per visualizzare la pagina devi effettuare il login');
else if(isset($_GET['logged']))
	newAlert('warning', 'Hai già effettuato il login.');

if(isset($_GET['error'])){
	if(isset($_SESSION['last-error']))
		newAlert('danger', 'Errore: '. $_SESSION['last-error']);
	else
		newAlert('danger', 'Errore');
}
if(isset($_GET['upload']))
	newAlert('info', 'Caricamento completato.');
if(isset($_GET['success']))
	newAlert('success', 'Azione completata.');
?>