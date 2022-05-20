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
								<h6 class='card-subtitle'>" . $el['sentiero_parco'] . "</h6>
								<h5 class='card-title'> Sentiero " .$el['sentiero_sigla'].': '. $el['nome'] . "</h5>
								<h5 class='card-text'>" . $el['data'] ."</h5>";
				if($el['iscritto'])
					$string .= '<a class="btn btn-outline-secondary" href="api/leave_event.php?escursione=' . $el['id'] . '">Annulla Prenotazione</a>';				
				else
					$string .= '<a class="btn btn-outline-info" href="api/join_event.php?escursione='. $el['id'] . '">Prenota!</a>';	
				$string .= '</div></div>';
				return $string;
			}

			$escursioni = getEvents();
			if(!$escursioni){
				echo 'Nessun evento trovato.';
				return;
			}
			foreach($escursioni as $e){
				echo newEventCard($e);
			}
		?>
	</div>
</body>
</html>