<!doctype html>
<html lang='it'>
<head>
	<title>Esplora</title>
	<?php include 'php/head.php';?>
	<script src='js/trails.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet'>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
</head>
<body>
	<?php include 'php/navbar.php';?>
	<h1>Esplora Percorsi</h1>
	<div class='container-fluid'>	
		<div class='row'>
			<button class='btn btn-outline-secondary col-md-1' id='btn_toggleFilters' onclick='toggleFilters();'>Filtri</button>
			<div id='div_filters' hidden class='col-md-10'>
						<input placeholder='Cerca' id='search' oninput='filterTrails(trails, filterByName);'>

						<select id='filter_parco' onchange='filterTrails(trails, filterByPark);'>
							<option selected value=''>Seleziona Parco...</option>;
							<?php 
								include 'php/get_data.php'; 
								include 'php/options.php';
								foreach(getParks() as $trail)
									echo newOption($trail['nome']);
							?>
						</select>

						<!--
						<div class='btn-group' role='group' aria-label='Difficoltà Sentiero'>
							<button type='button' class='btn btn-outline-info'>T</button>
							<button type='button' class='btn btn-outline-info'>E</button>
							<button type='button' class='btn btn-outline-info'>EE</button>
							<button type='button' class='btn btn-outline-info'>A</button>
						</div>
						
						<label>Dislivello</label>
						<input placeholder='min' width='4' id='dislivelloMin'>
						<input placeholder='max' width='4' id='dislivelloMax'> -->
			</div>
			<button class='btn btn-outline-secondary col-md-1 align-self-end'  onclick='return clearMap();'>Clear Map</button>
		</div>
		<div class='row'>
			<div id='div_trails' class='col bg-light col-md-4'>
			</div>
			<div id='div_map' class='col col-md-8'>
			</div>
		</div>
	</div>
	<?php include 'html/card.html'; ?>

	<!--
	<card_template>
		<span slot="parco">parco text</span>
		<span slot="sigla">sigla text</span>
		<span slot="lunghezza">lunghezza text</span>
	</card_template> -->
	<script src='js/map.js'></script>
</body>
</html>