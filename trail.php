<?php
	if(!isset($_GET['parco']) | !isset($_GET['sigla'])){
		header('Location: index.php?error=1');
		exit();
	}

	
	$parco = $_GET['parco'];
	$sigla = $_GET['sigla'];

?>

<!doctype html>
<html lang='it'>

<head>
	<title>Sentiero</title>
	<?php include 'head.php';?>
	<link href='css/trail.css' rel='stylesheet'>
</head>

<body>
	<?php 
		include 'navbar.php'; 
		//include 'alerts.php';
		include 'api/get_data.php';
	?>
	<div id='menu'>
	<button class='btn btn-secondary' onclick='window.close();'>Chiudi</button>
		<?php
		$sentiero = getTrail($parco, $sigla);
		if(isset($sentiero['track_path']))
			echo "<a class='btn btn-info' id='download' href='uploads/{$sentiero['track_path']}' download>Scarica Traccia GPS</a>";
		?>
	</div>

	<div id='content'>
		<?php
			echo	"<div class='card' id='info'>
						<div class='card-header'>
							Informazioni Sentiero
						</div>
						<ul class='list-group list-group-flush'>
							<li class='list-group-item fw-bold'>{$sentiero['nome']} </li>
							<li class='list-group-item fw-bold'>{$sentiero['parco_nome']} </li>
							<li class='list-group-item fw-bold'>Sigla: {$sentiero['sigla']} </li>
							<li class='list-group-item'>Difficolta: {$sentiero['difficolta']} </li>
							<li class='list-group-item'>Lunghezza: {$sentiero['lunghezza']} km </li>
							<li class='list-group-item'>Dislivello: {$sentiero['dislivello']} metri </li>
							<li class='list-group-item'>Descrizione: {$sentiero['descrizione']} </li>
						</ul>
					</div>";
		?>
		<div class='card' id='pic'>
		</div>	
	<div id='reviews'>
		<h3>Commenti</h3>
		<input placeholder="Commenta!"></input>
		<a class='btn btn-info' href=''>Aggiungi commento</a>
		
		<div class="card">
			<div class="card-header">
				Domenico Mangieri
			</div>
			<div class="card-body">
				<blockquote class="blockquote mb-0">
					<p>Bel sentiero.</p>
				</blockquote>
			</div>
		</div>
		</div>
	</div>
</body>