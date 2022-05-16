<!doctype html>
<html lang='it'>

<head>
	<title>Esplora</title>
	<?php include 'head.php';?>
	<script src='js/esplora.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet'>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
</head>

<body>
	<?php 
		include 'navbar.php';
		include 'alerts.php';
	?>
	<div class='container-fluid'>
		<div class='' id='div_filters'>
			<div class="input-group">
				<span class="input-group-text" id="basic-addon1">Filtra:</span>
				<input type="text" class="form-control input-sm" id='search' width='30' aria-label="Username"
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
			<button class='btn btn-outline-secondary' onclick='return clearMap();'>Clear Map</button>
		</div>
		<div class='row'>
			<div id='div_trails' class='col col-md-4'>
			</div>
			<div id='div_map' class='col col-md-8'>
			</div>
		</div>
	</div>
	<?php include 'html/card.html'; ?>
	<script src='js/map.js'></script>
</body>

</html>