<!doctype html>
<html lang='it'>
<head>
	<title>Carica</title>
	<?php include 'php/head.php'; ?>
</head>

<body>

<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: index.php');
	}
	include 'php/navbar.php';
?>

<h1>Carica</h1>
<form method='post' action='php/upload_trail.php' class='container' enctype='multipart/form-data'>

	<label for='sigla' class='form-label'>Sigla:</label>
	<input name='sigla' id='sigla' class='form-control' maxlength='4' required pattern='[a-zA-Z0-9]+' value='test'> <!-- sistemare togliere testing -->

	<label for='nome' class='form-label'>Nome:</label>
	<input name='nome' id='nome' class='form-control' maxlength='70' required pattern='[a-zA-Z0-9 ]+' value='testing nome'>

	<label for='descrizione' class='form-label'>Descrizione:</label>
	<textarea name='descrizione' id='descrizione' class='form-control' maxlength='2000' pattern='[a-zA-Z0-9 ]+'>testing descrizione</textarea>

	<label for='parco' class='form-label'>Parco:</label>
	<select name='parco' id='parco' class='form-control' required>
		<option selected disabled>Seleziona Parco...</option>;
		<?php	include 'php/display_parks_select.php';	?>
	</select>

	<label for='lunghezza' class='form-label'>Lunghezza:</label>
	<input name='lunghezza' id='lunghezza' type='number' class='form-control' maxlength='4' value='7' step=0.1>

	<label for='dislivello' class='form-label'>Dislivello:</label>
	<input name='dislivello' id='dislivello' type='number' class='form-control' maxlength='4' value='500' step='50' pattern='[0-9]+'>

	<label for='difficolta' class='form-label'>Difficoltà:</label>
	<select name='difficolta' id='difficolta' class='form-control'>
		<option value='' selected disabled>Seleziona Difficoltà...</option>
		<option value='T'>Turistico</option>
		<option value='E'>Escursionistico</option>
		<option value='EE'>Escursionisti Esperti</option>
		<option value='EEA'>Escursionisti Esperti Attrezzati</option>
		<option value='A'>Alpinistico</option>
	</select>

	<label for='file' class='form-label'>Traccia GPS:</label>
	<input name='file' id='file' type='file' accept='.json, .geojson' class='form-control'>

	<input type=submit class='btn btn-primary btn-block' value='Carica' name='submit'>
</form>
</body>