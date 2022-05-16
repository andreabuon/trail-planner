<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: accedi.php?enforcelogin=1');
		exit();
	}
?>
<!doctype html>
<html lang='it'>
<head>
	<title>Carica</title>
	<?php include 'php/head.php'; ?>
</head>
<body>
<?php
	include 'php/navbar.php';
	include 'php/alerts.php';
?>
<h1>Carica Percorso</h1>
<form method='post' name='carica' action='php/upload_trail.php' class='container' enctype='multipart/form-data'>

	<label for='sigla' class='form-label'>Sigla:</label>
	<input name='sigla' id='sigla' class='form-control' maxlength='4' required pattern='[A-Z0-9]{1,4}' value='AAA1' oninput='return siglaUpper();'>

	<label for='nome' class='form-label'>Nome:</label>
	<input name='nome' id='nome' class='form-control' maxlength='70' required pattern='[a-zA-Z0-9 ]+' value='Sentiero nome default'>

	<label for='descrizione' class='form-label'>Descrizione:</label>
	<textarea name='descrizione' id='descrizione' class='form-control' maxlength='2000' pattern='[a-zA-Z0-9 ]*'>Descrizione default</textarea>

	<label for='parco' class='form-label'>Parco:</label>
	<select name='parco' id='parco' class='form-control' required>
		<option selected disabled>Seleziona Parco...</option>;
		<?php 
			include 'php/get_data.php'; 
			include 'php/options.php';
			foreach(getParks() as $trail)
				echo newOption($trail['nome']);
		?>
	</select>

	<label for='lunghezza' class='form-label'>Lunghezza:</label>
	<input name='lunghezza' required id='lunghezza' type='number' class='form-control' maxlength='4' value='7.50' step=0.1 pattern='[0-9]{1,2}(\.[0-9]{0,2}){0,1}'>

	<label for='dislivello' class='form-label'>Dislivello:</label>
	<input name='dislivello' id='dislivello' required type='number' class='form-control' maxlength='4' value='500' step='250' pattern='[0-9]+'>

	<label for='difficolta' class='form-label'>Difficoltà:</label>
	<select name='difficolta' required id='difficolta' class='form-control'>
		<option value='' selected disabled>Seleziona Difficoltà...</option>
		<option value='T'>Turistico</option>
		<option value='E'>Escursionistico</option>
		<option value='EE'>Escursionisti Esperti</option>
		<option value='EEA'>Escursionisti Esperti Attrezzati</option>
		<option value='A'>Alpinistico</option>
	</select>

	<label for='file' class='form-label'>Traccia GPS:</label>
	<input name='file' id='file' type='file' accept='.json, .geojson' class='form-control'>

	<input type='submit' class='btn btn-primary btn-block' value='Carica' name='submit'>
</form>
<script>
	function siglaUpper(){
		var text = document.getElementById('sigla').value;
		console.log(text);
		document.getElementById('sigla').value = text.toUpperCase();
	}
</script>
</body>