<!doctype html>
<html lang='it'>
<head>
	<title>Partecipa</title>
	<?php 
		include 'head.php';
	?>
	<link href='css/partecipa.css' rel='stylesheet'>
</head>
<body>
	<?php 
		include 'navbar.php';
		include 'alerts.php';
	?>
	<div id='div_events'>
		<?php
			require_once 'api/get_data.php';

			function newEventCard($el){
				$string = "<div class='card'>
							<div class='card-body'>
								<h5 class='card-title'> {$el['nome']}</h5>
								<h6 class='card-subtitle text-muted'> {$el['sentiero_parco']}</h6>
								<ul class='list-group list-group-flush'>
									<li class='list-group-item'>Sigla percorso: {$el['sentiero_sigla']}</li>
									<li class='list-group-item'>{$el['data']}</li>
								
								<li class='list-group-item'>";
				if($el['iscritto'])
					$string .= "<a class='btn btn-outline-secondary' href='api/leave_event.php?escursione={$el['id']}'>Annulla Prenotazione</a>";				
				else
					$string .= "<a class='btn btn-outline-info' href='api/join_event.php?escursione={$el['id']}'>Prenota!</a>";	
				$string .= '</li></ul></div></div>';
				return $string;
			}

			$escursioni = getEvents();
			if(!$escursioni){
				echo 'Nessun evento trovato.';
				return;
			}
			else foreach($escursioni as $e){
				echo newEventCard($e);
			}
		?>
	</div>
</body>
</html>