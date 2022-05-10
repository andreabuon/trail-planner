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

	<label for='form_sigla' class='form-label'>Sigla:</label>
	<input class='form-control' name='sigla' maxlength='4' required>

	<label for='form_nome' class='form-label'>Nome:</label>
	<input class='form-control' name='nome' maxlength='70' required>

	<label for='form_descrizione' class='form-label'>Descrizione:</label>
	<textarea class='form-control' name='descrizione' maxlength='2000'></textarea>

	<label for='form_parco' class='form-label'>Parco:</label>
	<select class='form-control' name='parco' required>
		<option selected disabled hidden>Seleziona Parco...</option>;
		<?php	include 'php/display_parks_select.php';	?>
	</select>

	<label for='form_lunghezza' class='form-label'>Lunghezza:</label>
	<input class='form-control' name='lunghezza' number maxlength='4' required>

	<label for='form_dislivello' class='form-label'>Dislivello:</label>
	<input class='form-control' name='dislivello' number maxlength='4' required>

	<label for='form_difficoltà' class='form-label'>Difficoltà:</label>
	<input class='form-control' name='difficolta' maxlength='3'>

	<label for='form_file' class='form-label'>Traccia GPS</label>
	<input class='form-control' type='file' name='file' accept='.json, .geojson'>

	<input type=submit class='btn btn-primary btn-block' value='Carica' name='submit'>
</form>

</body>