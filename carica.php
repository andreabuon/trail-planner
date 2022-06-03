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
	<?php include 'head.php'; ?>
	<link href='css/form.css' rel='stylesheet'>
</head>

<body>
	<?php
		include 'navbar.php';
		include 'alerts.php';
	?>
	<form method='post' name='carica' action='api/upload_trail.php' class='container' id='form' enctype='multipart/form-data'>
		<h1>Carica Percorso</h1>

		<label class='form-label'>Sigla:
			<input name='sigla' id='sigla' class='form-control' maxlength='4' autofocus required pattern='[A-Z0-9]{1,4}'
				placeholder='Sigla' oninput='return siglaUpper();'>
		</label>

		<label class='form-label'>Nome:
			<input name='nome' id='nome' class='form-control' maxlength='70' required pattern='[a-zA-Z0-9 ]+'
				placeholder='Titolo Sentiero'>
		</label>

		<label class='form-label'>Descrizione:
			<textarea name='descrizione' id='descrizione' class='form-control' maxlength='2000' placeholder='Descrizione'
				pattern='[a-zA-Z0-9 ]*'></textarea>
		</label>

		<label class='form-label'>Parco:
			<select name='parco' id='parco' class='form-control' required>
				<option selected disabled value=''>Seleziona Parco...</option>;
				<?php 
					include 'api/get_data.php'; 
					include 'options.php';
					foreach(getParks() as $trail)
						echo newOption($trail['nome']);
				?>
			</select>
		</label>

		<label class='form-label'>Lunghezza (in km):
			<input name='lunghezza' required id='lunghezza' type='number' class='form-control' maxlength='4'
				value='7.50' step=0.1 pattern='[0-9]{1,2}(\.[0-9]{0,2}){0,1}'>
		</label>

		<label class='form-label'>Dislivello (in metri):
			<input name='dislivello' id='dislivello' required type='number' class='form-control' maxlength='4' value='500' step='50' pattern='[0-9]+'>
		</label>

		<label class='form-label'>Difficoltà:
			<select name='difficolta' required id='difficolta' class='form-control'>
				<option value='' selected disabled>Seleziona Difficoltà...</option>
				<option value='T'>Turistico</option>
				<option value='E'>Escursionistico</option>
				<option value='EE'>Escursionisti Esperti</option>
				<option value='EEA'>Escursionisti Esperti Attrezzati</option>
				<option value='A'>Alpinistico</option>
			</select>
		</label>

		<label class='form-label'>Traccia GPS:
			<input name='file' id='file' type='file' accept='.json, .geojson' class='form-control'>
		</label>

		<input type='submit' class='btn btn-primary btn-block' value='Carica' name='submit'>
	</form>
</body>

<script>
	function siglaUpper() {
		var text = document.getElementById('sigla').value;
		console.log(text);
		document.getElementById('sigla').value = text.toUpperCase();
	}
</script>