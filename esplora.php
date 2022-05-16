<!doctype html>
<html lang='it'>

<head>
	<title>Esplora</title>
	<?php include 'head.php';?>
	<script src='js/trails.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet'>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
</head>

<body>
	<?php include 'navbar.php';?>
	<h1>Esplora Percorsi</h1>
	<div class='container-fluid'>
		<div class='row'>

			<div id='div_filters' class='col-md-6'>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">Cerca:</span>
					<input type="text" class="form-control" id='search' size='30' aria-label="Username"
						aria-describedby="basic-addon1" oninput='filtra();'>
				</div>
				
				<select id='filter_parco' onchange='filtra()'>
					<option selected value=''>Seleziona Parco...</option>
					<?php 
								include 'api/get_data.php'; 
								include 'api/options.php';
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
			<button class='btn btn-outline-secondary col-md-1' onclick='return clearMap();'>Clear Map</button>
			<button class='btn btn-outline-secondary col-md-1'
				onclick='return clearDiv(document.getElementById("div_trails"));'>Clear List</button>
		</div>
		<div class='row'>
			<div id='div_trails' class='col bg-light col-md-4'>
			</div>
			<div id='div_map' class='col col-md-8'>
			</div>
		</div>
	</div>
	<?php include 'html/card.html'; ?>
</body>

</html>