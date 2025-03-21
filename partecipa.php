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
	<div id='top-bar'>
		<h1>Prossime Escursioni</h1>
		<?php
			if(isset($_SESSION['username']))
				echo "<a class='btn btn-lg btn-outline-primary me-auto' href='organizza.php'> + Organizza Escursione</a>";
		?>
	</div>
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
									<li class='list-group-item'>Referente: {$el['organizzatore']}</li>";
				if($el['note'])
					$string .= "<li class='list-group-item'>Note: {$el['note']}</li>";

				$string .= "</ul><div class='card-btns'>";
				$string .= "<a class='btn btn-outline-primary' target='_blank' href='trail.php?parco={$el['sentiero_parco']}&sigla={$el['sentiero_sigla']}'>Info</a>";
				if($el['iscritto'])
					$string .= "<a class='btn btn-outline-secondary' href='api/leave_event.php?escursione={$el['id']}' onclick='return chiediConferma();'>Annulla Prenotazione</a>";				
				else
					$string .= "<a class='btn btn-outline-success' href='api/join_event.php?escursione={$el['id']}'>Prenota!</a>";	
				
				if($el['organizzatore']!=$_SESSION['username']){
					if(isset($el['mobile']))
						$string .= "<a class='btn btn-outline-info' target='__blank' href='https://wa.me/{$el['mobile']}'>Contatta</a>";
				}
				else
					$string .= "<a class='btn btn-outline-warning' target='__blank' href='report.php?id={$el['id']}'>Gestisci</a>";
				
				$string .= '</div></div></div>';
				return $string;
			}

			$escursioni = getEvents();
			if(!$escursioni){
				echo 'Nessun evento trovato.';
				return;
			}
			else foreach($escursioni as $e){
				if(isset($_SESSION['username']))
					$e['mobile'] = getMobile($e['organizzatore']);
				echo newEventCard($e);
			}
		?>
	</div>
</body>

<script>
	function chiediConferma(){
		return confirm("Sei sicuro?");
	}
</script>

</html>