<!doctype html>
<html lang='it'>

<head>
	<title>Esplora</title>
	<?php include 'head.php';?>
	<link href='css/esplora.css' rel='stylesheet'>

	<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet'>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
</head>

<body>
	<?php 
		include 'navbar.php';
		include 'alerts.php';
	?>

	<div id='content'>
		<div id='sidebar'>
			<div id='div_filters'>
				<a class='btn btn-secondary' href='carica.php'>+ Nuovo Percorso </a>
				<input type="text" id='search' placeholder='Filtra' oninput='filtra();'>	
				<select id='filter_parco' onchange='filtra()'>
					<option selected value=''>Seleziona Parco...</option>
					<?php 
						include 'api/get_data.php'; 
						include 'api/options.php';
						foreach(getParks() as $trail)
							echo newOption($trail['nome']);
					?>
				</select>
			</div>
			<div id='div_trails'>
			</div>
		</div>

		<div id='div_map'>
		</div>
	</div>

	<?php 
		include 'html/card.html'; 
	?>

	<script src='js/esplora.js'></script>
	<script src='js/map.js'></script>
</body>

</html>